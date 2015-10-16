define(['require', 'jquery'], function(require, $) {

    $(document).on('click', ".notifications-email-disable", function(e) {
        e.preventDefault();

        var emails = $('.notifications-emails-value').val();

        // hide the form while we process
        $('.notifications-email-disable-wrapper').hide();
        $('.notifications-email-disable-throbber').show();

        elgg.action('notifications_email_disable', {
            data: {
                emails: emails
            },
            success: function(result, success, xhr) {
                // output is any invalid emails
                $(".notifications-emails-value").val(result.output);

                // show the form again
                // hide the form while we process
                $('.notifications-email-disable-wrapper').show();
                $('.notifications-email-disable-throbber').hide();
            },
            error: function(result, response, xhr) {
                elgg.register_error(elgg.echo('notifications_email_disable:generic:error'));

                // hide the form while we process
                $('.notifications-email-disable-wrapper').show();
                $('.notifications-email-disable-throbber').hide();
            }
        });
    });

});