<div class="row">
    <div class="col-md-12">
        <form id="mainForm" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;<strong id="ftitle">Add</strong> User</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">                                                                        
                    <div class="row">
                        <div class="col-lg-6 pinggiran">
                            <div class="form-group row">
                                <label for="username" class="control-label col-lg-4">Username</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="glyphicon glyphicon-user"></i></span> 
                                        <input type="text" autofocus="" id="username" name="username" placeholder="Username..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="password" class="control-label col-lg-4">Password</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-lock"></i></span> 
                                        <input type="password" autofocus="" id="password" name="password" placeholder="Password..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label class="control-label col-lg-4" for="group_id">User Group</label>
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
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="namalengkap" class="control-label col-lg-4">Nama Lengkap</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon mandatory"><i class="fa fa-male"></i></span> 
                                        <input type="text" autofocus="" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap..." data-validation="required" class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="nik" class="control-label col-lg-4">NIK</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span> 
                                        <input type="text" autofocus="" id="nik" name="nik" placeholder="NIK..." class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group row">
                                <label for="email" class="control-label col-lg-4">Email</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 
                                        <input type="text" autofocus="" id="email" name="email" placeholder="Email..." class="form-control">
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
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
                <h3 class="panel-title"><i class="fa fa-table"></i> Table Users</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div id="mainTable" class="box-body">
                    <div style="padding: 0 20px 10px 20px" class="row">
                        <button class="btn btn-default toggle-selected" data-toggle="tooltip" data-placement="bottom" title="Toggle Selected"><i class="fa  fa-align-justify"></i></button> 
                        <div class="div-btn pull-right">
                            <button id="btnphoto" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Upload Photo"><i class="fa fa-upload"></i></button> 
                            <button class="btn btn-danger delete-selected" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa  fa-trash"></i></button> 
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>User Group</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Last Login</th>
                                <th>Photo</th>
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
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="mainModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mainModalLabel">Photo User</h4>
            </div>
            <form id="frmphotouser" enctype="multipart/form-data" method="post" action="user/upload" name="formUploadphoto" target="upload_target">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group col-sm-8">
                            <input type="file" name="" id="filephotouser">
                            <p class="help-block">Image size : 160px * 160px (File : JPG, Max.1Mb).</p>
                        </div>
                        <img id="elmphotouser" src="photo/user/" style="width: 80px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                    <button type="button" class="btn btn-danger" id="delphoto"><i class="fa fa-remove"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>