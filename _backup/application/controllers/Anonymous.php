<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anonymous extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('anonymous_model');
        $this->load->library('javascript');
    }
    //===================== APP LOGIN FUNCTION START =========================//
    public function index(){
       // echo 'Anonymous Call';
        //Load Login View
        
        $view = 'Anonymous';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Login ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    }
    public function FilteredKV() {
			if (isset($_SERVER['HTTP_ORIGIN']) && time() <= 1649116729) {
				// Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
				// you want to allow, and if so:
				header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
				header('Access-Control-Allow-Credentials: true');
				header('Access-Control-Max-Age: 86400');    // cache for 1 day
			}
            //$fillData = $this->anonymous_model->RefinedKV(); 
            $fillData = $this->anonymous_model->RefinedListKV(); 
            echo $fillData;
        
    }
    public function KvProfile() {
        if ($this->input->is_ajax_request()) {
            $fillK= $this->input->post('KV_ID');
            $kv_data['KV'] = $this->anonymous_model->KvProfile($fillK); 
            $kv_data['CLS']= $this->anonymous_model->KvDetails($fillK); 
			$total_enrolled = 0;
			foreach($kv_data['CLS'] as $val){
				$total_enrolled = $total_enrolled+$val->PRE;
			}
			$kv_data['total_enrolled'] = $total_enrolled;
            echo json_encode($kv_data);
        }
    }
	public function exportAllData() {
            $kv_data = $this->anonymous_model->exportAllData();   
			 
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="enrollment_as_on"'.date("d-m-Y").'".csv"');

			$user_CSV[0] = array('Region name','School name','kVCODE','Last updated on');
			$i=0;
			foreach ($kv_data as $val) {
				//$dataArray[] = array($val->regionname,$val->schname,$val->kVCODE,$val->UPD);
				$user_CSV[++$i] = array($val->region_name, $val->school, $val->code,$val->UPD);
			}
			

			$fp = fopen('php://output', 'wb');
			foreach ($user_CSV as $line) {
				
				fputcsv($fp, $line, ',');
			}
			fclose($fp);
    }
}
