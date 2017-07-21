(function ($) {

    //--- Add Role
    $("#btnAddRole").click(function (e) {
        e.preventDefault();
        if ($("#group_id").val() != null) {
            $("body").data("group_id", $("#group_id").val());
            $(".modal-dialog").width('900px');
            t2.ajax.reload();
            $("#vpModal").modal('show');
        } else {
            bmafn.errMsg('Silahkan pilih User Group');
        }

    });

    //--- Update Status
    $('#mainTable').on('click', 'td .fa', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        sts = (d.status == '0') ? '&status=on' : '&';
        $.post('admin/role/updateStatus', "id=" + d.id + sts, function (obj) {
            if (obj.msg == 1) {
                $('.clrs').click();
                alertify.success("Change Status Success");
            } else {
                bmafn.errMsg(obj.msg);
            }
        }, "json").fail(function () {
            bmafn.errMsg();
        });
    });

    //--- Select Group
    $("#group_id").on("change", function (e) {
        $(".clrs").click();
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'admin/role/getDataRole',
            type: 'POST',
            data: function (d) {
                d.gid = $("#group_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'controller'},
            {data: 'method'},
            {data: 'Info'},
            {data: 'status', className: "dt-body-center", width: "15%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'admin/role/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 4) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid input').keyup(function () {
        t.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t.columns(4).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('');
        t.columns().search('').draw();
    });

    //--- Datatables
    var t2 = $('#listroleTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'admin/role/getDataListMethod',
            type: 'POST',
            data: function (d) {
                d.gid = $("#group_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'controller'},
            {data: 'method'},
            {data: 'Info'},
            {data: 'id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#listroleTable').selectDTbma(t2, 'inventory/brand/delete');

    // Setup - add a text input to each header cell
    $('#searchid2 td').each(function () {
        if ($(this).index() != 0) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 4) {
            $(this).html('<select style="width:100%" type="text"><option value="">-</option><option value="1">Active</option><option value="0">Not Active</option><select/>');
        }
    });
    $('#searchid2 input').keyup(function () {
        t2.columns($(this).data('id')).search(this.value).draw();
    });
    $('#searchid select').change(function () {
        t2.columns(4).search(this.value).draw();
    });
    $(".clrs2").click(function () {
        $('#searchid2 input').val('');
        $('#searchid2 select').val('');
        t2.search('')
        t2.columns().search('').draw();
    });

    //---- Insert List Method to Group Role
    $("#btnInsertRole").click(function (e) {
        e.preventDefault();
        var dr = t2.rows('.selected').data();
        if (dr.length == 0) {
            alertify.error("Silahkan pilih baris");
            return false;
        }
        alertify.confirm(dr.length + " rows data will be insert", function (e) {
            if (e) {
                var id = [];
                $.each(dr, function (i, val) {
                    id[i] = val.id;
                });
                $.post(baseUrl + 'admin/role/insert', {id: JSON.stringify(id), group_id: $("body").data("group_id")}, function (obj) {
                    if (obj.msg == 1) {
                        $(".clrs2").click();
                        $(".clrs").click();
                        alertify.success("Insert Data Success");
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