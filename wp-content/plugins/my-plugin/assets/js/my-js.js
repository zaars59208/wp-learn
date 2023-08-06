$(document).ready(function () {
    $('.form-tab-link').on('click', function () {
        var tab = $(this).data('tab');

        $('.form-tab-link').removeClass('active');
        $('.form-tab-content').removeClass('active');
        $(this).addClass('active');
        $('#' + tab).addClass('active');
    });

    // validate the comment form when it is submitted
    $("#mp_listing_add_update").validate({
        rules: {
            number_of_bedrooms: {
                digits: true
            },
            number_of_guests: {
                digits: true
            },
            number_of_beds: {
                digits: true
            },
            number_of_bathrooms: {
                digits: true
            },
            size: {
                number: true
            },
            affiliate_booking_link: {
                url: true
            }
        }
    });

    var file_frame;
    var imageContainer = $('#image-container');
    var attachmentIds = []; // Store the uploaded attachment IDs.

    $('#upload-multiple-listing-images').on('click', function (e) {
        e.preventDefault();

        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Images',
            button: {
                text: 'Select Images',
            },
            multiple: true
        });

        // When images are selected, handle the uploads.
        file_frame.on('select', function () {
            var attachments = file_frame.state().get('selection').toJSON();
            attachments.forEach(function (attachment) {
                var image = '<div class="uploaded-image">';
                image += '<img src="' + attachment.url + '" alt="' + attachment.title + '">';
                image += '<button class="remove-image dashicons dashicons-dismiss" data-id="' + attachment.id + '"></button>';
                image += '</div>';
                imageContainer.append(image);
            });
            console.log('attachmentIds ' + attachmentIds);
        });

        // Open the media frame.
        file_frame.open();
    });

    // Handle click on the remove button to remove the image.
    imageContainer.on('click', '.remove-image', function() {
        var idToRemove = parseInt($(this).data('id'));
        attachmentIds = attachmentIds.filter(function(id) {
            return id !== idToRemove;
        });
        $(this).parent().remove();
    });

    $('#save-listing').on('click', function (e) {
        e.preventDefault();

        // Send the attachment IDs to the server via AJAX.
        var data = {
            action: 'save_listing_images',
            security: my_ajax_object.ajax_nonce,
            attachment_ids: attachmentIds
        };

        $.post(my_ajax_object.ajax_url, data, function (response) {
            // Handle the server response if needed.
            console.log(response);
        });
    });
});
