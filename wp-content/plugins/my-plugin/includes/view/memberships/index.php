<?php
function get_all_memberships(){
    $add_new_membership_link = add_query_arg('add_new_membership', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Memberships</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_membership_link; ?>"><?php echo esc_html__('Add New Membership', 'my-plugin'); ?></a>
                <?php
                // Display existing memberships in a table
                $memberships = get_memberships();

                if (!empty($memberships)) {
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
                        <?php foreach ($memberships as $membership) : ?>
                            <tr>
                                <td><?php echo esc_html($membership['title']); ?></td>
                                <td><?php echo esc_html($membership['description']); ?></td>
                                <td><?php echo esc_html($membership['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=memberships')); ?>">
                                        <input type="hidden" name="membership_id"
                                               value="<?php echo esc_attr($membership['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('memberships', 'admin', 'page', ['edit-membership-id', esc_attr($membership['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this membership?')" href="<?php echo myPluginGetAdminPageUrl('memberships', 'admin', 'page', ['delete-membership-id', esc_attr($membership['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No memberships found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
