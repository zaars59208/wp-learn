<?php
require_once plugin_dir_path(__FILE__) . 'view/experiences/index.php';
require_once plugin_dir_path(__FILE__) . 'view/experiences/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'experiences_menu');
function experiences_menu()
{
    add_menu_page(
        'Experiences',
        'Experiences',
        'manage_options',
        'experiences',
        'experiences_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function experiences_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Experience') {
            // Handle adding a new experience
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_experience($data);
        } elseif ($_POST['submit'] === 'Update Experience') {
            // Handle updating a experience
            $experience_id = intval($_POST['experience_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_experience($experience_id, $data);
        } elseif ($_POST['submit'] === 'Delete Experience') {
            // Handle deleting a experience
            $experience_id = intval($_POST['experience_id']);
            delete_experience($experience_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_experience'])) {
        add_update_experience();
    }else{
        get_all_experiences();
    }

}

// Insert a new experience
function insert_experience($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experiences';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all experiences
function get_experiences()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experiences';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a experience
function update_experience($experience_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experiences';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $experience_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a experience
function delete_experience($experience_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experiences';

    $wpdb->delete(
        $table_name,
        array('id' => $experience_id),
        array('%d')
    );
}
