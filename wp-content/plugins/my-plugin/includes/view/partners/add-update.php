<?php
function add_update_partner(){
    $page_heading = isset($_GET['partner_id']) && $_GET['partner_id'] ? 'Update Partners': 'Add New Partners';
?>
<h1><?php echo esc_html__($page_heading, 'my-plugin'); ?></h1>
    <a class="float-right button button-primary button-large" href="<?php echo myPluginGetAdminPageUrl('partners'); ?>"><?php echo esc_html__('Partners', 'my-plugin'); ?></a>
<div class="form-tabs">
    <ul class="form-tabs-nav">
        <li class="form-tab-link active"
            data-tab="addPartnersInformation"><?php echo esc_html__('Information', 'my-plugin'); ?></li>
        <li class="form-tab-link"
            data-tab="addPartnersSettings"><?php echo esc_html__('Settings', 'my-plugin'); ?></li>

    </ul>

    <div class="form-tab-content active" id="addPartnersInformation">
        <form class="form-table" method="post"
              action="<?php echo esc_url(admin_url('admin.php?page=partners')); ?>">
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
                    <td><input type="submit" name="submit" value="Add Partners"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="form-tab-content" id="addPartnersSettings">
        this is tab 11 addPartnersSettings
    </div>
</div>
<?php } ?>
