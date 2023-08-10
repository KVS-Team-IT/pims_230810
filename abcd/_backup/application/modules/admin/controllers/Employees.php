<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employees extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employees_model');
    }

    public function index() {
        $view = 'employees/index';
        $random_string=random_string('alnum',20);
	$this->session->set_userdata('secKey',$random_string );
        $view_data['enKey']= $random_string;
	$view_data['captchaImg'] = getCaptcha();
        $data = array(
            'title' => WEBSITE_TITLE . ' - Employees Master',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function add_an_employee($param) {
        if ($SubmittedData = $this->input->post(null, true)) {
            show($SubmittedData);
        }
        $view = 'employees/add_an_employee';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Employees Master',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function add_bulk_employee($param) {
        if ($SubmittedData = $this->input->post(null, true)) {
            show($SubmittedData);
        }
        $view = 'employees/add_bulk_employee';
        $random_string=random_string('alnum',20);
	$this->session->set_userdata('secKey',$random_string );
        $view_data['enKey']= $random_string;
	$view_data['captchaImg'] = getCaptcha();
        $data = array(
            'title' => WEBSITE_TITLE . ' - Employees Master',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
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
                $StsId  =$this->input->post('StsId');
                //if there is no update in designation
                if(!empty($StsId)&& $StsId!=1){
                    echo 1;
                }else{
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
                        //show($this->db->last_query());
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
    }

}
