<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function GetRecipient($ST = null){
        $sql="U.id 'ID',
        (CASE 
	WHEN role_id = 6 THEN CONCAT(E.emp_name,' (',U.username,')')
        WHEN role_id = 7 THEN CONCAT(E.emp_name,' (',U.username,')')
        WHEN role_id = 5 THEN CONCAT(S.`name`,' (',S.`code`,')')
	WHEN role_id = 3 THEN CONCAT('RO-',R.`name`,' (',R.`code`,')')
	WHEN role_id = 4 THEN CONCAT(R.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=1 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=2 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=3 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=4 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=5 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=6 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	WHEN role_id = 2 AND role_category=7 THEN CONCAT('HQ-',C.`name`,' (',R.`code`,')')
	END) AS 'NAME'";
        $this->db->select($sql);
        $this->db->from('users U');
        $this->db->join('regions R','U.region_id=R.id','Left');
        $this->db->join('schools S','U.school_id=S.id','Left');
        $this->db->join('employee_details E','U.username=E.emp_code','Left');
        $this->db->join('role_category C','U.role_category=C.id','Left');
        $this->db->where('U.`status`=', 1);
        $this->db->where('U.role_id!=', 1);
        $this->db->order_by("U.role_id asc,C.id asc");
        if($ST != null || $ST!='undefined'){
            $this->db->like('E.emp_name', $ST);
            $this->db->or_like('S.name', $ST);
            $this->db->or_like('R.name', $ST);
            $this->db->or_like('C.name', $ST);
            $this->db->or_like('U.username', $ST);
            $this->db->or_like('S.code', $ST);
            $this->db->or_like('R.code', $ST);
            $this->db->limit(100);
            
        }else if($ST != null && $ST=='undefined'){
            $this->db->limit(7);
        }else{
            $this->db->limit(7);
        }
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        //show($data);
        return $data;
	}
    public function SetMessage(){
	$M=$this->input->post(null,true);
        $now = DateTime::createFromFormat('U.u', microtime(true));
        $MsgId=$now->format("YmdHis");

        $MsgData=array(
            'msg_id'=>$MsgId,
            'msg_sub'=>$M['msg_sub'],
            'msg_desc'=>htmlentities($M['msg_desc']),
            'msg_type'=>1,
            'msg_send'=>$M['msg_send'],
            'msg_rcvr'=>$M['msg_rcvr'],
            'cr_date'=>date('Y-m-d H:i:s')
        );
        if($this->db->insert('contact_us', $MsgData)){
            $resp=1;
        }else{
            $resp=0;
        }
        return $resp;
    }
    public function UpdateMessage(){
        $M=$this->input->post(null,true);
        $MsgData=array(
            'msg_id'=>$M['msg_id'],
            'msg_sub'=>$M['msg_sub'],
            'msg_desc'=>htmlentities($M['msg_desc']),
            'msg_type'=>2,
            'msg_send'=>$M['msg_send'],
            'msg_rcvr'=>$M['msg_rcvr'],
            'cr_date'=>date('Y-m-d H:i:s')
        );
        if($this->db->insert('contact_us', $MsgData)){
            $resp=1;
        }else{
            $resp=0;
        }
        return $resp;
    }

    public function GetMessages($Uid = NULL){
        $this->db->select("C.id,C.msg_id,C.msg_sub,C.msg_desc,C.msg_type,
        C.msg_send,
        (CASE
	WHEN SU.role_id = 6 THEN CONCAT(SE.emp_name,' (',SU.`username`,')')
	WHEN SU.role_id = 7 THEN CONCAT(SE.emp_name,' (',SU.username,')')
        WHEN SU.role_id = 5 THEN CONCAT(SS.`name`,' (',SS.`code`,')')
	WHEN SU.role_id = 3 THEN CONCAT('RO-',SR.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 4 THEN CONCAT(SR.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=1 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=2 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=3 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=4 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=5 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=6 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=7 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	END) AS 'send_name',
	C.msg_rcvr,
        
        (CASE
	WHEN RU.role_id = 6 THEN CONCAT(RE.emp_name,' (',RU.`username`,')')
	WHEN RU.role_id = 7 THEN CONCAT(RE.emp_name,' (',RU.username,')')
        WHEN RU.role_id = 5 THEN CONCAT(RS.`name`,' (',RS.`code`,')')
	WHEN RU.role_id = 3 THEN CONCAT('RO-',RR.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 4 THEN CONCAT(RR.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=1 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=2 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=3 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=4 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=5 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=6 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=7 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	END) AS 'rcvr_name',
        C.cr_date");
        $this->db->from('contact_us C');
        $this->db->join('users SU','SU.id=C.msg_send','Left');
        $this->db->join('regions SR','SU.region_id=SR.id','Left');
        $this->db->join('schools SS','SU.school_id=SS.id','Left');
        $this->db->join('employee_details SE','SU.username=SE.emp_code','Left');
        $this->db->join('role_category SC','SU.role_category=SC.id','Left');
        
        $this->db->join('users RU','RU.id=C.msg_rcvr','Left');
        $this->db->join('regions RR','RU.region_id=RR.id','Left');
        $this->db->join('schools RS','RU.school_id=RS.id','Left');
        $this->db->join('employee_details RE','RU.username=RE.emp_code','Left');
        $this->db->join('role_category RC','RU.role_category=RC.id','Left');
        $this->db->where('C.msg_type=','1');
        //$this->db->where('C.msg_send=',$Uid);
        //$this->db->or_where('C.msg_rcvr=',$Uid);
        $where = '(C.msg_send="'.$Uid.'" or C.msg_rcvr = "'.$Uid.'")';
        $this->db->where($where);
        $this->db->order_by('C.id','DESC');
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        //show($data);
        return $data;
    }
    public function GetMessagesDetails($MsgId = NULL){
        $this->db->select("C.id,C.msg_id,C.msg_sub,C.msg_desc,C.msg_type,
        C.msg_send,
        (CASE
	WHEN SU.role_id = 6 THEN CONCAT(SE.emp_name,' (',SU.`username`,')')
	WHEN SU.role_id = 7 THEN CONCAT(SE.emp_name,' (',SU.username,')')
        WHEN SU.role_id = 5 THEN CONCAT(SS.`name`,' (',SS.`code`,')')
	WHEN SU.role_id = 3 THEN CONCAT('RO-',SR.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 4 THEN CONCAT(SR.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=1 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=2 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=3 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=4 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=5 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=6 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	WHEN SU.role_id = 2 AND SU.role_category=7 THEN CONCAT('HQ-',SC.`name`,' (',SR.`code`,')')
	END) AS 'send_name',
	C.msg_rcvr,
        
        (CASE
	WHEN RU.role_id = 6 THEN CONCAT(RE.emp_name,' (',RU.`username`,')')
	WHEN RU.role_id = 7 THEN CONCAT(RE.emp_name,' (',RU.username,')')
        WHEN RU.role_id = 5 THEN CONCAT(RS.`name`,' (',RS.`code`,')')
	WHEN RU.role_id = 3 THEN CONCAT('RO-',RR.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 4 THEN CONCAT(RR.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=1 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=2 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=3 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=4 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=5 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=6 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	WHEN RU.role_id = 2 AND RU.role_category=7 THEN CONCAT('HQ-',RC.`name`,' (',RR.`code`,')')
	END) AS 'rcvr_name',
        DATE_FORMAT(C.cr_date,'%d-%m-%Y %h:%i %p') 'cr_date'");
        $this->db->from('contact_us C');
        $this->db->join('users SU','SU.id=C.msg_send','Left');
        $this->db->join('regions SR','SU.region_id=SR.id','Left');
        $this->db->join('schools SS','SU.school_id=SS.id','Left');
        $this->db->join('employee_details SE','SU.username=SE.emp_code','Left');
        $this->db->join('role_category SC','SU.role_category=SC.id','Left');
        
        $this->db->join('users RU','RU.id=C.msg_rcvr','Left');
        $this->db->join('regions RR','RU.region_id=RR.id','Left');
        $this->db->join('schools RS','RU.school_id=RS.id','Left');
        $this->db->join('employee_details RE','RU.username=RE.emp_code','Left');
        $this->db->join('role_category RC','RU.role_category=RC.id','Left');
        $this->db->where('C.msg_id=',$MsgId);
        $this->db->order_by('C.id','ASC');
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        //show($data);
        return $data;
    }
}
