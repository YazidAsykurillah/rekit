<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Ingredient of Recipe</h3>
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
                                    <label class="control-label col-lg-4" for="raw_material_id">Raw Material</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-cubes"></i></span>
                                            <select name="raw_material_id"
                                                    data-ajax="true" 
                                                    data-placeholder="Select Raw Material..."
                                                    data-url="recipe/recipe_ingredient/getRawmaterial/" 
                                                    data-value="" 
                                                    data-limit="100"
                                                    id="raw_material_id" placeholder="Raw Material"  class='form-control select2'>
                                            </select>
                                            <span class="input-group-addon"><a href="master/raw_material" target="_blank" title="Add Raw Material" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus-circle"></i></a></span>
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="lotid" class="control-label col-lg-4">Lot ID</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-barcode"></i></span> 
                                            <input type="text" id="lotid" name="lotid" placeholder="Lot ID..." class="form-control" data-validation="required">
                                            <span class="input-group-addon" title="Must Unique" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-lock"></i></span>
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label for="qty" class="control-label col-lg-4">Qty</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-tag"></i></span> 
                                            <input type="text" id="qty" name="qty" placeholder="Qty..." class="form-control" data-validation="required">
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                                <div class="form-group row">
                                    <label class="control-label col-lg-4" for="unit_material_id">Unit</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-underline"></i></span>
                                            <select name="unit_material_id"
                                                    data-ajax="true" 
                                                    data-placeholder="Select Unit..."
                                                    data-url="recipe/recipe_ingredient/getUnitmaterial/" 
                                                    data-value="" 
                                                    data-limit="100"
                                                    id="unit_material_id" placeholder="Unit Material"  class='form-control select2'>
                                            </select>
                                            <span class="input-group-addon"><a href="master/unit_material" target="_blank" title="Add Unit Material" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus-circle"></i></a></span>
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Detail Ingredient</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <button class="btn btn-danger pull-right delete-selected" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Raw Material</th>
                                <th>Lot ID</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Description</th>
                                <th>In Use</th>
                                <th>Action</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>