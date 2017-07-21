/*
 *  Author : Budi Irawan
 */
(function ($) {
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        if ($("#passlama").val() == '' || $("#password").val() == '' || $("#password2").val() == '') {
            alertify.error("Silahkan lengkapi form");
        } else if ($("#password").val() != $("#password2").val()) {
            alertify.error("Password Baru Tidak Sama");
        } else {
            $.post('auth/ubah_password/update', $(this).serialize(), function (obj) {
                switch (obj.msg) {
                    case 'P':
                        alertify.error("Password Lama Salah");
                        break;
                    default:
                        $("#mainForm")[0].reset();
                        alertify.success("Password Update Success");
                        break;
                }
            }, "json").fail(function () {
                alertify.error(eval(msg).errc);
            });
        }

    })
})(jQuery);

