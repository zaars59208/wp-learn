<?php
function add_update_address(){
    $page_heading = isset($_GET['address_id']) && $_GET['address_id'] ? 'Update Address': 'Add New Address';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('addresses'); ?>"><?php echo esc_html__('Addresses', 'my-plugin'); ?></a>
<div class="form-tabs">
    <ul class="form-tabs-nav">
        <li class="form-tab-link active"
            data-tab="addAddressInformation"><?php echo esc_html__('All Addresses', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addAddressCountry"><?php echo esc_html__('Country', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addAddressState"><?php echo esc_html__('State', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addAddressCity"><?php echo esc_html__('City', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addAddressArea"><?php echo esc_html__('Area', 'my-plugin'); ?></li>
    </ul>

    <div class="form-tab-content active" id="addAddressInformation">
        All addresses will  be listed here..
    </div>

    <div class="form-tab-content" id="addAddressCountry">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=addresses')); ?>">
            <table>
                <tr class="form-field">
                    <th scope="row">
                        <label for="booking_type">Country:</label>
                    </th>
                    <td>
                        <select id="booking_type" name="booking_type">
                            <option value="pakistan">Pakistan</option>
                            <option value="india">India</option>
                            <option value="africa">South Africa</option>
                            <option value="bangladesh">Bangladesh</option>
                            <option value="africa">Africa</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="form-tab-content" id="addAddressState">
        this is tab 3 addAddressState
    </div>

    <div class="form-tab-content" id="addAddressCity">
        this is tab 4 addAddressCity
    </div>

    <div class="form-tab-content" id="addAddressArea">
        this is tab 5 addAddressArea
    </div>
</div>
<?php } ?>
