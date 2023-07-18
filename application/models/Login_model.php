<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_model
{
    public function construct()
    {
        parent::__construct();
    }
    public function login()
    {
        $response = array();
        $post = $this->input->post(null, true);
        // Get Info of User From DB if UserId exist and Active
        $qry = $this->db->select('username USR, password PWD')->from('users')->where(array('username' => strtoupper($post['username']), 'status' => APPROVED))->get();
        if ($qry->num_rows()) {
            // Match Password Against Existing Password
            $db_password = hash_hmac('sha512', $qry->row()->PWD, $this->session->userdata('secKey'));
            if ($db_password == $post['password']) {
                //$SESS_DATA=$this->session->userdata();
                $this->db->where('session_id', $this->session->userdata('__ci_last_regenerate'));
                $this->db->delete('ci_secret_key');
                //Generate New Session Id
                session_regenerate_id();
                //Set Logged UserInfo into Session
                $this->db->select('U.id SNO, U.role_id ROL,U.role_category CAT,U.region_id REG, U.school_id KID,
                U.username UID, U.is_password_changed PAS,(CASE WHEN U.role_id=6 THEN U.username WHEN U.role_id=5 THEN KV.`code` WHEN U.role_id=4 THEN ZT.`code` ELSE RO.`code` END) AS COD');
                $this->db->from('users U');
                $this->db->join('roles R', 'U.role_id=R.id');
                $this->db->join('regions RO', 'U.region_id=RO.id', 'left');
                $this->db->join('regions ZT', 'U.region_id=ZT.parent', 'left');
                $this->db->join('schools KV', 'U.school_id=KV.id', 'left');
                $this->db->where('U.username', $qry->row()->USR);
                $this->db->where('U.status', APPROVED);
                $this->db->where('R.status', ACTIVE);
                $this->db->group_by('U.id');
                $UsrData = $this->db->get();
                //show($this->db->last_query());
                $UserInfo = array(
                    'user_id'               => $UsrData->row()->SNO,
                    'user_name'             => $UsrData->row()->UID,
                    'role_id'               => $UsrData->row()->ROL,
                    'role_category'         => $UsrData->row()->CAT,
                    'region_id'             => $UsrData->row()->REG,
                    'school_id'             => $UsrData->row()->KID,
                    'master_code'           => $UsrData->row()->COD,
                    'is_password_changed'   => $UsrData->row()->PAS,
                    'is_logged_in'          => TRUE
                );
                //Set Logged User Data Into Session
                $this->session->set_userdata($UserInfo);
                //Set Logged User Data Into Session Database
                $this->ResetUserSessionInfo($UserInfo, $this->session->userdata('__ci_last_regenerate'));

                add_user_activity($UserInfo['user_id'], '', 'Login Success', json_encode($this->input->post('username')), 'Login Module');
                $this->db->where('username', $post['username']);
                $this->db->update('users', array('last_login' => date('Y-m-d H:i:s')));
                $response = $UserInfo;
                $response['status'] = 'success';
            } else {
                add_user_activity('0', '', 'Login Failure', json_encode($this->input->post('username')), 'Login Module');
                $response['status'] = 'error';
                $response['error'] = 'User Id or password does not match';
            }
        } else {
            add_user_activity('0', '', 'Login Failure', json_encode($this->input->post('username')), 'Login Module');
            $response['status'] = 'error';
            $response['error'] = 'User Id or password does not match';
        }
        return $response;
    }
    //======================== U P D A T E  S E S S I O N  U S E R I N F O ===========================//
    public function ResetUserSessionInfo($UserInfo, $newSessionId)
    {

        //Inactive Session Data Which Was Mapped To Previous Login
        $this->db->where(array('USER_ID' => $UserInfo['user_id'], 'SESSION_ACT' => '1'));
        $this->db->update('sessions_info', array('SESSION_ACT' => '0', 'SESSION_EXP' => date('Y-m-d H:i:s')));
        //Active New Session Data To New User Login
        $SessionData = array(
            'SESSION_ID'    => $newSessionId,
            'USER_ID'       => $UserInfo['user_id'],
            'USER_IP'       => $_SERVER['REMOTE_ADDR'],
            'USER_AGENT'    => json_encode($_SERVER['HTTP_USER_AGENT']),
            'SESSION_DATA'  => json_encode($UserInfo),
            'SESSION_ACT'   => '1',
            'SESSION_GEN'   => date('Y-m-d H:i:s'),
            'SESSION_TIME'  => date("Y-m-d H:i:s", strtotime("+15 minutes", strtotime(date("Y-m-d H:i:s")))),
            'SESSION_EXP'   => date('0000-00-00 00:00:00')
        );
        $this->db->insert('sessions_info', $SessionData);

        //Map New Session Id To USER
        $this->db->where(array(id => $UserInfo['user_id']));
        $this->db->update('users', array('session_id' => $newSessionId));
    }
    //======================== S E T  S E S S I O N  U S E R I N F O ===========================//
}