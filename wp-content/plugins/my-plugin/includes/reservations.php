<?php
// Function to display the reservations submenu page
function listings_reservations_page() {
    echo '<h1>We will show all reservations here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_reservations_add_submenu');

// Function to add the submenu
function my_plugin_reservations_add_submenu() {
    add_submenu_page(
        'listings', // Parent menu slug (Listings)
        'Reservations', // Page title
        'Reservations', // Menu title
        'manage_options', // Capability required to access the submenu
        'listings-reservations', // Menu slug
        'listings_reservations_page' // Callback function to display the submenu page
    );
}
?>