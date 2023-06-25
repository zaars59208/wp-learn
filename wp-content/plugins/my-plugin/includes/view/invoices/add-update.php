<?php
function add_update_invoice(){
    $page_heading = isset($_GET['invoices_id']) && $_GET['invoices_id'] ? 'Update Invoices': 'Add New Invoices';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('invoices'); ?>"><?php echo esc_html__('Invoices', 'my-plugin'); ?></a>
<?php } ?>
