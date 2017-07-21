(function ($) {

    //--- Refresh Button
    $('#btnrefresh').click(function (e) {
        e.preventDefault();
        alertify.confirm("List method akan di update, anda yakin ?", function (e) {
            if (e) {
                $.get(baseUrl + 'admin/listmethod/insert', function (obj) {
                    if (obj.msg == 1) {
                        t.ajax.reload();
                        alertify.success("Refresh Data Success");
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
            url: baseUrl + 'admin/listmethod/getData',
            type: 'POST'
        },
        columns: [
            {data: "#", width: "5%", orderable: false, searchable: false},
            {data: 'controller'},
            {data: 'method', render: function (data, type, row, meta) {
                    var mtd = (data == 'index') ? '<span class="label label-success">index</span>' : data;
                    return mtd;
                }},
            {data: 'info'},
            {data: 'path'},
            {data: 'id', visible: false, searchable: false, className: 'never'},
        ],
        order: [[1, 'asc']]
    });
    //--- Select Row , Toggle Row & Delete
    $('#mainTable').selectDTbma(t, 'admin/listmethod/delete');

    // Setup - add a text input to each header cell
    $('#searchid td').each(function () {
        if ($(this).index() != 0 && $(this).index() != 6 && $(this).index() != 8) {
            $(this).html('<input style="width:100%" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
        }
        if ($(this).index() == 7) {
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

})(jQuery);