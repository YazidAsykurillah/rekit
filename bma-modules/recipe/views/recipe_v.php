<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Recipe</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-6 pinggir-kanan">
                            <div class="form-group row">
                                <label for="recipename" class="control-label col-lg-4">Recipe Name</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-file-text-o"></i></span> 
                                        <input type="text" autofocus="" id="recipename" name="recipename" placeholder="Recipe Name..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="producttype_id">Product Type</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-cube"></i></span>
                                        <select name="producttype_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Product Type..."
                                                data-url="recipe/getProducttype/" 
                                                data-value="" 
                                                id="producttype_id" placeholder="Product Type"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="master/product-type" target="_blank" title="Add Product Type" data-toggle="tooltip"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="groupvalidator_id">Group Validator</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-users"></i></span>
                                        <select name="groupvalidator_id"
                                                data-ajax="true" 
                                                data-placeholder="Select User Group..."
                                                data-url="recipe/getGroupvalidator/" 
                                                data-value="" 
                                                id="groupvalidator_id" placeholder="Group Validator"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="user/group-validator" target="_blank" title="Add Group Validator" data-toggle="tooltip"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="description" class="control-label col-lg-4">Description</label>
                                <div class="col-lg-8">
                                    <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4">Status</label>
                                <div class="col-lg-8">
                                    <div class="input-group col-lg-2">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="status" id="status" class="icheckbox_minimal-grey checked" checked/>
                                        </span>
                                        <span class="form-control">Active</span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
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
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Recipe</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <button class="btn btn-danger delete-selected pull-right" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Recipe Name</th>
                                <th>Product Type</th>
                                <th>Group Validator</th>
                                <th>Description</th>
                                <th>Validation</th>
                                <th>Created By</th>
                                <th>Created</th>
                                <th>Version</th>
                                <th>Flag Ingredient Editor</th>
                                <th>Flag Recipe Editor</th>
                                <th>Flag Tolerance Editor</th>
                                <th>Status</th>
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
