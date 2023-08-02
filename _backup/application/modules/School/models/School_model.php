<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class School_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function KvProfile(){
        $this->db->select("HQ.`id` 'ID',CONCAT(HQ.`label`,'-',HQ.`name`) 'NAME',HQ.`code` 'CODE',
        SUM(VM.sanctioned_post) 'SAN',
        SUM(VM.inposition_post) 'POS',
        SUM(VM.sanctioned_post)-SUM(VM.inposition_post) 'VAC'");
        $this->db->from('ci_regions HQ');
        $this->db->join('ci_vacancy_master VM','HQ.`code`= VM.`code`','Left');
        $this->db->where('HQ.type=',2); // KVS HQ POSITION DATA
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->result();
        }else{
            return array();
        }
    }
    public function GetKvProfile() {
        $this->db->select("S.id,S.kv_code,S.`code`,S.`name`,S.shift,(CASE WHEN S.shift=1 THEN 'FIRST' WHEN S.shift=2 THEN 'SECOND' ELSE 'NA' END) shift_name");
        $this->db->from('ci_schools S');
        $this->db->where('code=', $this->master_code); // KVS HQ POSITION DATA
        
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            return $qry->row();
        }else{
            return array();
        }
    }
    public function GetClassNullProfile() {
        $this->db->select("id CLS_ID, `name` CLS_NAME, sec CLS_SEC, stu_approved CLS_STU, stu_onroll CLS_STU_ONROLL, room_length CLS_LEN, room_width CLS_WTH, 0 AS CLS_STS");
        $this->db->from('ci_classes');
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->result();
        }else{
            return array();
        }
    }
    public function GetClassProfile() {
        $this->db->select("S.`class` CLS_ID,C.`name` CLS_NAME,S.section CLS_SEC,S.class_strength CLS_STU,S.class_strength_onroll CLS_STU_ONROLL,S.classroom_length CLS_LEN,S.classroom_width CLS_WTH, S.status CLS_STS");
        $this->db->from('ci_schools_strength S');
        $this->db->join('ci_classes C','S.class=C.id','Left');
        $this->db->where('code=', $this->master_code); // KVS HQ POSITION DATA
		$this->db->group_by('C.`name`');
		$this->db->order_by('S.`class`');
        $qry=$this->db->get();
		
        if($qry->num_rows())
        {
            return $qry->result();
        }else{
            return array();
        }
    }
    public function SetClassProfile() {
        $PostData=$this->input->post(null, true);
        //echo "<pre>";$chk->num_rows();die('kk');
        $kv_code=$this->input->post('kv_kv_code');
        $kv_shift=$this->input->post('kv_shift');
        $code=$this->input->post('kv_code');
        
        $this->db->select("code,shift,class");
        $this->db->from('ci_schools_strength S');
        $this->db->where('code=', $code);
        $this->db->where('shift=',$kv_shift);
        $chk=$this->db->get();
		//echo "<pre>";$chk->num_rows();die('kk');
        if($chk->num_rows()){ // Update Old
            $x=0;
            foreach($PostData['kv_cls_id'] as $PD){
                $DataAry = array(
                    'kv_code' => $kv_code,
                    'shift' => $kv_shift,
                    'code' => $code,
                    'class' => $PostData['kv_cls_id'][$x],
                    'section' => $PostData['kv_sec'][$x],
                    'class_strength' => $PostData['kv_sec_stu'][$x],
                    'class_strength_onroll' => $PostData['kv_onroll_stu'][$x],
                    'classroom_length' => $PostData['kv_length'][$x],
                    'classroom_width' => $PostData['kv_width'][$x],
                    'status' => $PostData['kv_status'][$x],
                    'updated_on' => date('Y-m-d H:i:s'),
                    'updated_by' => $this->session->userdata('user_id')					
                );
                //Condition Array
                $Cond=array('kv_code' => $kv_code,'shift' => $kv_shift,'code' => $code,'class' => $PostData['kv_cls_id'][$x]);
                $this->db->where($Cond);
                $this->db->update('schools_strength', $DataAry);
				//echo $this->db->last_query()."<br>";
                $x++;
            }
        }else{// New Insert
            $x=0;
            foreach($PostData['kv_cls_id'] as $PD){
                $DataAry = array(
                    'kv_code' => $kv_code,
                    'shift' => $kv_shift,
                    'code' => $code,
                    'class' => $PostData['kv_cls_id'][$x],
                    'section' => $PostData['kv_sec'][$x],
                    'class_strength' => $PostData['kv_sec_stu'][$x],
                    'class_strength_onroll' => $PostData['kv_onroll_stu'][$x],
                    'classroom_length' => $PostData['kv_length'][$x],
                    'classroom_width' => $PostData['kv_width'][$x],
                    'status' => $PostData['kv_status'][$x],
                    'updated_on' => date('Y-m-d H:i:s'),
                    'updated_by' => $this->session->userdata('user_id')					
                );
                $this->db->insert('schools_strength', $DataAry);
                $x++;
            }
        }
        
        
        //die('hhh');
        if($x==16) {
            //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Spouse Data','Employee Module');
            $Resp['status'] = 'success';
            $Resp['message'] = 'Data Updated Successfully';
        } else {
            $Resp['status'] = 'error';
            $Resp['message'] = 'Sorry! Some error occoured';
        } 
        return $Resp;
    }
   
}
