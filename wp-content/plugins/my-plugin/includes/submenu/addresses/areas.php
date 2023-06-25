<?php
// Function to display the areas submenu page
function addresses_areas_page() {
    echo '<h1>We will show all areas here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_areas_add_submenu');

// Function to add the submenu
function my_plugin_areas_add_submenu() {
    add_submenu_page(
        'addresses', // Parent menu slug (Addresses)
        'Areas', // Page title
        'Areas', // Menu title
        'manage_options', // Capability required to access the submenu
        'addresses-areas', // Menu slug
        'addresses_areas_page' // Callback function to display the submenu page
    );
}
?>