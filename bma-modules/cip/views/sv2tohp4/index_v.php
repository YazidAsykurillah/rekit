<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><i class="fa fa-table"></i> SV2 to HP4 Recipes</h3>
                <ul class="panel-controls">
                    <li><a href="<?php echo base_url('cip/sv2tohp4/create');?>"><span class="fa fa-plus"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Recipe Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($sv2tohp4s)) : ?>
                            <?php foreach($sv2tohp4s as $sv2tohp4) : ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="<?php echo base_url('cip/sv2tohp4/show/'.$sv2tohp4->id.'');?>">
                                        <?php echo $sv2tohp4->recipe_name; ?>
                                    </a>
                                </td>
                                <td><?php echo $sv2tohp4->description; ?></td>
                                <td><?php echo $sv2tohp4->status; ?></td>
                                <td><?php echo $sv2tohp4->created_by; ?></td>
                                <td><?php echo $sv2tohp4->created_at; ?></td>
                                <td><?php echo $sv2tohp4->updated_at; ?></td>
                                <td>
                                    <a href="<?php echo base_url('cip/sv2tohp4/edit/'.$sv2tohp4->id.'');?>" class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>