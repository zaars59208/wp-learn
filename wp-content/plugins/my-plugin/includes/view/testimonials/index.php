<?php
function get_all_testimonials(){
    $add_new_testimonial_link = add_query_arg('add_new_testimonial', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Testimonials</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_testimonial_link; ?>"><?php echo esc_html__('Add New Testimonials', 'my-plugin'); ?></a>
                <?php
                // Display existing testimonials in a table
                $testimonials = get_testimonials();

                if (!empty($testimonials)) {
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
                        <?php foreach ($testimonials as $testimonial) : ?>
                            <tr>
                                <td><?php echo esc_html($testimonial['title']); ?></td>
                                <td><?php echo esc_html($testimonial['description']); ?></td>
                                <td><?php echo esc_html($testimonial['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=testimonials')); ?>">
                                        <input type="hidden" name="testimonial_id"
                                               value="<?php echo esc_attr($testimonial['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('testimonials', 'admin', 'page', ['edit-testimonial-id', esc_attr($testimonial['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this testimonial?')" href="<?php echo myPluginGetAdminPageUrl('testimonials', 'admin', 'page', ['delete-testimonial-id', esc_attr($testimonial['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No testimonials found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
