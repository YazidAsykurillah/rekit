/*
 *  Author : Budi Irawan
 */
(function ($) {
    //--- Language 
    var msg = getCookie('loginlang');
    msg = msg.length === 0 ? "id" : msg;
    var en = {
        fill: 'Please fill the form',
        errc: 'Connection Problem',
        wuser: 'Wrong Username',
        wpass: 'Wrong Password',
        noactiv: 'User Not Active, Contact Admin'
    }
    var id = {
        fill: 'Silahkan lengkapi form',
        errc: 'Masalah koneksi',
        wuser: 'Username tidak ditemukan',
        wpass: 'Password salah',
        noactiv: 'User tidak aktif, Silahkan kontak admin'
    }

    $("#frmLogin").submit(function (e) {
        e.preventDefault();
        if ($("#username").val() == '' || $("#password").val() == '') {
            alertify.error(eval(msg).fill);
        } else {
            var hr = decodeURIComponent($(location).attr('search'));
            $.post('auth/login', $(this).serialize(), function (obj) {
                switch (obj) {
                    case 'U':
                        alertify.error(eval(msg).wuser);
                        break;
                    case 'P':
                        alertify.error(eval(msg).wpass);
                        break;
                    case 'S':
                        alertify.error(eval(msg).noactiv);
                        break;
                    case 'C':
                        window.location.replace('auth/pass');
                        break;
                    default:
                        hr = (hr.substr(3) != '') ? hr.substr(3) : '.';
                        window.location.replace(hr);
                }
            }
            ).fail(function () {
                alertify.error(eval(msg).errc);
            });
        }

    })

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0)
                return c.substring(name.length, c.length);
        }
        return "";
    }
    
    //---- Keyboard Virtual
    jsKeyboard.init("virtualKeyboard");
    $('#btnkeyvirt').click(function () {
        var pos = $(this).position();
        var to = pos.top - 310;
        var le = pos.left - 850;
        $("#virtualKeyboard").css({top: to + "px", left: le + 'px'});
        $("#virtualKeyboard").toggle();
    });

    $("#eyepass").click(function (e) {
        e.preventDefault();
        $("#password").prop("type", "text");
        setTimeout(function () {
            $("#password").prop("type", "password");
        }, 1000);
    });

})(jQuery);

