<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class School extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('school_model');
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
    
}
