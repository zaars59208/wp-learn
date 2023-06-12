$(document).ready(function() {
    $('.form-tab-link').on('click', function() {
        var tab = $(this).data('tab');
        $('.form-tab-link').removeClass('active');
        $('.form-tab-content').removeClass('active');
        $(this).addClass('active');
        $('#' + tab).addClass('active');
    });
});
