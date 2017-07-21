<!DOCTYPE html>
<html lang="en">
    <head>     
        <base href="<?php echo base_url(); ?>"/>
        <!-- META SECTION -->
        <title>BIT ProTrack :: Tempra</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="shortcut icon" href="assets/img/logo.png">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link href="assets/themes/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link id="theme" href="assets/themes/css/theme-white.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/alertify/css/alertify.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <!-- EOF CSS INCLUDE -->          
        <link href="assets/css/webapp.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">var baseUrl = '<?php echo base_url(); ?>';</script>
    </head>
    <body class="">
        <!-- START PAGE CONTAINER -->
         <?php $cl = ($this->router->fetch_class() == 'process') ? 'page-navigation-toggled' : ''; ?>
        <div class="page-container <?php echo $cl;?>">
 
        