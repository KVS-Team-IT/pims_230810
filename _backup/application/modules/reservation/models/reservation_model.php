<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Reservation_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    
    //========================================= LPC DATA =================================//
    public function get_emp($Postdata){
        $this->db->select('S.*,E.emp_name as name,E.emp_category,C.name as category,Su.name as subject');
        $this->db->from('ci_present_service_details S');
        $this->db->join('ci_employee_details E', 'S.emp_id=E.emp_code', 'INNER');
        $this->db->join('ci_category C', 'E.emp_category=C.id', 'LEFT');
        //$this->db->join('ci_designations D', 'S.present_designationid=D.id', 'LEFT');
        $this->db->join('ci_subjects Su', 'S.present_subject=Su.id', 'LEFT');
        $this->db->where('present_designationid=', $Postdata['present_designation']);
        $this->db->where('present_appointed_term', $Postdata['method_recruitment']);
        if($Postdata['present_subject'])
            $this->db->where('present_subject', $Postdata['present_subject']);
        $query=$this->db->get();
        //show($this->db->last_query());
        return $query->result();
    }

    public function get_desig($Postdata){
        $this->db->select('D.name as designation');
        $this->db->from('ci_designations D');
        $this->db->where('id=', $Postdata['present_designation']);
        $query=$this->db->get();
        //show($this->db->last_query());
        return $query->row();
    }

    // public function get_emp_sc($Postdata){
    //     $this->db->select('*');
    //     $this->db->from('ci_present_service_details E');
        
    //     $this->db->where('present_designationid=', $Postdata['present_designationid']);
    //     $this->db->where('present_appointed_term', $Postdata['method_recruitment']);
    //     $this->db->where('present_category', 2);
    //     if($Postdata['present_subject'])
    //         $this->db->where('present_subject', $Postdata['present_subject']);
    //     $query=$this->db->get();
    //     //show($this->db->last_query());
    //     return $query->result();
    // }
    // public function get_emp_st($Postdata){
    //     $this->db->select('*');
    //     $this->db->from('ci_present_service_details S');
    //     $this->db->where('present_designationid=', $Postdata['present_designationid']);
    //     $this->db->where('present_appointed_term', $Postdata['method_recruitment']);
    //     $this->db->where('present_category', 3);
    //     if($Postdata['present_subject'])
    //         $this->db->where('present_subject', $Postdata['present_subject']);
    //     $query=$this->db->get();
    //     //show($this->db->last_query());
    //     return $query->result();
    // }
    // public function get_emp_obc($Postdata){
    //     $this->db->select('*');
    //     $this->db->from('ci_present_service_details E');
        
    //     $this->db->where('present_designationid=', $Postdata['present_designationid']);
    //     $this->db->where('present_appointed_term', $Postdata['method_recruitment']);
    //     $this->db->where('present_category', 4);
    //     if($Postdata['present_subject'])
    //         $this->db->where('present_subject', $Postdata['present_subject']);
    //     $query=$this->db->get();
    //     //show($this->db->last_query());
    //     return $query->result();
    // }
   
}
