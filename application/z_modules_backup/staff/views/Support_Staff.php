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
            <?php 
            //print_r($PerData);
            if(empty($EmpCode)) 
                echo '<i class="fa fa-user-plus"></i>&nbsp;Add / Edit Support Staff'; 
            else 
                echo '<i class="fa fa-user"></i>&nbsp;Staff Code - '.$EmpCode;  ?>
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
        <!-- ===================================== Form Starts From Here ====================================== -->    
        <?php echo form_open_multipart("",array("id" =>"formID", "class" =>"staff", "autocomplete" =>"off"));?>

        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($EmpCode) ? $EmpCode : ''; ?>">
        <h6><strong>Personal Details - </strong></h6>
        <hr>
        <div class=" background_div">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_title", array("" => "Select Title") + title_type(), isset($StfData->staff_title) ? set_value('emp_title', $StfData->staff_title) : set_value('emp_title'),' id="emp_title" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Full Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_name", isset($StfData->staff_name) ? set_value('emp_name', $StfData->staff_name) : set_value('emp_name'), 'placeholder="First Name" id="emp_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_name'); ?></span>
                </div>
            </div>
           <div class="form-group col-md-6">
                <div class="row">
                    <div class="col-sm-2">
                        <?php 
                        if(isset($StfData->staff_photo)){
                            echo '<img class="ProImg" src="'.base_url().'img/ProImage/'.$StfData->staff_photo.'" width="100">';
                        }else{
                            echo '<img class="ProImg" src="'.base_url().'img/ProImage/img-icon.png" width="100">';
                        }
                        ?>
                    </div>
                    <div class="col-sm-10">
                        <label for="" class="col-sm-12 col-form-label">
                    Photo:<span class="reqd">*</span>
                    <span style="font-size: 12px; color: #f36d1b; font-family: inherit;">[ Allowed : png, jpg, jpeg & Max. size 2MB ]</span>
                </label>
                <div class="col-sm-12">
                        <?php 
                        if(isset($StfData->staff_photo)){
                            echo '<input type="file" name="emp_photo" id="emp_photo" class="form-control" autocomplete="off">';
                        }else{
                            echo '<input type="file" name="emp_photo" id="emp_photo" class="form-control validate[required]" autocomplete="off">';
                        }
                        ?>
                    
                    <input type="hidden" name="emp_photo_avl" id="emp_photo_avl" value="<?php echo isset($StfData->staff_photo) ? $StfData->staff_photo : ''; ?>" autocomplete="off">
                    <span class="error"><?php echo form_error('emp_photo'); ?></span>
                    <span class="error" id="valid_image"></span>
                </div>
                    </div>
                </div>
                
            </div>
           
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Gender:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_gender", array("" => "Select Gender") + gender(), isset($StfData->staff_gender) ? set_value('emp_gender', $StfData->staff_gender) : set_value('emp_gender'), 'class="form-control validate[required]"  id="emp_gender" onchange="processMaidenName()" autocomplete="off"');  ?>
                    <span class="error"><?php echo form_error('emp_gender'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Date of Birth:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_dob", isset($StfData->staff_dob) ? set_value('emp_dob', date('d-m-Y', strtotime($StfData->staff_dob))) : set_value('emp_dob'), 'placeholder="dd-mm-yyyy"  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('emp_dob'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Marital Status:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_marital_status", array("" => "Select Marital Status") + marital_status(), isset($StfData->staff_marital_status) ? set_value('emp_marital_status', $StfData->staff_marital_status) : set_value('emp_marital_status'), 'class="form-control validate[required]" id="emp_marital_status"  autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_marital_status'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Email-Id:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_email", isset($StfData->staff_email) ? set_value('emp_email', $StfData->staff_email) : set_value('emp_email'), 'placeholder="Email-Id" id="emp_email" class="validate[required,custom[email]] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_email'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Mobile No.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_mobile", isset($StfData->staff_mobile) ? set_value('emp_mobile', $StfData->staff_mobile) : set_value('emp_mobile'), 'id="emp_mobile" placeholder="Mobile No." maxlength="10" minlength="10" class="numericOnly validate[required,custom[number],minSize[10],maxSize[10]] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_mobile'); ?></span>
                </div>
            </div>
           
            
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Blood Group:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_blood_group", array("" => "Select Blood Group") + blood_group(), isset($StfData->staff_blood_group) ? set_value('emp_blood_group', $StfData->staff_blood_group) : set_value('emp_blood_group'), ' id="emp_blood_group" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_blood_group'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Higher Educational qualification:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_qualification", isset($StfData->staff_qualification) ? set_value('emp_qualification', $StfData->staff_qualification) : set_value('emp_qualification'), 'placeholder="Qualification"  id="emp_qualification" class="validate[required] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_qualification'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Mailing Address:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <textarea placeholder="Mailing Address" class="form-control validate[required]" name="emp_resaddress" id="emp_resaddress" autocomplete="nope" autocomplete="no" autocomplete="off">
                        <?php echo isset($StfData->staff_post_addrs) ?  $StfData->staff_post_addrs : '';?>
                    </textarea>
                    <span class="error"><?php echo form_error('emp_address'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Pincode:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_pincode", isset($StfData->staff_pincode) ? set_value('emp_pincode', $StfData->staff_pincode) : set_value('emp_pincode'), 'placeholder="Pincode" maxlength="6" minlength="6" id="emp_pincode" class="numericOnly validate[required,maxSize[6]] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_pincode'); ?></span>
                </div>
            </div>
        </div>  
</div>
<!--================================ PRESENT SERVICE DETAILS STARTS =================================-->
<h6><strong  class="font_size_dynamic">Present Post Details - </strong></h6>
        <div class="background_div">
            <div class="row">
                <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Employment Type:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("employment_type", array("" => "Select") + employment_type(), isset($StfData->staff_type) ? set_value('employment_type', $StfData->staff_type) : set_value('employment_type'), ' id="employment_type" class="form-control validate[required]" autocomplete="off" onchange="showDesig(this.value)"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                
                <div class="form-group col-md-4" id="contractual_desig" style="display: none;">
                <label for="" class="col-sm-12col-form-label"> Designation:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("present_designation", isset($StfData->designationname) ? set_value('present_designation', $StfData->designationname) : set_value('present_designation'), 'placeholder=" Designation" id="present_post_designation"  class="form-control validate[required] typeahead" autocomplete="off" '); ?>
                    <input type="hidden" value="<?php echo $StfData->staff_designation; ?>" name="present_designationid" id="present_post_id" autocomplete="off">
                    <span class="error"><?php echo form_error('present_designation'); ?></span>
                    <span class="col-sm-6 error" id="desg_valid"></span>
                </div>
                </div>
                
                <div class="form-group col-md-4" id="contractual_sub" style="display: none;">
                    <div <?php if(empty($StfData->staff_subject)) echo 'style="display:none;"';  ?>  id="subject_div_present">
                        <label for="" class="col-sm-12 col-form-label"> Subject    <span class="reqd"></span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("present_subject", array("" => "Select") + subject_lists(), isset($StfData->staff_subject) ? set_value('present_subject', $StfData->staff_subject) : set_value('present_subject'), 'id="subject_id_present" data-id="c" class="form-control validate[required]" autocomplete="off" '); ?>
                            <span class="error"><?php echo form_error('present_subject_id'); ?></span> 
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-md-4" id="coach" style="display: none;">
                    <label for="" class="col-sm-12 col-form-label"> Subject    <span class="reqd">* </span></label>
                    <input type="hidden" value="<?php echo ($StfData->staff_designation)?$StfData->staff_designation:'99'; ?>" name="present_designationid_2" id="present_post_id_2" autocomplete="off">
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_subject_2", array("" => "Select") + coach_subject_lists(), isset($StfData->staff_subject) ? set_value('present_subject_2', $StfData->staff_subject) : set_value('present_subject_2'), 'id="subject_id_present_2" data-id="c" class="form-control validate[required]" autocomplete="off" '); ?>
                        <span class="col-sm-6 error" id="sub_valid"></span> 
                    </div>
                </div>
                
            </div>
            <!--==================================== Present Place Details ========================================-->
            <div class="row"> 
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Place of Posting  <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_role_id", array("" => "Select") + role_lists(), isset($StfData->staff_role) ? set_value('present_role_id', $StfData->staff_role) : set_value('present_role_id', $CurData->role_id), 'id="role_id_present" data-id="c" onchange="processRegionPresentDiv();" class="form-control validate[required]" readonly autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_role_id'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" id="region_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label" id="present_region_label">Regions<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_region_id", array("" => "Select") + region_lists(), isset($StfData->staff_region) ? set_value('present_region_id', $StfData->staff_region) : set_value('present_region_id', $CurData->region_id), 'class="form-control validate[required]" onchange="processSchoolPresentDiv();"  id="c_region_present" data-id="c" readonly autocomplete="off"');    ?>
                        <span class="error"><?php echo form_error('present_region_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="school_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Schools<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_school_id", array("" => "Select") + school_lists(), isset($StfData->staff_school) ? set_value('present_school_id', $StfData->staff_school) : set_value('present_school_id', $CurData->school_id), 'class="form-control validate[required]"  id="c_school_present" data-id="c" onchange="presentschcode()" readonly autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_school_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="section_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Section<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_section_id", array("" => "Select") + section_lists(), isset($StfData->staff_section) ? set_value('present_section_id', $StfData->staff_section) : set_value('present_section_id', $CurData->role_category), 'class="form-control validate[required]"  id="c_section_present" data-id="c" readonly autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_section_id'); ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4" id="kvcode_div_present" >
                    <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_kvcode", isset($StfData->staff_kvcode) ? set_value('present_kvcode', $StfData->staff_kvcode) : set_value('present_kvcode',$CurData->CCODE), 'readonly id="kvcode_present" class=" validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_kvcode'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="shift_div_present" style="display:none;" >
                    <label for="" class="col-sm-12 col-form-label">Shift<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_shift", array("" => "Select Shift") + shift(), isset($StfData->staff_shift) ? set_value('present_shift', $StfData->staff_shift) : set_value('present_shift',1), 'id="shift_present" class="form-control" autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_shift'); ?></span> 
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Zone<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_zone", array("" => "Select Zone") + zone(), isset($StfData->staff_zone) ? set_value('present_zone', $StfData->staff_zone) : set_value('present_zone'), 'readonly id="present_zone" class="form-control validate[required] " autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_zone'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Date of Joining:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_joiningdate", isset($StfData->staff_period_from) ? set_value('present_joiningdate', $StfData->staff_period_from) : set_value('present_joiningdate'), 'placeholder="dd-mm-yyyy"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_joiningdate'); ?></span>
                    </div>
                </div>
            </div>
        </div>
<!--================================ PRESENT SERVICE DETAILS END =================================-->
        <div class="col-sm-12">
            <div  style="float:right;"> 
                <input class="btn btn-primary" type="reset" value="Reset">
                <div class="btn btn-primary" id="perSaveBtn" onclick="chkVacancy();">Save Data</div>
            </div>
        </div>

        <div class="text-right rg-footer"></div>
        <?php echo form_close(); ?>
    </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
       // $('#perSaveBtn').attr("disabled", false);
    });
     function showDesig(EmpType){
       if(EmpType==1){
            $('#contractual_desig').css("display","block");
            $('#contractual_sub').css("display","block");
            $('#coach').css("display","none"); 
       }else{
            $('#contractual_desig').css("display","none");
            $('#contractual_sub').css("display","none");
            $('#coach').css("display","block"); 
       }
    }
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
    
    $('#present_post_designation').typeahead(null, {
        name: 'sample_data',
        display: 'name',
        source: sample_data,
        limit: 10,
        templates: {
            suggestion: Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
        }
    });
    $('#present_post_designation').on('typeahead:selected', function (evt, item) {
        var present_post_designation = $("#present_post_designation").val();
        if (present_post_designation != '') {
            processPresentDesignationAjaxCall(present_post_designation);
        }
    });
    $("#present_post_designation").blur(function () {
        var present_post_designation = $("#present_post_designation").val();
        if (present_post_designation != '') {
            processPresentDesignationAjaxCall(present_post_designation);
        }
    });
    function processPresentDesignationAjaxCall(present_post_designation) {
        $.ajax({
            url: base_url + 'autocomplete/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + present_post_designation,
            type: 'POST',
            success: function (response) {
                    if(response != false) {
                        $.each(response, function (key, value) {
                            $("#present_post_designation").val(value);
                            $("#present_post_id").val(key);
                            if (key == '5' || key == '6' || key == '7' || key == '8') {
                                $("#subject_div_present").css("display", "block");
                            }else {
                                $("#subject_div_present").css("display", "none");
                            }
                        });
                    }else {
                    $("#present_post_designation").val('');
                        alert('Designation is not exist. Please select correct designation.');
                    $("#subject_div_present").css("display", "none");
                }
            }
        });
    }
    
    function processRegionPresentDiv() {
        var role_id = $("#role_id_present").val();
        $('#school_div_present').css("display", "none");
        $('#c_school_present').val('');
        $('#section_div_present').css("display", "none");
        $('#c_section_present').val('');
        $("#shift_div_present").css("display", "none");
        $('#shift_present').val('');
        $('#kvcode_present').val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#c_region_present').html(response);
                    $('#region_div_present').css("display", "block");
                    if (role_id == '2') {
                        $("#present_region_label").html("Units<span class='reqd'>*</span>");
                        $("#present_zone").val('');
                    }
                    else if (role_id == '4') {
                        $("#present_region_label").html("ZIET<span class='reqd'>*</span>");
                        $("#present_zone").val('');
                    } else {
                        $("#present_region_label").html("Regions<span class='reqd'>*</span>");
                        $("#present_zone").val('');
                    }
                }
            });
        }else{
            $('#region_div_present').css("display", "none");
        }
       
    }
    
    function processSchoolPresentDiv() {
        var region_id = $("#c_region_present").val();
        var role_id = $("#role_id_present").val();
        if (region_id != '') {
            if(role_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                    console.log(response);
                        $('#school_div_present').css("display", "block");
                        $('#section_div_present').css("display", "none");
                        $('#c_school_present').html(response);
                    }
                });
            }else if(role_id=='2' && region_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_section',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#kvcode_present').val('1917');
                        $('#present_zone').val('12');
                        $('#section_div_present').css("display", "block");
                        $('#school_div_present').css("display", "none");
                        $('#c_section_present').html(response);
                    }
                });
            }else if(role_id=='2'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        $('#kvcode_present').val(result[0].trim());
                        $('#present_zone').val(result[1]);
                        $('#school_div_present').css("display", "none");
                        $('#section_div_present').css("display", "none");
                        
                        
                    }
                });
            }else if(role_id=='3'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        $('#kvcode_present').val(result[0].trim());
                        $('#present_zone').val(result[1]);
                        $('#school_div_present').css("display", "none");
                        $('#section_div_present').css("display", "none");
                    }
                });
            }else if(role_id=='4'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        $('#kvcode_present').val(result[0].trim());
                        $('#present_zone').val(result[1]);
                        $('#school_div_present').css("display", "none");
                        $('#section_div_present').css("display", "none");
                    }
                });
            }else{
                $('#school_div_present').css("display", "none");
                $('#section_div_present').css("display", "none");
            }
            
        }
    }
    
    function presentschcode() {
        var school_id_present = $('#c_school_present').val();
        if (school_id_present != '') {
            $.ajax({
                url: base_url + 'admin/users/get_schoolcode',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&s_id=' + school_id_present,
                type: 'POST',
                success: function (response) {
                    var result = response.split('#');
                    $('#kvcode_present').val(result[0].trim());
                    $('#present_zone').val(result[1].trim());
                    $("#shift_div_present").css("display", "block");
                    $("#kvcode_div_present").css("display", "block");
                }
            });
        }

    }
  
    /* ====================================== PRESENT SERVICE ==================================*/
    // To Set Present post Details
    var id='<?php echo sizeof($StfData); ?>';
    if(id){
        $("#role_id_present").val("<?php echo $StfData->staff_role;?>");
        var prole_id = '<?php echo $StfData->staff_role;?>' ;
        var punit = '<?php echo $StfData->staff_region;?>';
        if(punit!=0)
        {
            $("#region_div_present").css("display", "block");
            $("#c_region_present").val("<?php echo $StfData->staff_region;?>");
            if (prole_id == '2') {
                $("#present_region_label").html("Units<span class='reqd'>*</span>");
            }
            else if (prole_id == '4') {
                $("#present_region_label").html("ZIET<span class='reqd'>*</span>");
            } else {
                $("#present_region_label").html("Regions<span class='reqd'>*</span>");
            }
            var psection= '<?php echo $StfData->staff_section;?>';
            if(psection!=0)
            {
                $("#section_div_present").css("display", "block");
                $("#c_section_present").val("<?php echo $StfData->staff_section;?>");
            }
            var pschool= '<?php echo $StfData->staff_school;?>';
            if(pschool!=0)
            {
                $("#school_div_present").css("display", "block");
                $("#c_school_present").val("<?php echo $StfData->staff_school;?>").trigger("change");
            }
            var empTyp= '<?php echo $StfData->staff_type;?>';
            if((empTyp)&&empTyp==1)
            {
                $('#contractual_desig').css("display","block");
                $('#contractual_sub').css("display","block");
                $('#coach').css("display","none"); 
                $("#employment_type").val("<?php echo $StfData->staff_type;?>").trigger("change");
            }
            if((empTyp)&&empTyp==2)
            {
                $('#contractual_desig').css("display","none");
                $('#contractual_sub').css("display","none");
                $('#coach').css("display","block"); 
                $("#employment_type").val("<?php echo $StfData->staff_type;?>").trigger("change");
            }
        }
    }
    /* ====================================== CURRENT SERVICE 25/11==================================*/
    // To Set Creent post Details
    <?php if((!$StfData) && !empty($CurData)){ ?>
   
        $("#role_id_present").val("<?php echo $CurData->role_id;?>");
        var prole_id = '<?php echo $CurData->role_id;?>' ;
        var punit = '<?php echo $CurData->region_id;?>';
       
        if(punit!=0)
        {
            $("#region_div_present").css("display", "block");
            $("#c_region_present").val("<?php echo $CurData->region_id;?>");

            if (prole_id == '2') {
                $("#present_region_label").html("Units<span class='reqd'>*</span>");
                var psection= '<?php echo $CurData->role_category;?>';
                if(psection!=0)
                {
                    $("#section_div_present").css("display", "block");
                    $("#c_section_present").val("<?php echo $CurData->role_category;?>");
                    
                }
            }
            else if (prole_id == '4') {
                $("#present_region_label").html("ZIET<span class='reqd'>*</span>");
            } else {
                $("#present_region_label").html("Regions<span class='reqd'>*</span>");
            }
            
            var pschool= '<?php echo $CurData->school_id;?>';
            if(pschool!=0)
            {
                $("#school_div_present").css("display", "block");
                $("#c_school_present").val("<?php echo $CurData->school_id;?>").trigger("change");
                //alert('school');
            }
            if(prole_id!=5){ 
                $("#c_region_present").trigger("change");
                var Ccat= '<?php echo $CurData->role_category;?>';
                if(Ccat){
                    setTimeout( function(){ 
                    $("#c_section_present").val("<?php echo $CurData->role_category;?>");
                    $("#c_section_present").trigger("change");
                    }  , 1000 );
                }
            }
        }
        
        
   <?php } ?>

