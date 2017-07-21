<link href="assets/css/jsKeyboard.css" rel="stylesheet" type="text/css"/>
<style>
    .rcpdiv {
        padding: 20px 0px 20px 10px;
        border-bottom: 1px solid #ccc;
        font-size: 1.8em;
        font-weight: bold;
    }
</style>
<script>var secondchecker = '<?php echo getOption('secondchecker'); ?>';</script>
<script>var loginfinger = '<?php echo getOption('loginfinger'); ?>';</script>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="panel panel-default">                                
            <div class="panel-body">

                <h3>Info Batch</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="10%">Recipe</td>
                                <td width="30%"  style="border-right: 2px solid #1e293d;">-</td>
                                <td width="10%">Start Time</td>
                                <td width="20%" style="border-right: 2px solid #1e293d;">-</td>
                                <td width="10%">Operator</td>
                                <td width="20%">-</td>
                            </tr>
                            <tr>
                                <td>No Batch</td>
                                <td style="border-right: 2px solid #1e293d;">-</td>
                                <td>Runtime</td>
                                <td style="border-right: 2px solid #1e293d;">-</td>
                                <td>Sec. Checker</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">                                
            <div class="panel-body">
                <div class="col-md-3">                        
                    <a href="javascrip:void(0)" class="tile tile-default tile-valign" style="margin-bottom: 0px;">
                        <div class="informer informer-primary">Socket Connection</div>
                        <div class="icon" style="padding-top:15px">
                            <i id="icon_socket" class="fa fa-plug"></i>
                        </div>
                    </a>                                                    
                </div>
                <div class="col-md-3">                        
                    <a href="javascrip:void(0)" class="tile tile-default tile-valign" style="margin-bottom: 0px;">
                        <div class="informer informer-primary">PLC Connection</div>
                        <div class="icon" style="padding-top:15px">
                            <i id="icon_plc" class="fa fa-random"></i>
                        </div>
                    </a>                                                
                </div>
                <div class="col-md-3">                        
                    <a href="javascrip:void(0)" class="tile tile-default tile-valign" style="margin-bottom: 0px;">
                        <div class="informer informer-primary">Alarm</div>
                        <div class="icon" style="padding-top:15px">
                            <i id="icon_alarm" class="fa fa-bell"></i>
                        </div>
                    </a>                                               
                </div>
                <div class="col-md-3">                        
                    <div class="widget widget-info" style="margin-bottom: 0px;">
                        <div class="widget-big-int plugin-clock">00:00</div>                            
                        <div class="widget-subtitle plugin-date" style="font-size: 14px;font-weight: bold">Loading...</div>
                    </div> 

                </div>
            </div>
        </div>
    </div>

    <!-- START TABS -->                                
    <div class="panel panel-default tabs">                            
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <?php foreach ($tanks as $key => $tank) :; ?>
                <li <?php if ($key == 0) echo 'class="active"'; ?>><a href="#tab-<?php echo $tank['tankorder']; ?>" role="tab" data-toggle="tab"><img src="assets/img/tank-icon.png" style="width: 20px;"> <b><?php echo $key + 1; ?>. <?php echo $tank['tankname']; ?></b></a></li>
            <?php endforeach; ?>
            <li><a href="#tab-report" role="tab" data-toggle="tab"><i class="fa fa-file-text"></i> Report</a></li>
            <li><a href="#tab-alarm" role="tab" data-toggle="tab"><i class="fa fa-bell"></i> Alarm</a></li>
        </ul>                            
        <div class="panel-body tab-content">
            <!--- TAB 1 --->
            <div class="tab-pane active" id="tab-1">
                <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Step : 1. Start Machine </h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">

                        <div class="content-frame">

                            <!-- START CONTENT FRAME LEFT -->
                            <div class="content-frame-right" style="min-height: 100px;">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3 class="push-up-0">Command Panel</h3>
                                        <div class="col-md-12">
                                            <button class="btn btn-default btn-block" style="height: 100px">Default</button>
                                            <button class="btn btn-primary btn-block" style="height: 100px">Default</button>
                                            <button class="btn btn-info btn-block" style="height: 100px">Default</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTENT FRAME LEFT -->

                            <!-- START CONTENT FRAME BODY -->
                            <div class="content-frame-body content-frame-body-left" style="min-height: 100px;">
                                <div class="panel panel-default">
                                    <div class="panel-body panel-body-table">                                
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Turbin</th>
                                                    <th>Impeller </th>
                                                    <th>Scrapper</th>
                                                    <th>Pressure</th>
                                                    <th>Temperature</th>
                                                    <th>Weight</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="vertical-align: middle;background: #0000C0;color: #fff;font-size: 1.5em;font-weight: bold;">
                                                    <td style="height: 50px;">Set Point</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="background: #008803;color: #fff">
                                                    <td>Tolerance</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="vertical-align: middle;font-size: 1.5em;font-weight: bold;">
                                                    <td style="height: 50px;">Actual</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Min</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Max</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>                                
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTENT FRAME BODY -->
                        </div>
                    </div>      
                    <div class="panel-footer">
                        <button id="btnNewBatch" class="btn btn-primary pull-right">New Bacth</button>
                    </div>                            
                </div>
            </div>
            <!--- TAB 2 --->
            <div class="tab-pane" id="tab-2">
                <div class="panel panel-default">
                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Step : 1. Start Machine </h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">

                        <div class="content-frame">

                            <!-- START CONTENT FRAME LEFT -->
                            <div class="content-frame-right" style="min-height: 100px;">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3 class="push-up-0">Command Panel</h3>

                                    </div>
                                </div>
                            </div>
                            <!-- END CONTENT FRAME LEFT -->

                            <!-- START CONTENT FRAME BODY -->
                            <div class="content-frame-body content-frame-body-left" style="min-height: 100px;">
                                <div class="panel panel-default">
                                    <div class="panel-body panel-body-table">                                
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Turbin</th>
                                                    <th>Impeller </th>
                                                    <th>Scrapper</th>
                                                    <th>Pressure</th>
                                                    <th>Temperature</th>
                                                    <th>Weight</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="vertical-align: middle;background: #0000C0;color: #fff;font-size: 1.5em;font-weight: bold;">
                                                    <td style="height: 50px;">Set Point</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="background: #008803;color: #fff">
                                                    <td>Tolerance</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="vertical-align: middle;font-size: 1.5em;font-weight: bold;">
                                                    <td style="height: 50px;">Actual</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Min</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Max</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Time</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>                                
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTENT FRAME BODY -->
                        </div>
                    </div>      
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right">Button</button>
                    </div>                            
                </div>
            </div>
            <div class="tab-pane" id="tab-report">
                <div class="panel-body panel-body-table">                                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Turbin</th>
                                <th>Impeller </th>
                                <th>Scrapper</th>
                                <th>Pressure</th>
                                <th>Temperature</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="vertical-align: middle">
                                <td style="height: 50px;">Set Point</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Toleransi</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="height: 50px;vertical-align: central">Actual</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Min</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Max</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>                                
                </div>
            </div>
            <div class="tab-pane" id="tab-alarm">

            </div>
        </div>
    </div>                                                   
    <!-- END TABS -->   
