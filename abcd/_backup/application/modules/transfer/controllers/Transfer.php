<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transfer extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transfer_model');
    }
    
    //Eligible Employee for Transfer 
    public function index(){
        
        $view = 'index';
        $view_data['EMP']=$this->transfer_model->getAllEmp();

        $data = array(
            'title' => WEBSITE_TITLE . ' - Regd. Employees Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
    // UNIT Employee List
    public function unit_employee_list() {
        
        $columns = array(
            0 => 'E.id',
            1 => 'E.emp_code',
            2 => 'E.emp_name',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->transfer_model->getAllRegEmp();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->transfer_model->getAllRegEmp($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                //Only for Regular & Surplus Employee
                    ++$serial;
                    $nestedData['emp_name_code'] = $user->ENAME.'( '.$user->ECODE.' )';
                    $nestedData['emp_code'] = $user->ECODE;
                    $nestedData['enc_emp_code'] = EncryptIt($user->ECODE);
                    $nestedData['emp_status'] = $user->ESTATUS;
                    $nestedData['emp_region'] = $user->EREGION;
                    $nestedData['emp_unit'] = $user->EUNIT;
                    $nestedData['emp_subject'] = $user->ESUB;
                    $nestedData['emp_place'] = $user->EPLACE;
                    $nestedData['emp_desig'] = $user->EDESIG;
                    $nestedData['emp_trans'] = $user->EISTRANS;
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
    // Initiate Transfer Request
    public function initiate_request($typ=null, $enEmpCode=null) {
		//print_r($_POST); die();
		//print_r($typ); die();
        if($typ ==1 || $typ==2){// Direct / Indirect
        }else{
            redirect(base_url('400-PageNotFound'));
            return false;
        }
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['ED']=$this->transfer_model->getEmpDetails($EmpCode);
		//print_r($view_data['ED']); die();
        //show($view_data['ED']);
        $view_data['Ord_No']="KVS/".date('dmY')."/ORD/". strtoupper(substr(md5(time()), 0, 8));
        $view_data['Ord_Date']=date('d-m-Y');
        $view_data['Rel_No']="KVS/".date('dmY')."/REL/". strtoupper(substr(md5(time()), 0, 8));
        
        if($transfer_data = $this->input->post(null, true)) {
            
            $this->form_validation->set_rules('present_place',          'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_unit',           'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_kvcode',         'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('present_designation',    'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('transfer_place',         'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('transfer_unit',          'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('transfer_kvcode',        'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('transfer_designation',   'This Field', 'required|integer|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('transfer_orderno',       'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('transfer_orderdate',     'This Field', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('relieving_orderno',      'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('relieving_date',         'This Field', 'required|xss_clean|callback_regex_check');
            
            if ($this->form_validation->run($this) !== FALSE) {
				//$data = chackvacancy_helper($transfer_data);
				
				//if($data==1){
					
					$response = $this->transfer_model->setTransferinitiateData($transfer_data,$typ);
					if ($response['status'] == 'success') {
						redirect(base_url('print-relieving-order/'.$typ.'/'.$enEmpCode));
					} else {
						$view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'Data could not be Saved. Please try again';
						redirect(base_url('execute-transfer-order/'.$typ.'/'.$enEmpCode));
					}
				/*
				}else{
						$view_data['error_msg'] = 'Vacancy is not available. Please try again';
						$this->session->set_flashdata('error',"Vacancy is not available. Please try again.");
						redirect(base_url('execute-transfer-order/'.$typ.'/'.$enEmpCode));
				}*/
            }
            
        }
        $view = 'initiate_request';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Initiate Request',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    // On Success Initiate Transfer Request
    public function initiate_request_success($typ=null, $enEmpCode=null) {
        if($typ ==1 || $typ==2){// Direct / Indirect
        }else{
            redirect(base_url('400-PageNotFound'));
            return false;
        }
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['TYP']=$typ;
        $view_data['ID']=$EmpCode;        
        $view_data['E']=$this->transfer_model->getTransferinitiateData($EmpCode); //Employee Transfer Details
        $view = 'initiate_request_success';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Relieving Order',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    //Pending for Approval
    public function pending_for_approval() {
        $view_data['E']=$this->transfer_model->getAllTransferEmp();
        $view = 'pending_for_approval';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Pending For approval',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    //Pending for Resolution
    public function pending_for_Resolution() {
        $view_data['E']=$this->transfer_model->getAllResolutionEmp();
        $view = 'pending_for_resolution';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Pending For Resolution',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    //Process Pending Request
    public function process_pending_for_approval($enEmpCode=null) {
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['TD']=$this->transfer_model->getTransferEmpDetails($EmpCode); // Get Transfer details
        $PreSerData=$this->transfer_model->getTransferEmpPresent($EmpCode); // Get Present Service Details
        $TransData=$view_data['TD'];
        if ($SubmitData = $this->input->post(null, true)) {
            $SubmitData = $this->input->post(null, true);
            $this->form_validation->set_rules('status', 'This Field', 'required|xss_clean|callback_regex_check');
                if($SubmitData['status']=='3')
                    $this->form_validation->set_rules('reason', 'This Field', 'required|xss_clean');
                if ($this->form_validation->run($this) !== FALSE) {
                    $response = $this->transfer_model->updateTransferData($TransData ,$SubmitData,$PreSerData);
                    if ($response['status'] == 'approved') {
                        redirect(base_url('transfer/approved_request_success/'.$enEmpCode));
                    }elseif ($response['status'] == 'transferred') {
                        $this->session->set_flashdata('success',$response['message']);
                        redirect(base_url('transfer/forwarded_to_hq_success/'.$enEmpCode));
                    }else {
                        $this->session->set_flashdata('error',$response['message']);
                        redirect(base_url('transfer/process_pending_for_approval/'.$enEmpCode));
                    }
            }
        }
        $view = 'process_pending_for_approval';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Process Pending Request',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    // Approved Transfer Letter
    public function approved_request_success($enEmpCode=null) {
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['E']=$this->transfer_model->getTransferCompletionData($EmpCode, $Resp=2);//Employee Transfer Details
        $view = 'approved_request_success';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Approved Transferred Letter',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    public function forwarded_to_hq_success($enEmpCode=null){
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['E']=$this->transfer_model->getTransferCompletionData($EmpCode, $Resp=1);//Employee Transfer Details
        $view = 'forwarded_to_hq_success';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Forwarded Request Letter',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }


    
    
    public function resolution_details(){
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post(null, true);
            if (!empty($post['EmpId'])) {
                $ids = $post['EmpId'];
                $EmpData=$this->transfer_model->getTransferEmpDetails($ids); // Get transfer details
                //show($EmpData);
                $tblData="<div class='modal-header'>
                <h4 class='modal-title'>Previous Transfer Details</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>
                <div class='modal-body'>
                <table class='table table-bordered'>
                <thead>
                        <tr style='background: #014a69;color: #ffffff;'>
                            <td style='text-align:center;'>Name : ".$EmpData['EMP_TTL'].$EmpData['EMP_NAME']."(".$EmpData['EMP_ID'].")</td>
                            <td style='text-align:center;'>Order No:".$EmpData['EMP_ID']."/ Date:".$EmpData['TRA_OR_DT']."</td>
                        </tr>
                        <tr style='background: #f36d1b;color: #ffffff;'>
                            <td style='text-align:center;'>TRANSFER FROM</td>
                            <td style='text-align:center;'>TRANSFER TO</td>
                        </tr>
                </thead>
                <tbody>
                        <tr> 
                            <td><b>Present Place : </b>".$EmpData['EMP_PRE_PLACE']."</td>
                            <td><b>Transfer Place : </b>".$EmpData['EMP_TRA_PLACE']."</td>
                        </tr>
                
                        <tr> 
                            <td><b>Present UNIT/REGION/ZIET/KV : </b>".$EmpData['EMP_PRE_UNIT']."</td>
                            <td><b>Transfer UNIT/REGION/ZIET/KV : </b>".$EmpData['EMP_TRA_UNIT']."</td>
                        </tr>
                        <tr> 
                            <td><b>Present KV CODE : </b>".$EmpData['PRE_KCODE']."</td>
                            <td><b>Transfer KV CODE : </b>".$EmpData['TRA_KCODE']."</td>
                        </tr>
                        <tr> 
                            <td><b>Present Designation : </b>".$EmpData['EMP_PRE_DESIG']."</td>
                            <td><b>Transfer Designation : </b>".$EmpData['EMP_TRA_DESIG']."</td>
                        </tr>
                        <tr> 
                            <td><b>Present Subject : </b>".$EmpData['EMP_PRE_SUB']."</td>
                            <td><b>Transfer Subject : </b>".$EmpData['EMP_TRA_SUB']."</td>
                        </tr>
                        <tr> 
                            <td colspan='2'><span style='color:#F00F00;'>Reason for Transferred but not joined : </span>".$EmpData['transfer_remarks']."</td>
                        </tr>
                </tbody>
                </table>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    <a href='". base_url()."execute-transfer-order/2/". EncryptIt($EmpData['EMP_ID'])."' class='btn btn-primary' id='status_save'>Re Initiate</a>
                </div>";
                
                echo $tblData;
            }
        }
    }
    // Translation History
    public function transfer_history() {
		ini_set('memory_limit', '-1');
        $view = 'transfer_history';
        $view_data['TH']=$this->transfer_model->transferHistory();
        //print_r($view_data['TH']);
        $data = array(
            'title' => WEBSITE_TITLE . ' - Employee Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
	public function revertconfirm()
	{
		$id=$this->input->post('id');	
	  $InsTrans=$this->transfer_model->getEmpDetails($id);
	
 // Update vacancy_master
                if($InsTrans['P_KVCODE']){ $code=$InsTrans['P_KVCODE'];}
                if($InsTrans['P_DESG_ID']){ $desig=$InsTrans['P_DESG_ID'];}
                //$sql="update ci_vacancy_master set inposition_post=inposition_post-1 where code=$code and designation=$desig";
                if($InsTrans['P_EMP_STS']==2){ // For Surplus Employee
                $sql="update ci_vacancy_master set surplus_post=surplus_post-1 where code=$code and designation=$desig";
                }
                if($InsTrans['P_EMP_STS']==1){ // For Regular Employee
                $sql="update ci_vacancy_master set inposition_post=inposition_post+1 where code=$code and designation=$desig";
                }
                if($InsTrans['P_SUB_ID']){ $sub=$InsTrans['P_SUB_ID']; $sql.=" and subject=$sub";}
				
				//print_r($InsTrans); die();
               $this->db->query($sql);
			   
	  $id=$this->input->post('id');	
	  $que=$this->transfer_model->revertrecord_Byempid(array('id'=>$id));
	  if($que){
		  return 1;
	  }
	}
    //Generate_LPC
    public function Generate_LPC($typ=null, $enEmpCode=null) {
        if($typ ==1 || $typ==2){// Direct / Indirect
        }else{
            redirect(base_url('400-PageNotFound'));
            return false;
        }
        $EmpCode= IsEmpExist(xss_clean($enEmpCode));
        if($EmpCode==false){
                redirect(base_url('400-PageNotFound'));
                return false;
        }
        $view_data['ID']=$EmpCode; 
        //================================= SUBMIT LPC======================================//
        if ($SubmitData = $this->input->post(null, true)) {
            $SubmitData = $this->input->post(null, true);
            //show($SubmitData);
                $response = $this->transfer_model->SubmitLPC($SubmitData);
                if ($response['status'] == 'success') {
                    //=================== redirect Print View ========================//
                    $this->session->set_userdata('LPC', $SubmitData);
                    redirect(base_url('transfer/Print_LPC/'));
                }else {
                    $this->session->set_flashdata('error',$response['message']);
                    redirect(base_url('transfer/Generate_LPC/1/'.$enEmpCode));
                }
            
        }
        //================================= SUBMIT LPC END =================================//
        $view = 'generate_lpc';
        $view_data['E']=$this->transfer_model->EmployeeLPC($EmpCode);

        $data = array(
            'title' => WEBSITE_TITLE . ' - Employee LPC Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function Print_LPC(){
        
                    $view = 'print_lpc';
                    $view_data['E']=$this->session->userdata("LPC");
                    //$this->session->unset_userdata("LPC");
                    $data = array(
                        'title' => WEBSITE_TITLE . ' - Employee LPC',
                        'javascripts' => array(),
                        'style_sheets' => array(),
                        'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
                    );
                    $this->load->view($this->template, $data);
    }
    
}
