$(document).ready(function() {
    $('select[name="time"]').on('change', function(event) {
        event.preventDefault();
        var time = $(this).find('option:selected').val();
        window.location.href = '/admin/services/charge.html?time=' + time;
    });
});
