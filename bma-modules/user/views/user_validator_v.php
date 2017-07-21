<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> User Validator</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="groupvalidator_id"><span class="label label-danger blink-me"><i class="fa fa-warning"></i>Select first</span> &nbsp;Group Validator</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-users"></i></span>
                                        <select name="groupvalidator_id"
                                                data-ajax="true" 
                                                data-placeholder="Select Validator Group..."
                                                data-url="user/user_validator/getGroupvalidator/" 
                                                data-value="" 
                                                id="groupvalidator_id" placeholder="Group Validator"  class='form-control select2'>
                                        </select>
                                        <span class="input-group-addon"><a href="user/group-validator" target="_blank" title="Add Group Validator"><i class="fa fa-plus-circle"></i></a></span>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-4">
                             <a id="btnAddUser" title="Add User" href="#" class="btn btn-primary btn-line btn-block"><i class="fa fa-plus"></i>&nbsp;Add User to Validate</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><i class="fa fa-table"></i> Table User Validator</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <div class="div-btn pull-right">
                            <button id="deluser" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Photo</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <thead id="searchid">
                            <tr>
                                <td><button class="clrs btn btn-info btn-sm btn-line">Clear</button></td>
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

<div class="modal fade" id="vpModal" tabindex="-1" role="dialog" aria-labelledby="vpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="vpModalLabel"><i class="fa  fa-list"></i>&nbsp;List Users</h4>
            </div>
            <div class="modal-body">
                <div id="listuserTable" class="panel-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <div class="div-btn pull-right">
                            <a id="btnInsertUser" title="Add Users" href="#" class="btn btn-success btn-line"><i class="fa fa-plus"></i>&nbsp;Insert Users</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>NIK</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <thead id="searchid2">
                            <tr>
                                <td><button class="clrs2 btn btn-info btn-sm btn-line">Clear</button></td>
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
