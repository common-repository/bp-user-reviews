/* global BP_User_Reviews */
(function ($) {
    var ajax_url = BP_User_Reviews.ajax_url;
    var messages = BP_User_Reviews.messages;

    $(document).ready(function () {
        $('form.bp-user-reviews').submit(function (event) {
                event.preventDefault();
                $('.bp-user-review-message').remove();

                $.ajax({
                    url: ajax_url,
                    type:"POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    xhrFields: {
                        withCredentials: true
                    },
                    success: function (data) {

                        if(data.result == false){
                            var html = '<div id="message" class="bp-user-review-message error"><p>';
                            $.each(data.errors, function () {
                                html += this+'<br>';
                            });
                            html += '</p></div>';
                            $(html).insertAfter($('form.bp-user-reviews'));
                        } else {
                            var html = '<div id="message" class="bp-user-review-message success"><p>'+messages.success+'</p></div>';
                            $(html).insertAfter($('form.bp-user-reviews'));
                            $('form.bp-user-reviews').slideUp();
                        }
                    }
                });

            }
        );

        $('form.bp-user-reviews').on('click', 'span.star', function (event) {
            event.preventDefault();
            var p = $(this).parent().parent();
            var stars = $(p).find('.star');
            var input = $(p).find('input[type="hidden"]');
            var index = parseInt($(this).index());
            var max   = parseInt(stars.length);
            var mark  = max - index;

            $(input).val(mark);

            stars.removeClass('active');
            $(this).addClass('active');
        });
    });
})(jQuery)