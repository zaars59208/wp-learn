<?php
function add_update_cancel_policy(){
    $page_heading = isset($_GET['cancel_policy_id']) && $_GET['cancel_policy_id'] ? 'Update Cancel Policy': 'Add New Cancel Policy';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('cancel-policies'); ?>"><?php echo esc_html__('Cancel Policy', 'my-plugin'); ?></a>
<div class="form-tabs">
    <ul class="form-tabs-nav">
        <li class="form-tab-link active"
            data-tab="addCancelPolicyInformation"><?php echo esc_html__('Information', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addCancelPolicySettings"><?php echo esc_html__('Settings', 'my-plugin'); ?></li>

    </ul>

    <div class="form-tab-content active" id="addCancelPolicyInformation">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=cancel-policies')); ?>">
            <table>
                <tr class="form-field">
                    <th scope="row">
                        <label for="title"><?php echo esc_html__('Title', 'my-plugin'); ?></label>
                    </th>
                    <td>
                        <input class="form-input" type="text" id="title" name="title" placeholder="title">
                    </td>
                </tr>

                <tr class="form-field">
                    <td><input type="submit" name="submit" value="Add Cancel Policy"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="form-tab-content" id="addCancelPolicySettings">
        this is tab 11 addCancelPolicySettings
    </div>
</div>
<?php } ?>