</div>
<audio id="buzzer" src="assets/sounds/buzzer.wav" type="audio/wav"></audio>    
<script src="assets/js/socket.io-1.4.5.js" type="text/javascript"></script>

<!-- ################## Modal New Batch ########################### -->
<div class="modal fade" id="vpModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form  id="frmNewBatch">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><img src="assets/img/cooker-icon.png">&nbsp;New Batch</h2>
                </div>
                <div class="modal-body">
                    <div id="divformstart" class="">
                        <div class="form-group row">
                            <label class="control-label col-lg-3" for="group_id" style="font-size: 2em">Recipe</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-addon mandatory" style="vertical-align: middle"><img src="assets/img/form-icon.png" style="width: 40px;vertical-align: top"></span>
                                    <input type="text" style="font-size: 2em;height: 50px;color:#000" id="recipe_tampil" placeholder="Recipe Name..." class="form-control" readonly="">
                                    <input type="text" id="recipe_id" name="recipe_id" style="display: none" data-validation="required">
                                    <span class="input-group-addon" id="searchRecipe" style="vertical-align: middle"><img src="assets/img/search-icon.png" style="width: 40px;vertical-align: top"></span>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group row">
                            <label for="no_batch" class="control-label col-lg-3" style="font-size: 2em">No Batch</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-addon mandatory" style="vertical-align: middle"><img src="assets/img/services-icon.png" style="width: 40px;"></span> 
                                    <input type="text" style="font-size: 2em;height: 50px" autofocus="" id="no_batch" name="no_batch" placeholder="No Batch..." data-validation="required" class="form-control">
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <?php if (getOption('secondchecker') == '1') : ?>
                            <hr>
                            <div class="form-group row">
                                <label for="no_batch" class="control-label col-lg-3" style="font-size: 2em">Username</label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory" style="vertical-align: middle"><img src="assets/img/user-secondchecker-icon.png" style="width: 40px;"></span> 
                                        <input type="text" style="font-size: 2em;height: 50px" autofocus="" id="username" name="username" placeholder="Second Checker..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="no_batch" class="control-label col-lg-3" style="font-size: 2em">Password</label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory" style="vertical-align: middle"><img src="assets/img/lock-icon.png" style="width: 40px;"></span> 
                                        <input type="text" style="font-size: 2em;height: 50px" id="password" name="password" placeholder="Password..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnStartNewBatch" title="Start" class="btn btn-default pull-left" style="width: 150px;height: 70px;box-shadow: 3px 3px 3px #888888;font-size: 1.5em">START <img src="assets/img/play-icon.png" style="width: 40px"></button>
                    <button id="btnkeyvirt" class="btn btn-default" style="width: 70px;height: 70px;box-shadow: 3px 3px 3px #888888;"><img src="assets/img/keyboard-black-icon.png" style="width: 40px"></button>
                    <button type="reset" class="btn btn-default" style="vertical-align:bottom">Reset</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="vertical-align:bottom">Close</button>
                </div>
                <div id="virtualKeyboard" style="background: #ccc;z-index: 9999;width: 890px;position: absolute;"></div>
            </div>
        </form>
    </div>
</div>

<!-- ################## Modal Recipe List ########################### -->
<div class="modal fade" id="recipemodal" role="dialog" aria-labelledby="jenisprodukmodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mainModalLabel"><i class="fa fa-bookmark-o"></i>&nbsp;Please Select Recipe</h4>
            </div>
            <form  id="frmJenis">
                <div class="modal-body" style="max-height: 450px;overflow: auto">
                    <?php if (count($rcps > 0)): ?>
                        <?php foreach ($rcps as $key => $val): ?>
                            <div class="rcpdiv" data-idp="<?php echo $val['id']; ?>"><?php echo ($key + 1) . '. <span class="nmr">' . $val['recipename'] . ' [' . $val['product_type'] . ']</span>'; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>