(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#menu_id").html('').sel2bma().focus();
        $("#parent_id").html('').sel2bma();
        $("#status").iCheck('check');
        $(':submit').removeAttr('disabled');
    });

    //--- Select Group
    $("#group_id").on("change", function (e) {
        $(".clrs").click();
        if ($("#group_id").val() != null) {
            $(".divt").css('display', 'block');
            $("#menu_id").html('').sel2bma();
            $("#parent_id").html('').sel2bma();
        } else {
            $("#mainForm")[0].reset();
            $("#group_id").html('').sel2bma();
            $(".divt").css('display', 'none');
        }
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
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('menu/group-menu/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('menu/group-menu/insert', $("#mainForm").serialize(), function (obj) {
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
    $('#mainTable').on('click', 'a[title^=Edit]', function (e) {
        e.preventDefault();
        $("#mainForm")[0].reset();
        window.scroll(0, 0);
        if ($("#mainForm .panel-collapse span").hasClass("fa-angle-up")) {
            $("#mainForm .panel-collapse").click();
        }
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $("#ftitle").html('Edit');
        if (d.group_id != null) {
            $("#group_id").html('<option value="' + d.group_id + '">' + d.groupname + '</option>').sel2bma();
        } else {
            $("#group_id").html('').sel2bma();
        }
        if (d.menu_id != null) {
            $("#menu_id").html('<option value="' + d.menu_id + '">' + d.menu + '</option>').sel2bma();
        } else {
            $("#menu_id").html('').sel2bma();
        }
        if (d.parent_id != 0) {
            $("#parent_id").html('<option value="' + d.parent_id + '">' + d.parent + '</option>').sel2bma();
        } else {
            $("#parent_id").html('').sel2bma();
        }
        $("#order").val(d.order).focus();
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });

//--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        pageLength: 100,
        ajax: {
            url: baseUrl + 'menu/group-menu/getDataMenu/',
            type: 'POST',
            data: function (d) {
                d.gid = $("#group_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'icon', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<i class="fa  ' + data + '"></i>';
                }},
            {data: 'menu', render: function (data, type, row, meta) {
                    if(row.link != '#' && row.parent == null) {
                        ret = '<span class="label label-success">' + data + '</span>';
                    } else if (row.link == '#' && row.parent == null) {
                        ret = '<span class="label label-info">' + data + '</span>';
                    } else if (row.link == '#' && row.parent != null) {
                        ret = '&nbsp&nbsp&nbsp&nbsp<span class="label label-info">' + data + '</span>';
                    } else {
                        ret = '&nbsp&nbsp&nbsp&nbsp<span class="label label-default">' + data + '</span>';
                    }
                    return ret;
                }},
            {data: 'link'},
            {data: 'parent'},
            {data: 'order'},
            {data: 'status', className: "dt-body-center", width: "15%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line"><i class="fa  fa-pencil"></i></a>';
                }},
            {data: 'group_id', visible: false, searchable: false, className: 'never'},
            {data: 'groupname', visible: false, searchable: false, className: 'never'},
            {data: 'menu_id', visible: false, searchable: false, className: 'never'},
            {data: 'parent_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[5, 'asc']]
    });
//--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'menu/group-menu/delete');

// Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 1 && $(this).index() != 6) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

    $("#delmenu").click(function (e) {
        e.preventDefault();
        var dr = t.rows('.selected').data();
        if (dr.length == 0 || dr.length > 1) {
            alertify.error("Please select only one row");
            return false;
        }
        alertify.confirm(dr.length + " rows data will be delete", function (e) {
            if (e) {
                var id = dr[0].id;
                $.post(baseUrl + 'menu/group-menu/delete', {id: JSON.stringify(id)}, function (obj) {
                    if (obj.msg == 1) {
                        t.ajax.reload();
                        alertify.success("Delete Data Success");
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