<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> Menu</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-6 pinggir-kanan">
                            <div class="form-group row">
                                <label for="menu" class="control-label col-lg-4">Menu</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-navicon"></i></span> 
                                        <input type="text" id="menu" name="menu" placeholder="Menu..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="icon" class="control-label col-lg-4">Icon</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-fire"></i></span> 
                                        <input type="text" id="icon" name="icon" placeholder="Icon..." class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="link" class="control-label col-lg-4">Link</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-code"></i></span> 
                                        <input type="text" id="link" name="link" placeholder="Link..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="control-label col-lg-2">Status</label>
                                <div>
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
                <h3 class="panel-title"><i class="fa fa-table"></i> Table List Menu</h3>
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
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th>Icon</th>
                                <th>Icon Preview</th>
                                <th>Link</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>