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
                                <?php echo form_input("emp_name", '', 'placeholder="Teacher Name" id="emp_name" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Teacher Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_code", '', 'placeholder="Teacher Code" id="emp_code" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_code'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Email Address:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_mail", '', 'placeholder="Teacher Mail Id" id="emp_mail" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_mail'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Region:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_region", '', 'placeholder="Teacher Region" id="emp_region" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_region'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Name of the Vidyalaya:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvname", '', 'placeholder="KV Name" id="emp_kvname" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_kvname'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_kvcode", '', 'placeholder="KV Code" id="emp_kvcode" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_kvcode'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_desig", '', 'placeholder="Teacher Designation" id="emp_desig" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_desig'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("emp_subject", '', 'placeholder="Teacher Subject" id="emp_subject" class="validate[required] form-control" autocomplete="off"'); ?>
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
                                <?php echo form_input("obs_name",'', 'placeholder="Name of the Observer" id="obs_name" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Designation of the observer:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_desig",'', 'placeholder="Designation of Observer" id="obs_desig" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Class Observed:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_class",'', 'placeholder="Class Observed" id="obs_class" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Section:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_section", '', 'placeholder="Section Observed" id="obs_section" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Students On Roll:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_onroll",'', 'placeholder="Students On roll" id="stu_onroll" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student Present:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_present",'', 'placeholder="Students Present" id="stu_present" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Student Absent:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("stu_absent",'', 'placeholder="Students Absent" id="stu_absent" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observed Subject:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_subject",'', 'placeholder="Observed Subject" id="obs_subject" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observed Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_topic",'', 'placeholder="Observed Topic" id="obs_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observed Sub Topic:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_sub_topic",'', 'placeholder="Observed Sub Topic" id="obs_sub_topic" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Competency:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_competency",'', 'placeholder="Observed Competency" id="obs_competency" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Observation Duration(Time/Period):<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("obs_time_period",'', 'placeholder="Time / Period" id="obs_time_period" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Introduction to the lesson / topic :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(lession_topic() as $k=>$v){
                            echo'<input type="checkbox" name="lession_topic[]" id="lession_topic" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
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
                            foreach(lession_plan() as $k=>$v){
                            echo'<input type="checkbox" name="lession_plan[]" id="lession_plan" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">(ii) Whether the teacher has accommodated slow/bright learners in his/her planning:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("learner_skill",'', 'placeholder="Learners Planning" id="learner_skill" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Interaction between the teacher & the student * :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(teacher_student() as $k=>$v){
                            echo'<input type="checkbox" name="teacher_student[]" id="teacher_student" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Application of TLM & use of audio-visual aid including ICT:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("audio_visual",'', 'placeholder="Application of TLM & ICT" id="audio_visual" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Involvement of the students :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(student_involve() as $k=>$v){
                            echo'<input type="checkbox" name="student_involve[]" id="student_involve" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Frequency & quality of class work / project work given:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("project_work",'', 'placeholder="Project Work" id="project_work" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Frequency of correction & quality:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("frequency_quality",'', 'placeholder="Frequency of correction & quality" id="frequency_quality" class="validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
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
                            <?php echo form_input("obs_findings",'', 'placeholder="Findings..." id="obs_findings" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Communication skills of the teacher in English and Hindi:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("comm_skill",'', 'placeholder="Communication Skill" id="comm_skill" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Observations on maintenance of notebooks and CCE Records:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_records",'', 'placeholder="Observation Records" id="obs_records" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Observations on the innovations planned/experiments undertaken by the teacher & its implementation in the classroom teaching:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_planned",'', 'placeholder="Observation Planned" id="obs_planned" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Areas which require improvement in the teacher:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(teacher_improve() as $k=>$v){
                            echo'<input type="checkbox" name="teacher_improve[]" id="teacher_improve" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Any other specific observation on the classroom teaching - (i) INSTRUCTION:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(instruction_tool() as $k=>$v){
                            echo'<input type="checkbox" name="instruction_tool[]" id="instruction_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Any other specific observation on the classroom teaching - (ii) CLASSROOM MANAGEMENT:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(classroom_tool() as $k=>$v){
                            echo'<input type="checkbox" name="classroom_tool[]" id="classroom_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Any other specific observation on the classroom teaching - (iii) ASSESSMENT :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(assessment_tool() as $k=>$v){
                            echo'<input type="checkbox" name="assessment_tool[]" id="assessment_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label"> Suggestions for the teacher in Planning :<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(planning_tool() as $k=>$v){
                            echo'<input type="checkbox" name="planning_tool[]" id="planning_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher regarding 'INSTRUCTION':<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(suggestion_tool() as $k=>$v){
                            echo'<input type="checkbox" name="suggestion_tool[]" id="suggestion_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher regarding Classroom Management:<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(management_tool() as $k=>$v){
                            echo'<input type="checkbox" name="management_tool[]" id="management_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-sm-12 col-form-label">Suggestions for the teacher in 'Assessment':<span class="reqd">*</span></label>
                            <div class="col-sm-12">
                            <div class="form-check">
                            <?php
                            foreach(action_tool() as $k=>$v){
                            echo'<input type="checkbox" name="action_tool[]" id="action_tool" class="form-check-input" value="'.$k.'">'.$v.'<br>';
                            }
                            ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="" class="col-sm-12 col-form-label">Overall grading of the teacher:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_grading",'', 'placeholder="Overall grading of the teacher" id="obs_grading" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-12">
                        <label for="" class="col-sm-12 col-form-label">Note: If the teacher has been graded average/below average, the supervisor must give a brief note highlighting the areas of concern and remedial measures to be taken by the principal:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("per_garding",'', 'placeholder="Performance Grading Desc." id="per_garding" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="" class="col-sm-12 col-form-label">Date of Submission:<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_input("obs_sub_date",'','placeholder="Observation Submission Date (DD/MM/YYYY)" id="obs_sub_date" class="validate[required] form-control" autocomplete="off"'); ?>
                            <span class="error"><?php echo form_error('emp_name'); ?></span>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="submit">

                        </div>
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
</script>
</body>
</html>
