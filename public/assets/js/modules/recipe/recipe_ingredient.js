(function ($) {
    
    //--- Select Recipe name
    $("#recipe_id").on("change", function (e) {
        $(".clrs").click();
        if ($("#recipe_id").val() != null) {
            $(".divt").css('display', 'block');
            $("#raw_material_id").html('').sel2bma();
            $("#unit_material_id").html('').sel2bma();
            $('#btnsubmit').attr('disabled', false);
        } else {
            $("#mainForm")[0].reset();
            $('#btnsubmit').attr('disabled', true);
            $("#recipe_id").html('').sel2bma();
            $(".divt").css('display', 'none');
        }
    });

    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#lotid").focus();
        $("#raw_material_id").html('').sel2bma();
        $("#unit_material_id").html('').sel2bma();
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
            if ($("#raw_material_id").val() == null || $("#unit_material_id").val() == null) {
                bmafn.errMsg("Please fill form");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('recipe/recipe_ingredient/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('recipe/recipe_ingredient/insert', $("#mainForm").serialize(), function (obj) {
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
        if (d.raw_material_id != null) {
            $("#raw_material_id").html('<option value="' + d.raw_material_id + '">' + d.materialname + ' [' + d.materialcode + ']</option>').sel2bma();
        } else {
            $("#raw_material_id").html('').sel2bma();
        }
        $("#lotid").val(d.lotid).focus();
        $("#qty").val(d.qty);
        if (d.unit_material_id != null) {
            $("#unit_material_id").html('<option value="' + d.unit_material_id + '">' + d.unitname + ' [' + d.shortname + ']</option>').sel2bma();
        } else {
            $("#unit_material_id").html('').sel2bma();
        }
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
            url: baseUrl + 'recipe/recipe_ingredient/getData',
            type: 'POST',
            data: function (d) {
                d.rid = $("#recipe_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'materialname'},
            {data: 'lotid'},
            {data: 'qty'},
            {data: 'shortname'},
            {data: 'description'},
            {data: 'inuse', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line btnedit" data-toggle="tooltip" data-placement="left"><i class="fa  fa-pencil"></i></a>';
                }
            },
            {data: 'unitname', visible: false, searchable: false, className: 'never'},
            {data: 'materialcode', visible: false, searchable: false, className: 'never'},
            {data: 'recipe_id', visible: false, searchable: false, className: 'never'},
            {data: 'raw_material_id', visible: false, searchable: false, className: 'never'},
            {data: 'unit_material_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'recipe/recipe_ingredient/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 7) {
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

})(jQuery);