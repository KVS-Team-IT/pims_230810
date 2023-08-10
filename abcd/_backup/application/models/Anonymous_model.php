<?php
if (!defined('BASEPATH')) { exit ('No direct script access allowed'); }

class Anonymous_model extends CI_model {
    public function construct() {
        parent::__construct();
    }
    /*
    public function RefinedKV() {
        //$fillQ= $this->input->post(null, true);
        $fillR= $this->input->post('RO_ID');
        $fillS= $this->input->post('ST_ID');
        $this->db->select(" 
        R.`name` 'REG',S.state_name 'STA',K.kv_code 'KOD',K.`code` 'COD', K.`name` 'NME',
        (CASE WHEN K.shift=0 THEN 'NA' WHEN K.shift=1 THEN 'FIRST' WHEN K.shift=2 THEN 'SECOND' ELSE 'NA' END) 'SFT',
        K.sector 'SEC',K.location 'LOC'",false);
        $this->db->from('ci_pims_master K');
        $this->db->join('ci_regions R','K.region_id=R.id','Left');
        $this->db->join('ci_states S','K.state_id=S.state_id','Left');
        if(!empty($fillR)){  
            $this->db->where('K.region_id',$fillR); 
            
        }
        if(!empty($fillS)){  
            $this->db->where('K.state_id',$fillS);
        }
	$this->db->where('K.status',1);
        $qry=$this->db->get();
        //$lq=$this->db->last_query();
	if($qry->num_rows()){
            $data=$qry->result();
        }else{
            $data=array();
        }
        return json_encode($data);
        
    }
    */
   public function RefinedListKV() {
       $fillR= $this->input->post('RO_ID');
       $fillS= $this->input->post('ST_ID');
       $this->db->select("K.`code` 'COD', K.`name` 'NME'",false);
        //$this->db->from('ci_pims_master K');
        $this->db->from('ci_schools K');
        if(!empty($fillR)){  
            $this->db->where('K.region_id',$fillR); 
        }
        if(!empty($fillS)){  
            $this->db->where('K.state_id',$fillS);
        }
		$this->db->where('K.status',1);
        $qry=$this->db->get();
        //$lq=$this->db->last_query();
	if($qry->num_rows()){
            $data=$qry->result();
        }else{
            $data=array();
        }
        return json_encode($data);
   }
    public function KvProfile($KvId = null) {
        $this->db->select(" 
        R.`name` 'REG',S.state_name 'STA',K.kv_code 'KOD',K.`code` 'COD', K.`name` 'NME',
        (CASE WHEN K.shift=0 THEN 'NA' WHEN K.shift=1 THEN 'FIRST' WHEN K.shift=2 THEN 'SECOND' ELSE 'NA' END) 'SFT',
        K.sector 'SEC',K.location 'LOC'",false);
        //$this->db->from('ci_pims_master K');
        $this->db->from('ci_schools K');
        $this->db->join('ci_regions R','K.region_id=R.id','Left');
        $this->db->join('ci_states S','K.state_id=S.state_id','Left');
        $this->db->where('K.code',$KvId); 
		//echo $this->db->last_query();die('kkk');
        return $this->db->get()->row();
    }
    public function KvDetails($KvId = null) {
        $this->db->select(" 
        C.`name` 'CLS',K.section 'SEC',K.class_strength 'AVL',K.class_strength_onroll 'PRE',K.classroom_length 'LEN',K.classroom_width 'WTH',
        DATE_FORMAT(K.updated_on,'%d-%m-%Y') 'UPD'",false);
        $this->db->from('ci_schools_strength K');
        
        $this->db->join('ci_classes C','K.class=C.id','Left');
        $this->db->where('K.code',$KvId); 
        $this->db->where('K.status',1); 
		$this->db->group_by('C.`name`');
		$this->db->order_by('K.class', 'ASC');
        $qry=$this->db->get();
		
        if($qry->num_rows()){
			
            return $data=$qry->result();
        }else{
            return $data=array();
        }
    }
	public function exportAllData() {
        /*$data = $this->db->query("SELECT ci_regions.name as regionname, ci_schools.name as schname, ci_schools.kv_code as kVCODE,
 DATE_FORMAT(K.updated_on, '%d-%m-%Y') 'UPD' FROM `ci_schools_strength` `K` LEFT JOIN `ci_classes` `C` ON `K`.`class`=`C`.`id`
 left join ci_schools on ci_schools.kv_code=`K`.`code` left join ci_regions on ci_regions.id =ci_schools.region_id  WHERE `K`.`code`in(select kv_code from ci_schools where region_id in (16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,
 31,32,34,35,36,37,38,39,40,41
 ) ) AND `K`.`status` = 1  group by ci_schools.name ORDER BY ci_regions.name ASC "); */
 
 $data = $this->db->query("SELECT cr.name region_name ,sc.name school ,K.code,DATE_FORMAT(K.updated_on,'%d-%m-%Y') 'UPD' FROM ci_schools_strength K 
LEFT JOIN ci_classes C ON K.class=C.id 
LEFT JOIN ci_schools sc ON sc.code = K.code
LEFT JOIN ci_regions cr ON cr.id = sc.region_id
WHERE K.status=1 and sc.name!='' GROUP BY K.code ORDER BY K.updated_on "); 
		return $data->result();
    }
}
