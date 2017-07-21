(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#username").focus();
        $("#group_id").html('').sel2bma();
        $("#status").iCheck('check');
        $('#password').prev().addClass('mandatory');
        $('#password').attr('data-validation', 'required');
        $(':submit').removeAttr('disabled');
    });

    //--- Validasi
    $.validate({
        form: "#mainForm",
        validateOnBlur: false,
        onError: function () {
            $('.help-block').remove();
            bmafn.errMsg("Please fill form");
        },
        onSuccess: function () {
            if ($("#group_id").val() == null) {
                bmafn.errMsg("Silahkan Pilih User Group");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('user/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        t.ajax.reload();
                        alertify.success("Edit Data Success");
                    } else {
                        bmafn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bmafn.errMsg();
                });
            } else {
                //--- Insert
                $.post('user/insert', $("#mainForm").serialize(), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        t.ajax.reload();
                        alertify.success("Insert Data Success");
                    } else {
                        bmafn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bmafn.errMsg();
                });
            }
        }
    });

    //--- Edit Button
    $('#mainTable').on('click', 'a.btnedit', function (e) {
        e.preventDefault();
        $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-collapse span").hasClass("fa-angle-up")) {
            $("#mainForm .panel-collapse").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');
        $("#username").val(d.username).focus();
        if (d.group_id != null) {
            $("#group_id").html('<option value="' + d.group_id + '">' + d.groupname + '</option>').sel2bma();
        } else {
            $("#group_id").html('').sel2bma();
        }
        $("#namalengkap").val(d.namalengkap);
        $("#nik").val(d.nik);
        $("#email").val(d.email);
        $("#description").val(d.description);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
        $('#password').prev().removeClass('mandatory');
        $('#password').removeAttr('data-validation');
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'user/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'username'},
            {data: 'namalengkap'},
            {data: 'groupname', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == 'Administrator') ? '<span class="label label-success"><i class="fa fa-star"></i> ' + data + '</span>' : data;
                    return act;
                }},
            {data: 'nik'},
            {data: 'email'},
            {data: 'description'},
            {data: 'lastlog'},
            {data: 'id', className: "dt-body-center", orderable: false, render: function (data, type, row, meta) {
                    return "<img style='border-radius:10px;border:2px #ccc solid' src='photo/user/" + data + "?" + (new Date().getTime()) + "' width='80px'>";
                }},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line btnedit" data-toggle="tooltip" data-placement="left"><i class="fa  fa-pencil"></i></a>';
                }
            },
            {data: 'group_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'user/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 6 && $(this).index() != 8 && $(this).index() != 9) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 9) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(7).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

    $("#btnphoto").click(function (e) {
        e.preventDefault();
        var dr = t.rows('.selected').data();
        if (dr.length == 0 || dr.length > 1) {
            alertify.error("Silahkan pilih hanya satu baris");
            return false;
        }
        var id = dr[0].id;
        $("#filephotouser").val('');
        $("#filephotouser").attr('name', 'user-' + id);
        $("#elmphotouser").attr('src', 'photo/user/' + id + '?' + (new Date().getTime()));
        $('#mainModal').modal('show');
    });

    $('#mainModal').on('hide.bs.modal', function (e) {
        $("#mainTable tr").removeClass('selected');
    });

    //--- Upload Photo
    $(":file").click(function () {
        $('#upload_target').remove();
        $("<iframe id=\"upload_target\" name=\"upload_target\" style=\"width:0;height:0;border:0px;\"></iframe>").appendTo("body");
    });

    $("#frmphotouser").submit(function (event) {
        if ($("#filephotouser").val() == '') {
            alertify.error("Silahkan pilih file");
            return false;
        }
        $('#upload_target').load(function () {
            var isi = $('#upload_target').contents().find('body').html();
            if (isi == '1') {
                $("#elmphotouser").attr('src', 'photo/user/' + $(':file').attr('name').substr(5) + '?' + (new Date().getTime()));
                alertify.success("Upload file success");
                $(':file').val('');
                $('#mainTable table').DataTable().ajax.reload();
            } else {
                alertify.error(isi);
            }
        });
    });

    $("#delphoto").click(function () {
        alertify.set({buttonFocus: "cancel"});
        alertify.confirm("Apakah anda yakin ?", function (e) {
            if (e) {
                $.post('user/delphoto', "id=" + $(':file').attr('name').substr(5), function (obj) {
                    if (obj.msg == 1) {
                        alertify.success("File Deleted");
                        $("#elmphotouser").attr('src', 'photo/user/?' + (new Date().getTime()));
                        $('#mainTable table').DataTable().ajax.reload();
                    } else {
                        alertify.error("Error : " + obj.msg);
                    }
                }, "json").fail(function () {
                    alertify.error("Error Connection");
                });
            }
        });
    });

})(jQuery);