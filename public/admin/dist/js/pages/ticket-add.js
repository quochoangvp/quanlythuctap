$(document).ready(function() {
    $('select[name="room_id"]').select2();
    $('select[name="ctz_id"]').select2();
    $('select[name="room_id"]').on('change', function(event) {
        var room_id = $(this).select2('data')[0].id;
        $.get('/api/citizen/get_by_room.html?room_id=' + room_id, function(data) {
            var str = '<option value="">Chọn 1 người</option>';
            $.each(data.citizens, function(index, val) {
                str += '<option value="' + val.ctz_id + '">' + val.ctz_name + '</option>';
            });
            $('select[name="ctz_id"]').html(str);
            $('select[name="ctz_id"]').select2();
        }, 'json');
    });

    $('select[name="ctz_id"]').on('change', function(event) {
        var ctz_id = $(this).select2('data')[0].id;
        $.get('/api/ticket/get_by_citizen.html?ctz_id=' + ctz_id, function(data) {
            if (data.ticket.length != 0) {
                showDialog('Thông tin vé xe đã tồn tại', 'Cư dân này đã có vé xe!', 'warning', false);
                $('button[type="submit"]').attr('disabled', 'disabled');
            } else {
                $('button[type="submit"]').removeAttr('disabled');
            }
        }, 'json');
    });
});
