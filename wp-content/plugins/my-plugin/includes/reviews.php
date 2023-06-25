<?php
require_once plugin_dir_path(__FILE__) . 'view/reviews/index.php';
require_once plugin_dir_path(__FILE__) . 'view/reviews/add-update.php';


// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'reviews_menu');
function reviews_menu()
{
    add_menu_page(
        'Reviews',
        'Reviews',
        'manage_options',
        'reviews',
        'reviews_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function reviews_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Review') {
            // Handle adding a new review
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_review($data);
        } elseif ($_POST['submit'] === 'Update Review') {
            // Handle updating a review
            $review_id = intval($_POST['review_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_review($review_id, $data);
        } elseif ($_POST['submit'] === 'Delete Review') {
            // Handle deleting a review
            $review_id = intval($_POST['review_id']);
            delete_review($review_id);
        }
    }

    // Step 3: Render the form HTML
    if (isset($_GET['add_new_review'])) {
        add_update_review();
    }else{
        get_all_reviews();
    }

}

// Insert a new review
function insert_review($data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'reviews';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all reviews
function get_reviews()
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'reviews';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a review
function update_review($review_id, $data)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'reviews';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $review_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a review
function delete_review($review_id)
{
    global $wpdb, $my_plugin_db_prefix;
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'reviews';

    $wpdb->delete(
        $table_name,
        array('id' => $review_id),
        array('%d')
    );
}
