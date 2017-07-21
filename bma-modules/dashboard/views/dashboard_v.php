<?php
$this->load->library('user_agent');
$id = strpos($this->agent->platform(), 'Windows') !== false ? 'Indonesian' : 'id_ID';
setlocale(LC_TIME, $id);
$bln = date('m');
$monthName = strftime("%B", mktime(null, null, null, $bln));
$tgl = date('Y-m-d');
?>
<div class="row">
    <div class="col-md-3">

        <!-- START WIDGET SLIDER -->
        <div class="widget widget-default widget-carousel">
            <div class="owl-carousel owl-theme" id="owl-example" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1926px; left: 0px; display: block; transition: all 400ms ease; transform: translate3d(-642px, 0px, 0px);"><div class="owl-item" style="width: 321px;"><div>                                    
                                <div class="widget-title">Total Visitors</div>                                                                        
                                <div class="widget-subtitle">27/08/2014 15:23</div>
                                <div class="widget-int">3,548</div>
                            </div></div><div class="owl-item" style="width: 321px;"><div>                                    
                                <div class="widget-title">Returned</div>
                                <div class="widget-subtitle">Visitors</div>
                                <div class="widget-int">1,695</div>
                            </div></div><div class="owl-item" style="width: 321px;"><div>                                    
                                <div class="widget-title">New</div>
                                <div class="widget-subtitle">Visitors</div>
                                <div class="widget-int">1,977</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="owl-controls"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div></div></div></div>                            
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                             
        </div>         
        <!-- END WIDGET SLIDER -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href = 'pages-messages.html';">
            <div class="widget-item-left">
                <span class="fa fa-envelope"></span>
            </div>                             
            <div class="widget-data">
                <div class="widget-int num-count">48</div>
                <div class="widget-title">New messages</div>
                <div class="widget-subtitle">In your mailbox</div>
            </div>      
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" onclick="location.href = 'pages-address-book.html';">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?php echo $totaluser; ?></div>
                <div class="widget-title">Registred users</div>
                <div class="widget-subtitle">On your system</div>
            </div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
        </div>                            
        <!-- END WIDGET REGISTRED -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-info widget-padding-sm">
            <div class="widget-big-int plugin-clock">07<span>:</span>15</div>                            
            <div class="widget-subtitle plugin-date">Sunday, February 19, 2017</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>                            
        </div>                        
        <!-- END WIDGET CLOCK -->

    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Activities Review</h3>
            </div>

            <div class="panel-body">

            </div>
        </div>
    </div>
</div>
</div>