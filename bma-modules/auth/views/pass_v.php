<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>      
        <base href="<?php echo base_url(); ?>"/>
        <!-- META SECTION -->
        <title>BIT Pro Track :: Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="assets/img/favicon.png" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="assets/themes/css/theme-white.css"/>
        <link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><img src="assets/img/logo.png" alt="logo" class="center-block"/><h5 style=";text-align: center;margin-top:10px">Taisho Production Recipe System</h5></div>
                    <form action="index.html" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="NIP"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button class="btn btn-info btn-block">Kirim Password</button>
                            </div>
                            <div class="col-md-6">
                                <button type="reset" class="btn btn-default btn-block">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 Bit Maker Automation
                    </div>
                    <div class="pull-right">
                        <a href="auth">Login</a>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>






