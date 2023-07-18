<?php //show($ED); ?>
<style>
select[readonly] {
  background: #eee;
  pointer-events: none;
  touch-action: none;
}
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>initiate-transfer">Transfer</a> / Initiate Request</li>
        </ol>
        <?php if(isset($error_msg) && !empty($error_msg)){?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_msg;?>.
                </div>
            <?php } 
			if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
                </div>
            <?php } 
			?>
        <div class="card mb-3">
            <?php 
      
            echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
            <input type="hidden" name="present_status" id="present_status" value="<?php echo isset($ED['P_EMP_STS']) ? $ED['P_EMP_STS'] : ''; ?>">
            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($ED['P_EMP_CODE']) ? $ED['P_EMP_CODE'] : ''; ?>">
            <input type="hidden" name="present_DOJ" id="present_DOJ" value="<?php echo isset($ED['P_JOIN_DATE']) ? $ED['P_JOIN_DATE'] : date('Y-m-d'); ?>">
            <div class="card-header">
                <i class="fa fa-random" aria-hidden="true"></i>&nbsp; Execution of Transfer Order
            </div>
            <div class="card-body user_view" >
                <h5>Employee Details :: </h5><hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="col-sm-12 col-form-label">Employee Name / Emp. Code - </label>
                        <div class="col-sm-12"><?php echo $ED['P_EMP_TTL'].' '.$ED['P_EMP_NAME'].' / '.$ED['P_EMP_CODE'];?></div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-sm-12 col-form-label">Emp. Join Date - </label>
                        <div class="col-sm-12"><?php echo date("d-m-Y", strtotime($ED['P_JOIN_DATE']));?></div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-sm-12 col-form-label">Email - </label>
                        <div class="col-sm-12"><?php echo $ED['P_EMP_MAIL'];?></div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-sm-12 col-form-label">Mobile - </label>
                        <div class="col-sm-12"><?php echo $ED['P_EMP_MOB'];?></div>
                    </div>
                </div>   
                <br><h5>Present Posting Details ::</h5><hr>
                
                <div class="background_div">
                <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Place of Posting:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_placeid", array("" => "Select") + role_lists(), isset($ED['P_PLACE_ID']) ? set_value('present_placeid',$ED['P_PLACE_ID']) : set_value('present_placeid'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_place", array("" => "Select") + role_lists(), isset($ED['P_PLACE_ID']) ? set_value('present_place',$ED['P_PLACE_ID']) : set_value('present_place'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('role_id'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label"><?php if($ED['P_PLACE_ID']==2) echo 'Current Unit'; elseif($ED['P_PLACE_ID']==4) echo 'Current ZEIT'; else echo 'Current Region'; ?>:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_unitid", array("" => "Select") + all_unit_region(), isset($ED['P_UNIT_ID']) ? set_value('present_unitid',$ED['P_UNIT_ID']) : set_value('present_unitid'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_unit", array("" => "Select") + all_unit_region(), isset($ED['P_UNIT_ID']) ? set_value('present_unit',$ED['P_UNIT_ID']) : set_value('present_unit'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_unit'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" <?php if($ED['P_PLACE_ID']==2 && $ED['P_UNIT_ID']==5) echo 'style="display:block;"'; else echo 'style="display:none;"'; ?> >
                            <label for="" class="col-sm-12 col-form-label">Current Department:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_sectionid", array("" => "Select") + section_lists(), isset($ED['P_SECTION_ID']) ? set_value('present_sectionid',$ED['P_SECTION_ID']) : set_value('present_sectionid'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_section", array("" => "Select") + section_lists(), isset($ED['P_SECTION_ID']) ? set_value('present_section',$ED['P_SECTION_ID']) : set_value('present_section'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_section'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" <?php if($ED['P_PLACE_ID']==5) echo 'style="display:block;"'; else echo 'style="display:none;"'; ?> >
                            <label for="" class="col-sm-12 col-form-label">Current School:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_schoolid", array("" => "Select") + school_lists(), isset($ED['P_SCHOOL_ID']) ? set_value('present_schoolid',$ED['P_SCHOOL_ID']) : set_value('present_schoolid'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_school", array("" => "Select") + school_lists(), isset($ED['P_SCHOOL_ID']) ? set_value('present_school',$ED['P_SCHOOL_ID']) : set_value('present_school'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_school'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Kv Code :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("present_kvcode", isset($ED['P_KVCODE']) ? set_value('present_kvcode', $ED['P_KVCODE']) : set_value('present_kvcode'), 'readonly class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_kvcode'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Current Designation:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_designationid", array("" => "Select") + all_designations(), isset($ED['P_DESG_ID']) ? set_value('present_designation',$ED['P_DESG_ID']) : set_value('present_designation'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_designation", array("" => "Select") + all_designations(), isset($ED['P_DESG_ID']) ? set_value('role_id',$ED['P_DESG_ID']) : set_value('present_designation'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_designation'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" <?php if(!empty($ED['P_SUB_ID'])) echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>>
                            <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("present_subjectid", array("" => "Select") + subject_lists(), isset($ED['P_SUB_ID']) ? set_value('present_subject',$ED['P_SUB_ID']) : set_value('present_subject'), 'disabled class="form-control validate[required]" autocomplete="off"'); ?>
                                <?php echo form_dropdown("present_subject", array("" => "Select") + subject_lists(), isset($ED['P_SUB_ID']) ? set_value('present_subject',$ED['P_SUB_ID']) : set_value('present_subject'), 'style="display:none;" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('present_subject'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br><h5>Transfer To :: </h5>
				<span style="display:none;">
					<input type="checkbox" name="promotion" id="promotion" value="1" onclick="promotionOrTransfer()"/>Promotion ? 
				</span>
				<hr>
                <div class="background_div">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Place of Posting:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("transfer_place", array("" => "Select") + role_lists(), '', 'id="role_id_initial" data-id="c" onchange="processRegionInitialDiv();" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_place'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" id="region_div_initial" style="display:none;">
                            <label for="" class="col-sm-12 col-form-label" id="initial_region_label">Regions<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("transfer_unit", array("" => "Select") + region_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();" class="form-control validate[required]" autocomplete="off"');    ?>
                                <span class="error"><?php echo form_error('transfer_unit'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" id="section_div_initial" style="display:none;">
                            <label for="" class="col-sm-12 col-form-label">Department:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("transfer_section", array("" => "Select") + section_lists(), '', 'class="form-control validate[required]"  id="c_section_initial" data-id="c" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_section'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" id="school_div_initial" style="display:none;">
                            <label for="" class="col-sm-12 col-form-label"> School:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("transfer_school", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="initialschcode()" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_school'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Kv Code :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("transfer_kvcode", '', 'id="kvcode_initial" placeholder="KV Code" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_kvcode'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                 <?php echo form_dropdown("transfer_designation", array("" => "Select") + all_designations(), '', 'onchange="showsubject()" id="transfer_designation"  class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_designation'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" id="transfer_subject_div" style="display:none;">
                            <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12" id="to_subject">
                                 <?php echo form_dropdown("transfer_subject", array("" => "Select") + subject_lists(), '', ' class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_subject'); ?></span>
								
                            </div>
							
                        </div>
						<div id="chkvacancy" class="form-group col-md-3" style="display:none;" onclick="checkvacancy();"></div>
						<span id="msg" style="margin-top:25px;"></span>
                    </div>
                </div>
                <br><h5>Transfer Details :: </h5><hr>
                <div class="background_div">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Transfer Order No.:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("transfer_orderno", $Ord_No, 'placeholder="Transfer Order No" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('transfer_orderno'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" class="col-sm-12 col-form-label">Transfer Date :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                 <?php echo form_input("transfer_orderdate", $Ord_Date, 'placeholder="Order Date [dd-mm-yyyy]"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <span class="error"><?php echo form_error('transfer_orderdate'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="" class="col-sm-12 col-form-label">Relieving Order No.:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("relieving_orderno",$Rel_No, 'placeholder="Relieving Order No" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('relieving_orderno'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="" class="col-sm-12 col-form-label">Relieving Date :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("relieving_date", '', 'placeholder="Relieving Date [dd-mm-yyyy]"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <span class="error"><?php echo form_error('relieving_date'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2" >
                            <label for="" class="col-form-label" style="margin-left: -15px;">Select Forenoon/Afternoon<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <select name="trans_period" id="trans_period" class="form-control validate[required]" autocomplete="off">
                                    <option value="">Select</option>
                                    <option value="Forenoon" selected="selected">Forenoon</option>
                                    <option value="Afternoon">Afternoon</option>
                                </select>
                                <span class="error"><?php echo form_error('trans_period'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="Generate Relieving Order" id="gen_rel_order">

                        </div>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>	
    </div>
</div>
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
	var present_service_posting_place = <?php echo $ED['P_PLACE_ID'];?>;
	var present_service_posting_region = <?php echo $ED['P_UNIT_ID'];?>;
	var present_service_posting_designation = <?php echo $ED['P_DESG_ID'];?>;
	var present_service_posting_subject = <?php echo $ED['P_SUB_ID'];?>;
	$(document).ready(function(){
	  if(present_service_posting_place==5){
		  $("#role_id_initial").val(present_service_posting_place);
		  processRegionInitialDiv();
		  
		  if(present_service_posting_region!=''){
		  console.log('aa');
		  $("#c_region_initial").val(present_service_posting_region);		  
		  processSchoolInitialDiv();
		  }
		  if(present_service_posting_designation=='5' || present_service_posting_designation=='6'){
			  $('#transfer_designation').val(present_service_posting_designation);
			  showsubject();
			  
		  }
		  if(present_service_posting_subject!=''){
			  $('#transfer_designation').val(present_service_posting_designation);
			  showsubject();
		  }
	  }
	  
	  
	  
	});
    function processRegionInitialDiv() {
		
		$('#chkvacancy').hide();
		$('#msg').hide();
		$('#transfer_subject_div').css("display", "none");
		
        var role_id = $("#role_id_initial").val();
        $('#school_div_initial').css("display", "none");
        $('#c_school_initial').val('');
        $('#section_div_initial').css("display", "none");
        $('#c_section_initial').val('');
        $('#kvcode_initial').val('');
		console.log('kk');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#c_region_initial').html(response);
                    $('#region_div_initial').css("display", "block");
					if(role_id == '7'){
						console.log('ABROAD KV');
						$('#kvcode_initial').attr('readonly', false);
					}else{
						console.log('other');
						$('#kvcode_initial').attr('readonly', true);
					}
                    if (role_id == '2') {
                        $("#initial_region_label").html("Units<span class='reqd'>*</span>");
                    }
                    else if (role_id == '4') {
                        $("#initial_region_label").html("ZIET<span class='reqd'>*</span>");
                    } else {
                        $("#initial_region_label").html("Regions<span class='reqd'>*</span>");
                    }
					if(role_id == '5'){
						$('#chkvacancy').html('<span class="reqd" style="font-size:12px;font-weight:bold;">Please check the vacancy before submit.</span><br /><input class="btn btn-primary" type="button" value="Check Vacancy first" autocomplete="off">');						
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
                }
            });
        }

    }
    
    function showsubject(){
        var desig_id=$('#transfer_designation').val();
		$("#gen_rel_order").attr("disabled", false);
		//$('#chkvacancy').show();
		$('#msg').hide();
        if((desig_id != '')&&(desig_id==5 || desig_id==6)) {
            $('#transfer_subject_div').css("display", "block");
			
			if(desig_id==5){
			var path = base_url + 'admin/users/subject_listsPGT';
			}
			if(desig_id==6){
			var path = base_url + 'admin/users/subject_listsTGT';
			}
			$.ajax({
				url: path,
				data: get_csrf_token_name + '=' + get_csrf_hash,
				type: 'POST',
				success: function (response) {
					console.log(response);
					$('#to_subject').html(response);
					
					if(present_service_posting_subject!=''){
						 $('#subject_id option[value=<?php echo $ED['P_SUB_ID'];?>]').attr('selected','selected');
						 
					}
				}
			});
        }else{
			$('#transfer_subject_div').css("display", "none");
        }
    }
	function checkvacancy(){
		if($('#c_school_initial').val()){var school_id = $('#c_school_initial').val();}else {var school_id = 0;}
		if($('#transfer_designation').val()){var designation_id = $('#transfer_designation').val();}else{var designation_id =0;}
		if($('#subject_id').val()){subject_id = $('#subject_id').val();}else{subject_id =0;}
		
		if(school_id=='0'){
			alert('Select school first.');
			return false;
		}
		if(designation_id=='0'){
			alert('Select designation first.');
			return false;
		}
		if($('#transfer_designation').val()!='5' && $('#transfer_designation').val()!='6' ){
			subject_id=0;
		}else{
			subject_id=$('#subject_id').val();
		}
		if(($('#transfer_designation').val()=='5' || $('#transfer_designation').val()=='6' ) && subject_id==0){
			alert('Please select subject first.');
			return false;
		}	
		var path = base_url + 'admin/users/chackvacancy';
		$.ajax({
				url: path,
				data: get_csrf_token_name + '=' + get_csrf_hash+ '&subject_id='+subject_id+"&designation_id="+designation_id+"&school_id="+school_id,
				type: 'POST',
				success: function (response) {
					if(response=='1'){
						console.log(response);
						$('#msg').html('<p style="color: green;font-weight: bold;">Vacancy is available. You can proceed further.</p>');
						//enable Generate Relieving Order button gen_rel_order
						$("#gen_rel_order").attr("disabled", false);
						$('#msg').show();
					}
					else{
						$('#msg').html('<p style="color: red;font-weight: bold;">Vacancy is not available.</p>');
						//disable Generate Relieving Order button gen_rel_order
						$("#gen_rel_order").attr("disabled", true);
						$('#msg').show();
					}
					
				}
			});
	
	}
	function confirmation(){
		var str = '';
		if($('#role_id_initial').val() == 7){
			str = "The Details of transfer are \n Place of Posting : "+$("#role_id_initial option:selected").html()+"\nRegion : "+$("#c_region_initial option:selected").html()+"\n Kv Code : "+$("#kvcode_initial").val()+"\n Designation : "+$("#transfer_designation option:selected").html();
			return(confirm(str));
		}
		
	}
	function promotionOrTransfer(){
			
			isChecked = $('#promotion').is(':checked');
			if(isChecked==false){
				if(present_service_posting_place==5){
					$('#transfer_designation').attr("readonly", "readonly"); 
					$('#subject_id').attr("readonly", "readonly"); 
				}
			}else{
				$('#transfer_designation, #subject_id').removeAttr("readonly");  
			}
			
	}
</script>