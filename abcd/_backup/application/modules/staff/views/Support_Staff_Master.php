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
        <h6><strong>Coach / Contractual Staff - </strong></h6>
        <hr>
<!--================================ PRESENT SERVICE DETAILS STARTS =================================-->
        <div class="background_div">
            <div class="row">
                <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Employment Type:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("employment_type", array("" => "Select") + employment_type(), isset($StfData->staff_type) ? set_value('employment_type', $StfData->staff_type) : set_value('employment_type'), ' id="employment_type" class="form-control validate[required]" autocomplete="off" onchange="showDesig(this.value)"'); ?>
                    <span class="error"><?php echo form_error('employment_type'); ?></span>
                </div>
                </div>
                <div class="form-group col-md-4 present_designation" style="display: none;">
                <label for="" class="col-sm-12 col-form-label"> Designation:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("present_designation", isset($StfData->designationname) ? set_value('present_designation', $StfData->designationname) : set_value('present_designation'), 'placeholder=" Designation" id="present_post_designation"  class="form-control validate[required] typeahead" autocomplete="off" '); ?>
                    <input type="hidden" value="<?php echo $StfData->staff_designation; ?>" name="present_designationid" id="present_post_id" autocomplete="off">
                    <span class="error"><?php echo form_error('present_designation'); ?></span>
                    <span class="col-sm-6 error" id="desg_valid"></span>
                </div>
                </div>
                
                <div class="form-group col-md-4 present_subject_1"  style="display: none;">
                    <div <?php if(empty($StfData->staff_subject)) echo 'style="display:none;"';  ?>  id="subject_div_present">
                        <label for="" class="col-sm-12 col-form-label"> Subject    <span class="reqd"></span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("present_subject_1", array("" => "Select") + subject_lists(), isset($StfData->staff_subject) ? set_value('present_subject_1', $StfData->staff_subject) : set_value('present_subject_1'), 'id="subject_id_present_1" data-id="c" class="form-control validate[required]" autocomplete="off" onchange="showStrength(1);"'); ?>
                            <span class="error"><?php echo form_error('present_subject_id'); ?></span> 
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-md-4 present_subject_2" style="display: none;">
                    <label for="" class="col-sm-12 col-form-label"> Subject / Post   <span class="reqd">* </span></label>
                    <input type="hidden" value="<?php echo ($StfData->staff_designation)?$StfData->staff_designation:'99'; ?>" name="present_designationid_2" id="present_post_id_2" autocomplete="off">
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_subject_2", array("" => "Select") + coach_subject_lists(), isset($StfData->staff_subject) ? set_value('present_subject_2', $StfData->staff_subject) : set_value('present_subject_2'), 'id="subject_id_present_2" data-id="c" class="form-control validate[required]" autocomplete="off" onchange="showStrength(2);"'); ?>
                        <span class="col-sm-6 error" id="sub_valid"></span> 
                    </div>
                </div>
                <div class="form-group col-md-4 present_subject_3" style="display: none;">
                    <label for="" class="col-sm-12 col-form-label"> Subject  / Post  <span class="reqd">* </span></label>
                    <input type="hidden" value="<?php echo ($StfData->staff_designation)?$StfData->staff_designation:'100'; ?>" name="present_designationid_3" id="present_post_id_3" autocomplete="off">
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_subject_3", array("" => "Select") + other_subject_lists(), isset($StfData->staff_subject) ? set_value('present_subject_3', $StfData->staff_subject) : set_value('present_subject_3'), 'id="subject_id_present_3" data-id="c" class="form-control validate[required]" autocomplete="off" onchange="showStrength(3);"'); ?>
                        <span class="col-sm-6 error" id="sub_valid"></span> 
                    </div>
                </div>
                <div class="form-group col-md-4 emp_strength" style="display: none;">
                <label for="" class="col-sm-12 col-form-label">Staff Strength ( In Number ):<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_strength", array("" => "Select") + staff_strength(), isset($StfData->staff_strength) ? set_value('emp_strength', $StfData->staff_strength) : set_value('emp_strength'), ' id="emp_strength" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error emp_strength"><?php echo form_error('emp_strength'); ?></span>
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
                        <?php echo form_dropdown("present_shift", array("" => "Select Shift") + shift(), isset($StfData->staff_shift) ? set_value('present_shift', $StfData->staff_shift) : set_value('present_shift',1), 'id="shift_present" class="form-control" readonly autocomplete="off" '); ?>
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
            </div>
        </div>
<!--================================ PRESENT SERVICE DETAILS END =================================-->
        <div class="col-sm-12">
            <div  style="float:right;"> 
                <input class="btn btn-primary" type="reset" value="Reset">
                <div class="btn btn-primary" id="perSaveBtn" onclick="validPost();">Save Data</div>
            </div>
        </div>

        <div class="text-right rg-footer"></div>
        <?php echo form_close(); ?>
    </div>
    </div>
</div>
</div>

