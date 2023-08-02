<style>
    .typeahead{
        width:218px!important;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/modernizr.js"></script> <!-- Modernizr -->
<div id="content-wrapper">
    <div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Bulk Employees</li>
	</ol>
        <!-- ========================= Data Tables Start ========================== -->
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-users"></i> Add Bulk Employees</div>
            <?php if(isset($error_msg) && !empty($error_msg)){?>
		<div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_msg;?>.
		</div>
            <?php } if($this->session->flashdata('error')){ ?>
		<div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
            </div>
            <?php } if($this->session->flashdata('success')){ ?>
		<div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
            </div>
            <?php } ?>
            <div class="card-body">
		<!-- form start -->
            <?php echo form_open_multipart("",array("id" =>"formID", "class" =>"register", "autocomplete" =>"off"));?>
                <div class="box-body">
                    <div class="form-group col-md-2">
                        <label>Select File</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="file" name="ZoneFile" id="ZoneFile" class="form-control validate[required]">
                        <small class="text-red">*(Only .xlsx file allowed)</small>
                    </div>
                </div>
                <div class="box-footer float-right text-right">
                    <div class="form-group col-md-8"></div>
                    <div class="form-group col-md-4">
                        <?php  echo form_submit('', 'Submit', 'class="btn btn-primary"');?>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
	</div>
        <!-- ========================= Data Tables End ========================== -->
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
                                $("#present_post_id").val(key);
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
        //====================================================================//
       
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
                    console.log(resp);
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
</script>   
<script>
        function processRegionInitialDiv() {
        var role_id = $("#role_id_initial").val();
        $('#school_div_initial').css("display", "none");
        $('#c_school_initial').val('');
        $('#section_div_initial').css("display", "none");
        $('#c_section_initial').val('');
        $("#shift_div_initial").css("display", "none");
        $('#shift_initial').val('');
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
                    }
                    else if (role_id == '4') {
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
                    if(result[3].trim()=='2'){
                        $('#shift_initial').val('2').trigger("change");
                    }else{
                        $('#shift_initial').val('1').trigger("change");
                    }
                }
            });
        }

    }
</script> 