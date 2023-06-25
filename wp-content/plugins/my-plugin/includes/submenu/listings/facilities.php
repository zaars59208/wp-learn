<?php
// Function to display the facilities submenu page
function listings_facilities_page() {
    echo '<h1>We will show all facilities here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_facilities_add_submenu');

// Function to add the submenu
function my_plugin_facilities_add_submenu() {
    add_submenu_page(
        'listings', // Parent menu slug (Listings)
        'Facilities', // Page title
        'Facilities', // Menu title
        'manage_options', // Capability required to access the submenu
        'listings-facilities', // Menu slug
        'listings_facilities_page' // Callback function to display the submenu page
    );
}
?>