</script>

<script>
	
    function chkVacancy(){
        var emp_typ=$("#employment_type").val();
        if(!(emp_typ) || emp_typ==''){
            alertify.error("Please Select Employement Type");
            return false;
        }
        if(emp_typ==1){ //Contractual
            var EmpId=$('#emp_id').val();
            $('#desg_valid').html();
            var DesigId = $('#present_post_id').val();
            if(!DesigId){ $('#desg_valid').html('Select Present Designation'); $('#present_post_id').focus();return false;}
            var SubId   = $('#subject_id_present').val();
            var KvCode  = $('#kvcode_present').val();
            if(!SubId){ SubId=0; }
            $.ajax({
                url: base_url + 'employee/employee/ChkVacAvail',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' + EmpId+ '&KvCode=' + KvCode+ '&DesigId=' +DesigId+ '&SubId=' +SubId,
                type: 'POST',
                success: function (resp) {
                    //console.log(resp);
                    if(resp>0){
                           $('#formID').submit();
                    }else{
                        alertify.error("Sorry! There is no vacancy for the present post");
                        return false;
                    }
                }
            });
        }
        if(emp_typ==2){ //Coaches
           // var DesigId = $('#present_post_id_2').val();
           // var SubId = $('#subject_id_present_2').val();
          //  if(!SubId || SubId==''){ $('#sub_valid').html('Select Subject'); $('#subject_id_present_2').focus();return false;}
            $('#formID').submit();
        }
    }
	
   //================================ SHOW DESIGNATION DIV ===============================//
  
</script>
