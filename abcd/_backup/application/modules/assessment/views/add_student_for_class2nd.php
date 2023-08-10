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
            <div class="card-header"><i class="fas fa-note"></i>Class -2 Admission Data - 2022-23</div>
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
            <div class="card-header"><i class="fas fa-eye"></i> Entry Level Assessment</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?> 
            
            <div class="card-body">
                <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Oral Language Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Converse with friends and class teacher about her needs, surroundings</span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_converse" class="form-check-input oral_converse" value="1" autocomplete="off" required  <?php echo ($details->oral_converse=='1')? 'checked':'';?>>Hesitates to initiate speech/ struggles to ask questions/ speech is halting/ and seldom responds
appropriately <br>
                            <input type="radio" name="oral_converse" class="form-check-input oral_converse" value="2" autocomplete="off" required <?php echo ($details->oral_converse=='2')? 'checked':'';?>>Sometimes initiates speech/ rarely asks questions/ speaks hesitantly/ and sometimes responds
appropriately<br>
                            <input type="radio" name="oral_converse" class="form-check-input oral_converse" value="3" autocomplete="off" required <?php echo ($details->oral_converse=='3')? 'checked':'';?>>Initiates speech/ asks questions/ speaks evenly/ and frequently responds appropriately<br>
                            <input type="radio" name="oral_converse" class="form-check-input oral_converse" value="4" autocomplete="off" required <?php echo ($details->oral_converse=='4')? 'checked':'';?>> Eagerly initiates speech/ easily asks questions/ speaks spontaneously/ and always responds appropriately<br>                            </div>
                        </div>
                         <?php   echo '<div class="error">'.form_error('oral_converse').'</div>'; ?>     
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) Talks about the print available in the classroom</span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_talks" class="form-check-input oral_talks" value="1" autocomplete="off" required  <?php echo ($details->oral_talks=='1')? 'checked':'';?>>Ideas unorganised/ speech is halting/ and doesn't use body language at all; often requires prompt / support  <br>
                            <input type="radio" name="oral_talks" class="form-check-input oral_talks" value="2" autocomplete="off" required  <?php echo ($details->oral_talks=='2')? 'checked':'';?>>Mixed main ideas with sub-ideas/ inappropriate speed/ and rarely uses body language to emphasize ideas<br>
                            <input type="radio" name="oral_talks" class="form-check-input oral_talks" value="3" autocomplete="off" required  <?php echo ($details->oral_talks=='3')? 'checked':'';?>>Organizes speaking by using main ideas but left I or 2/ mostly with appropriate speed/ frequently uses body language to emphasize ideas<br>
                            <input type="radio" name="oral_talks" class="form-check-input oral_talks" value="4" autocomplete="off" required  <?php echo ($details->oral_talks=='4')? 'checked':'';?>> Organizes speaking by using main ideas from the print/ always with appropriate speed/ and always uses body language to emphasize ideas<br>                            </div>
                        </div>
                         <?php   echo '<div class="error">'.form_error('oral_talks').'</div>'; ?>        
<div class="col-sm-12">  
                                <span class="heading_abl">(iii) Recites rhymes/songs/poems with action</span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_recites" class="form-check-input oral_recites" value="1" autocomplete="off" required <?php echo ($details->oral_recites=='1')? 'checked':'';?>>Tries to recite the poem or rhyme but requires support / shows nervousness/ inaudible  <br>
                            <input type="radio" name="oral_recites" class="form-check-input oral_recites" value="2" autocomplete="off" required <?php echo ($details->oral_recites=='2')? 'checked':'';?>>Recites with few errors & doesn't recover/ gestures & action lacking/ speaks clearly but indistinct at times<br>
                            <input type="radio" name="oral_recites" class="form-check-input oral_recites" value="3" autocomplete="off" required <?php echo ($details->oral_recites=='3')? 'checked':'';?>>Recites without errors/ frequently employs geltures and action/ speaks clearly with some lapses<br>
                            <input type="radio" name="oral_recites" class="form-check-input oral_recites" value="4" autocomplete="off" required <?php echo ($details->oral_recites=='4')? 'checked':'';?>>Recites without error/ always employs gestures and action/ speaks clearly with appropriate modulation<br>                            </div>
                        </div>
                     <?php   echo '<div class="error">'.form_error('oral_recites').'</div>'; ?>                                 
                    </div>
                    <!-- Reading   -->
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Reading Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Participate in read aloud/story telling session and demonstrate comprehension through activities </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_participate" class="form-check-input reading_participate" value="1" autocomplete="off" required <?php echo ($details->reading_participate=='1')? 'checked':'';?>>Hesitant to read without prompt or support / difficulty in answering comprehension questions/ and not confident to act out the story <br>
                            <input type="radio" name="reading_participate" class="form-check-input reading_participate" value="2" autocomplete="off" required <?php echo ($details->reading_participate=='2')? 'checked':'';?>>Often participates / answers questions / and at times hesitant to act out the story<br>
                            <input type="radio" name="reading_participate" class="form-check-input reading_participate" value="3" autocomplete="off" required <?php echo ($details->reading_participate=='3')? 'checked':'';?>>Mostly participates/ answers questions/ and acts out the story <br>
                            <input type="radio" name="reading_participate" class="form-check-input reading_participate" value="4" autocomplete="off" required <?php echo ($details->reading_participate=='4')? 'checked':'';?>> Actively participates/ answers all questions/ and act out the story effectively; also supports others<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('reading_participate').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) Uses sound symbol correspondence to read words </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_uses" class="form-check-input reading_uses" value="1" autocomplete="off" required <?php echo ($details->reading_uses=='1')? 'checked':'';?>> Tries to name letters and its sounds correctly/ struggling to sound the words by phoneme blending/
