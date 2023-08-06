<?php
require_once plugin_dir_path(__FILE__) . 'view/testimonials/index.php';
require_once plugin_dir_path(__FILE__) . 'view/testimonials/add-update.php';

// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'testimonials_menu');
function testimonials_menu()
{
    add_menu_page(
        'Testimonials',
        'Testimonials',
        'manage_options',
        'testimonials',
        'testimonials_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function testimonials_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Testimonial') {
            // Handle adding a new testimonial
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_testimonial($data);
        } elseif ($_POST['submit'] === 'Update Testimonial') {
            // Handle updating a testimonial
            $testimonial_id = intval($_POST['testimonial_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_testimonial($testimonial_id, $data);
        } elseif ($_POST['submit'] === 'Delete Testimonial') {
            // Handle deleting a testimonial
            $testimonial_id = intval($_POST['testimonial_id']);
            delete_testimonial($testimonial_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_testimonial'])) {
        add_update_testimonial();
    }else{
        get_all_testimonials();
    }

}

// Insert a new testimonial
function insert_testimonial($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'testimonials';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all testimonials
function get_testimonials()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'testimonials';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a testimonial
function update_testimonial($testimonial_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'testimonials';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $testimonial_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a testimonial
function delete_testimonial($testimonial_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'testimonials';

    $wpdb->delete(
        $table_name,
        array('id' => $testimonial_id),
        array('%d')
    );
}
