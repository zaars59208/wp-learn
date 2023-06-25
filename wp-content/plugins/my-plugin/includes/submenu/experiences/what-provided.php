<?php
// Function to display the what_provides submenu page
function experiences_what_provides_page() {
    echo '<h1>We will show all what_provides here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_what_provides_add_submenu');

// Function to add the submenu
function my_plugin_what_provides_add_submenu() {
    add_submenu_page(
        'experiences', // Parent menu slug (Experiences)
        'What Provides', // Page title
        'What Provides', // Menu title
        'manage_options', // Capability required to access the submenu
        'experiences-what-provides', // Menu slug
        'experiences_what_provides_page' // Callback function to display the submenu page
    );
}
?>