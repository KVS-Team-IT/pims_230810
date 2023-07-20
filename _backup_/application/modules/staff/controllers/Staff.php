<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Staff extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('staff_model');
        $this->load->model('admin/dashboard_model');
        $this->load->library('encrypt');
    }
    public function index() {
        $view = 'StaffList';
        $view_data='';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Support Staff List',
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
    public function SupportStaff($enStaffId=null) {
        //echo 'hello';
        if(!empty($enStaffId)){
            $ExStaff= IsStaffExist(xss_clean($enStaffId));
            if($ExStaff==false){
                redirect(base_url('400-PageNotFound'));
                return false;
            }
            $view_data['EmpCode']=$ExStaff;
            $view_data['EnEmpId']=$enStaffId;
            $view_data['StfData'] = $this->staff_model->getStaffData($ExStaff);
            $view_data['CurData'] = $this->staff_model->getCurrentData();
        } else{
            $view_data['EnEmpId']='';
            $view_data['EmpCode']='';
            $view_data['CurData'] = $this->staff_model->getCurrentData();
        }
        if ($staff_data = $this->input->post(null, true)) { 
            //show($staff_data);
            $response = $this->staff_model->setStaffData($staff_data);
            if($response['sts'] == 'success'){
                $this->session->set_flashdata('success', 'Data saved/updated successfully');
                redirect(base_url('support-staff-list'));
            }else{
                $this->session->set_flashdata('error', 'Kindly check form data / Designated Post already exist');
                
            }
        }
        $view = 'Support_Staff_Master';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Edit Support Staff',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    
    
    public function AllStaffList(){
         $columns = array(
            0 => 'id',
            1 => 'staff_code',
            2 => 'staff_name',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->staff_model->getAllStaff();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->staff_model->getAllStaff($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['id'] = $user->id;
                $nestedData['emp_own'] = $user->staff_created_by;
                $nestedData['decode_id'] = EncryptIt($user->staff_code);
                $nestedData['emp_code'] = $user->staff_code;
                $nestedData['emp_type'] = $user->staff_type;
                $nestedData['emp_post'] = $user->staff_desig;
                $nestedData['emp_sub'] = $user->staff_sub;
                $nestedData['emp_region'] = $user->staff_unit_ro;
                $nestedData['emp_school'] = $user->staff_kv;
                $nestedData['emp_school_code'] = $user->staff_kvc;
                $nestedData['emp_cat'] = $user->staff_cat;
                $nestedData['emp_strength'] = $user->staff_strength;
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
    public function TrashStaff() {
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['SsId'])) {
                $enStaffId=$_POST['SsId'];
                $ExStaff= IsStaffExist(xss_clean($enStaffId));
                if($ExStaff==false){
                    redirect(base_url('400-PageNotFound'));
                    return false;
                }else{
                    $this->db->select("staff_kvcode,staff_type,staff_designation,staff_subject,staff_section");
                    $this->db->from("support_staff");
                    $this->db->where("staff_code=",$ExStaff);
                    $query = $this->db->get();
                    $S = $query->row();
                    if($S->staff_type==1){// Contractual Teacher
                        $VCPData = array("contractual_post"=>0, "updated_on"=>date('Y-m-d H:i:s'));
                        $this->db->where('code',$S->staff_kvcode);
                        $this->db->where('designation',$S->staff_designation);
                        if($S->staff_subject!=null || $S->staff_subject!=0 || $S->staff_subject!=''){
                            $this->db->where('subject',$S->staff_subject);    
                        }
                        $this->db->update('vacancy_master', $VCPData);
                        $lq= $this->db->last_query();
                    }
                    if($this->db->delete('support_staff', array('staff_code' => $ExStaff))){
                        $lq= $this->db->last_query();
                        $this->session->set_flashdata('success', 'Record removed successfully');
                        echo 1;
                        exit;
                        //redirect(base_url('support-staff-list'));
                    }else{ 
                        $lq= $this->db->last_query();
                        $this->session->set_flashdata('error', 'Some error occoured');
                        echo 0;
                        exit;
                        //redirect(base_url('support-staff-list'));
                    }
                    
                }
            
            }
        
        }
        
       
    }
    public function ComparativeReport() {
        //show($this->session->userdata);
        $LogRole=$this->session->userdata['role_id'];
        $KvId =$this->session->userdata['school_id'];
	if($LogRole=="5"){
		$view_data['KD']= $this->staff_model->getKvDetails($KvId);
                $view_data['KV']= $this->staff_model->getKvVacancy($KvId);
                $view = 'School_Section_Staff';
        }else{
            redirect(base_url());
        }
        
        $data = array(
            'title' => WEBSITE_TITLE . ' - Comparative Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function ClassSection() {

        $LogRole=$this->session->userdata['role_id'];
		//show($this->session->userdata);
	if($LogRole=="5"){
	    /* ======================get rolwise data =========================================== */
                $school_id = $this->session->userdata['school_id'];
                $school_code= $this->dashboard_model->getCodeBySchoolId($school_id);
		$view_data['EMP_REGD']      = $this->dashboard_model->getHqZtRoEmpRegd($school_code);
                //show($view_data['EMP_REGD']);
                $view_data['VAC_VS_INPOS']  = $this->dashboard_model->getHqZtRoVacInPos($school_code); 
		/* ================================================================================= */
		$view_data['KV']= $this->dashboard_model->getKvDetails();
		$view_data['school_by_post'] = $this->dashboard_model->getSchoolBypost();
		$view = 'Class_Section';
        }else{
            redirect(base_url());
        }
        
        $data = array(
            'title' => WEBSITE_TITLE . ' - Class-Section',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    //===================== Check Avl. Vacancy Contractual======================//
    function ChkVacAvail(){
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['KvCode'])&&!empty($_POST['DesigId'])) {
                
                $KvCode =$this->input->post('KvCode');
                $DesigId=$this->input->post('DesigId');
                $SubId  =$this->input->post('SubId');
                $EmpStr =$this->input->post('EmpStr');
                //if there is no update in designation
                    $this->db->select("((sanctioned_post)-(inposition_post+$EmpStr)) as Avl");
                    $this->db->from("ci_vacancy_master");
                    $this->db->where("`code`",$KvCode);
                    $this->db->where("`designation`",$DesigId);
                    if(!empty($this->input->post('SubId'))){
                        $this->db->where("`subject`",$SubId); // for Teaching Designation
                    }
                    $exQuery = $this->db->get();
                    $lastQry=$this->db->last_query();
                    if ($exQuery->num_rows()) {
                        $rsQuery = $exQuery->row();
                        echo $AVL=$rsQuery->Avl;
                    }else{
                        echo -1;
                    }
                
            }
            
        }
    }
    //================== Check Avl. Vacancy Contractual End ====================//
}
