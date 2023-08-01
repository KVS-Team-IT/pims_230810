<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('javascript');
    }
    //===================== APP LOGIN FUNCTION START =========================//
    public function index()
    {
        //If Session Exists Redirect To User Dashboard
        if ($this->session->userdata('is_logged_in') == TRUE) {
            //redirect(base_url() . 'home');
        }
        //Check Login Request By Post Method
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('username', 'UserName', 'required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
            //$this->form_validation->set_rules('captcha',  'Captcha',  'required|xss_clean|callback_check_captcha');

            if ($this->form_validation->run() !== FALSE) {
                //Call For Login Function
                $response = $this->login_model->login();
                if ($response['status'] == 'success') {

                    redirect(base_url() . 'home');
                } else {

                    $view_data['error_msg'] = isset($response['error']) ? $response['error'] : 'User Id or password does not match';
                }
            }
            add_user_activity('0', '', 'Login Failure', json_encode($this->input->post()), 'Login Module');
        }
        $random_string = random_string('alnum', 20);
        $this->session->set_userdata('secKey', $random_string);
        $view_data['enKey'] = $random_string;
        $view_data['captchaImg'] = getCaptcha();
        //Load Login View
        $view = 'login';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Login ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    }
    //======================= APP LOGIN FUNCTION END =========================//
    public function check_captcha($str = NULL)
    {
        $session = $this->session->all_userdata();
        $qry = $this->db->select('*')->from('ci_secret_key')->where('session_id', $session['__ci_last_regenerate'])->get();
        if ($qry->num_rows()) {
            $captcha = $qry->row()->captcha;
            $sess_captcha = $session['captcha'];
            if ($captcha != $sess_captcha) {
                $this->form_validation->set_message('check_captcha', 'The captcha does not match');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('check_captcha', 'The captcha is expired please refresh the page');
            return FALSE;
        }

        if ($str == '') {
            $this->form_validation->set_message('check_captcha', 'The captcha is required');
            return FALSE;
        } else if ($str != $session['captcha']) {
            $this->form_validation->set_message('check_captcha', 'The captcha does not match');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ResetPassword()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserID = strtoupper($this->input->post('uname', true));
            $this->db->where('username', $UserID);
            $this->db->update('ci_users', array('token' => 0, 'token_status' => 'NA'));
            $this->form_validation->set_rules('uname', 'uname', 'required|xss_clean|callback_regex_check');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|xss_clean|callback_check_captcha|callback_regex_check');
            if ($this->form_validation->run() !== FALSE) {

                $token = random_string('numeric', 5);
                $token = hash('sha512', $token);
                $qry = $this->db->select('id,role_id,username,email_id,status')->from('ci_users')->where(array('username' => $UserID))->get();
                if ($qry->num_rows()) {
                    $UrData = $qry->row();
                    $this->db->where('username', $UrData->username);
                    $this->db->update('ci_users', array('token' => $token, 'token_time' => date('Y-m-d H:i:s'), 'token_status' => 'OPEN'));
                    $recovery_link = base_url() . 'Set-New-Password/' . EncryptIt($UrData->username) . '/' . $token;

                    $message = 'Click this link to recover your password. ';
                    $message .= '<a href="' . $recovery_link . '"> Click Here</a>';
                    $this->load->library('MailerLib');
                    $Sub = 'PIMS - Forgot Password';
                    $Msg = "<h3>Dear " . $UrData->username . ",<br><br></h3>
                    <p align='justify'>Your request for reset password on <b>KVS - Personnel Information Management System</b> has been processed. 
                    <br><br>You can reset your password by click the link <a href='" . $recovery_link . "'> Reset Password</a>.</p>
                    <br><p><b>Or </b> Copy & Paste the below url direct on the browser address bar.</p><br>
                    <p align='justify'>" . $recovery_link . "</p><br>

                    <p>Thank you,<br>
                    <i>KVS - Personnel Infomation System</i></p>";

                    //$To='kvspims@gmail.com';
                    if ($UrData->role_id == '6') {
                        $EmpQry = $this->db->select('emp_email')->from('ci_employee_details')->where(array('emp_code' => $UserID))->get();
                        $EmpData = $EmpQry->row();
                        $To = $EmpData->emp_email;
                    } else {
                        $To = $UrData->email_id;
                    }

                    $this->mailerlib->pushMail($Sub, $Msg, $To);
                    //show($recovery_link);

                }

                $this->session->set_flashdata('success', "If your email id : <em>$To</em> is registered in our database, You will receive a password reset link.");
                redirect('Reset-Password');
            }
        }
        $view_data['captchaImg'] = getCaptcha();
        $view = 'forgot_password';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Forgot Password ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    }

    public function recovery_password($enUserId = null, $Token = null)
    {
        $this->session->set_flashdata('error', '');
        if (!empty($enUserId)) {
            $UserId = strtoupper(DecryptIt($enUserId));

            if (!empty($UserId) && !empty($Token)) {
                $qry = $this->db->select('id,email_id')->from('ci_users')->where(array('username' => $UserId, 'token' => $Token, 'token_status' => 'OPEN'))->get();
                //show($this->db->last_query());
                if ($qry->num_rows()) {
                    $view_data['username'] = $UserId;
                    $view_data['token'] = $Token;
                    $view_data['link_valid'] = true;
                } else {
                    $view_data['link_valid'] = false;
                }
            } else {
                $view_data['link_valid'] = false;
            }
        }
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->input->post(null, true);
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|xss_clean|matches[password]');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|xss_clean|callback_check_captcha|callback_regex_check');
            if ($this->form_validation->run() !== FALSE) {
                //print_r($token); die;
                $post = $this->input->post(null, true);
                $UpdateDataSet = array(
                    'password' => $this->input->post('password'),
                    'token' => 'NA',
                    'token_status' => 'CLOSE',
                    'is_forgot_password' => '1',
                    'forgot_password_time' => date('Y-m-d H:i:s')
                );
                $this->db->where('username', $this->input->post('uname'));
                if ($this->db->update('ci_users', $UpdateDataSet)) {
                    $this->session->set_flashdata('success', 'Password successfully Updated');
                    redirect(base_url() . 'Login');
                } else {
                    $this->session->set_flashdata('error', 'Something wrong, try to open reset again.');
                }
            } else {
                $this->session->set_flashdata('error', ' The captcha is expired or not matched.<br> Please open the link again.');
            }
        }
        $random_string = random_string('alnum', 20);
        $this->session->set_userdata('secKey', $random_string);
        $view_data['enKey'] = $random_string;
        $view_data['captchaImg'] = getcaptcha();
        $view = 'recovery_password';
        $data = array(
            'title' => WEBSITE_NAME . ' - Password Recover ',
            'javascripts' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($view, $data);
    }

    public function logout()
    {
        $SessData = $this->session->all_userdata();
        add_user_activity($SessData['user_id'], $SessData['user_id'], 'Logout Success', 'You have logout successfully', 'Login Module');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        session_start();
        $this->session->set_flashdata('success', 'You are successfully logout');
        redirect(base_url());
    }

    public function inactivity_logout()
    {
        $SessData = $this->session->all_userdata();
        add_user_activity($SessData['user_id'], $SessData['user_id'], 'Logout Success', 'You have been logged out due to inactivity.Please login again', 'Login Module');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        session_start();
        $this->session->set_flashdata('error', 'You have been logged out due to inactivity.Please login again');
        redirect(base_url());
    }

    function regex_check($str)
    {
        if (!empty($str)) {
            if (preg_match('/^[a-z0-9A-Z .!@#$%&*()_-]+$/', $str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('regex_check', 'The %s field is not is correct format.');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }
}