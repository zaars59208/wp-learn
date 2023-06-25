<?php
function add_update_review(){
    $page_heading = isset($_GET['reviews_id']) && $_GET['reviews_id'] ? 'Update Reviews': 'Add New Reviews';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('reviews'); ?>"><?php echo esc_html__('Reviews', 'my-plugin'); ?></a>
<?php } ?>
