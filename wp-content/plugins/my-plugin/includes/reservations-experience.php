<?php
// Function to display the reservations submenu page
function experiences_reservations_page() {
    echo '<h1>We will show all reservations here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_reservations_exp_add_submenu');

// Function to add the submenu
function my_plugin_reservations_exp_add_submenu() {
    add_submenu_page(
        'experiences', // Parent menu slug (Experiences)
        'Reservations', // Page title
        'Reservations', // Menu title
        'manage_options', // Capability required to access the submenu
        'experiences-reservations', // Menu slug
        'experiences_reservations_page' // Callback function to display the submenu page
    );
}
?>