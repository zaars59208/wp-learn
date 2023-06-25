<?php
// Function to display the experience types submenu page
function experiences_types_page() {
    echo '<h1>We will show all experience types here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_experience_types_add_submenu');

// Function to add the submenu
function my_plugin_experience_types_add_submenu() {
    add_submenu_page(
        'experiences', // Parent menu slug (Experiences)
        'Types', // Page title
        'Types', // Menu title
        'manage_options', // Capability required to access the submenu
        'experiences-types', // Menu slug
        'experiences_types_page' // Callback function to display the submenu page
    );
}
?>