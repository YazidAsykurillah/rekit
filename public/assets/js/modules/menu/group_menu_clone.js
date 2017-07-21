(function ($) {
    //--- Form Submit
    $("#mainForm").submit(function (e) {
        e.preventDefault();
        $(':submit', this).attr('disabled', true);
        if ($("#group_id").val() == null || $("#target_group_id").val() == null) {
            bmafn.errMsg("Please select user group");
            return false;
        }
        if ($("#group_id").val() == $("#target_group_id").val() ) {
            bmafn.errMsg("User group must different");
            return false;
        }
        if ($("#target_group_id").val() == '1') {
            bmafn.errMsg("Target can't Administrator Group");
            return false;
        }
        alertify.confirm("Group menu will be cloned to target", function (e) {
            if (e) {
                $.post('menu/group_menu_clone/clonemenu', $("#mainForm").serialize(), function (obj) {
                    if (obj.msg == 1) {
                        $("#mainForm")[0].reset();
                        alertify.success("Clone Data Success");
                    } else {
                        bmafn.errMsg(obj.msg);
                    }
                }, "json").fail(function () {
                    bmafn.errMsg();
                });
            }
        });

    }).on('reset', function (e) {
        $("#ftitle").html('Clone Group Menu');
        $("#group_id").html('').sel2bma().focus();
        $("#target_group_id").html('').sel2bma();
        $(':submit').removeAttr('disabled');
    });

})(jQuery);