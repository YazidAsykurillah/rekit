<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>      
        <base href="<?php echo base_url(); ?>"/>
        <!-- META SECTION -->
        <title>BIT Pro Track :: Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="assets/img/favicon.jpg" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="assets/themes/css/theme-white.css"/>
        <link href="assets/libs/alertify/css/alertify.core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jsKeyboard.css" rel="stylesheet" type="text/css"/>


        <link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <div class="login-container">
            <div id="virtualKeyboard" style="background: #ccc;z-index: 9999;width: 850px;position: absolute;display: none"></div>
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><img src="assets/img/logo.png" alt="logo" class="center-block"/><h5 style=";text-align: center;margin-top:10px">Taisho Recipe Management System</h5></div>
                    <form class="form-horizontal" id="frmLogin">
                        <div style="margin-bottom: 10px">
                            <input style="font-size: 2em" type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus=""/>
                        </div>
                        <div style="margin-bottom: 10px">
                            <div class="input-group">
                                <input style="font-size: 2em" type="password" id="password" name="password" class="form-control" placeholder="Password"/>
                                <span id="eyepass" class="input-group-addon" style="vertical-align: middle;cursor: pointer;width: 50px"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block" style="height: 80px;font-size: 1.4em"><i class="glyphicon glyphicon-user"></i> Log In</button>
                                <button type="reset" class="btn btn-default btn-block" style="">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="width: 200px;position: absolute;bottom: 0;padding: 10px;margin: 5px;margin-bottom: 20px;text-align: center;background: #fff;border: 3px #ccc solid;border-radius:10px">
                <img class="logosrc" src="assets/img/logoreport.png" style="width: 100%" alt="">
            </div>
        </div>
        <a id="btnkeyvirt" class="btn btn-app" data-stop="0" style="position: absolute;bottom: 10px;right: 10px;">
            <i class="fa fa-keyboard-o"></i> Keyboard
        </a>
        <script src="assets/libs/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/modules/auth/jsKeyboard.js" type="text/javascript"></script>
        <script src="assets/libs/alertify/js/alertify.min.js" type="text/javascript"></script>
        <script src="assets/js/modules/auth/auth.js" type="text/javascript"></script>
    </body>
</html>






