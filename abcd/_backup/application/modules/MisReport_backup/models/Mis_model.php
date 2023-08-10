<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Mis_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function UnitDataHqPos(){
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
    public function UnitDataVfy($UnitId=null) {
        $this->db->select("IFNULL(SUM(CASE WHEN EM.emp_acceptance=1 THEN 1 ELSE 0 END),0) 'VFY'");
        $this->db->from('ci_present_service_details PS');
        $this->db->join('ci_employee_details EM','PS.emp_id=EM.emp_code','Left');
        $this->db->where('PS.present_unit=',$UnitId); // KVS HQ POSITION DATA
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->row();
        }else{
            return array();
        }
    }
    public function UnitDataRoPos() {
        $this->db->select("HQ.`id` 'ID',CONCAT(HQ.`label`,'-',HQ.`name`) 'NAME',HQ.`code` 'CODE',
        SUM(VM.sanctioned_post) 'SAN',
        SUM(VM.inposition_post) 'POS',
        SUM(VM.sanctioned_post)-SUM(VM.inposition_post) 'VAC'");
        $this->db->from('ci_regions HQ');
        $this->db->join('ci_vacancy_master VM','HQ.`code`= VM.`code`','Left');
        $this->db->where('HQ.type=',3); // KVS RO POSITION DATA
        $this->db->where('HQ.status=',1); // KVS RO POSITION DATA
        $this->db->group_by("HQ.`code`");
        $this->db->order_by("HQ.`name`");
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->result();
        }else{
            return array();
        }
    }
    public function UnitDataKvPos($UnitId=null) {
        $this->db->select("SUM(VM.sanctioned_post) 'SAN',
        SUM(VM.inposition_post) 'POS',
        SUM(VM.sanctioned_post)-SUM(VM.inposition_post) 'VAC'");
        $this->db->from('ci_vacancy_master VM');
        $this->db->join('ci_schools KV','VM.`code`= KV.`code`','Left');
        $this->db->where('KV.region_id=',$UnitId); // KVS HQ POSITION DATA
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->row();
        }else{
            return array();
        }
    }
    public function UnitDataZtPos(){
        $this->db->select("HQ.`id` 'ID',CONCAT(HQ.`label`,'-',HQ.`name`) 'NAME',HQ.`code` 'CODE',
        SUM(VM.sanctioned_post) 'SAN',
        SUM(VM.inposition_post) 'POS',
        SUM(VM.sanctioned_post)-SUM(VM.inposition_post) 'VAC'");
        $this->db->from('ci_regions HQ');
        $this->db->join('ci_vacancy_master VM','HQ.`code`= VM.`code`','Left');
        $this->db->where('HQ.type=',4); // KVS ZT POSITION DATA
        $this->db->where('HQ.status=',1); // KVS RO POSITION DATA
        $this->db->group_by("HQ.`code`");
        $this->db->order_by("HQ.`name`");
        $qry=$this->db->get();
        if($qry->num_rows())
        {
            return $qry->result();
        }else{
            return array();
        }
    }
   
}
