<?php
function add_update_testimonial(){
    $page_heading = isset($_GET['testimonial_id']) && $_GET['testimonial_id'] ? 'Update Testimonials': 'Add New Testimonials';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('testimonials'); ?>"><?php echo esc_html__('Testimonials', 'my-plugin'); ?></a>
<div class="form-tabs">
    <ul class="form-tabs-nav">
        <li class="form-tab-link active"
            data-tab="addTestimonialsInformation"><?php echo esc_html__('Information', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addTestimonialsSettings"><?php echo esc_html__('Settings', 'my-plugin'); ?></li>

    </ul>

    <div class="form-tab-content active" id="addTestimonialsInformation">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=testimonials')); ?>">
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
                    <td><input type="submit" name="submit" value="Add Testimonials"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="form-tab-content" id="addTestimonialsSettings">
        this is tab 11 addTestimonialsSettings
    </div>
</div>
<?php } ?>
