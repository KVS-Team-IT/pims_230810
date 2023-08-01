<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/modernizr.js"></script> <!-- Modernizr -->
<div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header register-header">
            <?php 
            //print_r($PerData);
            if(empty($EmpCode)) 
                echo '<i class="fa fa-user-plus"></i>&nbsp;Add Employee'; 
            else 
                echo '<i class="fa fa-user"></i>&nbsp;Employee Code - '.$EmpCode;  ?>
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

        <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>

        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($EmpCode) ? $EmpCode : ''; ?>" autocomplete="off">
        <?php echo $this->load->view('app/ProfileTab',(isset($EmpCode))?$EmpCode:''); ?>
        <h6><strong>Training & Workshop - </strong></h6>
        <hr>
        <!-- ================================== TRAINING ======================================-->
        <div class="row">
            <div class="form-group col-md-4" >
                <label for="" class="col-sm-12 col-form-label">Took Participate in Any Course Training / Workshop? :<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("IS_TRAINED", array("" => "Select") + single_parent(), isset($TranData[0]->is_attended_training) ? set_value('IS_TRAINED', $TranData[0]->is_attended_training) : set_value('IS_TRAINED',''), ' id="servicetraining" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('is_attended_training'); ?></span>
                </div>
            </div>
        </div>
        <div class="add_more_button" id="add_more_training" <?php echo ($TranData[0]->is_attended_training== 1) ?"style=display:block;":"style=display:none;"?>>
                <a class="btn btn-primary" id="add_more_training" href="javascript:"> + Add More</a>
        </div>
        <div id="containner_training_more" <?php echo ($TranData[0]->is_attended_training== 1) ?"style=display:block;":"style=display:none;"?> ></div>
        
        <div class="clerafix"><hr></div>
        <!-- ================================== WORKSHOP ======================================-->
        <h6><strong>Other Training / Workshop </strong></h6>
        <hr>
        <div class="row">
            <div class="form-group col-md-4" >
                <label for="" class="col-sm-12 col-form-label">Took Participate in Any Other Training / Workshop?:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("IS_WORKSHOP", array("" => "Select") + single_parent(), isset($OtherTranData[0]->is_attended_workshop) ? set_value('IS_WORKSHOP', $OtherTranData[0]->is_attended_workshop) : set_value('IS_WORKSHOP',''), ' id="othertraining" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('is_attended_workshop'); ?></span>
                </div>
            </div>
        </div>
        <div class="add_more_button" id="add_more_workshop" <?php echo ($OtherTranData[0]->is_attended_workshop == 1) ?"style=display:block;":"style=display:none;"?>>
                <a class="btn btn-primary" id="add_more_workshop" href="javascript:"> + Add More</a>
                <br>
        </div>
        <div id="containner_workshop_more" <?php echo ($OtherTranData[0]->is_attended_workshop == 1) ?"style=display:block;":"style=display:none;"?> ></div>
        <div class="clerafix"><hr></div>
        <!-- ================================== EXEMPTION ======================================-->
        <h6><strong>Training Exemption- </strong></h6>
        <hr>
        <div class="row">
            <div class="form-group col-md-4" >
                <label for="" class="col-sm-12 col-form-label">Took Any Exemption From Training?:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("IS_EXMP", array("" => "Select") + single_parent(), isset($ExemptionData[0]->is_exemption) ? set_value('IS_EXMP', $ExemptionData[0]->is_exemption) : set_value('IS_EXMP'), ' id="is_exemption" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('IS_EXMP'); ?></span>
                </div>
            </div>
        </div>    
        <div class="add_more_button" id="add_more_exemption" <?php echo ($ExemptionData[0]->is_exemption== 1) ?"style=display:block;":"style=display:none;"?> >
            <a class="btn btn-primary"  id="addmoreexemption" href="javascript:" > Add More</a>
            <br>
        </div>
        <div id="containner_exemption_more" <?php echo ($ExemptionData[0]->is_exemption== 1) ?"style=display:block;":"style=display:none;"?> ></div>
        <div class="clerafix"><hr></div>


        <div class="row">
            <div class="col-sm-12">
                <div  style="float:right;"> 
                    <input class="btn btn-primary" type="reset" value="Reset">
                     <?php  echo form_submit('', 'Save & Next', 'class="btn btn-primary"');?>
                </div>
            </div>
        </div>
        
        <div class="text-right rg-footer"></div>    
        <?php echo form_close(); ?>
    </div>
</div>
    </div>
</div>
<!-- ==================== T R A I N I N G     T E M P L A T E    S T A R T =========================-->
<script id="training_more_template" type="x-tmpl-mustache">
<div class="background_div delete_wexp_training_more"  id="delete_wexp_training_more{{random_exr_id}}">
<div class="row">
    <div class="delete_more_button"  style="display:none;" id="training_more_1_{{random_exr_id}}">
        <a style="color: #fff;!important" id="remove_wexp_training_more{{random_exr_id}}" class="btn btn-danger remove_wexp_training_more{{random_exr_id}}" href="javascript:""> Delete</a>
    </div>
    
    <div class="form-group col-md-4">
        <label for="" class="col-sm-12 col-form-label">Select Course :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("TRN_COURSE[]", array("" => "Select Type") + course_type(), isset($users->course) ? set_value('TRN_COURSE[]', $users->course) : set_value('TRN_COURSE[]','0'), 'id="course_type_{{random_exr_id}}" class="form-control validate[required]" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('TRN_COURSE'); ?></span>
        </div>
    </div>
    
    <div class="form-group col-md-4">
        <label for="" class="col-sm-12 col-form-label">Topic :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("TRN_TOPIC[]", '{{training.topic}}', ' id="topic_{{random_exr_id}}" placeholder="Topic" class="form-control validate[required]" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('TRN_TOPIC'); ?></span>
        </div>
    </div>
    
    <div class="form-group col-md-4">
        <label for="" class="col-sm-12 col-form-label">Post Held :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("TRN_DESIG[]",'', 'placeholder="Post Held" id="training_designation_{{random_exr_id}}"  class="form-control validate[required] typeahead" autocomplete="off" '); ?>
            <input type="hidden" name="TRN_POST[]" value="" id="training_post_id_{{random_exr_id}}">
            <span class="error"><?php echo form_error('TRN_POST'); ?></span>
        </div>
    </div>

</div> 

<div class="row ">
    <div class="form-group col-md-4" style="display:none;" id="subject_div_training_{{random_exr_id}}">
        <label for="" class="col-sm-12 col-form-label">Subject :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("TRN_SUB[]", array("" => "Select") + subject_lists(), isset($users->subject) ? set_value('TRN_SUB[]', $users->subject) : set_value('TRN_SUB[]','0'), 'id="training_subject_{{random_exr_id}}" class="form-control validate[required] " autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('TRN_SUB'); ?></span> 
        </div>
    </div>
    
    <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Spell :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("TRN_SPELL[]", array("" => "Select Spell") + spell(), isset($users->spell) ? set_value('TRN_SPELL[]', $users->spell) : set_value('TRN_SPELL[]','0'), 'id="spell_{{random_exr_id}}"  onchange="getdatediv({{random_exr_id}})" class="form-control validate[required]" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('TRN_SPELL'); ?></span>
        </div>
    </div>
    
    <div class="form-group col-md-4">
        <label for="" class="col-sm-12 col-form-label">Duration(In Days) :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("TRN_SPAN[]", '{{training.duration}}', ' id="duration_inservice_{{random_exr_id}}" readonly placeholder="Duration(In Days)" class="form-control validate[required]" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('TRN_SPAN'); ?></span>
        </div>
    </div>
</div>
<!-- ================= SINGLE SPELL DIV START ===================-->
<div class="row" style="display:none;" id="single_{{random_exr_id}}">
    <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_ONE_FROM[]", '{{training.t_from1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_single_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_ONE_FROM'); ?></span>
        </div>
    </div>
    
    <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_ONE_TO[]",'{{training.t_to1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required]" id="training_single_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_ONE_TO'); ?></span>
        </div>
    </div>
    
    <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue <span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_ONE_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_ONE_VENUE[]', $users->venuetype) : set_value('SPL_ONE_VENUE[]'), 'id="venue_{{random_exr_id}}" data-id="c"  class="form-control validate[required]" onchange="processRegionDiv({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_ONE_VENUE'); ?></span> 
        </div></div>
        <div class="form-group col-md-4" id="region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="all_region_label_{{random_exr_id}}">Regions<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_ONE_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_ONE_RO[]', $users->venueregion) : set_value('SPL_ONE_RO[]'), 'class="form-control region"  id="region_id_all_{{random_exr_id}}" onchange="ProcessSchooldiv({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_ONE_RO'); ?></span>
        </div>
        </div>
        <div class="form-group col-md-4" id="school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">Schools<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_ONE_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_ONE_KV[]', $users->venueschool) : set_value('SPL_ONE_KV[]'), 'class="form-control region"  id="school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_ONE_KV'); ?></span>
        </div>
        </div>
</div>
<!-- ================== SINGLE SPELL DIV END ====================-->    
<!-- ================= DOUBLE SPELL DIV START ===================--> 
<div class="doublediv" id="double_{{random_exr_id}}" style="display:none;">
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_TWO_FROM[]", '{{training.t_from1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_doubleone_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_TWO_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_TWO_TO[]", '{{training.t_to1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_doubleone_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_TWO_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_TWO_FROM[]", '{{training.t_from2}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_doubletwo_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_TWO_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_TWO_TO[]", '{{training.t_to2}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_doubletwo_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_TWO_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 1 <span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_TWO_VENUE[]', $users->venuetype) : set_value('SPL_TWO_VENUE[]'), 'id="doublevenue1_{{random_exr_id}}" data-id="c"  class="form-control validate[required]" onchange="processRegionDivdouble1({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_TWO_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="double1region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="double1all_region_label_{{random_exr_id}}">Region 1<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_TWO_RO[]', $users->venueregion) : set_value('SPL_TWO_RO[]'), 'class="form-control region"  id="double1region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivdouble1({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_TWO_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="double1school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 1<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_TWO_KV[]', $users->venueschool) : set_value('SPL_TWO_KV[]'), 'class="form-control region"  id="double1school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_TWO_KV'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 2 <span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_TWO_VENUE[]', $users->venuetype) : set_value('SPL_TWO_VENUE[]'), 'id="doublevenue2_{{random_exr_id}}" data-id="c"  class="form-control" onchange="processRegionDivdouble2({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_TWO_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="double2region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="double2all_region_label_{{random_exr_id}}">Region 2<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_TWO_RO[]', $users->venueregion) : set_value('SPL_TWO_RO[]'), 'class="form-control region"  id="double2region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivdouble2({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_TWO_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="double2school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 2<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_TWO_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_TWO_KV[]', $users->venueschool) : set_value('SPL_TWO_KV[]'), 'class="form-control region"  id="double2school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_TWO_KV'); ?></span>
        </div>
        </div>
        
    </div>
</div>
<!-- ================== DOUBLE SPELL DIV END ===================--> 
<!-- ================= MULTI SPELL DIV START ===================--> 
<div class="12333div" id="12_3_3_3_{{random_exr_id}}" style="display:none;">
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_FROM[]", '{{training.t_from1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required]" id="training_one_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_MUL_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_TO[]", '{{training.t_to1}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required]" id="training_one_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_FROM[]", '{{training.t_from2}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_two_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_TO[]", '{{training.t_to2}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_two_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_FROM[]", '{{training.t_from3}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_three_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
            <span class="error"><?php echo form_error('SPL_MUL_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_TO[]", '{{training.t_to3}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_three_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date From :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_FROM[]", '{{training.t_from4}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_four_fromdate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_FROM'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Date To :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("SPL_MUL_TO[]", '{{training.t_to4}}', 'placeholder="dd-mm-yyyy"  class="form-control validate[required] " id="training_four_todate_{{random_exr_id}}" autocomplete="off"'); ?>
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            <span class="error"><?php echo form_error('SPL_MUL_TO'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 1 <span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_MUL_VENUE[]', $users->venuetype) : set_value('SPL_MUL_VENUE[]'), 'id="spellvenue1_{{random_exr_id}}" data-id="c"  class="form-control validate[required]" onchange="processRegionDivspell1({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_MUL_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell1region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="spell1all_region_label_{{random_exr_id}}">Region 1<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_MUL_RO[]', $users->venueregion) : set_value('SPL_MUL_RO[]'), 'class="form-control "  id="spell1region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivspell1({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell1school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 1<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_MUL_KV[]', $users->venueschool) : set_value('SPL_MUL_KV[]'), 'class="form-control "  id="spell1school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_KV'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 2 <span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_MUL_VENUE[]', $users->venuetype) : set_value('SPL_MUL_VENUE[]'), 'id="spellvenue2_{{random_exr_id}}" data-id="c"  class="form-control" onchange="processRegionDivspell2({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_MUL_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell2region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="spell2all_region_label_{{random_exr_id}}">Region 2<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_MUL_RO[]', $users->venueregion) : set_value('SPL_MUL_RO[]'), 'class="form-control "  id="spell2region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivspell2({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell2school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 2<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_MUL_KV[]', $users->venueschool) : set_value('SPL_MUL_KV[]'), 'class="form-control "  id="spell2school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_KV'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 3 <span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_MUL_VENUE[]', $users->venuetype) : set_value('SPL_MUL_VENUE[]'), 'id="spellvenue3_{{random_exr_id}}" data-id="c"  class="form-control" onchange="processRegionDivspell3({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_MUL_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell3region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="spell3all_region_label_{{random_exr_id}}">Region 3<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_MUL_RO[]', $users->venueregion) : set_value('SPL_MUL_RO[]'), 'class="form-control "  id="spell3region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivspell3({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell3school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 3<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_MUL_KV[]', $users->venueschool) : set_value('SPL_MUL_KV[]'), 'class="form-control "  id="spell3school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_KV'); ?></span>
        </div>
        </div>
        
    </div>
    <div class="row">
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label"> Venue 4 <span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_VENUE[]", array("" => "Select") + role_lists(), isset($users->venuetype) ? set_value('SPL_MUL_VENUE[]', $users->venuetype) : set_value('SPL_MUL_VENUE[]'), 'id="spellvenue4_{{random_exr_id}}" data-id="c"  class="form-control" onchange="processRegionDivspell4({{random_exr_id}})" autocomplete="off" '); ?>
            <span class="error"><?php echo form_error('SPL_MUL_VENUE'); ?></span> 
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell4region_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label" id="spell4all_region_label_{{random_exr_id}}">Region 4<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_RO[]", array("" => "Select") + region_lists(), isset($users->venueregion) ? set_value('SPL_MUL_RO[]', $users->venueregion) : set_value('SPL_MUL_RO[]'), 'class="form-control "  id="spell4region_id_all_{{random_exr_id}}" onchange="ProcessSchooldivspell4({{random_exr_id}})" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_RO'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" id="spell4school_div_all_{{random_exr_id}}" style="display:none;">
        <label for="" class="col-sm-12 col-form-label">School 4<span class="reqd"></span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("SPL_MUL_KV[]", array("" => "Select") + school_lists(), isset($users->venueschool) ? set_value('SPL_MUL_KV[]', $users->venueschool) : set_value('SPL_MUL_KV[]'), 'class="form-control "  id="spell4school_id_all_{{random_exr_id}}" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('SPL_MUL_KV'); ?></span>
        </div>
        </div>
    </div>    
    </div>
    <div class="row">
    
        <div class="form-group col-md-4" >
        <label for="" class="col-sm-12 col-form-label">Role :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_dropdown("TRN_ROLE[]", array("" => "Select") + training_role(), isset($users->role) ? set_value('TRN_ROLE[]', $users->role) : set_value('TRN_ROLE[]'), 'id="service_role_{{random_exr_id}}" class="form-control validate[required]" onchange="opengrade({{random_exr_id}})"  autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('TRN_ROLE'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" style="display:none" id="servicegrade_{{random_exr_id}}">
        <label for="" class="col-sm-12 col-form-label">Grading/Rating :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("TRN_GRADE[]", '{{training.grading}}', 'placeholder="Grading Or Rating" class="form-control validate[required]" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('TRN_GRADE'); ?></span>
        </div>
        </div>
        
        <div class="form-group col-md-4" style="display:none" id="courseconducted{{random_exr_id}}">
        <label for="" class="col-sm-12 col-form-label">Course Conducted For :<span class="reqd">*</span></label>
        <div class="col-sm-12">
            <?php echo form_input("TRN_CONDUCT[]", '{{training.conductedfor}}', 'placeholder="PGT,TGT,PRT etc.." class="form-control validate[required]" autocomplete="off"'); ?>
            <span class="error"><?php echo form_error('TRN_CONDUCT'); ?></span>
        </div>
        </div>
          
    </div>
</div>
<!-- ================= MULTI SPELL DIV END ===================--> 
</script>
<script id="workshop_more_template" type="x-tmpl-mustache">
    <div class="background_div delete_wexp_workshop"  id="delete_wexp_workshop{{random_exr_id}}">
    <div class="row">
    <div style="display:none;width: 100%;text-align: right;margin-right: 18px;margin-top: 5px;" id="workshop_add_{{random_exr_id}}">
    <a id="remove_wexp_workshop{{random_exr_id}}" class="btn btn-danger remove_wexp_workshop{{random_exr_id}}" href="javascript:"> Delete</a>
    </div>
    <div class="form-group col-md-4" >
    <label for="" class="col-sm-12 col-form-label">Organizing Agency:</label>
    <div class="col-sm-12">
        <?php echo form_dropdown("ORG_AGENCY[]", array("" => "Select") + training_agency(), isset($users->organizing_agency) ? set_value('ORG_AGENCY[]', $users->organizing_agency) : set_value('ORG_AGENCY[]','0'), 'class="form-control"  id="agency{{random_exr_id}}" onchange="openagency({{random_exr_id}})" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('ORG_AGENCY'); ?></span>
    </div>
    </div>
    <div class="form-group col-md-4" style="display:none;" id="govt{{random_exr_id}}" >
    <label for="" class="col-sm-12 col-form-label">Organization:</label>
    <div class="col-sm-12">
        <?php echo form_dropdown("GOVT_AGENCY[]", array("" => "Select") + govt_org(), isset($users->govt_agency) ? set_value('GOVT_AGENCY[]', $users->govt_agency) : set_value('GOVT_AGENCY[]','0'), 'class="form-control" id="govt_agency{{random_exr_id}}" onchange="govtothername({{random_exr_id}})" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('GOVT_AGENCY'); ?></span>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="display:none;" id="othergovtname{{random_exr_id}}" >
    <label for="" class="col-sm-12 col-form-label">Name of Govt Organization:</label>
    <div class="col-sm-12">
        <?php echo form_input("OTH_AGENCY[]", '{{workshop.othergovname}}', 'placeholder="Name of Organization" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('OTH_AGENCY'); ?></span>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="display:none;" id="nongovt{{random_exr_id}}" >
    <label for="" class="col-sm-12 col-form-label">Name of Organization:</label>
    <div class="col-sm-12">
        <?php echo form_input("NON_GOVT_AGENCY[]", '{{workshop.non_gov_agency_name}}', 'placeholder="Name of Organization" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('NON_GOVT_AGENCY'); ?></span>
    </div>
    </div>

    <div class="form-group col-md-4" style="display:none;" id="address{{random_exr_id}}" >
    <label for="" class="col-sm-12 col-form-label">Address Of Organization:</label>
    <div class="col-sm-12">
        <?php echo form_input("NON_GOVT_AGENCY_ADD[]", '{{workshop.org_address}}', 'placeholder="Address of Organization" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('NON_GOVT_AGENCY_ADD'); ?></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4" >
    <label for="" class="col-sm-12 col-form-label">Training Venue:</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_VENUE[]", '{{workshop.trainingvenue}}', 'placeholder="Training Venue" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_VENUE'); ?></span>
    </div>
    </div>
    <div class="form-group col-md-4" >
    <label for="" class="col-sm-12 col-form-label">Date From:</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_FROM[]", '{{workshop.t_from}}', 'placeholder="dd-mm-yyyy" id="workshop_from_datepicker{{random_exr_id}}" class="datepicker-here form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_FROM'); ?></span>
    </div>
    </div>
    <div class="form-group col-md-4" >
    <label for="" class="col-sm-12 col-form-label">Date To:</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_TO[]", '{{workshop.t_to}}', 'placeholder="dd-mm-yyyy" id="workshop_to_datepicker{{random_exr_id}}"  class="datepicker-here form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_TO'); ?></span>
    </div>
    </div>
    </div>

    <div class="row">

    <div class="form-group col-md-4">
    <label for="" class="col-sm-12 col-form-label">Duration(In Days):</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_SPAN[]", '{{workshop.duration}}', 'id="workshop_duration_{{random_exr_id}}" readonly placeholder="Duration(In Days)" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_SPAN'); ?></span>
    </div>
    </div>
    <div class="form-group col-md-4">
    <label for="" class="col-sm-12 col-form-label">Topic/Subject:</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_TOPIC[]", '{{workshop.trainingtopic}}', 'placeholder="Training Topic or Subject" class="form-control" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_TOPIC'); ?></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
    <label for="" class="col-sm-12 col-form-label">Post Held at the time of Training:</label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_DESIG[]", isset($users->emp_phy_details_date) ? set_value('TRN_OTH_DESIG[]', $users->emp_phy_details_date) : set_value('TRN_OTH_DESIG[]'), 'placeholder="Post Held at the time of Training" id="workshop_designation_{{random_exr_id}}"  class="form-control typeahead" autocomplete="off"'); ?>
        <input type="hidden" name="TRN_OTH_POST[]" value="" id="workshop_post_id_{{random_exr_id}}">
        <span class="error"><?php echo form_error('TRN_OTH_POST'); ?></span>
    </div>
    </div>

    <div class="form-group col-md-4" style="display:none;" id="subject_div_{{random_exr_id}}">
    <label for="" class="col-sm-12 col-form-label"> Subject    <span class="reqd"></span></label>
    <div class="col-sm-12">
        <?php echo form_dropdown("TRN_OTH_SUB[]", array("" => "Select") + subject_lists(), isset($users->othersubject) ? set_value('TRN_OTH_SUB[]', $users->othersubject) : set_value('TRN_OTH_SUB[]'), 'id="subject_id_{{random_exr_id}}" data-id="c" class="form-control"  autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_SUB'); ?></span> 
    </div>
    </div>

    </div>
    <div class="row">
    <div class="form-group col-md-4" >
    <label for="" class="col-sm-12 col-form-label">Role:</label>
    <div class="col-sm-12">
        <?php echo form_dropdown("TRN_OTH_ROLE[]", array("" => "Select") + training_role(), isset($users->otherrole) ? set_value('TRN_OTH_ROLE[]', $users->otherrole) : set_value('TRN_OTH_ROLE[]'), 'id="workshop_role_{{random_exr_id}}" class="form-control" onchange="openworkshopgrade({{random_exr_id}})" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_ROLE'); ?></span>
    </div>
    </div>
    
    <div class="form-group col-md-4" style="display:none" id="workshopgrade_{{random_exr_id}}">
    <label for="" class="col-sm-12 col-form-label">Grading/Rating :<span class="reqd">*</span></label>
    <div class="col-sm-12">
        <?php echo form_input("TRN_OTH_GRADE[]", '{{workshop.grading}}', 'placeholder="Grading Or Rating" class="form-control validate[required]" autocomplete="off"'); ?>
        <span class="error"><?php echo form_error('TRN_OTH_GRADE'); ?></span>
    </div>
    </div>
    

    </div>
    </div>
</script>   
<!-- ADD MORE EXEMPTION DIV START -------->
<script id="exemption_more_template" type="x-tmpl-mustache">
    <div class="background_div delete_wexp_exemption_more"  id="delete_wexp_exemption_more{{random_exr_id}}" >
        <div class="delete_more_button" style="display:none; " id="exemption_more_1_{{random_exr_id}}">
            <a id="remove_wexp_exemption_more{{random_exr_id}}" class="btn btn-danger remove_wexp_exemption_more{{random_exr_id}}" href="javascript:"> Delete</a>
        </div>
        <div class="row">

            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Course :<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("EXEM_COURSE[]", array("" => "Select") + course_type(), '', ' id="exemption_course{{random_exr_id}}" class="form-control validate[required]"  autocomplete="off"');?>
                    <span class="error"><?php echo form_error('EXEM_COURSE'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Ground :<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("EXEM_GROUND[]", array("" => "Select") + exemption_ground(), '', ' id="exemption_ground{{random_exr_id}}" class="form-control validate[required]"  autocomplete="off"');?>
                    <span class="error"><?php echo form_error('EXEM_GROUND'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4"  >
                <label for="" class="col-sm-12 col-form-label">Reason For Exemption :<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("EXEM_REASON[]",'{{Ex_exemption.reason}}', 'placeholder="Reason For Exemption" id="reason{{random_exr_id}}" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('EXEM_REASON'); ?></span>
                </div>
            </div>
            
        </div>
        
            
        </div>
</script>
<!-- ADD MORE EXEMPTION DIV END ---------->
<script type="text/javascript">
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();                                                    
    function processRegionDiv(ids) {
    //console.log('Calling');
        var role_id = $("#venue_"+ids).val();
        $('#school_div_all_'+ids).css("display", "none");
        $('#school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#region_id_all_'+ids).html(response);
                    $('#region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#all_region_label_"+ids).html("Units<span class='reqd'>*</span>");
                    }
                    else if (role_id == '4') {
                        $("#all_region_label_"+ids).html("ZIET<span class='reqd'>*</span>");
                    } else {
                        $("#all_region_label_"+ids).html("Regions<span class='reqd'>*</span>");
                    }
                }
            });
        }else{
            $('#region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivdouble1(ids) {
    //console.log('Calling');
        var role_id = $("#doublevenue1_"+ids).val();
        $('#double1school_div_all_'+ids).css("display", "none");
        $('#double1school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#double1region_id_all_'+ids).html(response);
                    $('#double1region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#double1all_region_label_"+ids).html("Unit 1<span class='reqd'>*</span>");
                    }
                    else if (role_id == '4') {
                        $("#double1all_region_label_"+ids).html("ZIET 1<span class='reqd'>*</span>");
                    } else {
                        $("#double1all_region_label_"+ids).html("Region 1<span class='reqd'>*</span>");
                    }
                }
            });
        }else{
            $('#double1region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivdouble2(ids) {
    //console.log('Calling');
        var role_id = $("#doublevenue2_"+ids).val();
        $('#double2school_div_all_'+ids).css("display", "none");
        $('#double2school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#double2region_id_all_'+ids).html(response);
                    $('#double2region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#double2all_region_label_"+ids).html("Unit 2<span class='reqd'></span>");
                    }
                    else if (role_id == '4') {
                        $("#double2all_region_label_"+ids).html("ZIET 2<span class='reqd'></span>");
                    } else {
                        $("#double2all_region_label_"+ids).html("Region 2<span class='reqd'></span>");
                    }
                }
            });
        }else{
            $('#double2region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivspell1(ids) {
    //console.log('Calling');
        var role_id = $("#spellvenue1_"+ids).val();
        $('#spell1school_div_all_'+ids).css("display", "none");
        $('#spell1school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#spell1region_id_all_'+ids).html(response);
                    $('#spell1region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#spell1all_region_label_"+ids).html("Unit 1<span class='reqd'>*</span>");
                    }
                    else if (role_id == '4') {
                        $("#spell1all_region_label_"+ids).html("ZIET 1<span class='reqd'>*</span>");
                    } else {
                        $("#spell1all_region_label_"+ids).html("Region 1<span class='reqd'>*</span>");
                    }
                }
            });
        }else{
            $('#spell1region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivspell2(ids) {
    //console.log('Calling');
        var role_id = $("#spellvenue2_"+ids).val();
        $('#spell2school_div_all_'+ids).css("display", "none");
        $('#spell2school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#spell2region_id_all_'+ids).html(response);
                    $('#spell2region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#spell2all_region_label_"+ids).html("Unit 2<span class='reqd'></span>");
                    }
                    else if (role_id == '4') {
                        $("#spell2all_region_label_"+ids).html("ZIET 2<span class='reqd'></span>");
                    } else {
                        $("#spell2all_region_label_"+ids).html("Region 2<span class='reqd'></span>");
                    }
                }
            });
        }else{
            $('#spell2region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivspell3(ids) {
    //console.log('Calling');
        var role_id = $("#spellvenue3_"+ids).val();
        $('#spell3school_div_all_'+ids).css("display", "none");
        $('#spell3school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#spell3region_id_all_'+ids).html(response);
                    $('#spell3region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#spell3all_region_label_"+ids).html("Unit 3<span class='reqd'></span>");
                    }
                    else if (role_id == '4') {
                        $("#spell3all_region_label_"+ids).html("ZIET 3<span class='reqd'></span>");
                    } else {
                        $("#spell3all_region_label_"+ids).html("Region 3<span class='reqd'></span>");
                    }
                }
            });
        }else{
            $('#spell3region_div_all_'+ids).css("display", "none");
        }
    }
    function processRegionDivspell4(ids) {
    //console.log('Calling');
        var role_id = $("#spellvenue4_"+ids).val();
        $('#spell4school_div_all_'+ids).css("display", "none");
        $('#spell4school_id_all_'+ids).val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#spell4region_id_all_'+ids).html(response);
                    $('#spell4region_div_all_'+ids).css("display", "block");
                    if (role_id == '2') {
                        $("#spell4all_region_label_"+ids).html("Unit 4<span class='reqd'></span>");
                    }
                    else if (role_id == '4') {
                        $("#spell4all_region_label_"+ids).html("ZIET 4<span class='reqd'></span>");
                    } else {
                        $("#spell4all_region_label_"+ids).html("Region 4<span class='reqd'></span>");
                    }
                }
            });
        }else{
            $('#spell4region_div_all_'+ids).css("display", "none");
        }
    }
    function ProcessSchooldiv(ids) {
        var region_id = $("#region_id_all_"+ids).val();
        var role_id = $("#venue_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#school_div_all_'+ids).css("display", "block");
                        $('#school_id_all_'+ids).html(response);
                    }else{
                        $('#school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivdouble1(ids) {
        var region_id = $("#double1region_id_all_"+ids).val();
        var role_id = $("#doublevenue1_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#double1school_div_all_'+ids).css("display", "block");
                        $('#double1school_id_all_'+ids).html(response);
                    }else{
                        $('#double1school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivdouble2(ids) {
        var region_id = $("#double2region_id_all_"+ids).val();
        var role_id = $("#doublevenue2_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#double2school_div_all_'+ids).css("display", "block");
                        $('#double2school_id_all_'+ids).html(response);
                    }else{
                        $('#double2school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivspell1(ids) {
        var region_id = $("#spell1region_id_all_"+ids).val();
        var role_id = $("#spellvenue1_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#spell1school_div_all_'+ids).css("display", "block");
                        $('#spell1school_id_all_'+ids).html(response);
                    }else{
                        $('#spell1school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivspell2(ids) {
        var region_id = $("#spell2region_id_all_"+ids).val();
        var role_id = $("#spellvenue2_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#spell2school_div_all_'+ids).css("display", "block");
                        $('#spell2school_id_all_'+ids).html(response);
                    }else{
                        $('#spell2school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivspell3(ids) {
        var region_id = $("#spell3region_id_all_"+ids).val();
        var role_id = $("#spellvenue3_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#spell3school_div_all_'+ids).css("display", "block");
                        $('#spell3school_id_all_'+ids).html(response);
                    }else{
                        $('#spell3school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }
    function ProcessSchooldivspell4(ids) {
        var region_id = $("#spell4region_id_all_"+ids).val();
        var role_id = $("#spellvenue4_"+ids).val();
        if (region_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_school',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                type: 'POST',
                success: function (response) {
                    if(role_id=='5'){
                        $('#spell4school_div_all_'+ids).css("display", "block");
                        $('#spell4school_id_all_'+ids).html(response);
                    }else{
                        $('#spell4school_div_all_'+ids).css("display", "none");
                    }
                }
            });
        }
    }

    $(document).ready(function () {
        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();
        var sample_data = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?php echo base_url(); ?>autocomplete/fetch',
            remote: {
                url: '<?php echo base_url(); ?>autocomplete/fetch/%QUERY',
                wildcard: '%QUERY'
            }
        });
        
        //=============================================== TRAINING ====================================================//
        //training block section
        var random_training_more_id = Date.now();
        $('#add_more_training').click(function () {
            random_training_more_id = Date.now();
            RenderTrainingMore(random_training_more_id);
        });
        var taining_details =<?php echo json_encode(isset($TranData) ? $TranData: ''); ?>;
        if (taining_details!='') {
            $.each(taining_details, function (key, training) {
                RenderTrainingMore(training.id, training);
                $("#course_type_" + training.id).val(training.course).trigger("change");
                $("#training_designation_" + training.id).val(training.designationname);
                $("#training_post_id_" + training.id).val(training.designation);
                if(training.cat_id=='1' && (training.designation=='5' || training.designation=='6'))
                {
                    $("#subject_div_training_" + training.id).css("display", "block");
                    $("#training_subject_" + training.id).val(training.subject);
                }
                $("#spell_" + training.id).val(training.spell).trigger("change");
                $("#service_role_" + training.id).val(training.role).trigger("change");
                if(training.spell=='1'){
                    $("#venue_" + training.id).val(training.venuetype1);
                    if (training.venueregion1!='' && training.venueregion1!=0) {
                        $("#region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype1==2){
                            $('#all_region_label_'+training.id).html("Units<span class='reqd'>*</span>");
                        }else if(training.venuetype1==4){
                            $('#all_region_label_'+training.id).html("ZEIT<span class='reqd'>*</span>");
                        }else{
                            $('#all_region_label_'+training.id).html("Region<span class='reqd'>*</span>");
                        }
                        $("#region_id_all_" + training.id).val(training.venueregion1);   
                        if (training.venueschool1!=0 ) { 
                            $("#school_div_all_"+ training.id).css("display", "block");
                            $("#school_id_all_" + training.id).val(training.venueschool1);     
                        }
                    }
                }

                if(training.spell=='2'){
                    $("#doublevenue1_" + training.id).val(training.venuetype1);
                    if (training.venueregion1!='' && training.venueregion1!=0) {
                        $("#double1region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype1==2){
                            $('#double1all_region_label_'+training.id).html("Unit 1<span class='reqd'>*</span>");
                        }else if(training.venuetype1==4){
                            $('#double1all_region_label_'+training.id).html("ZEIT 1<span class='reqd'>*</span>");
                        }else{
                            $('#double1all_region_label_'+training.id).html("Region 1<span class='reqd'>*</span>");
                        }
                        $("#double1region_id_all_" + training.id).val(training.venueregion1);   
                        if (training.venueschool1!=0 ) { 
                            $("#double1school_div_all_"+ training.id).css("display", "block");
                            $("#double1school_id_all_" + training.id).val(training.venueschool1);     
                        }
                    }
                    $("#doublevenue2_" + training.id).val(training.venuetype2);
                    if (training.venueregion2!='' && training.venueregion2!=0) {
                        $("#double2region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype2==2){
                            $('#double2all_region_label_'+training.id).html("Unit 2<span class='reqd'>*</span>");
                        }else if(training.venuetype2==4){
                            $('#double2all_region_label_'+training.id).html("ZEIT 2<span class='reqd'>*</span>");
                        }else{
                            $('#double2all_region_label_'+training.id).html("Region 2<span class='reqd'>*</span>");
                        }
                        $("#double2region_id_all_" + training.id).val(training.venueregion2);   
                        if (training.venueschool2!=0 ) { 
                            $("#double2school_div_all_"+ training.id).css("display", "block");
                            $("#double2school_id_all_" + training.id).val(training.venueschool2);     
                        }
                    }
                }
                if(training.spell=='3'){
                    $("#spellvenue1_" + training.id).val(training.venuetype1);
                    if (training.venueregion1!='' && training.venueregion1!=0) {
                        $("#spell1region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype1==2){
                            $('#spell1all_region_label_'+training.id).html("Unit 1<span class='reqd'>*</span>");
                        }else if(training.venuetype1==4){
                            $('#spell1all_region_label_'+training.id).html("ZEIT 1<span class='reqd'>*</span>");
                        }else{
                            $('#spell1all_region_label_'+training.id).html("Region 1<span class='reqd'>*</span>");
                        }
                        $("#spell1region_id_all_" + training.id).val(training.venueregion1);   
                        if (training.venueschool1!=0 ) { 
                            $("#spell1school_div_all_"+ training.id).css("display", "block");
                            $("#spell1school_id_all_" + training.id).val(training.venueschool1);     
                        }
                    }
                    $("#spellvenue2_" + training.id).val(training.venuetype2);
                    if (training.venueregion2!='' && training.venueregion2!=0) {
                        $("#spell2region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype2==2){
                            $('#spell2all_region_label_'+training.id).html("Unit 2<span class='reqd'>*</span>");
                        }else if(training.venuetype2==4){
                            $('#spell2all_region_label_'+training.id).html("ZEIT 2<span class='reqd'>*</span>");
                        }else{
                            $('#spell2all_region_label_'+training.id).html("Region 2<span class='reqd'>*</span>");
                        }
                        $("#spell2region_id_all_" + training.id).val(training.venueregion2);   
                        if (training.venueschool2!=0 ) { 
                            $("#spell2school_div_all_"+ training.id).css("display", "block");
                            $("#spell2school_id_all_" + training.id).val(training.venueschool2);     
                        }
                    }
                    $("#spellvenue3_" + training.id).val(training.venuetype3);
                    if (training.venueregion3!='' && training.venueregion3!=0) {
                        $("#spell3region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype3==2){
                            $('#spell3all_region_label_'+training.id).html("Unit 3<span class='reqd'>*</span>");
                        }else if(training.venuetype3==4){
                            $('#spell3all_region_label_'+training.id).html("ZEIT 3<span class='reqd'>*</span>");
                        }else{
                            $('#spell3all_region_label_'+training.id).html("Region 3<span class='reqd'>*</span>");
                        }
                        $("#spell3region_id_all_" + training.id).val(training.venueregion3);   
                        if (training.venueschool3!=0 ) { 
                            $("#spell3school_div_all_"+ training.id).css("display", "block");
                            $("#spell3school_id_all_" + training.id).val(training.venueschool3);     
                        }
                    }
                    $("#spellvenue4_" + training.id).val(training.venuetype4);
                    if (training.venueregion4!='' && training.venueregion4!=0) {
                        $("#spell4region_div_all_"+ training.id).css("display", "block");
                        if(training.venuetype4==2){
                            $('#spell3all_region_label_'+training.id).html("Unit 4<span class='reqd'>*</span>");
                        }else if(training.venuetype4==4){
                            $('#spell4all_region_label_'+training.id).html("ZEIT 4<span class='reqd'>*</span>");
                        }else{
                            $('#spell4all_region_label_'+training.id).html("Region 4<span class='reqd'>*</span>");
                        }
                        $("#spell4region_id_all_" + training.id).val(training.venueregion4);   
                        if (training.venueschool4!=0 ) { 
                            $("#spell4school_div_all_"+ training.id).css("display", "block");
                            $("#spell4school_id_all_" + training.id).val(training.venueschool4);     
                        }
                    }
                }

            
            });
        } else {
            training_more = {};
            RenderTrainingMore(random_training_more_id, training_more);
        }
        
        function RenderTrainingMore(random_training_more_id, training_more) {
            var source = $("#training_more_template").html();
            var wexp_count = $(".delete_wexp_training_more").length;
            Mustache.parse(source);
            var rendered = Mustache.render(source, {
                random_exr_id: random_training_more_id,
                training: training_more
            });
            $("#containner_training_more").append(rendered);

            if (wexp_count != 0) {
                $("#training_more_1_" + random_training_more_id).css("display", "block");
            }
            delete_training_more(random_training_more_id);
            $('#training_designation_' + random_training_more_id).typeahead(null, {
                name: 'sample_data',
                display: 'name',
                source: sample_data,
                limit: 10,
                templates: {
                    suggestion: Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
                }
            });

            $('#training_designation_' + random_training_more_id).on('typeahead:selected', function (evt, item) {
                var training_designation = $('#training_designation_' + random_training_more_id).val();
                if (training_designation != '') {
                    $.ajax({
                        url: base_url + 'autocomplete/get_designation',
                        data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + training_designation,
                        type: 'POST',
                        success: function (response) {
                            if (response != false) {
                                $.each(response, function (key, value) {
                                    $('#training_designation_' + random_training_more_id).val(value);
                                    $('#training_post_id_' + random_training_more_id).val(key);
                                     if (key == '5' || key == '6') {
                                        $('#subject_div_training_' + random_training_more_id).css("display", "block");
                                    }
                                    else {
                                        $('#subject_div_training_' + random_training_more_id).css("display", "none");
                                    }
                                });
                            }
                            else {
                                $('#training_designation_' + random_training_more_id).val('');
                                alert('Designation does not exist. Please select correct designation.');
                                $('#subject_div_training_' + random_training_more_id).css("display", "none");
                            }

                        }
                    });
                }
            });
            $('#training_designation_' + random_training_more_id).blur(function () {
                var training_designation = $('#training_designation_' + random_training_more_id).val();
                if (training_designation != '') {
                    $.ajax({
                        url: base_url + 'autocomplete/get_designation',
                        data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + training_designation,
                        type: 'POST',
                        success: function (response) {
                            if (response != false) {
                                $.each(response, function (key, value) {
                                    $('#training_designation_' + random_training_more_id).val(value);
                                    $('#training_post_id_' + random_training_more_id).val(key);
                                     if (key == '5' || key == '6') {
                                        $('#subject_div_training_' + random_training_more_id).css("display", "block");
                                    }
                                    else {
                                        $('#subject_div_training_' + random_training_more_id).css("display", "none");
                                    }
                                });
                            }
                            else {
                                $('#training_designation_' + random_training_more_id).val('');
                                alert('Designation does not exist. Please select correct designation.');
                                $('#subject_div_training_' + random_training_more_id).css("display", "none");
                            }

                        }
                    });
                }
            });
            $("#training_single_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_single_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_single_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_single_fromdate_' + random_training_more_id).val('');
                    } else if (startDate != '' && endDate != '' && duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_single_fromdate_' + random_training_more_id).val('');
                        $('#training_single_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && duration_output < duration) {
                        var final_duration_output = (duration_output + 1);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_single_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_single_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_single_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_single_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_single_fromdate_' + random_training_more_id).val('');
                        $('#training_single_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && duration_output < duration) {
                        var final_duration_output = (duration_output + 1);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_one_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                     if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_one_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');

                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_one_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_two_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                    }
                    if (startDate != '' && endDate1 != '' && startDate <= endDate1) {
                        alert('This start date should be less than previos end date');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_two_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_two_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_three_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                    }
                    if (startDate != '' && endDate2 != '' && startDate <= endDate2) {
                        alert('This start date should be less than previos end date');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_three_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_three_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_four_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                    }
                    if (startDate != '' && endDate3 != '' && startDate <= endDate3) {
                        alert('This start date should be less than previos end date');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_four_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_four_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_four_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_one_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_one_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var date2 = $('#training_two_fromdate_' + random_training_more_id).val();
                    var newsdate2 = date2.split("-").reverse().join("-");
                    var startDate2 = new Date(newsdate2);
                    var edate2 = $('#training_two_todate_' + random_training_more_id).val()
                    var newedate2 = edate2.split("-").reverse().join("-");
                    var endDate2 = new Date(newedate2);
                    var date3 = $('#training_three_fromdate_' + random_training_more_id).val();
                    var newsdate3 = date3.split("-").reverse().join("-");
                    var startDate3 = new Date(newsdate3);
                    var edate3 = $('#training_three_todate_' + random_training_more_id).val()
                    var newedate3 = edate3.split("-").reverse().join("-");
                    var endDate3 = new Date(newedate3);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var dt5 = startDate2;
                    var dt6 = endDate2;
                    var duration_output3 = Math.floor((Date.UTC(dt6.getFullYear(), dt6.getMonth(), dt6.getDate()) - Date.UTC(dt5.getFullYear(), dt5.getMonth(), dt5.getDate())) / (1000 * 60 * 60 * 24));
                    var dt7 = startDate3;
                    var dt8 = endDate3;
                    var duration_output4 = Math.floor((Date.UTC(dt8.getFullYear(), dt8.getMonth(), dt8.getDate()) - Date.UTC(dt7.getFullYear(), dt7.getMonth(), dt7.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = ((duration_output1+1) + (duration_output2+1) + (duration_output3+1) + (duration_output4+1)); 
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_one_fromdate_' + random_training_more_id).val('');
                        $('#training_one_todate_' + random_training_more_id).val('');
                        $('#training_two_fromdate_' + random_training_more_id).val('');
                        $('#training_two_todate_' + random_training_more_id).val('');
                        $('#training_three_fromdate_' + random_training_more_id).val('');
                        $('#training_three_todate_' + random_training_more_id).val('');
                        $('#training_four_fromdate_' + random_training_more_id).val('');
                        $('#training_four_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && startDate2 != '' && endDate2 != '' && startDate3 != '' && endDate3 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_doubleone_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_doubleone_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_doubleone_todate_' + random_training_more_id).val();
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_doubletwo_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_doubletwo_todate_' + random_training_more_id).val();
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = duration_output1 + duration_output2;
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_doubleone_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_doubleone_fromdate_' + random_training_more_id).val('');
                        $('#training_doubleone_todate_' + random_training_more_id).val('');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                        $('#training_doubletwo_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output + 2);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_doubleone_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_doubleone_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_doubleone_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_doubletwo_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_doubletwo_todate_' + random_training_more_id).val();
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = duration_output1 + duration_output2;
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_doubleone_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_doubleone_fromdate_' + random_training_more_id).val('');
                        $('#training_doubleone_todate_' + random_training_more_id).val('');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                        $('#training_doubletwo_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output + 2);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });
            $("#training_doubletwo_fromdate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_doubletwo_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_doubletwo_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_doubleone_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_doubleone_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = duration_output1 + duration_output2;
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                    }
                    if (startDate != '' && endDate1 != '' && startDate <= endDate1) {
                        alert('start date1 should be equal to or less than end date1');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_doubleone_fromdate_' + random_training_more_id).val('');
                        $('#training_doubleone_todate_' + random_training_more_id).val('');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                        $('#training_doubletwo_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output + 2);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }
            });
            $("#training_doubletwo_todate_" + random_training_more_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#training_doubletwo_fromdate_' + random_training_more_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#training_doubletwo_todate_' + random_training_more_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var date1 = $('#training_doubleone_fromdate_' + random_training_more_id).val();
                    var newsdate1 = date1.split("-").reverse().join("-");
                    var startDate1 = new Date(newsdate1);
                    var edate1 = $('#training_doubleone_todate_' + random_training_more_id).val()
                    var newedate1 = edate1.split("-").reverse().join("-");
                    var endDate1 = new Date(newedate1);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output1 = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    var dt3 = startDate1;
                    var dt4 = endDate1;
                    var duration_output2 = Math.floor((Date.UTC(dt4.getFullYear(), dt4.getMonth(), dt4.getDate()) - Date.UTC(dt3.getFullYear(), dt3.getMonth(), dt3.getDate())) / (1000 * 60 * 60 * 24));
                    var total_duration_output = duration_output1 + duration_output2;
                    $('#duration_inservice_'+ random_training_more_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#training_doubletwo_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#training_doubleone_fromdate_' + random_training_more_id).val('');
                        $('#training_doubleone_todate_' + random_training_more_id).val('');
                        $('#training_doubletwo_fromdate_' + random_training_more_id).val('');
                        $('#training_doubletwo_todate_' + random_training_more_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate1 != '' && endDate1 != '' && total_duration_output < duration) {
                        var final_duration_output = (total_duration_output + 2);
                        $('#duration_inservice_'+ random_training_more_id).val(final_duration_output);
                    }
                }

            });


        }
        function delete_training_more(random_exr_id) {

            $("#remove_wexp_training_more" + random_exr_id).click(function () {
                var wexp_count = $(".delete_wexp_training_more").length;
                var wexp_id = $(this).attr("wexpid");
                if (wexp_id) {
                    var confirm = window.confirm('Are you sure want to delete?');
                    if (confirm) {
                        $("#delete_wexp_training_more" + wexp_id).remove();
                        generate("success", "Details deleted successfully");
                        location_reload();
                        if (wexp_count == 1) {
                            equa = {};
                            RenderTrainingMore(random_exr_id, equa);
                        }
                    }
                } else {
                    if (wexp_count > 1) {
                        $("#delete_wexp_training_more" + random_exr_id).remove();
                    }

                }

            });
        }
//=========================================================== WORKSHOP =======================================================//
        var random_workshop_id = Date.now();
        $('#add_more_workshop').click(function () {
            random_workshop_id = Date.now();
            RenderWorkshop(random_workshop_id);
        });
        var othertaining_details =<?php echo json_encode(isset($OtherTranData) ? $OtherTranData: ''); ?>;
        if (othertaining_details!='') {
            $.each(othertaining_details, function (key, workshop) {
                //console.log(workshop);
                RenderWorkshop(workshop.id, workshop);
                $("#agency" + workshop.id).val(workshop.organizing_agency).trigger("change");
                $("#govt_agency" + workshop.id).val(workshop.govt_agency).trigger("change");
                $("#workshop_designation_" + workshop.id).val(workshop.designationname);
                $("#workshop_post_id_" + workshop.id).val(workshop.designation);
                if(workshop.designation=='5' || workshop.designation=='6')
                {
                    
                    $("#subject_div_" + workshop.id).css("display", "block");
                    $("#subject_id_" + workshop.id).val(workshop.subject);
                }else{
                    
                    $("#subject_div_" + workshop.id).css("display", "none");
                    $("#subject_id_" + workshop.id).val('');
                }
               
               
                $("#workshop_role_" + workshop.id).val(workshop.role).trigger("change");
            
            });
        } else {
            workshop_more = {};
            RenderWorkshop(random_workshop_id, workshop_more);
        }
        
        
        function RenderWorkshop(random_workshop_id, workshop_more) {
            var source = $("#workshop_more_template").html();
            var wexp_count = $(".delete_wexp_workshop").length;
            Mustache.parse(source);
            var rendered = Mustache.render(source, {
                random_exr_id: random_workshop_id,
                workshop: workshop_more
            });
            $("#containner_workshop_more").append(rendered);
            
            if (wexp_count != 0) {
                $("#workshop_add_" + random_workshop_id).css("display", "block");
            }
            delete_workshop(random_workshop_id);
            $('#workshop_designation_' + random_workshop_id).typeahead(null, {
                name: 'sample_data',
                display: 'name',
                source: sample_data,
                limit: 10,
                templates: {
                    suggestion: Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
                }
            });

            $('#workshop_designation_' + random_workshop_id).on('typeahead:selected', function (evt, item) {
                var workshop_designation = $('#workshop_designation_' + random_workshop_id).val();
                if (workshop_designation != '') {
                    $.ajax({
                        url: base_url + 'autocomplete/get_designation',
                        data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + workshop_designation,
                        type: 'POST',
                        success: function (response) {
                            if (response != false) {
                                $.each(response, function (key, value) {
                                    $('#workshop_designation_' + random_workshop_id).val(value);
                                    $('#training_post_id_' + random_workshop_id).val(key);
                                   if (key == '5' || key == '6') {
                                        $('#subject_div_' + random_workshop_id).css("display", "block");
                                    }
                                    else {
                                        $('#subject_div_' + random_workshop_id).css("display", "none");
                                    }
                                });
                            }
                            else {
                                $('#workshop_designation_' + random_workshop_id).val('');
                                alert('Designation does not exist. Please select correct designation.');
                                $('#subject_div_' + random_workshop_id).css("display", "none");
                            }

                        }
                    });
                }
            });
            $('#workshop_designation_' + random_workshop_id).blur(function () {
                var workshop_designation = $('#workshop_designation_' + random_workshop_id).val();
                if (workshop_designation != '') {
                    $.ajax({
                        url: base_url + 'autocomplete/get_designation',
                        data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + workshop_designation,
                        type: 'POST',
                        success: function (response) {
                            if (response != false) {
                                $.each(response, function (key, value) {
                                    $('#workshop_designation_' + random_workshop_id).val(value);
                                    $('#workshop_post_id_' + random_workshop_id).val(key);
                                    if (key == '5' || key == '6') {
                                        $('#subject_div_' + random_workshop_id).css("display", "block");
                                    }
                                    else {
                                        $('#subject_div_' + random_workshop_id).css("display", "none");
                                    }
                                });
                            }
                            else {
                                $('#workshop_designation_' + random_workshop_id).val('');
                                alert('Designation does not exist. Please select correct designation.');
                                $('#subject_div_' + random_workshop_id).css("display", "none");
                            }

                        }
                    });
                }
            });
            $("#workshop_from_datepicker" + random_workshop_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#workshop_from_datepicker' + random_workshop_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#workshop_to_datepicker' + random_workshop_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var duration = 31;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    $('#workshop_duration_'+random_workshop_id).val('');
                    if (startDate != '' && endDate != '' && startDate != 'Invalid Date' && endDate != 'Invalid Date' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#workshop_from_datepicker' + random_workshop_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && startDate != 'Invalid Date' && endDate != 'Invalid Date' && duration_output != '') {
                        var final_duration_output = (duration_output + 1);
                        $('#workshop_duration_'+random_workshop_id).val(final_duration_output);
                    }
                }
            });
            $("#workshop_to_datepicker" + random_workshop_id).datepicker({
                maxDate: "0",
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: "-88:+0",
                onSelect: function (selected) {
                    var date = $('#workshop_from_datepicker' + random_workshop_id).val();
                    var newsdate = date.split("-").reverse().join("-");
                    var startDate = new Date(newsdate);
                    var edate = $('#workshop_to_datepicker' + random_workshop_id).val()
                    var newedate = edate.split("-").reverse().join("-");
                    var endDate = new Date(newedate);
                    var duration = 181;
                    var dt1 = startDate;
                    var dt2 = endDate;
                    var duration_output = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
                    $('#workshop_duration_'+random_workshop_id).val('');
                    if (startDate != '' && endDate != '' && startDate > endDate) {
                        alert('start date should be equal to or less than end date');
                        $('#workshop_to_datepicker' + random_workshop_id).val('');
                    }
                     else if (startDate != '' && endDate != '' && duration_output > duration) {
                        alert('training duration should be less than 180 days');
                        $('#workshop_from_datepicker' + random_workshop_id).val('');
                        $('#workshop_to_datepicker' + random_workshop_id).val('');
                    }
                    else if (startDate != '' && endDate != '' && duration_output < duration) {
                        var final_duration_output = (duration_output + 1);
                        $('#workshop_duration_'+random_workshop_id).val(final_duration_output);
                    }
                }

            });


        }

        function delete_workshop(random_exr_id) {

            $("#remove_wexp_workshop" + random_exr_id).click(function () {
                var wexp_count = $(".delete_wexp_workshop").length;
                var wexp_id = $(this).attr("wexpid");
                if (wexp_id) {
                    var confirm = window.confirm('Are you sure want to delete?');
                    if (confirm) {
                        $("#delete_wexp_workshop" + wexp_id).remove();
                        generate("success", "Details deleted successfully");
                        location_reload();
                        if (wexp_count == 1) {
                            equa = {};
                            RenderWorkshop(random_exr_id, equa);
                        }
                    }
                } else {
                    if (wexp_count > 1) {
                        $("#delete_wexp_workshop" + random_exr_id).remove();
                    }

                }

            });
        }

    });
    
    function openagency(ids)
    {
        var text = $("#agency"+ids).val(); 
        if (text == '1')
        {
            $('#govt' + ids).show();
            $('#address' + ids).show();
            $('#nongovt' + ids).hide();
        } else if (text == '2') {
            $('#govt' + ids).hide();
            $('#address' + ids).show();
            $('#nongovt' + ids).show();
            $('#othergovtname'+ids).hide();
        } else {
            $('#govt' + ids).hide();
            $('#address' + ids).hide();
            $('#nongovt' + ids).hide();
        }
    }

    function getdatediv(ids) {
        var text = $("#spell_" + ids).val();
        if (text == '1')
        {
            $('#single_' + ids).show();
            $('#double_' + ids).hide();
            $('#double_' + ids+ ' *').prop('disabled', true);
            $('#12_3_3_3_' + ids).hide();
            $('#12_3_3_3_' + ids+ ' *').prop('disabled', true);
        } else if (text == '2') {
            $('#single_' + ids).hide();
            $('#single_' + ids+ ' *').prop('disabled', true);
            $('#double_' + ids).show();
            $('#12_3_3_3_' + ids).hide();
            $('#12_3_3_3_' + ids+ ' *').prop('disabled', true);
        } 
        else if (text == '3') {
            $('#single_' + ids).hide();
            $('#single_' + ids+ ' *').prop('disabled', true);
            $('#double_' + ids).hide();
            $('#double_' + ids+ ' *').prop('disabled', true);
            $('#12_3_3_3_' + ids).show();
            
        } else {
            $('#single_' + ids).hide();
            $('#single_' + ids+ ' *').prop('disabled', true);
            $('#double_' + ids).hide();
            $('#double_' + ids+ ' *').prop('disabled', true);
            $('#12_3_3_3_' + ids).hide();
            $('#12_3_3_3_' + ids+ ' *').prop('disabled', true);
           
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $( "#servicetraining" ).change(function() {
            var text = $("#servicetraining").val();
            if(text=='2' || text=='')
            {
              $('#containner_training_more').hide(); 
              $('#add_more_training').hide();
            }else{
              $('#containner_training_more').show();
              $('#add_more_training').show();
            }
        });
        
        $( "#othertraining" ).change(function() {
            var text = $("#othertraining").val();
            if(text=='2' || text=='')
            {
              $('#containner_workshop_more').hide(); 
              $('#add_more_workshop').hide();
            }else{
              $('#containner_workshop_more').show();
              $('#add_more_workshop').show();
            }
        });
        
        $( "#is_exemption" ).change(function() {
        var isProf = $("#is_exemption").val();
        if(isProf=="1")
        {
            $('#add_more_exemption').css('display','block'); 
            $('#containner_exemption_more').css('display','block');
        }else{
            $('#add_more_exemption').css('display','none'); 
            $('#containner_exemption_more').css('display','none');
        }
    });
        
    });
    
    function opengrade(ids)
    {
        var text = $("#service_role_"+ids).val();
         if(text=='4'){
          $('#servicegrade_'+ids).show();
          $('#courseconducted'+ids).hide();
        }else if(text=='3'){
          $('#courseconducted'+ids).show();
          $('#servicegrade_'+ids).hide();
        }else{
          $('#courseconducted'+ids).hide();
          $('#servicegrade_'+ids).hide();
        }
    }
    
    function govtothername(ids)
    {
        var text = $("#govt_agency"+ids).val();
         if(text=='Others'){
          $('#othergovtname'+ids).show();
        }else{
          $('#othergovtname'+ids).hide();
        }
    }
    
    function openworkshopgrade(ids)
    {
        var text = $("#workshop_role_"+ids).val();
         if(text=='4'){
          $('#workshopgrade_'+ids).show();
        }else{
          $('#workshopgrade_'+ids).hide();
        }
    }
</script>

<!-- Exemption Script -->
 
<script type="text/javascript">
    //============================= PUBLICATION ADD SECTION START ==============================//
    var random_exemption_more_id = Date.now();
    $('#addmoreexemption').click(function () {
            random_exemption_more_id = Date.now();
            RenderExemptionMore(random_exemption_more_id);
        });
        //exemption_more = {};
        //RenderExemptionMore(random_exemption_more_id, exemption_more);
        
        var ExempDetails =<?php echo json_encode(isset($ExemptionData) ? $ExemptionData: ''); ?>;
        if (ExempDetails && ExempDetails.length>0) {
	        $.each(ExempDetails, function (key, exemption_more) {

	            RenderExemptionMore(exemption_more.id, exemption_more);
	            $("#exemption_course" + exemption_more.id).val(exemption_more.course).trigger("change");
	            $("#exemption_ground" + exemption_more.id).val(exemption_more.ground).trigger("change");
	            
	        });
	    } else {
	        exemption_more = {};
	        RenderExemptionMore(random_exemption_more_id, exemption_more);
	        $("#"+random_exemption_more_id).css("display","none");
	    }
      //===============================================================================================//  
        function RenderExemptionMore(random_exemption_more_id, exemption_more) {
            var source = $("#exemption_more_template").html();
            var wexp_count = $(".delete_wexp_exemption_more").length;
            Mustache.parse(source);
            var rendered = Mustache.render(source, {
                random_exr_id: random_exemption_more_id,
                Ex_exemption: exemption_more,
            });
        $("#containner_exemption_more").append(rendered);
        if (wexp_count != 0) {
            $("#exemption_more_1_"+random_exemption_more_id).css("display","block");
        }
        delete_exemption_more(random_exemption_more_id);
        
        
    }

    function delete_exemption_more(random_exr_id) {
    
        $("#remove_wexp_exemption_more" + random_exr_id).click(function () {
            var wexp_count = $(".delete_wexp_exemption_more").length;
            var wexp_id = $(this).attr("wexpid");
            if (wexp_id) {
                var confirm = window.confirm('Are you sure want to delete?');
                if (confirm) {
                    $("#delete_wexp_exemption_more" + wexp_id).remove();
                    generate("success", "Details deleted successfully");
                    location_reload();
                    if (wexp_count == 1) {
                        equa = {};
                        RenderExemptionMore(random_exr_id, equa);
                    }
                }
            } else {
                if (wexp_count > 1) {
                    $("#delete_wexp_exemption_more" + random_exr_id).remove();
                }

            }
        });
    }
    //============================== PUBLICATION ADD SECTION END ==============================//

</script> 
