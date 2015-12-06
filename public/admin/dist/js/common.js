var url_process = $(document).find('[data-url]').attr('data-url');
$(document).ready(function() {

    if ($('#dataTables').length != 0) {
        $('#dataTables').DataTable({
            responsive: true,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi trên trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Hiển thị _PAGE_ trên _PAGES_ trang",
                "infoEmpty": "Không có dữ liệu",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip();

    $('select').each(function(index, el) {
        var selected = $(el).data('selected');
        $(el).find('option').each(function(i, option) {
            if ($(option).val() == selected) {
                $(option).attr('selected', 'selected');
            }
        });
    });

    $(document).ajaxStart(function() {
        $(document).find('[data-loading-text]').click(function(event) {
            $(this).button('loading');
        });
    });

    // Reset button loading
    $(document).ajaxComplete(function(event, xhr, settings) {
        $(this).find('[data-loading-text]').button('reset');
    });
    $(document).find('form *').on('change', function(event) {
        $(this).parents('form').find('[disabled=disabled]').button('reset');
    });

    // Submit form
    $('form').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        if (form.attr('enctype') == 'multipart/form-data') {
            return false;
        }
        var url_process = form.attr('action');
        if (form.find('.tinymce').length !== 0) {
            tinymce.triggerSave();
        }
        $.post(url_process, form.serialize(), function(data, textStatus, xhr) {
            if (data.status == 'error' && typeof data.msg.form_error !== 'undefined') {
                bindFromError(data.msg.form_error, form);
            } else {
                if (typeof data.reload === 'undefined') {
                    data.reload = false;
                }
                showDialog(false, data.msg, data.status, data.reload);
            }
        }, 'json');
    });

    $('form[enctype="multipart/form-data"]').submit(function(event) {
        event.preventDefault();
        event.stopPropagation();
        var form = $(this);
        var data = new FormData();
        $.ajax({
            url: form.attr('action'), // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            dataType: 'json',
            success: function(data) // A function to be called if request succeeds
                {
                    if (data.status == 'error' && typeof data.msg.form_error !== 'undefined') {
                        bindFromError(data.msg.form_error, form);
                    } else {
                        if (typeof data.reload === 'undefined') {
                            data.reload = false;
                        }
                        showDialog(false, data.msg, data.status, data.reload);
                    }   
                }
        });
    });

    // Delete
    $(document).delegate('[data-action=delete]', 'click', function(event) {
        var id = $(this).attr('data-id');
        var url_process = $(this).parents('[data-url-process-delete]').attr('data-url-process-delete');
        BootstrapDialog.confirm({
            title: 'WARNING',
            message: 'Nội dung đã xóa không thể khôi phục, bạn có chắc?',
            type: BootstrapDialog.TYPE_DANGER,
            btnOKLabel: 'Xóa',
            btnOKClass: 'btn-danger',
            callback: function(result) {
                if (result) {
                    $.post(url_process, {
                        id: id
                    }, function(data) {
                        if (data.status == 'success') {
                            showDialog(null, data.msg, data.status, true);
                        } else {
                            showDialog(null, data.msg, data.status, false);
                        }
                    }, 'json');
                }
            }
        });
    });

    show_current_list_sidebar();
});

/**
 * Bind error to form
 * @param  {array}   data [description]
 * @param  {object}  form [description]
 * @return {void}      [description]
 */
function bindFromError(data, form) {
    var fieldError = [];
    var valueError = [];
    $.each(data, function(index, val) {
        fieldError.push(index);
        valueError.push(val);
    });
    $(form).find('*').each(function(index, el) {
        if ($.inArray($(el).attr('name'), fieldError) >= 0) {
            $(el).parent().parent().addClass('has-error');
            if ($(el).parent().find('.help-block').length !== 0) {
                $(el).parent().find('.help-block').html(data[$(el).attr('name')]);
            } else {
                $(el).parent().append(data[$(el).attr('name')]);
            }
            $(el).focus(function(event) {
                $(el).parent().parent().removeClass('has-error');
                $(el).next('.help-block').remove();
            });
        };
    });
}
/**
 * Show dialog response message
 * @param  {string} msg    [description]
 * @param  {string} type   [description]
 * @param  {bool}   reload [description]
 * @return {void}          [description]
 */
function showDialog(title, msg, type, reload) {
    var bsType = BootstrapDialog.TYPE_PRIMARY;
    if (type == 'error') {
        title = 'Error';
        bsType = BootstrapDialog.TYPE_DANGER;
    }
    if (type == 'success') {
        title = 'Success';
        bsType = BootstrapDialog.TYPE_SUCCESS;
    }
    if (type == 'warning') {
        title = 'Warning';
        bsType = BootstrapDialog.TYPE_WARNING;
    }
    BootstrapDialog.show({
        title: title,
        type: bsType,
        message: msg,
        draggable: true,
        buttons: [{
            label: 'Đóng',
            action: function(dialogItself) {
                dialogItself.close();
            }
        }],
        onhide: function(dialogRef) {
            if (reload == true || reload == 'true') {
                location.reload();
            } else if (reload == false || reload == 'false') {} else {
                window.location.href = reload;
            }
        },
    });
}

function show_current_list_sidebar() {
    var current_url = $('.page-sidebar > ul').attr('data-current-url');
    $('.page-sidebar > ul > li').each(function(index, el) {
        if ($(el).find(' > a').attr('href') == current_url) {
            $(el).addClass('active');
            $(el).find(' > a').append('<span class="selected"></span>');
        }
    });
}

function to_ansi(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
    str = str.replace(/-+-/g, "-");
    str = str.replace(/^\-+|\-+$/g, "");
    return str;
}

function bindFormData(form, data) {
    $(form).find('*').each(function() {
        if ($(this).attr('name')) {
            if (typeof data[$(this).attr('name')] == 'undefined' || data[$(this).attr('name')] == null) {
                $(this).removeAttr('required');
            }
            var attrName = $(this).attr('name').replace(/[^a-z0-9_]/gi, '');
            if (typeof data[attrName] != 'undefined' && $.trim(data[attrName]).length > 0) {
                if ($(this).attr('type') == 'radio') {
                    $(this).removeAttr('checked');
                    $(this).parent('span').removeClass('checked');
                    if ($(this).val() == data[$(this).attr('name')]) {
                        $(this).prop('checked', true);
                    }
                } else if ($(this).prop("tagName") == 'SELECT') {
                    $(this).find('option').each(function(index, el) {
                        if (data[attrName].indexOf($(el).val()) >= 0) {
                            $(el).attr('selected', 'selected');
                        }
                    });
                } else {
                    $(this).val(data[attrName]);
                }
                $.uniform.update();
                if (typeof data.prop_description !== 'undefined') {
                    tinymce.activeEditor.setContent(data.prop_description);
                }
                if (typeof data.impacts_description !== 'undefined') {
                    tinymce.activeEditor.setContent(data.impacts_description);
                }
                if (typeof data.chem_description !== 'undefined') {
                    tinymce.activeEditor.setContent(data.chem_description);
                }
            }
        }
    });
}

function do_search(el) {
    var kw = $(el).find('input').val();
    var type = $(el).find('select').find('option:selected').val();
    window.location.href = '/admin/search.html?key=' + kw + '&type=' + type;
}

function PrintElem(elem) {
    Popup($(elem).html());
}

function Popup(data) {
    var mywindow = window.open('', 'Hóa Đơn', 'height=600,width=800');
    mywindow.document.write(data);

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
    mywindow.close();

    return true;
}
