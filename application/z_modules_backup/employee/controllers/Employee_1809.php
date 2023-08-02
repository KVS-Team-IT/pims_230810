<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Employee extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->library('encrypt');
    }
    public function index() {
        if ($getEmpCode = $this->input->post(null, true)) { 
            redirect(base_url("personal-details/".EncryptIt($getEmpCode['EmpCode'])));
        }
        $view = 'index';
        $view_data='';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Employee Management Section',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function resizeImage($filename){
        $source_path = './img/ProImage/' . $filename;
        $target_path = './img/ProImage/thumbnail/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => FALSE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb',
            'width' => 80,
            'height' => 100
        );
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }
    public function uploadImage($_FILE){
        $ImgArr=array();
        if ( ! $this->upload->do_upload('emp_photo')) {
            
            $error_msg = isset($response['error']) ? $response['error'] : $this->upload->display_errors();
            $ImgArr['name']  = '';
            $ImgArr['upmsg'] = $error_msg;
            
            }else { 

            $uploadedImage = $this->upload->data();
            $this->resizeImage($uploadedImage['file_name']);
            $ImgArr['name']  = $uploadedImage['file_name'];
            $ImgArr['upmsg'] = 'Success';
            
            }
        return $ImgArr;
    }
    /* AS RESULT SECTION REMOVE
        public function resizeImageRes($filename){
        $source_path = './img/ResImage/' . $filename;
        $target_path = './img/ResImage/thumbnail/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => FALSE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb',
            'width' => 80,
            'height' => 100
        );
        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }
    * 
    */
    //============================ P E R S O N N E L - S E C T I O N =================================//
    public function personal_details($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['PerData'] = $this->employee_model->getPersonalData($ExEc);
            $view_data['PrePost'] = $this->employee_model->getpresentServiceData($ExEc);
            //$view_data['CurData'] = array();
            $view_data['CurData'] = $this->employee_model->getCurrentData();
        } else{
            $view_data['EnEmpId']='';
            $view_data['EmpCode']='';
            $view_data['CurData'] = $this->employee_model->getCurrentData();
        }
        // Insert / Update Personnel Information
        if ($emp_per_data = $this->input->post(null, true)) { 
            //log_message('info', json_encode($emp_per_data));
            // Personal Details
            $this->form_validation->set_rules('emp_title', 'Title', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_name', 'First Name', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_mother_name', 'Mothers Name', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_mother_title', 'Mothers Name', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_gender', 'Gender', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_dob', 'DOB', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_marital_status', 'Marital Status', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_mobile', 'Mobile Number', 'required|xss_clean|callback_regex_check');
            if(!empty($this->input->post('emp_aadhaar_no'))){
            $this->form_validation->set_rules('emp_aadhaar_no', 'Aadhaar Number', 'required|xss_clean');
            }
            if(!empty($this->input->post('emp_passport_no'))){
            $this->form_validation->set_rules('emp_passport_no', 'Passport Number', 'required|xss_clean');
            }
            if(!empty($this->input->post('emp_pancard_no'))){
            $this->form_validation->set_rules('emp_pancard_no', 'PanCard Number', 'required|xss_clean');
            }
            $this->form_validation->set_rules('emp_blood_group', 'Blood Group', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_address', 'Address', 'required|xss_clean');
            $this->form_validation->set_rules('emp_resaddress', 'Residential Address', 'required|xss_clean');
            $this->form_validation->set_rules('emp_pincode', 'Pincode Number', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_hometown', 'Hometown', 'required|xss_clean');
            $this->form_validation->set_rules('emp_single_parent', 'This Field', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_identity_mark', 'Identity Mark', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_religion', 'Religion', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_category', 'Category', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_physical_handicapped', 'This Field', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('emp_gadget', 'Gadget Detail', 'required|xss_clean|callback_regex_check');
            //for present post
            $this->form_validation->set_rules('present_designationid', 'Designation', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_role_id', 'Place of Posting', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_region_id', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_kvcode', 'KV Code', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_zone', 'Zone', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_joiningdate', 'Joining Date', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_appoint_trail', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_appointed_term', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_category', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            
            //Initialize Image Uploading
            $config['upload_path'] = "./img/ProImage";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            // For Image Validation
            $AvlImg = $emp_per_data['emp_photo_avl'];
            if(empty($AvlImg)){ //First Time Upload
                $Resp = $this->uploadImage($_FILES); 
                if(empty($Resp['name'])){
                    $response['error']=$Resp['upmsg'];
                }else{
                    $emp_per_data['emp_upload_photo']=$Resp['name'];
                }
            }elseif ((!empty($AvlImg)) && (isset($_FILES)) && !empty($_FILES['emp_photo']['name'])) { //Update Image Upload
                $Resp = $this->uploadImage($_FILES);
                if(empty($Resp['name'])){
                    $response['error']=$Resp['upmsg'];
                }else{
                    $emp_per_data['emp_upload_photo']=$Resp['name'];
                }
            }else{
                $emp_per_data['emp_upload_photo']=$AvlImg;
            }
            
            // Call to Validate Input Data
            if ($this->form_validation->run($this) !== FALSE) {
                
                $response = $this->employee_model->setPersonalData($emp_per_data);
                
                if (($response['status'] == 'success')&&($response['action'] == 'INS')) {
                    $response['password']='Pis@2020';
                    // On Successful Registration send Confirm Message with Login Credential
                    $this->load->library('MailerLib');
                    $Sub='PIMS - Registration Details';
                    $Msg="<h3>Dear ".$response['emp_name'].",<br><br></h3>
                    <p align='justify'>You have successfully registered on <b>KVS - Personnel Information Management System</b> 
                    <br><br>Your registration details are as follows.</p>
                    
                    <table>
                    <tr><td><b>Employee Id / Username</b></td><td> - </td><td>".$response['username']."</td></tr>
                    <tr><td><b>Temporary Password    </b></td><td> - </td><td>".$response['password']."</td></tr>
                    </table>
                    <br>
                    <p align='justify'>Kindly, log in into the <i>KVS - Personnel Information Management System  </i>
                        ( url : <a href='http://pis.kvs.gov.in'>http://pis.kvs.gov.in</a> )
                        using your Username and Temporary Password sent on the mail.
                        <br><br><b>**</b> Update your password on first login, for security perspective.</p><br>


                    <p>Thank you,<br>
		    <i>KVS - Personnel Infomation Management System.</i></p>";
                    
                    $To=$response['emp_email'];
                    $this->mailerlib->pushMail($Sub,$Msg,$To);
                    
                    $this->session->set_flashdata('success', 'Employee has been registered successfully. Login Details has been sent on registered email id.');
                    redirect(base_url('service-details/'. EncryptIt($response['emp_code'])));
                    
                } elseif(($response['status'] == 'success')&&($response['action'] == 'UPD')){
                    $response['password']='Pis@2020';
                    // On Successful Registration send Confirm Message with Login Credential
                    $this->load->library('MailerLib');
                    $Sub='PIMS - Registration Details';
                    $Msg="<h3>Dear ".$response['emp_name'].",<br><br></h3>
                    <p align='justify'>You have successfully registered on <b>KVS - Personnel Information Management System</b>
                    <br><br>Your registration details are as follows.</p>

                    <table>
                    <tr><td><b>Employee Id / Username</b></td><td> - </td><td>".$response['username']."</td></tr>
                    <tr><td><b>Temporary Password    </b></td><td> - </td><td>".$response['password']."</td></tr>
                    </table>
                    <br>
                        <p align='justify'>Kindly, log in into the <i>KVS - Personnel Information Management System  </i>
                        ( url : <a href='http://pis.kvs.gov.in'>http://pis.kvs.gov.in</a> )
                        using your Username and Temporary Password sent on the mail.
			<br><br><b>**</b> Update your password on first login, for security perspective.</p><br>


                    <p>Thank you,<br>
                    <i>KVS - Personnel Infomation Management System.</i></p>";

                    
                    $To=$response['emp_email'];
                    $this->mailerlib->pushMail($Sub,$Msg,$To);
                    
                    $this->session->set_flashdata('success', 'Employee data updated successfully.');
                    redirect(base_url('personal-details/'. EncryptIt($response['emp_code'])));
                    
                } else {
                    
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Something wrong in the form kindly recheck again';
                    redirect(base_url('personal-details/'. EncryptIt($response['emp_code'])));
                }
            }
        }
        

        $view = 'personal_details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Personal Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    //===================== P E R S O N N E L - S E C T I O N - E N D =======================//
    //============================ S E R V I C E - D E T A I L S =================================//
    public function service_details($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['initialpost'] = $this->employee_model->getinitialServiceData($ExEc);
            $view_data['presentpost'] = $this->employee_model->getpresentServiceData($ExEc);
            $view_data['allpost'] = $this->employee_model->getallServiceData($ExEc);
            //print_r($view_data['presentpost']);
            $view_data['LeaveData'] = $this->employee_model->getLeaveData($ExEc);
            $view_data['LtcData'] = $this->employee_model->getLtcData($ExEc);
            $view_data['OtherData'] = $this->employee_model->getOtherDetailData($ExEc);
            $view_data['DisciplinaryData'] = $this->employee_model->getDisciplinaryData($ExEc);
            $view_data['dob'] = $this->employee_model->getDobData($ExEc);
            // ================ Cut of Date 30th June of current month ======================= //
            $dob=$view_data['dob'];
            $date1 = new DateTime($dob);
            $date2 = new DateTime(date('30-06'.'-Y'));
            $interval = $date1->diff($date2);
            $age=$interval->y;
            $dob_m=date('d-m',strtotime($dob));
            if($dob_m<date('d-m')){
                    $age=$age-1;
            }

            
            $retirement = retirement_date( $view_data['dob']); 
            $view_data['date_of_retirement'] = date_format(date_create($retirement), 'd-m-Y');
            if($age<40)
            {
                $view_data['age']=1;
            }elseif ($age>=40) {
                $view_data['age']=2;
            }
        //print_r($view_data['age']);die;    
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_service_data = $this->input->post(null, true)) {
           //show($this->input->post());
            $this->form_validation->set_rules('initial_designationid', 'Designation', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_role_id', 'Place of Posting', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_region_id', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_kvcode', 'KV Code', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_appoint_specialdrive', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_joiningdate', 'Joining Date', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_appoint_trail', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_appointed_term', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_lien', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('initial_category', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            
            if (!empty($this->input->post(alldesignationid[0]))){
                //for all service post
                $this->form_validation->set_rules('alldesignationid[]', 'Designation', 'required|integer|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('all_role_id[]', 'Place of Posting', 'required|integer|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('region_id_all[]', 'This Field', 'required|integer|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('all_kvcode[]', 'This Field', 'required|integer|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('all_fromdate[]', 'This Field', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('all_todate[]', 'This Field', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('all_appoint_trail[]', 'This Field', 'required|integer|xss_clean|callback_regex_check');
                //$this->form_validation->set_rules('transfer_ground', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            }
            //for leave 
            $this->form_validation->set_rules('leave_type[]', 'Type', 'required|xss_clean');
            $leavetype=$this->input->post('leave_type[]');
            if($leavetype[0]!=8)
            {
                $this->form_validation->set_rules('leave_from_date[]', 'From', 'required|xss_clean');
                $this->form_validation->set_rules('leave_to_date[]', 'To', 'required|xss_clean');
                $this->form_validation->set_rules('duration[]', 'Duration', 'required|xss_clean'); 
            }

            //for ltc
            $this->form_validation->set_rules('ltc_type[]', 'Type', 'required|xss_clean');
            $ltc_type=$this->input->post('ltc_type[]');
            if($ltc_type[0]!=3)
            {
                $this->form_validation->set_rules('ltc_year[]', 'From', 'required|xss_clean');
                $this->form_validation->set_rules('amountgot[]', 'To', 'required|xss_clean');
            }
             
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setServiceData($emp_service_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('academic-details/'. EncryptIt($emp_service_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('service-details/'. EncryptIt($emp_service_data['emp_id'] )));
                }
            }
        }
        $view = 'service_details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Service Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '1', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Service Details End =================================//
    //============================ Academic Details Start =================================//
    public function academic_details($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $AC_MAS = $this->employee_model->getAcademicData($ExEc);
            $AC_MASTER=array();
            foreach($AC_MAS as $AC){
                if($AC->emp_education=='2'){
                    $AC_DTL = $this->employee_model->getAcademicDetailData($AC->id, $AC->emp_id);
                    $AC->edulist=$AC_DTL;
                }else{
                    $AC->edulist=array();
                }
                array_push($AC_MASTER,$AC);
            }
            $view_data['AcdmData']['edu']=$AC_MASTER;
            $view_data['AcdmData']['pro']=$this->employee_model->getProfessionalData($ExEc);
            $view_data['AcdmData']['com']=$this->employee_model->getProficiencyData($ExEc);
            $view_data['AcdmData']['pub']=$this->employee_model->getPublicationData($ExEc);
            $view_data['AcdmData']['qua']=$this->employee_model->getProfessionalQualificationData($ExEc);
            //print_r($view_data['AcdmData']['pub']); die;
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        // ========================= ACADEMIC INSERT / UPDATE STARTS FROM HERE ==========================//
        if ($emp_acm_data = $this->input->post(null, true)) {
            
            $this->form_validation->set_rules('is_qualified', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $qualified=$this->input->post('is_qualified');
            if($qualified==1){
                $this->form_validation->set_rules('emp_education[]', 'Qualification', 'required|xss_clean');
                $this->form_validation->set_rules('name_of_exam[]', 'Name of Exam', 'required|xss_clean');
                $this->form_validation->set_rules('board_univ_name[]', 'Board/University Name', 'required|xss_clean');
                $this->form_validation->set_rules('grad_all_tot_marks[]', 'Total Marks', 'required|xss_clean');
                $this->form_validation->set_rules('grad_all_marks[]', 'Marks Obtained', 'required|xss_clean');
                $this->form_validation->set_rules('grad_all_tot_percent[]', 'Percentage', 'required|xss_clean');
            }
           
            $this->form_validation->set_rules('is_professional_experience', 'This Field', 'required|integer|xss_clean');
            $exp=$this->input->post('is_professional_experience');
            if($exp==1){
                $this->form_validation->set_rules('org_name[]', 'Organization/University', 'required|xss_clean');
                $this->form_validation->set_rules('desg_name[]', 'Designation', 'required|xss_clean');
                $this->form_validation->set_rules('org_addrs[]', 'Place of Work', 'required|xss_clean');
                $this->form_validation->set_rules('job_start_date[]', 'Job Start Date', 'required|xss_clean');
                $this->form_validation->set_rules('job_end_date[]', 'Job End Date', 'required|xss_clean');
                $this->form_validation->set_rules('job_desc[]', 'Job Description', 'required|xss_clean');
            }

            $this->form_validation->set_rules('is_comp_prof', 'This Field', 'required|integer|xss_clean');
            $comp=$this->input->post('is_comp_prof');
            if($comp==1){
                $this->form_validation->set_rules('comp_prof_in[]', 'This Field', 'required|xss_clean');
            }

            $this->form_validation->set_rules('is_publication', 'This Field', 'required|integer|xss_clean');
            $pub=$this->input->post('is_publication');
            if($pub==1){
                $this->form_validation->set_rules('book_name[]', 'Book Name', 'required|xss_clean');
                $this->form_validation->set_rules('year[]', 'Year', 'required|xss_clean');
                $this->form_validation->set_rules('letter_no[]', 'Approval letter from KVS', 'required|xss_clean');
            }

            $this->form_validation->set_rules('is_professional_qualification', 'This Field', 'required|integer|xss_clean');
            $profqua=$this->input->post('is_professional_qualification');
            if($profqua==1){
                $this->form_validation->set_rules('prof_education[]', 'Qualification', 'required|xss_clean');
                $this->form_validation->set_rules('prof_board_univ_name[]', 'Board/University', 'required|xss_clean');
                $this->form_validation->set_rules('prof_duration[]', 'Duration', 'required|xss_clean');
                $this->form_validation->set_rules('prof_year[]', 'Year', 'required|xss_clean');
                $this->form_validation->set_rules('prof_tot_marks[]', 'Total Marks', 'required|xss_clean');
                $this->form_validation->set_rules('prof_all_marks[]', 'Marks Obtained', 'required|xss_clean');
            }


            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setAcademicData($emp_acm_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Academic Data Added/Updated Successfully');
                    redirect(base_url('family-details/'. EncryptIt($response['emp_code'])));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Something wrong in the form kindly recheck again';
                    redirect(base_url('academic-details/'. EncryptIt($response['emp_code'])));
                }
            }
        }
        $view = 'academic_details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Academic Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
       
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Academic Details End =================================//
    //============================ Result Details Start =================================//
    public function result_details($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $ResMas = $this->employee_model->getResultData($ExEc);
            $view_data['Mas']= $ResMas;
            if($ResMas['emp_type']==1){ // Teaching Staff
                $Tech = $this->employee_model->getResultDataTech($ExEc);
                if($ResMas['emp_dign_post']==6)
                $view_data['tPGT']=$Tech;
                if($ResMas['emp_dign_post']==8)
                $view_data['tTGT']=$Tech;
                if($ResMas['emp_dign_post']==1 || $ResMas['emp_dign_post']==2)
                $view_data['tPRI']=$Tech;
                if($ResMas['emp_dign_post']==3 || $ResMas['emp_dign_post']==7)
                $view_data['tHMS']=$Tech;
            }
            if($ResMas['emp_type']==2){ // Non Teaching Staff
                $view_data['Non'] = $this->employee_model->getResultDataNonTech($ExEc);
            }
            
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        // =============== RESULT INSERT / UPDATE STARTS FROM HERE=============//
        if ($RawResData = $this->input->post(null, true)) {
            $config['upload_path'] = "./img/ResImage";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|txt';
            $config['max_size']      = 2048;
            $config['encrypt_name'] = TRUE;
            $img_arr = array();
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            //$view_data['NT']=$RawResData; // filled form data
            if($RawResData['employee_type']==2){ //i.e. for Non-Technical Employee
                if(isset($_FILES['designated_file'])){
                    
                    $filesCount = count($_FILES['designated_file']['name']);
                    for($xx = 0; $xx < $filesCount; $xx++){
                        
                        $_FILES['file']['name']     = $_FILES['designated_file']['name'][$xx];
                        $_FILES['file']['type']     = $_FILES['designated_file']['type'][$xx];
                        $_FILES['file']['tmp_name'] = $_FILES['designated_file']['tmp_name'][$xx];
                        $_FILES['file']['error']    = $_FILES['designated_file']['error'][$xx];
                        $_FILES['file']['size']     = $_FILES['designated_file']['size'][$xx];
                        if ( ! $this->upload->do_upload('file')) {
                            $view_data['error_msg'] = isset($response['error']) ? $response['error'] : $this->upload->display_errors();
                        }else { 

                            $uploadedImage = $this->upload->data();
                            $this->resizeImageRes($uploadedImage['file_name']);
                            $RawResData['upload_docx'][$xx]=$uploadedImage['file_name'];
                            
                        }
                    
                    }
                }
            }
            //show($RawResData);
            $response = $this->employee_model->setResultData($RawResData);
            if ($response['status'] == 'success') {
                $this->session->set_flashdata('success', 'Result Data Added/Updated Successfully');
                redirect(base_url('family-details/'. EncryptIt($response['emp_code'])));
            } else {
                $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Something wrong in the form kindly recheck again';
                redirect(base_url('result-details/'. EncryptIt($response['emp_code'])));
            }
        }
        $view = 'result_details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Result Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Result Details End =================================//
    //============================ Family Details Start =================================//
    public function family_details($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $empDetails = $this->employee_model->emp_details( $ExEc);
            
            $view_data['is_married'] = $empDetails ['emp_marital_status'];
            $view_data['religion'] = $empDetails ['emp_religion'];
            $view_data['FamyData'] = $this->employee_model->getFamilyData($ExEc);
            $view_data['NomineeData'] = $this->employee_model->getNomineeData($ExEc);
            $view_data['SpouseData'] = $this->employee_model->getSpouseData($ExEc);
            //echo '<pre>';print_r($view_data['NomineeData']);die;
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_family_data = $this->input->post(null, true)) {
            //echo '<pre>';echo 'dfsdfd';print_r($_POST);die;
            $this->form_validation->set_rules('relation[]', 'This Field', 'required|xss_clean|callback_regex_check');   
            //show($emp_family_data['relation']);
            if($emp_family_data['relation'][0] !='Not Applicable'){
                $this->form_validation->set_rules('title[]', 'Title ', 'required|xss_clean');
                $this->form_validation->set_rules('name[]', 'Name', 'required|xss_clean');
                $this->form_validation->set_rules('dob[]', 'DOB', 'required|xss_clean');  
                $this->form_validation->set_rules('age[]', 'Age', 'required|xss_clean');
                $this->form_validation->set_rules('dependent[]', 'Dependent', 'required|xss_clean');  
            }    
            // if($view_data['is_married']== '1'){
            //     $this->form_validation->set_rules('emp_spouse_name[]', 'Name of Spouse', 'required|xss_clean');
            //     $this->form_validation->set_rules('emp_spouse_govt_service[]', 'Whether in Govt. Service', 'required|xss_clean');
            // }     
            // //if spouse service is in govt.  
            // if($emp_family_data['emp_spouse_govt_service'] =='1'){
            //     $this->form_validation->set_rules('emp_spouse_organization_name[]', 'Organization', 'required|xss_clean');
            // }
           
            // //if employee spouse is in kvs 
            // if($emp_family_data['organization'] =='KVS'){
            //     $this->form_validation->set_rules('spouse_emp_code[]', 'Employee Code', 'required|xss_clean');
            //     $this->form_validation->set_rules('emp_spouse_kvs_designation[]', 'Designation', 'required|xss_clean');
            // }    

            // if($emp_family_data['spouse_post_designation'] =='5'|| 
            //         $emp_family_data['spouse_post_designation'] =='6'||
            //         $emp_family_data['spouse_post_designation'] =='7'||
            //         $emp_family_data['spouse_post_designation'] =='8' ){
            //     $this->form_validation->set_rules('subject_id[]', 'Subject', 'required|xss_clean');
            // }  
            $this->form_validation->set_rules('nomineerelation[]', 'This Field', 'required|xss_clean|callback_regex_check');   
            if($emp_family_data['nomineerelation'][0] !='Not Applicable'){
                $this->form_validation->set_rules('nomineetitle[]', 'Title ', 'required|xss_clean');
                $this->form_validation->set_rules('nomineename[]', 'Name', 'required|xss_clean');
                $this->form_validation->set_rules('percent[]', 'Percent', 'required|xss_clean');  
            }    
            
            if ($this->form_validation->run($this) !== FALSE) {
                    $response = $this->employee_model->setFamilyData($emp_family_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('payscale-details/'. EncryptIt( $emp_family_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = validation_errors() ;
                    redirect(base_url('family-details/'. EncryptIt($response['emp_code'])));
                }
            }
        }
        $view = 'family_details';
        
        //print_r( $view_data);die;
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Family Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Family Details End =================================//
   
    //============================ Pay-Scale Details Start =================================//
    public function payscale_section($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['PaysData'] = $this->employee_model->getPayScaleData($ExEc);
            
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_per_data = $this->input->post(null, true)) {
            
            $this->form_validation->set_rules('present_paylevel', 'This Field', 'required|integer|xss_clean|callback_regex_check');	
            $this->form_validation->set_rules('date_of_increment', 'This Field', 'required|xss_clean|callback_regex_check');           
            if ($this->form_validation->run($this) !== FALSE) {
                $empcode=$this->input->post('emp_id');
                $view['result'] = $this->employee_model->getPayScaleData($empcode);
                if(!empty($view['result'])) 
                {
                    //echo '1'; die;
                    $response = $this->employee_model->updatePayscaleData($emp_per_data,$empcode);
                    if ($response['status'] == 'success') {
                        $this->session->set_flashdata('success', 'Data Updated Successfully.');
                        redirect(base_url('award-details/'. EncryptIt($empcode)));
                    } else {
                        $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Updated. Please try again';
                        redirect(base_url('payscale-details/'. EncryptIt( $emp_family_data['emp_id'] )));
                        
                    }
                }
                    
                else{
                    //echo '2'; die;
                    $response = $this->employee_model->setPayScaleData($emp_per_data);
                    if ($response['status'] == 'success') {
                        $this->session->set_flashdata('success', 'Data Successfully Saved');
                        redirect(base_url('award-details/'. EncryptIt($empcode)));
                    } else {
                        $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'User Id or password does not match';
                        redirect(base_url('payscale-details/'. EncryptIt($emp_family_data['emp_id'] )));
                        
                    }
                }
                
                
            }
        }
        $view = 'pay_scale';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Payscale',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Pay-Scale Details End ===============================//
    //============================ Award Details Start =================================//
    public function award_section($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['AwrdData'] = $this->employee_model->getAwardData($ExEc);
            
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }

        if ($emp_award_data = $this->input->post(null, true)) {
            $this->form_validation->set_rules('is_award', 'Whether Received any Award ', 'required|xss_clean');
            if($emp_award_data['is_award']=='Yes'){
                $this->form_validation->set_rules('award[]', 'Type Of Award ', 'required|xss_clean');
                $this->form_validation->set_rules('year_of_acheivement[]', 'Award Year', 'required|xss_clean');
                $this->form_validation->set_rules('award_brief[]', 'Brief of Award', 'required|xss_clean');    
            }
               
            if($emp_award_data['is_award'] == 'Other'){
                $this->form_validation->set_rules('emp_otheraward[]', 'Award', 'required|xss_clean');    
            }
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setAwardData($emp_award_data);
            
            } else {
                $view_data['error_msg'] = validation_errors() ;
            }
            
            if ($response['status'] == 'success') {
                $this->session->set_flashdata('success', 'Data saved successfully');
                redirect(base_url('training-details/'. EncryptIt( $emp_award_data['emp_id'] )));
            }else{
                $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                redirect(base_url('award-details/'. EncryptIt($empcode)));
            } 
            
        }
        $view = 'award_section';
       
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Awards',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Award Details End =================================//
    //========================== Training Details Start ==============================//
    public function training_section($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['TranData'] = $this->employee_model->getTrainingData($ExEc);
            //print_r($view_data['TranData']);die;
            $view_data['OtherTranData'] = $this->employee_model->getOtherTrainingData($ExEc);
            $view_data['ExemptionData'] = $this->employee_model->getExemptionTrainingData($ExEc);
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_per_data = $this->input->post(null, true)) {
           //echo '<pre>'; print_r($emp_per_data); die;
            $this->form_validation->set_rules('is_attended_training', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $training=$this->input->post('is_attended_training');
            
            if($training==1){
                $this->form_validation->set_rules('course[]', 'Course Type', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('topic[]', 'Tpoic ', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('designation[]', 'Post Held', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('spell[]', 'Spell', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('duration[]', 'Duration', 'required|xss_clean');
                $spell=$this->input->post('spell[]');
                if($spell==1){
                    $this->form_validation->set_rules('t_singlefrom[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_singleto[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('venuetype[]', 'Venue', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('venueregion[]', 'This Field', 'required|xss_clean|callback_regex_check');

                }elseif($spell==2)
                {
                    $this->form_validation->set_rules('t_doublefrom1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_doubleto1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_doublefrom2[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_doubleto2[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('doublevenuetype1[]', 'Venue', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('doublevenueregion1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                }elseif($spell==3)
                {
                    $this->form_validation->set_rules('t_from1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_to1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_from2[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_to2[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_from3[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_to3[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_from4[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('t_to4[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('spellvenuetype1[]', 'Venue', 'required|xss_clean|callback_regex_check');
                    $this->form_validation->set_rules('spellvenueregion1[]', 'This Field', 'required|xss_clean|callback_regex_check');
                }
                $this->form_validation->set_rules('role[]', 'Role ', 'required|xss_clean|callback_regex_check');
                $role=$this->input->post('role[]');
                if($role==4){
                    $this->form_validation->set_rules('grading[]', 'Grading or Rating', 'required|xss_clean|callback_regex_check');
                }elseif($role==3)
                {
                    $this->form_validation->set_rules('conductedfor[]', 'Course Conducted for', 'required|xss_clean|callback_regex_check');
                }
            }
            
            $this->form_validation->set_rules('is_exemption', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $exemption=$this->input->post('is_exemption');
            if($exemption==1){
                $this->form_validation->set_rules('exemption_course[]', 'Course Type', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('exemption_ground[]', 'Exemption Ground ', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('reason[]', 'Reason of Exemption', 'required|xss_clean|callback_regex_check');
            }

            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setTrainingData($emp_per_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('performance-details/'. EncryptIt($emp_per_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('training-details/'. EncryptIt( $emp_award_data['emp_id'] )));
                }
            }
        }
        $view = 'training_section';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Training & Other Program Section',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Training Details End =================================//
    //============================ Performance Details Start =================================//
    public function performance_section($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['PerfData'] = $this->employee_model->getPerformanceData($ExEc);
            
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_performance_data = $this->input->post(null, true)) {
            $response = $this->employee_model->setPerformanceData($emp_performance_data);
        
            if ($response['status'] == 'success') {
                $this->session->set_flashdata('success', 'Data saved successfully');
                redirect(base_url('promotion-details/'. EncryptIt($emp_performance_data['emp_id'])));
            } else{
                $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                redirect(base_url('performance-details/'. EncryptIt($emp_per_data['emp_id'] )));
            }
            
        }
        $view = 'performance_section';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Performance',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Performance Details End =================================//
    //============================ Promotion Details Start =================================//
    public function promotion($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['PromData'] = $this->employee_model->getPromotionData($ExEc);
            //print_r($view_data['PromData']);
            $view_data['DemoData'] = $this->employee_model->getDemotionData($ExEc);
            //print_r($view_data['DemoData']);
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_per_data = $this->input->post(null, true)) {
           //print_r($emp_per_data); die;
            $this->form_validation->set_rules('is_promoted', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $promoted=$this->input->post('is_promoted');
            
            if($promoted==1){
                $this->form_validation->set_rules('promotion_type[]', 'Promotion Type', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('promoted_from[]', 'Promoted From', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('promoted_to[]', 'Promoted To', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('promotion_order_no[]', 'Order Number', 'required|xss_clean');
                $this->form_validation->set_rules('promotion_order_date[]', 'Order Date', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('promotion_date[]', 'Date of Actual Joining', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('is_offer_accepted[]', 'This Field', 'required|xss_clean|callback_regex_check');
                $accepted=$this->input->post('is_offer_accepted[]');
                if($accepted==2){
                    $this->form_validation->set_rules('is_debarred[]', 'This Field', 'required|xss_clean|callback_regex_check');
                    $debarred=$this->input->post('is_debarred');
                    if($debarred==1)
                    {
                        $this->form_validation->set_rules('debarred_letter_no[]', 'Letter No', 'required|xss_clean');
                        $this->form_validation->set_rules('debarred_from[]', 'Debarred From', 'required|xss_clean|callback_regex_check');
                        $this->form_validation->set_rules('debarred_to[]', 'Debarred To', 'required|xss_clean|callback_regex_check');
                        $this->form_validation->set_rules('duration[]', 'Duration', 'required|xss_clean|callback_regex_check');
                    }
                }
            }
            
            $this->form_validation->set_rules('is_demoted', 'This Field', 'required|integer|xss_clean|callback_regex_check');
            $demoted=$this->input->post('is_demoted');
            if($demoted==1){
                $this->form_validation->set_rules('demotion_from[]', 'Demoted From', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('demotion_to[]', 'Demoted To', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('demotion_date[]', 'Demotion Date', 'required|xss_clean|callback_regex_check');
            }
            
           
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setPromotionData($emp_per_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('financial-details/'. EncryptIt($emp_per_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('promotion-details/'. EncryptIt($emp_per_data['emp_id'])));
                }
            }
        }

        $view = 'promotion';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Promotion',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Promotion Details End =================================//
    //============================ Financial Details Start =================================//
    public function financial($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['FincData'] = $this->employee_model->getFinancialData($ExEc);
            //print_r($view_data['FincData']);
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_per_data = $this->input->post(null, true)) {
           
            $this->form_validation->set_rules('upgradation_type[]', 'This Field', 'required|integer|xss_clean|callback_regex_check');	
            if($emp_per_data['upgradation_type'][0] !='6'){
                $this->form_validation->set_rules('level_from[]', 'Level From ', 'required|xss_clean');
                $this->form_validation->set_rules('level_to[]', 'Level To', 'required|xss_clean');
                $this->form_validation->set_rules('order_no[]', 'Order Number', 'required|xss_clean');  
                $this->form_validation->set_rules('order_date[]', 'Order Date', 'required|xss_clean');
                $this->form_validation->set_rules('reason[]', 'Dependent', 'required|xss_clean');  
            }            
           
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setFinancialData($emp_per_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('teacher-exchange-details/'. EncryptIt($emp_per_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('financial-details/'. EncryptIt($emp_per_data['emp_id'] )));
                }
            }
        }

        $view = 'financial_details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Financial',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Financial Details End =================================//
    //============================ Exchange Details Start =================================//
    public function teacher_exchange($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['ExcgData'] = $this->employee_model->getExchangeData($ExEc);
            //print_r($view_data['ExcgData']); die; //date_from 2018-03-01
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        //print_r($view_data['ExcgData']); die;
        if ($emp_per_data = $this->input->post(null, true)) {
            $this->form_validation->set_rules('is_exchange_prog', 'This Field', 'required|integer|xss_clean|callback_regex_check');	
            $exchange_prog=$this->input->post('is_exchange_prog');
            if($exchange_prog==1){
                $this->form_validation->set_rules('program_name[]', 'Program Name', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('program_order_no[]', 'Order Number', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('country_name[]', 'Country Name', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('date_from[]', 'From Date', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('date_to[]', 'To Date', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('duration[]', 'Duration', 'required|xss_clean|callback_regex_check');
            }
            
           
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setExchangeData($emp_per_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('foreign-visit-details/'. EncryptIt($emp_per_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('foreign-visit-details/'. EncryptIt($emp_per_data['emp_id'] )));
                }
            }
        }

        $view = 'teacher_exchange';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Exchange Program',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('personal-details'));
        }
    }
    //============================ Exchange Details End =================================//
    //============================ ForeignVisit Details Start =================================//
    public function foreign_visit($EmpPisId=null) {
        if(!empty($EmpPisId)){
            $ExEc= IsEmpExist(xss_clean($EmpPisId));
            if($ExEc==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExEc;
            $view_data['EnEmpId']=$EmpPisId;
            $view_data['ForgData'] = $this->employee_model->getForeignVisitData($ExEc);
            //print_r($view_data['ForgData']);
        } else{
            $view_data['EmpCode']='';
            $view_data['EnEmpId']='';
        }
        if ($emp_per_data = $this->input->post(null, true)) {
           //print_r($emp_per_data); die;
            $this->form_validation->set_rules('is_country_visit', 'This Field', 'required|integer|xss_clean|callback_regex_check');	
            $country_visit=$this->input->post('is_country_visit');
            
            if($country_visit==1){
                $this->form_validation->set_rules('visit_year[]', 'Year', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('country_name[]', 'Country Name', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('order_no[]', 'Order Number', 'required|xss_clean');
                $this->form_validation->set_rules('duration[]', 'Duration', 'required|xss_clean|callback_regex_check');
                $this->form_validation->set_rules('purpose[]', 'Purpose', 'required|xss_clean|callback_regex_check');
            }
            
           
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->employee_model->setForeignVisitData($emp_per_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Data Successfully Saved');
                    redirect(base_url('employee/foreign_visit/'. EncryptIt($emp_per_data['emp_id'] )));
                } else {
                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
                    redirect(base_url('employee/foreign_visit/'. EncryptIt($emp_per_data['emp_id'] )));
                }
            }
        }

        $view = 'foreign_visit';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Foreign Visit',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        if(!empty($view_data['EmpCode'])){
            $this->load->view($this->template, $data);
        }else{
             redirect(base_url('employee/personal_details'));
        }
    }
     //============================ ForeignVisit Details Start =================================// 
    
    
    public function get_designation() {
        if ($this->input->is_ajax_request()) {
            $options = '<option value="">Select</option>';
            if (!empty($_POST['c_id'])) {
                $this->db->select('*');
                $this->db->from('ci_designations');
                $this->db->where('cat_id=', $_POST['c_id']);
                $this->db->order_by("name", "asc");
                $qry = $this->db->get();
                if ($qry->num_rows()) {
                    $designations = $qry->result();
                    if (!empty($designations)) {
                        foreach ($designations as $key => $designation) {
                           $options .='<option value="' . $designation->id . '">' . ucwords($designation->name) . '</option>';
                        }
                    }
                }
            }

            echo $options;
        }
    }
	
    public function get_designation_for_award() {
        if ($this->input->is_ajax_request()) {
            $options = '<option value="">Select</option>';
            if (!empty($_POST['c_id'])) {
                $ignore = [4,5,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,32,33,34,35,36,46,47,48,51,52];
                $this->db->select('*');
                $this->db->from('ci_designations');
                $this->db->where('cat_id=', $_POST['c_id'])->where_not_in('id',$ignore);
                $this->db->order_by("name", "asc");
                $qry = $this->db->get();
                if ($qry->num_rows()) {
                    $designations = $qry->result();
                    if (!empty($designations)) {
                        foreach ($designations as $key => $designation) {
                           $options .='<option value="' . $designation->id . '">' . ucwords($designation->name) . '</option>';
                        }
                    }
                }
            }

            echo $options;
        }
    }
    
    public function get_levelrange() {
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['p_id'])) {
                $this->db->select('*');
                $this->db->from('ci_level_range');
                $this->db->where('level_name=', $_POST['p_id']);
                $qry = $this->db->get()->row();
                if(!empty($qry->range_to))
                {
                  $options =$qry->range_from.'-'.$qry->range_to;   
                }else{
                  $options =$qry->range_from;     
                }
                
                echo trim($options);   
            }
            
        }
    }
    //============================== Check Vacancy Avl / Not ==================================//
    function ChkVacAvail(){
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['KvCode'])&&!empty($_POST['DesigId'])) {
                //show($this->input->post());
                $KvCode =$this->input->post('KvCode');
                $DesigId=$this->input->post('DesigId');
                $SubId  =$this->input->post('SubId');
                $EmpId  =$this->input->post('EmpId');
                //if there is no update in designation
                if(!empty($EmpId)){
                    $this->db->select('emp_id');
                    
                    $this->db->from('ci_present_service_details');
                    $this->db->where('emp_id', $EmpId);
                    $this->db->where('present_kvcode', $KvCode);
                    $this->db->where('present_designationid', $DesigId);
                    if(!empty($SubId)&& ($DesigId=='5' || $DesigId=='6') ){
                        $this->db->where('present_subject', $SubId);
                    }
                    $qry = $this->db->get();
                   // show($this->db->last_query());
                    if ($qry->num_rows()>0) {
                        echo 1;
                    } else {
                        $this->db->select("((sanctioned_post)-(inposition_post+contractual_post)) as Avl");
                        $this->db->from("ci_vacancy_master");
                        $this->db->where("`code`",$KvCode);
                        $this->db->where("`designation`",$DesigId);
                        if(!empty($SubId)&& ($DesigId=='5' || $DesigId=='6') ){
                            $this->db->where("`subject`",$SubId); // for Teaching Designation
                        }
                        $exQuery = $this->db->get();
                        //show($this->db->last_query());
                        if ($exQuery->num_rows()) {
                            $rsQuery = $exQuery->row();
                            echo $AVL=$rsQuery->Avl;
                        }else{
                            echo 0;
                        }
                    }
                }else{
                
                    $this->db->select("((sanctioned_post)-(inposition_post+contractual_post)) as Avl");
                    $this->db->from("ci_vacancy_master");
                    $this->db->where("`code`",$KvCode);
                    $this->db->where("`designation`",$DesigId);
                    if(!empty($SubId)&& ($DesigId=='5' || $DesigId=='6') ){
                            $this->db->where("`subject`",$SubId); // for Teaching Designation
                    }
                    $exQuery = $this->db->get();
                    //show($this->db->last_query());
                    if ($exQuery->num_rows()) {
                        $rsQuery = $exQuery->row();
                        echo $AVL=$rsQuery->Avl;
                    }else{
                        echo 0;
                    }
                }
            }
            
        }
    }
    function DoEncrypt(){
	if ($this->input->is_ajax_request()) {
       
 		$AD = ($this->input->post('AD'))?$this->input->post('AD'):'null';
        	$PN = ($this->input->post('PN'))?$this->input->post('PN'):'null';
        	$PS = ($this->input->post('PS'))?$this->input->post('PS'):'null';

		if($AD=='null'){ $eAD=0; }else{ $eAD = EncryptIt($AD);}
        	if($PN=='null'){ $ePN=0; }else{ $ePN = EncryptIt($PN);}
        	if($PS=='null'){ $ePS=0; }else{ $ePS = EncryptIt($PS);}
        	echo $eStr=$eAD.'/'.$ePN.'/'.$ePS;
	}
    }
    

}
