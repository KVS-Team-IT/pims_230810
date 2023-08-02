<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('javascript');
    }
    public function index(){
        $view = '400-PageNotFound';
        $view_data='';
        $data = array(
            'title' => WEBSITE_TITLE . ' - 400-Page Not Found ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    }

}
