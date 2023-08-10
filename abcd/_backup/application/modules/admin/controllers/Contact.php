<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Contact extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('contact_model');
    }
    public function inbox(){
        $view_data['uid']=$this->session->userdata['user_id'];
        $view_data['M'] = $this->contact_model->GetMessages($this->session->userdata['user_id']);
        $view = 'contact/inbox'; // Site Admin
        $data = array(
            'title' => WEBSITE_TITLE . ' - Contact Us',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($view_data) ) ? $view_data : '', TRUE)
        );
        
        $this->load->view($this->template, $data);
    }
    public function GetRecipientAddress($ST){
        //echo 'hello';
        if ($this->input->is_ajax_request()) {
            //$ST = $this->input->post('searchTerm');
            $data=$this->contact_model->GetRecipient($ST);
            $json=array();
            foreach($data as $d){
                $x=array(
                    'ID'=>$d->ID,
                    'NAME'=>$d->NAME
                );
                array_push($json,$x);
            }
            echo json_encode($json);
	}
    }

    public function compose(){

       // $view_data['E'] = $this->contact_model->GetRecipient();
        $view_data['role']=$this->session->userdata['role_id'];
        $view_data['uid']=$this->session->userdata['user_id'];
        
        if ($this->input->post(null, true)) { 
            
            $resp=$this->contact_model->SetMessage();
            if($resp==1){
                $this->session->set_flashdata('success', 'Message has successfully sent.');
                redirect(base_url('My-Inbox'));
            }else{
                $this->session->set_flashdata('error', 'Error Occoured, Try again.');
                redirect(base_url('Compose-Message'));
            }
        }
        
        
        $view = 'contact/compose'; // Site Admin
        $data = array(
            'title' => WEBSITE_TITLE . ' - Contact Us',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($view_data) ) ? $view_data : '', TRUE)
        );
        
        $this->load->view($this->template, $data);
    }
    public function reply($MsgId = NULL){
        $view_data['M'] = $this->contact_model->GetMessagesDetails($MsgId);
        $view_data['E'] = $this->contact_model->GetRecipient();
        $view_data['role']=$this->session->userdata['role_id'];
        $view_data['uid']=$this->session->userdata['user_id'];
        
        if ($this->input->post(null, true)) { 
            //show($this->input->post());
            $resp=$this->contact_model->UpdateMessage();
            if($resp==1){
                $this->session->set_flashdata('success', 'Message has successfully sent.');
                redirect(base_url('My-Inbox'));
            }else{
                $this->session->set_flashdata('error', 'Error Occoured, Try again.');
                redirect(base_url('Compose-Message/'.$MsgId));
            }
        }
        
        
        $view = 'contact/reply'; // Site Admin
        $data = array(
            'title' => WEBSITE_TITLE . ' - Contact Us',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($view_data) ) ? $view_data : '', TRUE)
        );
        
        $this->load->view($this->template, $data);
    
    }
}