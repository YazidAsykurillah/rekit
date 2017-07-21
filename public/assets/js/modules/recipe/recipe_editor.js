(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
        $("#turbin_setpoint").focus();
        $('.nav-tabs a[href="#tab2"]').tab('show');
        $("#turbin_dataset_id").html('').sel2bma();
        $("#impeller_dataset_id").html('').sel2bma();
        $("#scrapper_dataset_id").html('').sel2bma();
        $("#pressure_dataset_id").html('').sel2bma();
        $("#temperature_dataset_id").html('').sel2bma();
        $("#weight_dataset_id").html('').sel2bma();
        $("#introhopper_dataset_id").html('').sel2bma();
        $("#intropowder_dataset_id").html('').sel2bma();
        $("#introliquid_dataset_id").html('').sel2bma();
        $("#transferin_dataset_id").html('').sel2bma();
        $("#transferout_dataset_id").html('').sel2bma();
        $("#time_dataset_id").html('').sel2bma();
         $("#need_secondchecker").iCheck('uncheck');
        $(':submit').removeAttr('disabled');
    });

    //--- Select Recipe name
    $("#recipe_id").on("change", function (e) {
        $(".clrs").click();
        var txt = $('option:selected', this).text();
        txt = (txt != '') ? txt : '-';
        $("#lblrecipename").html(txt);
    });

    //--- Select Tank Process 
    $("#tankprocess_id").on("change", function (e) {
        $(".clrs").click();
        var txt = $('option:selected', this).text();
        txt = (txt != '') ? txt : '-';
        $("#lbltankname").html(txt);
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
            if ($("#groupname").val() == '') {
                bmafn.errMsg("Please fill form");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('recipe/recipe_editor/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('recipe/recipe_editor/insert', $("#mainForm").serialize(), function (obj) {
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
        $("#turbin_setpoint").val(d.turbin_setpoint).focus();
        $("#turbin_time").val(d.turbin_time);
        if (d.turbin_dataset_id != null) {
            $("#turbin_dataset_id").html('<option value="' + d.turbin_dataset_id + '">' + d.turbin_dataset + '</option>').sel2bma();
        } else {
            $("#turbin_dataset_id").html('').sel2bma();
        }
        $("#impeller_setpoint").val(d.impeller_setpoint);
        $("#impeller_time").val(d.impeller_time);
        if (d.impeller_dataset_id != null) {
            $("#impeller_dataset_id").html('<option value="' + d.impeller_dataset_id + '">' + d.impeller_dataset + '</option>').sel2bma();
        } else {
            $("#impeller_dataset_id").html('').sel2bma();
        }
        $("#scrapper_setpoint").val(d.scrapper_setpoint);
        $("#scrapper_time").val(d.scrapper_time);
        if (d.scrapper_dataset_id != null) {
            $("#scrapper_dataset_id").html('<option value="' + d.scrapper_dataset_id + '">' + d.scrapper_dataset + '</option>').sel2bma();
        } else {
            $("#scrapper_dataset_id").html('').sel2bma();
        }
        $("#pressure_setpoint").val(d.pressure_setpoint);
        $("#pressure_time").val(d.pressure_time);
        if (d.pressure_dataset_id != null) {
            $("#pressure_dataset_id").html('<option value="' + d.pressure_dataset_id + '">' + d.pressure_dataset + '</option>').sel2bma();
        } else {
            $("#pressure_dataset_id").html('').sel2bma();
        }
        $("#temperature_setpoint").val(d.temperature_setpoint);
        $("#temperature_time").val(d.temperature_time);
        if (d.temperature_dataset_id != null) {
            $("#temperature_dataset_id").html('<option value="' + d.temperature_dataset_id + '">' + d.temperature_dataset + '</option>').sel2bma();
        } else {
            $("#temperature_dataset_id").html('').sel2bma();
        }
        $("#weight_setpoint").val(d.weight_setpoint);
        $("#weight_time").val(d.weight_time);
        if (d.weight_dataset_id != null) {
            $("#weight_dataset_id").html('<option value="' + d.weight_dataset_id + '">' + d.weight_dataset + '</option>').sel2bma();
        } else {
            $("#weight_dataset_id").html('').sel2bma();
        }
        $("#introhopper_setpoint").val(d.introhopper_setpoint);
        $("#introhopper_time").val(d.introhopper_time);
        if (d.introhopper_dataset_id != null) {
            $("#introhopper_dataset_id").html('<option value="' + d.introhopper_dataset_id + '">' + d.introhopper_dataset + '</option>').sel2bma();
        } else {
            $("#introhopper_dataset_id").html('').sel2bma();
        }
        $("#intropowder_setpoint").val(d.intropowder_setpoint);
        $("#intropowder_time").val(d.intropowder_time);
        if (d.intropowder_dataset_id != null) {
            $("#intropowder_dataset_id").html('<option value="' + d.intropowder_dataset_id + '">' + d.intropowder_dataset + '</option>').sel2bma();
        } else {
            $("#intropowder_dataset_id").html('').sel2bma();
        }
        $("#introliquid_setpoint").val(d.introliquid_setpoint);
        $("#introliquid_time").val(d.introliquid_time);
        if (d.introliquid_dataset_id != null) {
            $("#introliquid_dataset_id").html('<option value="' + d.introliquid_dataset_id + '">' + d.introliquid_dataset + '</option>').sel2bma();
        } else {
            $("#introliquid_dataset_id").html('').sel2bma();
        }
        $("#transferin_setpoint").val(d.transferin_setpoint);
        $("#transferin_time").val(d.transferin_time);
        if (d.transferin_dataset_id != null) {
            $("#transferin_dataset_id").html('<option value="' + d.transferin_dataset_id + '">' + d.transferin_dataset + '</option>').sel2bma();
        } else {
            $("#transferin_dataset_id").html('').sel2bma();
        }
        $("#transferout_setpoint").val(d.transferout_setpoint);
        $("#transferout_time").val(d.transferout_time);
        if (d.transferout_dataset_id != null) {
            $("#transferout_dataset_id").html('<option value="' + d.transferout_dataset_id + '">' + d.transferout_dataset + '</option>').sel2bma();
        } else {
            $("#transferout_dataset_id").html('').sel2bma();
        }
        $("#time_setpoint").val(d.time_setpoint);
        $("#time_time").val(d.time_time);
        if (d.time_dataset_id != null) {
            $("#time_dataset_id").html('<option value="' + d.time_dataset_id + '">' + d.time_dataset + '</option>').sel2bma();
        } else {
            $("#time_dataset_id").html('').sel2bma();
        }
        $("#quality_instruction").val(d.quality_instruction);
        $("#safety_instruction").val(d.safety_instruction);
        $("#need_secondchecker").iCheck(d.need_secondchecker == 1 ? 'check' : 'uncheck');
        $("body").data("id", d.id);
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        pageLength: 50,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'recipe/recipe_editor/getData',
            type: 'POST',
            data: function (d) {
                d.rid = $("#recipe_id").val();
                d.tid = $("#tankprocess_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'turbin_setpoint', orderable: false},
            {data: 'turbin_time', orderable: false},
            {data: 'turbin_dataset', orderable: false},
            {data: 'impeller_setpoint', orderable: false},
            {data: 'impeller_time', orderable: false},
            {data: 'impeller_dataset', orderable: false},
            {data: 'scrapper_setpoint', orderable: false},
            {data: 'scrapper_time', orderable: false},
            {data: 'scrapper_dataset', orderable: false},
            {data: 'pressure_setpoint', orderable: false},
            {data: 'pressure_time', orderable: false},
            {data: 'pressure_dataset', orderable: false},
            {data: 'temperature_setpoint', orderable: false},
            {data: 'temperature_time', orderable: false},
            {data: 'temperature_dataset', orderable: false},
            {data: 'weight_setpoint', orderable: false},
            {data: 'weight_time', orderable: false},
            {data: 'weight_dataset', orderable: false},
            {data: 'introhopper_setpoint', orderable: false},
            {data: 'introhopper_time', orderable: false},
            {data: 'introhopper_dataset', orderable: false},
            {data: 'intropowder_setpoint', orderable: false},
            {data: 'intropowder_time', orderable: false},
            {data: 'intropowder_dataset', orderable: false},
            {data: 'introliquid_setpoint', orderable: false},
            {data: 'introliquid_time', orderable: false},
            {data: 'introliquid_dataset', orderable: false},
            {data: 'transferin_setpoint', orderable: false},
            {data: 'transferin_time', orderable: false},
            {data: 'transferin_dataset', orderable: false},
            {data: 'transferout_setpoint', orderable: false},
            {data: 'transferout_time', orderable: false},
            {data: 'transferout_dataset', orderable: false},
            {data: 'time_setpoint', orderable: false},
            {data: 'time_time', orderable: false},
            {data: 'time_dataset', orderable: false},
            {data: 'need_secondchecker', orderable: false, className: "dt-body-center", render: function (data, type, row, meta) {
                    var act = (data == '1') ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-times"></i></span>';
                    return act;
                }},
            {data: 'orderaction'},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line"><i class="fa  fa-pencil"></i></a>';
                }
            },
            {data: 'quality_instruction', visible: false, searchable: false, className: 'never'},
            {data: 'safety_instruction', visible: false, searchable: false, className: 'never'},
            {data: 'turbin_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'impeller_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'scrapper_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'pressure_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'temperature_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'weight_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'introhopper_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'intropowder_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'introliquid_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'transferin_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'transferout_dataset_id', visible: false, searchable: false, className: 'never'},
            {data: 'time_dataset_id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[38, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'recipe/recipe_editor/delete');

    t.MakeCellsEditable({
        "onUpdate": myCallbackFunction,
        "inputCss": 'my-input-class',
        "columns": [1, 2, 4, 5, 7, 8, 10, 11, 13, 14, 16, 17, 19, 20, 22, 23, 25, 26, 28, 29, 31, 32, 34, 35],
        "confirmationButton": {
            "confirmCss": 'my-confirm-class',
            "cancelCss": 'my-cancel-class'
        },
    });

    function myCallbackFunction(updatedCell, updatedRow, oldValue) {
        console.log("The new value for the cell is: " + updatedCell.data());
        console.log(updatedRow.data());
        console.log(updatedRow.data().id);
        console.log(updatedCell.data());
    }

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 38 && $(this).index() != 39) {
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
                $.post(baseUrl + 'recipe/recipe_editor/delete', {id: JSON.stringify(id)}, function (obj) {
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