<?php
// Function to display the membership subscriptions submenu page
function memberships_subscriptions_page() {
    echo '<h1>We will show all membership subscriptions here.</h1>';
}

// Hook into the admin_menu action to add the submenu
add_action('admin_menu', 'my_plugin_subscriptions_add_submenu');

// Function to add the submenu
function my_plugin_subscriptions_add_submenu() {
    add_submenu_page(
        'memberships', // Parent menu slug (Memberships)
        'Subscriptions', // Page title
        'Subscriptions', // Menu title
        'manage_options', // Capability required to access the submenu
        'memberships-subscriptions', // Menu slug
        'memberships_subscriptions_page' // Callback function to display the submenu page
    );
}
?>