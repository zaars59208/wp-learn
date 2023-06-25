<?php
// Function to display the cities submenu page
function addresses_cities_page() {
    echo '<h1>We will show all cities here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_cities_add_submenu');

// Function to add the submenu
function my_plugin_cities_add_submenu() {
    add_submenu_page(
        'addresses', // Parent menu slug (Addresses)
        'Cities', // Page title
        'Cities', // Menu title
        'manage_options', // Capability required to access the submenu
        'addresses-cities', // Menu slug
        'addresses_cities_page' // Callback function to display the submenu page
    );
}
?>