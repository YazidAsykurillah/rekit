(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#recipename").focus();
        $("#producttype_id").html('').sel2bma();
        $("#groupvalidator_id").html('').sel2bma();
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
            if ($("#producttype_id").val() == null || $("#groupvalidator_id").val() == null) {
                bmafn.errMsg("Please fill form");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('recipe/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('recipe/insert', $("#mainForm").serialize(), function (obj) {
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
        $("#recipename").val(d.recipename).focus();
        if (d.producttype_id != null) {
            $("#producttype_id").html('<option value="' + d.producttype_id + '">' + d.product_type + '</option>').sel2bma();
        } else {
            $("#producttype_id").html('').sel2bma();
        }
        if (d.groupvalidator_id != null) {
            $("#groupvalidator_id").html('<option value="' + d.groupvalidator_id + '">' + d.groupvalidatorname + '</option>').sel2bma();
        } else {
            $("#groupvalidator_id").html('').sel2bma();
        }
        $("#description").val(d.description);
        $("#status").iCheck(d.status == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });

    //--- Set Validation Button
    $('#mainTable').on('click', 'a.btnsetvalid', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        alertify.confirm("Recipe <b>" + d.recipename + "</b> will be set to on validation", function (e) {
            if (e) {
                $.post('recipe/setValidate', "id=" + d.id + "&ver=" + d.version + "&gvid=" + d.groupvalidator_id, function (obj) {
                    if (obj.msg == 1) {
                        alertify.success("Set to Validation Process Success");
                        t.ajax.reload();
                    } else {
                        bmafn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bmafn.errMsg();
                });
            }
        });
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'recipe/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'recipename'},
            {data: 'product_type'},
            {data: 'groupvalidatorname'},
            
            {data: 'description'},
            {data: 'validation', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                var act = "";
                if(data == 0){
                    act = '<span class="label label-warning">New</span>';
                }
                if(data == 1){
                    act = '<span class="label label-success"><i class="fa fa-check"></i></span>';
                }
                if(data == 2){
                    act = '<span class="label label-info"><i class="fa fa-hourglass"></i></span>';
                }
                return act;
            }},
            {data: 'namalengkap'},
            {data: 'created'},
            {data: 'version', width: "5%", className: "dt-body-center"},
            {data: 'flag_ingredient_editor', className:'dt-body-center', searchable:false, render:function(data, type, row, meta){
                var fl_ie = "";
                if(data == 0){
                    fl_ie = '<span class="label label-danger"><i class="fa fa-ban"></i></span>';
                }
                else{
                    fl_ie = '<span class="label label-success"><i class="fa fa-check"></i></span>';
                }
                return fl_ie;
            }},
            {data: 'flag_recipe_editor', className : 'dt-body-center', searchable:false, render:function(data, type, row, meta){
                var fl_re = "";
                if(data == 0){
                    fl_re = '<span class="label label-danger"><i class="fa fa-ban"></i></span>';
                }
                else{
                    fl_re = '<span class="label label-success"><i class="fa fa-check"></i></span>';
                }
                return fl_re;
            }},
            {data: 'flag_tolerance_editor', className : 'dt-body-center', searchable:false, render:function(data, type, row, meta){
                var fl_tlre = "";
                if(data == 0){
                    fl_tlre = '<span class="label label-danger"><i class="fa fa-ban"></i></span>';
                }
                else{
                    fl_tlre = '<span class="label label-success"><i class="fa fa-check"></i></span>';
                }
                return fl_tlre;
            }},
            {data: 'status', className: "dt-body-center", width: "5%", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'id', className: "dt-body-center", orderable: false, width: "10%", render: function (data, type, row, meta) {
                    var btn = "";
                    if(row.validation == 0){
                        var btnval = "";
                        if(row.flag_ingredient_editor == 1 && row.flag_recipe_editor == 1 && row.flag_tolerance_editor == 1 ){
                            var btnval = '<a title="Set recipe to be on validation" href="#" class="btn btn-primary btn-sm btn-line btnsetvalid" data-toggle="tooltip" data-placement="left"><i class="fa fa-check-square-o"></i></a>';
                        }
                        
                        var btnedit = '&nbsp;<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line btnedit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>';
                        var btn = (row.validation != 1) ? btnval + btnedit : btnval;
                    }
                    if(row.validation == 1){
                        var btn = '<button title="Modify recipe" href="#" class="btn btn-info btn-sm btn-line btnModifyRecipe" data-toggle="tooltip" data-placement="left" data-recipe_id="'+data+'"><i class="fa fa-cog"></i></button>';
                    }
                    if(row.validation == 2){
                        var btn = '<button title="On validation process" href="#" class="btn btn-info btn-sm btn-line" data-toggle="tooltip" data-placement="left"><i class="fa fa-hourglass"></i></button>';
                    }
                    return btn;
                }
            },
            {data: 'producttype_id', visible: false, searchable: false, className: 'never'},
            {data: 'groupvalidator_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'recipe/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 10) {
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
        t.columns(9).search(this.value).draw();
    });
    $(".clrs").click(function () {
        $('#searchid input').val('');
        $('#searchid select').val('');
        t.search('')
        t.columns().search('').draw();
    });

})(jQuery);