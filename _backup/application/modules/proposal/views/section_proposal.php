<?php //show($this->session->userdata());
//show($StfData); ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/modernizr.js"></script> <!-- Modernizr -->
    <div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header register-header">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Proposal For Sanction Of Class/Section
        </div>
    
        <div class="card-body shape-shadow"> 

        <?php if (isset($error_msg) && !empty($error_msg)) { ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $error_msg; ?>.
            </div>
        <?php } if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <!-- ===================================== MAIN FORM START ====================================== -->    
        <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
        <input type="hidden" name="id" value="<?php echo isset($school->id) ? $school->id : ''; ?>">
        <!--================================ KVS DETAILS START =================================-->
        <h6><strong>KVS Approval Details - </strong></h6>
        <hr>
        <div class=" background_div">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">School Name:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("name", isset($school->name) ? set_value('name', $school->name) : set_value('name'), 'readonly class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('name'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="col-sm-12 col-form-label">School Code:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("kv_code", isset($school->kv_code) ? set_value('kv_code', $school->kv_code) : set_value('kv_code'), 'readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('kv_code'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">UDISE Code:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("udise_code", isset($school->udise_code) ? set_value('udise_code', $school->udise_code) : set_value('udise_code'), ' readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('udise_code'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="col-sm-12 col-form-label">Region:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("region_id", array("" => "Select Region") + masterregion_lists(), isset($school->region_id) ? set_value('region_id', $school->region_id) : set_value('region_id'), 'readonly class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('region_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="" class="col-sm-12 col-form-label">Zone:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("zone_id", array("" => "Select Zone") + zone(), isset($school->zone_id) ? set_value('zone_id', $school->zone_id) : set_value('zone_id'), 'disabled class="validate[required] form-control" autocomplete="off"');?>
                        <span class="error"><?php echo form_error('zone_id'); ?></span>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Station Id:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("station_id", isset($school->station_id) ? set_value('station_id', $school->station_id) : set_value('station_id'), 'readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('station_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Station Type:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("station_type", array("" => "Select Station") + master_station_lists(), isset($school->station_type) ? set_value('station_type', $school->station_type) : set_value('station_type'), 'disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('station_type'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">School Mail Id:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("email", isset($school->email) ? set_value('email', $school->email) : set_value('email'), 'readonly class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">School Sector:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("sector", array("" => "Select Sector") + sector(), isset($school->sector) ? set_value('sector', $school->sector) : set_value('sector'), 'disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('sector'); ?></span>
                    </div>
                </div>
               
                
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Year of Opening:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("year_of_establish", array("" => "Select Year") + awards_years(), isset($school->kvs_year_of_establish) ? set_value('year_of_establish', $school->kvs_year_of_establish) : set_value('year_of_establish'), 'id="year_of_establish" disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('year_of_establish'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Upto Class:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("kv_upto_class", array("" => "Select Class") + upto_class(), isset($school->kvs_upto_class) ? set_value('kv_upto_class', $school->kv_upto_class) : set_value('kv_upto_class'), 'disabled class="validate[required] form-control" onchange="getkvstreamdiv();" id="upto_class" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('kv_upto_class'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-6 kvstream" <?php if($school->kv_upto_class==11 || $school->kv_upto_class==12) echo ''; else echo 'style="display: none;"';  ?>>
                    <label for="" class="col-sm-12 col-form-label">Stream As Per KVS:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                      &emsp;<input type="checkbox" disabled name="kv_str_sci" id="kvscience" class="form-check-input" value="1" <?php echo ($school->kvs_str_sci == 1 ? 'checked' : null); ?>>Science&emsp;&emsp;&emsp;&emsp;
                            <input type="checkbox" disabled name="kv_str_com" id="kvcommerce" class="form-check-input" value="1" <?php echo ($school->kvs_str_com == 1 ? 'checked' : null); ?>>Commerce&emsp;&emsp;&emsp;&emsp;
                            <input type="checkbox" disabled name="kv_str_hum" id="kvhumanities" class="form-check-input" value="1" <?php echo ($school->kvs_str_hum == 1 ? 'checked' : null); ?>>Humanities
                        </div>

                    </div>
                </div>
                <!--<div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">No of Section:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php //echo form_input("kv_upto_section", isset($school->kv_upto_section) ? set_value('kv_upto_section', $school->kv_upto_section) : set_value('kv_upto_section'), 'disabled class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php //echo form_error('kv_upto_section'); ?></span>
                    </div>
                </div>-->
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Shift:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("shift", array("" => "Select Shift") + shift(), isset($school->shift) ? set_value('shift', $school->shift) : set_value('shift'), 'disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('shift'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">Kv Building:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input type="radio" disabled name="building_type" class="form-check-input" required value="1" <?php echo ($school->building_type == 1 ? 'checked' : null); ?>>Permanent&emsp;&emsp;&emsp;
                            <input type="radio" disabled name="building_type" class="form-check-input"  value="2" <?php echo ($school->building_type == 2 ? 'checked' : null); ?>>Temporary
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">Infrastructure Facilities Available:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input type="radio" disabled name="infra_type" class="form-check-input" required value="1" <?php echo ($school->infra_type == 1 ? 'checked' : null); ?>>YES&emsp;&emsp;&emsp;
                            <input type="radio" disabled name="infra_type" class="form-check-input" value="2" <?php echo ($school->infra_type == 2 ? 'checked' : null); ?>>NO
                        </div>
                    </div>
                </div>
        
            </div>  
        </div>
<!--================================ KVS DETAILS END =================================-->
<!--================================ CCEA DETAILS STARTS =================================-->
    <h6><strong  class="font_size_dynamic">Govt. Approval Details - </strong></h6>
        <div class="background_div">
            <div class="row">
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Classes As Per Govt. Approval:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("ccea_upto_class", array("" => "Select Class") + upto_class(), isset($school->ccea_upto_class) ? set_value('ccea_upto_class', $school->ccea_upto_class) : set_value('ccea_upto_class'), 'onchange="getstreamdiv();" disabled class="validate[required] form-control" id="ccea_class" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">No of Sections As Per Govt. Approval:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("ccea_upto_section", isset($school->ccea_upto_section) ? set_value('ccea_upto_section', $school->ccea_upto_section) : set_value('ccea_upto_section'), 'disabled class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-6 stream" <?php if($school->ccea_upto_class==11 || $school->ccea_upto_class==12) echo ''; else echo 'style="display: none;"';  ?> >
                <label for="" class="col-sm-12 col-form-label">Stream As Per Govt. Approval:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <div class="form-check">
                  &emsp;<input type="checkbox" disabled name="ccea_str_sci" id="science" class="form-check-input" value="1" <?php echo ($school->ccea_str_sci == 1 ? 'checked' : null); ?>>Science&emsp;&emsp;&emsp;&emsp;
                        <input type="checkbox" disabled name="ccea_str_com" id="commerce" class="form-check-input" value="1" <?php echo ($school->ccea_str_com == 1 ? 'checked' : null); ?>>Commerce&emsp;&emsp;&emsp;&emsp;
                        <input type="checkbox" disabled name="ccea_str_hum" id="humanities" class="form-check-input" value="1" <?php echo ($school->ccea_str_hum == 1 ? 'checked' : null); ?>>Humanities
                    </div>

                </div>
                </div>
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">No of Teaching Post As Per Govt.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("ccea_teach_post", isset($school->ccea_teach_post) ? set_value('ccea_teach_post', $school->ccea_teach_post) : set_value('ccea_teach_post'), 'id="teaching_post" readonly class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="caltotpost();" '); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">No of NonTeaching Post As Per Govt.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("ccea_nonteach_post", isset($school->ccea_nonteach_post) ? set_value('ccea_nonteach_post', $school->ccea_nonteach_post) : set_value('ccea_nonteach_post'), 'id="nonteaching_post" readonly class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="caltotpost();" '); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Total No of Post As Per Govt.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("total_post", ($school->ccea_teach_post && $school->ccea_nonteach_post ) ? set_value('total_post', $school->ccea_teach_post+$school->ccea_nonteach_post) : set_value('total_post'), 'id="total_post" readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
            </div>
            
            
        </div>
<!--================================ CCEA DETAILS END =================================-->
<!--================================ PROPOSAL STARTS =================================-->
    <h6><strong  class="font_size_dynamic">Proposal - </strong></h6>
        <div class="background_div">
            <div class="row">
                <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">No of Classrooms Available:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("classroom", isset($section[0]->classroom) ? set_value('classroom', $section[0]->classroom) : set_value('classroom'), 'class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-7">&nbsp;</div>
                <div class="form-group col-md-2 float-right">
                    
                    <div class="add_more_button mt-4" style="float:right;">
                        <a class="btn btn-primary" id="addmore_history" href="javascript:"> Add More</a>
                    </div>
                </div>
                <div class="clearfix"><hr></div>
                
                <div class="form-group col-md-12">
                    <div id="containner_history_more"></div>
                </div>
            </div>
        </div>
        <!--================================ PROPOSAL END =================================-->
        <div class="col-sm-12">
            <?php if(empty($section[0]->dc_section)) {?>
            <div  style="float:right;"> 
                <?php echo form_submit('', 'Submit Proposal', 'class="btn btn-block btn-primary"'); ?>
            </div>
            <?php }else { ?> 
            <div class="btn btn-block btn-warning">
                You Cannot Modify the Proposal, As Proposal Has Been Escalated By Regional Office ( DC ) to Next Level
            </div> 
            <?php } ?> 
        </div>

        <div class="text-right rg-footer"></div>
        <?php echo form_close(); ?>
    </div>
    </div>
</div>
</div>


<!-- ========================================== History Template Start ============================================-->
<script id="history_more_template" type="x-tmpl-mustache">
    <hr>
    <div class=" delete_wexp_history_more"  id="delete_wexp_history_more{{random_exr_id}}" >
    <div class="delete_more_button" style="display:none;" id="history_more_1_{{random_exr_id}}">
        <a id="remove_wexp_history_more{{random_exr_id}}" class="btn btn-danger remove_wexp_history_more{{random_exr_id}}" href="javascript:"> Delete</a>
    </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Class <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("class[]", array("" => "Select Class") + section_class(), isset($school->class) ? set_value('class', $school->class) : set_value('class'), 'id="class_{{random_exr_id}}" onchange="getprevioussection({{random_exr_id}});"  class="validate[required] form-control" autocomplete="off"');     ?>
                    <span class="error"><?php echo form_error('class'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Enrollment As On 1st April <?php echo date('Y'); ?> <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("present_enroll[]", isset($school->present_enroll) ? set_value('present_enroll', $school->present_enroll) : set_value('present_enroll'), 'id="present_enroll_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('present_enroll'); ?></span
                </div>
                </div>
            </div>
        
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Expected Enrollment During (<?php echo date("Y").'-'.date("Y", strtotime("+1 year")); ?>) <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_input("expected_enroll[]", isset($school->expected_enroll) ? set_value('expected_enroll', $school->expected_enroll) : set_value('expected_enroll'), 'id="expected_enroll_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                <span class="error"><?php echo form_error('expected_enroll'); ?></span>
                </div> 
            </div>
            <div class="form-group col-md-4" >
                <label for="" class="col-sm-12 col-form-label">Section Sanctioned During Previous Year (<?php echo date("Y", strtotime("-1 year")).'-'.date("Y"); ?>) <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("previous_section[]", isset($school->previous_section) ? set_value('code', $school->previous_section) : set_value('previous_section'), 'readonly id="previous_section_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="validatesection({{random_exr_id}});"'); ?> 
                        <span class="error"><?php echo form_error('previous_section'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Number Of Section Proposed By Principal (<?php echo date("Y").'-'.date("Y", strtotime("+1 year")); ?>)<span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_input("proposed_section[]", isset($school->proposed_section) ? set_value('code', $school->proposed_section) : set_value('proposed_section'), 'id="proposed_section_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="validatesection({{random_exr_id}});"'); ?>
                <span class="error"><?php echo form_error('proposed_section'); ?></span>
                </div> 
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Approved By Chairman/VMC <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("chairman_approval[]", array("" => "Select") + single_parent(), isset($school->chairman_approval) ? set_value('chairman_approval', $school->chairman_approval) : set_value('chairman_approval'), 'id="chairman_approval_{{random_exr_id}}" class="validate[required] form-control" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('chairman_approval'); ?></span>
                </div>
            </div>
            <?php if(!empty($section[0]->dc_section)) { ?>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">No Of Sections Recommended By DC <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_input("dc_section[]", '{{history_detail.dc_section}}', 'id="dc_section_{{random_exr_id}}" readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('dc_section'); ?></span>
                    </div> 
                </div>
                <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Select <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("dc_status[]", array("" => "Select") + section_status(), isset($school->dc_status) ? set_value('dc_status', $school->dc_status) : set_value('dc_status'), 'id="dc_status_{{random_exr_id}}" disabled class="validate[required] form-control" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('dc_status'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Remark <span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_input("dc_remark[]", '{{history_detail.dc_remark}}', 'readonly class="validate[required] form-control" autocomplete="off"'); ?>
                <span class="error"><?php echo form_error('dc_remark'); ?></span>
                </div> 
            </div>
            <?php } ?>
            <?php if(!empty($section[0]->hq_section)) { ?>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">No Of Sections Recommended By HQ <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_input("hq_section[]", '{{history_detail.hq_section}}', 'readonly id="hq_section_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('hq_section'); ?></span>
                    </div> 
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">Select <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("hq_status[]", array("" => "Select") + section_status(), isset($school->hq_status) ? set_value('hq_status', $school->hq_status) : set_value('hq_status'), 'disabled id="hq_status_{{random_exr_id}}" class="validate[required] form-control" autocomplete="off"');    ?>
                        <span class="error"><?php echo form_error('hq_status'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">Remark <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_input("hq_remark[]", '{{history_detail.hq_remark}}', 'readonly class="validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('hq_remark'); ?></span>
                    </div> 
                </div>
            <?php } ?>
        </div>
    </div>

 </script>
<!-- ============================================ History Template End ==============================================-->

<script>

    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();

    //====================================== ADD MORE HISTORY FUNCTION START  ==================================//
    var random_history_more_id = Date.now();
    $('#addmore_history').click(function () {
        random_history_more_id = Date.now();
        RenderHistoryMore(random_history_more_id);
    });

    var section_details =<?php echo json_encode(isset($section) ? $section: ''); ?>;
    console.log(section_details);
    if (section_details!='') {
        $.each(section_details, function (key, section_detail) {
            RenderHistoryMore(section_detail.id, section_detail);
            $("#class_" + section_detail.id).val(section_detail.class);
            $("#present_enroll_" + section_detail.id).val(section_detail.present_enroll);
            $("#expected_enroll_" + section_detail.id).val(section_detail.expected_enroll);
            $("#previous_section_" + section_detail.id).val(section_detail.previous_section);
            $("#proposed_section_" + section_detail.id).val(section_detail.proposed_section);
            $("#chairman_approval_" + section_detail.id).val(section_detail.chairman_approval);
            $("#dc_status_" + section_detail.id).val(section_detail.dc_status);
            $("#hq_status_" + section_detail.id).val(section_detail.hq_status);
        });
    } else {
        history_more = {};
        RenderHistoryMore(random_history_more_id, history_more);
    }
    

    function RenderHistoryMore(random_history_more_id, history_more) {
        var source = $("#history_more_template").html();
        var wexp_count = $(".delete_wexp_history_more").length;
        Mustache.parse(source);
        var rendered = Mustache.render(source, {
            random_exr_id: random_history_more_id,
            history_detail: history_more,
        });
        $("#containner_history_more").append(rendered);
        if (wexp_count != 0) {
            $("#history_more_1_" + random_history_more_id).css("display", "block");
        }
        delete_history_more(random_history_more_id);
    }

    function delete_history_more(random_exr_id) {

        $("#remove_wexp_history_more" + random_exr_id).click(function () {
            var wexp_count = $(".delete_wexp_history_more").length;
            var wexp_id = $(this).attr("wexpid");
            if (wexp_id) {
                var confirm = window.confirm('Are you sure want to delete?');
                if (confirm) {
                    $("#delete_wexp_history_more" + wexp_id).remove();
                    generate("success", "Details deleted successfully");
                    location_reload();
                    if (wexp_count == 1) {
                        equa = {};
                        RenderHistoryMore(random_exr_id, equa);
                    }
                }
            } else {
                if (wexp_count > 1) {
                    $("#delete_wexp_history_more" + random_exr_id).remove();
                }

            }

        });
    }
    //====================================== ADD MORE HISTORY FUNCTION END  ==================================//

    function validatesection(ids)
    {
        var previoussection = $('#previous_section_'+ids).val();
        var proposedsection = $('#proposed_section_'+ids).val();
        var cceasection = $('#cceasection').val();
        if (parseInt(proposedsection) > parseInt(cceasection)) {
            if (parseInt(previoussection) > parseInt(cceasection) && parseInt(proposedsection) <= parseInt(previoussection)) 
            {
                return true;
            }else{
                alert('Section cannot be more than approved by Govt.');
            }
        }else{
            return true;
        }

    }

    function getprevioussection(ids)
    {
        var classid=$('#class_'+ids).val();

        $.ajax({
            url: base_url + 'proposal/Proposal/get_presection',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&c_id=' + classid,
            type: 'POST',    
            success : function(Resp)
            {
                 $('#previous_section_'+ids).val($.trim(Resp));
            }
        });
    }

</script>
