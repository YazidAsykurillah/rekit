<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Recipe Tolerance</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row" style="border-bottom: 1px dotted #ccc">
                        <div class="col-lg-6">
                            <div class="" style="margin-bottom: 10px">
                                <div class="form-group row">
                                    <label class="control-label col-lg-4" for="recipe_id">Recipe Name</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-bookmark"></i></span>
                                            <select name="recipe_id"
                                                    data-ajax="true" 
                                                    data-placeholder="Select Recipe Name..."
                                                    data-url="recipe/recipe_ingredient/getRecipe/" 
                                                    data-value="" 
                                                    data-limit="100"
                                                    id="recipe_id" placeholder="Recipe Name"  class='form-control select2'>
                                            </select>
                                            <span class="input-group-addon"><a href="recipe/" target="_blank" title="Add Recipe" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus-circle"></i></a></span>
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                            </div>
                        </div> 
                        <div class="col-lg-6">
                            <span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;
                        </div>
                    </div>        
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="divt" style="display: none;margin-top: 10px">
                                
                                <div class="form-group row">
                                    <label for="turbin" class="control-label col-lg-4">Turbin</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-gear fa-spin"></i></span> 
                                            <input type="text" id="turbin" name="turbin" placeholder="Turbin" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="impeller" class="control-label col-lg-4">Impeller</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-gear"></i></span> 
                                            <input type="text" id="impeller" name="impeller" placeholder="Impeller" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="scrapper" class="control-label col-lg-4">Scrapper</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-gear"></i></span> 
                                            <input type="text" id="scrapper" name="scrapper" placeholder="Scrapper" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="pressure" class="control-label col-lg-4">Pressure</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-dashboard"></i></span> 
                                            <input type="text" id="pressure" name="pressure" placeholder="Pressure" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="temperature" class="control-label col-lg-4">Temperature</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-thermometer"></i></span> 
                                            <input type="text" id="temperature" name="temperature" placeholder="Temperature" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="weight" class="control-label col-lg-4">Weight</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-dashboard"></i></span> 
                                            <input type="text" id="weight" name="weight" placeholder="Weight" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="introhopper" class="control-label col-lg-4">Introhopper</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-database"></i></span> 
                                            <input type="text" id="introhopper" name="Introhopper" placeholder="Introhopper" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="intropowder" class="control-label col-lg-4">Intropowder</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-tint"></i></span> 
                                            <input type="text" id="intropowder" name="Intropowder" placeholder="Intropowder" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row divt" style="display:none;margin-top:10px;">
                                    <label for="introliquid" class="control-label col-lg-4">Introliquid</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-flask"></i></span> 
                                            <input type="text" id="introliquid" name="introliquid" placeholder="Introliquid" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row divt" style="display:none;margin-top:10px;">
                                    <label for="transferin" class="control-label col-lg-4">Transfer In</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-arrow-down"></i></span> 
                                            <input type="text" id="transferin" name="transferin" placeholder="Transfer in" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->

                                <div class="form-group row divt" style="display:none;margin-top:10px;">
                                    <label for="transferout" class="control-label col-lg-4">Transfer Out</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-arrow-up"></i></span> 
                                            <input type="text" id="transferout" name="transferout" placeholder="Transfer out" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row divt" style="display:none;margin-top:10px;">
                                    <label for="time" class="control-label col-lg-4">Time</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-clock-o"></i></span> 
                                            <input type="text" id="time" name="time" placeholder="Time" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                            <div class="form-group row divt" style="display: none;margin-top: 10px">
                                <label for="description" class="control-label col-lg-4">Description</label>
                                <div class="col-lg-8">
                                    <textarea id="description" name="description" class="form-control" placeholder="Description" style="height: 100px;"></textarea>
                                </div>
                            </div><!-- /.form-group -->

                            
                            
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button id="btnsubmit" type="submit" class="btn btn-primary" disabled=""><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                    
                    <div class="pull-right">
                        <button id="btnImportDefault" type="button" class="btn btn-default"><i class="fa fa-upload"></i> Import from default</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

