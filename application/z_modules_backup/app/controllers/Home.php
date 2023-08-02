<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }
    //========================= WELCOME TO PIMS HOME =====================//
    public function index()
    {
        $PIMS_DATA['UD'] = $this->home_model->LogMasterData($this->auth_user_id, $this->role_id);
        $data = array(
            'title' => WEBSITE_TITLE . ' - HOME',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view('Home', (isset($PIMS_DATA)) ? $PIMS_DATA : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
}
