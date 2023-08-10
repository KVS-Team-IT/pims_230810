<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Affiliation extends CI_Controller {
        public function __construct() {
            parent::__construct();
            //$this->load->model('affiliation_model');
        }
    
        public function index() { 
        $view = 'affiliation_form/step1';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Login ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
        } 
    

}
