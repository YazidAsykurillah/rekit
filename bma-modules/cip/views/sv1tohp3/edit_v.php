<form id="mainForm" class="form-horizontal" action="<?php echo base_url(); ?>cip/sv1tohp3/update" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="recipe_name" class="control-label col-lg-2" style="text-align:left;">Recipe Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="recipe_name" id="recipe_name" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->recipe_name;?>">
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="description" class="control-label col-lg-2" style="text-align:left;">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control"><?php echo $sv1tohp3[0]->description;?></textarea>
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
                        <input type="checkbox" name="prc_check" id="prc_check" <?php echo $sv1tohp3[0]->prc_check==TRUE ? 'checked' : '';?> />&nbsp;&nbsp;&nbsp;
                        PRE RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="prc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_fp_set_level" id="prc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->prc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="prc_tp_through_filling_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Through Filling Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_tp_through_filling_line" id="prc_tp_through_filling_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->prc_tp_through_filling_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
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
                        <label for="prc_cp_tp_cip_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">CIP\PU01 Speed Ref</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_cp_tp_cip_pu01_speed_ref" id="prc_cp_tp_cip_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->prc_cp_tp_cip_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prc_cp_tp_sv1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">SV1\PU01 Speed Ref.</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="prc_cp_tp_sv1_pu01_speed_ref" id="prc_cp_tp_sv1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->prc_cp_tp_sv1_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="wipe_test" id="wipe_test" <?php echo $sv1tohp3[0]->wipe_test==TRUE ? 'checked' : '';?> />&nbsp; WIPE TEST
                        </center>
                    </h3>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3>
                        <center>
                            <input type="checkbox" name="swab_test" id="swab_test" <?php echo $sv1tohp3[0]->swab_test==TRUE ? 'checked' : '';?> />&nbsp; SWAB TEST
                        </center>
                    </h3>
                    
                </div>
            </div>

            
            
        </div>
        <!-- END Col Left Row 1 -->

        <!-- Col Middle Row 1 -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        <input type="checkbox" name="rc_check" id="rc_check" <?php echo $sv1tohp3[0]->rc_check==TRUE ? 'checked' : '';?> />&nbsp;&nbsp;&nbsp;
                        RINSE CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="rc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_fp_set_level" id="rc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->rc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="rc_tp_through_filling_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Through Filling Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_tp_through_filling_line" id="rc_tp_through_filling_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->rc_tp_through_filling_line;?>">
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
                            <p><input type="text" name="rc_dp_ph_range_from" id="rc_dp_ph_range_from" class="form-control" value="<?php echo $sv1tohp3[0]->rc_dp_ph_range_from;?>" /></p>
                            <p>To:</p>
                            <p><input type="text" name="rc_dp_ph_range_to" id="rc_dp_ph_range_to" class="form-control" value="<?php echo $sv1tohp3[0]->rc_dp_ph_range_to;?>" /></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rc_dp_conductivity" class="control-label col-lg-8" style="text-align:left;">Conductivity</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="rc_dp_conductivity" id="rc_dp_conductivity" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->rc_dp_conductivity;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">
                        AIR PURGE PARAMETERS
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="app_through_filling_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Through Filling Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="app_through_filling_line" id="app_through_filling_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->app_through_filling_line;?>">
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
                        <input type="checkbox" name="sc_check" id="sc_check" <?php echo $sv1tohp3[0]->sc_check==TRUE?'checked' : '';?> />&nbsp;&nbsp;&nbsp;
                        SANITIZATION CYCLE
                    </h3>
                </div>
                <div class="panel-body">
                    <p><strong>FILLING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_fp_set_level" class="control-label col-lg-8" style="text-align:left;">Set Level</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_fp_set_level" id="sc_fp_set_level" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->sc_fp_set_level;?>">
                              <span class="input-group-addon" id="basic-addon2">Ltrs</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>HEATING PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_hp_set_temperature" class="control-label col-lg-8" style="text-align:left;">Set Temperature</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_hp_set_temperature" id="sc_hp_set_temperature" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->sc_hp_set_temperature;?>">
                              <span class="input-group-addon" id="basic-addon2">℃</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sc_hp_cip_1_pu01_speed_ref" class="control-label col-lg-8" style="text-align:left;">CIP-1\PU01 Speed Ref</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_hp_cip_1_pu01_speed_ref" id="sc_hp_cip_1_pu01_speed_ref" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->sc_hp_cip_1_pu01_speed_ref;?>">
                              <span class="input-group-addon" id="basic-addon2">RPM</span>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <p><strong>TRANSFER PARAMETERS</strong></p>
                    <div class="form-group">
                        <label for="sc_tp_through_filling_line" class="control-label col-lg-8" style="text-align:left;">
                            Loop 1 : Through Filling Line
                        </label>
                        <div class="col-sm-4">
                            <div class="input-group">
                              <input type="text" name="sc_tp_through_filling_line" id="sc_tp_through_filling_line" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->sc_tp_through_filling_line;?>">
                              <span class="input-group-addon" id="basic-addon2">secs</span>
                            </div>
                        </div>
                    </div>
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
                                <input type="text" name="cip_rev_no" id="cip_rev_no" class="form-control" placeholder="" aria-describedby="basic-addon2" value="<?php echo $sv1tohp3[0]->cip_rev_no;?>">
                            </div>
                        </div>
                    </div>
               </div>
            </div>

        </div>
        <!-- ENDCol Right Row 1 -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="control-label col-lg-2"></label>
                        <div class="col-lg-8">
                            <input type="hidden" name="id" id="id" value="<?php echo $sv1tohp3[0]->id;?>">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </div><!-- /.form-group -->
                </div>
            </div>
        </div>

    </div>
</form>