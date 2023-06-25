<?php
require_once plugin_dir_path(__FILE__) . 'view/addresses/index.php';
require_once plugin_dir_path(__FILE__) . 'view/addresses/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'addresses_menu');
function addresses_menu()
{
    add_menu_page(
        'Addresses',
        'Addresses',
        'manage_options',
        'addresses',
        'addresses_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function addresses_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Address') {
            // Handle adding a new address
            $full_address = sanitize_text_field($_POST['full_address']);

            $data = array(
                'full_address' => $full_address
            );

            insert_address($data);
        } elseif ($_POST['submit'] === 'Update Address') {
            // Handle updating a address
            $address_id = intval($_POST['address_id']);
            $full_address = sanitize_text_field($_POST['full_address']);

            $data = array(
                'full_address' => $full_address
            );

            update_address($address_id, $data);
        } elseif ($_POST['submit'] === 'Delete Address') {
            // Handle deleting a address
            $address_id = intval($_POST['address_id']);
            delete_address($address_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_address'])) {
        add_update_address();
    }else{
        get_all_addresses();
    }

}

// Insert a new address
function insert_address($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'addresses';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all addresses
function get_addresses()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'addresses';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a address
function update_address($address_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'addresses';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $address_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a address
function delete_address($address_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'addresses';

    $wpdb->delete(
        $table_name,
        array('id' => $address_id),
        array('%d')
    );
}
