(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#materialname").focus();
        $("#status").iCheck('check');
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
            if ($("#materialname").val() == '') {
                bmafn.errMsg("Please fill form");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('master/raw_material/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('master/raw_material/insert', $("#mainForm").serialize(), function (obj) {
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
        $("#materialname").val(d.materialname).focus();
        $("#materialcode").val(d.materialcode);
        $("#description").val(d.description);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'master/raw_material/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'materialname'},
            {data: 'materialcode'},
            {data: 'description'},
            {data: 'status', className: "dt-body-center", width: "15%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line btnedit"  data-toggle="tooltip" data-placement="left"><i class="fa  fa-pencil"></i></a>';
                }
            },
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'master/raw_material/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 5) {
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
        t.search('')
        t.columns().search('').draw();
    });

})(jQuery);