<?php
require_once plugin_dir_path(__FILE__) . 'view/partners/index.php';
require_once plugin_dir_path(__FILE__) . 'view/partners/add-update.php';

// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'partners_menu');
function partners_menu()
{
    add_menu_page(
        'Partners',
        'Partners',
        'manage_options',
        'partners',
        'partners_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function partners_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Partner') {
            // Handle adding a new partner
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_partner($data);
        } elseif ($_POST['submit'] === 'Update Partner') {
            // Handle updating a partner
            $partner_id = intval($_POST['partner_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_partner($partner_id, $data);
        } elseif ($_POST['submit'] === 'Delete Partner') {
            // Handle deleting a partner
            $partner_id = intval($_POST['partner_id']);
            delete_partner($partner_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_partner'])) {
        add_update_partner();
    }else{
        get_all_partners();
    }

}

// Insert a new partner
function insert_partner($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'partners';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all partners
function get_partners()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'partners';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a partner
function update_partner($partner_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'partners';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $partner_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a partner
function delete_partner($partner_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'partners';

    $wpdb->delete(
        $table_name,
        array('id' => $partner_id),
        array('%d')
    );
}
