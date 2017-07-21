(function ($) {
    
    //--- Select Recipe name
    $("#recipe_id").on("change", function (e) {
        $(".clrs").click();
        if ($("#recipe_id").val() != null) {
            $(".divt").css('display', 'block');
            $('#btnsubmit').attr('disabled', false);
        } else {
            $("#mainForm")[0].reset();
            $('#btnsubmit').attr('disabled', true);
            $("#recipe_id").html('').sel2bma();
            $(".divt").css('display', 'none');
        }
    });

    //import default handling
    $('#btnImportDefault').on('click', function(e){
        $.ajax({
            url : baseUrl + 'recipe/recipe_tolerance/getDefaultRecipeTolerance',
            method : 'GET',
            beforeSend : function(){},
            success : function(response){
                var obj = JSON.parse(response);
                $('#turbin').val(obj.turbin);
                $('#impeller').val(obj.impeller);
                $('#scrapper').val(obj.scrapper);
                $('#pressure').val(obj.pressure);
                $('#temperature').val(obj.temperature);
                $('#weight').val(obj.weight);
                $('#introhopper').val(obj.introhopper);
                $('#intropowder').val(obj.intropowder);
                $('#introliquid').val(obj.introliquid);
                $('#transferin').val(obj.transferin);
                $('#transferout').val(obj.transferout);
                $('#time').val(obj.time);
                $('#description').val(obj.description);
            }
        });
    });

    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
    }).on('reset', function (e) {
        $("#ftitle").html('Add');
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
            if ( $('#recipe_id').val() == null || $("#turbin").val() == null || $("#impeller").val() == null) {
                bmafn.errMsg("Please fill form");
                return false;
            }
            if ($("#ftitle").html().substr(0, 4) == "Edit") {
                //--- Edit
                $.post('recipe/recipe_tolerance/update', $("#mainForm").serialize() + "&id=" + $("body").data("id"), function (obj) {
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
                $.post('recipe/recipe_tolerance/insert', $("#mainForm").serialize(), function (obj) {
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
        $("#turbin").val(d.turbin);
        $("#impeller").val(d.impeller);
        $("#scrapper").val(d.scrapper);
        $("#pressure").val(d.pressure);
        $("#temperature").val(d.temperature);
        $("#weight").val(d.weight);
        $("#introhopper").val(d.introhopper);
        $("#intropowder").val(d.intropowder);
        $("#introliquid").val(d.introliquid);
        $("#transferin").val(d.transferin);
        $("#transferout").val(d.transferout);
        $("#time").val(d.time);
        $("#description").val(d.description);
        $("body").data("id", d.id);
    });

    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'recipe/recipe_tolerance/getData',
            type: 'POST',
            data: function (d) {
                d.rid = $("#recipe_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'turbin'},
            {data: 'impeller'},
            {data: 'scrapper'},
            {data: 'pressure'},
            {data: 'temperature'},
            {data: 'weight'},
            {data: 'introhopper'},
            {data: 'intropowder'},
            {data: 'introliquid'},
            {data: 'transferin'},
            {data: 'transferout'},
            {data: 'time'},
            {data: 'description'},
            {data: 'id', className: "dt-body-center", orderable: false, width: "5%", render: function (data, type, row, meta) {
                    return '<a title="Edit" href="#" class="btn btn-primary btn-sm btn-line btnedit" data-toggle="tooltip" data-placement="left"><i class="fa  fa-pencil"></i></a>';
                }
            },
            {data: 'recipe_id', visible: false, searchable: false, className: 'never'}
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'recipe/recipe_tolerance/delete');

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