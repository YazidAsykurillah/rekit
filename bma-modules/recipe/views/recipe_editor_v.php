<style>
    .divt {
        margin: 2px;
    }
    .my-confirm-class,a.my-confirm-class:hover {
        padding: 3px 6px;
        font-size: 12px;
        color: white;
        text-align: center;
        vertical-align: middle;
        border-radius: 4px;
        background-color: #337ab7;
        text-decoration: none;
    }
    .my-cancel-class ,a.my-cancel-class:hover{
        padding: 3px 6px;
        font-size: 12px;
        color: white;
        text-align: center;
        vertical-align: middle;
        border-radius: 4px;
        background-color: #a94442;
        text-decoration: none;
    }
    .my-input-class {
        padding: 3px 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

</style>
<div class="row">
    <div class="col-md-12">
        <form id="mainForm">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Details of Recipe</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body"> 

                    <!-- START VERTICAL TABS WITH HEADING -->
                    <div class="panel panel-default nav-tabs-vertical">                   
                        <div class="panel-heading">
                            <div class="col-lg-6">
                                <h3 class="panel-title"><img src="assets/img/activity-icon.png" style="width: 25px;"> Recipe Name : <span id="lblrecipename" style="font-weight: bold">-</span></h3>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="panel-title"><img src="assets/img/tank-icon.png" style="width: 25px;"> Tank Name : <span id="lbltankname" style="font-weight: bold">-</span></h3>
                            </div>
                        </div>
                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab" style="color:#073642"><img src="assets/img/form-icon.png" style="width: 25px;"> <b>Main Form</b></a></li>
                                <li><a href="#tab2" data-toggle="tab"><img src="assets/img/setpoint-icon.png" style="width: 20px;"> Set Point</a></li>
                                <li><a href="#tab3" data-toggle="tab"><img src="assets/img/trigger-icon.png" style="width: 20px;"> Trigger</a></li>
                                <li><a href="#tab4" data-toggle="tab"><img src="assets/img/info-icon.png" style="width: 20px;"> Info Form</a></li>
                            </ul>                    
                            <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab1" style="min-height: 150px">
                                    <div class="col-lg-8" style="margin-bottom: 10px">
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Recipe Name</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-bookmark"></i></span>
                                                    <select name="recipe_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Recipe Name..."
                                                            data-url="recipe/recipe_editor/getRecipe/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="recipe_id" placeholder="Recipe Name"  class='form-control select2'>
                                                    </select>
                                                    <span class="input-group-addon"><a href="recipe/" target="_blank" title="Add Recipe"><i class="fa fa-plus-circle"></i></a></span>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4" for="tankprocess_id">Tank Name</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-database"></i></span>
                                                    <select name="tankprocess_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Tank Process..."
                                                            data-url="recipe/recipe_editor/getTankprocess/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="tankprocess_id" placeholder="Tank Name"  class='form-control select2'>
                                                    </select>
                                                    <span class="input-group-addon"><a href="master/tank-process" target="_blank" title="Add Tank Process"><i class="fa fa-plus-circle"></i></a></span>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-4">
                                        <span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;
                                    </div>

                                </div><!--END TAB 1-->
                                <div class="tab-pane" id="tab2">
                                    <div class="form-group row">
                                        <label for="description" class="control-label col-lg-2">Description</label>
                                        <div class="col-lg-9">
                                            <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-inline" style="margin-top:10px">
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Turbin</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-gear fa-spin"></i></span>
                                                    <input type="text" id="turbin_setpoint" name="turbin_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="turbin_time" name="turbin_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="turbin_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Turbin..."
                                                            data-url="recipe/recipe_editor/getDataset_turbin/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="turbin_dataset_id" placeholder="Data Set Turbin"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Impeller</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-gear"></i></span>
                                                    <input type="text" id="impeller_setpoint" name="impeller_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="impeller_time" name="impeller_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="impeller_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Impeller..."
                                                            data-url="recipe/recipe_editor/getDataset_impeller/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="impeller_dataset_id" placeholder="Data Set Impeller"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Scrapper</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-gear"></i></span>
                                                    <input type="text" id="scrapper_setpoint" name="scrapper_setpoint"  class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="scrapper_time" name="scrapper_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="scrapper_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Scrapper..."
                                                            data-url="recipe/recipe_editor/getDataset_scrapper/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="scrapper_dataset_id" placeholder="Data Set Scrapper"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Pressure</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-dashboard"></i></span>
                                                    <input type="text" id="pressure_setpoint" name="pressure_setpoint"  class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="pressure_time" name="pressure_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="pressure_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Pressure..."
                                                            data-url="recipe/recipe_editor/getDataset_pressure/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="pressure_dataset_id" placeholder="Data Set Pressure"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Temperature</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-thermometer"></i></span>
                                                    <input type="text" id="temperature_setpoint" name="temperature_setpoint"  class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="temperature_time" name="temperature_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="temperature_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Temperature..."
                                                            data-url="recipe/recipe_editor/getDataset_temperature/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="temperature_dataset_id" placeholder="Data Set Temperature"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Weight</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-dashboard"></i></span>
                                                    <input type="text" id="weight_setpoint" name="weight_setpoint"  class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="weight_time" name="weight_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="weight_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Weight..."
                                                            data-url="recipe/recipe_editor/getDataset_weight/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="weight_dataset_id" placeholder="Data Set Weight"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Intro Hopper</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-database"></i></span>
                                                    <input type="text" id="introhopper_setpoint" name="introhopper_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="introhopper_time" name="introhopper_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="introhopper_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Intro Hopper..."
                                                            data-url="recipe/recipe_editor/getDataset_introhopper/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="introhopper_dataset_id" placeholder="Data Set Intro Hopper"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Intro Powder</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-tint"></i></span>
                                                    <input type="text" id="intropowder_setpoint" name="intropowder_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="intropowder_time" name="intropowder_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="intropowder_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Intro Powder..."
                                                            data-url="recipe/recipe_editor/getDataset_intropowder/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="intropowder_dataset_id" placeholder="Data Set Intro Powder"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Intro Liquid</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-flask"></i></span>
                                                    <input type="text" id="introliquid_setpoint" name="introliquid_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="introliquid_time" name="introliquid_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="introliquid_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Intro Liquid..."
                                                            data-url="recipe/recipe_editor/getDataset_introliquid/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="introliquid_dataset_id" placeholder="Data Set Intro Liquid"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Transfer In</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-arrow-down"></i></span>
                                                    <input type="text" id="transferin_setpoint" name="transferin_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="transferin_time" name="transferin_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="transferin_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Transfer In..."
                                                            data-url="recipe/recipe_editor/getDataset_transferin/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="transferin_dataset_id" placeholder="Data Set Transfer In"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Transfer Out</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-arrow-up"></i></span>
                                                    <input type="text" id="transferout_setpoint" name="transferout_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="transferout_time" name="transferout_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="transferout_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Transfer Out..."
                                                            data-url="recipe/recipe_editor/getDataset_transferout/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="transferout_dataset_id" placeholder="Data Set Transfer Out"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 divt">
                                            <div class="col-lg-12 row">
                                                <label class="control-label col-lg-2">Time</label>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="time_setpoint" name="time_setpoint" class="form-control" placeholder="Set Point" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" id="time_time" name="time_time" class="form-control" placeholder="Time" value="0"/>
                                                </div>
                                                <div class="input-group col-lg-3">
                                                    <select name="time_dataset_id"
                                                            data-ajax="true" 
                                                            data-placeholder="Select Data Set Time..."
                                                            data-url="recipe/recipe_editor/getDataset_time/" 
                                                            data-value="" 
                                                            data-limit="100"
                                                            id="time_dataset_id" placeholder="Data Set Time"  class="form-control select2" style="width: 100%">
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!--END TAB 2-->
                                <div class="tab-pane" id="tab3" style="min-height: 150px">
                                    <div style="background: #ccc">
                                        <div class="col-lg-12" style="border:1px dashed #ccc;padding:5px;margin:5px">
                                            <div class="row col-lg-6">
                                                <label class="control-label col-lg-4">First Change by</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon mandatory"><i class="fa fa-flash"></i></span>
                                                        <select name="firstchangeby" class='form-control select2' style="width: 100%">
                                                            <option value="-">-</option>
                                                            <option value="turbin">Turbin</option>
                                                            <option value="impeller">Impeller</option>
                                                            <option value="scrapper">Scrapper</option>
                                                            <option value="pressure">Pressure</option>
                                                            <option value="temperature">Temperature</option>
                                                            <option value="weight">Weight</option>
                                                            <option value="introhopper">Intro Hopper</option>
                                                            <option value="intropowder">Intro Powder</option>
                                                            <option value="introliquid">Intro Liquid</option>
                                                            <option value="transferin">Transfer In</option>
                                                            <option value="transferout">Transfer out</option>
                                                            <option value="time">Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="col-lg-6" style="margin-bottom: 10px">
                                                <label class="control-label col-lg-3">Comparison</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon mandatory"><i class="fa fa-unsorted"></i></span>
                                                        <select name="logic_change" class='form-control' style="width: 100%">
                                                            <option value="greater">>=</option>
                                                            <option value="smaller"><=</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-6" style="margin-bottom: 10px">
                                            <label class="control-label col-lg-4">Logic</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                                                    <select name="logic_change" class='form-control' style="width: 100%">
                                                        <option value="or">OR</option>
                                                        <option value="and">AND</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-lg-12" style="border:1px dashed #ccc;padding:5px;margin:5px">
                                        <div class="col-lg-6">
                                            <label class="control-label col-lg-4">Second Change by</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-flash"></i></span>
                                                    <select name="secondchangeby" class='form-control select2' style="width: 100%">
                                                        <option value="-">-</option>
                                                        <option value="turbin">Turbin</option>
                                                        <option value="impeller">Impeller</option>
                                                        <option value="scrapper">Scrapper</option>
                                                        <option value="pressure">Pressure</option>
                                                        <option value="temperature">Temperature</option>
                                                        <option value="weight">Weight</option>
                                                        <option value="introhopper">Intro Hopper</option>
                                                        <option value="intropowder">Intro Powder</option>
                                                        <option value="introliquid">Intro Liquid</option>
                                                        <option value="transferin">Transfer In</option>
                                                        <option value="transferout">Transfer out</option>
                                                        <option value="time">Time</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="col-lg-6" style="margin-bottom: 10px">
                                                <label class="control-label col-lg-3">Comparison</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                                                        <select name="logic_change" class='form-control' style="width: 100%">
                                                            <option value="greater">>=</option>
                                                            <option value="smaller"><=</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!-- /.form-group -->
                                    </div>
                                </div><!--END TAB 3-->                        
                                <div class="tab-pane" id="tab4">
                                    <div class="col-lg-8 pinggir">
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Quality Instruction</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <textarea rows="5" id="quality_instruction" name="quality_instruction" class="form-control" placeholder="Quality Instruction"></textarea>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Safety Instruction</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <textarea rows="5" id="safety_instruction" name="safety_instruction" class="form-control" placeholder="Safety Instruction"></textarea>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Second Checker</label>
                                            <div class="col-lg-8">
                                                <div class="input-group col-lg-2">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" name="need_secondchecker" id="need_secondchecker" class="icheckbox_minimal-grey checked"/>
                                                    </span>
                                                    <span class="form-control">Yes</span>
                                                </div>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div><!--END TAB 4-->                        
                            </div>
                        </div>
                    </div>                        
                    <!-- END VERTICAL TABS WITH HEADING -->
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Details of Recipe</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <button id="delmenu" class="btn btn-danger pull-right" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable" style="min-width: 2500px">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-gear fa-spin"></i> Turbin</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-gear"></i> Impeller</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-gear"></i> Scrapper</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-dashboard"></i> Pressure</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-thermometer"></i> Temperature</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-dashboard"></i> Weight</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-check-square-o"></i> Intro Hopper</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-inbox"></i> Intro Powder</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-flask"></i> Intro Liquid</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-exchange"></i> Transfer In</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-exchange"></i> Transfer Out</th>
                                <th colspan="3" style="text-align: center"><i class="fa fa-clock-o"></i> Time</th>
                                <th rowspan="2" style="text-align: center">Second Checker</th>
                                <th rowspan="2" style="text-align: center">Order</th>
                                <th rowspan="2" style="text-align: center">Action</th>
                            </tr>
                            <tr>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                                <th>Setpoint</th>
                                <th>Time</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-info btn-sm btn-line"><i class="fa fa-spin fa-refresh"></i> Clear</button></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>