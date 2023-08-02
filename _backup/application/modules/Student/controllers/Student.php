<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Student extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_model');
    }
    public function SchoolProfile(){
        $view_data['KvPro'] = $this->school_model->KvProfile();
        $view = 'SchoolProfile';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function ClassStrength(){
        $view_data['KvPro'] = $this->school_model->GetKvProfile();
        $ExCls = $this->school_model->GetClassProfile();
        $NullCls= $this->school_model->GetClassNullProfile();
        ($ExCls)?$view_data['CSPro']=$ExCls:$view_data['CSPro']=$NullCls;
        if($this->input->post(null, true)) {
            $Resp= $this->school_model->SetClassProfile();
             if ($Resp['status'] == 'success') {
                    $this->session->set_flashdata('success',$Resp['message']);
                    redirect(base_url('school-class-profile'));
                } else {
                    $view_data['error_msg'] = $Resp['message'];
                    redirect(base_url('school-class-profile'));
                }
        }
        //show($view_data['CSPro']);
        $view = 'ClassStrength';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
    public function AddStudent(){
		$view = 'AddStudent';
		$userdata = $this->session->userdata();
		$view_data['classes'] = $this->student_model->getAllClass();
		//echo "<pre>";print_r($view_data['classes']);die('kkk');
		if ($post_data = $this->input->post(null, true)) {
			$this->form_validation->set_rules('f_name', 'First Name', 'required|xss_clean|callback_regex_check');
			$this->form_validation->set_rules('l_name', 'Last Name', 'required|xss_clean|callback_regex_check');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|callback_regex_check');
			$this->form_validation->set_rules('admission_no', 'Admission no', 'required|xss_clean|callback_regex_check');
			$this->form_validation->set_rules('class_id', 'Class', 'required|xss_clean|callback_regex_check');
			if ($this->form_validation->run($this) !== FALSE) {
				$response = $this->student_model->addStudent($post_data);
				if($response){
					$this->load->library('MailerLib');
					$Sub = "Your User login credentials are as follows";
					$this->mailerlib->pushMail($Sub,$response,$post_data['email']);
				}
			}
			redirect(base_url('student-list'));
		}
        $data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
	}
	public function ListStudent(){
		$view = 'List';
		$data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
	}
	public function getStudents(){
		
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = "id";
        $dir = '';

        $totalData = $this->student_model->get_all_students();
		
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->student_model->get_all_students($limit, $start, $order, $dir, $search, $post_data);
        //echo "<pre>";print_r($response);die;
        $students = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($students)) {
            $serial = $start;
            foreach ($students as $student) {
                ++$serial;
                $nestedData['id'] = $student->id;
                $nestedData['f_name'] = $student->f_name;
                $nestedData['l_name'] = $student->l_name;
                $nestedData['email'] = $student->email;
                $nestedData['admission_no'] = $student->admission_no;
                $nestedData['class_id'] = $student->class_id;
                $nestedData['username'] = $student->username;
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
