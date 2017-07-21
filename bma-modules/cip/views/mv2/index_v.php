<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><i class="fa fa-table"></i> MV 2 Recipes</h3>
                <ul class="panel-controls">
                    <li><a href="<?php echo base_url('cip/mv2/create');?>"><span class="fa fa-plus"></span></a></li>
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
                        <?php if(count($mv2s)) : ?>
                            <?php foreach($mv2s as $mv2) : ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="<?php echo base_url('cip/mv2/show/'.$mv2->id.'');?>">
                                        <?php echo $mv2->recipe_name; ?>
                                    </a>
                                </td>
                                <td><?php echo $mv2->description; ?></td>
                                <td><?php echo $mv2->status; ?></td>
                                <td><?php echo $mv2->created_by; ?></td>
                                <td><?php echo $mv2->created_at; ?></td>
                                <td><?php echo $mv2->updated_at; ?></td>
                                <td>
                                    <a href="<?php echo base_url('cip/mv2/edit/'.$mv2->id.'');?>" class="btn btn-xs btn-primary">
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