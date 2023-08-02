<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Observation Tools</title>
    <style>
        h5 {
            color: #014a69!important;
            font-size: 16px!important;
        }
        h6 {
            color: #f36d1b!important;
            font-size: 14px!important;
        }
        .col-form-label {
            font-family: 'Roboto', sans-serif!important;
            font-size: 12px!important;
            font-weight: 400!important;
            line-height: 1.5!important;
            color: #212529!important;
        }
    </style>
</head>
<div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Classroom Observation Tools.</li>
				
            </ol>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-tasks"></i>&nbsp;&nbsp;Classroom Observation & Constructive Feedback</div>
                <div></div>
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

                    
                    <div class="row" id="SearchEmp">
                        <div style="width: 98%; margin: 0px auto; border: 1px solid #cecece; padding: 10px; border-radius: 5px;">
                            <div style="background-color:#f36d1b; width:100%; color:#ffffff!important; text-align: center; padding: 5px; font-size: 16px; border-top-right-radius: 5px; border-top-left-radius: 5px;"><span>CLASSROOM OBSERVATION TOOL</span></div>
                            <hr>
                            <p align="justify">This tool has been designed to support the observers to use a variety of essential phrases for <em style="color:#014A69;font-weight: bold;">'Classroom Observation and Constructive Feedback'</em>. The report generated on submission of this form is exactly in the format which is already in use irrespective of the order of questions in this form.  The inspecting officer is requested to furnish his/her personal email id below to receive the report. This may be forwarded to the concerned Principal or teacher judiciously.</p>
                            <hr>
                        
                        <label class="col-sm-12 col-form-label">Select Teacher:<span class="reqd">*</span></label>
                        
                        <div class="col-sm-6">
                            <select name="msg_rcvr" class="select2 form-control validate[required]" id="msg_rcvr" autocomplete="off" onchange="ShowForm(this.value)">
                            <option value="" selected="selected">Type to... search the teacher name/code.</option>
                            </select>
                            <span class="error" style="display: none;">Type Teacher Name / Code</span>
                        </div>
                        <div class="col-sm-6" style="padding-top:10px;"><a href="javascript:void(0);" onclick="ShowContractualForm()">For Contractual Teachers </a></div>
                        </div>
                    </div>
                    
                    <div id="DetailsForm" style="display:none;">
                    
                    <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
                    <div class=" background_div">
                    <div class="row">
                        <div class="form-group col-sm-12 text-center">
                            <div class="col-sm-12" style="margin-top: 12px;">
                            <div style="background-color:#f36d1b; width:100%; color:#ffffff!important; text-align: center; padding: 5px; font-size: 16px; border-top-right-radius: 5px; border-top-left-radius: 5px;"><span>CLASSROOM OBSERVATION TOOL.</span></div>
                            <hr>
                            </div>
                        </div>
                    </div>
					<div class="row">
					<div class="form-group col-md-12" style="text-align: right;margin-left:-40px;">
					<input class="btn btn-primary" type="button" value="Print" autocomplete="off" onclick="printData();" id="printbutton"></div>
					</div>
					
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><h5>1. Basic Details of The Teacher :</h5><hr></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <input type="hidden" name="emp_sno" id="emp_sno" value="<?php echo isset($DB['sno']) ? $DB['sno'] : 0; ?>">
                                <?php echo form_input("emp_name", isset($DB['emp_name']) ? set_value('emp_name', $DB['emp_name']) : set_value('emp_name',''), 'placeholder=" " id="emp_name" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Teacher's Employee Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_code", isset($DB['emp_code']) ? set_value('emp_code', $DB['emp_code']) : set_value('emp_code',''), 'placeholder=" " id="emp_code" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_code'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Email Address:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_mail", isset($DB['emp_mail']) ? set_value('emp_mail', $DB['emp_mail']) : set_value('emp_mail',''), 'placeholder="" id="emp_mail" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_mail'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Region:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_region", isset($DB['emp_region']) ? set_value('emp_region', $DB['emp_region']) : set_value('emp_region',''), 'placeholder=" " id="emp_region" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_region'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Vidyalaya:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvname",isset($DB['emp_kvname']) ? set_value('emp_kvname', $DB['emp_kvname']) : set_value('emp_kvname',''), 'placeholder=" " id="emp_kvname" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_kvname'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvcode",isset($DB['emp_kvcode']) ? set_value('emp_kvcode', $DB['emp_kvcode']) : set_value('emp_kvcode',''), 'placeholder=" " id="emp_kvcode" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_kvcode'); ?></span>
                                <input type="hidden" name="emp_kvmail" id="emp_kvmail" value="<?php echo isset($DB['emp_kvcode']) ?$DB['emp_kvcode']:''; ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the Teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_desig",isset($DB['emp_desig']) ? set_value('emp_desig', $DB['emp_desig']) : set_value('emp_desig',''), 'placeholder=" " id="emp_desig" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_desig'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_subject",isset($DB['emp_subject']) ? set_value('emp_subject', $DB['emp_subject']) : set_value('emp_subject',''), 'placeholder=" " id="emp_subject" class="validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_subject'); ?></span>
                            </div>
                        </div>
                    </div>    
                    </div>
                    <div class=" background_div">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-sm-12" style="margin-top: 12px;"><h5>2. Details of The Observation :</h5><hr></div>
                        </div>
                        
                        <div class="form-group col-md-3">
                            
                            <label for="" class="col-sm-12 col-form-label">Name of the Observer:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_name",isset($DB['obs_name']) ? set_value('obs_name', $DB['obs_name']) : set_value('obs_name',strtok($OD->OBS, '-')), 'placeholder=" " id="obs_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the Observer:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("obs_desig", array("" => "Select Designation") + desig_of_observer(), isset($DB['obs_desig']) ? set_value('obs_desig', $DB['obs_desig']) : set_value('obs_desig',$OD->DESIG_ID),' id="obs_desig" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_desig'); ?></span>
                                <input type="hidden" name="obs_region" value="<?php echo $OD->REGION; ?>">
                                <input type="hidden" name="obs_unit" value="<?php echo $OD->UNIT; ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Class Observed:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("obs_class", array("" => "Select Class") + observed_class(), isset($DB['obs_class']) ? set_value('obs_class', $DB['obs_class']) : set_value('obs_desig',''),' id="obs_class" onchange="subObserved(this.value);" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_class'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Subject Observed:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <div id="updsub">
                                    <?php echo form_dropdown("obs_subject", array("" => "Select Subject") + observed_subject(obs_class.value), isset($DB['obs_subject']) ? set_value('obs_subject', $DB['obs_subject']) : set_value('obs_subject',''),' id="obs_subject" class="form-control validate[required]" autocomplete="off"'); ?>
                                </div>
                                <span class="error"><?php echo form_error('obs_subject'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Section Observed:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <div id="updsub">
                                    <?php echo form_dropdown("obs_section", array("" => "Select Section") + observed_section(), isset($DB['obs_section']) ? set_value('obs_section', $DB['obs_section']) : set_value('obs_section',''),' id="obs_section" class="form-control validate[required]" autocomplete="off"'); ?>
                                </div>
                                <span class="error"><?php echo form_error('obs_section'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student's on Roll:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_onroll",isset($DB['stu_onroll']) ? set_value('stu_onroll', $DB['stu_onroll']) : set_value('stu_onroll',''), 'placeholder=" " onkeyup="CalculateAbscent();" id="stu_onroll" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_onroll'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student's Present:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_present",isset($DB['stu_present']) ? set_value('stu_present', $DB['stu_present']) : set_value('stu_present',''), 'placeholder=" " onkeyup="CalculateAbscent();" id="stu_present" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_present'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student's Absent:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_absent",isset($DB['stu_absent']) ? set_value('stu_absent', $DB['stu_absent']) : set_value('stu_absent',''), 'readonly placeholder=" " id="stu_absent" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_absent'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="" class="col-sm-12 col-form-label">Observed Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_topic",isset($DB['obs_topic']) ? set_value('obs_topic', $DB['obs_topic']) : set_value('obs_topic',''), 'placeholder=" " id="obs_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_topic'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="" class="col-sm-12 col-form-label">Observed Sub Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_sub_topic",isset($DB['obs_sub_topic']) ? set_value('obs_sub_topic', $DB['obs_sub_topic']) : set_value('obs_sub_topic',''), 'placeholder=" " id="obs_sub_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_sub_topic'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="" class="col-sm-12 col-form-label">Competency:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_competency",isset($DB['obs_competency']) ? set_value('obs_competency', $DB['obs_competency']) : set_value('obs_competency',''), 'placeholder=" " id="obs_competency" class="form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_competency'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="col-sm-12 col-form-label">The duration of observation of the class by the Observer: (Time/Period):<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_time_period",isset($DB['obs_time_period']) ? set_value('obs_time_period', $DB['obs_time_period']) : set_value('obs_time_period',''), 'placeholder=" " id="obs_time_period" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_time_period'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h5>3. Introduction to the lesson / topic :</h5><hr></div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $lession_topic=explode("#",$DB['lession_topic']);
                            //show($new_lession_topic);
                            foreach(new_lession_topic() as $k=>$v){
                                if (in_array($k, $lession_topic)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="lession_topic[]" class="form-check-input lession_topic" onchange="LessionTopicTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $lession_topic)){
                                echo form_input("lession_topic_txt",isset($DB['lession_topic_txt']) ? set_value('lession_topic_txt', $DB['lession_topic_txt']) : set_value('lession_topic_txt',''), 'placeholder=" " style="display:block" class="lession_topic_txt validate[required] form-control" autocomplete="off"');     
                                }else{
                                echo form_input("lession_topic_txt",isset($DB['lession_topic_txt']) ? set_value('lession_topic_txt', $DB['lession_topic_txt']) : set_value('lession_topic_txt',''), 'placeholder=" " style="display:none" class="lession_topic_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('lession_topic_txt'); ?></span>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr><h5>4. Observations on the Lesson Plan :</h5>
                                <h6>(i) Frequency/Quality of implementation in the classroom:</h6><hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $lession_plan=explode("#",$DB['lession_plan']);
                            foreach(new_lession_plan() as $k=>$v){
                                if (in_array($k, $lession_plan)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="lession_plan[]" class="form-check-input lession_plan" onchange="LessionPlanTxt();" value="'.$k.'"'.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $lession_plan)){
                                echo form_input("lession_plan_txt",isset($DB['lession_plan_txt']) ? set_value('lession_plan_txt', $DB['lession_plan_txt']) : set_value('lession_plan_txt',''), 'placeholder=" " style="display:block" class="lession_plan_txt validate[required] form-control" autocomplete="off"'); 
                                }else{
                                echo form_input("lession_plan_txt",isset($DB['lession_plan_txt']) ? set_value('lession_plan_txt', $DB['lession_plan_txt']) : set_value('lession_plan_txt',''), 'placeholder=" " style="display:none" class="lession_plan_txt validate[required] form-control" autocomplete="off"'); 
                                }
                                ?>
                                <span class="error"><?php echo form_error('lession_plan_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h6>(ii) Whether the teacher has accommodated slow/bright learners in her planning:</h6><hr></div>
                            <div class="col-sm-12">
                                <div class="form-check">
                                <?php
                                $learner_skill=explode("#",$DB['learner_skill']);
                                foreach(learner_skill() as $k=>$v){
                                    if (in_array($k, $learner_skill)){$chk='checked';}else{$chk='';}
                                echo'<input type="radio" name="learner_skill" class="form-check-input learner_skill" value="'.$k.'" '.$chk.'>'.$v.'&emsp;&emsp;';
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr><h5>5. Observations on :</h5>
                                <h6>(i) Interaction between the teacher & the student:</h6>
                                <span>(Click on the relevant check boxes with a maximum of 3 to 4 indicators which are predominant in the class)</span><hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $teacher_student=explode("#",$DB['teacher_student']);
                            foreach(new_teacher_student() as $k=>$v){
                                if (in_array($k, $teacher_student)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="teacher_student[]" class="form-check-input teacher_student" onchange="TeacherStudentTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $teacher_student)){
                                echo form_input("teacher_student_txt",isset($DB['teacher_student_txt']) ? set_value('teacher_student_txt', $DB['teacher_student_txt']) : set_value('teacher_student_txt',''), 'placeholder=" " style="display:block" class="teacher_student_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("teacher_student_txt",isset($DB['teacher_student_txt']) ? set_value('teacher_student_txt', $DB['teacher_student_txt']) : set_value('teacher_student_txt',''), 'placeholder=" " style="display:none" class="teacher_student_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('teacher_student_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>(ii) Application of TLM & use of audio-visual aid including ICT:</h6>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                The Teacher used following ICT resources - <br/>
                            <div class="form-check">
                            <?php
                            $application_tlm=explode("#",$DB['application_tlm']);
                            foreach(new_application_tlm() as $k=>$v){
                                if (in_array($k, $application_tlm)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="application_tlm[]"  class="application_tlm form-check-input" onchange="ApplicationTlmTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $application_tlm)){
                                echo form_input("application_tlm_txt",isset($DB['application_tlm_txt']) ? set_value('application_tlm_txt', $DB['application_tlm_txt']) : set_value('application_tlm_txt',''), 'placeholder=" " style="display:block" class="application_tlm_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("application_tlm_txt",isset($DB['application_tlm_txt']) ? set_value('application_tlm_txt', $DB['application_tlm_txt']) : set_value('application_tlm_txt',''), 'placeholder=" " style="display:none" class="application_tlm_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('application_tlm_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>(iii) Involvement of the students:</h6>
                                <span>(Click on the relevant check boxes with a maximum of 3 to 4 indicators which are predominant in the class)</span>
                                <hr>The Teacher -
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $student_involve=explode("#",$DB['student_involve']);
                            foreach(new_student_involve() as $k=>$v){
                                if (in_array($k, $student_involve)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="student_involve[]" class="form-check-input student_involve" onchange="StudentInvolveTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $student_involve)){
                                echo form_input("student_involve_txt",isset($DB['student_involve_txt']) ? set_value('student_involve_txt', $DB['student_involve_txt']) : set_value('student_involve_txt',''), 'placeholder=" " style="display:block" class="student_involve_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("student_involve_txt",isset($DB['student_involve_txt']) ? set_value('student_involve_txt', $DB['student_involve_txt']) : set_value('student_involve_txt',''), 'placeholder=" " style="display:none" class="student_involve_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('student_involve_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h6>(IV) Assignments or activities in asynchronous mode:</h6><hr></div>
                            <div class="col-sm-12">
                                <span style="font-size:20px;">&#9632;&nbsp;</span>Name of the online platform(e.g. Microsoft Teams/Google Classroom/WhatsApp/Blog/etc.)
                                <div class="col-sm-12">
                                <?php
                                echo form_input("online_platform_txt",isset($DB['online_platform_txt']) ? set_value('online_platform_txt', $DB['online_platform_txt']) : set_value('online_platform_txt',''), 'placeholder=" " style="display:block" class="online_platform_txt validate[required] form-control" autocomplete="off"');
                                ?>
                                </div>
                                <span style="font-size:20px;">&#9632;&nbsp;</span>Comments on Links of videos assigned (Self-made/from other sources) and exercises based on the videos
                                <div class="col-sm-12">
                                <?php
                                echo form_input("video_link_txt",isset($DB['video_link_txt']) ? set_value('video_link_txt', $DB['video_link_txt']) : set_value('video_link_txt',''), 'placeholder=" " style="display:block" class="video_link_txt validate[required] form-control" autocomplete="off"');
                                ?>
                                </div>
                                <span style="font-size:20px;">&#9632;&nbsp;</span>Comments on Interactive worksheets used - Quality and type
                                <div class="col-sm-12">
                                <?php
                                echo form_input("int_worksheet_txt",isset($DB['int_worksheet_txt']) ? set_value('int_worksheet_txt', $DB['int_worksheet_txt']) : set_value('int_worksheet_txt',''), 'placeholder=" " style="display:block" class="int_worksheet_txt validate[required] form-control" autocomplete="off"');
                                ?>
                                </div>
                                <span style="font-size:20px;">&#9632;&nbsp;</span>Non-interactive worksheets – Whether correction was done?
                                <div class="col-sm-12">&emsp;
                                <?php
                                foreach(opt_yes_no() as $O=>$R){
                                if ($O==$DB['non_int_worksheet']){$chk='checked';}else{$chk='';}
                                echo'<input type="radio" name="non_int_worksheet" class="form-check-input non_int_worksheet" value="'.$O.'" '.$chk.'>'.$R.'&emsp;&emsp;';
                                }
                                ?>
                                </div>
                                <span style="font-size:20px;">&#9632;&nbsp;</span>Writing assignments given & collected back as image/pdf and correction done?
                                <div class="col-sm-12">&emsp;
                                <?php
                                foreach(opt_yes_no() as $O=>$R){
                                if ($O==$DB['non_int_assignment']){$chk='checked';}else{$chk='';}
                                echo'<input type="radio" name="non_int_assignment" class="form-check-input non_int_assignment" value="'.$O.'" '.$chk.'>'.$R.'&emsp;&emsp;';
                                }
                                ?>
                                </div>
                                <div class="col-sm-12">&nbsp;
                                <?php 
                               
                                if ($DB['assignment_mode']==99){
                                echo'<input type="checkbox" name="assignment_mode" class="form-check-input assignment_mode" onchange="AssignmentModeTxt();" value="99" checked="checked">Other<br>'; 
                                }else{
                                echo'<input type="checkbox" name="assignment_mode" class="form-check-input assignment_mode" onchange="AssignmentModeTxt();" value="99">Other<br>';    
                                }
                                ?>
                                </div>
                                 <?php 
                                if ($DB['assignment_mode']==99){
                                echo form_input("assignment_mode_txt",isset($DB['assignment_mode_txt']) ? set_value('assignment_mode_txt', $DB['assignment_mode_txt']) : set_value('assignment_mode_txt',''), 'placeholder=" " style="display:block" class="assignment_mode_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("assignment_mode_txt",isset($DB['assignment_mode_txt']) ? set_value('assignment_mode_txt', '') : set_value('assignment_mode_txt',''), 'placeholder=" " style="display:none" class="assignment_mode_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h5>6. Findings on the competence of the children on a random sample basis (e.g. Utilizing written test/question-answer/verification of homework record with actual question-answer sessions/ formative assessment record with some sample checking etc.) :</h5></div>
                            <div class="col-sm-12"><hr><h6>Findings:</h6></div>
                            <div class="col-sm-12">
                            <?php echo form_input("obs_findings",isset($DB['obs_findings']) ? set_value('obs_findings', $DB['obs_findings']) : set_value('obs_name',''), 'placeholder=" " id="obs_findings" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_findings'); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="form-group col-md-12">
                        <div class="col-sm-12"><hr><h5>7. Communication skills of the teacher in English and Hindi :</h5><hr></div>
                        <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $comm_skill=explode("#",$DB['comm_skill']);
                            foreach(new_comm_skill() as $k=>$v){
                                if (in_array($k, $comm_skill)){$chk='checked';}else{$chk='';}
                            echo'<input type="radio" name="comm_skill" class="form-check-input comm_skill" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <div class="col-sm-12"><hr><h5>8. Observations on maintenance of notebooks and Records :</h5><hr></div>
                        <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $maintain_mode=explode("#",$DB['maintain_mode']);
                            foreach(new_maintain_mode() as $k=>$v){
                                if (in_array($k, $maintain_mode)){$chk='checked';}else{$chk='';}
                            echo'<input type="radio" name="maintain_mode" class="form-check-input maintain_mode" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <div class="col-sm-12">
                            <hr>
                            <h5>9. Observations on the innovations planned/experiments undertaken by the teacher & its implementation in the classroom teaching :</h5>
                            <span>(Title/topic of experiment, No. of students involved, tools used and your observation on progress/outcome)</span>
                            <hr></div>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_planned",isset($DB['obs_planned']) ? set_value('obs_planned', $DB['obs_planned']) : set_value('obs_planned',''), 'placeholder=" " id="obs_planned" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_planned'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h5>10. Areas which require improvement in the teacher :</h5>
                                <span>(Click on the relevant check boxes with maximum 2  indicators which are predominantly essential)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $teacher_improve=explode("#",$DB['teacher_improve']);
                            foreach(new_teacher_improve() as $k=>$v){
                                if (in_array($k, $teacher_improve)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="teacher_improve[]" class="form-check-input teacher_improve" onchange="TeacherImproveTxt();" value="'.$k.'"'.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $teacher_improve)){
                                echo form_input("teacher_improve_txt",isset($DB['teacher_improve_txt']) ? set_value('teacher_improve_txt', $DB['teacher_improve_txt']) : set_value('teacher_improve_txt',''), 'placeholder=" " style="display:block" class="teacher_improve_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("teacher_improve_txt",isset($DB['teacher_improve_txt']) ? set_value('teacher_improve_txt', $DB['teacher_improve_txt']) : set_value('teacher_improve_txt',''), 'placeholder=" " style="display:none" class="teacher_improve_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('teacher_improve_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h5>11. Any other specific observation on the classroom teaching :</h5></div>
                            <div class="col-sm-12">
                                <hr>
                                <h6>Instruction:-</h6><span>(Click on the relevant check boxes with maximum 2  indicators which are predominantly essential)</span>
                                <hr>
                                The Teacher -
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $instruction_tool=explode("#",$DB['instruction_tool']);
                            foreach(new_instruction_tool() as $k=>$v){
                                if (in_array($k, $instruction_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="instruction_tool[]" class="form-check-input instruction_tool" onchange="InstructionToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $instruction_tool)){
                                echo form_input("instruction_tool_txt",isset($DB['instruction_tool_txt']) ? set_value('instruction_tool_txt', $DB['instruction_tool_txt']) : set_value('instruction_tool_txt',''), 'placeholder=" " style="display:block" class="instruction_tool_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("instruction_tool_txt",isset($DB['instruction_tool_txt']) ? set_value('instruction_tool_txt', $DB['instruction_tool_txt']) : set_value('instruction_tool_txt',''), 'placeholder=" " style="display:none" class="instruction_tool_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('instruction_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>Classroom management:-</h6>
                                <span>(Click on the relevant check boxes with maximum 2  indicators which are predominantly essential)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            
                            $classroom_tool=explode("#",$DB['classroom_tool']);
                            foreach(new_classroom_tool() as $k=>$v){
                                if (in_array($k, $classroom_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="classroom_tool[]" class="form-check-input classroom_tool" onchange="ClassroomToolTxt();" value="'.$k.'" '.$chk.' >'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $classroom_tool)){
                                echo form_input("classroom_tool_txt",isset($DB['classroom_tool_txt']) ? set_value('classroom_tool_txt', $DB['classroom_tool_txt']) : set_value('classroom_tool_txt',''), 'placeholder=" " style="display:block" class="classroom_tool_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("classroom_tool_txt",isset($DB['classroom_tool_txt']) ? set_value('classroom_tool_txt', $DB['classroom_tool_txt']) : set_value('classroom_tool_txt',''), 'placeholder=" " style="display:none" class="classroom_tool_txt validate[required] form-control" autocomplete="off"');    
                                }
                                ?>
                                <span class="error"><?php echo form_error('classroom_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>Assessment:-</h6>
                                <span>(Click on the relevant check boxes with maximum 2  indicators which are predominantly essential)</span>
                                <hr>
                                The Teacher -
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $assessment_tool=explode("#",$DB['assessment_tool']);
                            foreach(new_assessment_tool() as $k=>$v){
                                if (in_array($k, $assessment_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="assessment_tool[]" class="form-check-input assessment_tool" onchange="AssessmentToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $assessment_tool)){
                                echo form_input("assessment_tool_txt",isset($DB['assessment_tool_txt']) ? set_value('assessment_tool_txt', $DB['assessment_tool_txt']) : set_value('assessment_tool_txt',''), 'placeholder=" " style="display:block" class="assessment_tool_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("assessment_tool_txt",isset($DB['assessment_tool_txt']) ? set_value('assessment_tool_txt', $DB['assessment_tool_txt']) : set_value('assessment_tool_txt',''), 'placeholder=" " style="display:none" class="assessment_tool_txt validate[required] form-control" autocomplete="off"');   
                                }
                                ?>
                                <span class="error"><?php echo form_error('assessment_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12"><hr><h5>12. Suggestions for the teacher :</h5></div>
                            <div class="col-sm-12">
                                <hr>
                                <h6>Planning:-</h6>
                                <span>(Click on the relevant check boxes with a maximum of 2  indicators which are predominantly essential . Please take due care not to select the items which you have already selected under observations Sl. No. 4, 5 & 11.)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $planning_tool=explode("#",$DB['planning_tool']);
                            foreach(new_planning_tool() as $k=>$v){
                                if (in_array($k, $planning_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="planning_tool[]" class="form-check-input planning_tool" onchange="PlanningToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $planning_tool)){
                                echo form_input("planning_tool_txt",isset($DB['planning_tool_txt']) ? set_value('planning_tool_txt', $DB['planning_tool_txt']) : set_value('planning_tool_txt',''), 'placeholder=" " style="display:block" class="planning_tool_txt validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("planning_tool_txt",isset($DB['planning_tool_txt']) ? set_value('planning_tool_txt', $DB['planning_tool_txt']) : set_value('planning_tool_txt',''), 'placeholder=" " style="display:none" class="planning_tool_txt validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('planning_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>Instruction:-</h6>
                                <span>(Click on the relevant check boxes with a maximum of 2  indicators which are predominantly essential . Please take due care not to select the items which you have already selected under observations Sl. No. 4, 5 & 11.)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            
                            $instruction_tool2=explode("#",$DB['instruction_tool2']);
                            foreach(new_instruction_tool2() as $k=>$v){
                                if (in_array($k, $instruction_tool2)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="instruction_tool2[]" class="form-check-input instruction_tool2" onchange="InstructionToolTxt2();" value="'.$k.'" '.$chk.' >'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $instruction_tool2)){
                                echo form_input("instruction_tool_txt2",isset($DB['instruction_tool_txt2']) ? set_value('instruction_tool_txt2', $DB['instruction_tool_txt2']) : set_value('instruction_tool_txt2',''), 'placeholder=" " style="display:block" class="instruction_tool_txt2 validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("instruction_tool_txt2",isset($DB['instruction_tool_txt2']) ? set_value('instruction_tool_txt2', $DB['instruction_tool_txt2']) : set_value('instruction_tool_txt2',''), 'placeholder=" " style="display:none" class="instruction_tool_txt2 validate[required] form-control" autocomplete="off"');    
                                }
                                ?>
                                <span class="error"><?php echo form_error('instruction_tool_txt2'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>Classroom management:- </h6>
                                <span>(Click on the relevant check boxes with a maximum of 2  indicators which are predominantly essential . Please take due care not to select the items which you have already selected under observations Sl. No. 4, 4 & 11.)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            
                            $classroom_tool2=explode("#",$DB['classroom_tool2']);
                            foreach(new_classroom_tool2() as $k=>$v){
                                if (in_array($k, $classroom_tool2)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="classroom_tool2[]" class="form-check-input classroom_tool2" onchange="ClassroomToolTxt2();" value="'.$k.'" '.$chk.' >'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $classroom_tool2)){
                                echo form_input("classroom_tool_txt2",isset($DB['classroom_tool_txt2']) ? set_value('classroom_tool_txt2', $DB['classroom_tool_txt2']) : set_value('classroom_tool_txt2',''), 'placeholder=" " style="display:block" class="classroom_tool_txt2 validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("classroom_tool_txt2",isset($DB['classroom_tool_txt2']) ? set_value('classroom_tool_txt2', $DB['classroom_tool_txt2']) : set_value('classroom_tool_txt2',''), 'placeholder=" " style="display:none" class="classroom_tool_txt2 validate[required] form-control" autocomplete="off"');    
                                }
                                ?>
                                <span class="error"><?php echo form_error('classroom_tool_txt2'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <hr>
                                <h6>Assessment:-</h6>
                                <span>(Click on the relevant check boxes with a maximum of 2  indicators which are predominantly essential . Please take due care not to select the items which you have already selected under observations Sl. No. 4, 4 & 11.)</span>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $assessment_tool2=explode("#",$DB['assessment_tool2']);
                            foreach(new_assessment_tool2() as $k=>$v){
                                if (in_array($k, $assessment_tool2)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="assessment_tool2[]" class="form-check-input assessment_tool2" onchange="AssessmentToolTxt2();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $assessment_tool2)){
                                echo form_input("assessment_tool_txt2",isset($DB['assessment_tool_txt2']) ? set_value('assessment_tool_txt2', $DB['assessment_tool_txt2']) : set_value('assessment_tool_txt2',''), 'placeholder=" " style="display:block" class="assessment_tool_txt2 validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("assessment_tool_txt2",isset($DB['assessment_tool_txt2']) ? set_value('assessment_tool_txt2', $DB['assessment_tool_txt2']) : set_value('assessment_tool_txt2',''), 'placeholder=" " style="display:none" class="assessment_tool_txt2 validate[required] form-control" autocomplete="off"');   
                                }
                                ?>
                                <span class="error"><?php echo form_error('assessment_tool_txt2'); ?></span>
                            </div>
                        </div>
                        
                        
                        
                       
                        <div class="form-group col-md-12">
                        <div class="col-sm-12"><hr><h5>13. Overall grading of the teacher :</h5><hr></div>
                        <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $overall_grading=explode("#",$DB['overall_grading']);
                            foreach(overall_grading() as $k=>$v){
                                if (in_array($k, $overall_grading)){$chk='checked';}else{$chk='';}
                            echo'<input type="radio" name="overall_grading" class="form-check-input overall_grading" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <div class="col-sm-12"><hr><h5>14. Whether debriefing was done with the teacher after observation :</h5><hr></div>
                        <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $overall_briefing=explode("#",$DB['overall_briefing']);
                            foreach(overall_briefing() as $k=>$v){
                                if (in_array($k, $overall_briefing)){$chk='checked';}else{$chk='';}
                            echo'<input type="radio" name="overall_briefing" class="form-check-input overall_briefing" value="'.$k.'" '.$chk.'>'.$v.'&emsp;&emsp;';
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <div class="col-sm-12"><hr><h5>15. The level of improvement shown by the teacher after considering the suggestions given during the first inspection (applicable only to second round of inspection) :</h5><hr></div>
                        <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $overall_rating=explode("#",$DB['overall_rating']);
                            foreach(overall_rating() as $k=>$v){
                                if (in_array($k, $overall_rating)){$chk='checked';}else{$chk='';}
                            echo'<input type="radio" name="overall_rating" class="form-check-input overall_rating" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="col-sm-12"><hr><h5>16. Date of Submission :</h5><hr></div>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_sub_date", isset($DB['obs_sub_date']) ? set_value('obs_sub_date', date('d-m-Y', strtotime($DB['obs_sub_date']))) : set_value('obs_sub_date',''), 'placeholder=" "  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <span class="error"><?php echo form_error('obs_sub_date'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="col-sm-12"><hr><h5>17. Suggestion (if any) :</h5><hr></div>
                            <div class="col-sm-12">
                                <textarea name="suggestions" class="form-control"><?php 
                               echo isset($DB['suggestions']) ? set_value('suggestions', $DB['suggestions']) : set_value('suggestions',''); ?>  </textarea>
                                
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <span class="error"><?php echo form_error('suggestions'); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                        <?php if(isset($DB)&& !empty($DB['created_by']) &&($DB['created_by']==$this->auth_user_id)){ ?>
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;" > 
                            <input class="btn btn-primary" type="submit" value="Update Observation Data" id="buttan">
                        </div>
                        <?php }elseif (isset($DB)&& !empty($DB['created_by']) &&($DB['created_by']!=$this->auth_user_id)) { ?>
                        <a class="btn btn-block btn-warning text-center" href="<?php echo site_url('observed-data'); ?>" id="buttan">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Back To Observed Data
                        </a>   
                        <?php }else{?>
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="Submit Observation Data" id="buttan">
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <?php echo form_close(); ?>
				
                </div>
            </div>
        </div>
<script>
	//initSample();
        $('.select2').select2({
           placeholder: 'Select Recipient',
            closeOnSelect: true
        });
        //========================================= Check Percentage =============================//
        function chkValidData(){
            $('#formID').submit();
        }
</script>
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    $(document).ready(function(){
        var EX='<?php echo $EX; ?>';
        if(EX==0){
            $("#SearchEmp").show();
            $("#DetailsForm").hide();
        }else{
            $("#SearchEmp").hide();
            $("#DetailsForm").show();
        }
        $("#msg_rcvr").select2({
            ajax: { 
                url: function (params) {
                    return base_url + 'webtools/Webtools/GetEmployeeDetails/' + params.term;
                },
                type: "post",
                dataType: 'json',
                delay: 250,
                data: get_csrf_token_name + '=' + get_csrf_hash,
                processResults: function (resp) {
                    return {
                        results: $.map(resp, function(obj) {
                        return { id: obj.ID, text: obj.NAME };
                        })
                    };
                }
                //cache: true
            }
        });
    });
    
    //=========================================ShowForm========================================//
    function ShowForm(EmpId){
        $("#SearchEmp").hide();
        $.ajax({
                    url: base_url + 'webtools/Webtools/GetEmployeeBasic',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' +EmpId,
                    type: 'POST',
                    success: function (E) {
                           var obj = $.parseJSON(E);
                           //console.log(obj['ECODE']);
                           $("#emp_name").val(obj['ENAME']);
                           $("#emp_code").val(obj['ECODE']);
                           $("#emp_mail").val(obj['EMAIL']);
                           $("#emp_region").val(obj['EREGION']);
                           $("#emp_kvname").val(obj['KNAME']);
                           $("#emp_kvcode").val(obj['KCODE']);
                           $("#emp_kvmail").val(obj['KMAIL']);
                           $("#emp_desig").val(obj['EDESIG']);
                           $("#emp_subject").val(obj['ESUBJECT']);
                    }
                });
        $("#DetailsForm").show();
    }
    function subObserved(ClsId){
        if(ClsId){ 
            var KeyId=null;
            $.ajax({
                url: base_url + 'webtools/Webtools/GetObsSubject',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&ClsId=' + ClsId+ '&KeyId=' + KeyId,
                type: 'POST',
                success: function (resp) {
                    //alert(resp);
                    $("#updsub").html(resp);
                }
            });
        }
    }
    var EX='<?php echo sizeof($DB); ?>';
    if(EX){
        var ExClsId='<?php echo $DB['obs_class']; ?>';
        subObserved(ExClsId);
        setTimeout( function(){ 
        $('#obs_subject').val("<?php echo $DB['obs_subject']; ?>");
        $('#obs_subject').trigger('change');
        }  , 500 );
    }
</script>
<script>
    //============================================ 1 ===================================================//
    function LessionTopicTxt(){
        var lt=0;
        var ltary = [];       
        $('.lession_topic:checked').each(function(){ ltary[lt++] = $(this).val(); });
        if(ltary.includes("99")){ $('.lession_topic_txt').show(); }else{ $('.lession_topic_txt').hide(); }
    }
    function LessionPlanTxt(){
        var lp=0;
        var lpary = [];       
        $('.lession_plan:checked').each(function(){ lpary[lp++] = $(this).val(); });
        if(lpary.includes("99")){ $('.lession_plan_txt').show(); }else{ $('.lession_plan_txt').hide(); }
    }
    function TeacherStudentTxt(){
        var ts=0;
        var tsary = [];       
        $('.teacher_student:checked').each(function(){ tsary[ts++] = $(this).val(); });
        if(tsary.includes("99")){ $('.teacher_student_txt').show(); }else{ $('.teacher_student_txt').hide(); }
    }
    function ApplicationTlmTxt(){
        var at=0;
        var atary = [];       
        $('.application_tlm:checked').each(function(){ atary[at++] = $(this).val(); });
        if(atary.includes("99")){ $('.application_tlm_txt').show(); }else{ $('.application_tlm_txt').hide(); }
    }
    function StudentInvolveTxt(){
        var si=0;
        var siary = [];       
        $('.student_involve:checked').each(function(){ siary[si++] = $(this).val(); });
        if(siary.includes("99")){ $('.student_involve_txt').show(); }else{ $('.student_involve_txt').hide(); }
    }
    function AssignmentModeTxt(){
        var am=0;
        var amary = [];       
        $('.assignment_mode:checked').each(function(){ amary[am++] = $(this).val(); });
        if(amary.includes("99")){ $('.assignment_mode_txt').show();}    else{ $('.assignment_mode_txt').hide(); }
    }
    
    //============================================ 2 ===================================================//
    function TeacherImproveTxt(){
        var ti=0;
        var tiary = [];       
        $('.teacher_improve:checked').each(function(){ tiary[ti++] = $(this).val(); });
        if(tiary.includes("99")){ $('.teacher_improve_txt').show(); }else{ $('.teacher_improve_txt').hide(); }
    }
    function InstructionToolTxt(){
        var it=0;
        var itary = [];       
        $('.instruction_tool:checked').each(function(){ itary[it++] = $(this).val(); });
        if(itary.includes("99")){ $('.instruction_tool_txt').show(); }else{ $('.instruction_tool_txt').hide(); }
    }
    function ClassroomToolTxt(){
        var ct=0;
        var ctary = [];       
        $('.classroom_tool:checked').each(function(){ ctary[ct++] = $(this).val(); });
        if(ctary.includes("99")){ $('.classroom_tool_txt').show(); }else{ $('.classroom_tool_txt').hide(); }
    }
    function AssessmentToolTxt(){
        var at=0;
        var atary = [];       
        $('.assessment_tool:checked').each(function(){ atary[at++] = $(this).val(); });
        if(atary.includes("99")){ $('.assessment_tool_txt').show(); }else{ $('.assessment_tool_txt').hide(); }
    }
    //============================================ 3 ===================================================//
    function PlanningToolTxt(){
        var pt=0;
        var ptary = [];       
        $('.planning_tool:checked').each(function(){ ptary[pt++] = $(this).val(); });
        if(ptary.includes("99")){ $('.planning_tool_txt').show(); }else{ $('.planning_tool_txt').hide(); }
    }
    function InstructionToolTxt2(){
        var itt=0;
        var ittary = [];       
        $('.instruction_tool2:checked').each(function(){ ittary[itt++] = $(this).val(); });
        if(ittary.includes("99")){ $('.instruction_tool_txt2').show(); }else{ $('.instruction_tool_txt2').hide(); }
    }
    function ClassroomToolTxt2(){
        var ctt=0;
        var cttary = [];       
        $('.classroom_tool2:checked').each(function(){ cttary[ctt++] = $(this).val(); });
        if(cttary.includes("99")){ $('.classroom_tool_txt2').show(); }else{ $('.classroom_tool_txt2').hide(); }
    }
    function AssessmentToolTxt2(){
        var att=0;
        var attary = [];       
        $('.assessment_tool2:checked').each(function(){ attary[att++] = $(this).val(); });
        if(attary.includes("99")){ $('.assessment_tool_txt2').show(); }else{ $('.assessment_tool_txt2').hide(); }
    }
    function CalculateAbscent(){
        var R = parseInt($('#stu_onroll').val());
        if(!R){R=parseInt(0);}
        //console.log(R);
        var P = parseInt($('#stu_present').val());
        if(!P){P=parseInt(0);}
        //console.log(P);
        if(R<P){$('#stu_present').val(parseInt(0)); $('#stu_absent').val(parseInt(R)); return false;}
        $('#stu_absent').val(parseInt(R-P));
        
    }
    function ShowContractualForm(){
        $("#SearchEmp").hide();
		$.ajax({
                    url: base_url + 'webtools/Webtools/GetRegion',
                    type: 'POST',
                    success: function (E) {
                           var obj = $.parseJSON(E);
                           //console.log(obj);
                           $("#emp_name").val('');
                           $("#emp_code").val('000');
                           $("#emp_mail").val('');
                           $("#emp_region").val(obj);
                           $("#emp_kvname").val('');
                           $("#emp_kvcode").val('');
                           $("#emp_kvmail").val('');
                           $("#emp_desig").val('');
                           $("#emp_subject").val('');
                    }
                });
        $("#emp_name").prop("readonly", false);
        $("#emp_code").prop("readonly", true);
        $("#emp_mail").prop("readonly", false);
        $("#emp_region").prop("readonly", true);
        $("#emp_kvname").prop("readonly", false);
        $("#emp_kvcode").prop("readonly", false);
        $("#emp_desig").prop("readonly", false);
        $("#emp_subject").prop("readonly", false);
        $("#DetailsForm").show();
    }
	/*function printData()
	{
	   var divToPrint=document.getElementById("DetailsForm");
	   newWin= window.open("");
	   newWin.document.write('<html><head><title>Report</title>'); 
	   newWin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>css/print.css" type="text/css" />');
		newWin.document.write('</head><body >');
		newWin.document.write(divToPrint.outerHTML);
		newWin.document.write('</body></html>');

	   //newWin.print();
	   //newWin.close();
	}*/
	
	$(function () {
            $("#printbutton").click(function () {
				var contents = $("#DetailsForm").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>School Sanction Form</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                
                frameDoc.document.write('<link href="<?php echo base_url();?>css/sb-admin.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />');
                frameDoc.document.write('<link href="<?php echo base_url();?>css/custom.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />');
                frameDoc.document.write('<link href="<?php echo base_url();?>css/print.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
</script>
</body>
</html>
