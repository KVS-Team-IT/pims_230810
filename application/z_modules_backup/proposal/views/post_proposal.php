<?php //show($this->session->userdata());
//show($school); ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/modernizr.js"></script> <!-- Modernizr -->
    <div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header register-header">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Proposal For Sanction Of Staff Strength
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
                        <?php echo form_dropdown("year_of_establish", array("" => "Select Year") + awards_years(), isset($school->year_of_establish) ? set_value('year_of_establish', $school->year_of_establish) : set_value('year_of_establish'), 'id="year_of_establish" disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('year_of_establish'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Upto Class:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("kv_upto_class", array("" => "Select Class") + upto_class(), isset($school->kv_upto_class) ? set_value('kv_upto_class', $school->kv_upto_class) : set_value('kv_upto_class'), 'disabled class="validate[required] form-control" onchange="getkvstreamdiv();" id="upto_class" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('kv_upto_class'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-6 kvstream" <?php if($school->kv_upto_class==11 || $school->kv_upto_class==12) echo ''; else echo 'style="display: none;"';  ?>>
                    <label for="" class="col-sm-12 col-form-label">Stream As Per KVS:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                      &emsp;<input type="checkbox" disabled name="kv_str_sci" id="kvscience" class="form-check-input" value="1" <?php echo ($school->kv_str_sci == 1 ? 'checked' : null); ?>>Science&emsp;&emsp;&emsp;&emsp;
                            <input type="checkbox" disabled name="kv_str_com" id="kvcommerce" class="form-check-input" value="1" <?php echo ($school->kv_str_com == 1 ? 'checked' : null); ?>>Commerce&emsp;&emsp;&emsp;&emsp;
                            <input type="checkbox" disabled name="kv_str_hum" id="kvhumanities" class="form-check-input" value="1" <?php echo ($school->kv_str_hum == 1 ? 'checked' : null); ?>>Humanities
                        </div>

                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">No of Section:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("kv_upto_section", isset($school->kv_upto_section) ? set_value('stationid', $school->kv_upto_section) : set_value('kv_upto_section'), 'disabled class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('kv_upto_section'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Shift:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("shift", array("" => "Select Shift") + shift(), isset($school->shift) ? set_value('shift', $school->shift) : set_value('shift'), 'disabled class="validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('shift'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Kv Building:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input type="radio" disabled name="building_type" class="form-check-input" required value="1" <?php echo ($school->building_type == 1 ? 'checked' : null); ?>>Permanent&emsp;&emsp;&emsp;
                            <input type="radio" disabled name="building_type" class="form-check-input"  value="2" <?php echo ($school->building_type == 2 ? 'checked' : null); ?>>Temporary
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">Infrastructure Facilities Available:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input type="radio" disabled name="infra_type" class="form-check-input" required value="1" <?php echo ($school->infra_type == 1 ? 'checked' : null); ?>>YES&emsp;&emsp;&emsp;
                            <input type="radio" disabled name="infra_type" class="form-check-input" value="2" <?php echo ($school->infra_type == 2 ? 'checked' : null); ?>>NO
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">No of Classrooms Available:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("classroom", isset($school->class_rooms) ? set_value('classroom', $school->class_rooms) : set_value('classroom'), 'class="numericOnly validate[required] form-control" readonly autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('classroom'); ?></span>
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
<!--================================ PROPOSAL STARTS =================================-->
    <h6><strong  class="font_size_dynamic">Proposal - </strong></h6>
            <div class="background_div">
                <br>
                <div class="row">   
                    <div class="form-group col-md-12 float-right"> 
                        <div class="add_more_button">
                            <a class="btn btn-primary" id="addmore_history" href="javascript:"> Add More</a>
                        </div>
                        </div>
                    <div class="clearfix"><hr></div>
                </div>
                <div class="form-group col-md-12">
                    <div id="containner_history_more"></div>
                </div>
            </div>        
<!--================================ PROPOSAL END =================================-->                                
            
            <div class="col-sm-12">
            <?php if(empty($post[0]->dc_post)) {?>
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
    <div class="delete_wexp_history_more"  id="delete_wexp_history_more{{random_exr_id}}" >
    <div class="delete_more_button" style="display:none;" id="history_more_1_{{random_exr_id}}">
        <a id="remove_wexp_history_more{{random_exr_id}}" class="btn btn-danger remove_wexp_history_more{{random_exr_id}}" href="javascript:"> Delete</a>
    </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Category <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("category[]", array("" => "Select Category") + designation_category_lists(), '', 'id="category_{{random_exr_id}}" class="validate[required] form-control" onchange="getdesignation({{random_exr_id}});" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('category'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Designation  <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("designation[]", array("" => "Select Designation") + designation_lists(5), '', 'id="designation_{{random_exr_id}}" class="validate[required] form-control" onchange="getpost({{random_exr_id}},1);" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('designation'); ?></span
                </div>
                </div>
            </div>
            <div class="form-group col-md-4" id="subjectdiv_{{random_exr_id}}" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Subject  <span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("subject[]", array("" => "Select Subject") + subject_lists(), '', 'id="subject_{{random_exr_id}}" class=" form-control" onchange="getpost({{random_exr_id}},2);" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('subject'); ?></span
                </div>
                </div>
            </div>
            
            <div class="form-group col-md-4" >
                <label for="" class="col-sm-12 col-form-label">Post Sanctioned During Previous Year (<?php echo date("Y", strtotime("-1 year")).'-'.date("Y"); ?>) <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("previous_post[]", '', 'id="previous_post_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off"'); ?> 
                        <span class="error"><?php echo form_error('previous_post'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Number Of Post Proposed By Principal (<?php echo date("Y").'-'.date("Y", strtotime("+1 year")); ?>)<span class="reqd">*</span></label>
                <div class="col-sm-12">
                <?php echo form_input("proposed_post[]", '', 'id="proposed_post_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off" '); ?>
                <span class="error"><?php echo form_error('proposed_section'); ?></span>
                </div> 
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Approved By Chairman/VMC <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("chairman_approval[]", array("" => "Select") + single_parent(), '', 'id="chairman_approval_{{random_exr_id}}" class="validate[required] form-control" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('chairman_approval'); ?></span>
                </div>
            </div>
            <?php if(!empty($post[0]->dc_post)) { ?>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">No Of Sections Recommended By DC <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_input("dc_post[]", '{{history_detail.dc_post}}', 'id="dc_post_{{random_exr_id}}" readonly class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
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
            <?php if(!empty($post[0]->hq_post)) { ?>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">No Of Sections Recommended By HQ <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_input("hq_post[]", '{{history_detail.hq_post}}', 'readonly id="hq_post_{{random_exr_id}}" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
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

    var post_details =<?php echo json_encode(isset($post) ? $post: ''); ?>;
    console.log(post_details);
    if (post_details!='') {
        $.each(post_details, function (key, post_detail) {
            RenderHistoryMore(post_detail.id, post_detail);
            $("#category_" + post_detail.id).val(post_detail.category);
            $("#designation_" + post_detail.id).val(post_detail.designation);
            if(post_detail.subject!=0)
            {
                $("#subjectdiv_" + post_detail.id).css("display", "block");
                $("#subject_" + post_detail.id).val(post_detail.subject);
            }
            
            $("#previous_post_" + post_detail.id).val(post_detail.previous_post);
            $("#proposed_post_" + post_detail.id).val(post_detail.proposed_post);
            $("#chairman_approval_" + post_detail.id).val(post_detail.chairman_approval);
            $("#dc_status_" + post_detail.id).val(post_detail.dc_status);
            $("#hq_status_" + post_detail.id).val(post_detail.hq_status);
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

    function getdesignation(ids)
    {
        $('#subject_'+ids).val('');
        var catid = $('#category_'+ids).val(); 
        $.ajax({
            url: base_url + 'proposal/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&c_id=' + catid,
            type: 'POST',
            success : function (response) {
                if(catid==1)
                {
                    $('#subjectdiv_'+ids).show(); 
                }else{
                    $('#subjectdiv_'+ids).hide();
                    $('#subject_'+ids).val(0);
                }
                
                $('#designation_'+ids).html(response);  
            }

       });
    }
    function getpost(ids,typ){
        var catid = $('#category_'+ids).val(); 
        var desid = $('#designation_'+ids).val();
        if(typ==1 && catid==1 && (desid==5 || desid==6)){ 
            $('#subject_'+ids).val('');
            $('#subjectdiv_'+ids).show();
        }else if(typ==2){
            $('#subjectdiv_'+ids).show();
            var subid = $('#subject_'+ids).val();
        }
        else{
            $('#subject_'+ids).val('');
            $('#subjectdiv_'+ids).hide();
        }
        if(!subid){subid=0;}
        
        $.ajax({
            url: base_url + 'proposal/get_post',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&c_id=' + catid + '&d_id=' + desid + '&s_id=' + subid,
            type: 'POST',    
            success : function(response)
            {
                //alert(response);
                $('#previous_post_'+ids).val($.trim(response));
                if(typ==1 && catid==1 && (desid==5 || desid==6) && subid==0){
                     $('#previous_post_'+ids).val('');
                }
            }
        });
    }

//    function getpost(ids,typ){
//        if(typ==1){ $('#subject_'+ids).val('');}
//        var catid = $('#category_'+ids).val(); 
//        var desid = $('#designation_'+ids).val();
//        var subid = $('#subject_'+ids).val();
//        var code = $('#kvcode').val(); 
//        $.ajax({
//            url: base_url + 'proposal/get_post',
//            data: get_csrf_token_name + '=' + get_csrf_hash + '&c_id=' + catid + '&d_id=' + desid + '&s_id=' + subid + '&code=' +code,
//            type: 'POST',    
//            success : function(response)
//            {
//                //alert(response);
//                $('#previous_post_'+ids).val($.trim(response));
//            }
//        })
//    }

</script>