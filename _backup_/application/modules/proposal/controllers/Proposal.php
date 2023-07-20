<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proposal extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('proposal_model');
    }
    
    public function index()
    {
        $id=$this->school_id;
        $emp_id=$this->auth_user_id;
        
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['section'] = $this->proposal_model->getSectionData($id);
        //print_r($view_data['section']); 
        if ($post_data = $this->input->post(null, true)) {
            print_r($post_data); //die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('classroom', 'Classroom Available', 'required|xss_clean');
            $this->form_validation->set_rules('class[]', 'Class', 'required|xss_clean');
            $this->form_validation->set_rules('present_enroll[]', 'Enrollment As On', 'required|xss_clean');
            $this->form_validation->set_rules('expected_enroll[]', 'Expected Enrollment', 'required|xss_clean');
            $this->form_validation->set_rules('previous_section[]', 'Previous Sanctioned Section', 'required|xss_clean');
            $this->form_validation->set_rules('proposed_section[]', 'Proposed Section', 'required|xss_clean');
            $this->form_validation->set_rules('chairman_approval[]', 'Approval of chairman', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_sectionproposal($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('class-section-proposal');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('class-section-proposal');
                }
            }
        }
        
        $view = 'section_proposal';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Section Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
    
    public function section_report()
    {
        if($this->session->userdata('role_id')==3)
        {
            $view = 'regionlist';
            $data = array(
                'title' => WEBSITE_TITLE . ' - Section Strength Proposal',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
            
        }elseif ($this->session->userdata('role_id')==2 && $this->session->userdata('role_category')==1) {
            $view = 'headquarterlist';
            $data = array(
                'title' => WEBSITE_TITLE . ' - Section Proposal Report',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
        }
    }
    
    public function region_section_report()
    {
        
        $regid=$this->input->post('reg_id');
        $columns = array(
            0 => 'S.id',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->proposal_model->getRegionSectionData();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->proposal_model->getRegionSectionData($limit, $start, $order, $dir, $search, $post_data);
       
        $compliancedata = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
        $data = array();
        if (!empty($compliancedata)) {
            $serial = $start;
            foreach ($compliancedata as $user) {
                ++$serial;
                if(!empty($user->compliancestatus))
                {
                    $status='Submitted';
                }else{
                    $status='<span class="text-danger">Not Submitted</span>';
                }
                $nestedData['id'] = $user->id;
                $nestedData['name'] = $user->name;
                $nestedData['code'] = $user->code;
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
        //die;
    }

    public function viewproposal($id)
    {
        $id=$id;
        $emp_id=$this->session->userdata('user_id');
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['section'] = $this->proposal_model->getSectionData($id);
        if ($post_data = $this->input->post(null, true)) {
           // print_r($post_data); die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('dc_section[]', 'DC Sanctioned Section', 'required|xss_clean');
            $this->form_validation->set_rules('dc_status[]', 'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('dc_remark[]', 'Remark', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_dcsection($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('class-section-proposal-ro');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('class-section-proposal-ro');
                }
            }
        }
        
        $view = 'section_proposal_ro';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Section Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
    
    public function hq_section_report()
    {
        $columns = array(
            0 => 'S.id',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->proposal_model->getHqSectionData();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->proposal_model->getHqSectionData($limit, $start, $order, $dir, $search, $post_data);
       
        $compliancedata = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
        $data = array();
        if (!empty($compliancedata)) {
            $serial = $start;
            foreach ($compliancedata as $user) {
                ++$serial;
                if(!empty($user->compliancestatus))
                {
                    $status='Submitted';
                }else{
                    $status='<span class="text-danger">Not Submitted</span>';
                }
                $nestedData['id'] = $user->id;
                $nestedData['rname'] = $user->rname;
                $nestedData['name'] = $user->name;
                $nestedData['code'] = $user->code;
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
        die;
    }

    public function viewproposalhq($id)
    {
        $id=$id;
        $emp_id=$this->session->userdata('user_id');
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['section'] = $this->proposal_model->getSectionData($id);
        if ($post_data = $this->input->post(null, true)) {
           // print_r($post_data); die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('hq_section[]', 'DC Sanctioned Section', 'required|xss_clean');
            $this->form_validation->set_rules('hq_status[]', 'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('hq_remark[]', 'Remark', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_hqsection($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('class-section-proposal-hq');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('class-section-proposal-hq');
                }
            }
        }
        
        $view = 'section_proposal_hq';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Section Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }

    public function post_proposal()
    {
        $id=$this->session->userdata('school_id');
        $emp_id=$this->session->userdata('user_id');
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['post'] = $this->proposal_model->getPostData($id);
        //print_r($view_data['section']); 
        if ($post_data = $this->input->post(null, true)) {
            //print_r($post_data); die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('category[]', 'Category', 'required|xss_clean');
            $this->form_validation->set_rules('designation[]', 'Designation', 'required|xss_clean');
            //$this->form_validation->set_rules('subject[]', 'Subject', 'required|xss_clean');
            $this->form_validation->set_rules('previous_post[]', 'Previous Year Sanctioned Post', 'required|xss_clean');
            $this->form_validation->set_rules('proposed_post[]', 'Proposed Post By Principal', 'required|xss_clean');
            $this->form_validation->set_rules('chairman_approval[]', 'Approval of chairman', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_postproposal($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('post-strength-proposal');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('post-strength-proposal');
                }
            }
        }
        
        $view = 'post_proposal';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Post Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }

    public function get_presection(){
        if ($this->input->is_ajax_request()) {
            $preYear=date("Y", strtotime("-1 year")).'-'.date("Y");
            if (!empty($_POST['c_id'])) {
                $this->db->select('K.kv_section');
                $this->db->from('school_master_kvs K');
                $this->db->join('schools S','K.`code`=S.`code`','Left');
                $this->db->where('S.id=', $this->school_id);
                $this->db->where('K.kv_class=', $_POST['c_id']);
                $this->db->where('K.session_year=', $preYear);
                $query = $this->db->get();
                //$lQ=$this->db->last_query();
                $qry = $query->row();
                echo $qry->kv_section;
           }
           
       }    
   }

    public function get_designation() {
        if ($this->input->is_ajax_request()) {
            $options = '<option value="">Select</option>';
            if (!empty($_POST['c_id'])) {
                $this->db->select('*');
                $this->db->from('ci_designations');
                $this->db->where('cat_id=', $_POST['c_id']);
                $this->db->where('kv',1);
                $this->db->where('active',1);
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

    public function get_post(){
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['c_id'])) {
                if($_POST['s_id']=='NULL' || $_POST['s_id']=='null' || $_POST['s_id']=='')
                    $sub=0;
                else
                    $sub=$_POST['s_id'];
                $preYear=date("Y", strtotime("-1 year")).'-'.date("Y");
                if (!empty($_POST['c_id'])) {
                    $this->db->select('V.sanctioned_post');
                    $this->db->from('vacancy_master V');
                    $this->db->join('schools S','V.`code`=S.`code`','Left');
                    $this->db->where('S.id=', $this->school_id);
                    $this->db->where('V.designation_type=',$_POST['c_id']);
                    $this->db->where('V.designation=',$_POST['d_id']);
                    $this->db->where('V.`subject`=', $sub);
                    $this->db->where('V.session_year=', $preYear);
                    $query = $this->db->get();
                    //$lQ=$this->db->last_query();
                    $qry = $query->row();
                    echo $qry->sanctioned_post;
                }
            }   
        }    
    }

   public function post_report()
    {
        if($this->session->userdata('role_id')==3)
        {
            $view = 'post_regionlist';
            $data = array(
                'title' => WEBSITE_TITLE . ' - Post Proposal Report',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
            
        }elseif ($this->session->userdata('role_id')==2 && $this->session->userdata('role_category')==1) {
            $view = 'post_headquarterlist';
            $data = array(
                'title' => WEBSITE_TITLE . ' - Post Proposal Report',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
        }
    }
    
    public function region_post_report()
    {
        
        $regid=$this->input->post('reg_id');
        $columns = array(
            0 => 'S.id',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->proposal_model->getRegionPostData();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->proposal_model->getRegionPostData($limit, $start, $order, $dir, $search, $post_data);
       
        $compliancedata = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
        $data = array();
        if (!empty($compliancedata)) {
            $serial = $start;
            foreach ($compliancedata as $user) {
                ++$serial;
                if(!empty($user->compliancestatus))
                {
                    $status='Submitted';
                }else{
                    $status='<span class="text-danger">Not Submitted</span>';
                }
                $nestedData['id'] = $user->id;
                $nestedData['name'] = $user->name;
                $nestedData['code'] = $user->code;
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
        //die;
    }

    public function hq_post_report()
    {
        $columns = array(
            0 => 'S.id',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->proposal_model->getHqPostData();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->proposal_model->getHqPostData($limit, $start, $order, $dir, $search, $post_data);
       
        $compliancedata = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
        $data = array();
        if (!empty($compliancedata)) {
            $serial = $start;
            foreach ($compliancedata as $user) {
                ++$serial;
                if(!empty($user->compliancestatus))
                {
                    $status='Submitted';
                }else{
                    $status='<span class="text-danger">Not Submitted</span>';
                }
                $nestedData['id'] = $user->id;
                $nestedData['rname'] = $user->rname;
                $nestedData['name'] = $user->name;
                $nestedData['code'] = $user->code;
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
        die;
    }

    public function viewpostproposalro($id)
    {
        $id=$id;
        $emp_id=$this->session->userdata('user_id');
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['post'] = $this->proposal_model->getPostData($id);
        if ($post_data = $this->input->post(null, true)) {
            //print_r($post_data); die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('dc_post[]', 'DC Sanctioned Post', 'required|xss_clean');
            $this->form_validation->set_rules('dc_status[]', 'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('dc_remark[]', 'Remark', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_dcpost($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('post-strength-proposal-ro');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('post-strength-proposal-ro');
                }
            }
        }
        
        $view = 'post_proposal_ro';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Post Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }

    public function viewpostproposalhq($id)
    {
        $id=$id;
        $emp_id=$this->session->userdata('user_id');
        $view_data['school'] = $this->proposal_model->get_school_by_id($id);
        $view_data['post'] = $this->proposal_model->getPostData($id);
        if ($post_data = $this->input->post(null, true)) {
           // print_r($post_data); die;
            $this->form_validation->set_rules('id', 'School Id', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('hq_post[]', 'HQ Sanctioned Post', 'required|xss_clean');
            $this->form_validation->set_rules('hq_status[]', 'This Field', 'required|xss_clean');
            $this->form_validation->set_rules('hq_remark[]', 'Remark', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->proposal_model->add_hqpost($post_data);
                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('post-strength-proposal-hq');
                } else {
                    $this->session->set_flashdata('error', 'Error Occoured! Kindly Recheck the form.');
                    redirect('post-strength-proposal-hq');
                }
            }
        }
        
        $view = 'post_proposal_hq';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Post Strength Proposal',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }


}
