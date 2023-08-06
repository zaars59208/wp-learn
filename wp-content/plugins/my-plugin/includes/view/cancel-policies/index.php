<?php
function get_all_cancel_policies(){
    $add_new_cancel_policy_link = add_query_arg('add_new_cancel_policy', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Cancel Policies</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_cancel_policy_link; ?>"><?php echo esc_html__('Add New Cancel Policy', 'my-plugin'); ?></a>
                <?php
                // Display existing cancel_policies in a table
                $cancel_policies = get_cancel_policies();

                if (!empty($cancel_policies)) {
                    ?>
                    <table class="wp-list-table widefat fixed striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cancel_policies as $cancel_policy) : ?>
                            <tr>
                                <td><?php echo esc_html($cancel_policy['title']); ?></td>
                                <td><?php echo esc_html($cancel_policy['description']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=cancel_policies')); ?>">
                                        <input type="hidden" name="cancel_policy_id"
                                               value="<?php echo esc_attr($cancel_policy['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('cancel_policies', 'admin', 'page', ['edit-cancel-policy-id', esc_attr($cancel_policy['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this cancel policy?')" href="<?php echo myPluginGetAdminPageUrl('cancel-policies', 'admin', 'page', ['delete-cancel-policy-id', esc_attr($cancel_policy['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No cancel policies found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
