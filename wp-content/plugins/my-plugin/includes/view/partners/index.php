<?php
function get_all_partners(){
    $add_new_partner_link = add_query_arg('add_new_partner', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Partners</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_partner_link; ?>"><?php echo esc_html__('Add New Partners', 'my-plugin'); ?></a>
                <?php
                // Display existing partners in a table
                $partners = get_partners();

                if (!empty($partners)) {
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
                        <?php foreach ($partners as $partner) : ?>
                            <tr>
                                <td><?php echo esc_html($partner['title']); ?></td>
                                <td><?php echo esc_html($partner['description']); ?></td>
                                <td><?php echo esc_html($partner['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=partners')); ?>">
                                        <input type="hidden" name="partner_id"
                                               value="<?php echo esc_attr($partner['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('partners', 'admin', 'page', ['edit-partner-id', esc_attr($partner['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this partner?')" href="<?php echo myPluginGetAdminPageUrl('partners', 'admin', 'page', ['delete-partner-id', esc_attr($partner['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No partners found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
