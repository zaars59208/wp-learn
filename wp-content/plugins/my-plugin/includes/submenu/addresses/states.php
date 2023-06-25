<?php
// Function to display the states submenu page
function addresses_states_page() {
    echo '<h1>We will show all states here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_states_add_submenu');

// Function to add the submenu
function my_plugin_states_add_submenu() {
    add_submenu_page(
        'addresses', // Parent menu slug (Addresses)
        'States', // Page title
        'States', // Menu title
        'manage_options', // Capability required to access the submenu
        'addresses-states', // Menu slug
        'addresses_states_page' // Callback function to display the submenu page
    );
}
?>