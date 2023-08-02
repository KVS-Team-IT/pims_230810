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
                    $pdf->SetFont('helvetica', '', 9);
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['lession_topic_txt'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['lession_plan_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(ii) Whether the teacher has accommodated slow/bright learners in her planning:</h3>';
                    $html.='<p style="font-weight: normal!important;">'.$ObsData['learner_skill'].'</p>';
                    
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['teacher_student_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(ii) Application of TLM & use of audio-visual aid including ICT:</h3>';
                    foreach(new_application_tlm() as $k=>$v){
                        if (in_array($k, $ObsData['application_tlm'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['application_tlm'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['application_tlm_txt'].'</div>';
                    }
                    
                    $html.='<h3 style="color:#f36d1b;">(iii) Involvement of the students:</h3>';
                    foreach(new_student_involve() as $k=>$v){
                        if (in_array($k, $ObsData['student_involve'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['student_involve'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['student_involve_txt'].'</div>';
                    }
                    $html.='<h3 style="color:#f36d1b;">(IV) Assignments or activities in asynchronous mode:</h3>';
                    foreach(new_assignment_mode() as $k=>$v){
                        if (in_array($k, $ObsData['assignment_mode'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                            if ($k==3){
                                $html.='&emsp;&emsp;<div style="margin-bottom:10px; text-align:justify; padding-left:10px; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Details : </span>'.$ObsData['int_worksheet_txt'].'</div>';
                            }
                            if ($k==4){
                                foreach(opt_yes_no() as $O=>$R){
                                    if ($O == $ObsData['non_int_worksheet']){$chk='checked';
                                    $html.='&emsp;&emsp;<div style="text-align:justify; padding-left:10px; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Response : </span>'.$R.'</div>';
                                    }
                                }     
                            }
                            if ($k==5){
                                foreach(opt_yes_no() as $O=>$R){
                                    if ($O == $ObsData['non_int_assignment']){$chk='checked';
                                    $html.='&emsp;&emsp;<div style="text-align:justify; padding-left:10px; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><span style="color:#f36d1b; font-size:10px!important;">Response : </span>'.$R.'</div>';
                                    }
                                }     
                            }
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['assignment_mode'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['assignment_mode_txt'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['teacher_improve_txt'].'</div>';
                    }
                    
                    
                    
                    $html.='<div style="width:100%; background-color:#014a69; color:#ffffff;font-size:12px;">
                            <span style="padding:2px;">11. Any other specific observation on the classroom teaching::</span>
                            </div>';
                    $html.='<h3 style="color:#f36d1b;">Instruction:-</h3>';
                    foreach(new_instruction_tool() as $k=>$v){
                        if (in_array($k, $ObsData['instruction_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['instruction_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['instruction_tool_txt'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['classroom_tool_txt'].'</div>';
                    }
                    
                    
                    
                    $html.='<h3 style="color:#f36d1b;">Assessment:-</h3>';
                    foreach(new_assessment_tool() as $k=>$v){
                        if (in_array($k, $ObsData['assessment_tool'])){$chk='checked';
                        $html.='<input style="min-height:1px; font-size:12px;" type="checkbox" name="box" value="1" checked="'.$chk.'" /><span style="font-weight: normal!important;">'.$v.'</span><br>';
                        }else{ 
                            //$chk='';
                        }
                    }
                    if (in_array('99', $ObsData['assessment_tool'])){
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['assessment_tool_txt'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['planning_tool_txt'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['instruction_tool_txt2'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['classroom_tool_txt2'].'</div>';
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
                        $html.='<div style="text-align:justify; font-size:10px; font-weight:normal!important; borded:1px solid #ccc; padding:2px;"><b>Other Details : </b>'.$ObsData['assessment_tool_txt2'].'</div>';
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
                    $this->mailerlib->pushMailAttach($Sub='Class Observation Data',$Msg='Madadm/Sir,<br> Please find attached sheet.',$To= $this->email_id , $filename);
                    $this->session->set_flashdata('success', 'Observation Data Saved Successfully');
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
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->tools_model->getAllObservedProfile($limit, $start, $order, $dir, $search, $post_data);
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
                $nestedData['enc_emp_code'] = EncryptIt($user->emp_code);
                $nestedData['emp_code'] = $user->emp_code;
                $nestedData['emp_name'] = $user->emp_name;
                $nestedData['emp_region'] = $user->emp_region;
                $nestedData['emp_kvname'] = $user->emp_kvname;
                $nestedData['emp_kvcode'] = $user->emp_kvcode;
                $nestedData['obs_name'] = $user->obs_name;
                $nestedData['overall_grading'] = $user->overall_grading;
                $nestedData['created_at'] = date('d-m-Y', strtotime($user->created_at));
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
    function SendObservedData(){
    //echo 'Come'; die;
        $this->load->library("excel");
        $this->load->library('MailerLib');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Sno#","Teacher Name","Teacher Code","Teacher Email","Teacher Designation","Teacher Subject",
            "Region", "KV Name", "KV Code", "Observer Name","Observer Designation","Observed Class","Observed Subject","Observed Section",
            "Observed Topic","Observed Sub-Topic","Student On-Roll","Student Present","Student Absent",
            "Observed Competency","Observed Time/Period","Lession Topic","Lession Plan","Learner Skill","Interaction between the teacher & the student",
            "Application of TLM & use of audio-visual aid including ICT","Involvement of the students","Frequency & quality of class work / project work given",
            "Frequency of correction & quality","Findings","Communication skills of the teacher in English and Hindi","Observations on maintenance of notebooks and CCE Records",
            "Observations on the innovations planned/experiments undertaken by the teacher & its implementation in the classroom teaching","Areas which require improvement in the teacher",
            "Any other specific observation on the classroom teaching - (i) INSTRUCTION","Any other specific observation on the classroom teaching - (ii) CLASSROOM MANAGEMENT",
            "Any other specific observation on the classroom teaching - (iii) ASSESSMENT","Suggestions for the teacher in Planning ","Suggestions for the teacher regarding - INSTRUCTION",
            "Suggestions for the teacher regarding Classroom Management","Suggestions for the teacher in - Assessment","Overall grading of the teacher",
            "If the teacher has been graded average/below average, the supervisor must give a brief note highlighting the areas of concern and remedial measures to be taken by the principal",
            "Date of Submission");
        $column = 0;

        foreach($table_columns as $field){
         $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
         $column++;
        }
        $teacher_data = $this->tools_model->fetch_observed_data();
        $excel_row = 2;
        $Sno=1;
        
        
        foreach($teacher_data as $T){
            $lession_topic = explode("#",$T->lession_topic);
            $lt_str='';
            $C1=0;
            foreach($lession_topic as $tl){
                foreach(lession_topic() as $k=>$v){
                     if($tl==$k){
                        if($C1>0){$lt_str.=", ";}
                        $lt_str.=$v;
                        $C1++;
                    }
                }
            }
            $lession_plan = explode("#",$T->lession_plan);
            $lp_str='';
            $C2=0;
            foreach($lession_plan as $tl){
                foreach(lession_plan() as $k=>$v){
                    if($tl==$k){
                        if($C2>0){$lp_str.=", ";}
                        $lp_str.=$v;
                        $C2++;
                    }
                }
            }
            $teacher_student = explode("#",$T->teacher_student);
            $ts_str='';
            $C3=0;
            foreach($teacher_student as $tl){
                foreach(teacher_student() as $k=>$v){
                    if($tl==$k){
                        if($C3>0){$ts_str.=", ";}
                        $ts_str.=$v;
                        $C3++;
                    }
                }
            }
            $student_involve = explode("#",$T->student_involve);
            $si_str='';
            $C4=0;
            foreach($student_involve as $tl){
                foreach(student_involve() as $k=>$v){
                    if($tl==$k){
                        if($C4>0){$si_str.=", ";}
                        $si_str.=$v;
                        $C4++;
                    }
                }
            } 

            $teacher_improve = explode("#",$T->teacher_improve);
            $ti_str='';
            $C5=0;
            foreach($teacher_improve as $tl){
                foreach(teacher_improve() as $k=>$v){
                    if($tl==$k){
                        if($C5>0){$ti_str.=", ";}
                        $ti_str.=$v;
                        $C5++;
                    }
                }
            } 
            $instruction_tool= explode("#",$T->instruction_tool);
            $it_str='';
            $C6=0;
            foreach($instruction_tool as $tl){
                foreach(instruction_tool() as $k=>$v){
                    if($tl==$k){
                        if($C6>0){$it_str.=", ";}
                        $it_str.=$v;
                        $C6++;
                    }
                }
            }
            $classroom_tool= explode("#",$T->classroom_tool);
            $ct_str='';
            $C7=0;
            foreach($classroom_tool as $tl){
                foreach(classroom_tool() as $k=>$v){
                    if($tl==$k){
                        if($C7>0){$ct_str.=", ";}
                        $ct_str.=$v;
                        $C7++;
                    }
                }
            }
            $assessment_tool= explode("#",$T->assessment_tool);
            $at_str='';
            $C8=0;
            foreach($assessment_tool as $tl){
                foreach(assessment_tool() as $k=>$v){
                    if($tl==$k){
                        if($C8>0){$at_str.=", ";}
                        $at_str.=$v;
                        $C8++;
                    }
                }
            }
            $planning_tool= explode("#",$T->planning_tool);
            $pt_str='';
            $C9=0;
            foreach($planning_tool as $tl){
                foreach(planning_tool() as $k=>$v){
                    if($tl==$k){
                        if($C9>0){$pt_str.=", ";}
                        $pt_str.=$v;
                        $C9++;
                    }
                }
            }
            $suggestion_tool= explode("#",$T->suggestion_tool);
            $st_str='';
            $C10=0;
            foreach($suggestion_tool as $tl){
                foreach(suggestion_tool() as $k=>$v){
                    if($tl==$k){
                        if($C10>0){$st_str.=", ";}
                        $st_str.=$v;
                        $C10++;
                    }
                }
            }
            $management_tool= explode("#",$T->management_tool);
            $mt_str='';
            $C11=0;
            foreach($management_tool as $tl){
                foreach(management_tool() as $k=>$v){
                    if($tl==$k){
                        if($C11>0){$mt_str.=", ";}
                        $mt_str.=$v;
                        $C11++;
                    }
                }
            }
            $action_tool= explode("#",$T->action_tool);
            $act_str='';
            $C12=0;
            foreach($action_tool as $tl){
                foreach(action_tool() as $k=>$v){
                    if($tl==$k){
                        if($C12>0){$act_str.=", ";}
                        $act_str.=$v;
                        $C12++;
                    }
                }
            }
            //echo $lt_str; die;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $Sno);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $T->emp_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $T->emp_code);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $T->emp_mail);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $T->emp_desig);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $T->emp_subject);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $T->emp_region);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $T->emp_kvname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $T->emp_kvcode);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $T->obs_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, desig_of_observer($T->obs_desig));
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, observed_class($T->obs_class));
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, observed_subject(null,$T->obs_subject));
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $T->obs_section);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $T->obs_topic);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $T->obs_sub_topic);
            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $T->stu_onroll);
            $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $T->stu_present);
            $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $T->stu_absent);
            $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $T->obs_competency);
            $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $T->obs_time_period);
            $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $lt_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $lp_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $T->learner_skill);
            
            $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $ts_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $T->audio_visual);
            $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $si_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $T->project_work);
            $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $T->frequency_quality);
            $object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $T->obs_findings);
            $object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $T->comm_skill);
            $object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $T->obs_records);
            $object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $T->obs_planned);
            
            $object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $ti_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $it_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $ct_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $at_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $pt_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $st_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $mt_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $act_str);
            $object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $T->obs_grading);
            $object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $T->per_garding);
            $object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, date('d-m-Y', strtotime($T->obs_sub_date)));
           
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
