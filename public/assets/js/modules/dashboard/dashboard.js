(function ($) {
    $("#btndetail").click(function () {
        window.location.replace("laporan/lap-biodata/detail/" + $("#pegawai_id").val());
    })

    //--- Button Cetak Detail
    $("#btncetakdetail").click(function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $('#printing_target').remove();
        $("<iframe id=\"printing_target\" src=\"laporan/lap-biodata/cetak/" + id + "\" style=\"width:0;height:0;border:0px;\"></iframe>").appendTo("body");
    });
})(jQuery);