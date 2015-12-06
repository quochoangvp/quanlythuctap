$(document).ready(function() {
    $('select[name="room_id"]').select2();

    $('input[name="is_head"]').click(function(event) {
        if ($(this).is(':checked')) {
            $('.ctz_rel_head_block').slideUp();
        } else {
            $('.ctz_rel_head_block').slideDown();
        }
    });
});
