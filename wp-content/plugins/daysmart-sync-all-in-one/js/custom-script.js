jQuery(document).ready(function(){
    jQuery('#sync_all_events_btn').click(function(e){
        e.preventDefault();
        jQuery(this).text('Syncing...');
        jQuery(this).attr('disabled', 'disabled');
        jQuery("#daysmart_sync_msg_error").hide();
        jQuery("#daysmart_sync_msg_ok").hide();
        jQuery("#daysmart_sync_count_event").text(0);

        // AJAX request
        retrieveRecords(1);
    });

    function retrieveRecords(page) {
        jQuery.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'daysmart_sync_events',
                page: page,
            },
            success: function(response) {
                // Handle the AJAX response
                jQuery("#sync_all_events_btn").prop("disabled", false);
                jQuery("#daysmart_sync_msg_ok").text('Events synced: '+ response.data.current_page + ' of '+ response.data.last_page );
                jQuery("#daysmart_sync_msg_ok").show();
                jQuery("#daysmart_sync_count_event").text(response.data.count);
                console.log(response);
                jQuery('#sync_all_events_btn').removeAttr('disabled', 'disabled');
                // Check if there are more pages to retrieve
                if (parseInt(response.data.current_page) < parseInt(response.data.last_page)) {
                    var next_page = parseInt(response.data.current_page) + 1;
                    retrieveRecords(parseInt(next_page));
                    jQuery('#sync_all_events_btn').attr('disabled', 'disabled');
                }
            },
            error: function(xhr, status, error) {
                // Handle the error
                jQuery("#daysmart_sync_msg_error").show();
                console.log(error);
            }
        });
    }
});
