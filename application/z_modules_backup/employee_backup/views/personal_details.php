<?php //show($this->session->userdata()); 
 //show($LogData);?>
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
        <!-- ===================================== Form Starts From Here ====================================== -->    
        <?php echo form_open_multipart("",array("id" =>"formID", "class" =>"register", "autocomplete" =>"off"));?>

        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($EmpCode) ? $EmpCode : ''; ?>">
        <?php echo $this->load->view('app/ProfileTab',(isset($EmpCode))?$EmpCode:''); ?>
        <h6><strong>Personal Details - </strong></h6>
        <hr>
        <div class=" background_div">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_title", array("" => "Select Title") + title_type(), isset($PerData->emp_title) ? set_value('emp_title', $PerData->emp_title) : set_value('emp_title'),' id="emp_title" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Employee Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_name", isset($PerData->emp_name) ? set_value('emp_name', $PerData->emp_name) : set_value('emp_name'), 'placeholder="First Name" id="emp_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_name'); ?></span>
                </div>
            </div>
          
            <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_mother_title", array("" => "Select Title") + mother_title(), isset($PerData->emp_mother_title) ? set_value('emp_mother_title', $PerData->emp_mother_title) : set_value('emp_mother_title'),' id="emp_mother_title" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_mother_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Mother's Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_mother_name", isset($PerData->emp_mother_name) ? set_value('emp_mother_name', $PerData->emp_mother_name) : set_value('emp_mother_name'), 'placeholder="Mother Name" id="emp_mother_name" class="validate[required] form-control" onkeypress="LettersAndDotOnly();" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_mother_name'); ?></span>
                </div>
            </div>
           
            
            
            
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="col-sm-2">
                        <?php 
                        if(isset($PerData->emp_photo) && ($PerData->emp_photo!='NA') ){
                            echo '<img class="ProImg" src="'.base_url().'img/ProImage/'.$PerData->emp_photo.'" width="100">';
                        }else{
                            echo '<img class="ProImg" src="'.base_url().'img/img-icon.png" width="100">';
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
                        if(isset($PerData->emp_photo)){
                            echo '<input type="file" name="emp_photo" id="emp_photo" class="form-control" autocomplete="off">';
                        }else{
                            echo '<input type="file" name="emp_photo" id="emp_photo" class="form-control validate[required]" autocomplete="off">';
                        }
                        ?>
                    
                    <input type="hidden" name="emp_photo_avl" id="emp_photo_avl" value="<?php echo isset($PerData->emp_photo) ? $PerData->emp_photo : ''; ?>" autocomplete="off">
                    <span class="error"><?php echo form_error('emp_photo'); ?></span>
                    <span class="error" id="valid_image"></span>
                </div>
                    </div>
                </div>
                
            </div>
             <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_father_title", array("" => "Select Title") + father_title(), isset($PerData->emp_father_title) ? set_value('emp_father_title', $PerData->emp_father_title) : set_value('emp_father_title'),' id="emp_father_title" class="form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_father_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Father's Name:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_father_name", isset($PerData->emp_father_name) ? set_value('emp_father_name', $PerData->emp_father_name) : set_value('emp_father_name'), 'placeholder="Father Name" id="emp_father_name" class="form-control" onkeypress="LettersAndDotOnly();" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_father_name'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Gender:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_gender", array("" => "Select Gender") + gender(), isset($PerData->emp_gender) ? set_value('emp_gender', $PerData->emp_gender) : set_value('emp_gender'), 'class="form-control validate[required]"  id="emp_gender" onchange="processMaidenName()" autocomplete="off"');  ?>
                    <span class="error"><?php echo form_error('emp_gender'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Date of Birth:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_dob", isset($PerData->emp_dob) ? set_value('emp_dob', date('d-m-Y', strtotime($PerData->emp_dob))) : set_value('emp_dob'), 'placeholder="dd-mm-yyyy"  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('emp_dob'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Marital Status:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_marital_status", array("" => "Select Marital Status") + marital_status(), isset($PerData->emp_marital_status) ? set_value('emp_marital_status', $PerData->emp_marital_status) : set_value('emp_marital_status'), 'class="form-control validate[required]" id="emp_marital_status" onchange="processMaidenName()" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_marital_status'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_marital_status==1 && $PerData->emp_gender==2 )?'<div class="form-group col-md-4" id="maiden_name">':'<div class="form-group col-md-4" id="maiden_name" style="display:none;">';?>
                <label for="" class="col-sm-12 col-form-label">Maiden Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_maiden_name", isset($PerData->emp_maiden_name) ? set_value('emp_maiden_name', $PerData->emp_maiden_name) : set_value('emp_maiden_name'), 'placeholder="Maiden Name" id="emp_maiden_name" class="txtOnly form-control validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('emp_maiden_name'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Email-Id:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_email", isset($PerData->emp_email) ? set_value('emp_email', $PerData->emp_email) : set_value('emp_email'), 'placeholder="Email-Id" id="emp_email" class="validate[required,custom[email]] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_email'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Mobile No. (Enter PAN linked mobile no.):<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_mobile", isset($PerData->emp_mobile_no) ? set_value('emp_mobile', $PerData->emp_mobile_no) : set_value('emp_mobile'), 'id="emp_mobile" placeholder="Mobile No." maxlength="10" minlength="10" class="numericOnly validate[required,custom[number],minSize[10],maxSize[10]] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_mobile'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Landline No.:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_landline_no", (isset($PerData->emp_landline_no) && $PerData->emp_landline_no!=0) ? set_value('emp_landline_no', $PerData->emp_landline_no) : set_value('emp_landline_no',''), 'placeholder="Landline No." maxlength="10" minlength="10" id="emp_landline_no" class="numericOnly validate[custom[number],minSize[10],maxSize[10]] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_landline_no'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Aadhaar No.:</label>
                <div class="col-sm-12">
                    <input type="text" name="emp_aadhaar_no_mask" id="emp_aadhaar_no_mask" class="form-control" value="" maxlength="12" onkeypress="return IsAadhaar(event);" ondrop="return false;" onpaste="return false;" placeholder="Aadhaar no" autocomplete="off">
                    <input type="hidden" name="emp_aadhaar_no" id="emp_aadhaar_no" class="form-control" value="" maxlength="12" autocomplete="off">
                    <span class="error"><?php echo form_error('emp_aadhaar_no'); ?></span>
					<span id="aderr" style="color: Red; display: none; font-size:11px;">Valid Aadhaar required. Only numbers allowed</span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Pan Card No.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <input type="text" name="emp_pancard_no" id="emp_pancard_no" class="validate[required] form-control" value="" maxlength="10" onkeypress="return IsPancard(event);" ondrop="return false;" onpaste="return false;" placeholder="PAN Card no" autocomplete="off">
                    <span class="error"><?php echo form_error('emp_pancard_no'); ?></span>
					<span id="pnerr" style="color: Red; display: none; font-size:11px;">Valid Pancard required. No special character allowed</span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Passport No.:</label>
                <div class="col-sm-12">
                    <input type="text" name="emp_passport_no" id="emp_passport_no" class="form-control" value="" maxlength="10" onkeypress="return IsPassport(event);" ondrop="return false;" onpaste="return false;" placeholder="Passport no" autocomplete="off">
                    <span class="error"><?php echo form_error('emp_passport_no'); ?></span>
					<span id="pserr" style="color: Red; display: none; font-size:11px;">Valid Passport required. No special character allowed</span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Blood Group:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_blood_group", array("" => "Select Blood Group") + blood_group(), isset($PerData->emp_blood_group) ? set_value('emp_blood_group', $PerData->emp_blood_group) : set_value('emp_blood_group'), ' id="emp_blood_group" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_blood_group'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Permanent Address:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <textarea placeholder="Permanent Address" class="form-control validate[required]" name="emp_address" id="emp_address" autocomplete="nope" autocomplete="no" autocomplete="off">
                        <?php echo isset($PerData->emp_postaladdress) ?  $PerData->emp_postaladdress : '';?>

                    </textarea>
                    <span class="error"><?php echo form_error('emp_address'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Residential Address:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <textarea placeholder="Residential Address" class="form-control validate[required]" name="emp_resaddress" id="emp_resaddress" autocomplete="nope" autocomplete="no" autocomplete="off">
                        <?php echo isset($PerData->emp_resaddress) ?  $PerData->emp_resaddress : '';?>

                    </textarea>
                    <span class="error"><?php echo form_error('emp_address'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Pincode:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_pincode", isset($PerData->emp_pincode) ? set_value('emp_pincode', $PerData->emp_pincode) : set_value('emp_pincode'), 'placeholder="Pincode" maxlength="6" minlength="6" id="emp_pincode" class="numericOnly validate[required,maxSize[6]] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_pincode'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Hometown:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_hometown", isset($PerData->emp_hometown) ? set_value('emp_hometown', $PerData->emp_hometown) : set_value('emp_hometown'), 'placeholder="Your Hometown"  id="emp_hometown" class="validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_hometown'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Single Parent:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_single_parent", array("" => "Select") + single_parent(), isset($PerData->emp_single_parent) ? set_value('emp_single_parent', $PerData->emp_single_parent) : set_value('emp_single_parent'), ' id="emp_single_parent" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_single_parent'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">No. of Surviving Children:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_surviving_child", isset($PerData->emp_surviving_child) ? set_value('emp_surviving_child', $PerData->emp_surviving_child) : set_value('emp_surviving_child'), 'placeholder="No. of Surviving Children" maxlength="2"  id="emp_surviving_child" class="numericOnly validate[maxSize[2]] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_surviving_child'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Permanent Identity Mark:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_identity_mark", isset($PerData->emp_identity_mark) ? set_value('emp_identity_mark', $PerData->emp_identity_mark) : set_value('emp_identity_mark'), 'placeholder="Permanent Identity Mark"  id="emp_identity_mark" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_identity_mark'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Religion:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_religion", array("" => "Select") + religion(), isset($PerData->emp_religion) ? set_value('emp_religion', $PerData->emp_religion) : set_value('emp_religion'), 'id="emp_religion" class="form-control validate[required]" onchange="openotherreligionfield();" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_religion'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_religion==7)?'<div class="form-group col-md-4" id="otherreligion">':'<div class="form-group col-md-4" style="display:none;" id="otherreligion">';?>
            
                <label for="" class="col-sm-12 col-form-label">Enter Religion:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_othereligion", isset($PerData->emp_other_religion) ? set_value('emp_othereligion', $PerData->emp_other_religion) : set_value('emp_othereligion'), 'placeholder="Religion"   id="emp_othereligion" class="txtOnly validate[required] form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_othereligion'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Select(GPF / CPF / NPS):</label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_gpfcpfnps", array("" => "Select") + provident_fund(), isset($PerData->emp_gpfcpfnps) ? set_value('emp_gpfcpfnps', $PerData->emp_gpfcpfnps) : set_value('emp_gpfcpfnps'), 'id="emp_gpfcpfnps" onchange="processgpfdiv();"  class="form-control" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_gpfcpfnps'); ?></span>
                </div>
            </div>
            <?php echo (empty($PerData->emp_gpfcpfnps))?'<div class="form-group col-md-4" style="display:none;" id="gpfcpf_div">':'<div class="form-group col-md-4" id="gpfcpf_div">';?>
                <label for="" class="col-sm-12 col-form-label">AC Number (GPF / CPF / NPS):</label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_gpfcpfnpsnumber", isset($PerData->emp_gpfcpfnpsnumber) ? set_value('emp_gpfcpfnpsnumber', $PerData->emp_gpfcpfnpsnumber) : set_value('emp_gpfcpfnpsnumber'), 'placeholder="GPF/CPF/NPS Number"   id="emp_gpfcpfnpsnumber" class="form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_gpfcpfnpsnumber'); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Category:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_category", array("" => "Select Category") + category(), isset($PerData->emp_category) ? set_value('emp_category', $PerData->emp_category) : set_value('emp_category'), 'id="emp_category" onchange="processCategoryDropDown();" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_category'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_category==1 || empty($PerData->emp_category))?'<div class="form-group col-md-4" id="cat_certificate_div" style="display:none;">':'<div class="form-group col-md-4" id="cat_certificate_div">';?>
            
                <label for="" class="col-sm-12 col-form-label">Certificate No.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_cat_details_certificate", isset($PerData->emp_cat_certificate_no) ? set_value('emp_cat_details_certificate', $PerData->emp_cat_certificate_no) : set_value('emp_cat_details_certificate'), 'maxlength="20" placeholder="Certificate No."   id="emp_cat_details_certificate" class="validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_cat_details_certificate'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_category==1|| empty($PerData->emp_category))?'<div class="form-group col-md-4" id="cat_date_div" style="display:none;">':'<div class="form-group col-md-4" id="cat_date_div">';?>
            
                <label for="" class="col-sm-12 col-form-label">Date Of Issue:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_cat_details_date", isset($PerData->emp_cat_issuing_date) ? set_value('emp_cat_details_date', date('d-m-Y', strtotime($PerData->emp_cat_issuing_date))) : set_value('emp_cat_issuing_date'), 'placeholder="dd-mm-yyyy"  id="emp_cat_details_date" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('emp_cat_details_date'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_category==1|| empty($PerData->emp_category))?'<div class="form-group col-md-4" id="cat_issue_div" style="display:none;">':'<div class="form-group col-md-4" id="cat_issue_div">';?>
            
                <label for="" class="col-sm-12 col-form-label">Name of the Issuing Authority with Address:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_cat_details_name", isset($PerData->emp_cat_issuing_authority) ? set_value('emp_cat_details_name', $PerData->emp_cat_issuing_authority) : set_value('emp_cat_details_name'), 'placeholder="Name of the Issuing Authority with Address" maxlength="25"  id="emp_cat_details_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                     <span class="error"><?php echo form_error('emp_cat_details_name'); ?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Whether Differently Abled?:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_physical_handicapped", array("" => "Select") + physically_abled(), isset($PerData->emp_physical_abled) ? set_value('emp_physical_handicapped', $PerData->emp_physical_abled) : set_value('emp_physical_abled'), 'id="emp_physical_handicapped"  onchange="processPhysicalDropDown();" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_physical_handicapped'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_physical_abled==1)?'<div class="form-group col-md-4" id="phy_type_div">':'<div class="form-group col-md-4" id="phy_type_div" style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Type of Disability.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_phy_details_type", array("" => "Select PH Type") + phtype(), isset($PerData->emp_ph_category) ? set_value('emp_phy_details_type', $PerData->emp_ph_category) : set_value('emp_phy_details_type'), 'id="emp_phy_details_type" onchange="processphothername();" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_phy_details_type'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_physical_abled==1 && $PerData->emp_ph_category==4)?'<div class="form-group col-md-4" id="emp_ph_othername_div">':'<div class="form-group col-md-4" id="emp_ph_othername_div" style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Disability Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_ph_othername", isset($PerData->emp_ph_othername) ? set_value('emp_ph_othername', $PerData->emp_ph_othername) : set_value('emp_ph_othername'), ' placeholder="Type of Disability"   id="emp_ph_othername" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_phy_details_type'); ?></span>
                </div>
            </div>
            
            <?php echo ($PerData->emp_physical_abled==1)?'<div class="form-group col-md-4" id="phy_perc_div">':'<div class="form-group col-md-4" id="phy_perc_div" style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Disability Percentage:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_phy_percent", isset($PerData->emp_ph_percent) ? set_value('emp_phy_percent', $PerData->emp_ph_percent) : set_value('emp_phy_percent'), ' placeholder="Disability Percentage(%)"   id="emp_phy_percent" class="validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_phy_percent'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_physical_abled==1)?'<div class="form-group col-md-4" id="phy_certificate_div">':'<div class="form-group col-md-4" id="phy_certificate_div"  style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Certificate No.:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_phy_details_certificate", isset($PerData->emp_ph_certificate_no) ? set_value('emp_phy_details_certificate', $PerData->emp_ph_certificate_no) : set_value('emp_phy_details_certificate'), 'maxlength="16" placeholder="Certificate No."   id="emp_phy_details_certificate" class="validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('emp_phy_details_certificate'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_physical_abled==1)?'<div class="form-group col-md-4" id="phy_date_div">':'<div class="form-group col-md-4" id="phy_date_div" style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Date Of Issue:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_phy_details_date", isset($PerData->emp_ph_issuing_date) ? set_value('emp_phy_details_date', date('d-m-Y', strtotime($PerData->emp_ph_issuing_date))) : set_value('emp_phy_details_date'), 'placeholder="dd-mm-yyyy"  id="emp_phy_details_date" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('emp_phy_details_date'); ?></span>
                </div>
            </div>
            <?php echo ($PerData->emp_physical_abled==1)?'<div class="form-group col-md-4" id="phy_issue_div">':'<div class="form-group col-md-4" id="phy_issue_div" style="display:none;">';?>
            
                <label for="" class="col-sm-12 col-form-label">Name of the Issuing Authority with Address:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_phy_details_name", isset($PerData->emp_ph_issuing_authority) ? set_value('emp_phy_details_name', $PerData->emp_ph_issuing_authority) : set_value('emp_phy_details_name'), 'placeholder="Name of the Issuing Authority with Address" maxlength="25" id="emp_phy_details_name" class="txtOnly validate[required] form-control" autocomplete="off" '); ?>
                     <span class="error"><?php echo form_error('emp_phy_details_name'); ?></span>
                </div>
            </div>
            
            
        </div>
        <div class="row">
            
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Gadget Allotted for Official Purpose:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_gadget", array("" => "Select Gadget") + gadget(), isset($PerData->emp_gadget) ? set_value('emp_gadget', $PerData->emp_gadget) : set_value('emp_gadget'), 'id="emp_gadget" class="form-control validate[required]" autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_gadget'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Immovable Property Return File:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_propertyfile", array("" => "Select") + single_parent(), isset($PerData->emp_propertyfile) ? set_value('emp_propertyfile', $PerData->emp_propertyfile) : set_value('emp_propertyfile'), 'id="emp_propertyfile" class="form-control " autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_propertyfile'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Return Declaration Year :</label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("declaration_year", array("" => "Select") + passing_years(),  isset($PerData->emp_propertyfile_year) ? set_value('declaration_year', $PerData->emp_propertyfile_year) : set_value('declaration_year'), ' id="declaration_year" class="form-control validate[required]"  autocomplete="off"');?>
                    <span class="error"><?php echo form_error('declaration_year'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Medical History Details:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_medicalhistory", array("" => "Select Disease") + medical_history(), isset($PerData->emp_medicalhistory) ? set_value('emp_medicalhistory', $PerData->emp_medicalhistory) : set_value('emp_medicalhistory'), 'id="emp_medicalhistory" class="form-control " autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_medicalhistory'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Rajbhasha Gyan:<span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_rajbhasa", array("" => "Select") + rajbhasa(), isset($PerData->emp_rajbhasa) ? set_value('emp_rajbhasa', $PerData->emp_rajbhasa) : set_value('emp_rajbhasa'), 'id="emp_rajbhasa" class="form-control " autocomplete="off" '); ?>
                    <span class="error"><?php echo form_error('emp_rajbhasa'); ?></span>
                </div>
            </div>
        </div>
</div>
<!--================================ PRESENT SERVICE DETAILS STARTS =================================-->
<h6><strong  class="font_size_dynamic">Present Posting Details [<span style="color:#f44336; font-size:12px;">*&nbsp;Only fill the data of present posting details of the respective Employee</span>] - </strong></h6>
        <div class="background_div">
        <?php if($this->role_id==2 ){ 
            echo '<div style="display:none;">';
        }else{
            echo '<div style="display:block;">';
        }
        ?>    
        <div class="row"> 
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">Place of Posting  <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->role_name; ?>" disabled>
                    </div>
                </div>
                <?php if($this->role_id==2){ ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">Unit ( Section )<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->region_name.' ( '.$LogData->role_cat_name.' )'; ?>" disabled>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->role_id==3 || $this->role_id==5){ ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">Regional Office <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->region_name; ?>" disabled>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->role_id==4){ ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">ZIET <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->ziet_name; ?>" disabled>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->role_id==5){ ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">School ( Shift ) / KV Code   <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->school_name.' ( '.$LogData->shift.' ) / '.$LogData->mas_code; ?>" disabled>
                    </div>
                </div>
                <?php } ?>
            <?php if($this->role_id==2 ||$this->role_id==3 || $this->role_id==4){ ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">KV Code   <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->mas_code; ?>" disabled>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group col-md-3" >
                    <label for="" class="col-sm-12 col-form-label">Zone  <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" value="<?php echo $LogData->zone_name; ?>" disabled>
                    </div>
                </div> 
        </div>
            <div class="row"><div class="form-group col-md-12"><hr></div></div>
        </div>
            
        <!-- ======================= H I D D E N   S E C T I O N    S T A R T ====================-->
        <?php if($this->role_id==2 ){ 
            echo '<div style="display:block;">';
        }else{
            echo '<div style="display:none;">';
        }
        ?>
        
            <div class="row"> 
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Place of Posting  <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_role_id", array("" => "Select") + role_lists(), isset($PrePost->present_role_id) ? set_value('present_role_id', $PrePost->present_role_id) : set_value('present_role_id',($CurData)?$CurData->role_id:''), 'readonly id="role_id_present" data-id="c" onchange="processRegionPresentDiv();" class="form-control validate[required]" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_role_id'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" id="region_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label" id="present_region_label">Regions<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_region_id", array("" => "Select") + region_lists(), isset($PrePost->present_region_id) ? set_value('present_region_id', $PrePost->present_region_id) : set_value('present_region_id', ($CurData)?$CurData->region_id:''), 'readonly class="form-control validate[required]" onchange="processSchoolPresentDiv();"  id="c_region_present" data-id="c"  autocomplete="off"');    ?>
                        <span class="error"><?php echo form_error('present_region_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="school_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Schools<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_school_id", array("" => "Select") + school_lists(), isset($PrePost->present_school_id) ? set_value('present_school_id', $PrePost->present_school_id) : set_value('present_school_id', ($CurData)?$CurData->school_id:''), 'readonly class="form-control validate[required]"  id="c_school_present" data-id="c" onchange="presentschcode()"  autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_school_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="section_div_present" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Section<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_section_id",section_lists(), isset($PrePost->present_section_id) ? set_value('present_section_id', $PrePost->present_section_id) : set_value('present_section_id', $CurData->role_category), '  class="form-control validate[required]"  id="c_section_present" data-id="c"  autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_section_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="kvcode_div_present" >
                    <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_kvcode", isset($PrePost->present_kvcode) ? set_value('present_kvcode', $PrePost->present_kvcode) : set_value('present_kvcode',$CurData->CCODE), 'readonly id="kvcode_present" class=" validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_kvcode'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="shift_div_present" style="display:none;" >
                    <label for="" class="col-sm-12 col-form-label">Shift<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_shift", array("" => "Select Shift") + shift(), isset($PrePost->present_shift) ? set_value('present_shift', $PrePost->present_shift) : set_value('present_shift',1), 'readonly id="shift_present" class="form-control" autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_shift'); ?></span> 
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Zone<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_zone", array("" => "Select Zone") + zone(), isset($PrePost->present_zone) ? set_value('present_zone', $PrePost->present_zone) : set_value('present_zone'), 'readonly id="present_zone" class="form-control validate[required] " autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_zone'); ?></span> 
                    </div>
                </div>
            </div>
        <div class="row"><div class="form-group col-md-12"><hr></div></div>
        </div>
        <!-- ======================= H I D D E N   S E C T I O N    E N D ====================-->
        
        
        
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label"> Designation:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_designation", isset($PrePost->designationname) ? set_value('present_designation', $PrePost->designationname) : set_value('present_designation'), 'placeholder=" Designation" id="present_post_designation"  class="form-control validate[required] typeahead" autocomplete="off" '); ?>
                        <input type="hidden" value="<?php echo $PrePost->present_designationid; ?>" name="present_designationid" id="present_post_id" autocomplete="off">
                        <span class="error"><?php echo form_error('present_designation'); ?></span>
                        <span class="col-sm-12 error" id="desg_valid"></span>
                    </div>
                    
                </div>

                <div class="form-group col-md-4" id="subject_div_present" <?php if($PrePost->present_designationid==5 || $PrePost->present_designationid==6){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>
                    <label for="" class="col-sm-12 col-form-label">Subject<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_subject", array("" => "Select") + subject_lists(), isset($PrePost->present_subject) ? set_value('present_subject', $PrePost->present_subject) : set_value('present_subject'), 'id="subject_id_present" data-id="c" class="form-control validate[required]" autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_subject_id'); ?></span> 
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Date of Joining:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_joiningdate", isset($PrePost->present_joiningdate) ? set_value('present_joiningdate', $PrePost->present_joiningdate) : set_value('present_joiningdate'), 'placeholder="dd-mm-yyyy"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_joiningdate'); ?></span>
                    </div>
                </div>
                <!--=========================== Added Trail Base Start 21062019 ============================-->
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Whether Appointed on Trial Basis<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_appoint_trail", array("" => "Select") + single_parent(), isset($PrePost->present_appoint_trail) ? set_value('present_appoint_trail', $PrePost->present_appoint_trail) : set_value('present_appoint_trail'), 'onchange="enPresentTrialJoin();" id="enPresent_Trial_Join" class="form-control validate[required] " autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_appoint_trail'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" id="present_join_trial_start" style="display: none;">
                    <label for="" class="col-sm-12 col-form-label">Trial Start Date:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_trailsdate", isset($PrePost->present_trailsdate) ? set_value('present_trailsdate', $PrePost->present_trailsdate) : set_value('present_trailsdate'), 'placeholder="dd-mm-yyyy" id="start_date" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_trailsdate'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="present_join_trial_end"  style="display: none;">
                    <label for="" class="col-sm-12 col-form-label">Trial Completion Date:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_trailedate", isset($PrePost->present_trailedate) ? set_value('present_trailedate', $PrePost->present_trailedate) : set_value('present_trailedate'), 'placeholder="dd-mm-yyyy" id="end_date" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_trailedate'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" id="present_regulardate" style="display: none;" >
                    <label for="" class="col-sm-12 col-form-label">Date of Regularization:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_regulardate", isset($PrePost->present_regulardate) ? set_value('present_regulardate', $PrePost->present_regulardate) : set_value('present_regulardate'), 'placeholder="dd-mm-yyyy"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_regulardate'); ?></span>
                    </div>
                </div>
                <!--=========================== Added Trail Base End 21062019 ============================-->
                
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Direct Recruitment/Promotion/LDE/Transfer <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_appointed_term", array("" => "Select") + direct_recruitment(), isset($PrePost->present_appointed_term) ? set_value('present_appointed_term', $PrePost->present_appointed_term) : set_value('present_appointed_term'), 'class="form-control validate[required]" id="notional_date" onchange="getNotionalDate(this.value);" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('present_appointed_term'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4 notional_date_div"  style="display: none;">
                    <label for="" class="col-sm-12 col-form-label">Notional Date:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_notionaldate", isset($PrePost->emp_phy_details_date) ? set_value('present_notionaldate', $PrePost->present_notionaldate) : set_value('present_notionaldate'), 'placeholder="dd-mm-yyyy"  class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <span class="error"><?php echo form_error('present_notionaldate'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4 notional_date_div" style="display: none;" >
                    <label for="" class="col-sm-12 col-form-label">Reason & Reference No of Notional Promotion:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("reason_notional", isset($PrePost->reason_notional) ? set_value('reason_notional', $PrePost->reason_notional) : set_value('reason_notional'), 'placeholder="Reason of notional promotion" maxlength="16"  class="numericOnly form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('reason_notional'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Whether Selected Against:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_category", array("" => "Select") + reserve_post(), isset($PrePost->present_category) ? set_value('present_category', $PrePost->present_category) : set_value('present_category'), 'class="form-control validate[required]" autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_category'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Seniority No of Post:<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("seniorityno", isset($PrePost->seniorityno) ? set_value('seniorityno', $PrePost->seniorityno) : set_value('seniorityno'), 'placeholder="Seniority No of Present Post" maxlength="16"  class="numericOnly form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('seniorityno'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label">Panel/Vacancy Year:</label>
                    <div class="col-sm-12">
                    <?php echo form_dropdown("present_panel_year", array("" => "Select Year") + panel_years(), isset($PrePost->present_panel_year) ? set_value('present_panel_year', $PrePost->present_panel_year) : set_value('present_panel_year'), 'class="form-control" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('present_panel_year'); ?></span></span>
                    </div>
                </div>
            </div>
        </div>
<!--================================ PRESENT SERVICE DETAILS END =================================-->
        <div class="col-sm-12">
            <div  style="float:right;"> 
                <?php if($PerData->emp_acceptance==1){ ?>
                    <a class="btn btn-warning" id="perSaveBtn" href="<?php echo base_url('service-details/'. EncryptIt($EmpCode));?>" >Goto Next</a>    
                <?php }else{ ?>
                    <input class="btn btn-primary" type="reset" value="Reset">
                    <div class="btn btn-primary" id="perSaveBtn" onclick="chkVacancy();">Save & Next</div>  
                <?php } ?>
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
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
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
        var role_cat= "<?php echo $CurData->role_category; ?>";
        if (region_id != '') {
            if(role_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                    //console.log(response);
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
                if(role_cat==9 || role_cat==10){
                    setTimeout( function(){ 
                    $("#c_section_present").val("").trigger("change");
                    }  , 2000 );
                }
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
                    if(result[3].trim()=='2'){
                        $('#shift_present').val('2').trigger("change");
                    }else{
                        $('#shift_present').val('1').trigger("change");
                    }
                    $("#shift_div_present").css("display", "block");
                    $("#kvcode_div_present").css("display", "block");
                }
            });
        }

    }
    function enPresentTrialJoin() {
        var en_present = $("#enPresent_Trial_Join").val();
        if (en_present !== '' && en_present === '1') {
            $("#present_join_trial_start").css("display", "block");
            $("#present_join_trial_end").css("display", "block");
            $("#present_regulardate").css("display", "block");
        }
        else {
            $("#present_join_trial_start").css("display", "none");
            $("#present_join_trial_end").css("display", "none");
            $("#present_regulardate").css("display", "none");
        }
    }
    function getNotionalDate(NoId){
        var is_notional = $("#notional_date").val();
        if (is_notional !== '' && is_notional === '6') {
            $(".notional_date_div").css("display", "block");
        }
        else {
            $(".notional_date_div").css("display", "none");
        }
    }
    /* ====================================== PRESENT SERVICE ==================================*/
    // To Set Present post Details
    var id='<?php echo sizeof($PrePost); ?>';
    if(id){
        $("#role_id_present").val("<?php echo $PrePost->present_place;?>");
        var prole_id = '<?php echo $PrePost->present_place;?>' ;
        var punit = '<?php echo $PrePost->present_unit;?>';
        if(punit!=0)
        {
            $("#region_div_present").css("display", "block");
            $("#c_region_present").val("<?php echo $PrePost->present_unit;?>");
            if (prole_id == '2') {
                $("#present_region_label").html("Units<span class='reqd'>*</span>");
            }
            else if (prole_id == '4') {
                $("#present_region_label").html("ZIET<span class='reqd'>*</span>");
            } else {
                $("#present_region_label").html("Regions<span class='reqd'>*</span>");
            }
            var psection= '<?php echo $PrePost->present_section;?>';
            if(psection!=0)
            {
                $("#section_div_present").css("display", "block");
                $("#c_section_present").val("<?php echo $PrePost->present_section;?>");
            }
            var pschool= '<?php echo $PrePost->present_school;?>';
            if(pschool!=0)
            {
                $("#school_div_present").css("display", "block");
                $("#c_school_present").val("<?php echo $PrePost->present_school;?>").trigger("change");
                $("#shift_present").val("<?php echo $PrePost->present_shift;?>").trigger("change");
                
            }
        }

        $("#notional_date").val("<?php echo $PrePost->present_appointed_term;?>").trigger("change");
        $("#enPresent_Trial_Join").val("<?php echo $PrePost->present_appoint_trail;?>").trigger("change");
    }
    /* ====================================== CURRENT SERVICE 25/11==================================*/
    // To Set Creent post Details
    <?php if((!$PrePost) && !empty($CurData)){ ?>
   
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
    /* ========================================ABOVE SERVICE ====================================*/
    function processCategoryDropDown(){
        var category = $('#emp_category').val();
        if(category != '' && category != '1'){
            $('#cat_certificate_div').css("display","block"); 
            $('#cat_date_div').css("display","block"); 
            $('#cat_issue_div').css("display","block"); 
        }else{
            $('#cat_certificate_div').css("display","none"); 
            $('#cat_date_div').css("display","none"); 
            $('#cat_issue_div').css("display","none"); 
        }
    } 
        
    function processPhysicalDropDown(){
        var ph = $('#emp_physical_handicapped').val();
        if(ph != '' && ph == '1'){
            $('#phy_type_div').css("display","block"); 
            $('#phy_perc_div').css("display","block"); 
            $('#phy_date_div').css("display","block"); 
            $('#phy_certificate_div').css("display","block"); 
            $('#phy_issue_div').css("display","block");
        }else{
            $('#phy_type_div').css("display","none"); 
            $('#phy_perc_div').css("display","none"); 
            $('#phy_date_div').css("display","none"); 
            $('#phy_certificate_div').css("display","none"); 
            $('#phy_issue_div').css("display","none");
        }
    } 
        
    function openotherreligionfield(){
        var rel = $('#emp_religion').val();
        if(rel == 7){
           $('#otherreligion').css("display","block"); 
        }else{
           $('#otherreligion').css("display","none");  
        }
    }
    function processMaidenName(){

        var emp_gender = $('#emp_gender').val();
        var emp_marital_status = $('#emp_marital_status').val();
        if(emp_gender == "2" && emp_marital_status == '1'){
           $('#maiden_name').css("display","block"); 
        }
        else{
           $('#maiden_name').css("display","none"); 
        }
    } 
    
    function processgpfdiv(){
        var pfvalue = $('#emp_gpfcpfnps').val();
        if(pfvalue != ''){
            $('#gpfcpf_div').css("display","block"); 
        }else{
            $('#gpfcpf_div').css("display","none"); 
        }
    } 
    
    function processphothername(){
        var phvalue = $('#emp_phy_details_type').val();
        if(phvalue != '' && phvalue == '4'){
            $('#emp_ph_othername_div').css("display","block"); 
        }else{
            $('#emp_ph_othername_div').css("display","none"); 
        }
    }

</script>
<script type="text/javascript">  
	
    $( document ).ready(function() {
		const eJsKey = "<?php echo PISJSKEY; ?>";
		dbano="<?php echo $PerData->emp_aadhar_no; ?>";
		if((dbano)&&(dbano!=0)){
			fmano=aes_dec(dbano,eJsKey); $('#emp_aadhaar_no').val(fmano); $('#emp_aadhaar_no_mask').val(fmano);
		} else { 
			$('#emp_aadhaar_no').val(''); $('#emp_aadhaar_no_mask').val('');
		}
		dbpno="<?php echo $PerData->emp_pancard_no; ?>";
		if((dbpno)&&(dbpno!=0)){ fmpno=aes_dec(dbpno,eJsKey); $('#emp_pancard_no').val(fmpno); } else{ $('#emp_pancard_no').val(''); }
		dbsno="<?php echo $PerData->emp_passport_no; ?>";
		if((dbsno)&&(dbsno!=0)){ fmsno=aes_dec(dbsno,eJsKey); $('#emp_passport_no').val(fmsno); } else{ $('#emp_passport_no').val(''); }
		/*
		function clearconsole(){ 
		   console.log(window.console);  
		   if(window.console )
		   {    
			 console.clear();  
		   }
		}
		clearconsole();
		*/
		dbs = $("#emp_aadhaar_no_mask").val();

		if(dbs){
			var frms = dbs.replace(/\S/gi, '●');
			$("#emp_aadhaar_no_mask").val(frms);
		}
		$("#emp_aadhaar_no_mask").focusout(function() { 
			udbs = $("#emp_aadhaar_no_mask").val();
			var ufrms = udbs.replace(/\S/gi, '●');
			$("#emp_aadhaar_no_mask").val(ufrms);  
		});
		$("#emp_aadhaar_no_mask").on('click focusin', function() {
			this.value = $("#emp_aadhaar_no").val();
		});
	});
	
	
	const i = $("#emp_aadhaar_no_mask");
	i.on("input", function () {
  		const $t = $(this);
  		const orig = $t.attr("data-orig") || "";  
  		const v = $t.val().split("");
  		for (l = 0; l < orig.length && l < v.length; l += 1) {
    			v[l] = orig[l];
  		}
  		$t.attr("data-orig", v.join(""));
  		for (l = 0; l < v.length; l += 1) {
    			v[l] = "●";
  		}
  		$t.val(v.join(""));  
  		$("#emp_aadhaar_no").val(i.attr("data-orig"));
	});

$("button").on("click", function () {
  alert(i.attr("data-orig"));
}); 
    
</script>
<script>
	
    function chkVacancy(){
        const eJsKey = "<?php echo PISJSKEY; ?>";
        var EmpId=$('#emp_id').val();
        $('#desg_valid').html();
        
        var DesigId = $('#present_post_id').val();
        if(!DesigId){ $('#desg_valid').html('Select Present Designation'); $('#present_post_id').focus();return false;}
        var SubId   = $('#subject_id_present').val();
        var KvCode  = $('#kvcode_present').val();
        var AD = $('#emp_aadhaar_no').val(); //Aadhaar
		if((AD)&& (AD.length!=12)){$("#aderr").show(); return false; }
                else if((AD)&& (AD.length==12)){$("#aderr").hide();}
                else{AD=null;$("#aderr").hide();}
        var PN = $('#emp_pancard_no').val(); //Pancard
		if(PN.length!=10){$("#pnerr").show(); return false; }else{$("#pnerr").hide();}
        var PS = $('#emp_passport_no').val();//Passport  
		if((PS)&& (PS.length<8 || PS.length>10)){ $("#pserr").show(); return false; }
                else if((PS)&& (PS.length>7 || PS.length<11)){$("#pserr").hide();} // Passport Length 8-10
                else{PS=null;$("#pserr").hide();}
        if(!SubId){ SubId=0; }
            $.ajax({
                url: base_url + 'employee/employee/ChkVacAvail',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' + EmpId+ '&KvCode=' + KvCode+ '&DesigId=' +DesigId+ '&SubId=' +SubId,
                type: 'POST',
                success: function (resp) {
                    //console.log(resp);
                    if(resp>0){
                    //==================================================================================//
                    
                           (AD) ? $('#emp_aadhaar_no').val(aes_enc(AD,eJsKey)):$('#emp_aadhaar_no').val(''); 
                           (PN) ? $('#emp_pancard_no').val(aes_enc(PN,eJsKey)):$('#emp_pancard_no').val(''); 
                           (PS) ? $('#emp_passport_no').val(aes_enc(PS,eJsKey)):$('#emp_passport_no').val(''); 
						   
                           //return false;
                           //$('#perSaveBtn').hide();
                           $('#formID').submit();
                           
                   
                    //=================================================================================//
                    }else{
                        alertify.error("Sorry! There is no vacancy for the present post");
                        return false;
                    }
                }
            });
    }
	function IsAadhaar(e){
                      // alert(e.keyCode);
                       var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                       var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode == 8));
                       document.getElementById("aderr").style.display = ret ? "none" : "inline";
                       return ret;
                   }
	function IsPancard(e){
                      //alert(e.keyCode);
                       var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                       var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 8));
                       document.getElementById("pnerr").style.display = ret ? "none" : "inline";
                       return ret;
                   }
	function IsPassport(e){
                      // alert(e.keyCode);
                       var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                       var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode == 8));
                       document.getElementById("pserr").style.display = ret ? "none" : "inline";
                       return ret;
                   }
</script>
