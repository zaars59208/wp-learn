<?php
function get_all_reviews(){
    $add_new_review_link = add_query_arg('add_new_review', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Reviews</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_review_link; ?>"><?php echo esc_html__('Add New Review', 'my-plugin'); ?></a>
                <?php
                // Display existing reviews in a table
                $reviews = get_reviews();

                if (!empty($reviews)) {
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
                        <?php foreach ($reviews as $review) : ?>
                            <tr>
                                <td><?php echo esc_html($review['title']); ?></td>
                                <td><?php echo esc_html($review['description']); ?></td>
                                <td><?php echo esc_html($review['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=reviews')); ?>">
                                        <input type="hidden" name="review_id"
                                               value="<?php echo esc_attr($review['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('reviews', 'admin', 'page', ['edit-review-id', esc_attr($review['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this review?')" href="<?php echo myPluginGetAdminPageUrl('reviews', 'admin', 'page', ['delete-review-id', esc_attr($review['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No reviews found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