addition and substitution methods; often requires support of the teacher   <br>
                            <input type="radio" name="reading_uses" class="form-check-input reading_uses" value="2" autocomplete="off" required <?php echo ($details->reading_uses=='2')? 'checked':'';?>>Names some letters and its sounds correctly/ sounding the words by phoneme blending/ addition and
substitution methods with some mistakes <br>
                            <input type="radio" name="reading_uses" class="form-check-input reading_uses" value="3" autocomplete="off" required <?php echo ($details->reading_uses=='3')? 'checked':'';?>>Names many letters and its sounds correctly/ sounding the words by phoneme blending/ addition and substitution methods without mistakes <br>
                            <input type="radio" name="reading_uses" class="form-check-input reading_uses" value="4" autocomplete="off" required <?php echo ($details->reading_uses=='4')? 'checked':'';?>> Names all the letters and its sounds correctly/ sounding the words by phoneme blending, addition and substitution methods without any mistak<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('reading_uses').'</div>'; ?> 
<div class="col-sm-12">  
                                <span class="heading_abl">(iii) Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_sentences" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->reading_sentences=='1')? 'checked':'';?>>Tries to articulate words clearly/ reads word by word and must be assisted with many words/ provides an unrelated response  <br>
                            <input type="radio" name="reading_sentences" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->reading_sentences=='2')? 'checked':'';?>>Articulates some words clearly/ reads word by word with no logical grouping/ provides a somewhat
meaningful inference <br>
                            <input type="radio" name="reading_sentences" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->reading_sentences=='3')? 'checked':'';?>>Articulates many words clearly/ usually groups words in a logical manner/ makes a meaningful inference<br>
                            <input type="radio" name="reading_sentences" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->reading_sentences=='4')? 'checked':'';?>>Articulates all the words clearly/ groups words logically when reading aloud/ makes a meaningful inference; helps others to read<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('reading_sentences').'</div>'; ?>                             
                    </div>
                    <!-- Writing -->
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Writing Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Basic writing abilities </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_words" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->writing_words=='1')? 'checked':'';?>> Writes words but with frequent spellings' mistakes/ obscure handwriting with non-uniform strokes and spacing <br>
                            <input type="radio" name="writing_words" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->writing_words=='2')? 'checked':'';?>> Writes words with some spellings' mistakes/ decipherable handwriting/uses few punctuations<br>
                            <input type="radio" name="writing_words" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->writing_words=='3')? 'checked':'';?>> Writes words correctly/ legible handwriting/uses some punctuations <br>
                            <input type="radio" name="writing_words" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_words=='4')? 'checked':'';?>> Writes words with correct spelling/ distinct handwriting/ proper punctuation<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_words').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) Convey meanings and represent names through drawing, writing, and
making things </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_convey" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->writing_convey=='1')? 'checked':'';?>> Has difficulty in conveying any meaning through drawings in greeting card/ draws objects or people/ and makes shapes of letters using dough/clay with some resemblance; often requires assistance  <br>
                            <input type="radio" name="writing_convey" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->writing_convey=='2')? 'checked':'';?>>Conveys meaning to some extent through drawings in greeting card/ draws few recognizable objects o
