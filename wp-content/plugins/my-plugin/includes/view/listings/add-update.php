<?php
function add_update_listing(){
$page_heading = isset($_GET['listing_id']) && $_GET['listing_id'] ? 'Update Listing' : 'Add New Listing';
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content" style="position: relative;">
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
                    <form id="mp_listing_add_update" class="form-table" method="post"
                          action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                        <div class="form-tab-content active" id="addListingInformation"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingInformation.php'; ?></div>
                        <div class="form-tab-content" id="addListingPricing"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingPricing.php'; ?></div>
                        <div class="form-tab-content" id="addListingImageGallery"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingImageGallery.php'; ?></div>
                        <div class="form-tab-content" id="addListing360VirtualTour"><?php include plugin_dir_path(__FILE__) . 'tabs/addListing360VirtualTour.php'; ?></div>
                        <div class="form-tab-content" id="addListingVideo"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingVideo.php'; ?></div>
                        <div class="form-tab-content" id="addListingLocation"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingLocation.php'; ?></div>
                        <div class="form-tab-content" id="addListingBedrooms"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingBedrooms.php'; ?></div>
                        <div class="form-tab-content" id="addListingServices"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingServices.php'; ?></div>
                        <div class="form-tab-content" id="addListingTermAndRules"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingTermAndRules.php'; ?></div>
                        <div class="form-tab-content" id="addListingSlider"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingSlider.php'; ?></div>
                        <div class="form-tab-content" id="addListingSettings"><?php include plugin_dir_path(__FILE__) . 'tabs/addListingSettings.php'; ?></div>

                        <div class="my-actions">
                            <input type="button" name="draft-listing" id="save-post-as-draft"
                                   value="<?php echo __("Save Draft", "my-plugin"); ?>" class="button">
                            <input type="submit" class="button button-primary button-large float-right" name="submit"
                                   value="<?php echo __("Publish", "my-plugin"); ?>">
                        </div>
                    </form>
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
                </div>
            </div>

            <div id="postbox-container-1" class="postbox-container">
                <div id="side-sortables" class="meta-box-sortables ui-sortable" style="">
                    <div id="submitdiv" class="postbox ">
                        <div class="postbox-header"><h2 class="hndle ui-sortable-handle">Publish</h2></div>
                        <a class="float-right button button-primary button-large"
                           href="<?php echo myPluginGetAdminPageUrl('listings'); ?>"><?php echo esc_html__('Listings', 'my-plugin'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
    <?php } ?>
