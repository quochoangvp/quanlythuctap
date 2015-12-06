$(document).ready(function() {
	$('a[href="#approve"]').click(function(event) {
		var id = $(this).data('id');
		$.get('/api/required_forms/get_content.html?id='+id, function(data) {
			$('#approve .modal-body .content').html(data.rqf_body);
			$('[data-action="approve"]').attr('data-id', id);
		}, 'json');
	});

	$('[data-action="approve"]').click(function(event) {
		var id = $(this).data('id');
		var receive_date = $('[name="receive_date"]').val();
		$.post('/api/required_forms/approve.html', { id: id, receive_date: receive_date }, function(data) {
			showDialog(false, data.msg, data.status, true);
		}, 'json');
	});

	$('[data-action="print"]').click(function(event) {
		var id = $(this).data('id');
		$.get('/api/required_forms/get_content.html?id='+id, function(data) {
			$('#approve .modal-body .content').html(data.rqf_body);
			PrintElem('#approve .modal-body .content');
		}, 'json');
	});
});

function PrintElem(elem) {
    Popup($(elem).html());
}

function Popup(data) {
    var mywindow = window.open('', 'Mẫu đơn', 'height=600,width=800');
    mywindow.document.write(data);

    // mywindow.document.close(); // necessary for IE >= 10
    // mywindow.focus(); // necessary for IE >= 10

    // mywindow.print();
    // mywindow.close();

    return true;
}