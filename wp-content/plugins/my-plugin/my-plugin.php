<?php
/*
Plugin Name: My Plugin
Description: This is a sample plugin.
Version: 1.0.0
Author: Your Name
*/

function my_plugin_create_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
     id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

register_activation_hook(__FILE__, 'my_plugin_create_table');

// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'listings_menu');
function listings_menu()
{
    add_menu_page(
        'Listings',
        'Listings',
        'manage_options',
        'listings',
        'listings_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function listings_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Listing') {
            // Handle adding a new listing
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_listing($data);
        } elseif ($_POST['submit'] === 'Update Listing') {
            // Handle updating a listing
            $listing_id = intval($_POST['listing_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            update_listing($listing_id, $data);
        } elseif ($_POST['submit'] === 'Delete Listing') {
            // Handle deleting a listing
            $listing_id = intval($_POST['listing_id']);
            delete_listing($listing_id);
        }
    }

    // Step 3: Render the form HTML
    ?>
    <div class="wrap">
        <div class="wp-heading-inline">This is listing</div>
        <hr class="wp-header-end">
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="post-body-content" style="position: relative;">

                    <h1><?php echo esc_html__('Add New Listing', 'my-plugin'); ?></h1>
                    <div class="form-tabs">
                        <ul class="form-tabs-nav">
                            <li class="form-tab-link active"
                                data-tab="addListingInformation"><?php echo esc_html__('Information', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingPricing"><?php echo esc_html__('Pricing', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingImageGallery"><?php echo esc_html__('Image Gallery', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListing360VirtualTour"><?php echo esc_html__('360° Virtual Tour', 'my-plugin'); ?></li>

                            <li class="form-tab-link"
                                data-tab="addListingVideo"><?php echo esc_html__('Video', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingLocation"><?php echo esc_html__('Location', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingBedrooms"><?php echo esc_html__('Bedrooms', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingServices"><?php echo esc_html__('Services', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingTermAndRules"><?php echo esc_html__('Terms & Rules', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingSlider"><?php echo esc_html__('Slider', 'my-plugin'); ?></li>
                            <li class="form-tab-link"
                                data-tab="addListingSettings"><?php echo esc_html__('Settings', 'my-plugin'); ?></li>
                        </ul>

                        <div class="form-tab-content active" id="addListingInformation">
                            <form class="form-table" method="post"
                                  action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                                <table>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="title"><?php echo esc_html__('Title', 'my-plugin'); ?></label>
                                        </th>
                                        <td>
                                            <input class="form-input" type="text" id="title" name="title">
                                        </td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="description"><?php echo esc_html__('Description', 'my-plugin'); ?></label>
                                        </th>
                                        <td>
                                            <textarea class="form-input-wide" id="description"
                                                      name="description"></textarea>
                                        </td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="price">Price:</label>
                                        </th>
                                        <td>
                                            <input class="form-input" type="text" id="price" name="price">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                            <label for="number_of_bedrooms">Number of bedrooms:</label>
                                        </th>
                                        <td class="form-field"><input type="text" id="number_of_bedrooms"
                                                                      name="number_of_bedrooms"
                                                                      placeholder="Enter number of bedrooms"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="number_of_guests">Number of guests:</label>
                                        </th>
                                        <td><input type="text" id="number_of_guests" name="number_of_guests"
                                                   placeholder="Enter number of guests"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="number_of_beds">Number of beds:</label>
                                        </th>
                                        <td><input type="text" id="number_of_beds" name="number_of_beds"
                                                   placeholder="Enter number of beds"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="number_of_bathrooms">Number of bathrooms:</label>
                                        </th>
                                        <td><input type="text" id="number_of_bathrooms" name="number_of_bathrooms"
                                                   placeholder="Enter number of bathrooms"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="size">Size:</label>
                                        </th>
                                        <td><input type="text" id="size" name="size"
                                                   placeholder="Enter the size. Only numbers"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="unit_of_measure">Unit of measure:</label>
                                        </th>
                                        <td><input type="text" id="unit_of_measure" name="unit_of_measure"
                                                   placeholder="Enter the unit of measure. Ex. SqFt"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="number_of_rooms">Number of rooms:</label>
                                        </th>
                                        <td><input type="text" id="number_of_rooms" name="number_of_rooms"
                                                   placeholder="Enter number of rooms"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="featured">Make this listing as featured?</label>
                                        </th>
                                        <td>
                                            <label><input type="radio" id="featured_yes" name="featured" value="yes">
                                                Yes</label>
                                            <label><input type="radio" id="featured_no" name="featured" value="no">
                                                No</label>
                                        </td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="affiliate_booking_link">Affiliate Booking Link:</label>
                                        </th>
                                        <td><input type="text" id="affiliate_booking_link" name="affiliate_booking_link"
                                                   placeholder="Enter affiliate booking link"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Opening Hours</strong></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="open_time_mon_fri">Monday to Friday - Open Time:</label>
                                        </th>
                                        <td><input type="time" id="open_time_mon_fri" name="open_time_mon_fri"></td>
                                    </tr>
                                    <tr class="form-field">
                                        <th scope="row">
                                            <label for="close_time_mon_fri">Monday to Friday - Close Time:</label>
                                        </th>
                                        <td><input type="time" id="close_time_mon_fri" name="close_time_mon_fri"></td>
                                        <td><input type="submit" name="submit" value="Add Listing"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                        <div class="form-tab-content" id="addListingPricing">
                            <form class="form-table" method="post"
                                  action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                                <table>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="booking_type">Booking Type:</label>
                                </th>
                                <td>
                                    <select id="booking_type" name="booking_type">
                                        <option value="per_day">Per Day</option>
                                        <option value="nightly">Nightly</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="price">Price:</label>
                                </th>
                                <td><input type="text" id="price" name="price" placeholder="Enter Price"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="after_price_label">After Price Label:</label>
                                </th>
                                <td><input type="text" id="after_price_label" name="after_price_label" placeholder="Enter after price label. Eg: Night/Hr"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="weekend_price">Weekends:</label>
                                </th>
                                <td>
                                    <input type="text" id="weekend_price" name="weekend_price" placeholder="Enter the unit price for a single day">
                                    <p>Select the days to apply weekend pricing:</p>
                                    <label><input type="checkbox" name="weekend_days[]" value="saturday"> Saturday</label>
                                    <label><input type="checkbox" name="weekend_days[]" value="sunday"> Sunday</label>
                                </td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="weekly_price">LONG-TERM PRICING - Weekly - 7+ nights:</label>
                                </th>
                                <td><input type="text" id="weekly_price" name="weekly_price" placeholder="Enter the unit price for a single day"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="monthly_price">LONG-TERM PRICING - Monthly - 30+ nights:</label>
                                </th>
                                <td><input type="text" id="monthly_price" name="monthly_price" placeholder="Enter the unit price for a single day"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="allow_additional_guests">ADDITIONAL COSTS - Allow additional guests:</label>
                                </th>
                                <td>
                                    <label><input type="radio" id="additional_guests_yes" name="allow_additional_guests" value="yes"> Yes</label>
                                    <label><input type="radio" id="additional_guests_no" name="allow_additional_guests" value="no"> No</label>
                                </td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="additional_guests_price">ADDITIONAL COSTS - Additional guests:</label>
                                </th>
                                <td><input type="text" id="additional_guests_price" name="additional_guests_price" placeholder="Enter the price for 1 additional guest"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="number_of_guests">ADDITIONAL COSTS - No of Guests:</label>
                                </th>
                                <td><input type="text" id="number_of_guests" name="number_of_guests" placeholder="Enter the number of additional guests allowed"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="cleaning_fee">ADDITIONAL COSTS - Cleaning fee:</label>
                                </th>
                                <td><input type="text" id="cleaning_fee" name="cleaning_fee" placeholder="Enter the price for cleaning fee"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="cleaning_fee_type">ADDITIONAL COSTS - Cleaning fee type:</label>
                                </th>
                                <td>
                                    <select id="cleaning_fee_type" name="cleaning_fee_type">
                                        <option value="daily">Daily</option>
                                        <option value="per_stay">Per stay</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="city_fee">ADDITIONAL COSTS - City fee:</label>
                                </th>
                                <td><input type="text" id="city_fee" name="city_fee" placeholder="Enter the price for city fee"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="city_fee_type">ADDITIONAL COSTS - City fee type:</label>
                                </th>
                                <td>
                                    <select id="city_fee_type" name="city_fee_type">
                                        <option value="daily">Daily</option>
                                        <option value="per_stay">Per stay</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="security_deposit">ADDITIONAL COSTS - Security deposit:</label>
                                </th>
                                <td><input type="text" id="security_deposit" name="security_deposit" placeholder="Enter the price for security deposit"></td>
                            </tr>
                            <tr class="form-field">
                                <th scope="row">
                                    <label for="tax_percentage">ADDITIONAL COSTS - Tax %:</label>
                                </th>
                                <td><input type="text" id="tax_percentage" name="tax_percentage" placeholder="Enter the tax percentage (only number)"></td>
                            </tr>
                            </table>
                            </form>
                        </div>

                        <div class="form-tab-content" id="addListingImageGallery">
                            this is tab 3 addListingImageGallery
                        </div>

                        <div class="form-tab-content" id="addListing360VirtualTour">
                            this is tab 4 addListing360VirtualTour
                        </div>

                        <div class="form-tab-content" id="addListingVideo">
                            this is tab 5 addListingVideo
                        </div>

                        <div class="form-tab-content" id="addListingLocation">
                            this is tab 6 addListingLocation
                        </div>

                        <div class="form-tab-content" id="addListingBedrooms">
                            this is tab 7 addListingBedrooms
                        </div>

                        <div class="form-tab-content" id="addListingServices">
                            this is tab 8 addListingServices
                        </div>

                        <div class="form-tab-content" id="addListingTermAndRules">
                            this is tab 9 addListingTermAndRules
                        </div>

                        <div class="form-tab-content" id="addListingSlider">
                            this is tab 10 addListingSlider
                        </div>

                        <div class="form-tab-content" id="addListingSettings">
                            this is tab 11 addListingSettings
                        </div>
                    </div>
                    <h2>Manage Listings</h2>
                    <?php
                    // Display existing listings in a table
                    $listings = get_listings();

                    if (!empty($listings)) {
                        ?>
                        <table class="wp-list-table widefat fixed striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listings as $listing) : ?>
                                <tr>
                                    <td><?php echo esc_html($listing['title']); ?></td>
                                    <td><?php echo esc_html($listing['description']); ?></td>
                                    <td><?php echo esc_html($listing['price']); ?></td>
                                    <td>
                                        <form method="post"
                                              action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                                            <input type="hidden" name="listing_id"
                                                   value="<?php echo esc_attr($listing['id']); ?>">
                                            <input type="submit" name="submit" value="Update Listing">
                                            <input type="submit" name="submit" value="Delete Listing"
                                                   onclick="return confirm('Are you sure you want to delete this listing?')">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo 'No listings found.';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Insert a new listing
function insert_listing($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all listings
function get_listings()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a listing
function update_listing($listing_id, $data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $listing_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}

// Delete a listing
function delete_listing($listing_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->delete(
        $table_name,
        array('id' => $listing_id),
        array('%d')
    );
}

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
