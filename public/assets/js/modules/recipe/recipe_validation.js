(function ($) {

    var logged_in_user_id = $('#logged_in_user_id').val();

    //--- Select Group Validator
    $("#recipe_id").on("change", function (e) {
        $(".clrs").click();
    });
    //--- Datatables
    var t = $('#mainTable table').DataTable({
        serverSide: true,
        processing: true,
        autoWidth: false,
        sDom: 'i<"table-responsive clear"t><"row"lp>',
        ajax: {
            url: baseUrl + 'recipe/recipe_validation/getRecipeValidation',
            type: 'POST',
            data: function (d) {
                d.r_id = $("#recipe_id").val();
            }
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data:'namavalidator'},
            {data:'orderuser'},
            {data:'flag'},
            {data: 'id', className: "dt-body-center", orderable: false, width: "10%", render: function (data, type, row, meta) {
                    var btnval = '<button title="Validate" href="#" class="btn btn-primary btn-sm btn-line btnValidate" data-toggle="tooltip" data-placement="left" data-recipevalidationid="'+data+'"><i class="fa fa-check-square-o"></i></button>';
                    var btn = (row.flag != 1 && row.user_id == logged_in_user_id && row.next_validator_id == logged_in_user_id) ? btnval : "";
                    return btn;
                }
            },
            {data: 'recipe_id', visible: false, searchable: false, className: 'never'},
            {data: 'user_id', visible: false, searchable: false, className: 'never'},
            {data: 'next_validator_id', visible: false, searchable: false, className: 'never'},
            {data: 'recipename', visible: false, searchable: false, className: 'never'},
            {data: 'groupvalidatorname', visible: false, searchable: false, className: 'never'},
        ],
        order: [[2, 'asc']]
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

    $('#mainTable').on('click', 'button.btnValidate', function (e) {
        e.preventDefault();
        var elm = $(this).closest("tr");
        var d = t.row(elm).data();
        alertify.confirm("You are going to validate <b>" + d.recipename + "</b> ", function (e) {
            if (e) {
                $.post('recipe/recipe_validation/run_validation', "r_id=" + d.id, function (obj) {
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
    
    

})(jQuery);