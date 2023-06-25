<?php
/*
Plugin Name: My Plugin
Description: This is a sample plugin.
Version: 1.0.0
Author: Your Name
*/
require_once plugin_dir_path(__FILE__) . 'autoload.php';

function my_plugin_create_table()
{
    global $wpdb, $my_plugin_db_prefix;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'listings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
     id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);

    //Invoices
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'invoices';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
     id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);

    //Reviews
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'reviews';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
     id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);

    // Addresses => countries, states, cities, areas
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'addresses';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        full_address VARCHAR(255) NOT NULL,
        short_address VARCHAR(255) NOT NULL,
        listing_id INT(11) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'countries';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        capital VARCHAR(255),
        population INT,
        area FLOAT,
        currency VARCHAR(255),
        language VARCHAR(255),
        continent VARCHAR(255),
        timezone VARCHAR(255),
        government_type VARCHAR(255),
        calling_code VARCHAR(255),
        iso_code VARCHAR(255),
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'states';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        country_id INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (country_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'countries'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cities';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        state_id INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (state_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'states'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'areas';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        city_id INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (city_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'cities'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    // Addresses => countries, states, cities, areas

    // Memberships related database
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          user_id INT(11) NOT NULL,
          name VARCHAR(255) NOT NULL,
          description TEXT,
          is_free TINYINT(1) NOT NULL DEFAULT 0,
          is_unlimited_listings TINYINT(1) NOT NULL DEFAULT 0,
          max_listings INT(11),
          is_unlimited_featured_listings TINYINT(1) NOT NULL DEFAULT 0,
          max_featured_listings INT(11),
          is_unlimited_experiences TINYINT(1) NOT NULL DEFAULT 0,
          max_experiences INT(11),
          is_unlimited_featured_experiences TINYINT(1) NOT NULL DEFAULT 0,
          max_featured_experiences INT(11),
          membership_type ENUM('0', '1', '2') NOT NULL DEFAULT '0',
          PRIMARY KEY (id),
          FOREIGN KEY (user_id) REFERENCES users(id)
    ) $charset_collate;";

    dbDelta($sql);
    //membership_subscriptions
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'membership_subscriptions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          user_id INT(11) NOT NULL,
          membership_id INT(11) NOT NULL,
          start_date DATE NOT NULL,
          end_date DATE NOT NULL,
          is_expired TINYINT(1) NOT NULL DEFAULT 0,
          purchased_date DATETIME,
          trial_start_date DATE,
          trial_end_date DATE,
          is_trial_enabled TINYINT(1) NOT NULL DEFAULT 0,
          payment_gateway VARCHAR(255),
          payment_gateway_ref_id VARCHAR(255),
          is_refunded TINYINT(1) NOT NULL DEFAULT 0,
          refund_date DATETIME,
          refund_amount DECIMAL(10, 2),
          refund_reason TEXT,
          PRIMARY KEY (id),
          FOREIGN KEY (user_id) REFERENCES users(id),
          FOREIGN KEY (membership_id) REFERENCES memberships(id)
    ) $charset_collate;";

    dbDelta($sql);
}
register_activation_hook(__FILE__, 'my_plugin_create_table');

function enqueue_custom_admin_scripts()
{
    // Enqueue the jQUery CDN
    wp_enqueue_script('custom-admin-script-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');

    // Enqueue the CSS file
    wp_enqueue_style('custom-admin-style', plugin_dir_url(__FILE__) . 'assets/css/my-css.css');

    // Enqueue the JavaScript file
    wp_enqueue_script('custom-admin-script', plugin_dir_url(__FILE__) . 'assets/js/my-js.js');

}

add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');
