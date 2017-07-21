<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Recipe Validation</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">

                <div id="mainTable" class="box-body">
                    <div class="row" style="margin-bottom: 5px;padding: 5px;border-bottom: 1px dotted #ccc">
                        <div class="col-lg-6 form-group row">
                            <label class="control-label col-lg-4" for="recipe_id"><span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;Recipe Name</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <span class="input-group-addon mandatory"><i class="fa fa-bookmark"></i></span>
                                    <select name="recipe_id"
                                            data-ajax="true" 
                                            data-placeholder="Select Recipe Name..."
                                            data-url="recipe/recipe_validation/getRecipe/" 
                                            data-value="" 
                                            data-limit="100"
                                            id="recipe_id" placeholder="Recipe Name"  class='form-control select2'>
                                    </select>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Validator</th>
                                <th>Order</th>
                                <th>Flag</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
