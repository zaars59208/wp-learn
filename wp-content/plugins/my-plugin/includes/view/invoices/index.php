<?php
function get_all_invoices(){
    $add_new_invoice_link = add_query_arg('add_new_invoice', '1', $_SERVER['REQUEST_URI']);

    ?>
    <div class="wrap">
    <hr class="wp-header-end">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder2">
            <div id="post-body-content" style="position: relative;">
                <h2 class="width-50 float-left">Manage Invoices</h2> <a class="float-right button button-primary button-large" href="<?php echo $add_new_invoice_link; ?>"><?php echo esc_html__('Add New Invoice', 'my-plugin'); ?></a>
                <?php
                // Display existing invoices in a table
                $invoices = get_invoices();

                if (!empty($invoices)) {
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
                        <?php foreach ($invoices as $invoice) : ?>
                            <tr>
                                <td><?php echo esc_html($invoice['title']); ?></td>
                                <td><?php echo esc_html($invoice['description']); ?></td>
                                <td><?php echo esc_html($invoice['price']); ?></td>
                                <td>
                                    <form method="post"
                                          action="<?php echo esc_url(admin_url('admin.php?page=invoices')); ?>">
                                        <input type="hidden" name="invoice_id"
                                               value="<?php echo esc_attr($invoice['id']); ?>">
                                        <a href="<?php echo myPluginGetAdminPageUrl('invoices', 'admin', 'page', ['edit-invoice-id', esc_attr($invoice['id'])]); ?>">Edit</a>
                                        &nbsp;|&nbsp;
                                        <a  onclick="return confirm('Are you sure you want to delete this invoice?')" href="<?php echo myPluginGetAdminPageUrl('invoices', 'admin', 'page', ['delete-invoice-id', esc_attr($invoice['id'])]); ?>">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No invoices found.';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
