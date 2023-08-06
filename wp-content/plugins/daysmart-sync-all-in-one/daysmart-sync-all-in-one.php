<?php
/**
 * Plugin Name: Daysmart Sync All-in-One Timly
 * Plugin URI:  https://webpenter.com/daysmart-sync-all-in-one-timly
 * Description: Handles API authentication and token storage for Daysmart sync with timly calendar plugin.
 * Version:     1.0.0
 * Author:      Web Penter Dot Com
 * Author URI:  https://webpenter.com
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
require_once plugin_dir_path(__FILE__) .'/import-export/import.php';
const DAYSMARTSYNC_PREFIX = 'dsaioc_';
const DAYSMARTSYNC_API_BASE_URL = "https://apps.daysmartrecreation.com/dash/jsonapi/api/v1/";

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-admin-script', plugin_dir_url(__FILE__) . 'js/custom-script.js');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_scripts');

// Activation hook
register_activation_hook(__FILE__, 'daysmart_sync_activate');

function daysmart_sync_activate()
{
    // Schedule your cron job on plugin activation
    if (! wp_next_scheduled ( 'daysmart_event_sync_daily_hook' )) {
        wp_schedule_event( time(), 'hourly', 'daysmart_event_sync_daily_hook' );
    }
}

// Cron job callback function
function daysmart_event_sync_daily() {
    // Your cron job logic goes here
    // This function will be executed daily at 12 AM
    $start = $end = date('m-d-Y');
    daysmart_sync_events_daily_cron($start, $end);
}

// Register the cron job hook
add_action( 'daysmart_event_sync_daily_hook', 'daysmart_event_sync_daily' );

// Deactivation hook
register_deactivation_hook(__FILE__, 'daysmart_sync_deactivate');

function daysmart_sync_deactivate()
{
    wp_clear_scheduled_hook( 'daysmart_event_sync_daily_hook' );
}

// Add menu item
add_action('admin_menu', 'daysmart_sync_add_menu_item');

function daysmart_sync_add_menu_item()
{
    add_menu_page(
        'Daysmart Sync All-in-One',
        'Daysmart Sync',
        'manage_options',
        'daysmart-sync-settings',
        'daysmart_sync_render_settings_page',
        'dashicons-admin-plugins',
        99
    );
}

// Render settings page
function daysmart_sync_render_settings_page($is_forcefully=0)
{
    $daysmartsync_prefix = DAYSMARTSYNC_PREFIX;//'dsaioc_';

    if ($is_forcefully > 0 || isset($_POST[$daysmartsync_prefix . 'api_authenticate'])) {
        $access_token = get_option($daysmartsync_prefix . 'api_token');
        if (1==1 || empty(trim($access_token))) {// for now every submit button will generate fresh access token
            // Handle authentication form submission
            update_option($daysmartsync_prefix . 'api_company_name', $_POST[$daysmartsync_prefix . 'api_company_name']);
            update_option($daysmartsync_prefix . 'api_company_code', $_POST[$daysmartsync_prefix . 'api_company_code']);
            update_option($daysmartsync_prefix . 'api_client_secret', $_POST[$daysmartsync_prefix . 'api_client_secret']);
            update_option($daysmartsync_prefix . 'api_client_id', $_POST[$daysmartsync_prefix . 'api_client_id']);

            $company = get_option($daysmartsync_prefix . 'api_company_name');
            $company_code = get_option($daysmartsync_prefix . 'api_company_code');
            $client_secret = get_option($daysmartsync_prefix . 'api_client_secret');
            $client_id = get_option($daysmartsync_prefix . 'api_client_id');

            $url = DAYSMARTSYNC_API_BASE_URL . "auth/token";
            $data = array(
                "company" => $company,
                "client_secret" => $client_secret,
                "client_id" => $client_id,
                "company_code" => $company_code,
                "grant_type" => "client_credentials"
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
            }
            curl_close($ch);

            if (isset($error_msg)) {
                echo 'Error: in cUrl ';
                echo $error_msg;
            }

            $response = json_decode($response);
            // Handle the response as needed
            $access_token = $response->access_token;

            // If authentication successful, store the token securely
            update_option($daysmartsync_prefix . 'api_token', $access_token);
        }

        // Display success message
        echo '<div class="notice notice-success"><p>Authentication successful.</p></div>';
    }

    $access_token_sustr = '';
    if (!empty(get_option($daysmartsync_prefix . 'api_token'))) {
        $access_token_sustr = substr(get_option($daysmartsync_prefix . 'api_token'), 0, 20) . '***';
    }
    ?>
    <div class="wrap">
        <?php if (!empty($access_token_sustr)) { ?>
            <div style="display: none;" id="daysmart_sync_msg_error" class="updated notice notice-error is-dismissible"><p>Something wrong happend, contact to the Administrator.</a></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
            <div style="display: none;" id="daysmart_sync_msg_ok" class="updated notice notice-success is-dismissible"><p>All sync is done, total number of events synced <span id="daysmart_sync_count_event">0</span></a></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
            <div style="float: right"><button id="sync_all_events_btn" class="button-primary">Sync All Events</button> </div>
        <?php } ?>
    <h1>Daysmart Sync Settings</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="access_token">Access Token</label></th>
                    <td><span class="regular-text"><?php echo $access_token_sustr; ?></span></td>
                </tr>

                <tr>
                    <th scope="row"><label for="<?php echo $daysmartsync_prefix; ?>api_company_code">Company
                            Code</label></th>
                    <td><input type="text" id="<?php echo $daysmartsync_prefix; ?>api_company_code"
                               name="<?php echo $daysmartsync_prefix; ?>api_company_code"
                               value="<?php echo get_option($daysmartsync_prefix . 'api_company_code'); ?>"
                               class="regular-text"/></td>
                </tr>

                <tr>
                    <th scope="row"><label for="<?php echo $daysmartsync_prefix; ?>api_company_name">Company
                            Name</label></th>
                    <td><input type="text" id="<?php echo $daysmartsync_prefix; ?>api_company_name"
                               name="<?php echo $daysmartsync_prefix; ?>api_company_name"
                               value="<?php echo get_option($daysmartsync_prefix . 'api_company_name'); ?>"
                               class="regular-text"/></td>
                </tr>

                <tr>
                    <th scope="row"><label for="<?php echo $daysmartsync_prefix; ?>api_client_secret">Client
                            Secret</label></th>
                    <td><input type="text" id="<?php echo $daysmartsync_prefix; ?>api_client_secret"
                               name="<?php echo $daysmartsync_prefix; ?>api_client_secret"
                               value="<?php echo get_option($daysmartsync_prefix . 'api_client_secret'); ?>"
                               class="regular-text"/></td>
                </tr>

                <tr>
                    <th scope="row"><label for="<?php echo $daysmartsync_prefix; ?>api_client_id">Client ID</label></th>
                    <td><input type="text" id="<?php echo $daysmartsync_prefix; ?>api_client_id"
                               name="<?php echo $daysmartsync_prefix; ?>api_client_id"
                               value="<?php echo get_option($daysmartsync_prefix . 'api_client_id'); ?>"
                               class="regular-text"/></td>
                </tr>
            </table>
            <p class="submit"><input type="submit" name="<?php echo $daysmartsync_prefix; ?>api_authenticate"
                                     class="button-primary" value="Authenticate"></p>
        </form>
    </div>
    <?php
}

function daysmart_get_all_resources(){
    $daysmartsync_prefix = DAYSMARTSYNC_PREFIX;//'dsaioc_';

    $access_token = get_option($daysmartsync_prefix . 'api_token');
    if (!empty(trim($access_token))) {
        $url = DAYSMARTSYNC_API_BASE_URL . "resources";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);

        if (isset($error_msg)) {
            echo 'Error: in cUrl ';
            echo $error_msg;
        }

//        echo '<pre>'; print_r($access_token);
//        echo '<pre> response '; print_r($response); exit;

        return $response = json_decode($response);
    }else {
        // Send the response
        $response = array(
            'message' => 'Error',
            'data' => array()
        );
        wp_send_json_error($response);
    }
    wp_die();
}

function daysmart_get_all_event_types(){
    $daysmartsync_prefix = DAYSMARTSYNC_PREFIX;//'dsaioc_';

    $access_token = get_option($daysmartsync_prefix . 'api_token');
    if (!empty(trim($access_token))) {
        $url = DAYSMARTSYNC_API_BASE_URL . "event-types";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);

        if (isset($error_msg)) {
            echo 'Error: in cUrl ';
            echo $error_msg;
        }

//        echo '<pre>'; print_r($access_token);
//        echo '<pre> response '; print_r($response); exit;

        return $response = json_decode($response);
    }else {
        // Send the response
        $response = array(
            'message' => 'Error',
            'data' => array()
        );
        wp_send_json_error($response);
    }
    wp_die();
}

add_action( 'wp_ajax_daysmart_sync_events', 'daysmart_sync_events' ); // For logged-in users
function daysmart_sync_events(){
    $daysmartsync_prefix = DAYSMARTSYNC_PREFIX;//'dsaioc_';

    $access_token = 'eyJ0eXAiOiJKV1QiLCJheyJ0eXAiOiJKV1QiLCJh'; //get_option($daysmartsync_prefix . 'api_token');
    if (!empty(trim($access_token))) {
        $per_page = isset($_POST['per_page']) ? $_POST['per_page'] : 100;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $url = DAYSMARTSYNC_API_BASE_URL . "events?page[number]=$page&page[size]=$per_page";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);

        if (isset($error_msg)) {
            echo 'Error: in cUrl ';
            echo $error_msg;
        }

//        echo '<pre>'; print_r($access_token);
//        echo '<pre> response '; print_r($response); exit;

        $response = json_decode($response);

        $all_resources = daysmart_get_all_resources();
        if(isset($all_resources->data)){
            $all_resources = $all_resources->data;
        }

        $all_event_types = daysmart_get_all_event_types();
        if(isset($all_event_types->data)){
            $all_event_types = $all_event_types->data;
        }

        $processed_data_info = dsaioc_add_vcalendar_events_to_db($response->data, null, $response->meta->page->{'current-page'}, $response->meta->page->{'last-page'}, $all_resources, $all_event_types);
        // Send the response
        wp_send_json_success($processed_data_info);

    }else {
        // Send the response
        $response = array(
            'message' => 'Error',
            'data' => array()
        );
        wp_send_json_error($response);
    }
    wp_die();
}
function daysmart_sync_events_daily_cron($start='', $end=''){
    $daysmartsync_prefix = DAYSMARTSYNC_PREFIX;//'dsaioc_';

    $access_token = get_option($daysmartsync_prefix . 'api_token');
    if (!empty(trim($access_token))) {
        $start = !empty($start) ? 'filter[start__gte]='.$start: '';
        $end = !empty($end) ? '&filter[start__lte]='.$end: '';
        $url = DAYSMARTSYNC_API_BASE_URL . "events?$start".$end;
        daysmart_error_log('before anything sync event is scheduled -> '.$url, 'URL');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);

        if (isset($error_msg)) {
            daysmart_error_log($error_msg);
        }

//        echo '<pre>'; print_r($access_token);
//        echo '<pre> response '; print_r($response); exit;

        $response = json_decode($response);

        $all_resources = daysmart_get_all_resources();
        if(isset($all_resources->data)){
            $all_resources = $all_resources->data;
        }

        $all_event_types = daysmart_get_all_event_types();
        if(isset($all_event_types->data)){
            $all_event_types = $all_event_types->data;
        }

        $processed_data_info = dsaioc_add_vcalendar_events_to_db($response->data, null, $response->meta->page->{'current-page'}, $response->meta->page->{'last-page'}, $all_resources, $all_event_types);
        daysmart_error_log('Events imported.', 'success');

    }else {
        daysmart_error_log('Check your access token.');
    }
    wp_die();
}

function daysmart_error_log($msg='', $msg_type='error'){
    // Log a message
    $message = "$msg_type -> Cron job executed at: " . date('Y-m-d H:i:s') . "\n";
    $message .= "$msg_type: " . $msg. "\n";

    // Check if the log file exists
    $log_file = 'daysmart-events-cron-daily.txt';
    if (file_exists($log_file)) {
        // Append the log message to the file
        file_put_contents($log_file, $message, FILE_APPEND);
    } else {
        // Create a new log file and write the message
        file_put_contents($log_file, $message);
    }
}