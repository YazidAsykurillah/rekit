<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Group Menu</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row" style="border-bottom: 1px dotted #ccc">
                        <div class="col-lg-6">
                            <div class="" style="margin-bottom: 10px">
                                <div class="form-group row">
                                    <label class="control-label col-lg-4" for="group_id"><span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;User Group</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <span class="input-group-addon mandatory"><i class="fa fa-users"></i></span>
                                            <select name="group_id"
                                                    data-ajax="true" 
                                                    data-placeholder="Select User Group..."
                                                    data-url="user/getUsergroup/" 
                                                    data-value="" 
                                                    id="group_id" placeholder="User Group"  class='form-control select2'>
                                            </select>
                                            <span class="input-group-addon"><a href="user/group" target="_blank" title="Add User Group"><i class="fa fa-plus-circle"></i></a></span>
                                        </div>
                                    </div>
                                </div><!-- /.form-group -->
                            </div>
                        </div>        
                    </div>  
                    <div class="row">
                        <div class="col-lg-6 divt" style="display: none;margin-top: 10px">
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="group_id">Menu</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-navicon"></i></span>
                                        <select name="menu_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Menu..."
                                                data-url="menu/group-menu/getMenu/" 
                                                data-value="" 
                                                id="menu_id" placeholder="Menu"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="menu" target="_blank" title="Add Menu"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="group_id">Parent</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-navicon"></i></span>
                                        <select name="parent_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Menu..."
                                                data-url="menu/group-menu/getMenu/" 
                                                data-value="" 
                                                id="parent_id" placeholder="Parent"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="menu" target="_blank" title="Add Menu"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6 divt" style="display: none;margin-top: 10px">
                            <div class="form-group row">
                                <label for="order" class="control-label col-lg-4">Order</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-sort"></i></span> 
                                        <input type="number" id="order" name="order" placeholder="Order..." data-validation="required" class="form-control">
                                    </div>
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
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Group Menu</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <button id="delmenu" class="btn btn-danger pull-right" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Menu</th>
                                <th>Link</th>
                                <th>Parent</th>
                                <th>Order</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>