<?php
require_once plugin_dir_path(__FILE__) . 'view/listings/index.php';
require_once plugin_dir_path(__FILE__) . 'view/listings/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'listings_menu');
function listings_menu()
{
    add_menu_page(
        'Listings',
        'Listings',
        'manage_options',
        'listings',
        'listings_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function listings_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Listing') {
            // Handle adding a new listing
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_listing($data);
        } elseif ($_POST['submit'] === 'Update Listing') {
            // Handle updating a listing
            $listing_id = intval($_POST['listing_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_listing($listing_id, $data);
        } elseif ($_POST['submit'] === 'Delete Listing') {
            // Handle deleting a listing
            $listing_id = intval($_POST['listing_id']);
            delete_listing($listing_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_listing'])) {
        add_update_listing();
    }else{
        get_all_listings();
    }

}

// Insert a new listing
function insert_listing($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'listings';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all listings
function get_listings()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'listings';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a listing
function update_listing($listing_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'listings';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $listing_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a listing
function delete_listing($listing_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'listings';

    $wpdb->delete(
        $table_name,
        array('id' => $listing_id),
        array('%d')
    );
}
