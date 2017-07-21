(function ($) {

    //---- Socket Init
    var socket = io.connect('http://bitprotrack.pro:3001');
    //--- Socket ON
    socket.on('connect', function () {
        $("#lblSocket").html('Connected');
        $("#icon_socket").removeClass('merah blink-me').addClass('hijau');
    });
    socket.on('disconnect', function () {
        $("#lblSocket").html('Disconnected');
        $("#icon_socket").removeClass('hijau').addClass('merah blink-me');
        $("#lblPLC").html('PLC');
        $("#icon_plc").removeClass('hijau merah blink-me');
    });

    //--- Alarm Info
    socket.on('alarmINFO', function (data) {
        if (data.info == "on") {
            $("#icon_alarm").removeClass('abugelap').addClass('merah blink-me');
        } else {
            $("#icon_alarm").removeClass('merah blink-me').addClass('abugelap');
        }
    });

    //--- Recipe Modal Show 
    $("#searchRecipe").click(function () {
        $("#recipemodal").modal('show');
    });

    //---- Keyboard Virtual New Batch
    jsKeyboard.init("virtualKeyboard");
    $('#btnkeyvirt').click(function () {
        $("#no_batch").focus();
        $("#virtualKeyboard").toggle();
        return false;
    });

    $(".rcpdiv").click(function () {
        var nil = $(this).attr('data-idp');
        var isi = $(".nmr", this).html();
        $("#recipe_tampil").val(isi);
        $("#recipe_id").val(nil);
        $("#recipemodal").modal('hide');
    });

    $("#vpModal").modal({
        backdrop: 'static',
        keyboard: false
    }).modal('show');

    $('#btnNewBatch').click(function () {
        $("#vpModal").modal('show');
    })

    // Start New Batch Button
    $("#btnStartNewBatch").click(function (e) {
        e.preventDefault();
        if (loginfinger == false && secondchecker == true) {
            if ($('#no_batch').val() == '' || $('#recipe_id').val() == null) {
                bmafn.errMsg("Please fill form");
                return false;
            } else {
                $('#btnkeyvirt').click();
                $("#secondcheckerModal").modal('show');
                $('#btnkeyvirtsecchecker').click();
                return false;
            }
        }
        setTimeout(function () {
            $("#frmNewBatch").submit();
            return false;
        }, 1000);
    });

    //--- Validasi
    $.validate({
        form: "#frmNewBatch",
        validateOnBlur: false,
        onError: function () {
            $('.help-block').remove();
            bmafn.errMsg("Please fill form");
        },
        onSuccess: function () {
            //--- Start
            $.post('process/start', $("#frmNewBatch").serialize(), function (obj) {
                console.log(obj);return false;
                if (obj.msg == 1) {
                    $("#mainForm")[0].reset();
                    alertify.success("Insert Data Success");
                    return false;
//                    getData();
//                    $("#divformstart").slideUp();
//                    $("#startbtn").addClass('hide');
//                    $("#finishbtn").removeClass('hide');
//                    setRuntime();
//                    timer();
//                    tmax = setTimeout(maxtime, maxtimebuzzer);
                } else {
                    bmafn.errMsg(obj.msg);
                    return false;
                }
            }, "json").fail(function () {
                bmafn.errMsg();
                return false;
            });
        }
    });

//    svidget.load("#widgetContainer", "assets/img/d1.svg", {
//        data: 0.80,
//        color: "#da3333",
//        backColor: "#ffac33",
//        textColor: "#da3333",
//        showText: true,
//        width: 40,
//    });

})(jQuery);