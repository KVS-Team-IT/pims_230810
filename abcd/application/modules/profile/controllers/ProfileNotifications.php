<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

    class ProfileNotifications extends MY_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('profile_model');
        }
    
        public function index() {
            
            $view = 'ProfileNotifications';
           
            $data = array(
                'title' => WEBSITE_TITLE . ' - View Employee Profile',
                'javascripts' => array(),
                'style_sheets' => array(),
                'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
            );
            $this->load->view($this->template, $data);
        }
        public function Notifications(){
        $columns = array(0 => 'N.id');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->profile_model->getAllNotifications();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->profile_model->getAllNotifications($limit, $start, $order, $dir, $search, $post_data);
        //show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['id'] = $user->id;
                $nestedData['act_emp_code'] = $user->act_emp_code;
                $nestedData['emp_first_name'] = $user->emp_title.' '.$user->emp_name;
                $nestedData['act_type'] = $user->act_type;
                $nestedData['act_section'] = $user->act_section;
                $nestedData['act_by'] = $user->act_by;
                $nestedData['act_school'] = $user->act_school;
                $nestedData['act_ip'] = $user->act_ip;
                $nestedData['act_action'] = $user->act_action;
                $nestedData['act_date_time'] = $user->act_date_time;
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
