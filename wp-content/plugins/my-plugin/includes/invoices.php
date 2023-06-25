<?php
require_once plugin_dir_path(__FILE__) . 'view/invoices/index.php';
require_once plugin_dir_path(__FILE__) . 'view/invoices/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'invoices_menu');
function invoices_menu()
{
    add_menu_page(
        'Invoices',
        'Invoices',
        'manage_options',
        'invoices',
        'invoices_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function invoices_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Invoice') {
            // Handle adding a new invoice
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_invoice($data);
        } elseif ($_POST['submit'] === 'Update Invoice') {
            // Handle updating a invoice
            $invoice_id = intval($_POST['invoice_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_invoice($invoice_id, $data);
        } elseif ($_POST['submit'] === 'Delete Invoice') {
            // Handle deleting a invoice
            $invoice_id = intval($_POST['invoice_id']);
            delete_invoice($invoice_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_invoice'])) {
        add_update_invoice();
    }else{
        get_all_invoices();
    }

}

// Insert a new invoice
function insert_invoice($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'invoices';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all invoices
function get_invoices()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'invoices';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a invoice
function update_invoice($invoice_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'invoices';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $invoice_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a invoice
function delete_invoice($invoice_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'invoices';

    $wpdb->delete(
        $table_name,
        array('id' => $invoice_id),
        array('%d')
    );
}
