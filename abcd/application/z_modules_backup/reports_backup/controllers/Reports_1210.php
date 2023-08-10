<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reports_model');
    }

    public function index() {
		//pr($this->session->userdata['role_id']);
		$role_id = $this->session->userdata['role_id'] ; 
		if($role_id==1){
			$view = 'report/reports';
		}else if($role_id==2){
			$view = 'report/hq_reports';
		}else if($role_id==3){
			$view = 'report/ro_reports';
		}else if($role_id==4){
			$view = 'report/zt_reports';
		}else if($role_id==5){
			$view = 'report/kv_reports';
		}else{
                    redirect(base_url());
                }
		
        $data = array(
            'title' => WEBSITE_TITLE . ' - 	',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
	
        public function vacancy() {
            //$view = 'vacancy';
            $role_id = $this->session->userdata['role_id'] ;
            if($role_id==1){
            $view = 'vacancy/vacancy';
            $view_data['SD'] = $this->reports_model->AllStaffDetails();
            }else if($role_id==2){
            $view = 'vacancy/hq_vacancy';
            }else if($role_id==3){
            $view = 'vacancy/ro_vacancy';
            }else if($role_id==4){
            $view = 'vacancy/zt_vacancy';
            }else if($role_id==5){
                $view = 'vacancy/kv_vacancy';
                $view_data['SD'] = $this->reports_model->AllStaffDetails();
            }
            else{
                redirect(base_url());
            }
            $data = array(
                'title' => WEBSITE_TITLE . ' - Vacancy',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
        }
    //Report One 13/11/19
        public function reportone() {
		    $role_id = $this->session->userdata['role_id'] ;
            if($role_id==1){
            $view = 'reportone/emp_report';
            }else if($role_id==2){
            $view = 'reportone/hq_reports';
            }else if($role_id==3){
            $view = 'reportone/ro_reports';
            }else if($role_id==4){
				
            $view = 'reportone/zt_reports';
            }else{
            $view = 'reportone/kv_reports';
            }
            
            $data = array(
                'title' => WEBSITE_TITLE . ' - Emp Report',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
        }
	public function get_profile() {
        
        $columns = array(
            0 => 'E.id',
            1 => 'E.emp_code',
            2 => 'E.emp_name',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->reports_model->getAllRegisteredProfile();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->reports_model->getAllRegisteredProfile($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['id'] = $user->id;
                $nestedData['emp_own'] = $user->emp_createdby;
                //$nestedData['decode_id'] = base64_encode($user->emp_code);
                $nestedData['enc_emp_code'] = EncryptIt($user->emp_code);
                $nestedData['emp_code'] = $user->emp_code;
                $nestedData['emp_post'] = $user->emp_desig;
                $nestedData['emp_subject'] = $user->emp_subject;
                $nestedData['emp_place'] = $user->emp_post_place;
                $nestedData['emp_region'] = $user->emp_region;
                $nestedData['emp_school'] = $user->emp_school;
                $nestedData['emp_school_code'] = $user->emp_school_code;
                $nestedData['emp_name'] = $user->emp_title.' '.$user->emp_name;
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
    
	 //===================================== View Vacancy =======================================//
    public function get_all_vacancy() {
       $columns = array(
            0 => 'id',
            1 => 'V.`code`',
            2 => 'S.`name`',
            3 => 'SC.`name`'
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->reports_model->getAllRegisteredProfilevacancy();
        $post_data = $this->input->post(null, true);
        $search    = $this->input->post('search')['value'];
        $response  = $this->reports_model->getAllRegisteredProfilevacancy($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['KV_CODE'] = $user->KV_CODE;
                $nestedData['ROLE'] = $user->ROLE;
                $nestedData['KV_REGION_ZEIT'] = $user->KV_REGION_ZEIT;
                $nestedData['IN_POST'] = $user->IN_POST;
                $nestedData['DESI_TYPE'] = $user->DESI_TYPE;
                $nestedData['IN_SUBJECT'] = $user->IN_SUBJECT;
                $nestedData['SANCTION_POST'] = $user->SANCTION_POST;
                $nestedData['IN_POSITION'] = $user->IN_POSITION;
                $nestedData['IN_CONTRACTUAL'] = $user->IN_CONTRACTUAL;
                $nestedData['TOTAL_VACANCY'] = $user->TOTAL_VACANCY;
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
    /* ==================================13112019================================================== */
	public function get_employee_data() {
        $columns = array(
            0 => 'id',
            1 => 'seniorti_no',
            2 => 'emp_first_name',
            3 => 'kv_where_working',
            4 => 'emp_dob',
            5 => 'date_oppointment',
            6 => 'educational_qualification',
            7 => 'profesional_qualification',
            8 => 'date_of_drawing_center',
            9 => 'training_from',
            10 => 'tranig_to',
            11 => 'no_of_days',
            12 => 'emp_name',
            13 => 'emp_name',
            14 => 'emp_name',
            15 => 'emp_name',
            16 => 'emp_name',
            17 => 'emp_name',
            18 => 'emp_name',
        );
		
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->reports_model->getAllEmployeeReport();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->reports_model->getAllEmployeeReport($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
		
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
       
        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) { 
			
				++$serial;
				$grade = $this->get_garading_by_emp_id($user->emp_code);
				//pr($grade);
				$nestedData['id'] = $user->id;
                $nestedData['seniorti_no'] = $user->seniorti_no;
                $nestedData['emp_name'] = $user->emp_title.' '.$user->emp_name;
                $nestedData['kv_where_working'] = $user->kv_where_working;
                $nestedData['emp_dob'] = $user->e_dob;
                $nestedData['date_oppointment'] = $user->date_oppointment;
                $nestedData['educational_qualification'] = $user->educational_qualification;
                $nestedData['ded_prof'] = $user->profesional_qualification;
                $nestedData['date_of_drawing_center'] = $user->date_of_drawing_center;
                $nestedData['training_from'] = $user->training_from;
                $nestedData['tranig_to'] = $user->tranig_to;
                $nestedData['no_of_days'] = $user->no_of_days;
                $nestedData['role_id'] = $user->role_id;
				$nestedData['G1'] = isset($grade['result'][0]['grading']) ? $grade['result'][0]['grading'] : 0;
                $nestedData['G2'] = isset($grade['result'][1]['grading']) ? $grade['result'][1]['grading'] : 0;
                $nestedData['G3'] = isset($grade['result'][2]['grading']) ? $grade['result'][2]['grading'] : 0;
                $nestedData['G4'] = isset($grade['result'][3]['grading']) ? $grade['result'][3]['grading'] : 0;
                $nestedData['G5'] = isset($grade['result'][4]['grading']) ? $grade['result'][4]['grading'] : 0;
                $nestedData['G6'] = isset($grade['result'][5]['grading']) ? $grade['result'][5]['grading'] : 0;
                $nestedData['G7'] = isset($grade['result'][6]['grading']) ? $grade['result'][6]['grading'] : 0;
                $nestedData['G8'] = isset	($grade['result'][7]['grading']) ? $grade['result'][7]['grading'] : 0;
				$nestedData['retire_date'] = retirement_date($user->e_dob);
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
	
	public function get_garading_by_emp_id($emp_id){
		$this->db->select('grading');
		$this->db->from('ci_performance_details');
		$this->db->where('emp_id',$emp_id);
		$qry=$this->db->get();
        if($qry->num_rows()){
            $data['result']=$qry->result_array();
        }else{
            $data['result']=array();
        }
		return $data ;
	}
    public function get_designation()
    {
        $did=$this->input->post('d_id');
        $designation = designation_lists($did); 
        //print_r($designation); 
        $str='';
        $str.='<option value="">Select</option>';
        foreach ($designation as $key => $val)
        {
            $str.='<option value='.$key.'>'.$val.'</option>';
        }
        echo($str);
        die;
    }
    
    public function get_subject(){
        $subid=$this->input->post('d_id');
        $subject = subject_lists_designationwise($subid); 
        if(!empty($subject))
        {
            $str='';
            $str.='<option value="">Select</option>';
            foreach ($subject as $key => $val)
            {
                $str.='<option value='.$key.'>'.$val.'</option>';
            }
            echo($str);
            die;
        }else{
            echo 0; die;
        }
    }
    public function ComparativeReport($KvCode=null) {
        $KVC=($KvCode)?$KvCode:$this->master_code;
        $view_data['GOV']=$this->reports_model->ComGOVDATA($KVC);
        $view_data['KVS']=$this->reports_model->ComKVSDATA($KVC);
        $view_data['ACT']=$this->reports_model->ComACTDATA($KVC);
       // show($view_data['KV']);
        $view = 'compare/ComparativeReport';
        $data = array(
            'title' => WEBSITE_TITLE . 'Comparative Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    //================ CONSOLIDATED REPORT HQ LOGIN ======================//
    public function ConsolidatedReport() {
        $view_data['RO'] = $this->reports_model->ComRegionList();
        $view = 'compare/ConsolidatedReport';
        $data = array(
            'title' => WEBSITE_TITLE . 'Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function ConsolidatedData() {
        $columns = array(
            0 => 'K.`code`',
            1 => 'K.`name`'
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->reports_model->ConsolidatedMaster();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->reports_model->ConsolidatedMaster($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $ConData = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($ConData)) {
            $serial = $start;
            foreach ($ConData as $cd) {
                ++$serial;
                $UT=(($cd->ccea_teach_post+$cd->ccea_nonteach_post)-($cd->kvs_teach_post+$cd->kvs_nonteach_post));
                if($UT==0){$UTV='<font class="">'.$UT.'</font>';}
                if($UT>0){$UTV='<font class="text-success">'.$UT.'</font>';}
                if($UT<0){$UTV='<font class="text-danger">'.$UT.'</font>';}
                $nestedData['code'] = $cd->code;
                $nestedData['name'] = $cd->name;
                $nestedData['region'] = $cd->region;
                $nestedData['sector'] = $cd->sector;
                $nestedData['build'] = $cd->building;
                $nestedData['infra'] = $cd->infra;
                $nestedData['govt_class'] = $cd->ccea_class;
                $nestedData['govt_section'] = $cd->ccea_section;
                $nestedData['kvs_class'] = $cd->kvs_class;
                $nestedData['kvs_section'] = $cd->kvs_section;
                $nestedData['govt_teach'] = $cd->ccea_teach_post;
                $nestedData['govt_nonteach'] = $cd->ccea_nonteach_post;
                $nestedData['kvs_teach'] = $cd->kvs_teach_post;
                $nestedData['kvs_nonteach'] = $cd->kvs_nonteach_post;
                $nestedData['kv_teach'] = $cd->kv_teach_post;
                $nestedData['kv_nonteach'] = $cd->kv_nonteach_post;
                $nestedData['kv_teach_vac'] = $cd->kv_contra_post;
                $nestedData['kv_nonteach_vac'] = $cd->kv_noncontra_post;
                $nestedData['kv_contact'] = $cd->kv_contra_post;
                $nestedData['kv_noncontact'] = $cd->kv_noncontra_post;
                $nestedData['kv_utilization'] = $UTV;
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
    
	
    
}
