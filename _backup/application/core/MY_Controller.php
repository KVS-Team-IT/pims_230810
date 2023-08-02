<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Controller   MY_Controller
 * @author      Aasit 
 * @package     Check Authorization
 * @license     KVS
 **/
class MY_Controller extends CI_Controller {
    public $template = 'templates/template';
    public $front_template = 'templates/front_template';
    public $auth_data;
    public $auth_user_id;
    public $user_name;
    public $email_id;
    public $role_id;
    public $role_category;
    public $region_id;
    public $school_id;
    public $master_code;
    public $is_password_changed;
    public $user_permissions;
    public $is_logged_in;

    public function __construct() {
        parent::__construct();
        $this->load->library('my_form_validation');
        $this->load->helper('file');
        $CM_NAME=$this->getControllerMethod();
        if($CM_NAME=='Login' 
            || $CM_NAME=='Login/index' 
            || $CM_NAME=='Login/ResetPassword' 
            || $CM_NAME=='Register/RefreshCaptcha' 

            || $CM_NAME=='Login/logout'){
            //No Authrization Checking
        }else if($CM_NAME=='Settings/ChangePasswd'){
            $this->is_logged_in();
        }else{
            $this->is_logged_in();
            $this->is_password_changed();
        }
        
        if($this->session->userdata('is_logged_in')== TRUE) {
            $UserInfo = $this->LoggedUserInfo($this->session->userdata('user_id'));
            $this->auth_data            = $UserInfo;
            $this->auth_user_id         = $UserInfo->SNO;
            $this->user_name            = $UserInfo->UID;
            $this->email_id             = $UserInfo->EID;
            $this->role_id              = $UserInfo->ROL;
            $this->role_category        = $UserInfo->CAT;
            $this->region_id            = $UserInfo->REG;
            $this->school_id            = $UserInfo->KID;
            $this->master_code          = $UserInfo->COD;
            $this->is_password_changed  = $UserInfo->PAS;
            $this->user_permissions     = $UserInfo->PER;
            $this->is_logged_in         = TRUE;
            $this->check_permission();
        }
    }
    public function getControllerMethod(){
		$Cn = $this->router->fetch_class();
		$Mn = $this->router->fetch_method();
                $CM=$Cn.'/'.$Mn;
		return $CM;
    }
    public function LoggedUserInfo($UsrSno) {
        $this->db->select('U.id SNO, U.role_id ROL,U.role_category CAT,U.region_id REG, 
            U.school_id KID,R.permissions PER,U.username UID,U.email_id EID, U.is_password_changed PAS,
            (CASE 
                WHEN U.role_id=6 THEN U.username 
                WHEN U.role_id=5 THEN KV.`code` 
                WHEN U.role_id=4 THEN ZT.`code` 
                ELSE RO.`code` 
            END) AS COD'); 
        $this->db->from('users U');
        $this->db->join('roles R','U.role_id=R.id');
        $this->db->join('regions RO', 'U.region_id=RO.id', 'left'); 
        $this->db->join('regions ZT', 'U.region_id=ZT.parent', 'left'); 
        $this->db->join('schools KV', 'U.school_id=KV.id', 'left'); 
        $this->db->where('U.id',$UsrSno);
        $this->db->where('U.status', APPROVED);
        $this->db->where('R.status', ACTIVE);
        $this->db->group_by('U.id');
        $qry = $this->db->get();
        if ($qry->num_rows()) {
            return $qry->row();
        } else {
            $this->session->set_flashdata('error', 'Please Login In');
            redirect(base_url());
        }
    }

    public function is_logged_in() {
        //return (bool) $this->session->userdata('user_id');
        if($this->session->userdata('is_logged_in')== FALSE){
            $this->session->set_flashdata('error', 'Please Login In');
            redirect(base_url());
        }
    }

    public function is_password_changed(){
        if($this->session->userdata('is_password_changed')== '0'){
            redirect(base_url().'Update-Default-Password');
        }
    }

    function regex_check($str) {
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

    function regex_check_url($str) {
        if (!empty($str)) {
            if (preg_match('/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/', $str)) {
                return TRUE;
            } else {
                $this->form_validation->set_message('regex_check_url', 'The %s field is not is correct format.');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }

    function check_permission() {
        $role = $this->role_id;
        $user_permissions = $this->user_permissions;
        $module = $this->router->fetch_module();
        $controller = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        $AccessPath = $controller.'/'.$method;

        if ($this->input->is_ajax_request()) {  return true;  }
        $allowed_methods = array('activities_logs', 'set_permission');
        if ($method == 'activities_logs' || $controller == 'PermissionDenied') {
            return true;
        }
        if ($module == 'admin') {
            if ($user_permissions == '') {
                redirect(base_url() . 'permission_denied');
            } else {
            //$user_permission = json_decode($user_permissions);
            //if (!in_array($AccessPath, $user_permission)) {
            //    redirect(base_url() . 'permission_denied');
            //}
            }
        }
    }

    public function file_photo_validation() {
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name']!= "") {

            if (has_malicious_field($_FILES['photo']['name'])) {
                $this->form_validation->set_message('file_photo_validation', 'File name content is suspicious,please try another image');
                return false;
            }
            $photo = $this->common_model->callback_upload_image('photo', $this->auth_user_id, 'common/photo');

            if (isset($photo['error']) && !empty($photo['error'])) {
                $this->form_validation->set_message('file_photo_validation', $photo['error']);
                return false;
            }

            $mime_content_type = mime_content_type($_FILES['photo']['tmp_name']);
            $allowed_mime_type_arr = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/x-png');
            $mime = get_mime_by_extension($_FILES['photo']['name']);
            $explode = explode(".", $_FILES['photo']['name']);
            if (count($explode) > 2) {
                $this->form_validation->set_message('file_photo_validation', 'Multiple Extension Not Allow');
                return false;
            } else {
                if (in_array($mime_content_type, $allowed_mime_type_arr)) {
                    if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "") {
                        if (in_array($mime, $allowed_mime_type_arr)) {
                            return true;
                        } else {
                            $this->form_validation->set_message('file_photo_validation', 'Please select only gif/jpg/png photo.');
                            return false;
                        }
                    }
                } else {
                    $this->form_validation->set_message('file_photo_validation', 'The filetype you are attempting to upload is not allowed.');
                    return false;
                }
            }
        } else {
            $allowed_mime_type_arr = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/x-png');
            $mime_content_type = mime_content_type($_POST['update_photo']);
            $mime = get_mime_by_extension($_POST['update_photo']);
            if (in_array($mime_content_type, $allowed_mime_type_arr)) {
                if (isset($_POST['update_photo']) && $_POST['update_photo'] != "") {
                    if (in_array($mime, $allowed_mime_type_arr)) {
                        return true;
                    } else {
                        $this->form_validation->set_message('file_photo_validation', 'The filetype you are attempting to upload is not allowed.');
                        return false;
                    }
                }
            } else {
                return true;
            }
        }
    }

    /* public function file_photo_validation($str) {
      if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "") {
      $photo = $this->common_model->callback_upload_image('photo', $this->auth_user_id, 'common/photo');

      if (isset($photo['error']) && !empty($photo['error'])) {
      $this->form_validation->set_message('file_photo_validation', $photo['error']);
      return false;
      }
      $mime_content_type = mime_content_type($_FILES['photo']['tmp_name']);
      $allowed_mime_type_arr = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/x-png');
      $mime = get_mime_by_extension($_FILES['photo']['name']);
      $explode = explode(".", $_FILES['photo']['name']);
      if (count($explode) > 2) {
      $this->form_validation->set_message('file_photo_validation', 'Multiple Extension Not Allow');
      return false;
      } else {
      if (in_array($mime_content_type, $allowed_mime_type_arr)) {
      if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "") {
      if (in_array($mime, $allowed_mime_type_arr)) {
      return true;
      } else {
      $this->form_validation->set_message('file_photo_validation', 'Please select only gif/jpg/png photo.');
      return false;
      }
      }
      } else {
      $this->form_validation->set_message('file_photo_validation', 'The filetype you are attempting to upload is not allowed.');
      return false;
      }
      }
      }
      } */

    function file_err($str) {
        $this->form_validation->set_message('file_err', 'The file is not in correct format');
        return FALSE;
    }
    function sendMail(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aasit.analyst@gmail.com', // change it to yours
            'smtp_pass' => '', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

            $message = '';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('xxx@gmail.com'); // change it to yours
            $this->email->to('xxx@gmail.com');// change it to yours
            $this->email->subject('Resume from JobsBuddy for your Job posting');
            $this->email->message($message);
            if($this->email->send()){
                echo 'Email sent.';
            }else{
                show_error($this->email->print_debugger());
            }
    }

}
