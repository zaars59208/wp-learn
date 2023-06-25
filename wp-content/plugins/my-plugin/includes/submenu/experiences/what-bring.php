<?php
// Function to display the what_brings submenu page
function experiences_what_brings_page() {
    echo '<h1>We will show all what_brings here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_what_brings_add_submenu');

// Function to add the submenu
function my_plugin_what_brings_add_submenu() {
    add_submenu_page(
        'experiences', // Parent menu slug (Experiences)
        'What Brings', // Page title
        'What Brings', // Menu title
        'manage_options', // Capability required to access the submenu
        'experiences-what-brings', // Menu slug
        'experiences_what_brings_page' // Callback function to display the submenu page
    );
}
?>