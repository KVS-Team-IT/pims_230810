<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Autocomplete extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('autocomplete_model');
    }

    function index() {
        $view = 'autocomplete';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Personal Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    function fetch() {
        $this->load->model('autocomplete_model');
        echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
    }
    function fetch_pre() {
        $this->load->model('autocomplete_model');
        echo $this->autocomplete_model->fetch_pre_data($this->uri->segment(3));
    }

    public function get_designation() {
        if ($this->input->is_ajax_request()) {
        header('Content-Type: application/x-json; charset=utf-8');
        $designation = $this->input->post('designation');
        if($this->input->post('cat')){
            $cat = $this->input->post('cat');
        }else{
            $cat=null;
        }
        echo(json_encode($this->autocomplete_model->fetchDesignationList($designation,$cat)));
   
        }
    }
    
    public function get_pre_designation() {
        if ($this->input->is_ajax_request()) {
        header('Content-Type: application/x-json; charset=utf-8');
        $designation = $this->input->post('designation');
        if($this->input->post('cat')){
            $cat = $this->input->post('cat');
        }else{
            $cat=null;
        }
        echo(json_encode($this->autocomplete_model->fetchPreDesignationList($designation,$cat)));
   
        }
    }

}
