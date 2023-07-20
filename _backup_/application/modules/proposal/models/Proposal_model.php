<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Proposal_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    public function get_school_by_id($id) {
        
    //=====================================================================//
        $this->db->select("`code`,year_of_establish,upto_class,
            (CASE WHEN SUM(stream_sci)>0 THEN 1 ELSE 0 END) kvs_str_sci,
            (CASE WHEN SUM(stream_com)>0 THEN 1 ELSE 0 END) kvs_str_com,
            (CASE WHEN SUM(stream_hum)>0 THEN 1 ELSE 0 END) kvs_str_hum")->from('ci_school_master_kvs');
        $this->db->group_by("code"); 
        $VacQuery =  $this->db->get_compiled_select();
    //====================================================================//    
        
    $this->db->select("S.id,S.kv_code,S.`code`,S.`name`,S.email,S.udise_code,S.region_id,S.zone_id,
    (CASE WHEN S.shift=2 THEN 2 ELSE 1 END) shift,S.class_rooms,S.sector,S.station_id,S.station_type,S.year_of_establish,
    K.year_of_establish kvs_year_of_establish,S.cbse_approval_code,S.building_type,S.infra_type,S.kv_upto_class,
    K.upto_class kvs_upto_class,S.kv_upto_section,
    S.kv_str_sci,S.kv_str_com,S.kv_str_hum,K.kvs_str_sci,K.kvs_str_com,K.kvs_str_hum,
    S.ccea_upto_class,S.ccea_upto_section,
    S.ccea_str_sci,S.ccea_str_com,S.ccea_str_hum,S.ccea_teach_post,S.ccea_nonteach_post");
    $this->db->from('ci_schools S');
    $this->db->join('( '.$VacQuery. ') K','S.`code`=K.`code`','Left');
    $this->db->where('S.id', $id);
    $this->db->where('S.status', 1);
    return $this->db->get()->row();
        //$this->db->get()->row();
        //show($this->db->last_query());
    }

    public function add_sectionproposal($post_data) {

        $this -> db -> where('school', $post_data['id']);
        $this -> db -> delete('ci_section_proposal');
        //add_user_activity($this->session->userdata('user_id'),$ids, 'Delete', 'Deleted Leave Data','Employee Module');
        $UpdData['class_rooms'] = $post_data['classroom'];
        $this->db->where('id=', $post_data['id']);
        $this->db->update('schools', $UpdData);

        foreach ($post_data['class'] as $key => $value)
        {   
            
            $sectionData = array(
                'region' => $this->session->userdata('region_id'),
                'school' => $post_data['id'],
                'classroom' => $post_data['classroom'],
                'class' => $value,
                'present_enroll' => $post_data['present_enroll'][$key] ,
                'expected_enroll'   => $post_data['expected_enroll'][$key], 
                'previous_section'   => $post_data['previous_section'][$key], 
                'proposed_section'   => $post_data['proposed_section'][$key],
                'chairman_approval'   => $post_data['chairman_approval'][$key]
            );
           // echo '<pre>';print_r($sectionData);die;
            if($this->db->insert(' ci_section_proposal', $sectionData)) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }

    public function getSectionData($id = NULL){
        $this->db->select('L.*');
        $this->db->from('ci_section_proposal as L');
        if(!empty($id)){
            $this->db->where('L.school', $id);
        }
        return $this->db->get()->result();                    
    }

    public function getRegionSectionData($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        $reg_id = $this->session->userdata('region_id');
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(*) as total');
            $this->db->from('ci_section_proposal as S');
            $this->db->join('ci_schools C','S.school=C.id');
            $this->db->where('S.region',$reg_id);
            $this->db->group_by('C.id');
            $qry = $this->db->get();
            //echo $this->db->last_query(); die;
            return $qry->row()->total;
            
        }
        $this->db->select("SQL_CALC_FOUND_ROWS S.*,C.*",false);
        $this->db->from('ci_section_proposal as S');
        $this->db->join('ci_schools C','S.school=C.id');
        $this->db->where('S.region',$reg_id);
        $this->db->group_by('C.id');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(C.name) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(C.code) LIKE '%$search%' ");
        }
        
        $qry = $this->db->get();
       

        if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        //pr($data['count']);
        return $data;
    }
    
    public function add_dcsection($post_data) {
        //print_r($post_data); die;

        foreach ($post_data['ids'] as $key => $value)
        {   
            
            $sectionData = array(
                'dc_section'   => $post_data['dc_section'][$key], 
                'dc_status'   => $post_data['dc_status'][$key],
                'dc_remark'   => $post_data['dc_remark'][$key]
            );
            $this->db->where('id',$value);
            $qry = $this->db->update('ci_section_proposal', $sectionData);
            //show($this->db->last_query());
            if($qry) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }
   
    public function getHqSectionData($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null)
    {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(*) as total');
            $this->db->from('ci_section_proposal as S');
            $this->db->join('ci_schools C','S.school=C.id');
            $this->db->join('ci_regions R','S.region=R.id');
            //$this->db->where('S.region',$reg_id);
            $this->db->group_by('C.id');
            $qry = $this->db->get();
            //echo $this->db->last_query(); die;
            return $qry->row()->total;
            
        }
        $this->db->select("SQL_CALC_FOUND_ROWS S.*,C.*,R.name as rname",false);
        $this->db->from('ci_section_proposal as S');
        $this->db->join('ci_schools C','S.school=C.id');
        $this->db->join('ci_regions R','S.region=R.id');
        //$this->db->where('S.region',$reg_id);
        $this->db->group_by('C.id');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(C.name) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(C.code) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(R.name) LIKE '%$search%' ");
        }
        
        $qry = $this->db->get();
        //echo $this->db->last_query(); die;  

        if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        //pr($data['count']);
        return $data;
    }

    public function add_hqsection($post_data) {
        //print_r($post_data); die;

        foreach ($post_data['ids'] as $key => $value)
        {   
            
            $sectionData = array(
                'hq_section'   => $post_data['hq_section'][$key], 
                'hq_status'   => $post_data['hq_status'][$key],
                'hq_remark'   => $post_data['hq_remark'][$key]
            );
            $this->db->where('id',$value);
            $qry = $this->db->update('ci_section_proposal', $sectionData);
            //show($this->db->last_query());
            if($qry) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }

    public function add_postproposal($post_data) {

        $this -> db -> where('school', $post_data['id']);
        $this -> db -> delete('ci_post_proposal');
        //add_user_activity($this->session->userdata('user_id'),$ids, 'Delete', 'Deleted Leave Data','Employee Module');

        foreach ($post_data['category'] as $key => $value)
        {   
            
            $sectionData = array(
                'region' => $this->session->userdata('region_id'),
                'school' => $post_data['id'],
                'category' => $value,
                'designation' => $post_data['designation'][$key] ,
                'subject'   => $post_data['subject'][$key], 
                'previous_post'   => $post_data['previous_post'][$key], 
                'proposed_post'   => $post_data['proposed_post'][$key],
                'chairman_approval'   => $post_data['chairman_approval'][$key]
            );
            //echo '<pre>';print_r($sectionData);die;
            if($this->db->insert(' ci_post_proposal', $sectionData)) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }

    public function getPostData($id = NULL){
        $this->db->select('L.*');
        $this->db->from('ci_post_proposal as L');
        if(!empty($id)){
            $this->db->where('L.school', $id);
        }
        return $this->db->get()->result();                    
    }

    public function getRegionPostData($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        $reg_id = $this->session->userdata('region_id');
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(*) as total');
            $this->db->from('ci_post_proposal as S');
            $this->db->join('ci_schools C','S.school=C.id');
            $this->db->where('S.region',$reg_id);
            $this->db->group_by('C.id');
            $qry = $this->db->get();
            //echo $this->db->last_query(); die;
            return $qry->row()->total;
            
        }
        $this->db->select("SQL_CALC_FOUND_ROWS S.*,C.*",false);
        $this->db->from('ci_post_proposal as S');
        $this->db->join('ci_schools C','S.school=C.id');
        $this->db->where('S.region',$reg_id);
        $this->db->group_by('C.id');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(C.name) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(C.code) LIKE '%$search%' ");
        }
        
        $qry = $this->db->get();
       

        if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        //pr($data['count']);
        return $data;
    }

    public function add_dcpost($post_data) {
        //print_r($post_data); die;

        foreach ($post_data['ids'] as $key => $value)
        {   
            
            $sectionData = array(
                'dc_post'   => $post_data['dc_post'][$key], 
                'dc_status'   => $post_data['dc_status'][$key],
                'dc_remark'   => $post_data['dc_remark'][$key]
            );
            $this->db->where('id',$value);
            $qry = $this->db->update('ci_post_proposal', $sectionData);
            //show($this->db->last_query());
            if($qry) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }

    public function getHqPostData($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null)
    {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(*) as total');
            $this->db->from('ci_post_proposal as S');
            $this->db->join('ci_schools C','S.school=C.id');
            $this->db->join('ci_regions R','S.region=R.id');
            //$this->db->where('S.region',$reg_id);
            $this->db->group_by('C.id');
            $qry = $this->db->get();
            //echo $this->db->last_query(); die;
            return $qry->row()->total;
            
        }
        $this->db->select("SQL_CALC_FOUND_ROWS S.*,C.*,R.name as rname",false);
        $this->db->from('ci_post_proposal as S');
        $this->db->join('ci_schools C','S.school=C.id');
        $this->db->join('ci_regions R','S.region=R.id');
        //$this->db->where('S.region',$reg_id);
        $this->db->group_by('C.id');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(C.name) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(C.code) LIKE '%$search%' ");
            $this->db->or_where("CONCAT(R.name) LIKE '%$search%' ");
        }
        
        $qry = $this->db->get();
        //echo $this->db->last_query(); die;  

        if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        //pr($data['count']);
        return $data;
    }

    public function add_hqpost($post_data) {
        //print_r($post_data); die;

        foreach ($post_data['ids'] as $key => $value)
        {   
            
            $sectionData = array(
                'hq_post'   => $post_data['hq_post'][$key], 
                'hq_status'   => $post_data['hq_status'][$key],
                'hq_remark'   => $post_data['hq_remark'][$key]
            );
            $this->db->where('id',$value);
            $qry = $this->db->update('ci_post_proposal', $sectionData);
            //show($this->db->last_query());
            if($qry) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }
    
}
