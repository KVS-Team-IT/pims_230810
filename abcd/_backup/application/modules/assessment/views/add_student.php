<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | Add New Student Details</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo base_url(); ?>vendor/datatable/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>js/encrypt.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
    <style>
        @font-face {
		font-family: 'text-security-disc';
		src: url('fonts/text-security-disc.eot');
		src: url('fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
		url('fonts/text-security-disc.woff') format('woff'),
		url('fonts/text-security-disc.ttf') format('truetype'),
		url('images/text-security-disc.svg#text-security') format('svg');
	}
	input.password {
		font-family: 'text-security-disc';
	}
        .splash {
            position: absolute;
            margin: 0px auto;
            z-index: 2000;
            background: white;
            color: gray;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .splash-title{
            text-align: center;
            vertical-align: middle;
            margin-top: 15%;
        }
    </style>
    <style>
    .buttons-excel{
       background-color: green;
       color: white;
    }
    .table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 1px !important;
    font-size: 11px!important;
    }
    .table thead th {
    vertical-align: bottom!important;
    border-bottom: 1px solid #dee2e6!important;
    background: #014a69!important;
    border-right: 1px solid #c4c0c0!important;
    color: #ffffff!important;
    text-align: center;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 5px 10px!important;
    border-bottom: 1px solid #111!important;
}
table.dataTable thead th, table.dataTable tfoot th {
    font-weight: 400!important;
}
.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
    font-size: 12px!important;
    vertical-align: middle;
}
.step-box {
    border: 1px solid #ccc;
    padding: 11px 3px 0px 5px;
    background: #014a69;
    color: #fff;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}
h6.step-title-0 {
    font-family: 'Roboto', sans-serif;
}
label{font-family: 'Roboto', sans-serif;}
.splash {
    display: none !important;
}
</style>
</head>

<body class="">
<input type="hidden" id="url" value="<?php echo base_url();?>"> 
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash'=>$this->security->get_csrf_hash()));?>
<div id="content-wrapper">
    <div class="container-fluid">
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Assessment Abilities</li>
	</ol> 
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-note"></i>Class -1 Admission Data - 2022-23</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>  
            <div class="card-body user_view">
		
		
			<div class="row">
                     <div class="col-md-2">
                        <label>Region: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					
					
                         
						<?php
						//print_r($this->session->userdata('master_code'));
						if($this->session->userdata('role_id')=='5'){ 
						 
						$region_id=$this->session->userdata('region_id');
						$kvs_id=$this->session->userdata('master_code');
						} else
						{
						$region_id=$emp_list->present_unit;
						$kvs_id=$emp_list->present_kvcode;
						}
						echo form_dropdown("regionss_id", array("" => "Select Region") + masterregion_lists(), isset($region_id) ? set_value('regionss_id', $region_id) : set_value('regionss_id'),  'class="form-control" disabled');
                        echo '<div class="error">'.form_error('region_id').'</div>';
                        ?>
						<input type="hidden" name="region_id" id="region_id" value="<?php echo $region_id; ?>">
						<input type="hidden" name="kv_id" id="kv_id" value="<?php echo $kvs_id; ?>">
                    </div> 
                    <div class="col-md-2">
                        <label>Name of the KV: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <select id="KvList" name="name_of_kv" class="validate[required] form-control">
                            <option value="">Select </option>
                        </select>
						<?php echo '<div class="error">'.form_error('name_of_kv').'</div>'; ?>
                    </div> 
                </div>
				
                <div class="row">

				<div class="col-md-2">
                        <label>School Email: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("email", isset($details->email) ? set_value('email', $details->email) : set_value('email'), 'class="validate[required] form-control" autocomplete="off"');
                        echo '<div class="error">'.form_error('email').'</div>';
                        ?>
                    </div>
					 <div class="col-md-2">
                        <label>Admission No: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("adminssion_no", isset($details->adminssion_no) ? set_value('adminssion_no', $details->adminssion_no) : set_value('adminssion_no'), 'class="validate[required] form-control" maxLength="10"  autocomplete="off"');
                        echo '<div class="error">'.form_error('adminssion_no').'</div>';
                        ?>
                    </div>
                </div>
                <div class="row">
				
                    <div class="col-md-2">
                        <label>Name of the Student : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("name", isset($details->name) ? set_value('name', $details->name) : set_value('name'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo '<div class="error">'.form_error('name').'</div>';
                        ?>
                    </div>
					<div class="col-md-2">
                        <label>Gender : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="gender" name="gender" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Male"  <?php echo  set_select('gender', 'Male'); ?> >Male </option>
                            <option value="Female" <?php echo  set_select('gender', 'Female'); ?>>Female </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('gender').'</div>'; ?>
                    </div>                   
                </div>
                
                
                
				<div class="row">
				<div class="col-md-2">
                        <label>Category  : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="category" name="category" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="General"  <?php echo  set_select('category', 'General'); ?> >General </option>
                            <option value="OBC" <?php echo  set_select('category', 'OBC'); ?>>OBC </option>
                            <option value="SC" <?php echo  set_select('category', 'SC'); ?>>SC </option>
                            <option value="ST" <?php echo  set_select('category', 'ST'); ?>>ST </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('category').'</div>'; ?>
                    </div>   
				<div class="col-md-2">
                        <label>Admission Priority  : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="admission_priority" name="admission_priority" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Category -1" <?php echo  set_select('admission_priority', 'Category -1'); ?>>Category -1 </option>
                            <option value="Category -2" <?php echo  set_select('admission_priority', 'Category -2'); ?>>Category -2 </option>
                            <option value="Category -3" <?php echo  set_select('admission_priority', 'Category -3'); ?>>Category -3 </option>
                            <option value="Category -4" <?php echo  set_select('admission_priority', 'Category -4'); ?>>Category -4 </option>
                            <option value="Category -5" <?php echo  set_select('admission_priority', 'Category -5'); ?>>Category -5 </option>
                            <option value="Category - 6" <?php echo  set_select('admission_priority', 'Category - 6'); ?>>Category - 6 </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('admission_priority').'</div>'; ?>
                    </div> 
					                 
                </div>
				
                <div class="row">
				<div class="col-md-2">
                        <label>Whether admitted under RTE quota? <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="is_rte_quota" name="is_rte_quota" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Yes"  <?php echo  set_select('is_rte_quota', 'Yes'); ?>>Yes </option>
                            <option value="No"  <?php echo  set_select('is_rte_quota', 'No'); ?>>No </option> 
                        </select>
                        <?php   echo '<div class="error">'.form_error('is_rte_quota').'</div>';
                        ?>
                    </div>  
                  <div class="col-md-2">
                        <label>Whether admitted under special dispensation quota? <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="is_dispensation_quota" name="is_dispensation_quota" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Yes" <?php echo  set_select('is_dispensation_quota', 'Yes'); ?>>Yes </option>
                            <option value="No" <?php echo  set_select('is_dispensation_quota', 'No'); ?>>No </option> 
                        </select>
                        <?php   echo '<div class="error">'.form_error('is_dispensation_quota').'</div>';
                        ?>
                    </div> 
					 
                </div>
                <div class="row">
				<div class="col-md-2">
                        <label> Whether the child is differently abled?  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="is_differently_abled" name="is_differently_abled" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Yes" <?php echo  set_select('is_differently_abled', 'Yes'); ?>>Yes </option>
                            <option value="No" <?php echo  set_select('is_differently_abled', 'No'); ?>>No </option> 
                        </select>
                        <?php   echo '<div class="error">'.form_error('is_differently_abled').'</div>';
                        ?>
                    </div> 
                    <div class="col-md-2">
                        <label> If the child is differently abled, please choose the type   </label>
                    </div>
                    <div class="col-md-4">
					<select id="if_differently_abled" name="if_differently_abled" class="form-control">
                            <option value="">Choose </option>
                            <option value="Hearing impaired" <?php echo  set_select('if_differently_abled', 'Hearing impaired'); ?>>Hearing impaired </option>
                            <option value="Orthopedically handicapped" <?php echo  set_select('if_differently_abled', 'Orthopedically handicapped'); ?>>Orthopedically handicapped </option> 
                            <option value="Visually impaired" <?php echo  set_select('if_differently_abled', 'Visually impaired'); ?>>Visually impaired </option> 
                            <option value="others" <?php echo  set_select('if_differently_abled', 'others'); ?>>others </option> 
                        </select>
                        <?php   echo '<div class="error">'.form_error('if_differently_abled').'</div>';
                        ?>
                    </div> 
                   
                </div>
               <div class="row">
			    <div class="col-md-2">
                        <label>Father's Qualification: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="father_qualification" name="father_qualification" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Not educated" <?php echo  set_select('father_qualification', 'Not educated'); ?>>Not educated </option>
                            <option value="Primary education" <?php echo  set_select('father_qualification', 'Primary education'); ?>>Primary education </option> 
                            <option value="Secondary Education (Class X)" <?php echo  set_select('father_qualification', 'Secondary Education (Class X)'); ?>>Secondary Education (Class X) </option> 
                            <option value="Senior Secondary Education (Class XII)" <?php echo  set_select('father_qualification', 'Senior Secondary Education (Class XII)'); ?>>Senior Secondary Education (Class XII) </option> 
                            <option value="Diploma holder" <?php echo  set_select('father_qualification', 'Diploma holder'); ?>>Diploma holder </option> 
                            <option value="Graduate" <?php echo  set_select('father_qualification', 'Graduate'); ?>>Graduate </option> 
                            <option value="Post Graduate" <?php echo  set_select('father_qualification', 'Post Graduate'); ?>>Post Graduate </option> 
                            <option value="M. Phil" <?php echo  set_select('father_qualification', 'M. Phil'); ?>>M. Phil </option> 
                            <option value="Doctorate" <?php echo  set_select('father_qualification', 'Doctorate'); ?>>Doctorate </option> 
                            <option value="Under guardian's care" <?php echo  set_select('father_qualification', 'Under guardian\'s care'); ?>>Under guardian's care </option>  
                        </select>
                         <?php echo '<div class="error">'.form_error('father_qualification').'</div>';
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Mother's Qualification: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <select id="mother_qualification" name="mother_qualification" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Not educated" <?php echo  set_select('father_qualification', 'Not educated'); ?>>Not educated </option>
                            <option value="Primary education" <?php echo  set_select('father_qualification', 'Primary education'); ?>>Primary education </option> 
                            <option value="Secondary Education (Class X)" <?php echo  set_select('father_qualification', 'Secondary Education (Class X)'); ?>>Secondary Education (Class X) </option> 
                            <option value="Senior Secondary Education (Class XII)" <?php echo  set_select('father_qualification', 'Senior Secondary Education (Class XII)'); ?>>Senior Secondary Education (Class XII) </option> 
                            <option value="Diploma holder" <?php echo  set_select('father_qualification', 'Diploma holder'); ?>>Diploma holder </option> 
                            <option value="Graduate" <?php echo  set_select('father_qualification', 'Graduate'); ?>>Graduate </option> 
                            <option value="Post Graduate" <?php echo  set_select('father_qualification', 'Post Graduate'); ?>>Post Graduate </option> 
                            <option value="M. Phil" <?php echo  set_select('father_qualification', 'M. Phil'); ?>>M. Phil </option> 
                            <option value="Doctorate" <?php echo  set_select('father_qualification', 'Doctorate'); ?>>Doctorate </option> 
                            <option value="Under guardian's care" <?php echo  set_select('father_qualification', 'Under guardian\'s care'); ?>>Under guardian's care </option>  
                       </select>
                         <?php echo '<div class="error">'.form_error('mother_qualification').'</div>';
                        ?>
                    </div>
                   
                </div>
                <div class="row">
					 <div class="col-md-2">
                        <label>Mother Tongue: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="mother_tongu" name="mother_tongu" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Assamese" <?php echo  set_select('mother_tongu', 'Assamese'); ?>>Assamese </option> 
                            <option value="Bengali" <?php echo  set_select('mother_tongu', 'Bengali'); ?>>Bengali </option> 
                            <option value="Bodo" <?php echo  set_select('mother_tongu', 'Bodo'); ?>>Bodo </option> 
                            <option value="Dogri" <?php echo  set_select('mother_tongu', 'Dogri'); ?>>Dogri </option> 
                            <option value="Gujarati" <?php echo  set_select('mother_tongu', 'Gujarati'); ?>>Gujarati </option> 
                            <option value="Hindi" <?php echo  set_select('mother_tongu', 'Hindi'); ?>>Hindi </option> 
                            <option value="Kannada" <?php echo  set_select('mother_tongu', 'Kannada'); ?>>Kannada </option> 
                            <option value="Kashmiri" <?php echo  set_select('mother_tongu', 'Kashmiri'); ?>>Kashmiri </option> 
                            <option value="Konkani" <?php echo  set_select('mother_tongu', 'Konkani'); ?>>Konkani </option> 
                            <option value="Malayalam" <?php echo  set_select('mother_tongu', 'Malayalam'); ?>>Malayalam </option> 
                            <option value="Manipuri" <?php echo  set_select('mother_tongu', 'Manipuri'); ?>>Manipuri </option> 
                            <option value="Marathi" <?php echo  set_select('mother_tongu', 'Marathi'); ?>>Marathi </option> 
                            <option value="Maithili" <?php echo  set_select('mother_tongu', 'Maithili'); ?>>Maithili </option> 
                            <option value="Nepali" <?php echo  set_select('mother_tongu', 'Nepali'); ?>>Nepali </option> 
                            <option value="Oriya" <?php echo  set_select('mother_tongu', 'Oriya'); ?>>Oriya </option> 
                            <option value="Punjabi" <?php echo  set_select('mother_tongu', 'Punjabi'); ?>>Punjabi </option> 
                            <option value="Sanskrit" <?php echo  set_select('mother_tongu', 'Sanskrit'); ?>>Sanskrit </option> 
                            <option value="Santhali" <?php echo  set_select('mother_tongu', 'Santhali'); ?>>Santhali </option> 
                            <option value="Sindhi" <?php echo  set_select('mother_tongu', 'Sindhi'); ?>>Sindhi </option> 
                            <option value="Tamil" <?php echo  set_select('mother_tongu', 'Tamil'); ?>>Tamil </option> 
                            <option value="Telugu" <?php echo  set_select('mother_tongu', 'Telugu'); ?>>Telugu </option> 
                            <option value="Urdu" <?php echo  set_select('mother_tongu', 'Urdu'); ?>>Urdu </option> 
                            <option value="Any other" <?php echo  set_select('mother_tongu', 'Any other'); ?>>Any other </option>  
                        </select>
                         <?php  echo '<div class="error">'.form_error('mother_tongu').'</div>';
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No. of years of pre-schooling exposure to the child. If no pre-schooling exposure, choose NIL.  : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="years_of_pre-schooling" name="years_of_pre-schooling" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="NIL" <?php echo  set_select('years_of_pre-schooling', 'NIL'); ?>>NIL </option>
                            <option value="one" <?php echo  set_select('years_of_pre-schooling', 'one'); ?>>one </option>
                            <option value="two" <?php echo  set_select('years_of_pre-schooling', 'two'); ?>>two </option>
                            <option value="three" <?php echo  set_select('years_of_pre-schooling', 'three'); ?>>three </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('years_of_pre-schooling').'</div>';
                        ?>
                    </div>
					                
                </div>
                 <div class="row">
					<div class="col-md-2">
                        <label>Number of Siblings : <span class="reqd">*</span></label><p>excluding the child admitted</p>
                    </div>
                    <div class="col-md-4">
					 <select id="number_of_sibling" name="number_of_sibling" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Nil" <?php echo  set_select('number_of_sibling', 'Nil'); ?>>Nil </option>
                            <option value="one" <?php echo  set_select('number_of_sibling', 'one'); ?>>one </option>
                            <option value="two" <?php echo  set_select('number_of_sibling', 'two'); ?>>two </option>
                            <option value="three and above" <?php echo  set_select('number_of_sibling', 'three and above'); ?>>three and above </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('number_of_sibling').'</div>'; ?>
                    </div>   
                    <div class="col-md-2">
                        <label>Whether the sibling(s) is/are studying in the same KV? :</label>
                    </div>
                    <div class="col-md-4">
					 <select id="is_sibling_studying_same" name="is_sibling_studying_same" class="form-control">
                            <option value="">Choose </option>
                            <option value="Yes" <?php echo  set_select('is_sibling_studying_same', 'Yes'); ?>>Yes </option>
                            <option value="No" <?php echo  set_select('is_sibling_studying_same', 'No'); ?>>No </option>  
                        </select>
                        <?php echo '<div class="error">'.form_error('is_sibling_studying_same').'</div>';
                        ?>
                    </div>
					                
                </div>
				<div class="row">
					<div class="col-md-2">
                        <label>Classes in which siblings are studying :</label>
                    </div>
                    <div class="col-md-4">
					 <select id="sibling_class" name="sibling_class[]" class="form-control" multiple>
                            <option value="">Choose </option>
                            <option value="Class 1" <?php echo  set_select('sibling_class', 'Class 1'); ?>>Class 1 </option>
                            <option value="Class 2" <?php echo  set_select('sibling_class', 'Class 2'); ?>>Class 2 </option>
                            <option value="Class 3" <?php echo  set_select('sibling_class', 'Class 3'); ?>>Class 3 </option>
                            <option value="Class 4" <?php echo  set_select('sibling_class', 'Class 4'); ?>>Class 4 </option>
                            <option value="Class 5" <?php echo  set_select('sibling_class', 'Class 5'); ?>>Class 5 </option>
                            <option value="Class 6" <?php echo  set_select('sibling_class', 'Class 6'); ?>>Class 6 </option>
                            <option value="Class 7" <?php echo  set_select('sibling_class', 'Class 7'); ?>>Class 7 </option>
                            <option value="Class 8" <?php echo  set_select('sibling_class', 'Class 8'); ?>>Class 8 </option>
                            <option value="Class 9" <?php echo  set_select('sibling_class', 'Class 9'); ?>>Class 9 </option>
                            <option value="Class 10" <?php echo  set_select('sibling_class', 'Class 10'); ?>>Class 10 </option>
                            <option value="Class 11" <?php echo  set_select('sibling_class', 'Class 11'); ?>>Class 11 </option>
                            <option value="Class 12" <?php echo  set_select('sibling_class', 'Class 12'); ?>>Class 12 </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('sibling_class').'</div>'; ?>
                    </div>   
                    <div class="col-md-2">
                        <label>Type of Gadgets available : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="type_of_gadgets" name="type_of_gadgets[]" class="validate[required] form-control" multiple>
                            <option value="">Choose </option>
                            <option value="Desktop computer" <?php echo  set_select('type_of_gadgets', 'Desktop computer'); ?>>Desktop computer</option>
                            <option value="Laptop computer" <?php echo  set_select('type_of_gadgets', 'Laptop computer'); ?>>Laptop computer </option>
                            <option value="Smart phone with internet connectivity" <?php echo  set_select('type_of_gadgets', ' phone with internet connectivity'); ?>>Smart phone with internet connectivity </option>
                            <option value="Smart phone without internet connectivity" <?php echo  set_select('type_of_gadgets', 'Smart phone without internet connectivity'); ?>>Smart phone without internet connectivity </option>
                            <option value="Basic phone" <?php echo  set_select('type_of_gadgets', 'Basic phone'); ?>>Basic phone </option> 
                        </select>
                        <?php  echo '<div class="error">'.form_error('type_of_gadgets').'</div>';
                        ?>
                    </div>
					                
                </div>
			<div class="row">
					<div class="col-md-2">
                        <label>Number of Gadgets available : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <select id="no_of_gadgets" name="no_of_gadgets" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="One" <?php echo  set_select('no_of_gadgets', 'One'); ?>>One </option>
                            <option value="two" <?php echo  set_select('no_of_gadgets', 'two'); ?>>two </option>
                            <option value="three" <?php echo  set_select('no_of_gadgets', 'three'); ?>>three </option>
                            <option value="four" <?php echo  set_select('no_of_gadgets', 'four'); ?>>four </option>
                            <option value="five" <?php echo  set_select('no_of_gadgets', 'five'); ?>>five </option>
                            <option value="six and above" <?php echo  set_select('no_of_gadgets', 'six and above'); ?>>six and above </option>
                        </select>
                        <?php  echo '<div class="error">'.form_error('no_of_gadgets').'</div>'; ?>
                    </div>   
                    <div class="col-md-2">
                        <label>Gadget availability - Time  : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select id="gadget_availability_time" name="gadget_availability_time" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="available all the time" <?php echo  set_select('gadget_availability_time', 'available all the time'); ?>>available all the time </option>
                            <option value="7 to 8 am" <?php echo  set_select('gadget_availability_time', '7 to 8 am'); ?>>7 to 8 am </option>
                            <option value="7 to 9 am" <?php echo  set_select('gadget_availability_time', '7 to 9 am'); ?>>7 to 9 am </option>
                            <option value="9 to 11 am" <?php echo  set_select('gadget_availability_time', '9 to 11 am'); ?>>9 to 11 am </option>
                            <option value="11 am to 1 pm" <?php echo  set_select('gadget_availability_time', '11 am to 1 pm'); ?>>11 am to 1 pm </option>
                            <option value="1 to 3 pm" <?php echo  set_select('gadget_availability_time', '1 to 3 pm'); ?>>1 to 3 pm </option>
                            <option value="3 to 4 pm" <?php echo  set_select('gadget_availability_time', '3 to 4 pm'); ?>>3 to 4 pm </option>
                            <option value="4 to 5 pm" <?php echo  set_select('gadget_availability_time', '4 to 5 pm'); ?>>4 to 5 pm </option>
                            <option value="7 am to 1 pm" <?php echo  set_select('gadget_availability_time', '7 am to 1 pm'); ?>>7 am to 1 pm </option>
                            <option value="2pm to 5 pm" <?php echo  set_select('gadget_availability_time', '2pm to 5 pm'); ?>>2pm to 5 pm </option> 
                        </select>
                        <?php  echo '<div class="error">'.form_error('gadget_availability_time').'</div>';
                        ?>
                    </div>
					                 
                </div>	
				<div class="row">
					<div class="col-md-2">
                        <label>Contact number of parent : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					  <?php echo form_input("parent_mobile_no", isset($details->parent_mobile_no) ? set_value('parent_mobile_no', $details->parent_mobile_no) : set_value('parent_mobile_no'), 'class="numericOnly validate[required] form-control" maxLength="10"  autocomplete="off"');
                        echo '<div class="error">'.form_error('parent_mobile_no').'</div>';
                        ?>
                    </div>  
                    <div class="col-md-2">
                        <label>Email id of parent  : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <?php echo form_input("parent_email_id", isset($details->parent_email_id) ? set_value('parent_email_id', $details->parent_email_id) : set_value('parent_email_id'), 'class="validate[required] form-control"  autocomplete="off"');
                        echo '<div class="error">'.form_error('parent_email_id').'</div>';
                        ?> 
                    </div>
					                 
                </div>	
                 <div class="row">
					<div class="col-md-2">
                        <label>Whether the parents have any specific competence which can be utilized by the KV?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					  <select id="is_parent_competence" name="is_parent_competence" class="validate[required] form-control">
                            <option value="">Choose </option>
                            <option value="Yes" <?php echo  set_select('is_parent_competence', 'Yes'); ?>>Yes </option>
                            <option value="No" <?php echo  set_select('is_parent_competence', 'No'); ?>>No </option>  
                        </select>
						<?php echo '<div class="error">'.form_error('is_parent_competence').'</div>'; ?> 
                    </div>  
                    <div class="col-md-2">
                        <label>If the parents have any specific competence which can be utilized by the KV and willing to extend support to KV, choose the relevant item :</label>
                    </div>
                    <div class="col-md-4">
					  <select id="if_parent_competence" name="if_parent_competence" class="form-control">
                            <option value="">Choose </option>
                            <option value="Music" <?php echo  set_select('if_parent_competence', 'Music'); ?>>Music </option>
                            <option value="Dance" <?php echo  set_select('if_parent_competence', 'Dance'); ?>>Dance </option>  
                            <option value="Art" <?php echo  set_select('if_parent_competence', 'Art'); ?>>Art </option>  
                            <option value="Sports and Games" <?php echo  set_select('if_parent_competence', 'Sports and Games'); ?>>Sports and Games </option>  
							<option value="Any vocation related competence other than the above" <?php echo  set_select('if_parent_competence', 'Any vocation related competence other than the above'); ?>>Any vocation related competence other than the above</option>
                        </select>
						<?php echo '<div class="error">'.form_error('if_parent_competence').'</div>'; ?> 
                    </div>
					                 
                </div>	
				
				 <div class="row">
					<div class="col-md-2">
                        <label>If vocation related competence of parents(s.no.5) is chosen above, Please specify the area of competence</label>
                    </div>
                    <div class="col-md-4">
					 <?php echo form_input("parent_competence_area", isset($details->parent_competence_area) ? set_value('parent_competence_area', $details->parent_competence_area) : set_value('parent_competence_area'), 'class="form-control" autocomplete="off"');
                        echo '<div class="error">'.form_error('parent_competence_area').'</div>';
                        ?> 
                    </div>  
                    <div class="col-md-2">
                        <label>If the child has any exceptional quality/talent/capacity, please describe. </label>
                    </div>
                    <div class="col-md-4">
					  <?php echo form_input("if_quality_talent_capacity", isset($details->if_quality_talent_capacity) ? set_value('if_quality_talent_capacity', $details->if_quality_talent_capacity) : set_value('if_quality_talent_capacity'), 'class="form-control" autocomplete="off"');
                        echo '<div class="error">'.form_error('if_quality_talent_capacity').'</div>';
                        ?> 
                    </div>
					                
                </div>	
				<div class="row">
				<div class="col-md-2">
                        <label>Oral Language Ability in English  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="oral_language_eng" class="form-control"> 
							<option value="">Choose</option>
							<option value="Shows hesitation / faces difficulty in responding; needs support" <?php echo  set_select('oral_language_eng', 'Shows hesitation / faces difficulties in responding; needs support'); ?>>Shows hesitation / faces difficulty in responding; needs support </option>
							<option value="Able to respond to age appropriate words and ideas" <?php echo  set_select('oral_language_eng', 'Able to respond to age appropriate words and ideas'); ?>>Able to respond to age appropriate words and ideas </option>
							<option value="Speaks audibly but struggles to express thoughts, feelings, and ideas clearly." <?php echo  set_select('oral_language_eng', 'Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.'); ?>>Speaks audibly but struggles to express thoughts, feelings, and ideas clearly. </option>
							<option value="Speaks audibly and expresses thoughts, feelings, and ideas clearly." <?php echo  set_select('oral_language_eng', 'Speaks audibly and expresses thoughts, feelings, and ideas clearly.'); ?>>Speaks audibly and expresses thoughts, feelings, and ideas clearly. </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('oral_language_eng').'</div>';
                        ?> 
                    </div>   
                    <div class="col-md-2">
                        <label>Writing Ability in English <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="write_language_eng" class="form-control"> 
							<option value="">Choose</option>
							<option value="Yet to learn basic strokes of writing; needs support" <?php echo  set_select('write_language_eng', 'Yet to learn basic strokes of writing; needs support'); ?>>Yet to learn basic strokes of writing; needs support </option>
							<option value="Able to recognize and write a few letters/symbols and draw sketches of a few objects." <?php echo  set_select('write_language_eng', 'Able to recognize and write a few letters/symbols and draw sketches of a few objects.'); ?>>Able to recognize and write a few letters/symbols and draw sketches of a few objects. </option>							
							<option value="Able to write all the letters of the Alphabet/symbols and draw sketches of many objects." <?php echo  set_select('write_language_eng', 'Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.'); ?>>Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.</option>
							<option value="Able to write many words and draw good sketches of many objects." <?php echo  set_select('write_language_eng', 'Able to write many words and draw good sketches of many objects.'); ?>>Able to write many words and draw good sketches of many objects. </option>
							</select>
					  <?php  echo '<div class="error">'.form_error('write_language_eng').'</div>';
                        ?> 
                    </div>
					                 
                </div>	
				<div class="row">
					<div class="col-md-2">
                        <label>Reading Ability in English <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="read_language_eng" class="form-control"> 
							<option value="">Choose</option>
							<option value="Has difficulty in recognizing the letters of the alphabet; needs support" <?php echo  set_select('read_language_eng', 'Has difficulty in recognizing the letters of the alphabet; needs support'); ?>>Has difficulty in recognizing the letters of the alphabet; needs support</option>
							<option value="Able to recognize and read all the letters of the alphabet and a few words" <?php echo  set_select('read_language_eng', 'Able to recognize and read all the letters of the alphabet and a few words'); ?>>Able to recognize and read all the letters of the alphabet and a few words </option>
							<option value="Able to recognize and read a few words and their meanings" <?php echo  set_select('read_language_eng', 'Able to recognize and read a few words and their meanings'); ?>>Able to recognize and read a few words and their meanings</option>
							<option value="Able to read simple sentences fluently and comprehend them" <?php echo  set_select('read_language_eng', 'Able to read simple sentences fluently and comprehend them'); ?>>Able to read simple sentences fluently and comprehend them </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('read_language_eng').'</div>';
                        ?> 
                    </div>  
                    <div class="col-md-2">
                        <label>Numeracy Skills <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="is_numeracy_skills" class="form-control"> 
							<option value="">Choose</option>
							<option value="Knows and counts numbers upto 10" <?php echo  set_select('is_numeracy_skills', 'Knows and counts numbers upto 10'); ?>>Knows and counts numbers upto 10</option>
							<option value="Able to write numbers upto 10" <?php echo  set_select('is_numeracy_skills', 'Able to write numbers upto 10'); ?>>Able to write numbers upto 10 </option>
							<option value="Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral" <?php echo  set_select('is_numeracy_skills', 'Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral'); ?>>Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral</option>
							<option value="Able to perform operations and recognize shapes and patterns" <?php echo  set_select('is_numeracy_skills', 'Able to perform operations and recognize shapes and patterns'); ?>>Able to perform operations and recognize shapes and patterns </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('is_numeracy_skills').'</div>';
                        ?> 
                    </div>
					                  
                </div>	
				<div class="row">
					<div class="col-md-2">
                        <label>मौखिक भाषा क्षमता ( हिंदी) <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="oral_language_hindi" class="form-control"> 
							<option value="">Choose</option>
							<option value="कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।" <?php echo  set_select('oral_language_hindi', 'कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।'); ?>>कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।</option>
							<option value="आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । " <?php echo  set_select('oral_language_hindi', 'आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । '); ?>>आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । </option>
							<option value="उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।" <?php echo  set_select('oral_language_hindi', 'उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।'); ?>>उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।</option>
							<option value="उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।" <?php echo  set_select('oral_language_hindi', 'उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।'); ?>>उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है । </option>
							</select>
					 <?php  echo '<div class="error">'.form_error('oral_language_hindi').'</div>'; ?> 
                    </div> 
                    <div class="col-md-2">
                        <label>लेखन क्षमता (हिंदी)  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="write_language_hindi" class="form-control">     
							<option value="">Choose</option>
							<option value="लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।" <?php echo  set_select('write_language_hindi', 'लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।'); ?>>लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।</option>
							<option value="कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।" <?php echo  set_select('write_language_hindi', 'कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।'); ?>>कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है । </option>
							<option value="वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।" <?php echo  set_select('write_language_hindi', 'वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।'); ?>>वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।</option>
							<option value="अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।" <?php echo  set_select('write_language_hindi', 'अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।'); ?>>अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है । </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('write_language_hindi').'</div>'; ?> 
                    </div>
					                 
                </div>	
				<div class="row">
				<div class="col-md-2">
                        <label>पठन क्षमता (हिंदी)<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					<select name="read_language_hindi" class="form-control"> 
							<option value="">Choose</option>
							<option value="वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।" <?php echo  set_select('read_language_hindi', 'वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।'); ?>>वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।</option>
							<option value="वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।" <?php echo  set_select('read_language_hindi', 'वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।'); ?>>वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है । </option>
							<option value="कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।" <?php echo  set_select('read_language_hindi', 'कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।'); ?>>कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।</option>
							<option value="सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । " <?php echo  set_select('read_language_hindi', 'सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । '); ?>>सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । </option>
							</select>
					 <?php    echo '<div class="error">'.form_error('read_language_hindi').'</div>'; ?> 
                    </div>  
					
					<?php /* <div class="col-md-2">
                        <label>Transfered from which KV<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
					 <?php echo form_input("transfered", isset($details->transfered) ? set_value('transfered', $details->transfered) : set_value('transfered'), 'class="form-control" autocomplete="off" placeholder="Enter Text"');
                        echo '<div class="error">'.form_error('transfered').'</div>';
                        ?>  
                    </div>   */ ?> 
					
					</div>
            </div>    
				
			 
			 
			   
			 
		</div>			 
       </div>	
		
                <div class="row"> 
                    <div class="col-md-12 text-right">
                        <?php echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                        <input type="reset" value="Cancel" class="btn btn-default">
                    </div>
                </div>
                <?php echo form_close(); ?>
    </div>
</div>
</div>
<script type="text/javascript">
    <?php 
    $LoggedID=$this->session->userdata('master_code');
    $roleID=$this->session->userdata('role_id');
    if($roleID==6)
    {
        $kvCode_pre=$emp_list->present_kvcode;
         if(strlen($kvCode_pre)==6){//for shift two
        $kvCode1=substr($kvCode_pre, 0, -2);
        }else
        {
         $kvCode1=$kvCode_pre; 
        }  

    }else
    {
    if(strlen($LoggedID)==6){//for shift two
        $kvCode1=substr($LoggedID, 0, -2);
    }else
    {
       $kvCode1=$LoggedID;
    }  
}
    ?> 

    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
	GetKVListing();
	function GetKVListing(){
        var RO = '<?php echo $region_id; ?>';
        var KV_ID = '<?php echo $kvCode1; ?>';
        if(!RO){
            alert("Please Select State or Region First");
            return false;
        }else{
            $.ajax({
                url: '<?php echo site_url('assesment_filtered-kv'); ?>',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&kv_ID=' + KV_ID,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData){
                        $('#KvList').select2();
                        var options = $('#KvList');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.NME).text(this.NME));
                        });
                      //  $('.kv-list').css("display", "block");
                    }else{
                       // $('.kv-list').css("display", "none");
                    }
                }
            });
        }
    }
	
	$(document).ready(function() {
        $("#sibling_class").select2({
                multiple: true,
            }); 
	});
	$(document).ready(function() {
        $("#type_of_gadgets").select2({
                multiple: true,
            }); 
	});
	
			
</script>
</body>
</html>