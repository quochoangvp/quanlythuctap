$(document).ready(function() {
    $('select[name="room_id"]').select2();
    $('select[name="user_id"]').select2();
    $('select[name="room_id"]').on('change', function(event) {
        var room_id = $(this).select2('data')[0].id;
        $.get('/api/user/get_by_room.html?room_id=' + room_id, function(data) {
            var str = '<option value="">Chọn 1 người</option>';
            $.each(data.citizens, function(index, val) {
                str += '<option value="' + val.user_id + '">' + val.ctz_name + '</option>';
            });
            $('select[name="user_id"]').html(str);
            $('select[name="user_id"]').select2();
        }, 'json');
    });
});
