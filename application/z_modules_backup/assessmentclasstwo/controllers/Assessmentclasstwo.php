<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessmentclasstwo extends MY_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('assessment_model');
        }
    
        public function index() {
			
        //$view = 'maintain_mode';   
         $kv_code=$this->session->userdata['master_code'];    
         //if($kv_code==2167)
         if($kv_code==2402)
         {
        $view = 'listing_particular';  
         }else{            
            $view = 'listing';    
         }
		$view_data['emp_list'] = $this->assessment_model->get_emp_by_kvs_id(); 
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        } 
		
		public function teacher_listing() { 
		//$view = 'maintain_mode'; 
        $view = 'teacher_listing';  
		$id=$this->session->userdata['user_name']; 
		$view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id); 
		//print_r($view_data['emp_list']); die;
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        } 
		
		 public function all() { 
        $view = 'listing_all';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        }
    
	public function recycle_bin() { 
        $view = 'recycle';  
       //$view = 'maintain_mode';  
		$id=$this->session->userdata['user_name']; 
		$view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id); 
        $data = array(
            'title' => WEBSITE_TITLE . ' - Recycle Data ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        }
		
	public function FilteredKV() {
        if ($this->input->is_ajax_request()) {            
            $fillData = $this->assessment_model->RefinedListKV(); 
            echo $fillData;
        }
    }

    public function FilteredKVList() {
        if ($this->input->is_ajax_request()) {            
            $fillData = $this->assessment_model->FilteredKVList(); 
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
	
    public function KvAllStudents() {
		$columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
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
		$totalData = $this->assessment_model->KvAllStudents();
        $response = $this->assessment_model->KvAllStudents($limit, $start, $order, $dir, $search, $PostData); 
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
                $nestedData['is_mid_updated'] = $user->oral_language_hindi_mid_term !='' ? '<span style="color:green">Updated </span>': '<span style="red">Not-Updated</span>';
				$nestedData['is_yearend_updated'] = $user->writing_hindi_drawing !='0' ? '<span style="color:green">Updated </span>': '<span style="red">Not-Updated</span>';
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
	
	 public function KvStudents() {
		$columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
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
		$totalData = $this->assessment_model->KvStudents();
        $response = $this->assessment_model->KvStudents($limit, $start, $order, $dir, $search, $PostData); 
        }
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
				
                ++$serial;
                 $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->stu_id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                //$nestedData['emp_name'] = $user->emp_title. $user->emp_name;
                $nestedData['name'] = $user->stu_name;
                $nestedData['gender'] = $user->stu_gender;
                $nestedData['category'] = $user->stu_category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
                $nestedData['assigned_status'] = $user->teacher_id_for_class_two !=0 ? '<span style="color:green">Assigned </span>'.$user->emp_title. $user->emp_name. $user->emp_code: '<span style="color:red">Not-Assigned</span>';
				$nestedData['status'] = $user->teacher_id_for_class_two !='' ? '1': '0';
				$nestedData['midstatus'] = $user->oral_language_eng_mid_term ='' ? '<span style="color:green">Updated </span>': '<span style="color:red">Not Update</span>';				
				$nestedData['endstatus'] = $user->writing_hindi_drawing ='0' ? '<span style="color:green">Updated </span>': '<span style="color:red">Not Update</span>';				
				$nestedData['MidStColumn'] = $user->oral_language_eng_mid_term ='' ? '1': '0';
				$nestedData['EndStColumn'] = $user->writing_hindi_drawing ='0' ? '1': '0';
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
	
	 public function StudentslistForTeacher() {
		$columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
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
			$totalData = $this->assessment_model->KvStudentsList();
			$response = $this->assessment_model->KvStudentsList($limit, $start, $order, $dir, $search, $PostData); 
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
				$nestedData['MidStColumn'] = $user->oral_language_eng_mid_term !='' ? '1': '0';
				$nestedData['EndStColumn'] = $user->writing_hindi_drawing !='' ? '1': '0';
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
	
     public function download_excel_report() {
        $columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
        );
        
               
        $PostData = $this->input->post(null, true); 
        $order = $columns[$this->input->post('order')[0]['column']];
        //echo $order; die;
        $dir = $this->input->post('order')[0]['dir']; 
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value']; 
        $totalData = $this->assessment_model->KvStudents();
        $response = $this->assessment_model->download_excel($limit, $start, $order, $dir, $search, $PostData);  
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                //print_r($user); die;
                ++$serial;
                 $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->stu_id;
                $nestedData['name_of_kv'] = $user->name_of_kv; 
                $nestedData['name'] = $user->stu_name;
                $nestedData['gender'] = $user->stu_gender;
                $nestedData['category'] = $user->stu_category;
                $nestedData['oral_language_eng'] = $user->oral_language_eng;   
                $nestedData['write_language_eng'] = $user->write_language_eng;   
                $nestedData['read_language_eng'] = $user->read_language_eng;   
                $nestedData['is_numeracy_skills'] = $user->is_numeracy_skills;   
                $nestedData['oral_language_hindi'] = $user->oral_language_hindi;   
                $nestedData['write_language_hindi'] = $user->write_language_hindi;   
                $nestedData['read_language_hindi'] = $user->read_language_hindi;   
                $nestedData['oral_language_eng_mid_term'] = $user->oral_language_eng_mid_term;   
                $nestedData['write_language_eng_mid_term'] = $user->write_language_eng_mid_term;   
                $nestedData['read_language_eng_mid_term'] = $user->read_language_eng_mid_term;   
                $nestedData['is_numeracy_skills_mid_term'] = $user->is_numeracy_skills_mid_term;   
                $nestedData['oral_language_hindi_mid_term'] = $user->oral_language_hindi_mid_term;   
                $nestedData['write_language_hindi_mid_term'] = $user->write_language_hindi_mid_term;   
                $nestedData['read_language_hindi_mid_term'] = $user->read_language_hindi_mid_term; 
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
			$update_rows = array('is_deleted' => '1',);
			$this->db->where('id', $RowID );
			$qry=$this->db->update('ci_students_dummy', $update_rows);	 
            if($qry){
                echo 1;
            }else{
                echo 0;
            }  
        }
    }
	
	public function restore_data() {
        if ($this->input->is_ajax_request()) {
            $RowID= $this->input->post('row_id');   
			$update_rows = array('is_deleted' => '0',);
			$this->db->where('id', $RowID );
			$qry=$this->db->update('ci_students_dummy', $update_rows);	
			//echo $this->db->last_query(); die;
            if($qry){
                echo 1;
            }else{
                echo 0;
            }  
        }
    }
	
	public function permanentDelete() {
        if ($this->input->is_ajax_request()) {
            $RowID= $this->input->post('row_id');   

            if($this->db->delete('ci_students_dummy', array('id' => $RowID))){
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
           /* $this->form_validation->set_rules('oral_language_eng', 'Oral Language Ability in English', 'required|xss_clean');          
           $this->form_validation->set_rules('oral_converse', 'Oral Converse', 'required|xss_clean');     	         
           $this->form_validation->set_rules('oral_talks', 'Oral Talk', 'required|xss_clean');             
           $this->form_validation->set_rules('oral_recites', 'Oral Recites', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_participate', 'Reading Participate', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_uses', 'Reading Uses', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_sentences', 'Reading Sentences', 'required|xss_clean');             
           $this->form_validation->set_rules('writing_words', 'Writing Words', 'required|xss_clean');             
           $this->form_validation->set_rules('writing_convey', 'Writing Convey', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_count', 'Numeracy Counts', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_read', 'Numeracy Reads', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_addition', 'Numeracy addition', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_observes', 'Numeracy Observes', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_units', 'Numeracy Estimates', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_recites', 'Numeracy Creates ', 'required|xss_clean');    */        
            //$this->form_validation->set_rules('transfered', 'Transfered from which KV' ,'required|xss_clean');          
            
            if ($this->form_validation->run($this) !== FALSE) {
				$post_data['class'] = 2 ;
				$post_data['promote'] = 0 ;
				$post_data['acadmic_year'] = '2022-2023' ;
				
				
				
                $response = $this->assessment_model->add_student($post_data, $id);
				
               			
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
						if($this->session->userdata('role_id')=='6'){ 
                        $this->session->set_flashdata('success', 'Student Updated Successfully.');
                        redirect('assessmentclasstwo/teacher_listing');
						}else {
							 $this->session->set_flashdata('success', 'Student  Added Successfully.');
                        redirect('assessmentclasstwo');
						}
						
						
                    } else {
						if($this->session->userdata('role_id')=='6'){ 
                        $this->session->set_flashdata('success', 'Student  Added Successfully.');
                        redirect('assessmentclasstwo/teacher_listing');
							}else {
							 $this->session->set_flashdata('success', 'Student  Added Successfully.');
                        redirect('assessmentclasstwo');
						}
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Student Not Updated Successfully.');
                        redirect('assessmentclasstwo/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Student Not Added Successfully.');
                        redirect('assessmentclasstwo/add_new' . $id);
                    }
                }
            }
        }
        $view = 'add_student';
		$id=$this->session->userdata['user_name']; 
		$view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id); 
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Student',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
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
        $view = 'middle';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Update Middle End Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        } 
		
		public function reason($id=NULL) { 	 
		  
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
            $this->form_validation->set_rules('reason', 'Reason', 'required|xss_clean');             
            
            if ($this->form_validation->run($this) !== FALSE) { 
                $response = $this->assessment_model->update_reason_middle_term($post_data, $id); 
				
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Reason Added Successfully.');
                        redirect('assessment/reason/'.$id);
                    } else {
                        $this->session->set_flashdata('success', 'Reason Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Reason Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Reason Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }
        $view = 'reason';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Update Reason',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        } 
		
	public function details($id=NULL) {
		
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

		$view = 'details';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - View Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
         
    }
	
	public function deleteFlnData() {
		$columns = array(
            0 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            1 => 'S.adminssion_no'
        );       
               
        $PostData = $this->input->post(null, true); 
		$order = $columns[$this->input->post('order')[0]['column']]; 
        $dir = $this->input->post('order')[0]['dir']; 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];		 
		$totalData = $this->assessment_model->StuDeleted_data();
        $response = $this->assessment_model->StuDeleted_data($limit, $start, $order, $dir, $search, $PostData);  
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
    }
	
	public function assigned_employee() {
        if ($this->input->is_ajax_request()) { 
            $EMPID= $this->input->post('emp_Id');
            $ROWID= $this->input->post('row_id'); 
            $KVID= $this->session->userdata('master_code'); 
            $qry= $this->assessment_model->Update_EmpId_Selected_Data($EMPID,$KVID,$ROWID); 
              echo $qry;
        }
    }
	
	public function assign_data_to_shift() {
        if ($this->input->is_ajax_request()) {
            $ShiftID= $this->input->post('shiftID');
            $ROWID= $this->input->post('row_id'); 
            $qry= $this->assessment_model->Update_Shift_Selected_Data($ShiftID,$ROWID); 
              echo $qry;
        }
    }

    public function generate_report($id=null){
      if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all');
        }
        if($id!='001'){
        if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
            $this->session->set_flashdata('error', 'Report does not exists.');
            redirect('assessment/all');
        }
      }

        if (isset($id) && !empty($id)) { 
            $view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id);
            $view_data['page2A'] = $this->assessment_model->get_page2A_data_by_id($id);
            $view_data['Midpage2A'] = $this->assessment_model->get_Midpage2A_data_by_id($id);
            $view_data['page2B'] = $this->assessment_model->get_hindi2A_data_by_id($id);
            $view_data['Midpage2B'] = $this->assessment_model->get_Midhindi2A_data_by_id($id);
			    
        } 
        /* echo "<pre>";
         print_r($view_data['page2A']);  
         print_r($view_data['page2B']); 
         die();*/
        $view = 'generate_report';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - View Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
           

    }

    public function download_excel($id=null){
      if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all');
        }

        if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
            $this->session->set_flashdata('error', 'Report does not exists.');
            redirect('assessment/all');
        } 
 
        $view = 'download_excel';   
        $data = array(
            'title' => WEBSITE_TITLE . ' - Download Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
	
	 public function year_end($id=NULL) { 

	 
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
           $this->form_validation->set_rules('oral_converse', 'Oral Converse', 'required|xss_clean');     	         
           $this->form_validation->set_rules('oral_talks', 'Oral Talk', 'required|xss_clean');             
           $this->form_validation->set_rules('oral_recites', 'Oral Recites', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_participate', 'Reading Participate', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_uses', 'Reading Uses', 'required|xss_clean');             
           $this->form_validation->set_rules('reading_sentences', 'Reading Sentences', 'required|xss_clean');             
           $this->form_validation->set_rules('writing_words', 'Writing Words', 'required|xss_clean');             
           $this->form_validation->set_rules('writing_convey', 'Writing Convey', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_count', 'Numeracy Counts', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_read', 'Numeracy Reads', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_addition', 'Numeracy addition', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_observes', 'Numeracy Observes', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_units', 'Numeracy Estimates', 'required|xss_clean');             
           $this->form_validation->set_rules('numeracy_recites', 'Numeracy Creates ', 'required|xss_clean');    
           if ($this->form_validation->run($this) !== FALSE) {
				//echo "<pre>"; print_r($post_data); die;
               $response = $this->assessment_model->update_yearEnd_term($post_data, $id); 
				
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'YearEnd Term Added Successfully.');
                        redirect('assessment/year_end/'.$id);
                    } else {
                        $this->session->set_flashdata('success', 'YearEnd Term  Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'YearEnd Term Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'YearEnd Term Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                } 
            }
        }
        $view = 'year_end';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Year End Assesment Abilities ', 
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        } 
		
		 public function final_report($id=null,$kv_id=null){  
			 
		  if (!empty($id) && !is_numeric($id)) {
				redirect('assessment/all');
			}
			if($id!='001'){
				if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
					$this->session->set_flashdata('error', 'Report does not exists.');
					redirect('assessment/all');
				}
			}

        if (isset($id) && !empty($id)) {  
			$view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id,$kv_id);			
            $view_data['EntryData'] = $this->assessment_model->get_page2A_data_by_id($id,$kv_id); // Entry Level
            $view_data['FinalOral'] = $this->assessment_model->get_FinalOral_data_by_id($id,$kv_id);
			$view_data['FinalReading'] = $this->assessment_model->get_FinalReading_data_by_id($id,$kv_id);
			$view_data['FinalWriting'] = $this->assessment_model->get_FinalWriting_data_by_id($id,$kv_id);
			$view_data['FinalNumeracy'] = $this->assessment_model->get_FinalNumeracy_data_by_id($id,$kv_id);
			$view_data['FinalHindi'] = $this->assessment_model->get_FinalHindi_data_by_id($id,$kv_id);
			 $view_data['FinalNonSchl'] = $this->assessment_model->get_FinalNonSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonNumSchl'] = $this->assessment_model->get_FinalNonNumSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonHindiSchl'] = $this->assessment_model->get_FinalHindiNonSchooling_data_by_id($id,$kv_id);
			$view_data['FinalPreSchl'] = $this->assessment_model->get_FinalPreSchooling_data_by_id($id,$kv_id);
			$view_data['FinalPreNumSchl'] = $this->assessment_model->get_FinalPreNumSchooling_data_by_id($id,$kv_id);
			 $view_data['FinalPreHindiSchl'] = $this->assessment_model->get_FinalHindiPreSchooling_data_by_id($id,$kv_id);
			$view_data['FinalParentSchl'] = $this->assessment_model->get_FinalParent_data_by_id($id,$kv_id);
			$view_data['FinalParentNumSchl'] = $this->assessment_model->get_FinalParentSchooling_data_by_id($id,$kv_id);
			$view_data['FinalParentHindiSchl'] = $this->assessment_model->get_FinalHindiParent_data_by_id($id,$kv_id);
			$view_data['FinalNonEduSchl'] = $this->assessment_model->get_FinalNonEdu_data_by_id($id,$kv_id);
			$view_data['FinalNonEduNumSchl'] = $this->assessment_model->get_FinalNonEduSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonEduHindiSchl'] = $this->assessment_model->get_FinalHindiNonEdu_data_by_id($id,$kv_id);
			$view_data['FinalDisSchl'] = $this->assessment_model->get_FinalDis_data_by_id($id,$kv_id);
			$view_data['FinalDisNumSchl'] = $this->assessment_model->get_FinalDisSchooling_data_by_id($id,$kv_id);
			$view_data['FinalDisHindiSchl'] = $this->assessment_model->get_FinalHindiDis_data_by_id($id);
            
            $view_data['FinalRTESchl'] = $this->assessment_model->get_FinalRTE_data_by_id($id,$kv_id);
			$view_data['FinalRTENumSchl'] = $this->assessment_model->get_FinalRTESchooling_data_by_id($id,$kv_id);
			$view_data['FinalRTEHindiSchl'] = $this->assessment_model->get_FinalHindiRTE_data_by_id($id);
			
            $view_data['EntryHindi'] = $this->assessment_model->get_hindi2A_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryDataPre'] = $this->assessment_model->get_EntryPre_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryPreHindi'] = $this->assessment_model->get_EntryPreHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataNoPre'] = $this->assessment_model->get_EntryNoPre_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryNoPreHindi'] = $this->assessment_model->get_EntryNoPreHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataEdu'] = $this->assessment_model->get_EntryEdu_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryEduHindi'] = $this->assessment_model->get_EntryEduHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataNoEdu'] = $this->assessment_model->get_EntryNoEdu_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryNoEduHindi'] = $this->assessment_model->get_EntryNoEduHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDisData'] = $this->assessment_model->get_EntryDis_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryDisHindi'] = $this->assessment_model->get_EntryDisHindi_data_by_id($id,$kv_id); // Entry Level
			
            $view_data['EntryRTEData'] = $this->assessment_model->get_EntryRTE_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryRTEHindi'] = $this->assessment_model->get_EntryRTEHindi_data_by_id($id,$kv_id); // Entry Level 			
        }    
		 $view = 'final_report_num';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Year End Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);  
    }
	
	
	public function mean_report($id=null){
			 
		  if (!empty($id) && !is_numeric($id)) {
				redirect('assessment/all');
			}
			if($id!='001'){
				if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
					$this->session->set_flashdata('error', 'Report does not exists.');
					redirect('assessment/all');
				}
			}

        if (isset($id) && !empty($id)) {  
			$view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id);			
            $view_data['EntryData'] = $this->assessment_model->get_page2A_data_by_id($id); // Entry Level
            $view_data['FinalOral'] = $this->assessment_model->get_FinalOral_data_by_id($id);
			$view_data['FinalReading'] = $this->assessment_model->get_FinalReading_data_by_id($id);
			$view_data['FinalWriting'] = $this->assessment_model->get_FinalWriting_data_by_id($id);
			$view_data['FinalNumeracy'] = $this->assessment_model->get_FinalNumeracy_data_by_id($id);
			$view_data['FinalHindi'] = $this->assessment_model->get_FinalHindi_data_by_id($id);
			 $view_data['FinalNonSchl'] = $this->assessment_model->get_FinalNonSchooling_data_by_id($id);
			$view_data['FinalNonNumSchl'] = $this->assessment_model->get_FinalNonNumSchooling_data_by_id($id);
			$view_data['FinalNonHindiSchl'] = $this->assessment_model->get_FinalHindiNonSchooling_data_by_id($id);
			$view_data['FinalPreSchl'] = $this->assessment_model->get_FinalPreSchooling_data_by_id($id);
			$view_data['FinalPreNumSchl'] = $this->assessment_model->get_FinalPreNumSchooling_data_by_id($id);
			 $view_data['FinalPreHindiSchl'] = $this->assessment_model->get_FinalHindiPreSchooling_data_by_id($id);
			$view_data['FinalParentSchl'] = $this->assessment_model->get_FinalParent_data_by_id($id);
			$view_data['FinalParentNumSchl'] = $this->assessment_model->get_FinalParentSchooling_data_by_id($id);
			$view_data['FinalParentHindiSchl'] = $this->assessment_model->get_FinalHindiParent_data_by_id($id);
			$view_data['FinalNonEduSchl'] = $this->assessment_model->get_FinalNonEdu_data_by_id($id);
			$view_data['FinalNonEduNumSchl'] = $this->assessment_model->get_FinalNonEduSchooling_data_by_id($id);
			$view_data['FinalNonEduHindiSchl'] = $this->assessment_model->get_FinalHindiNonEdu_data_by_id($id);
			$view_data['FinalDisSchl'] = $this->assessment_model->get_FinalDis_data_by_id($id);
			$view_data['FinalDisNumSchl'] = $this->assessment_model->get_FinalDisSchooling_data_by_id($id);
			$view_data['FinalDisHindiSchl'] = $this->assessment_model->get_FinalHindiDis_data_by_id($id);			
            $view_data['EntryHindi'] = $this->assessment_model->get_hindi2A_data_by_id($id); // Entry Level
            $view_data['EntryDataPre'] = $this->assessment_model->get_EntryPre_data_by_id($id); // Entry Level
            $view_data['EntryPreHindi'] = $this->assessment_model->get_EntryPreHindi_data_by_id($id); // Entry Level
			$view_data['EntryDataNoPre'] = $this->assessment_model->get_EntryNoPre_data_by_id($id); // Entry Level
            $view_data['EntryNoPreHindi'] = $this->assessment_model->get_EntryNoPreHindi_data_by_id($id); // Entry Level
			$view_data['EntryDataEdu'] = $this->assessment_model->get_EntryEdu_data_by_id($id); // Entry Level
            $view_data['EntryEduHindi'] = $this->assessment_model->get_EntryEduHindi_data_by_id($id); // Entry Level
			$view_data['EntryDataNoEdu'] = $this->assessment_model->get_EntryNoEdu_data_by_id($id); // Entry Level
            $view_data['EntryNoEduHindi'] = $this->assessment_model->get_EntryNoEduHindi_data_by_id($id); // Entry Level
			$view_data['EntryDisData'] = $this->assessment_model->get_EntryDis_data_by_id($id); // Entry Level
            $view_data['EntryDisHindi'] = $this->assessment_model->get_EntryDisHindi_data_by_id($id); // Entry Level 
        }  
		 /*$arr = array();
             echo "<pre>";
         print_r($view_data['EntryDataNoEdu']);    
		 die(); */    
		 $view = 'mean_report';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Mean Report Analysis',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
           

    }
	
	function promote_in_new_class($acadmic_year){
		if (isset($acadmic_year) && !empty($acadmic_year)) {
            $view_data['acadmic_year'] = $this->assessment_model->promote_students_class_one_to_two($acadmic_year);
			 $this->session->set_flashdata('success', 'Student Promoted Successfully.');
             redirect('assessmentclasstwo/teacher_listing');
        } 
		//die('hiii');
		
	}
	function get_data_not_filled_by_kv(){
		$view = 'get_data_not_filled_by_kv';
		$data = array(
            'title' => WEBSITE_TITLE . ' -Get Data Not Filled ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
		
	}
	
	function get_data_not_filled_kv_json(){
		
        
               
        $PostData = $this->input->post(null, true); 
		$order = $columns[$this->input->post('order')[0]['column']];
		//echo $order; die;
        $dir = $this->input->post('order')[0]['dir']; 
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
		
		$totalData = $this->assessment_model->KvnotFilldata();
        $response = $this->assessment_model->KvnotFilldata($limit, $start, $order, $dir, $search, $PostData);
		
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['actual'] = $user->actual;
                $nestedData['school_name'] = $user->school_name;
                $nestedData['region_name'] = $user->region_name;
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