people/ and makes shapes of few letters using dough or clay; occasionally requires assistance  <br>
                            <input type="radio" name="writing_convey" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->writing_convey=='3')? 'checked':'';?>>Conveys meaning reasonably through drawings in greeting card/ draws some recognizable objects or people/ and makes shapes of many letters using dough or clay <br>
                            <input type="radio" name="writing_convey" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_convey=='4')? 'checked':'';?>> Conveys meaning clearly through drawings in greeting card, draws many recognizable objects or people/ and makes shapes of all the letters using dough or clay; helps others too<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_convey').'</div>'; ?>    
                    </div> 
                    <!-- Numeracy -->
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Numeracy Skills</span></div><hr>
                                <span class="heading_abl">(i) Counts objects up to 20 </span> 
                            </div>
                             <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_count" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_count=='1')? 'checked':'';?>> Counts up to 20  <br>
                            <input type="radio" name="numeracy_count" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_count=='2')? 'checked':'';?>> Demonstrates the concept of numbers upto 20 through repref entations —visual and numera<br>
                            <input type="radio" name="numeracy_count" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_count=='3')? 'checked':'';?>> Places random set of numbers up to 20 in correct order <br>
                            <input type="radio" name="numeracy_count" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_count=='4')? 'checked':'';?>> Compares two numbers and identifies the relation as less than, more than and equal to<br>                            </div>
                        </div>
                        
                        <?php   echo '<div class="error">'.form_error('numeracy_count').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) Reads and writes numbers upto 99 </span> 
                            </div>
                             <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_read" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_read=='1')? 'checked':'';?>> Reads upto 99 correctly <br>
                            <input type="radio" name="numeracy_read" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_read=='2')? 'checked':'';?>> Writes upto 99 with support<br>
                            <input type="radio" name="numeracy_read" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_read=='3')? 'checked':'';?>> Reads and writes upto 99 without error<br>
                            <input type="radio" name="numeracy_read" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_read=='4')? 'checked':'';?>> Reads and writes upto 99 correctly; able to help other <br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_read').'</div>'; ?>       
                        <div class="col-sm-12">  
                                <span class="heading_abl">(iii) Using addition and subtraction of numbers up to 9 in daily life situations </span> 
                            </div>
                            
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_addition" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_addition=='1')? 'checked':'';?>> Tries to do addition and subtraction with the support of teacher <br>
                            <input type="radio" name="numeracy_addition" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_addition=='2')? 'checked':'';?>>Attempts to do addition and subtraction without support but errs in arriving at the solution  <br>
                            <input type="radio" name="numeracy_addition" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_addition=='3')? 'checked':'';?>>Uses addition and subtraction without support and correctly always <br>
                            <input type="radio" name="numeracy_addition" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_addition=='4')? 'checked':'';?>> Uses addition and subtraction without support correctly; able to help other <br>                            </div>
                        </div> 
                        <?php   echo '<div class="error">'.form_error('numeracy_addition').'</div>'; ?>  
                        
                        <div class="col-sm-12">  
                                <span class="heading_abl">(iv) Observes and describes physical properties of 3D shapes (solid shapes)
