<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessment extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('assessment_model');
        }
    
        public function index() { 
        $view = 'assesment/listing';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
        } 
    
	public function FilteredKV() {
        if ($this->input->is_ajax_request()) {            
            $fillData = $this->assessment_model->RefinedListKV(); 
            echo $fillData;
        }
    }
	
	public function FilteredKVstU() {
        if ($this->input->is_ajax_request()) {        
			//die();		
            $fillData = $this->assessment_model->FindStuKV(); 
            echo $fillData;
        }
    }
	
    public function KvStudents() {
		$columns = array(
            0 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            1 => 'S.adminssion_no'
        );
        
               
        $PostData = $this->input->post(null, true); 
		$order = $columns[$this->input->post('order')[0]['column']];
		//echo $order; die;
        $dir = $this->input->post('order')[0]['dir']; 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
		if(!empty($PostData['column'])){
			$totalData = $this->assessment_model->KvDupDetails();
        $response = $this->assessment_model->KvDupDetails($limit, $start, $order, $dir, $search, $PostData); 
		}else {
		$totalData = $this->assessment_model->KvDetails();
        $response = $this->assessment_model->KvDetails($limit, $start, $order, $dir, $search, $PostData); 
        }
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['name'] = $user->name;
                $nestedData['gender'] = $user->gender;
                $nestedData['category'] = $user->category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
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
        /*if ($this->input->is_ajax_request()) {
            $fillK= $this->input->post('KV_ID'); 
            $kv_data['CLS']= $this->assessment_model->KvDetails($fillK); 
            echo json_encode($kv_data);
        }*/
    }
	 public function KvDupStudents() {
        if ($this->input->is_ajax_request()) {
            $fillK= $this->input->post('KV_ID');
            $fillColumn= $this->input->post('column'); 
            $kv_data['CLS']= $this->assessment_model->KvDupDetails($fillK,$fillColumn); 
            echo json_encode($kv_data);
        }
    }
	
	 public function deleteDuplicate() {
        if ($this->input->is_ajax_request()) {
            $RowID= $this->input->post('row_id');    
            if($this->db->delete('ci_students', array('id' => $RowID))){
                echo 1;
            }else{
                echo 0;
            }  
        }
    }
	
	public function add_new($id=NULL) {
        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id);
        }
        if ($post_data = $this->input->post(null, true)) {
			 
            $this->form_validation->set_rules('region_id', 'Region', 'required|xss_clean');          
            $this->form_validation->set_rules('name_of_kv', 'Name of KV', 'required|xss_clean');          
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');          
            $this->form_validation->set_rules('adminssion_no', 'Admission No', 'required|xss_clean');          
            $this->form_validation->set_rules('name', 'Name Of Student', 'required|xss_clean');          
            $this->form_validation->set_rules('category', 'Category', 'required|xss_clean');          
            $this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');          
            $this->form_validation->set_rules('admission_priority', 'Admission Priority ', 'required|xss_clean');          
            $this->form_validation->set_rules('is_rte_quota', 'Whether admitted under RTE quota', 'required|xss_clean');          
            $this->form_validation->set_rules('is_dispensation_quota', ' under special dispensation quota', 'required|xss_clean');          
            $this->form_validation->set_rules('is_differently_abled', ' Whether the child is differently abled', 'required|xss_clean');          
            $this->form_validation->set_rules('father_qualification', 'Father\'s Qualification', 'required|xss_clean');          
            $this->form_validation->set_rules('mother_qualification', ' Mother\'s Qualification', 'required|xss_clean');          
            $this->form_validation->set_rules('mother_tongu', ' Mother Tongue', 'required|xss_clean');          
            $this->form_validation->set_rules('years_of_pre-schooling', ' No. of years of pre-schooling exposure', 'required|xss_clean');          
            $this->form_validation->set_rules('number_of_sibling', ' Number of Siblings', 'required|xss_clean');          
            //$this->form_validation->set_rules('type_of_gadgets', ' Type of Gadgets available', 'required|xss_clean');          
            $this->form_validation->set_rules('no_of_gadgets', ' Number of Gadgets available', 'required|xss_clean');          
            $this->form_validation->set_rules('gadget_availability_time', ' Gadget availability Time', 'required|xss_clean');          
            $this->form_validation->set_rules('parent_mobile_no', ' Contact number of parent', 'required|xss_clean');          
            $this->form_validation->set_rules('parent_email_id', 'email id of parent', 'required|xss_clean');          
            $this->form_validation->set_rules('is_parent_competence', 'Whether the parents have any specific competence', 'required|xss_clean');          
            $this->form_validation->set_rules('oral_language_eng', 'Oral Language Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('write_language_eng', 'Writing Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('read_language_eng', 'Reading Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('is_numeracy_skills', 'Numeracy Skills', 'required|xss_clean');          
            $this->form_validation->set_rules('oral_language_hindi', ' मौखिक भाषा क्षमता ( हिंदी)', 'required|xss_clean');          
            $this->form_validation->set_rules('write_language_hindi', ' लेखन क्षमता (हिंदी) ', 'required|xss_clean');          
            $this->form_validation->set_rules('read_language_hindi', ' पठन क्षमता (हिंदी)','required|xss_clean');          
            
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->assessment_model->add_student($post_data, $id); 
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Student Updated Successfully.');
                        redirect('assessment');
                    } else {
                        $this->session->set_flashdata('success', 'Student  Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Student Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Student Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }
        $view = 'assesment/add_student';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Student',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    } 
		
	 public function middle($id=NULL) { 
	 
	  if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id);
        } 
		
		 if ($post_data = $this->input->post(null, true)) { 			           
            $this->form_validation->set_rules('oral_language_eng_mid_term', 'Oral Language Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('write_language_eng_mid_term', 'Writing Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('read_language_eng_mid_term', 'Reading Ability in English', 'required|xss_clean');          
            $this->form_validation->set_rules('is_numeracy_skills_mid_term', 'Numeracy Skills', 'required|xss_clean');          
            $this->form_validation->set_rules('oral_language_hindi_mid_term', ' मौखिक भाषा क्षमता ( हिंदी)', 'required|xss_clean');          
            $this->form_validation->set_rules('write_language_hindi_mid_term', ' लेखन क्षमता (हिंदी) ', 'required|xss_clean');          
            $this->form_validation->set_rules('read_language_hindi_mid_term', ' पठन क्षमता (हिंदी)','required|xss_clean');          
            
            if ($this->form_validation->run($this) !== FALSE) {
				//echo "<pre>"; print_r($post_data); die;
                $response = $this->assessment_model->update_middle_term($post_data, $id); 
				
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Middle Term Added Successfully.');
                        redirect('assessment/middle/'.$id);
                    } else {
                        $this->session->set_flashdata('success', 'Middle Term  Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Middle Term Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Middle Term Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }
        $view = 'assesment/middle';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Update Middle End Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
        } 
}
