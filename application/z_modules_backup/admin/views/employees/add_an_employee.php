<style>
    .typeahead{
        width:218px!important;
    }
    .reqd{
        letter-spacing: 1px!important;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/modernizr.js"></script> <!-- Modernizr -->
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header register-header">ADD NEW / EXISTING EMPLOYEE</div>
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
        <!-- ================================= CREATE USER START =====================================-->
        <?php echo form_open("", array("id" => "eform", "class" => "register", "autocomplete" => "off")); ?>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($users->id) ? $users->id : ''; ?>">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Employee Code:<span class="reqd">#</span></label>
                <div class="col-sm-12">
                    <input type="text" name="username" value="<?php echo isset($users->username) ? set_value('username', $users->username) : set_value('username'); ?>" id="username" maxlength="6" class="form-control numericOnly" placeholder="Employee Code" autocomplete="off" onchange="CheckUnique();">
                    <span class="error" id="unerror"><?php echo form_error('username'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_title", array("" => "Select Title") + title_type(), isset($PerData->emp_title) ? set_value('emp_title', $PerData->emp_title) : set_value('emp_title'),' id="emp_title" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error" id="ttlerror"><?php echo form_error('emp_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Employee Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_name", isset($PerData->emp_name) ? set_value('emp_name', $PerData->emp_name) : set_value('emp_name'), 'placeholder="First Name" id="emp_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error" id="nameerror"><?php echo form_error('emp_name'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Employee DOB:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_dob", isset($PerData->emp_dob) ? set_value('emp_dob', date('d-m-Y', strtotime($PerData->emp_dob))) : set_value('emp_dob'), 'placeholder="dd-mm-yyyy"  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error" id="doberror"><?php echo form_error('emp_dob'); ?></span>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-md-3" >
                <label for="" class="col-sm-12 col-form-label">   Place of Posting  <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_role_id", array("" => "Select") + role_lists(), '', 'id="role_id_initial" data-id="c" onchange="processRegionInitialDiv();" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('initial_role_id'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-3" id="region_div_initial" style="display:none;">
                <label for="" class="col-sm-12 col-form-label" id="initial_region_label">Regions<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_region_id", array("" => "Select") + region_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();" class="form-control validate[required]" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="school_div_initial" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Schools<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_school_id", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="initialschcode()" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="section_div_initial" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Section<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_section_id", array("" => "Select") + section_lists(), '', 'class="form-control validate[required]"  id="c_section_initial" data-id="c" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('initial_section_id'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="kvcode_div_initial" style="display:none;" >
                <label for="" class="col-sm-12 col-form-label">HQ/RO/ZT/KV Code:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("initial_kvcode", isset($initialpost->initial_kvcode) ? set_value('initial_kvcode', $initialpost->initial_kvcode) : set_value('initial_kvcode'), 'readonly id="kvcode_initial" class=" validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('initial_kvcode'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="shift_div_initial" style="display:none;"  >
                <label for="" class="col-sm-12 col-form-label">Shift<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_shift", array("" => "Select Shift") + shift(), isset($initialpost->initial_shift) ? set_value('initial_shift', $initialpost->initial_shift) : set_value('initial_shift'), 'readonly id="initial_shift" class="form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('initial_shift'); ?></span> 
                </div>
            </div>
        </div>
        <div class="row">
                
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label"> Designation:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("present_designation", isset($PrePost->designationname) ? set_value('present_designation', $PrePost->designationname) : set_value('present_designation'), 'placeholder=" Designation" id="present_post_designation"  class="form-control validate[required] typeahead" autocomplete="off"'); ?>
                    <input type="hidden" value="<?php echo $PrePost->present_designationid; ?>" name="present_designationid" id="present_designationid" autocomplete="off">
                    <span class="error"><?php echo form_error('present_designation'); ?></span>
                    <span class="col-sm-12 error" id="desg_valid"></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="subject_div_present" <?php if($PrePost->present_designationid==5 || $PrePost->present_designationid==6){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>
                <label for="" class="col-sm-12 col-form-label">Subject<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("present_subject", array("" => "Select") + subject_lists(), isset($PrePost->present_subject) ? set_value('present_subject', $PrePost->present_subject) : set_value('present_subject'), 'id="subject_id_present" data-id="c" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('present_subject'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Employment Status:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("present_status", array("" => "Select") + emp_status(), isset($PrePost->present_status) ? set_value('present_status', $PrePost->present_status) : set_value('present_status',''), 'id="present_status" class="form-control validate[required]" autocomplete="off" onchange="ClearStsDate();"'); ?>
                    <span class="error" id="status_valid"><?php echo form_error('present_status'); ?></span> 
                </div>
            </div>
            <div class="form-group col-md-3" >
                <label for="" class="col-sm-12 col-form-label">Employee Joining Date:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php 
                    if(empty($PrePost->present_status_date) && $PrePost->present_status==1){$StsDT=$PrePost->present_joiningdate;}else{$StsDT='';}
                    echo form_input("present_status_date", isset($PrePost->present_status_date) ? set_value('present_status_date', $PrePost->present_status_date) : set_value('present_status_date',$StsDT), 'id="present_status_date" placeholder="dd-mm-yyyy"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('present_status_date'); ?></span>
                </div>
            </div>
        </div>
        <div class="modal-footer rg-footer">
            <div class="col-md-8 text-left">
                <label class="col-sm-12 col-form-label" style="padding-left:0px!important;"><span class="reqd">* &nbsp;Leave the [ </span> Employee Code:<span class="reqd"># ] field blank for generating a new Employee code by the system.</span></label>
            </div>
            <div class="col-md-4 text-right">
                <input type="reset" value="Cancel" class="btn btn-default">
                <div class="btn btn-primary" onclick="CheckVacancy();">Add Employee</div> 
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script src="<?php echo base_url() ?>js/forms/add_user.js"></script>  
<script>
        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();
        //====================================================================//
        var sample_data = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?php echo base_url(); ?>autocomplete/fetch_pre',
            remote: {
                url: '<?php echo base_url(); ?>autocomplete/fetch_pre/%QUERY',
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
                url: base_url + 'autocomplete/get_pre_designation',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + present_post_designation,
                type: 'POST',
                success: function (response) {
                        if(response != false) {
                            $.each(response, function (key, value) {
                                $("#present_post_designation").val(value);
                                $("#present_designationid").val(key);
                                if (key == '5' || key == '6') {
                                    $("#subject_div_present").css("display", "block");
                                }else {
                                    $("#subject_id_present").val(" ").trigger("change");
                                    $("#subject_div_present").css("display", "none");
                                }
                            });
                        }else {
                        $("#present_post_designation").val('');
                            alertify.error('Sorry!!!  Designation Not Exist. Select Correct Designation');
                        $("#subject_id_present").val(" ").trigger("change");
                        $("#subject_div_present").css("display", "none");
                    }
                }
            });
        }
        //================================ Check Unique for New Registration =========================================//
       
        function CheckUnique(){
            $('#unerror').html('');
            
            var Uid=$('#user_id').val();
            var Uname=$('#username').val();
            if((Uname)&& (Uname.length<4 || Uname.length>6)){
                $('#unerror').html('Username length should be 4 - 6 digits.');
                return false;
            }
            $.ajax({
                url: base_url + 'admin/users/cheque_unique_username',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&username=' + Uname+ '&user_id=' + Uid,
                type: 'GET',
                success: function (resp) {
                    //console.log(resp);
                    if(resp=='true'){
                        $('#unerror').html('');
                        $('#eform').submit();
                    }else{
                        $('#unerror').html('Username Already Registered');
                        return false;
                    }
                }
            });
        }
        //=============================== Check Vacancy for New Registration ======================================//
        function CheckVacancy(){
        var EmpId=$('#user_id').val();
        if(!$('#eform').valid()){return false;}
        //CheckUnique();
        $('#desg_valid').html();
        var DesigId = $('#present_designationid').val();
        if(!DesigId){ $('#desg_valid').html('Select Present Designation'); $('#present_designationid').focus();return false;}
        var SubId   = $('#subject_id_present').val();
        var KvCode  = $('#kvcode_initial').val();
        var StsId = $('#present_status').val();
        if(!StsId){ $('#status_valid').html('Select Employment Status'); $('#present_status').focus();return false;}
        var PreStsDate=$('#present_status_date').val();
        if(!PreStsDate){ alertify.error('Effective date of Employment Status Required'); $('#present_status_date').focus();return false;}
            if(!SubId){ SubId=0; }
            $.ajax({
                url: base_url + 'admin/Employees/ChkVacAvail',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' + EmpId+ '&KvCode=' + KvCode+ '&DesigId=' +DesigId+ '&SubId=' +SubId+ '&StsId=' +StsId,
                type: 'POST',
                success: function (resp) {
                    console.log(resp);
                    if(resp>0){
                           $('#eform').submit();
                    }else{
                        alertify.error("Sorry! There is no vacancy for the present post");
                        return false;
                    }
                }
            });
        }
        function ClearStsDate(){
            $('#status_valid').html("<?php echo form_error('present_status');?>");
        }
</script>   
<script>
        function processRegionInitialDiv() {
        var role_id = $("#role_id_initial").val();
        $('#school_div_initial').css("display", "none");
        $('#c_school_initial').val('');
        $('#section_div_initial').css("display", "none");
        $('#c_section_initial').val('');
        $("#shift_div_initial").css("display", "none");
        $('#initial_shift').val('');
        $('#kvcode_initial').val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#c_region_initial').html(response);
                    $('#region_div_initial').css("display", "block");
                    if (role_id == '2') {
                        $("#initial_region_label").html("Units<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }else if (role_id == '4') {
                        $("#initial_region_label").html("ZIET<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    } else {
                        $("#initial_region_label").html("Regions<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }
                }
            });
        }else{
            $('#region_div_initial').css("display", "none");
        }
       
    }
    
    function processSchoolInitialDiv() {
        var region_id = $("#c_region_initial").val();
        var role_id = $("#role_id_initial").val();
        $("#specialdriveval").val('');
        $("#initial_zone").val('');
        if (region_id != '') {
            
            if(role_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#school_div_initial').css("display", "block");
                        $('#section_div_initial').css("display", "none");
                        $('#c_school_initial').html(response);
                        
                    }
                });
            }else if(role_id=='2' && region_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_section',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#kvcode_initial').val('1917');
                        $("#kvcode_div_initial").css("display", "block");
                        $('#initial_zone').val('12');
                        $('#section_div_initial').css("display", "block");
                        $('#school_div_initial').css("display", "none");
                        $('#c_section_initial').html(response);
                    }
                });
            }else if(role_id=='2'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        $('#kvcode_initial').val(result[0].trim());
                        $("#kvcode_div_initial").css("display", "block");
                        $('#initial_zone').val(result[1]);
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        
                        
                    }
                });
            }else if(role_id=='3'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        console.log(result[1]);
                        $('#kvcode_initial').val(result[0].trim());
                        $("#kvcode_div_initial").css("display", "block");
                        $('#initial_zone').val(result[1]);
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        
                        
                    }
                });
            }else if(role_id=='4'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        console.log(result[1]);
                        $('#kvcode_initial').val(result[0].trim());
                        $("#kvcode_div_initial").css("display", "block");
                        $('#initial_zone').val(result[1]);
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        
                        
                    }
                });
            }else{
                $('#school_div_initial').css("display", "none");
                $('#section_div_initial').css("display", "none");
            }
            
        }
    }
    
    function initialschcode() {
        var school_id_initial = $('#c_school_initial').val();
        if (school_id_initial != '') {
            $.ajax({
                url: base_url + 'admin/users/get_schoolcode',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&s_id=' + school_id_initial,
                type: 'POST',
                success: function (response) {
                    var result=response.split('#'); 
                    $('#kvcode_initial').val(result[0].trim());
                    $("#shift_div_initial").css("display", "block");
                    $("#kvcode_div_initial").css("display", "block");
                    $('#initial_zone').val(result[1].trim());
                    $('#initial_shift').val(result[3].trim()).trigger("change");

                }
            });
        }

    }
</script> 