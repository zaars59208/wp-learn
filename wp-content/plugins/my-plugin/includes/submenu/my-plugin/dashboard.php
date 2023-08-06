<?php
// Function to display the currencies submenu page
function my_plugin_currencies_page() {
    echo '<h1>We will show all currencies here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_currencies_add_submenu');

// Function to add the submenu
function my_plugin_currencies_add_submenu() {
    add_submenu_page(
        'my-plugin', // Parent menu slug (My Plugin)
        'Currencies', // Page title
        'Currencies', // Menu title
        'manage_options', // Capability required to access the submenu
        'my-plugin-currencies', // Menu slug
        'my-plugin_currencies_page' // Callback function to display the submenu page
    );
}
?>