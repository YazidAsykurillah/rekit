        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="assets/themes/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='assets/themes/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="assets/themes/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="assets/themes/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="assets/themes/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='assets/themes/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='assets/themes/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='assets/themes/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="assets/themes/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="assets/themes/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="assets/themes/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <script type="text/javascript" src="assets/themes/js/plugins.js"></script>        
        <script type="text/javascript" src="assets/themes/js/actions.js"></script>
        
        <!-- END TEMPLATE -->
        <script src="assets/libs/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables/js/dataTables.responsive.js" type="text/javascript"></script>
        <script src="assets/libs/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="assets/libs/alertify/js/alertify.min.js" type="text/javascript"></script>
        <script src="assets/libs/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/libs/form-validator/jquery.form-validator.min.js" type="text/javascript"></script>
        <script src="assets/libs/form-validator/custom-validation.js" type="text/javascript"></script>
        <script src="assets/libs/js.cookie.js" type="text/javascript"></script>
        <script src="assets/js/webapp.js" type="text/javascript"></script>
        
        
        <?php
        if (isset($jsfiles) && is_array($jsfiles)) {
            foreach ($jsfiles as $file) {
                echo '<script src="assets/js/modules/' . $modules . '/' . $file . '.js" type="text/javascript"></script>';
            }
        }
        ?>
    <!-- END SCRIPTS -->         
    </body>
</html>