<!-- ======================= Check Contractual Teacher Against Vacant Post =========================== -->
<script>
     
    function validPost(){
        var emp_typ=$("#employment_type").val();
        if(!(emp_typ) || emp_typ==''){
            alertify.error("Please Select Employement Type");
            return false;
        }
        if(emp_typ==1){ //Contractual
           
            var EmpId=100;
            $('#desg_valid').html();
            var DesigId = $('#present_post_id').val();
            if(!DesigId){ $('#desg_valid').html('Select Present Designation'); $('#present_post_id').focus();return false;}
            var SubId   = $('#subject_id_present_1').val();
            var KvCode  = $('#kvcode_present').val();
            var EmpStr  = $('#emp_strength').val();
            if(!EmpStr){ alertify.error("Sorry! Select Employee Strength"); return false;} 
            if(!SubId){ SubId=0; }
            $.ajax({
                url: base_url + 'staff/Staff/ChkVacAvail',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' + EmpId+ '&KvCode=' + KvCode+ '&DesigId=' +DesigId+ '&SubId=' +SubId+ '&EmpStr=' +EmpStr,
                type: 'POST',
                success: function (resp) {
                    //console.log(resp);
                    if(resp>=0){
                           $('#formID').submit();
                    }else{
                        alertify.error("Sorry! There is no or less vacancy available as no of requested post");
                        return false;
                    }
                }
            });
        }else{ //Coaches
           // var DesigId = $('#present_post_id_2').val();
           // var SubId = $('#subject_id_present_2').val();
          //  if(!SubId || SubId==''){ $('#sub_valid').html('Select Subject'); $('#subject_id_present_2').focus();return false;}
            $('#formID').submit();
        }
    }
//================================ SHOW DESIGNATION DIV ===============================//
</script>
<script>
    $(document).ready(function () {
     // $('#employment_type').val('');
    });
     function showDesig(EmpType){
       if(EmpType==1){
            $('.present_designation').css("display","none");
            $('.present_subject_2').css("display","none");
            $('.present_subject_3').css("display","none");
            $("#present_post_designation").val('');
            $("#present_post_id").val('');
            $('.present_designation').css("display","block");
            $('#emp_strength').val(''); 
            $('.emp_strength').css("display","none");
           
       }else if(EmpType==2){
            $("#present_post_designation").val('');
            $("#present_post_id").val('');
            $('.present_designation').css("display","none");
            $('.present_subject_1').css("display","none");
            $('.present_subject_2').css("display","block");
            $('.present_subject_3').css("display","none");
            $('#employment_cat').val(''); 
            $('.employment_cat').css("display","none"); 
            $('#emp_strength').val(''); 
            $('.emp_strength').css("display","none");
       }else{
            $("#present_post_designation").val('');
            $("#present_post_id").val('');
            $('.present_designation').css("display","none");
            $('.present_subject_1').css("display","none");
            $('.present_subject_2').css("display","none");
            $('.present_subject_3').css("display","block");
            $('#employment_cat').val(''); 
            $('.employment_cat').css("display","none");
            $('#emp_strength').val(''); 
            $('.emp_strength').css("display","none");
       }
    }
    function showStrength(id){
        if(id==1||id==2||id==3){
            $('.emp_strength').css("display","block");
        }else{
            $('.emp_strength').css("display","none");
        }
    }
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    var present_post_cat = $("#employment_cat").val();
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
                console.log(response);
                    if(response != false) {
                        $.each(response, function (key, value) {
                            $("#present_post_designation").val(value);
                            $("#present_post_id").val(key);
                            if (key == '5' || key == '6') {
                                $("#subject_div_present").css("display", "block");
                                 $(".present_subject_1").css("display", "block");
                            }else {
                                $("#subject_div_present").css("display", "none");
                                $(".present_subject_1").css("display", "none");
                                $('.emp_strength').css("display","block");
                            }
                        });
                    }else {
                    
                    $("#present_post_designation").val('');
                    $("#present_post_id").val('');
                    $("#subject_div_present").css("display", "none");
                    alertify.error('Designation does not belongs to - Employment Category');
                    return false;
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
            var staff_type= '<?php echo $StfData->staff_type;?>';
            var staff_catg= '<?php echo $StfData->staff_catg;?>';
            var desigName= '<?php echo $StfData->designationname;?>';
            var desigId= '<?php echo $StfData->staff_designation;?>';
            var subName= '<?php echo $StfData->staff_subject;?>';
            var stfStrength= '<?php echo $StfData->staff_strength;?>';
            if((staff_type)&&staff_type==1){ //Contractual
                $('.present_designation').css("display","block");
                $('.present_subject_2').css("display","none");
                $('.present_subject_3').css("display","none");
                $('#employment_cat').val(staff_catg).trigger("change"); 
                $('.employment_cat').css("display","block"); 
                $('#present_post_designation').val(desigName).trigger("change");
                $('#present_post_id').val(desigId).trigger("change");
                $('#present_subject_1').val(subName).trigger("change");
                $('.present_subject_1').css("display","block");
                $('#emp_strength').val(stfStrength).trigger("change"); 
                $('.emp_strength').css("display","block");
            }
            if((staff_type)&&staff_type==2){ //Contractual
                $('.present_designation').css("display","none");
                $('.present_subject_1').css("display","none");
                $('#present_subject_2').val(subName).trigger("change");
                $('.present_subject_2').css("display","block");
                $('.present_subject_3').css("display","none");
                $('.employment_cat').css("display","none"); 
                $('#present_post_id_2').val(desigId).trigger("change");
                $('#emp_strength').val(stfStrength).trigger("change"); 
                $('.emp_strength').css("display","block");
            }
            if((staff_type)&&staff_type==3){ //Contractual
                $('.present_designation').css("display","none");
                $('.present_subject_1').css("display","none");
                $('.present_subject_2').css("display","none");
                $('#present_subject_3').val(subName).trigger("change");
                $('.present_subject_3').css("display","block");
                $('.employment_cat').css("display","none"); 
                $('#present_post_id_3').val(desigId).trigger("change");
                $('#emp_strength').val(stfStrength).trigger("change"); 
                $('.emp_strength').css("display","block");
            }
            
            
        }
    }
    /* ====================================== CURRENT SERVICE 25/11==================================*/
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

