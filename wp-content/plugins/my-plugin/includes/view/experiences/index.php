<?php
function get_all_experiences(){
    $add_new_experience_link = add_query_arg('add_new_experience', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Experiences</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_experience_link; ?>"><?php echo esc_html__('Add New Experience', 'my-plugin'); ?></a>
                <?php
                // Display existing experiences in a table
                $experiences = get_experiences();

                if (!empty($experiences)) {
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
                        <?php foreach ($experiences as $experience) : ?>
                            <tr>
                                <td><?php echo esc_html($experience['title']); ?></td>
                                <td><?php echo esc_html($experience['description']); ?></td>
                                <td><?php echo esc_html($experience['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=experiences')); ?>">
                                        <input type="hidden" name="experience_id"
                                               value="<?php echo esc_attr($experience['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('experiences', 'admin', 'page', ['edit-experience-id', esc_attr($experience['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this experience?')" href="<?php echo myPluginGetAdminPageUrl('experiences', 'admin', 'page', ['delete-experience-id', esc_attr($experience['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No experiences found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
