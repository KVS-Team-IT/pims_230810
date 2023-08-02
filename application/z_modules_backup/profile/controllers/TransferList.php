<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TransferList extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transfer_model');
        //show($this->session->userdata);
    }

    
    //============================== TRANSFER BOOK ================================//
    
    public function index() {
        
        $view = 'TransferList';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Transfer List',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function TransferBook() {
        $columns = array(
            0 => 'id',
            1 => 'emp_code',
            2 => 'emp_name',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->transfer_model->getAllTransferredProfile();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
		
        $response = $this->transfer_model->getAllTransferredProfile($limit, $start, $order, $dir, $search, $post_data);
       // show($response);
        
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                
                $nestedData['EMP_CODE'] = $user->EMP_ID;
                $nestedData['EMP_NAME'] = $user->EMP_NAME;
                $nestedData['PRE_EMP_PLACE_DEPT'] = ($user->P_PLACE_ID==5)?$user->P_SCHOOL.'/'.$user->P_CODE:$user->P_PLACE.'/'.$user->P_DEPT;
                $nestedData['PRE_EMP_DESIG_SUB']  = $user->P_DESIG.'/'.$user->P_SUB;
                $nestedData['TRA_EMP_PLACE_DEPT'] = ($user->P_PLACE_ID==5)?$user->T_SCHOOL.'/'.$user->T_CODE:$user->T_PLACE.'/'.$user->T_DEPT;
                $nestedData['TRA_EMP_DESIG_SUB']  = $user->T_DESIG.'/'.$user->T_SUB;
                $nestedData['EMP_FROM_DT'] = $user->PRE_JOIN_DT;
                $nestedData['EMP_TRA_DT'] = $user->KVS_ORD_DT;
                
                $nestedData['EMP_TRA_ORD'] = $user->KVS_ORD_NO;
                $nestedData['EMP_REL_DT'] = $user->KVS_REL_DT;
                $nestedData['EMP_REL_ORD'] = $user->KVS_REL_NO;
                $nestedData['ENC_EMP_CODE'] = EncryptIt($user->EMP_ID);
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
