<?php //show($DB); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Observation Tools</title>
</head>
<div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Class Observation Tools</li>
				
            </ol>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-tasks"></i>&nbsp;&nbsp;Class Observation & Constructive Feedback</div>
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
                        <label for="" class="col-sm-12 col-form-label">Select Teacher:<span class="reqd">*</span></label>
                        <div class="col-sm-6">
                            <select name="msg_rcvr" class="select2 form-control validate[required]" id="msg_rcvr" autocomplete="off" onchange="ShowForm(this.value)">
                            <option value="" selected="selected">Type Teacher Name / Code</option>
                            </select>
                            <span class="error" style="display: none;">Type Teacher Name / Code</span>
                        </div>
                        <div class="col-sm-6">&nbsp;</div>
                        <hr>
                    </div>
                    
                    <div id="DetailsForm" style="display:none;">
                    <div class="row">
                        <div class="col-sm-12"><h5>BASIC DETAILS OF THE TEACHER</h5><hr></div>
                    </div>
                    <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
                    <div class=" background_div">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <input type="hidden" name="emp_sno" id="emp_sno" value="<?php echo isset($DB['sno']) ? $DB['sno'] : 0; ?>">
                                <?php echo form_input("emp_name", isset($DB['emp_name']) ? set_value('emp_name', $DB['emp_name']) : set_value('emp_name',''), 'placeholder="Teacher Name" id="emp_name" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Teacher Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_code", isset($DB['emp_code']) ? set_value('emp_code', $DB['emp_code']) : set_value('emp_code',''), 'placeholder="Teacher Code" id="emp_code" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_code'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Email Address:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_mail", isset($DB['emp_mail']) ? set_value('emp_mail', $DB['emp_mail']) : set_value('emp_mail',''), 'placeholder="Teacher Mail Id" id="emp_mail" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_mail'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Region:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_region", isset($DB['emp_region']) ? set_value('emp_region', $DB['emp_region']) : set_value('emp_region',''), 'placeholder="Teacher Region" id="emp_region" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_region'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Vidyalaya:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvname",isset($DB['emp_kvname']) ? set_value('emp_kvname', $DB['emp_kvname']) : set_value('emp_kvname',''), 'placeholder="KV Name" id="emp_kvname" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_kvname'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvcode",isset($DB['emp_kvcode']) ? set_value('emp_kvcode', $DB['emp_kvcode']) : set_value('emp_kvcode',''), 'placeholder="KV Code" id="emp_kvcode" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_kvcode'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_desig",isset($DB['emp_desig']) ? set_value('emp_desig', $DB['emp_desig']) : set_value('emp_desig',''), 'placeholder="Teacher Designation" id="emp_desig" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_desig'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_subject",isset($DB['emp_subject']) ? set_value('emp_subject', $DB['emp_subject']) : set_value('emp_subject',''), 'placeholder="Teacher Subject" id="emp_subject" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_subject'); ?></span>
                            </div>
                        </div>
                    </div>    
                    </div>

                    <div class="row">
                        <div class="col-sm-12"><h5>OBSERVATION DETAILS</h5><hr></div>
                    </div>   
                    <div class=" background_div">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the observer:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_name",isset($DB['obs_name']) ? set_value('obs_name', $DB['obs_name']) : set_value('obs_name',''), 'placeholder="Name of the Observer" id="obs_name" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the observer:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_dropdown("obs_desig", array("" => "Select Designation") + desig_of_observer(), isset($DB['obs_desig']) ? set_value('obs_desig', $DB['obs_desig']) : set_value('obs_desig',''),' id="obs_desig" class="form-control validate[required]" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_desig'); ?></span>
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
                            <label for="" class="col-sm-12 col-form-label">Students On Roll:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_onroll",isset($DB['stu_onroll']) ? set_value('stu_onroll', $DB['stu_onroll']) : set_value('stu_onroll',''), 'placeholder="Students On roll" onkeyup="CalculateAbscent();" id="stu_onroll" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_onroll'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student Present:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_present",isset($DB['stu_present']) ? set_value('stu_present', $DB['stu_present']) : set_value('stu_present',''), 'placeholder="Students Present" onkeyup="CalculateAbscent();" id="stu_present" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_present'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student Absent:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_absent",isset($DB['stu_absent']) ? set_value('stu_absent', $DB['stu_absent']) : set_value('stu_absent',''), 'readonly placeholder="Students Absent" id="stu_absent" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('stu_absent'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observed Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_topic",isset($DB['obs_topic']) ? set_value('obs_topic', $DB['obs_topic']) : set_value('obs_topic',''), 'placeholder="Observed Topic" id="obs_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_topic'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observed Sub Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_sub_topic",isset($DB['obs_sub_topic']) ? set_value('obs_sub_topic', $DB['obs_sub_topic']) : set_value('obs_sub_topic',''), 'placeholder="Observed Sub Topic" id="obs_sub_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_sub_topic'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Competency:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_competency",isset($DB['obs_competency']) ? set_value('obs_competency', $DB['obs_competency']) : set_value('obs_competency',''), 'placeholder="Observed Competency" id="obs_competency" class="form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_competency'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observation Duration(Time/Period):<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_time_period",isset($DB['obs_time_period']) ? set_value('obs_time_period', $DB['obs_time_period']) : set_value('obs_time_period',''), 'placeholder="Time / Period" id="obs_time_period" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('obs_time_period'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Introduction to the lesson / topic :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $lession_topic=explode("#",$DB['lession_topic']);
                            //show($lession_topic);
                            foreach(lession_topic() as $k=>$v){
                                if (in_array($k, $lession_topic)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="lession_topic[]" id="lession_topic" class="form-check-input lession_topic" onchange="LessionTopicTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $lession_topic)){
                                echo form_input("lession_topic_txt",isset($DB['lession_topic_txt']) ? set_value('lession_topic_txt', $DB['lession_topic_txt']) : set_value('lession_topic_txt',''), 'placeholder="Your Comments/Suggestions" id="lession_topic_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');     
                                }else{
                                echo form_input("lession_topic_txt",isset($DB['lession_topic_txt']) ? set_value('lession_topic_txt', $DB['lession_topic_txt']) : set_value('lession_topic_txt',''), 'placeholder="Your Comments/Suggestions" id="lession_topic_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('lession_topic_txt'); ?></span>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label" style="padding-left: 3%;text-transform: uppercase;"><h6>Observations on the lesson plan:</h6><hr></label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">(i)Frequency/quality of implementation in the classroom :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $lession_plan=explode("#",$DB['lession_plan']);
                            foreach(lession_plan() as $k=>$v){
                                if (in_array($k, $lession_plan)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="lession_plan[]" id="lession_plan" class="form-check-input lession_plan" onchange="LessionPlanTxt();" value="'.$k.'"'.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $lession_plan)){
                                echo form_input("lession_plan_txt",isset($DB['lession_plan_txt']) ? set_value('lession_plan_txt', $DB['lession_plan_txt']) : set_value('lession_plan_txt',''), 'placeholder="Your Comments/Suggestions" id="lession_plan_txt" style="display:block" class="validate[required] form-control" autocomplete="off"'); 
                                }else{
                                echo form_input("lession_plan_txt",isset($DB['lession_plan_txt']) ? set_value('lession_plan_txt', $DB['lession_plan_txt']) : set_value('lession_plan_txt',''), 'placeholder="Your Comments/Suggestions" id="lession_plan_txt" style="display:none" class="validate[required] form-control" autocomplete="off"'); 
                                }
                                ?>
                                <span class="error"><?php echo form_error('lession_plan_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">(ii) Whether the teacher has accommodated slow/bright learners in his/her planning:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("learner_skill",isset($DB['learner_skill']) ? set_value('learner_skill', $DB['learner_skill']) : set_value('learner_skill',''), 'placeholder="Learners Planning" id="learner_skill" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('learner_skill'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Interaction between the teacher & the student * :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $teacher_student=explode("#",$DB['teacher_student']);
                            foreach(teacher_student() as $k=>$v){
                                if (in_array($k, $teacher_student)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="teacher_student[]" id="teacher_student" class="form-check-input teacher_student" onchange="TeacherStudentTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $teacher_student)){
                                echo form_input("teacher_student_txt",isset($DB['teacher_student_txt']) ? set_value('teacher_student_txt', $DB['teacher_student_txt']) : set_value('teacher_student_txt',''), 'placeholder="Your Comments/Suggestions" id="teacher_student_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("teacher_student_txt",isset($DB['teacher_student_txt']) ? set_value('teacher_student_txt', $DB['teacher_student_txt']) : set_value('teacher_student_txt',''), 'placeholder="Your Comments/Suggestions" id="teacher_student_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('teacher_student_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Application of TLM & use of audio-visual aid including ICT:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("audio_visual",isset($DB['audio_visual']) ? set_value('audio_visual', $DB['audio_visual']) : set_value('audio_visual',''), 'placeholder="Application of TLM & ICT" id="audio_visual" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('audio_visual'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Involvement of the students :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $student_involve=explode("#",$DB['student_involve']);
                            foreach(student_involve() as $k=>$v){
                                if (in_array($k, $student_involve)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="student_involve[]" id="student_involve" class="form-check-input student_involve" onchange="StudentInvolveTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $student_involve)){
                                echo form_input("student_involve_txt",isset($DB['student_involve_txt']) ? set_value('student_involve_txt', $DB['student_involve_txt']) : set_value('student_involve_txt',''), 'placeholder="Your Comments/Suggestions" id="student_involve_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("student_involve_txt",isset($DB['student_involve_txt']) ? set_value('student_involve_txt', $DB['student_involve_txt']) : set_value('student_involve_txt',''), 'placeholder="Your Comments/Suggestions" id="student_involve_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('student_involve_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Frequency & quality of class work / project work given:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("project_work",isset($DB['project_work']) ? set_value('project_work', $DB['project_work']) : set_value('project_work',''), 'placeholder="Project Work" id="project_work" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('project_work'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Frequency of correction & quality:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("frequency_quality",isset($DB['frequency_quality']) ? set_value('frequency_quality', $DB['frequency_quality']) : set_value('frequency_quality',''), 'placeholder="Frequency of correction & quality" id="frequency_quality" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('frequency_quality'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label" style="padding-left: 3%;text-transform: capitalize;">
                            <h6>Findings on the competence of the children on a random sample basis (eg.by means of written test/question answer/answers written by the students on the blackboard/verification of homework record with actual question answer sessions/ formative assessment record with some sample checking etc.:</h6>
                            <hr>
                        </label>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Findings:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_findings",isset($DB['obs_findings']) ? set_value('obs_findings', $DB['obs_findings']) : set_value('obs_name',''), 'placeholder="Findings..." id="obs_findings" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_findings'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Communication skills of the teacher in English and Hindi:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("comm_skill",isset($DB['comm_skill']) ? set_value('comm_skill', $DB['comm_skill']) : set_value('comm_skill',''), 'placeholder="Communication Skill" id="comm_skill" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('comm_skill'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Observations on maintenance of notebooks and Records:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_records",isset($DB['obs_records']) ? set_value('obs_records', $DB['obs_records']) : set_value('obs_records',''), 'placeholder="Observation Records" id="obs_records" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_records'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Observations on the innovations planned/experiments undertaken by the teacher & its implementation in the classroom teaching:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_planned",isset($DB['obs_planned']) ? set_value('obs_planned', $DB['obs_planned']) : set_value('obs_planned',''), 'placeholder="Observation Planned" id="obs_planned" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_planned'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Areas which require improvement in the teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $teacher_improve=explode("#",$DB['teacher_improve']);
                            foreach(teacher_improve() as $k=>$v){
                                if (in_array($k, $teacher_improve)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="teacher_improve[]" id="teacher_improve" class="form-check-input teacher_improve" onchange="TeacherImproveTxt();" value="'.$k.'"'.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $teacher_improve)){
                                echo form_input("teacher_improve_txt",isset($DB['teacher_improve_txt']) ? set_value('teacher_improve_txt', $DB['teacher_improve_txt']) : set_value('teacher_improve_txt',''), 'placeholder="Your Comments/Suggestions" id="teacher_improve_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("teacher_improve_txt",isset($DB['teacher_improve_txt']) ? set_value('teacher_improve_txt', $DB['teacher_improve_txt']) : set_value('teacher_improve_txt',''), 'placeholder="Your Comments/Suggestions" id="teacher_improve_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('teacher_improve_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Any other specific observation on the classroom teaching - (i) INSTRUCTION:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $instruction_tool=explode("#",$DB['instruction_tool']);
                            foreach(instruction_tool() as $k=>$v){
                                if (in_array($k, $instruction_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="instruction_tool[]" id="instruction_tool" class="form-check-input instruction_tool" onchange="InstructionToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $instruction_tool)){
                                echo form_input("instruction_tool_txt",isset($DB['instruction_tool_txt']) ? set_value('instruction_tool_txt', $DB['instruction_tool_txt']) : set_value('instruction_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="instruction_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("instruction_tool_txt",isset($DB['instruction_tool_txt']) ? set_value('instruction_tool_txt', $DB['instruction_tool_txt']) : set_value('instruction_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="instruction_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('instruction_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Any other specific observation on the classroom teaching - (ii) CLASSROOM MANAGEMENT:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            
                            $classroom_tool=explode("#",$DB['classroom_tool']);
                            foreach(classroom_tool() as $k=>$v){
                                if (in_array($k, $classroom_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="classroom_tool[]" id="classroom_tool" class="form-check-input classroom_tool" onchange="ClassroomToolTxt();" value="'.$k.'" '.$chk.' >'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $classroom_tool)){
                                echo form_input("classroom_tool_txt",isset($DB['classroom_tool_txt']) ? set_value('classroom_tool_txt', $DB['classroom_tool_txt']) : set_value('classroom_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="classroom_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("classroom_tool_txt",isset($DB['classroom_tool_txt']) ? set_value('classroom_tool_txt', $DB['classroom_tool_txt']) : set_value('classroom_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="classroom_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');    
                                }
                                ?>
                                <span class="error"><?php echo form_error('classroom_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Any other specific observation on the classroom teaching - (iii) ASSESSMENT :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $assessment_tool=explode("#",$DB['assessment_tool']);
                            foreach(assessment_tool() as $k=>$v){
                                if (in_array($k, $assessment_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="assessment_tool[]" id="assessment_tool" class="form-check-input assessment_tool" onchange="AssessmentToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $assessment_tool)){
                                echo form_input("assessment_tool_txt",isset($DB['assessment_tool_txt']) ? set_value('assessment_tool_txt', $DB['assessment_tool_txt']) : set_value('assessment_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="assessment_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("assessment_tool_txt",isset($DB['assessment_tool_txt']) ? set_value('assessment_tool_txt', $DB['assessment_tool_txt']) : set_value('assessment_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="assessment_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');   
                                }
                                ?>
                                <span class="error"><?php echo form_error('assessment_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Suggestions for the teacher in Planning :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $planning_tool=explode("#",$DB['planning_tool']);
                            foreach(planning_tool() as $k=>$v){
                                if (in_array($k, $planning_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="planning_tool[]" id="planning_tool" class="form-check-input planning_tool" onchange="PlanningToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $planning_tool)){
                                echo form_input("planning_tool_txt",isset($DB['planning_tool_txt']) ? set_value('planning_tool_txt', $DB['planning_tool_txt']) : set_value('planning_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="planning_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("planning_tool_txt",isset($DB['planning_tool_txt']) ? set_value('planning_tool_txt', $DB['planning_tool_txt']) : set_value('planning_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="planning_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('planning_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher regarding 'INSTRUCTION':<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            
                            $suggestion_tool=explode("#",$DB['suggestion_tool']);
                            foreach(suggestion_tool() as $k=>$v){
                                if (in_array($k, $suggestion_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="suggestion_tool[]" id="suggestion_tool" class="form-check-input suggestion_tool" onchange="SuggestionToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php 
                                if (in_array('99', $suggestion_tool)){
                                echo form_input("suggestion_tool_txt",isset($DB['suggestion_tool_txt']) ? set_value('suggestion_tool_txt', $DB['suggestion_tool_txt']) : set_value('suggestion_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="suggestion_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("suggestion_tool_txt",isset($DB['suggestion_tool_txt']) ? set_value('suggestion_tool_txt', $DB['suggestion_tool_txt']) : set_value('suggestion_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="suggestion_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');  
                                }
                                ?>
                                <span class="error"><?php echo form_error('suggestion_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher regarding Classroom Management:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $management_tool=explode("#",$DB['management_tool']);
                            foreach(management_tool() as $k=>$v){
                                if (in_array($k, $management_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="management_tool[]" id="management_tool" class="form-check-input management_tool" onchange="ManagementToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $management_tool)){
                                echo form_input("management_tool_txt",isset($DB['management_tool_txt']) ? set_value('management_tool_txt', $DB['management_tool_txt']) : set_value('management_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="management_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("management_tool_txt",isset($DB['management_tool_txt']) ? set_value('management_tool_txt', $DB['management_tool_txt']) : set_value('management_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="management_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');   
                                }
                                ?>
                                <span class="error"><?php echo form_error('management_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher in 'Assessment':<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            $action_tool=explode("#",$DB['action_tool']);
                            foreach(action_tool() as $k=>$v){
                                if (in_array($k, $action_tool)){$chk='checked';}else{$chk='';}
                            echo'<input type="checkbox" name="action_tool[]" id="action_tool" class="form-check-input action_tool" onchange="ActionToolTxt();" value="'.$k.'" '.$chk.'>'.$v.'<br>';
                            }
                            ?>
                            </div>
                                <?php
                                if (in_array('99', $action_tool)){
                                echo form_input("action_tool_txt",isset($DB['action_tool_txt']) ? set_value('action_tool_txt', $DB['action_tool_txt']) : set_value('action_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="action_tool_txt" style="display:block" class="validate[required] form-control" autocomplete="off"');
                                }else{
                                echo form_input("action_tool_txt",isset($DB['action_tool_txt']) ? set_value('action_tool_txt', $DB['action_tool_txt']) : set_value('action_tool_txt',''), 'placeholder="Your Comments/Suggestions" id="action_tool_txt" style="display:none" class="validate[required] form-control" autocomplete="off"');
                                }
                                ?>
                                <span class="error"><?php echo form_error('action_tool_txt'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="" class="col-sm-12 col-form-label">Overall grading of the teacher:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_grading",isset($DB['obs_grading']) ? set_value('obs_grading', $DB['obs_grading']) : set_value('obs_grading',''), 'placeholder="Overall grading of the teacher" id="obs_grading" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('obs_grading'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Note: If the teacher has been graded average/below average, the supervisor must give a brief note highlighting the areas of concern and remedial measures to be taken by the principal:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("per_garding",isset($DB['per_garding']) ? set_value('per_garding', $DB['per_garding']) : set_value('per_garding',''), 'placeholder="Performance Grading Desc." id="per_garding" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('per_garding'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="" class="col-sm-12 col-form-label">Date of Submission:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_sub_date", isset($DB['obs_sub_date']) ? set_value('obs_sub_date', date('d-m-Y', strtotime($DB['obs_sub_date']))) : set_value('obs_sub_date',''), 'placeholder="dd-mm-yyyy"  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <span class="error"><?php echo form_error('obs_sub_date'); ?></span>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                        <?php if(isset($DB)&& !empty($DB['created_by']) &&($DB['created_by']==$this->auth_user_id)){ ?>
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="Update Observation Data">
                        </div>
                        <?php }elseif (isset($DB)&& !empty($DB['created_by']) &&($DB['created_by']!=$this->auth_user_id)) { ?>
                        <a class="btn btn-block btn-warning text-center" href="<?php echo site_url('observed-data'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Back To Observed Data
                        </a>   
                        <?php }else{?>
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="Submit Observation Data">
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
                    return base_url + 'tools/Webtools/GetEmployeeDetails/' + params.term;
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
                    url: base_url + 'tools/Webtools/GetEmployeeBasic',
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
                url: base_url + 'tools/Webtools/GetObsSubject',
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
        if(ltary.includes("99")){ $('#lession_topic_txt').show(); }else{ $('#lession_topic_txt').hide(); }
    }
    function LessionPlanTxt(){
        var lp=0;
        var lpary = [];       
        $('.lession_plan:checked').each(function(){ lpary[lp++] = $(this).val(); });
        if(lpary.includes("99")){ $('#lession_plan_txt').show(); }else{ $('#lession_plan_txt').hide(); }
    }
    function TeacherStudentTxt(){
        var ts=0;
        var tsary = [];       
        $('.teacher_student:checked').each(function(){ tsary[ts++] = $(this).val(); });
        if(tsary.includes("99")){ $('#teacher_student_txt').show(); }else{ $('#teacher_student_txt').hide(); }
    }
    function StudentInvolveTxt(){
        var si=0;
        var siary = [];       
        $('.student_involve:checked').each(function(){ siary[si++] = $(this).val(); });
        if(siary.includes("99")){ $('#student_involve_txt').show(); }else{ $('#student_involve_txt').hide(); }
    }
    //============================================ 2 ===================================================//
    function TeacherImproveTxt(){
        var ti=0;
        var tiary = [];       
        $('.teacher_improve:checked').each(function(){ tiary[ti++] = $(this).val(); });
        if(tiary.includes("99")){ $('#teacher_improve_txt').show(); }else{ $('#teacher_improve_txt').hide(); }
    }
    function InstructionToolTxt(){
        var it=0;
        var itary = [];       
        $('.instruction_tool:checked').each(function(){ itary[it++] = $(this).val(); });
        if(itary.includes("99")){ $('#instruction_tool_txt').show(); }else{ $('#instruction_tool_txt').hide(); }
    }
    function ClassroomToolTxt(){
        var ct=0;
        var ctary = [];       
        $('.classroom_tool:checked').each(function(){ ctary[ct++] = $(this).val(); });
        if(ctary.includes("99")){ $('#classroom_tool_txt').show(); }else{ $('#classroom_tool_txt').hide(); }
    }
    function AssessmentToolTxt(){
        var at=0;
        var atary = [];       
        $('.assessment_tool:checked').each(function(){ atary[at++] = $(this).val(); });
        if(atary.includes("99")){ $('#assessment_tool_txt').show(); }else{ $('#assessment_tool_txt').hide(); }
    }
    //============================================ 3 ===================================================//
    function PlanningToolTxt(){
        var pt=0;
        var ptary = [];       
        $('.planning_tool:checked').each(function(){ ptary[pt++] = $(this).val(); });
        if(ptary.includes("99")){ $('#planning_tool_txt').show(); }else{ $('#planning_tool_txt').hide(); }
    }
    function SuggestionToolTxt(){
        var su=0;
        var suary = [];       
        $('.suggestion_tool:checked').each(function(){ suary[su++] = $(this).val(); });
        if(suary.includes("99")){ $('#suggestion_tool_txt').show(); }else{ $('#suggestion_tool_txt').hide(); }
    }
    function ManagementToolTxt(){
        var ma=0;
        var maary = [];       
        $('.management_tool:checked').each(function(){ maary[ma++] = $(this).val(); });
        if(maary.includes("99")){ $('#management_tool_txt').show(); }else{ $('#management_tool_txt').hide(); }
    }
    function ActionToolTxt(){
        var ac=0;
        var acary = [];       
        $('.action_tool:checked').each(function(){ acary[ac++] = $(this).val(); });
        if(acary.includes("99")){ $('#action_tool_txt').show(); }else{ $('#action_tool_txt').hide(); }
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
</script>
</body>
</html>
