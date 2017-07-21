<form id="mainForm" class="form-horizontal" action="<?php echo base_url(); ?>cip/mv1/store" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="recipe_name" class="control-label col-lg-2" style="text-align:left;">Recipe Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="recipe_name" id="recipe_name" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->recipe_name;?>">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="description" class="control-label col-lg-2" style="text-align:left;">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"><?php echo nl2br($mv1[0]->description);?></textarea>
                        </div>
                    </div><!-- /.form-group -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Col Pre Rinse Cycle -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="prc_check" id="prc_check" <?php echo ($mv1[0]->prc_check == TRUE ? 'checked' : '') ;?>>&nbsp;&nbsp;&nbsp;
                        PRE RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">  
                    <p><strong><h5>FILLING PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="prc_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_set_level" id="prc_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <p>&nbsp;</p>
                    <p><strong><h5>TRANSFER PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="prc_empipeal_xa_400_x_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : EMPIPEAL XA 400/X AODP Line (03)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_empipeal_xa_400_x_aodp" id="prc_empipeal_xa_400_x_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_empipeal_xa_400_x_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_sodium_lactate_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 2 : SODIUM LACTATE AODP Line (02)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_sodium_lactate_aodp" id="prc_sodium_lactate_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_sodium_lactate_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_polyquaternium_7_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 3 : POLYQUATERNIUM-7 AODP Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_polyquaternium_7_aodp" id="prc_polyquaternium_7_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_polyquaternium_7_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_sampling_point_50_l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 4 : Sampling Point &amp; 50L Hooper Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_sampling_point_50_l_hooper_line" id="prc_sampling_point_50_l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_sampling_point_50_l_hooper_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_hooper_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 4 : Hooper Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_hooper_suction_line_delay" id="prc_hooper_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_hooper_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_powder_suction_line" id="prc_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_suction_line_delay" id="prc_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_liquid_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Liquid Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_liquid_suction_line" id="prc_liquid_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_liquid_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_recirculation_line" class="control-label col-lg-8" style="text-align:left;">Loop 7 : Recirculation Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_recirculation_line" id="prc_recirculation_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_recirculation_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_inline_homogenizer_delay" class="control-label col-lg-8" style="text-align:left;">Loop 7 : Inline Homogenizer Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_inline_homogenizer_delay" id="prc_inline_homogenizer_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_inline_homogenizer_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_through_fp_1" class="control-label col-lg-8" style="text-align:left;">
                            Loop 8 : Through FP 1
                            <input type="checkbox" name="prc_through_fp_1_check" id="prc_through_fp_1_check" <?php echo $mv1[0]->prc_through_fp_1_check == TRUE ?'checked' : '' ;?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_through_fp_1" id="prc_through_fp_1" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_through_fp_1;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_through_fp_2" class="control-label col-lg-8" style="text-align:left;">
                            Loop 9 : Through FP 2
                            <input type="checkbox" name="prc_through_fp_2_check" id="prc_through_fp_2_check" <?php echo $mv1[0]->prc_through_fp_2_check == TRUE ?'checked' : '' ;?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_through_fp_2" id="prc_through_fp_2" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_through_fp_2; ?>" />
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_through_fp_3" class="control-label col-lg-8" style="text-align:left;">
                            Loop 10 : Through FP 3
                            <input type="checkbox" name="prc_through_fp_3_check" id="prc_through_fp_3_check" <?php echo $mv1[0]->prc_through_fp_3_check == TRUE ?'checked' : '' ;?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_through_fp_3" id="prc_through_fp_3" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_through_fp_3; ?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_through_fp_4" class="control-label col-lg-8" style="text-align:left;">
                            Loop 11 : Through FP 4
                            <input type="checkbox" name="prc_through_fp_4_check" id="prc_through_fp_4_check" <?php echo $mv1[0]->prc_through_fp_4_check == TRUE ?'checked' : '' ;?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_through_fp_4" id="prc_through_fp_4" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_through_fp_4;?>" />
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    
                    <div class="form-group">
                        <label for="prc_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 12 : Vessel Inlet Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_vessel_inlet_line" id="prc_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_vessel_inlet_line;?>" />
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_top_spray_ball_line_and_side_spray" class="control-label col-lg-8" style="text-align:left;">
                            Loop 13 : Top Spray Ball Line & Side Spray Balls
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_top_spray_ball_line_and_side_spray" id="prc_top_spray_ball_line_and_side_spray" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_top_spray_ball_line_and_side_spray;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="prc_side_spray_balls_delay" class="control-label col-lg-8" style="text-align:left;">
                            Loop 13 : Side Spray Balls Delay
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="prc_side_spray_balls_delay" id="prc_side_spray_balls_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->prc_side_spray_balls_delay;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="wipe_test" id="wipe_test" <?php echo $mv1[0]->wipe_test == TRUE ? 'checked':''; ?> />&nbsp; WIPE TEST
                        </center>
                    </h3>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="swab_test" id="swab_test" <?php echo $mv1[0]->swab_test == TRUE ? 'checked' : ''; ?>/>&nbsp; SWAB TEST
                        </center>
                    </h3>
                    
                </div>
            </div>
        </div>
        <!-- ENDCol Pre Rinse Cycle -->

        <!-- Col Rinse Cycle -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="rc_check" id="rc_check" <?php echo $mv1[0]->rc_check == TRUE ? 'checked' : ''; ?> />&nbsp;&nbsp;&nbsp;
                        RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong><h5>FILLING PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="rc_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_set_level" id="rc_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_set_level;?>" />
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <p>&nbsp;</p>
                    <p><strong><h5>TRANSFER PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="rc_empipeal_xa_400_x_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : EMPIPEAL XA 400/X AODP Line (03)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_empipeal_xa_400_x_aodp" id="rc_empipeal_xa_400_x_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_empipeal_xa_400_x_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_sodium_lactate_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 2 : SODIUM LACTATE AODP Line (02)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_sodium_lactate_aodp" id="rc_sodium_lactate_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_sodium_lactate_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_polyquaternium_7_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 3 : POLYQUATERNIUM-7 AODP Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_polyquaternium_7_aodp" id="rc_polyquaternium_7_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_polyquaternium_7_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_sampling_point_50_l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 4 : Sampling Point & 50L Hooper Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_sampling_point_50_l_hooper_line" id="rc_sampling_point_50_l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_sampling_point_50_l_hooper_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_hooper_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 4 : Hooper Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_hooper_suction_line_delay" id="rc_hooper_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_hooper_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_powder_suction_line" id="rc_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_suction_line_delay" id="rc_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_liquid_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Liquid Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_liquid_suction_line" id="rc_liquid_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_liquid_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_recirculation_line" class="control-label col-lg-8" style="text-align:left;">Loop 7 : Recirculation Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_recirculation_line" id="rc_recirculation_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_recirculation_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_inline_homogenizer_delay" class="control-label col-lg-8" style="text-align:left;">Loop 7 : Inline Homogenizer Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_inline_homogenizer_delay" id="rc_inline_homogenizer_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_inline_homogenizer_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_through_fp_1" class="control-label col-lg-8" style="text-align:left;">
                            Loop 8 : Through FP 1
                            <input type="checkbox" name="rc_through_fp_1_check" id="rc_through_fp_1_check" <?php echo $mv1[0]->rc_through_fp_1_check == TRUE ? 'checked' : '';?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_through_fp_1" id="rc_through_fp_1" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_through_fp_1;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_through_fp_2" class="control-label col-lg-8" style="text-align:left;">
                            Loop 9 : Through FP 2
                            <input type="checkbox" name="rc_through_fp_2_check" id="rc_through_fp_2_check" <?php echo $mv1[0]->rc_through_fp_2_check == TRUE ? 'checked' : '' ;?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_through_fp_2" id="rc_through_fp_2" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_through_fp_2;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_through_fp_3" class="control-label col-lg-8" style="text-align:left;">
                            Loop 10 : Through FP 3
                            <input type="checkbox" name="rc_through_fp_3_check" id="rc_through_fp_3_check" <?php echo $mv1[0]->rc_through_fp_3_check == TRUE ? 'checked' : '';?>/>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_through_fp_3" id="rc_through_fp_3" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_through_fp_3;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_through_fp_4" class="control-label col-lg-8" style="text-align:left;">
                            Loop 11 : Through FP 4
                            <input type="checkbox" name="rc_through_fp_4_check" id="rc_through_fp_4_check" <?php echo $mv1[0]->rc_through_fp_4_check == TRUE ? 'checked' : '' ;?>/>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_through_fp_4" id="rc_through_fp_4" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_through_fp_4;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="rc_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 12 : Vessel Inlet Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_vessel_inlet_line" id="rc_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_vessel_inlet_line;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_top_spray_ball_line_and_side_spray" class="control-label col-lg-8" style="text-align:left;">
                            Loop 13 : Top Spray Ball Line & Side Spray Balls
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_top_spray_ball_line_and_side_spray" id="rc_top_spray_ball_line_and_side_spray" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_top_spray_ball_line_and_side_spray;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_side_spray_balls_delay" class="control-label col-lg-8" style="text-align:left;">
                            Loop 13 : Side Spray Balls Delay
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_side_spray_balls_delay" id="rc_side_spray_balls_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_side_spray_balls_delay;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <p><strong><h5>DRAIN PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="rc_ph_range" class="control-label col-lg-4" style="text-align:left;">
                            pH Range
                        </label>
                        <div class="col-sm-8">
                            <p>From:</p>
                            <p><input type="text" name="rc_ph_range_from" id="rc_ph_range_from" class="form-control" value="<?php echo $mv1[0]->rc_ph_range_from;?>" /></p>
                            <p>To:</p>
                            <p><input type="text" name="rc_ph_range_to" id="rc_ph_range_to" class="form-control" value="<?php echo $mv1[0]->rc_ph_range_to;?>" /></p>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="rc_conductivity" class="control-label col-lg-4" style="text-align:left;">
                            Conductivity
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="rc_conductivity" id="rc_conductivity" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->rc_conductivity;?>">
                                <span class="input-group-addon" id="basic-addon2">us/cm</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                </div>
            </div>
        </div>
        <!-- ENDCol Rinse Cycle -->

        <!-- Col Sanitization Cycle -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="sc_check" id="sc_check" <?php echo $mv1[0]->sc_check == TRUE ? 'checked' : '';?> />&nbsp;&nbsp;&nbsp;
                        SANITIZATION CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong><h5>FILLING PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="sc_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_set_level" id="sc_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_set_level;?>" />
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <p>&nbsp;</p>
                    <p><strong><h5>HEATING PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="sc_set_temperature" class="control-label col-lg-8" style="text-align:left;">Set Temperature</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_set_temperature" id="sc_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_set_temperature;?>">
                              <span class="input-group-addon" id="basic-addon2">&#8451;</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="sc_cip_1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">CIP-1\PU01 Speed Ref</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_cip_1_pu01_speed_ref" id="sc_cip_1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_cip_1_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <p>&nbsp;</p>
                    <p><strong><h5>TRANSFER PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="sc_empipeal_xa_400_x_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : EMPIPEAL XA 400/X AODP Line (03)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_empipeal_xa_400_x_aodp" id="sc_empipeal_xa_400_x_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_empipeal_xa_400_x_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="sc_sodium_lactate_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 2 : SODIUM LACTATE AODP Line (02)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_sodium_lactate_aodp" id="sc_sodium_lactate_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_sodium_lactate_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="sc_polyquaternium_7_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 3 : POLYQUATERNIUM-7 AODP Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_polyquaternium_7_aodp" id="sc_polyquaternium_7_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_polyquaternium_7_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="sc_top_spray_ball_line_and_side_spray" class="control-label col-lg-8" style="text-align:left;">
                            Loop 4 : Top Spray Ball Line &amp; Side Spray Balls
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_top_spray_ball_line_and_side_spray" id="sc_top_spray_ball_line_and_side_spray" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_top_spray_ball_line_and_side_spray;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_side_spray_balls_delay" class="control-label col-lg-8" style="text-align:left;">
                            Loop 4 : Side Spray Balls Delay
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_side_spray_balls_delay" id="sc_side_spray_balls_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_side_spray_balls_delay;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong><h5>RECIRCULATION PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="sc_through_sb_suction_lines" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Through SB &amp; Suction Lines
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_through_sb_suction_lines" id="sc_through_sb_suction_lines" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_through_sb_suction_lines;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_recirculation_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 2 : Recirculation Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_recirculation_line" id="sc_recirculation_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_recirculation_line;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mv_1_ag01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1AG01 Speed Ref
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mv_1_ag01_speed_ref" id="sc_mv_1_ag01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mv_1_ag01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mv_1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1PU01 Speed Ref
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mv_1_pu01_speed_ref" id="sc_mv_1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mv_1_pu01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mv_1_pu02_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1PU02 Speed Ref
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mv_1_pu02_speed_ref" id="sc_mv_1_pu02_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mv_1_pu02_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_rp_set_temperature" class="control-label col-lg-8" style="text-align:left;">
                            Set Temperature
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_rp_set_temperature" id="sc_rp_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_rp_set_temperature;?>">
                                <span class="input-group-addon" id="basic-addon2">&#8451;</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong><h5>DRAIN PARAMETERS</h5></strong></p>
                    <div class="form-group">
                        <label for="sc_mv_1_weight_to_start_direct_drain" class="control-label col-lg-8" style="text-align:left;">
                            MV1 Weight to start Direct Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mv_1_weight_to_start_direct_drain" id="sc_mv_1_weight_to_start_direct_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mv_1_weight_to_start_direct_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">&#8451;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <center><p><strong><h5>MIXING PARAMETERS</h5></strong></p></center>
                </div>
                <div class="panel-body">
                   <div class="form-group">
                        <label for="sc_mp_selection" class="control-label col-lg-8" style="text-align:left;">
                            Selection
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="checkbox" name="sc_mp_selection" id="sc_mp_selection" <?php echo $mv1[0]->sc_mp_selection == TRUE ? 'checked' : '';?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mp_mv_1_ag01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1AG01 Speed Ref
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mp_mv_1_ag01_speed_ref" id="sc_mp_mv_1_ag01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mp_mv_1_ag01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mp_set_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="sc_mp_set_time" id="sc_mp_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->sc_mp_set_time;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- ENDCol Sanitization Cycle -->
    </div>
    <div class="row">
        <!-- Col Air Purge Parameters -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        AIR PURGE PARAMETERS
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="app_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Vessel Inlet Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_vessel_inlet_line" id="app_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_vessel_inlet_line;?>" />
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="app_empipeal_xa_400_x_aodp" class="control-label col-lg-8" style="text-align:left;">
                            Loop 2 : EMPIPEAL XA 400/X AODP Line (03)
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_empipeal_xa_400_x_aodp" id="app_empipeal_xa_400_x_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_empipeal_xa_400_x_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="app_sodium_lactate_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 3 : SODIUM LACTATE AODP Line (02)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_sodium_lactate_aodp" id="app_sodium_lactate_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_sodium_lactate_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="app_polyquaternium_7_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 4 : POLYQUATERNIUM-7 AODP Line (01)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_polyquaternium_7_aodp" id="app_polyquaternium_7_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_polyquaternium_7_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="app_sampling_point_50_l" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Sampling Point &amp; 50L</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_sampling_point_50_l" id="app_sampling_point_50_l" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_sampling_point_50_l;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_powder_suction_line" id="app_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_suction_line_delay" id="app_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_liquid_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 7 : Liquid Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_liquid_suction_line" id="app_liquid_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_liquid_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_recirculation_line" class="control-label col-lg-8" style="text-align:left;">Loop 8 : Recirculation Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_recirculation_line" id="app_recirculation_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_recirculation_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_inline_homogenizer" class="control-label col-lg-8" style="text-align:left;">Loop 8 : Inline Homogenizer</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_inline_homogenizer" id="app_inline_homogenizer" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_inline_homogenizer;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_bypass_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 8 : Bypass Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_bypass_line_delay" id="app_bypass_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_bypass_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_top_spray_ball_line_and_side_spray_balls" class="control-label col-lg-8" style="text-align:left;">
                            Loop 9 : Top Spray Ball Line &amp; Side Spray Balls
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_top_spray_ball_line_and_side_spray_balls" id="app_top_spray_ball_line_and_side_spray_balls" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_top_spray_ball_line_and_side_spray_balls;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_side_spray_balls_delay" class="control-label col-lg-8" style="text-align:left;">
                            Loop 9 : Side Spray Balls Delay
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_side_spray_balls_delay" id="app_side_spray_balls_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_side_spray_balls_delay;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_direct_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 10 : Direct Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_direct_drain" id="app_direct_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_direct_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_line_through_pump_casing_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 11 : Line Through Pump Casing Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_line_through_pump_casing_drain" id="app_line_through_pump_casing_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_line_through_pump_casing_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_line_through_fp1_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 12 : Line Through FP1 Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_line_through_fp1_drain" id="app_line_through_fp1_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_line_through_fp1_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_line_through_fp2_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 13 : Line Through FP2 Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_line_through_fp2_drain" id="app_line_through_fp2_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_line_through_fp2_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_line_through_fp3_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 14 : Line Through FP3 Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_line_through_fp3_drain" id="app_line_through_fp3_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_line_through_fp3_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_line_through_fp4_drain" class="control-label col-lg-8" style="text-align:left;">
                            Loop 15 : Line Through FP4 Drain
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_line_through_fp4_drain" id="app_line_through_fp4_drain" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->app_line_through_fp4_drain;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDCol Air Purge Parameters -->

        <!-- Col Vacuum Sanitization -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        VACUUM SANITIZATION
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="vs_selection" class="control-label col-lg-8" style="text-align:left;">
                            Selection
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="checkbox" name="vs_selection" id="vs_selection" <?php echo $mv1[0]->vs_selection == TRUE ? 'checked' : '';?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_set_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_set_time" id="vs_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_set_time;?>" />
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_set_temperature" class="control-label col-lg-8" style="text-align:left;">
                            Set Temperature
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_set_temperature" id="vs_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_set_temperature;?>">
                                <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_vacuum_high_lim" class="control-label col-lg-8" style="text-align:left;">
                            Vacuum High Lim
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_vacuum_high_lim" id="vs_vacuum_high_lim" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_vacuum_high_lim;?>">
                                <span class="input-group-addon" id="basic-addon2">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_vacuum_low_lim" class="control-label col-lg-8" style="text-align:left;">
                            Vacuum Low Lim
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_vacuum_low_lim" id="vs_vacuum_low_lim" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_vacuum_low_lim;?>">
                                <span class="input-group-addon" id="basic-addon2">mmHg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>
                        <h4><strong>COMMON PARAMETERS</strong></h4>
                    </center>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="vs_cp_tp_cip_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            CIP\PU01 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_cp_tp_cip_pu01_speed_ref" id="vs_cp_tp_cip_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_cp_tp_cip_pu01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_cp_tp_mv1_ag01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1\AG01 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_cp_tp_mv1_ag01_speed_ref" id="vs_cp_tp_mv1_ag01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_cp_tp_mv1_ag01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_cp_tp_mv1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1\PU01 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_cp_tp_mv1_pu01_speed_ref" id="vs_cp_tp_mv1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_cp_tp_mv1_pu01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_cp_tp_mv1_pu02_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1\PU02 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_cp_tp_mv1_pu02_speed_ref" id="vs_cp_tp_mv1_pu02_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_cp_tp_mv1_pu02_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>DRAIN PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="vs_dp_mv1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1\PU01 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_dp_mv1_pu01_speed_ref" id="vs_dp_mv1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_dp_mv1_pu01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_cp_dp_mv1_ag01_speed_ref" class="control-label col-lg-8" style="text-align:left;">
                            MV-1\AG01 Speed Ref.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_cp_dp_mv1_ag01_speed_ref" id="vs_cp_dp_mv1_ag01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->vs_cp_dp_mv1_ag01_speed_ref;?>">
                                <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ENDCol Vacuum Sanitization -->

        <!-- Col Sterlization Cycle -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        STERLIZATION CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="ster_c_selection" class="control-label col-lg-8" style="text-align:left;">
                            Selection
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="checkbox" name="ster_c_selection" id="ster_c_selection" <?php echo $mv1[0]->ster_c_selection == TRUE ? 'checked':'';?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_set_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_set_time" id="ster_c_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->ster_c_set_time;?>">
                                <span class="input-group-addon" id="basic-addon2">mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_set_temperature" class="control-label col-lg-8" style="text-align:left;">
                            Set Temperature
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_set_temperature" id="ster_c_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->ster_c_set_temperature;?>">
                                <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_hold_temperature" class="control-label col-lg-8" style="text-align:left;">
                            Hold Temperature
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_hold_temperature" id="ster_c_hold_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->ster_c_hold_temperature;?>">
                                <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_reset_temperature" class="control-label col-lg-8" style="text-align:left;">
                            Reset Temperature
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_reset_temperature" id="ster_c_reset_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->ster_c_reset_temperature;?>">
                                <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_set_air_purge_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Air Purge Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_set_air_purge_time" id="ster_c_set_air_purge_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->ster_c_set_air_purge_time;?>">
                                <span class="input-group-addon" id="basic-addon2">mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Col sterlization Cycle -->
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="cip_rev_no" class="control-label col-lg-8" style="text-align:left;">
                            CIP Rev No
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="cip_rev_no" id="cip_rev_no" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $mv1[0]->cip_rev_no;?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>