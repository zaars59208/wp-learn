<?php
// Function to display the listing types submenu page
function listings_types_page() {
    echo '<h1>We will show all listing types here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_listing_types_add_submenu');

// Function to add the submenu
function my_plugin_listing_types_add_submenu() {
    add_submenu_page(
        'listings', // Parent menu slug (Listings)
        'Types', // Page title
        'Types', // Menu title
        'manage_options', // Capability required to access the submenu
        'listings-types', // Menu slug
        'listings_types_page' // Callback function to display the submenu page
    );
}
?>