<?php
if (!defined('BASEPATH')) { exit ('No direct script access allowed'); }

class Assessment_model extends CI_model {
    public function construct() {
        parent::__construct();
		 $this->load->database('second', TRUE);
    }
    
   public function RefinedListKV() {
       $fillR= $this->input->post('RO_ID'); 
       $this->db->select("K.`name_of_kv` 'NME'",false); 
        $this->db->from('ci_students K');
        if(!empty($fillR)){  
            $this->db->where('K.region_id',$fillR); 
        }
		$this->db->group_by('NME');
        $qry=$this->db->get(); 
		if($qry->num_rows()){
            $data=$qry->result();
        }else{
            $data=array();
        }
        return json_encode($data);
   }
   
   public function FindStuKV() {
       $fillR= $this->input->post('KV_ID'); 
       $this->db->select("K.`name` 'NME'",false); 
        $this->db->from('ci_students K');
        if(!empty($fillR)){  
            $this->db->where('K.name_of_kv',$fillR); 
        }
		$this->db->group_by('NME');
        $qry=$this->db->get(); 
		if($qry->num_rows()){
            $data=$qry->result();
        }else{
            $data=array();
        }
        return json_encode($data);
   }
    
   /* public function KvDetails($KvId = null) { 
        $this->db->select("*",false);
        $this->db->from('kvs_survey.ci_students K');         
        $this->db->where('K.name_of_kv',$KvId);   
        $qry=$this->db->get(); 
        if($qry->num_rows()){
            return $data=$qry->result();
        }else{
            return $data=array();
        }
    }*/
	public function KvDetails($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    { 
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('ci_students');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        
        $this->db->select("SQL_CALC_FOUND_ROWS *,
                            DATE_FORMAT(S.created_on,'%d-%m-%Y %H:%i:%s') created_on",false);
        $this->db->from('ci_students S');  
         
        /*============filter for report=======================================  */ 
        $this->db->where('S.name_of_kv',$post_data['KV_ID']);  
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
       $this->db->order_by($col, $dir); 
        if($search && !empty($search)) {  
			$this->db->where("CONCAT(S.name,S.email) LIKE '%$search%' ");
        }
        $qry=$this->db->get();  
		//echo $this->db->last_query(); die;
		if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
	public function KvDupDetails($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null) {
		if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('ci_students');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        
        $this->db->select("*,COUNT(*) as CNT",false);
        $this->db->from('ci_students S');  
         
        /*============filter for report=======================================  */ 
        $this->db->where('S.name_of_kv',$post_data['KV_ID']);  
        if($limit > 0){
            $this->db->limit($limit,$start);
        } 
        if($search && !empty($search)) {  
			$this->db->where("CONCAT(S.name,S.email) LIKE '%$search%' ");
        }
		 $this->db->group_by($post_data['column']);
		 $this->db->having("CNT  > 1", null, false);
		 
        $qry=$this->db->get();  
		//echo $this->db->last_query(); die;
		if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;		
    }
	
	 public function student_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("ci_students");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	  public function get_student_by_id($id) {
        $this->db->select('*,s.name as stu_name,R.`name` as region_name');
        $this->db->from('ci_students s'); 		
        $this->db->join('ci_regions R','s.region_id=R.id','Left');
        $this->db->where('s.id', $id);
        return $this->db->get()->row();
    }
	
	 public function add_student($post_data, $id) {
		
		$post_data['sibling_class']=implode(', ', $post_data['sibling_class']);
		$post_data['type_of_gadgets']=implode(', ', $post_data['type_of_gadgets']);
		//echo "<pre>"; print_r($post_data); die;
        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $this->db->where('id', $id);
            $qry = $this->db->update('ci_students', $post_data);
            if ($qry) {
                $response['status'] = 'success';
               // add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Assessment Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['created_on'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('ci_students', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                //add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Assessment Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }
	
	public function update_middle_term($post_data, $id) { 
        if (!empty($id) && !empty($id)) {
            $dataArray=array(
				'oral_language_eng_mid_term'	=> $post_data['oral_language_eng_mid_term'],
				'write_language_eng_mid_term'	=> $post_data['write_language_eng_mid_term'],
				'read_language_eng_mid_term'	=> $post_data['read_language_eng_mid_term'],
				'is_numeracy_skills_mid_term'	=> $post_data['is_numeracy_skills_mid_term'],
				'oral_language_hindi_mid_term'	=> $post_data['oral_language_hindi_mid_term'],
				'write_language_hindi_mid_term'	=> $post_data['write_language_hindi_mid_term'],
				'read_language_hindi_mid_term'	=> $post_data['read_language_hindi_mid_term'],
				);
            $this->db->where('id', $id);
            $qry = $this->db->update('ci_students', $dataArray);
            if ($qry) {
                $response['status'] = 'success';
                //add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Assessment Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured'; 
            }
            return $response;
        }
    }
}
