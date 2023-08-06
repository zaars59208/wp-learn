<?php
$daysmartsync_prefix = 'dsaioc_';

function dsaioc_get_ical_uid($e)
{
    $ical_uid = isset($e->uid) ? $e->uid : 0;
    return $ical_uid;
}

function dsaioc_add_vcalendar_events_to_db($events = array(), array $args = null, $current_page = 1, $last_page = 10, $all_resources = null, $all_event_types = null)
{
    global $wpdb;

    $feed = isset($args['feed']) ? $args['feed'] : null;
    $comment_status = isset($args['comment_status']) ? $args['comment_status'] : 'open';
    $do_show_map = isset($args['do_show_map']) ? $args['do_show_map'] : 0;
    $count = 0;
    $events_in_db = count($events);
    $feed_name = 'Sync DaySmart iCals-' . strtotime(date('Y-m-d H:i:s'));

// Fetch default timezone in case individual properties don't define it
    $local_timezone = 'UTC';
    $messages = 'Debug the issue.';
// go over each event

    foreach ($events as $e) {
        $e_id = $e->id;
//        if($e_id == 130569){ continue; }
        $e_desc = str_replace("'", "", $e->attributes->desc);

        // Event data array, and posts data array
        $dataAllInOneEvents = array();
        $dataNewPosts = array();

        //if($count > 0){ continue; }// to limit the records
        $dataAllInOneEvents['ical_uid'] = $e->id;

        $e = $e->attributes;

        $resource_id = $e->resource_id;
        $resourceInfo = array();
        foreach ($all_resources as $resource) {
            if ($resource->id == $resource_id) {
                $resourceInfo = $resource->attributes;
            }
        }

        $event_type_code = $e->event_type;
        $eventTypeId = '';

        $terms = get_terms('events_categories', array('hide_empty' => false));

        $new_term_name = $new_term_slug = $new_term_color = '';
        foreach ($all_event_types as $eventType) {
            if (!isset($eventType->attributes->name) || empty($eventType->attributes->name)) {
                continue;
            }

            // end to check if the term is already inserted then get the term id, otherwise we have to insert.
            if ($eventType->attributes->code == $event_type_code) {

                $eventTypeId = '&event_type=' . $eventType->id;

                $new_term_id = 0;
                $new_term_name = $eventType->attributes->name;
                $new_term_slug = str_replace(' ', '-', strtolower($new_term_name));
                $new_term_color = $eventType->attributes->color;
                // to check if the term is already inserted then get the term id, otherwise we have to insert.
                if(count($terms) > 0){
                    foreach ($terms as $term) {
                        $term_slug = is_array($term) ? $term['slug'] : $term->slug;
                        if ($term_slug == $new_term_slug) {
                            $new_term_id = $term->term_id;
                        }
                    }
                }

                if ($new_term_id == 0) {
                    // Check if the term already exists
                    $term_exists = term_exists($new_term_name, 'events_categories');

                    if ($term_exists !== 0 && $term_exists !== null) {
                        // Term already exists, update its properties
                        $existing_term_id = $term_exists['term_id'];
                        $new_term_id = $term_exists['term_id'];

                        $updated_term_args = array(
                            'name' => $new_term_name,
                            'slug' => $new_term_slug,
                            'description' => $new_term_name,
                        );

                        // Update the term
                        wp_update_term($existing_term_id, 'events_categories', $updated_term_args);
                    } else {
                        // Term does not exist, insert a new term
                        $new_term_info = wp_insert_term(
                            $new_term_name,    // The name of the new term
                            'events_categories', // The taxonomy to which the term should be added
                            array(
                                'name' => $new_term_name,
                                'slug' => $new_term_slug,
                                'parent' => -1,
                                'description' => $new_term_name,
                            )
                        );
                        $new_term_id = $new_term_info['term_id'];

                    }

                    update_term_meta($new_term_id, 'term_color', $new_term_color);

                    $events_table_name = $wpdb->prefix . 'ai1ec_event_category_meta';

                    if($new_term_id > 0){
                        $wpdb->delete( $events_table_name, array('term_id' => $new_term_id) );

                        $error_metainfo = $wpdb->update($events_table_name, array(
                            'term_id' => $new_term_id,
                            'term_color' => $new_term_color,
                            'term_image' => ''
                        ), array('term_id' => $new_term_id));
                    }

                }// id is not zero
            }
        }

        // =====================
        // = Start & end times =
        // =====================
        $start = $e->start_gmt;
        $end = $e->end_gmt;

// For cases where a "VEVENT" calendar component
// specifies a "DTSTART" property with a DATE value type but none
// of "DTEND" nor "DURATION" property, the event duration is taken to
// be one day.  For cases where a "VEVENT" calendar component
// specifies a "DTSTART" property with a DATE-TIME value type but no
// "DTEND" property, the event ends on the same calendar date and
// time of day specified by the "DTSTART" property.
        if (empty($end)) {
            // #2 if only DATE value is set for start, set duration to 1 day
            $end = $start;
        }

        $start = strtotime($start);
        $end = strtotime($end);

        if (false === $start || false === $end) {
            echo 'No proper event is there.';
            wp_die();
        }

        // If all-day, and start and end times are equal, then this event has
        // invalid end time (happens sometimes with poorly implemented iCalendar
        // exports, such as in The Event Calendar), so set end time to 1 day
        // after start time.

        $dataAllInOneEvents += compact('start', 'end');
        // =======================================
        // = Recurrence rules & recurrence dates =
        // =======================================
        $rrule = array(); //$e->rrule;
        $rdate = array(); //$e->rdate;

// =======================================
// = Exclusion rules & exclusion dates   =
// =======================================
        $exrule = array(); //$e->exrule;
        $exdate = array(); //$e->exdate;

// ===================
// = Venue & address =
// ===================
        $dataAllInOneEvents['country'] = '';
        $dataAllInOneEvents['city'] = '';
        $dataAllInOneEvents['province'] = '';
        $dataAllInOneEvents['postal_code'] = '';

        $venue = 'IceWorks Skating Complex - r';

        if (isset($resourceInfo->desc)) {
            $venue = !empty(trim($resourceInfo->desc)) ? str_replace("'", "''", $resourceInfo->desc) : $venue;
        }

        $address = '';
        $location = '';
        if (isset($resourceInfo->name)) {
            $address = $resourceInfo->name . ' - ' . $venue;
        }

        $matches = array();

// =====================================================
// = Set show map status based on presence of location =
// =====================================================
        $event_do_show_map = 0;

// ==================
// = Cost & tickets =
// ==================
        $cost = array('cost' => 0, 'is_free' => 1);
        $ticket_url = "https://apps.daysmartrecreation.com/dash/x/#/online/iceworks/calendar?location=1&start=$e->start_gmt&end=$e->end_gmt" . $eventTypeId;

// ===============================
// = Contact name, phone, e-mail =
// ===============================
// Initialize default values
        $dataAllInOneEvents['contact_email'] = '';
        $dataAllInOneEvents['contact_url'] = '';
        $dataAllInOneEvents['contact_phone'] = '';
        $dataAllInOneEvents['contact_name'] = '';
        $e_desc = empty($e_desc) ? 'Daysmart Event - ' . $dataAllInOneEvents['ical_uid'] : $e_desc;

        $description = stripslashes(
            str_replace(
                '\n',
                "\n",
                $e_desc
            ));

        // Create event related table entries.
        //Creating event into wordpress post table
        $dataNewPosts = array(
            'post_status' => 'publish',
            'comment_status' => $comment_status,
            'post_type' => 'ai1ec_event',
            'post_author' => 1,
            'post_title' => $e_desc,
            'post_content' => $description
        );
        // print_r($e);

        $eventPostId = wp_insert_post($dataNewPosts, true);

        $new_term_info = array($new_term_id); // Correct. This will add the tag with the id 5.
        $error_term_info = wp_set_post_terms($eventPostId, $new_term_info, 'events_categories');

        //Creating event into ain1ec events table
        $dataAllInOneEvents += array(
            'post_id' => $eventPostId,
            'recurrence_rules' => $rrule,
            'exception_rules' => $exrule,
            'recurrence_dates' => $rdate,
            'exception_dates' => $exdate,
            'venue' => $venue,
            'address' => $address,
            'cost' => $cost,
            'ticket_url' => $ticket_url,
            'show_map' => $event_do_show_map,
            'ical_feed_url' => is_null($feed) ? '' : $feed->feed_url,
            'ical_source_url' => isset($e->url) ? $e->url : 'javascript:void(0);',
            'ical_organizer' => 'IceWorks',
            'ical_contact' => ' (610) 497-2200',
            'ical_uid' => dsaioc_get_ical_uid($e)
        );

        $events_table_name = $wpdb->prefix . 'ai1ec_events';
//        $already_term_info = $wpdb->get_row( $wpdb->prepare( "SELECT post_id FROM $events_table_name WHERE post_id = %d", $eventPostId ) );
        $wpdb->delete( $events_table_name, array('post_id' => $eventPostId) );
        $ai1ec_event_id = $wpdb->update($events_table_name, $dataAllInOneEvents, array('post_id' => $eventPostId));

        //Creating record for event instances table
        $events_table_name = $wpdb->prefix . 'ai1ec_event_instances';
        $instance_data = array( 'post_id' => $eventPostId, 'start' => $start, 'end' => $end);
        $wpdb->delete( $events_table_name, array('post_id' => $eventPostId) );
        $ai1ec_event_instance_id = $wpdb->update( $events_table_name, $instance_data, array('post_id' => $eventPostId) );
        $count++;
    } //close while iteration

    return array(
        'current_page' => $current_page,
        'last_page' => $last_page,
        'count' => $count,
        'total_events_api' => $events_in_db,
        'messages' => $messages,
        'name' => 'Daysmart Events Sync',
    );

}
