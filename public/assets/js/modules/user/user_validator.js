(function ($) {

    //--- Add User
    $("#btnAddUser").click(function (e) {
        e.preventDefault();
        if ($("#groupvalidator_id").val() != null) {
            $("body").data("groupvalidator_id", $("#groupvalidator_id").val());
            $(".modal-dialog").width('900px');
            t2.ajax.reload();
            $("#vpModal").modal('show');
        } else {
            bmafn.errMsg('Please Select Group Validator');
        }

    });

    //--- Select Group Validator
    $("#groupvalidator_id").on("change", function (e) {
        $(".clrs").click();
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'user/user_validator/getUservalidator',
            type: 'POST',
            data: function (d) {
                d.gid = $("#groupvalidator_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'namalengkap', orderable: false},
            {data: 'nik', orderable: false},
            {data: 'id', className: "dt-body-center", orderable: false, render: function (data, type, row, meta) {
                    return "<img style='border-radius:10px;border:2px #ccc solid' src='photo/user/" + data + "?" + (new Date().getTime()) + "' width='80px'>";
                }},
            {data: 'orderuser', className: "dt-body-center"},
            {data: 'id', className: "dt-body-center", orderable: false, width: "15%", render: function (data, type, row, meta) {
                    console.log(meta.settings._iRecordsDisplay);
                    var bd = '<a title="Down" href="#" class="btn btn-primary btn-sm btn-line"><i class="fa  fa-chevron-down"></i></a>';
                    var bu = '<a title="Up" href="#" class="btn btn-primary btn-sm btn-line"><i class="fa  fa-chevron-up"></i></a>';
                    if (meta.settings._iRecordsDisplay == 1) {
                        return '';
                    } else {
                        if (row.orderuser == '1') {
                            return bd;
                        } else if (meta.settings._iRecordsDisplay == row.orderuser) {
                            return bu;
                        } else {
                            return bd + bu;
                        }
                    }

                }
            },
            {data: 'groupvalidator_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[4, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, '');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() == 1 || $(this).index() == 2) {
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
    
     //--- Down Button
    $('#mainTable').on('click', 'a[title^=Down]', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $.post('user/user_validator/updateDown', "id=" + d.id + "&ou=" + d.orderuser + "&gv=" + d.groupvalidator_id, function (obj) {
            if (obj.msg == 1) {
                $('.clrs').click();
                alertify.success("Update Data Success");
            } else {
                bmafn.errMsg(obj.msg);
            }
        }, "json").fail(function () {
            bmafn.errMsg();
        });
    });

    //--- Up Button
    $('#mainTable').on('click', 'a[title^=Up]', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        $.post('user/user_validator/updateUp', "id=" + d.id + "&ou=" + d.orderuser + "&gv=" + d.groupvalidator_id, function (obj) {
            if (obj.msg == 1) {
                $('.clrs').click();
                alertify.success("Update Data Success");
            } else {
                bmafn.errMsg(obj.msg);
            }
        }, "json").fail(function () {
            bmafn.errMsg();
        });
    });

    $("#deluser").click(function (e) {
        e.preventDefault();
        var dr = t.rows('.selected').data();
        if (dr.length == 0 || dr.length > 1) {
            alertify.error("Please select only one row");
            return false;
        }
        alertify.confirm(dr.length + " rows data will be delete", function (e) {
            if (e) {
                var id = dr[0].id;
                $.post(baseUrl + 'user/user-validator/delete', {id: JSON.stringify(id)}, function (obj) {
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


    //--- Datatables 2
    var t2 = $('#listuserTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'user/user-validator/getDataListUser',
            type: 'POST',
            data: function (d) {
                d.gid = $("#groupvalidator_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'namalengkap'},
            {data: 'nik'},
            {data: 'id', className: "dt-body-center", orderable: false, render: function (data, type, row, meta) {
                    return "<img style='border-radius:10px;border:2px #ccc solid' src='photo/user/" + data + "?" + (new Date().getTime()) + "' width='80px'>";
                }},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#listuserTable').selectDTbma(t2, '');

    // Setup - add a text input to each header cell
    $('#searchid2 td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 3) {
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
    $("#btnInsertUser").click(function (e) {
        e.preventDefault();
        var dr = t2.rows('.selected').data();
        if (dr.length == 0) {
            alertify.error("Please select user");
            return false;
        }
        alertify.confirm(dr.length + " rows data will be insert", function (e) {
            if (e) {
                var id = [];
                $.each(dr, function (i, val) {
                    id[i] = val.id;
                });
                $.post(baseUrl + 'user/user-validator/insert', {id: JSON.stringify(id), groupvalidator_id: $("body").data("groupvalidator_id")}, function (obj) {
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