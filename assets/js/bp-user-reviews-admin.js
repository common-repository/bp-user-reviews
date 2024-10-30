(function ($) {
    $(document).on(
        'click touchstart',
        '.addCriterion',
        function (event) {
            event.preventDefault();
            var template = '<p><input type="text" name="criterions[]" value=""></p>';
            $(template).insertBefore($(this));
        }
    );

    $(document).ready(function(){
        $('.color-picker').wpColorPicker();

        $('.marks').on('click touchstart', '.star', function (event) {
            event.preventDefault();
            event.stopPropagation();

            var max  = $(this).parent().find('> .star').length;
            var mark = $(this).index() + 1;
            var container = $(this).parentsUntil('.marks', 'p');

            var new_mark = (mark * 100) / max;

            container.find('input').val( new_mark );
            container.find('.stars .active').css( {'width': new_mark + '%' } );
        });
    });

})(jQuery);