<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-copy"></i>&nbsp;<strong id="ftitle">Clone</strong> Group Menu</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row pinggiran">
                                <label class="control-label col-lg-4" for="group_id"><span class="label label-warning blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;User Group</label>
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
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="group_id">User Group Target</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-users"></i></span>
                                        <select name="target_group_id"
                                                data-ajax="true" 
                                                data-placeholder="Select User Group..."
                                                data-url="user/getUsergroup/" 
                                                data-value="" 
                                                id="target_group_id" placeholder="User Group"  class='form-control select2'>
                                        </select>
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