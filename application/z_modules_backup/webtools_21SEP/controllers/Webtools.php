<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webtools extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tools_model');
    }

    public function Observation($enSno=null){
        
        
        if($ObsData = $this->input->post(null, true)) {
            //show($ObsData);
            
            $response = $this->tools_model->setObservedData($ObsData);
            if ($response == 1) {
                //=============================== GENERATE PDF BY AASIT KUMAR ====================================//
                
                $this->load->library('MailerLib');
                $this->load->library('Pdf');
                $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetTitle('CLASSROOM OBSERVATION REPORT');
                $EmpFor='Teacher Name : '.ucwords(strtolower($ObsData['emp_name'])).' [ '.$ObsData['emp_code'].' ]';
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, $EmpFor);
                    //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                    //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                    $pdf->SetDefaultMonospacedFont('helvetica');
                    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                    $pdf->SetFont('freesans', '', 10);
                    $pdf->setFontSubsetting(false);
                    $pdf->AddPage();
                    /*ob_start();
                        // we can have any view part here like HTML, PHP etc
                        $content = ob_get_contents();
                    ob_end_clean();*/
                    //===================== APPEND FORM DATA INTO PDF START ======================//
                    $html='';
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">1. Basic Details of The Teacher ::</span>
                            </div>';
                    $html.='<table style="width:100%">
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>TEACHER NAME :</b></th>
                          <th><b>TEACHER CODE :</b></th> 
                          <th><b>TEACHER EMAIL :</b></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.$ObsData['emp_name'].'</td>
                          <td>'.$ObsData['emp_code'].'</td> 
                          <td>'.$ObsData['emp_mail'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>KV NAME :</b></th> 
                          <th><b>KV CODE :</b></th>
                          <th><b>KV REGION :</b></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.$ObsData['emp_kvname'].'</td> 
                          <td>'.$ObsData['emp_kvcode'].'</td>
                          <td>'.$ObsData['emp_region'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>TEACHER DESIGNATION :</b></th>
                          <th><b>TEACHER SUBJECT :</b></th> 
                          <th></th>
                        </tr>
                        <tr>
                          <td>'.$ObsData['emp_desig'].'</td>
                          <td>'.$ObsData['emp_subject'].'</td> 
                          <td></td>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        </table>';
                        $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">2. Details of The Observation ::</span>
                            </div>';
                        $html.='<table>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>OBSERVER NAME :</b></th>
                          <th><b>OBSERVER DESIGNATION :</b></th> 
                          <th></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.$ObsData['obs_name'].'</td>
                          <td>'.desig_of_observer($ObsData['obs_desig']).'</td> 
                          <td></td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>OBSERVED CLASS :</b></th> 
                          <th><b>OBSERVED SUBJECT :</b></th>
                          <th><b>OBSERVED SECTION :</b></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.observed_class($ObsData['obs_class']).'</td> 
                          <td>'.observed_subject(null,$ObsData['obs_subject']).'</td>
                          <td>'.$ObsData['obs_section'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>STUDENTS ON ROLL :</b></th>
                          <th><b>STUDENTS PRESENT :</b></th> 
                          <th><b>STUDENTS ABSENT :</b></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.$ObsData['stu_onroll'].'</td>
                          <td>'.$ObsData['stu_present'].'</td> 
                          <td>'.$ObsData['stu_absent'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>OBSERVED TOPIC :</b></th> 
                          <th><b>OBSERVED SUB-TOPIC :</b></th>
                          <th><b>OBSERVED SUB-TOPIC :</b></th>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        <tr>
                          <td>'.$ObsData['obs_topic'].'</td> 
                          <td>'.$ObsData['obs_sub_topic'].'</td>
                          <td>'.$ObsData['obs_competency'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:2px;">&nbsp;</td></tr>
                        <tr>
                          <th><b>OBSERVED TIME PERIOD :</b></th><td colspan="2">'.$ObsData['obs_time_period'].'</td>
                        </tr>
                        <tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr>
                        </table>';
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">3. Introduction to the lesson / topic::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(new_lession_topic() as $k=>$v){
                        if (in_array($k, $ObsData['lession_topic'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['lession_topic'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['lession_topic_txt'].'</div>';
                    }
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">4. Observations on the Lesson Plan ::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">(i) Frequency/quality of implementation in the classroom:</h3>';
                    foreach(new_lession_plan() as $k=>$v){
                        if (in_array($k, $ObsData['lession_plan'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['lession_plan'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['lession_plan_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(ii) Whether the teacher has accommodated slow/bright learners in her planning:</h3>';
                    foreach(learner_skill() as $k=>$v){
                        if ($k == $ObsData['learner_skill']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">5. Observations on::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">(i) Interaction between the teacher & the student:</h3>';
                    foreach(new_teacher_student() as $k=>$v){
                        if (in_array($k, $ObsData['teacher_student'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['teacher_student'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['teacher_student_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(ii) Application of TLM & use of audio-visual aid including ICT:</h3>';
                    $html.='<span>The Teacher using following ICT resources -<br /><br /></span>';
                    foreach(new_application_tlm() as $k=>$v){
                        if (in_array($k, $ObsData['application_tlm'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['application_tlm'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['application_tlm_txt'].'</div>';
                    }
                    
                    $html.='<h3 style="color:#f36d1b;">(iii) Involvement of the students:</h3>';
                    $html.='<span>The Teacher -<br /><br /></span>';
                    foreach(new_student_involve() as $k=>$v){
                        if (in_array($k, $ObsData['student_involve'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['student_involve'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['student_involve_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(IV) Assignments or activities in asynchronous mode:</h3>';
                    $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="checked" /><span style="font-weight: normal!important;">Name of the online platform(e.g. Microsoft Teams/Google Classroom/Whatsapp/Blog/etc.)</span><br>';
                    $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Details : </span>'.$ObsData['online_platform_txt'].'</div>';
                    $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="checked" /><span style="font-weight: normal!important;">Comments on Links of videos assigned (Self-made/from other sources) and exercises based on the videos</span><br>';
                    $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Details : </span>'.$ObsData['video_link_txt'].'</div>';
                    $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="checked" /><span style="font-weight: normal!important;">Comments on Interactive worksheets used - Quality and type</span><br>';
                    $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Details : </span>'.$ObsData['int_worksheet_txt'].'</div>';
                    $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="checked" /><span style="font-weight: normal!important;">Non-interactive worksheets – Whether correction was done?</span><br>';
                    foreach(opt_yes_no() as $k=>$v){
                        if ($k == $ObsData['non_int_worksheet']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px; color:#f36d1b;" type="radio" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="checked" /><span style="font-weight: normal!important;">Writing assignments given & collected back as image/pdf and correction done?</span><br>';
                    foreach(opt_yes_no() as $k=>$v){
                        if ($k == $ObsData['non_int_assignment']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px; color:#f36d1b;" type="radio" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if ($ObsData['assignment_mode']==99){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['assignment_mode_txt'].'</div>';
                    }
                    
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">6. Findings on the competence of the children on a random sample basis (eg. utilizing written test/question-answer/verification of homework record with actual question-answer sessions/ formative assessment record with some sample checking etc.) ::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">Findings:</h3>';
                    $html.='<p style="font-weight: normal!important;">'.$ObsData['obs_findings'].'</p>';
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">7. Communication skills of the teacher in English and Hindi::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(new_comm_skill() as $k=>$v){
                        if ($k == $ObsData['comm_skill']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }

                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">8. Observations on maintenance of notebooks and CCE Records::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(new_maintain_mode() as $k=>$v){
                        if ($k == $ObsData['maintain_mode']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                   
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">9. Observations on the innovations planned/experiments undertaken by the teacher & its implementation in the classroom teaching::</span>
                            </div>';
                    $html.='<p style="font-weight: normal!important;">'.$ObsData['obs_planned'].'</p>';
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">10. Areas which require improvement in the teacher::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(new_teacher_improve() as $k=>$v){
                        if (in_array($k, $ObsData['teacher_improve'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['teacher_improve'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['teacher_improve_txt'].'</div>';
                    }
                    
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">11. Any other specific observation on the classroom teaching::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">Instruction:-</h3>';
                    $html.='<span>The Teacher -<br /><br /></span>';
                    foreach(new_instruction_tool() as $k=>$v){
                        if (in_array($k, $ObsData['instruction_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['instruction_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['instruction_tool_txt'].'</div>';
                    }
                    
                    
                    $html.='<h3 style="color:#f36d1b;">Classroom management:-</h3>';
                    foreach(new_classroom_tool() as $k=>$v){
                        if (in_array($k, $ObsData['classroom_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['classroom_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['classroom_tool_txt'].'</div>';
                    }
                    
                    
                    
                    $html.='<h3 style="color:#f36d1b;">Assessment:-</h3>';
                    $html.='<span>The Teacher -<br /><br /></span>';
                    foreach(new_assessment_tool() as $k=>$v){
                        if (in_array($k, $ObsData['assessment_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['assessment_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['assessment_tool_txt'].'</div>';
                    }
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">12. Suggestions for the teacher::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">Planning:-</h3>';
                    foreach(new_planning_tool() as $k=>$v){
                        if (in_array($k, $ObsData['planning_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['planning_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['planning_tool_txt'].'</div>';
                    }
                    
                    $html.='<h3 style="color:#f36d1b;">Instruction:-</h3>';
                    foreach(new_instruction_tool2() as $k=>$v){
                        if (in_array($k, $ObsData['instruction_tool2'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['instruction_tool2'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['instruction_tool_txt2'].'</div>';
                    }
                    
                    
                    $html.='<h3 style="color:#f36d1b;">Classroom management:-</h3>';
                    foreach(new_classroom_tool2() as $k=>$v){
                        if (in_array($k, $ObsData['classroom_tool2'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['classroom_tool2'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['classroom_tool_txt2'].'</div>';
                    }
                    
                    
                    $html.='<h3 style="color:#f36d1b;">Assessment:-</h3>';
                    foreach(new_assessment_tool2() as $k=>$v){
                        if (in_array($k, $ObsData['assessment_tool2'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['assessment_tool2'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Other Details : </span>'.$ObsData['assessment_tool_txt2'].'</div>';
                    }
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">13. Overall grading of the teacher::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(overall_grading() as $k=>$v){
                        if ($k == $ObsData['overall_grading']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">14. Whether debriefing was done with the teacher after observation::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(overall_briefing() as $k=>$v){
                        if ($k == $ObsData['overall_briefing']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">15. The level of improvement shown by the teacher after considering the suggestions given during the first inspection (applicable only to second round of inspection)::</span>
                            </div>';
                    $html.='<table><tr><td colspan="3" style="min-height:1px;">&nbsp;</td></tr></table>';
                    foreach(overall_rating() as $k=>$v){
                        if ($k == $ObsData['overall_rating']){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="'.$k.'" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">Submission Date ::&nbsp; '.$ObsData['obs_sub_date'].'</span>
                            </div>';
                    $html.='<br><br><hr>';
                    $html.='<table style="width:100%">
                        <tr>
                          <th><br><br><br></th>
                        </tr>
                        <tr>
                          <th><b><i>Signature of the Principal with date ___________________________</i></b></th>
                        </tr>
                        <tr>
                          <th><br><br></th>
                        </tr>
                        <tr>
                          <th><b><i>Signature of the teacher with date _____________________________</i></b></th> 
                        </tr>
                        <tr>
                          <th><br><br><br><br></th>
                        </tr>
                        <tr>
                          <th><b><i>Signature of the inspecting authority</i></b></th> 
                        </tr>
                        <tr>
                          <th><span>(Name & Designation)</span></th> 
                        </tr>
                        </table>';
                    //===================== APPEND FORM DATA INTO PDF START ======================//
                    $pdf->writeHTML($html, true, false, true, false, '');
                    //$pdf->writeHTML('Medicine', true, false, true, false, '');
                    $filename=$ObsData['emp_code'].'_Observed Teacher Data-'.date("d-m-Y").'.pdf';
                    $NewPdfFile = './Excel/'.$filename;
                    ob_clean();
                    //$pdf->Output( $sFilePath , 'F');
                    $pdf->Output(FCPATH.$NewPdfFile, 'F');
                    //show($ObsData);
                    //die;
                    //print_r($NewPdfFile); echo "<br>"; die('testing');

                    //=============================== GENERATE PDF BY AASIT END====================================//
                    $this->mailerlib->pushMailAttach($Sub='Classroom Observation Data',$Msg='Madadm / Sir,<br> Please find the Classroom Observation Data file as an attachment to this mail.',$To= $this->email_id , $filename);
                    $this->session->set_flashdata('success', 'Observation Data Saved/Updated Successfully');
                    redirect(base_url('new-observed-data'));
            } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('new-observed-data'));
            }
        }
        //============================== VIEW FORM START ===================================//
        if($enSno==null){
            $view_data['EX']=0;
            $view_data['DB']='';
        }else{
            $Sno= DecryptIt($enSno);
            $view_data['EX']=$Sno;
            $ExData= $this->tools_model->getObservedData($Sno);
            $view_data['DB']=$ExData[0];
        }
        $view = 'Masterform';	
        $data = array(
            'title' => WEBSITE_TITLE . ' - ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    public function AllObservation() {
        $view = 'ObservedData';	
        $data = array(
            'title' => WEBSITE_TITLE . ' - 	',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function All_Observed_Data(){
        $columns = array(
            0 => 'W.emp_code',
            1 => 'W.emp_name'
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->tools_model->getAllObservedProfile();
        $PostData = $this->input->post(null, true);
        //show($PostData);
        $search = $this->input->post('search')['value'];
        $response = $this->tools_model->getAllObservedProfile($limit, $start, $order, $dir, $search, $PostData);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['sno'] = $user->sno;
                $nestedData['enc_sno'] = EncryptIt($user->sno);
                $nestedData['emp_region'] = $user->emp_region;
                $nestedData['emp_kvname'] = $user->emp_kvname;
                $nestedData['emp_name'] = $user->emp_name;
                $nestedData['emp_code'] = $user->emp_code;
                $nestedData['emp_desig'] = $user->emp_desig;
                $nestedData['emp_subject'] = $user->emp_subject;
                $nestedData['obs_name'] = $user->obs_name;
                $nestedData['obs_desig'] = $user->obs_desig;
                $nestedData['overall_grading'] = overall_grading($user->overall_grading);
                $nestedData['created_at'] = $user->created_at;
                $nestedData['created_by'] = $user->created_by;
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        
            echo json_encode($json_data);
    }
    function SendObservedData($RoId=null,$KvId=null){
    //echo 'Come'; die;
        $this->load->library("excel");
        $this->load->library('MailerLib');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("SNO#","REGION","KV NAME","KV CODE","TEACHER NAME","TEACHER CODE","POST","SUBJECT",
            "OBSERVER NAME","DESIGNATION","OVERALL GRADE","OBSERVED DATE");
        $column = 0;

        foreach($table_columns as $field){
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         $column++;
        }
        $ObsData = $this->tools_model->fetch_observed_data($RoId,$KvId);
        //show($ObsData);
        $excel_row = 2;
        $Sno=1;
        foreach($ObsData as $T){
            
            
            //echo $lt_str; die;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $Sno);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $T->REG);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $T->KVN);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $T->KVC);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $T->EMP);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $T->EMC);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $T->POS);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $T->SUB);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $T->OBS);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, desig_of_observer($T->OBD));
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, overall_grading($T->GRD));
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row,$T->ODT);
            $Sno++;
            $excel_row++;
        }
        $filename='Observed Teacher Data-'.date("d-m-Y").'.xls';
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $object_writer->save('php://output');
        
        //$name = './Excel/'.$filename;
        //$object_writer->save($name);
        //$this->mailerlib->pushMailAttach($Sub='Class Observation Data',$Msg='Madadm/Sir,<br> Please find attached sheet.',$To='kvspims@gmail.com',$filename);
        //echo 'Mail has been sent successfully. Check your mail.';
        
    }
    public function GetEmployeeDetails($ST){
        if ($this->input->is_ajax_request()) {
            $data=$this->tools_model->GetRecipient($ST);
            $json=array();
            foreach($data as $d){
                $x=array(
                    'ID'=>$d->ID,
                    'NAME'=>$d->NAME
                );
                array_push($json,$x);
            }
            echo json_encode($json);
	}
    }
    public function GetEmployeeBasic(){
        //echo 'hello';
        if ($this->input->is_ajax_request()) {
            $EmpId = $this->input->post('EmpId');
            $EmpData=$this->tools_model->GetEmpBasic($EmpId);
            echo json_encode($EmpData[0]);
	}
    }
    public function GetObsSubject(){
        //echo 'hello';
        if ($this->input->is_ajax_request()) {
            $ClsId = $this->input->post('ClsId');
            $KeyId = null;
            echo form_dropdown("obs_subject", array("" => "Select Subject") + observed_subject($ClsId,$KeyId), isset($DB['obs_subject']) ? set_value('obs_subject', $DB['obs_subject']) : set_value('obs_subject',''),' id="obs_subject" class="form-control validate[required]" autocomplete="off"');
	}
    }      
}
