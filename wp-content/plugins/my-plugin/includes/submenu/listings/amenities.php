<?php
// Function to display the amenities submenu page
function listings_amenities_page() {
    echo '<h1>We will show all amenities here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_amenities_add_submenu');

// Function to add the submenu
function my_plugin_amenities_add_submenu() {
    add_submenu_page(
        'listings', // Parent menu slug (Listings)
        'Amenities', // Page title
        'Amenities', // Menu title
        'manage_options', // Capability required to access the submenu
        'listings-amenities', // Menu slug
        'listings_amenities_page' // Callback function to display the submenu page
    );
}
?>