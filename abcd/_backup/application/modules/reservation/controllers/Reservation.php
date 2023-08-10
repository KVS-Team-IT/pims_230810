<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reservation_model');

    }
    
   
    public function index(){
        
        $view = 'index';
        //$view_data['EMP']=$this->swap_model->getAllEmp();
        
        

        $data = array(
            'title' => WEBSITE_TITLE . ' - Employee Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }

    public function register()
    {
        if($this->input->post(null, true))
        {
            //print_r($this->input->post()); die;
            $SubmitData = $this->input->post(null, true);
            $view_data['emp_details'] = $this->reservation_model->get_emp($SubmitData);
            $view_data['counts']=count($view_data['emp_details']);
            $view_data['desig']=$this->reservation_model->get_desig($SubmitData);
            $view_data['mor']=$SubmitData['method_recruitment'];
            // $view_data['sc']=count($this->reservation_model->get_emp_sc($SubmitData));
            // $view_data['st']=count($this->reservation_model->get_emp_st($SubmitData));
            // $view_data['obc']=count($this->reservation_model->get_emp_obc($SubmitData));
            $view_data['sc']=$SubmitData['sc'];
            $view_data['st']=$SubmitData['st'];
            $view_data['obc']=$SubmitData['obc'];

            // print_r($view_data['emp_details']);
            // print_r(count($view_data['emp_details'])); 
        }

        if (!empty($_POST['register'])) {
            $view = 'reservation';
        }

        if (!empty($_POST['roaster'])) {
            $view = 'roaster_reservation';
        }
        $data = array(
            'title' => WEBSITE_TITLE . ' - Reservation register',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function Reservation_register() {
        
        //$view_data['ID']=$EmpCode; 
        //================================= SUBMIT LPC======================================//
        if ($SubmitData = $this->input->post(null, true)) {
            $SubmitData = $this->input->post(null, true);
            //show($SubmitData);
                $response = $this->reservation_model->SubmitLPC($SubmitData);
                if ($response['status'] == 'success') {
                    //=================== redirect Print View ========================//
                    $this->session->set_userdata('LPC', $SubmitData);
                    redirect(base_url('swap/Print_LPC/'));
                }else {
                    $this->session->set_flashdata('error',$response['message']);
                    redirect(base_url('swap/Generate_LPC/1/'.$enEmpCode));
                }
            
        }
        //================================= SUBMIT LPC END =================================//
        $view = 'reservation';
        //$view_data['E']=$this->reservation_model->EmployeeLPC($EmpCode);

        $data = array(
            'title' => WEBSITE_TITLE . ' - Reservation register',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function Reservation_roaster_register() {
        
        //$view_data['ID']=$EmpCode; 
        //================================= SUBMIT LPC======================================//
        if ($SubmitData = $this->input->post(null, true)) {
            $SubmitData = $this->input->post(null, true);
            //show($SubmitData);
                $response = $this->reservation_model->SubmitLPC($SubmitData);
                if ($response['status'] == 'success') {
                    //=================== redirect Print View ========================//
                    $this->session->set_userdata('LPC', $SubmitData);
                    redirect(base_url('swap/Print_LPC/'));
                }else {
                    $this->session->set_flashdata('error',$response['message']);
                    redirect(base_url('swap/Generate_LPC/1/'.$enEmpCode));
                }
            
        }
        //================================= SUBMIT LPC END =================================//
        $view = 'roaster_reservation';
        //$view_data['E']=$this->reservation_model->EmployeeLPC($EmpCode);

        $data = array(
            'title' => WEBSITE_TITLE . ' - Reservation roaster register',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function get_query(){
        if ($this->input->is_ajax_request()) {
            if (!empty($_POST['d_id'])) {
                if($_POST['s_id']=='NULL' || $_POST['s_id']=='null' || $_POST['s_id']=='')
                    $sub=0;
                else
                    $sub=$_POST['s_id'];
                $this->db->select('*');
                $this->db->from('ci_present_service_details');
                $this->db->where('present_designationid=', $_POST['d_id']);
                $this->db->where('present_appointed_term', $_POST['mor']);
                //if(isset($_POST['s_id']) && $_POST['s_id']!=''){
                   $this->db->where('present_subject', $sub);
                //}
                $this->db->order_by("id", "asc");
               $query = $this->db->get();
               //$qry = $query->row();
           }
           //echo $qry->inposition_post;
       }    
    }

    
}
