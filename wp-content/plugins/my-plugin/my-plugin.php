<?php
/*
Plugin Name: My Plugin
Description: This is a sample plugin.
Version: 1.0.0
Author: Your Name
*/

//main menu
// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu()
{
    add_menu_page(
        'My Plugin',
        'My Plugin',
        'manage_options',
        'my-plugin',
        'my_plugin_page'
    );
}

function my_plugin_page()
{
    echo 'This is a page where we will put dashboard of My Plugin (Listing theme)';
}

require_once plugin_dir_path(__FILE__) . 'autoload.php';
require_once plugin_dir_path(__FILE__) . 'includes/db/db-tables.php';

register_activation_hook(__FILE__, 'my_plugin_create_table');

function enqueue_custom_admin_scripts()
{
    // Enqueue the jQUery CDN
    wp_enqueue_script('custom-admin-script-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');

    // Enqueue the CSS file
    wp_enqueue_style('custom-admin-style', plugin_dir_url(__FILE__) . 'assets/css/my-css.css');
    wp_enqueue_style('custom-admin-style-2', plugin_dir_url(__FILE__) . 'assets/css/admin.css');
    wp_enqueue_style('custom-admin-style-columns', plugin_dir_url(__FILE__) . 'assets/css/columns.css');

    // Enqueue the JavaScript file
    wp_enqueue_script('custom-admin-script-mpjs', plugin_dir_url(__FILE__) . 'assets/js/my-js.js');
    // Enqueue the jquery.validate.min.js
    wp_enqueue_script('custom-admin-script-validate', plugin_dir_url(__FILE__) . 'assets/js/vendor/jquery/jquery.validate.min.js');
}

add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');
