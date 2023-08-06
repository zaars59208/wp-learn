<?php
require_once plugin_dir_path(__FILE__) . 'view/memberships/index.php';
require_once plugin_dir_path(__FILE__) . 'view/memberships/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'memberships_menu');
function memberships_menu()
{
    add_menu_page(
        'Memberships',
        'Memberships',
        'manage_options',
        'memberships',
        'memberships_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function memberships_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Membership') {
            // Handle adding a new membership
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_membership($data);
        } elseif ($_POST['submit'] === 'Update Membership') {
            // Handle updating a membership
            $membership_id = intval($_POST['membership_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_membership($membership_id, $data);
        } elseif ($_POST['submit'] === 'Delete Membership') {
            // Handle deleting a membership
            $membership_id = intval($_POST['membership_id']);
            delete_membership($membership_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_membership'])) {
        add_update_membership();
    }else{
        get_all_memberships();
    }

}

// Insert a new membership
function insert_membership($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all memberships
function get_memberships()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a membership
function update_membership($membership_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $membership_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a membership
function delete_membership($membership_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';

    $wpdb->delete(
        $table_name,
        array('id' => $membership_id),
        array('%d')
    );
}
