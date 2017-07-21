<?php
$auth = $this->session->userdata('auth');
?>
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="." style="padding:10px"><img  style="width:100%;margin-top: -7px" src="assets/img/logorecipe.png" alt="Logo Recipe"/></a>

            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="." class="profile-mini">
                <img src="photo/user/<?php echo $auth['id']; ?>" alt="<?php echo $auth['username']; ?>">
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="photo/user/<?php echo $auth['id']; ?>" alt="<?php echo $auth['username']; ?>">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $auth['namalengkap']; ?></div>
                    <div class="profile-data-title"><?php echo $auth['groupname']; ?></div>
                    <input type="hidden" id="logged_in_user_id" value="<?php echo $auth['id'] ;?>" />
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Main Menu</li>
        <?php echo Modules::run('menu/_createMenu', $auth['group_id']) ?>
    </ul>
    <!-- END X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <div id="logobawah" style="background: #fff;width: 200px;padding: 10px;margin: 5px;margin-bottom: 20px;text-align: center;background: #fff;border: 3px #ccc solid;border-radius:10px;">
                <img class="logosrc" src="assets/img/logoreport.png" style="width: 100%" alt="">
            </div>
        </li>

    </ul>

</div>
<!-- END PAGE SIDEBAR -->
