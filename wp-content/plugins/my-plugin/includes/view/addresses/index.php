<?php
function get_all_addresses(){
    $add_new_listing_link = add_query_arg('add_new_listing', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Addresses</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_listing_link; ?>"><?php echo esc_html__('Add New Listing', 'my-plugin'); ?></a>
                <?php
                // Display existing addresses in a table
                $addresses = get_addresses();

                if (!empty($addresses)) {
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
                        <?php foreach ($addresses as $listing) : ?>
                            <tr>
                                <td><?php echo esc_html($listing['title']); ?></td>
                                <td><?php echo esc_html($listing['description']); ?></td>
                                <td><?php echo esc_html($listing['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=addresses')); ?>">
                                        <input type="hidden" name="listing_id"
                                               value="<?php echo esc_attr($listing['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('addresses', 'admin', 'page', ['edit-listing-id', esc_attr($listing['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this listing?')" href="<?php echo myPluginGetAdminPageUrl('addresses', 'admin', 'page', ['delete-listing-id', esc_attr($listing['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No addresses found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
