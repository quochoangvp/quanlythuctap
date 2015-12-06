$(document).ready(function() {
    var room_id = $('select[name="room_id"]').data('selectd');
    $('select[name="room_id"]').select2();

    if ($('input[name="is_head"]').is(':checked')) {
        $('.ctz_rel_head_block').slideUp();
    } else {
        $('.ctz_rel_head_block').slideDown();
    }

    $('input[name="is_head"]').click(function(event) {
        if ($(this).is(':checked')) {
            $('.ctz_rel_head_block').slideUp();
        } else {
            $('.ctz_rel_head_block').slideDown();
        }
    });
});