around him/her like round/flat surfaces, number of corners and edges etc</span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_observes" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_observes=='1')? 'checked':'';?>>Tries to describe physical properties of 3D shapes with support <br>
                            <input type="radio" name="numeracy_observes" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_observes=='2')? 'checked':'';?>>Describes physical properties of 3D shapes, more or less correctly without support <br>
                            <input type="radio" name="numeracy_observes" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_observes=='3')? 'checked':'';?>>Describes physical properties of 3D shapes always correctly<br>
                            <input type="radio" name="numeracy_observes" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_observes=='4')? 'checked':'';?>>Describes physical properties of 3D shapes correctly; and also able to explain it to others<br>  
                            </div>
                        </div>
                    <?php   echo '<div class="error">'.form_error('numeracy_observes').'</div>'; ?>  
                        
                        <div class="col-sm-12">  
                                <span class="heading_abl">(v) Estimates and verifies length using non-standard non-uniform units like hand span, footstep, fingers, etc and capacity using nonstandard uniform units like cup, spoon, mug etc.</span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_units" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_units=='1')? 'checked':'';?>>Explores and estimates length with the support of teacher <br>
                            <input type="radio" name="numeracy_units" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_units=='2')? 'checked':'';?>>Explores and estimates length without the support of teacher <br>
                            <input type="radio" name="numeracy_units" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_units=='3')? 'checked':'';?>>Explores and estimates capacity with the support of teacher<br>
                            <input type="radio" name="numeracy_units" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_units=='4')? 'checked':'';?>>Explores and estimates length & capacity without the support of teacher<br>  
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_units').'</div>'; ?>   
                        
                        <div class="col-sm-12">  
                                <span class="heading_abl">(vi) Creates and recites short poems and stories using shapes and numbers </span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_recites" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_recites=='1')? 'checked':'';?>>Recites poems/narrates stories using shapes and numbers with assistance <br>
                            <input type="radio" name="numeracy_recites" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_recites=='2')? 'checked':'';?>>Recites poems/narrates stories using shapes and numbers without assistanc. <br>
                            <input type="radio" name="numeracy_recites" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_recites=='3')? 'checked':'';?>>Creates poems/narrates stories using shapes and numbers with assistance<br>
                            <input type="radio" name="numeracy_recites" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_recites=='4')? 'checked':'';?>>Creates poems/narrates stories using shapes and numbers without assistanc <br>  
                            </div> 
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_recites').'</div>'; ?>
                    </div>
                    
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>मौखिक  भाषा </span></div><hr>
                                <span class="heading_abl">(i) मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप  </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">    
                            <input type="radio" name="oral_hindi_frnd" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->oral_hindi_frnd=='1')? 'checked':'';?>> बातचीत  शुरू करने में संकोच/ प्रश्न पूछने में दिक्कत / रुक-रुक कर बोलना /   उचित उत्तर बहुत कम <br>
                            <input type="radio" name="oral_hindi_frnd" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->oral_hindi_frnd=='2')? 'checked':'';?>> कभी कभी बातचीत शुरू करना/ कदाचित प्रश्न  पूछना/ संकोच के साथ बोलना/ और कभी-कभी उचित उत्तर देना<br>
                            <input type="radio" name="oral_hindi_frnd" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->oral_hindi_frnd=='3')? 'checked':'';?>> बातचीत की पहल करना/ प्रश्न पूछना / नियमित बोलना/ नियमित उचित उत्तर देना <br>
                            <input type="radio" name="oral_hindi_frnd" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_frnd=='4')? 'checked':'';?>> उत्सुकता से बातचीत की पहल करना/ आसानी से प्रश्न पूछना/ धाराप्रवाह बोलना/ और हमेशा उचित उत्तर  देना <br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_frnd').'</div>'; ?> 
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना  </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_hindi_convey" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->oral_hindi_convey=='1')? 'checked':'';?>>अनियोजित विचार/ बातचीत में दिक्कत / और किसी भी रूप में शारीरिक भाषा का उपयोग न करना; अक्सर सहयोग की आवश्यकता  <br>
                            <input type="radio" name="oral_hindi_convey" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->oral_hindi_convey=='2')? 'checked':'';?>>मुख्य विचारों को उपविचारों में मिला लेना / अनुपयुक्त गति / और विचारों को प्रकट करने के लिए बहुत  कम शारीरिक भाषा का उपयोग करना    <br>
                            <input type="radio" name="oral_hindi_convey" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->oral_hindi_convey=='3')? 'checked':'';?>>मुख्य विचारों का उपयोग करते हुए बोलना किन्तु एक या दो विचारों को छोड़ देना / अधिकतर उचित भाषा प्रवाह / प्रायः विचारों की अभिव्यक्ति में शारीरिक भाषा का उपयोग  <br>
                            <input type="radio" name="oral_hindi_convey" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_convey=='4')? 'checked':'';?>> मुद्रित सामाग्री में प्रदत्त मुख्य विचारों का उपयोग बोलने में करना/ हमेशा उचित भाषा प्रवाह / और हमेशा विचारों की अभिव्यक्ति में शारीरिक भाषा का उपयोग<br> 
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_convey').'</div>'; ?> 
                            
                            <div class="col-sm-12">  
                                <span class="heading_abl">(iii)तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना   </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_hindi_story" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->oral_hindi_story=='1')? 'checked':'';?>>तुकबंदियों अथवा कविता के पाठ का प्रयास किन्तु सहयोग की आवश्यकता/ घबराहट दिखना / बहुत धीमा स्वर / अश्रव्य  <br>
                            <input type="radio" name="oral_hindi_story" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->oral_hindi_story=='2')? 'checked':'';?>>तीन से अधिक त्रुटियों के साथ पाठ और सुधार में असमर्थ / भाव-भंगिमा और क्रियाओं का अभाव / शुद्धता से पाठ लेकिन कभी-कभी अस्पष्टता   <br>
                            <input type="radio" name="oral_hindi_story" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->oral_hindi_story=='3')? 'checked':'';?>>एक या दो त्रुटियों के साथ  पाठ / प्रायः भाव-भंगिमा और क्रियाओं को सम्मिलित करना / कुछ  भूलों के साथ शुद्ध पाठ   <br>
                            <input type="radio" name="oral_hindi_story" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_story=='4')? 'checked':'';?>>त्रुटिहीन पाठ / हमेशा भाव-भंगिमा और क्रियाओं को सम्मिलित करना / उचित उतार-चढ़ाव के साथ शुद्ध पाठ <br> 
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_story').'</div>'; ?> 
                    </div> 
                        
                        <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>पढ़न  भाषा</span></div><hr>
                                <span class="heading_abl">(i) सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन   </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_story" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->read_hindi_story=='1')? 'checked':'';?>>बिना सहयोग के पढ़ने में हिचकिचाहट / समझ आधारित प्रश्नों के उत्तर देने में कठिनता / और कहानी के क्रिया रूपांतरण में कठिनता  <br>
                            <input type="radio" name="read_hindi_story" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->read_hindi_story=='2')? 'checked':'';?>>प्रायः प्रतिभागिता / प्रश्नों के उत्तर देना / और कभी-कभी कहानी के क्रिया रूपांतरण में हिचकिचाहट<br>
                            <input type="radio" name="read_hindi_story" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->read_hindi_story=='3')? 'checked':'';?>>अधिकतम प्रतिभागिता/ प्रश्नों के उत्तर देना / और कहानी का क्रिया रूपांतरण करना <br>
                            <input type="radio" name="read_hindi_story" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_story=='4')? 'checked':'';?>>सक्रिय प्रतिभागिता / सभी प्रश्नो के उत्तर देना / और प्रभावशाली रूप से कहानी का क्रिया रूपांतरण; दूसरों को भी सहयोग करना<br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('read_hindi_story').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग   </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_sound" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->read_hindi_sound=='1')? 'checked':'';?>>अक्षरों के नाम और उनकी ध्वनि सही बोलने का प्रयास करना / मिश्रित उच्चारण वाले शब्दों के उच्चारण में कठिनाई / अक्षरों के संयोजन एवं वियोजन में प्रायः शिक्षक के सहयोग की आवश्यकता है   <br>
                            <input type="radio" name="read_hindi_sound" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->read_hindi_sound=='2')? 'checked':'';?>>कुछ अक्षरों और उनकी ध्वनि का स्पष्ट उच्चारण करना / मिश्रित उच्चारण वाले शब्दों को बोलना / अक्षरों के संयोजन एवं वियोजन पद्धति का कुछ त्रुटियों के साथ उपयोग     <br>
                            <input type="radio" name="read_hindi_sound" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->read_hindi_sound=='3')? 'checked':'';?>>अनेक अक्षरों और उनकी ध्वनि का शुद्ध उच्चारण / मिश्रित उच्चारण वाले शब्दों को बोलना / अक्षरों के संयोजन एवं वियोजन पद्धति का कुछ त्रुटियों के साथ उपयोग  <br>
                            <input type="radio" name="read_hindi_sound" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_sound=='4')? 'checked':'';?>>सभी अक्षरों और उनकी ध्वनि का शुद्ध उच्चारण/ मिश्रित उच्चारण वाले शब्दों को बोलना/ बिना त्रुटियों के अक्षरों के संयोजन एवं वियोजन पद्धति का उपयोग <br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('read_hindi_sound').'</div>'; ?>    
                        <div class="col-sm-12">  
                                <span class="heading_abl">(iii) उम्र के अनुरूप चार पाँच सरल  शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना   </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_word" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->read_hindi_word=='1')? 'checked':'';?>>शब्दों को जोड़कर स्पष्ट उच्चारण के लिए प्रयास करना / एक एक कर शब्दों को पढ़ना और अनेक शब्दों से सहायता प्राप्त करना / असंबद्ध प्रतिक्रिया प्रदान कराना  <br>
                            <input type="radio" name="read_hindi_word" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->read_hindi_word=='2')? 'checked':'';?>>कुछ शब्दों को जोड़कर शुद्ध उच्चारण करना/ अतार्किक समूहीकरण के साथ एक-एक करके शब्दों को पढ़ना / कुछ-कुछ अर्थपूर्ण निष्कर्षों को उपलब्ध कराना   <br>
                            <input type="radio" name="read_hindi_word" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->read_hindi_word=='3')? 'checked':'';?>>अनेक शब्दों का शुद्ध उच्चारण/ प्रायः तार्किक रूप से शब्दों को समूह में जोड़ना / अर्थपूर्ण निष्कर्ष निकलना <br>
                            <input type="radio" name="read_hindi_word" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_word=='4')? 'checked':'';?>>सभी शब्दों को जोड़कर शुद्ध उच्चारण/ सस्वर पाठ के समय तर्कपूर्ण शब्दों का समूहीकारण / अर्थपूर्ण निष्कर्ष निकलना; दूसरों को पढ़ने में सहायता करना <br>                            </div>
                        </div>
                            <?php   echo '<div class="error">'.form_error('read_hindi_word').'</div>'; ?>     
                    </div> 
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>लेखन भाषा</span></div><hr>
                                <span class="heading_abl">(i) मूलभूत लेखन योग्यताएँ      </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_hindi" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->writing_hindi=='1')? 'checked':'';?>>शब्द लिखना किन्तु बार-बार वर्तनी की त्रुटियाँ होना / शब्दों के मध्य असंगत रिक्त स्थानों के साथ अस्पष्ट लेखन   <br>
                            <input type="radio" name="writing_hindi" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->writing_hindi=='2')? 'checked':'';?>>वर्तनी की कुछ अशुद्धियों के साथ शब्दों को लिखना / समझने योग्य हस्त लेखन/ कुछ एक विरामादि चिन्हों का उपयोग <br>
                            <input type="radio" name="writing_hindi" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->writing_hindi=='3')? 'checked':'';?>>शब्दों को शुद्धता से लिखना / पढ़ने योग्य हस्त लेखन / कुछ विरामादि चिन्हों का उपयोग <br>
                            <input type="radio" name="writing_hindi" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_hindi=='4')? 'checked':'';?>>शुद्ध वर्तनी के साथ शब्दों को लिखना / सुस्पष्ट हस्त लेखन / उचित विरामादि चिन्हों का उपयोग<br>                            </div>
                        </div>
                            <?php   echo '<div class="error">'.form_error('writing_hindi').'</div>'; ?>   
                    <div class="col-sm-12">  
                                <span class="heading_abl">(ii) कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण  </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_hindi_drawing" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->writing_hindi_drawing=='1')? 'checked':'';?>>ग्रीटिंग कार्ड में कला के माध्यम से किसी भी अर्थ के सम्प्रेषण में कठिनाई / किसी भी वस्तु या व्यक्ति का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अक्षरों की आकृति का निर्माण; प्रायः सहायता की आवश्यकता  <br>
                            <input type="radio" name="writing_hindi_drawing" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->writing_hindi_drawing=='2')? 'checked':'';?>>कुछ हद तक ग्रीटिंग कार्ड में कला के माध्यम से किसी अर्थ का सम्प्रेषण/ कुछ पहचानने योग्य वस्तुओं  या व्यक्तियों का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अक्षरों की आकृति का निर्माण; कभी-कभी   सहायता की आवश्यकता <br>
                            <input type="radio" name="writing_hindi_drawing" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->writing_hindi_drawing=='3')? 'checked':'';?>>ग्रीटिंग कार्ड में कला के माध्यम से तर्कपूर्ण अर्थ का सम्प्रेषण/ कुछ पहचानने योग्य व्यक्तियों या वस्तुओं का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अनेक अक्षरों की आकृतियों का निर्माण  <br>
                            <input type="radio" name="writing_hindi_drawing" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_hindi_drawing=='4')? 'checked':'';?>>ग्रीटिंग कार्ड में कला के माध्यम से अर्थ का स्पष्ट सम्प्रेषण / अनेक पहचानने योग्य व्यक्तियों या वस्तुओं का रेखांकन / मिट्टी, क्ले आदि के उपयोग से सभी अक्षरों की आकृतियों का निर्माण; दूसरों की भी सहायता करना <br>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_hindi_drawing').'</div>'; ?>   
                    </div> 
                </div> 
               </div>
                <div class="row">
                 
                    
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