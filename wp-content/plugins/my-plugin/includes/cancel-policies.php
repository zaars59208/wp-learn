<?php
require_once plugin_dir_path(__FILE__) . 'view/cancel-policies/index.php';
require_once plugin_dir_path(__FILE__) . 'view/cancel-policies/add-update.php';

// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'cancel_policies_menu');
function cancel_policies_menu()
{
    add_menu_page(
        'Cancel Policies',
        'Cancel Policies',
        'manage_options',
        'cancel-policies',
        'cancel_policies_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function cancel_policies_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Cancel Policy') {
            // Handle adding a new cancel_policy
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_cancel_policy($data);
        } elseif ($_POST['submit'] === 'Update Cancel Policy') {
            // Handle updating a cancel_policy
            $cancel_policy_id = intval($_POST['cancel_policy_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_cancel_policy($cancel_policy_id, $data);
        } elseif ($_POST['submit'] === 'Delete Cancel Policy') {
            // Handle deleting a cancel_policy
            $cancel_policy_id = intval($_POST['cancel_policy_id']);
            delete_cancel_policy($cancel_policy_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_cancel_policy'])) {
        add_update_cancel_policy();
    }else{
        get_all_cancel_policies();
    }

}

// Insert a new cancel_policy
function insert_cancel_policy($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cancel_policies';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all cancel_policies
function get_cancel_policies()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cancel_policies';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a cancel_policy
function update_cancel_policy($cancel_policy_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cancel_policies';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $cancel_policy_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a cancel_policy
function delete_cancel_policy($cancel_policy_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cancel_policies';

    $wpdb->delete(
        $table_name,
        array('id' => $cancel_policy_id),
        array('%d')
    );
}
