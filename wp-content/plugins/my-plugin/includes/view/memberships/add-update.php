<?php
function add_update_membership(){
    $page_heading = isset($_GET['membership_id']) && $_GET['membership_id'] ? 'Update Membership': 'Add New Membership';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('memberships'); ?>"><?php echo esc_html__('Memberships', 'my-plugin'); ?></a>
<div class="form-tabs">
    <ul class="form-tabs-nav">
        <li class="form-tab-link active"
            data-tab="addMembershipInformation"><?php echo esc_html__('Information', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipPricing"><?php echo esc_html__('Pricing', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipImageGallery"><?php echo esc_html__('Image Gallery', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembership360VirtualTour"><?php echo esc_html__('360° Virtual Tour', 'my-plugin'); ?></li>

        <li class="form-tab-link"
            data-tab="addMembershipVideo"><?php echo esc_html__('Video', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipLocation"><?php echo esc_html__('Location', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipBedrooms"><?php echo esc_html__('Bedrooms', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipServices"><?php echo esc_html__('Services', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipTermAndRules"><?php echo esc_html__('Terms & Rules', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipSlider"><?php echo esc_html__('Slider', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addMembershipSettings"><?php echo esc_html__('Settings', 'my-plugin'); ?></li>
    </ul>

    <div class="form-tab-content active" id="addMembershipInformation">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=memberships')); ?>">
            <table>
                <tr class="form-field">
                    <th scope="row">
                        <label for="title"><?php echo esc_html__('Title', 'my-plugin'); ?></label>
                    </th>
                    <td>
                        <input class="form-input" type="text" id="title" name="title" placeholder="title">
                    </td>
                </tr>
                <tr class="form-field">
                    <th scope="row">
                        <label for="description"><?php echo esc_html__('Description', 'my-plugin'); ?></label>
                    </th>
                    <td>
                                            <textarea class="form-input-wide" id="description"
                                                      name="description" placeholder="Description"></textarea>
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
                        <label for="featured">Make this membership as featured?</label>
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
                    <td><input type="submit" name="submit" value="Add Membership"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="form-tab-content" id="addMembershipPricing">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=memberships')); ?>">
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

    <div class="form-tab-content" id="addMembershipImageGallery">
        this is tab 3 addMembershipImageGallery
    </div>

    <div class="form-tab-content" id="addMembership360VirtualTour">
        this is tab 4 addMembership360VirtualTour
    </div>

    <div class="form-tab-content" id="addMembershipVideo">
        this is tab 5 addMembershipVideo
    </div>

    <div class="form-tab-content" id="addMembershipLocation">
        this is tab 6 addMembershipLocation
    </div>

    <div class="form-tab-content" id="addMembershipBedrooms">
        this is tab 7 addMembershipBedrooms
    </div>

    <div class="form-tab-content" id="addMembershipServices">
        this is tab 8 addMembershipServices
    </div>

    <div class="form-tab-content" id="addMembershipTermAndRules">
        this is tab 9 addMembershipTermAndRules
    </div>

    <div class="form-tab-content" id="addMembershipSlider">
        this is tab 10 addMembershipSlider
    </div>

    <div class="form-tab-content" id="addMembershipSettings">
        this is tab 11 addMembershipSettings
    </div>
</div>
<?php } ?>
