<form id="mainForm" class="form-horizontal" action="<?php echo base_url(); ?>cip/pv2/store" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="recipe_name" class="control-label col-lg-2" style="text-align:left;">Recipe Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="recipe_name" id="recipe_name" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->recipe_name;?>">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="description" class="control-label col-lg-2" style="text-align:left;">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"><?php echo $pv2[0]->description;?></textarea>
                        </div>
                    </div><!-- /.form-group -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!--  Col Left Row 1 -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="prc_check" id="prc_check" <?php echo $pv2[0]->prc_check == TRUE ? 'checked':'';?> />&nbsp;&nbsp;&nbsp;
                        PRE RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="prc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_fp_set_level" id="prc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="prc_tp_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : AODP Line (04)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_aodp" id="prc_tp_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_50l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 2 : 50L Hooper Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_50l_hooper_line" id="prc_tp_50l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_50l_hooper_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_hooper_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 2 : Hooper Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_hooper_suction_line_delay" id="prc_tp_hooper_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_hooper_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_powder_suction_line" id="prc_tp_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_suction_line_delay" id="prc_tp_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_transfer_line_from_pv2_to_mv2" class="control-label col-lg-8" style="text-align:left;">
                            Loop 4 : Transfer Line From PV2 to Mv2
                            &nbsp;<input type="checkbox" name="prc_tp_transfer_line_from_pv2_to_mv2_check" id="prc_tp_transfer_line_from_pv2_to_mv2_check" <?php echo $pv2[0]->prc_tp_transfer_line_from_pv2_to_mv2_check==TRUE?'checked':'';?>>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_transfer_line_from_pv2_to_mv2" id="prc_tp_transfer_line_from_pv2_to_mv2" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_transfer_line_from_pv2_to_mv2;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Vessel Inlet Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_vessel_inlet_line" id="prc_tp_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_vessel_inlet_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_tp_top_spray_ball_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Top Spray Ball Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_top_spray_ball_line" id="prc_tp_top_spray_ball_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->prc_tp_top_spray_ball_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="rc_check" id="rc_check" <?php echo $pv2[0]->rc_check==TRUE?'checked':'';?>>&nbsp;&nbsp;&nbsp;
                        RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="rc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_fp_set_level" id="rc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="rc_tp_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : AODP Line (04)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_aodp" id="rc_tp_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_50l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 2 : 50L Hooper Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_50l_hooper_line" id="rc_tp_50l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_50l_hooper_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_hooper_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 2 : Hooper Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_hooper_suction_line_delay" id="rc_tp_hooper_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_hooper_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_powder_suction_line" id="rc_tp_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_suction_line_delay" id="rc_tp_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_transfer_line_from_pv2_to_mv2" class="control-label col-lg-8" style="text-align:left;">
                            Loop 4 : Transfer Line From PV2 to MV2
                            <input type="checkbox" name="rc_tp_transfer_line_from_pv2_mv2_check" id="rc_tp_transfer_line_from_pv2_mv2_check" <?php echo $pv2[0]->rc_tp_transfer_line_from_pv2_mv2_check==TRUE?'checked':'';?>>
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_transfer_line_from_pv2_to_mv2" id="rc_tp_transfer_line_from_pv2_to_mv2" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_transfer_line_from_pv2_to_mv2;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Vessel Inlet Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_vessel_inlet_line" id="rc_tp_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_vessel_inlet_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_tp_top_spray_ball_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Top Spray Ball Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_top_spray_ball_line" id="rc_tp_top_spray_ball_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_tp_top_spray_ball_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>DRAIN PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="rc_dp_ph_range" class="control-label col-lg-4" style="text-align:left;">
                            pH Range
                        </label>
                        <div class="col-sm-8">
                            <p>From:</p>
                            <p><input type="text" name="rc_dp_ph_range_from" id="rc_dp_ph_range_from" class="form-control" value="<?php echo $pv2[0]->rc_dp_ph_range_from;?>"></p>
                            <p>To:</p>
                            <p><input type="text" name="rc_dp_ph_range_to" id="rc_dp_ph_range_to" class="form-control" value="<?php echo $pv2[0]->rc_dp_ph_range_to;?>"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_dp_conductivity" class="control-label col-lg-8" style="text-align:left;">Conductivity</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_dp_conductivity" id="rc_dp_conductivity" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->rc_dp_conductivity;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- END Col Left Row 1 -->

        <!-- Col Middle Row 1 -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="sc_check" id="sc_check" <?php echo $pv2[0]->sc_check==TRUE?'checked':'';?>>&nbsp;&nbsp;&nbsp;
                        SANITIZATION CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_fp_set_level" id="sc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p><strong>HEATING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_hp_set_temperature" class="control-label col-lg-8" style="text-align:left;">Set Temperature</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_hp_set_temperature" id="sc_hp_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_hp_set_temperature;?>">
                              <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_hp_cip1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">CIP-1\PU01 Speed Ref</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_hp_cip1_pu01_speed_ref" id="sc_hp_cip1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_hp_cip1_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_tp_pef_8_prog_glycolaodp" class="control-label col-lg-8" style="text-align:left;">Loop 1 : PEF-8 &amp; PROG.GLYCOLAODP Line (04) </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_pef_8_prog_glycolaodp" id="sc_tp_pef_8_prog_glycolaodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_pef_8_prog_glycolaodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_50l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 2 : 50L Hooper Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_50l_hooper_line" id="sc_tp_50l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_50l_hooper_line;?>" />
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_hooper_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 2 : Hooper Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_hooper_suction_line_delay" id="sc_tp_hooper_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_hooper_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_powder_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Powder Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_powder_suction_line" id="sc_tp_powder_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_powder_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_suction_line_delay" class="control-label col-lg-8" style="text-align:left;">Loop 3 : Suction Line Delay</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_suction_line_delay" id="sc_tp_suction_line_delay" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_suction_line_delay;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_transfer_line_from_pv2_to_mv2" class="control-label col-lg-8" style="text-align:left;">
                            Loop 4 : Transfer Line From PV2 to MV2
                            &nbsp;<input type="checkbox" name="sc_tp_transfer_line_from_pv2_to_mv2_check" id="sc_tp_transfer_line_from_pv2_to_mv2_check" <?php echo $pv2[0]->sc_tp_transfer_line_from_pv2_to_mv2_check==TRUE?'checked':'';?> />
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_transfer_line_from_pv2_to_mv2" id="sc_tp_transfer_line_from_pv2_to_mv2" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_transfer_line_from_pv2_to_mv2;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">Loop 5 : Vessel Inlet Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_vessel_inlet_line" id="sc_tp_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_vessel_inlet_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_tp_top_spray_ball_line" class="control-label col-lg-8" style="text-align:left;">Loop 6 : Top Spray Ball Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_top_spray_ball_line" id="sc_tp_top_spray_ball_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_tp_top_spray_ball_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>PV2 HEATING PARAMETER</strong></p>
                    <div class="form-group">
                        <label for="sc_pv2_hp_set_temperature" class="control-label col-lg-8" style="text-align:left;">Set Temperature</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_pv2_hp_set_temperature" id="sc_pv2_hp_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_pv2_hp_set_temperature;?>">
                              <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <center><p style="color:brown;"><strong>COMMON PARAMETERS</strong></p></center>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_cp_tp_cip_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">CIP\PU01 Speed Ref</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_cp_tp_cip_pu01_speed_ref" id="sc_cp_tp_cip_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_cp_tp_cip_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_cp_tp_pv2_mm01_speed_ref" class="control-label col-lg-8" style="text-align:left;">PV-1\MM01 Speed Ref.</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_cp_tp_pv2_mm01_speed_ref" id="sc_cp_tp_pv2_mm01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_cp_tp_pv2_mm01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>DRAIN PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_cp_dp_pv2_mm01_speed_ref" class="control-label col-lg-8" style="text-align:left;">PV-1\MM01 Speed Ref.</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_cp_dp_pv2_mm01_speed_ref" id="sc_cp_dp_pv2_mm01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_cp_dp_pv2_mm01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <center><p><strong>MIXING PARAMETERS</strong></p></center>
                    <div class="form-group" style="">
                        <label for="sc_mp_selection" class="control-label col-lg-8" style="text-align:left;">
                            Selection
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="checkbox" name="sc_mp_selection" id="sc_mp_selection" <?php echo $pv2[0]->sc_mp_selection==TRUE?'checked':'';?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mp_pv2_mm01_speed_ref" class="control-label col-lg-8" style="text-align:left;">PV-1\MM01 Speed Ref.</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_mp_pv2_mm01_speed_ref" id="sc_mp_pv2_mm01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_mp_pv2_mm01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_mp_set_time" class="control-label col-lg-8" style="text-align:left;">Set Time</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_mp_set_time" id="sc_mp_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->sc_mp_set_time;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- ENDCol Middle Row 1 -->

        <!-- Col Right Row 1 -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        AIR PURGE PARAMETERS
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="app_vessel_inlet_line" class="control-label col-lg-8" style="text-align:left;">Loop 1 : Vessel Inlet Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_vessel_inlet_line" id="app_vessel_inlet_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_vessel_inlet_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_aodp" class="control-label col-lg-8" style="text-align:left;">Loop 2 : AODP Line (04)</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_aodp" id="app_aodp" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_aodp;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_50l_hooper_line" class="control-label col-lg-8" style="text-align:left;">Loop 3: 50L Hooper Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_50l_hooper_line" id="app_50l_hooper_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_50l_hooper_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_suction_line" class="control-label col-lg-8" style="text-align:left;">Loop 4: Suction Line</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_suction_line" id="app_suction_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_suction_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_top_spray_ball_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 5 : Top Spray Ball Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_top_spray_ball_line" id="app_top_spray_ball_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_top_spray_ball_line;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="app_transfer_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 6 : Transfer Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="app_transfer_line" id="app_transfer_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->app_transfer_line;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <input type="checkbox" name="vs_selection" id="vs_selection" <?php echo $pv2[0]->vs_selection==TRUE?'checked':'';?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_set_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_set_time" id="vs_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->vs_set_time;?>">
                                <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_set_temperature" class="control-label col-lg-8" style="text-align:left;">Set Temperature</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="vs_set_temperature" id="vs_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->vs_set_temperature;?>">
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
                                <input type="text" name="vs_vacuum_high_lim" id="vs_vacuum_high_lim" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->vs_vacuum_high_lim;?>">
                                <span class="input-group-addon" id="basic-addon2">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vs_vacuum_low_lim" class="control-label col-lg-8" style="text-align:left;">
                            Vacuum Low Lim.
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="vs_vacuum_low_lim" id="vs_vacuum_low_lim" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->vs_vacuum_low_lim;?>">
                                <span class="input-group-addon" id="basic-addon2">mmHg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <input type="checkbox" name="ster_c_selection" id="ster_c_selection" <?php echo $pv2[0]->ster_c_selection==TRUE?'checked':'';?> />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ster_c_set_time" class="control-label col-lg-8" style="text-align:left;">
                            Set Time
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="ster_c_set_time" id="ster_c_set_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->ster_c_set_time;?>">
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
                                <input type="text" name="ster_c_set_temperature" id="ster_c_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->ster_c_set_temperature;?>">
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
                                <input type="text" name="ster_c_hold_temperature" id="ster_c_hold_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->ster_c_hold_temperature;?>">
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
                                <input type="text" name="ster_c_reset_temperature" id="ster_c_reset_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->ster_c_reset_temperature;?>">
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
                                <input type="text" name="ster_c_set_air_purge_time" id="ster_c_set_air_purge_time" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->ster_c_set_air_purge_time;?>">
                                <span class="input-group-addon" id="basic-addon2">mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="wipe_test" id="wipe_test" <?php echo $pv2[0]->wipe_test==TRUE?'checked':'';?> />&nbsp; WIPE TEST
                        </center>
                    </h3>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="swab_test" id="swab_test" <?php echo $pv2[0]->wipe_test==TRUE?'checked':'';?>>&nbsp; SWAB TEST
                        </center>
                    </h3>
                    
                </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-body">
                <div class="form-group">
                        <label for="cip_rev_no" class="control-label col-lg-8" style="text-align:left;">
                            CIP Rev No
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" name="cip_rev_no" id="cip_rev_no" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $pv2[0]->cip_rev_no;?>">
                            </div>
                        </div>
                    </div>
               </div>
            </div>

        </div>
        <!-- ENDCol Right Row 1 -->
    </div>
</form>