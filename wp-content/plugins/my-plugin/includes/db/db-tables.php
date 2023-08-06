<?php
function my_plugin_create_table()
{
    global $wpdb, $my_plugin_db_prefix;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $DROP_TABLES = 1;
    if($DROP_TABLES == 1 && 1==2){
        $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'countries';
        dbDelta("DROP TABLE $table_name");

        $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'states';
        dbDelta("DROP TABLE $table_name");

        $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cities';
        dbDelta("DROP TABLE $table_name");

        $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'memberships';
        dbDelta("DROP TABLE $table_name");

    }

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

    // Experiences

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experiences';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          host_id INT(11) NOT NULL,
          title VARCHAR(255) NOT NULL,
          description TEXT,
          location VARCHAR(255),
          duration INT(11),
          price DECIMAL(10, 2),
          capacity INT(11),
          created_at DATETIME,
          updated_at DATETIME,
          PRIMARY KEY (id),
          FOREIGN KEY (host_id) REFERENCES ". $wpdb->prefix . 'users'."(ID)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experience_brings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          experience_id INT(11) NOT NULL,
          bring_item VARCHAR(255) NOT NULL,
          notes TEXT,
          PRIMARY KEY (id),
          FOREIGN KEY (experience_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'experiences'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'experience_provides';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          experience_id INT(11) NOT NULL,
          provide_item VARCHAR(255) NOT NULL,
          notes TEXT,
          PRIMARY KEY (id),
          FOREIGN KEY (experience_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'experiences'."(id)
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
        country_id INT(11) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (country_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'countries'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cities';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        state_id INT(11) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (state_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'states'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'areas';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        city_id INT(11) NOT NULL,
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
          FOREIGN KEY (user_id) REFERENCES ". $wpdb->prefix . 'users'."(ID)
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
          FOREIGN KEY (user_id) REFERENCES ". $wpdb->prefix . 'users'."(ID),
          FOREIGN KEY (membership_id) REFERENCES ". $wpdb->prefix . $my_plugin_db_prefix . 'memberships'."(id)
    ) $charset_collate;";

    dbDelta($sql);

    //testimonials
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'testimonials';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          reviewer_name VARCHAR(255) NOT NULL,
          reviewer_email VARCHAR(255),
          review_text TEXT,
          reviewer_photo_id INT(11),
          reviewer_position VARCHAR(255),
          reviewer_company_name VARCHAR(255),
          attachment_id INT(11),
          created_at DATETIME,
          PRIMARY KEY (id)
          ) $charset_collate;";

    dbDelta($sql);

    //partners
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'partners';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          partner_name VARCHAR(255) NOT NULL,
          partner_email VARCHAR(255),
          reviewer_photo_id INT(11),
          created_at DATETIME,
          PRIMARY KEY (id)
          ) $charset_collate;";

    dbDelta($sql);

    //cancel policies
    $table_name = $wpdb->prefix . $my_plugin_db_prefix . 'cancel_policies';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
          id INT(11) NOT NULL AUTO_INCREMENT,
          policy_text TEXT,
          created_at DATETIME,
          PRIMARY KEY (id)
          ) $charset_collate;";

    dbDelta($sql);

}