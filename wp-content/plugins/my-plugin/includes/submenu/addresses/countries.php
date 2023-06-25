<?php
// Function to display the countries submenu page
function addresses_countries_page() {
    echo '<h1>We will show all countries here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_countries_add_submenu');

// Function to add the submenu
function my_plugin_countries_add_submenu() {
    add_submenu_page(
        'addresses', // Parent menu slug (Addresses)
        'Countries', // Page title
        'Countries', // Menu title
        'manage_options', // Capability required to access the submenu
        'addresses-countries', // Menu slug
        'addresses_countries_page' // Callback function to display the submenu page
    );
}
?>