<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Autocomplete_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function fetch_data($query) {
        $this->db->like('name', $query);
        $this->db->where('active',1);
        $query = $this->db->get('designations');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'name' => $row["name"],
                 );
            }
            echo json_encode($output);
        }
        else{
            echo 0;
        }
    }
    function fetch_pre_data($query) {
        $this->db->like('name', $query);
        $this->db->where('active',1);
        if($this->role_category==9){
            $this->db->where('e1', 1);
        }
        if($this->role_category==10){
            $this->db->where('e2', 1);
        }
        $query = $this->db->get('designations');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'name' => $row["name"],
                 );
            }
            echo json_encode($output);
        }
        else{
            echo 0;
        }
    }
    function fetchPreDesignationList($designation,$cat=null) {
        if ($designation != '') {
            $this->db->select('*');
            $this->db->where('name', $designation);
            if($cat!==null){
                $this->db->where('cat_id=', $cat);
            }
            if($this->role_category==9){
                $this->db->where('e1', 1);
            }
            if($this->role_category==10){
                $this->db->where('e2', 1);
            }
            $this->db->where('active',1);
            $query = $this->db->get('designations');
            $designations = array();
            if ($query->result()) {
                foreach ($query->result() as $value) {
                    $designations[$value->id] = $value->name;
                }
                return $designations;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    function fetchDesignationList($designation,$cat=null) {
        if ($designation != '') {
            $this->db->select('*');
            $this->db->where('name', $designation);
            if($cat!==null){
                $this->db->where('cat_id=', $cat);
            }
            $this->db->where('active',1);
            $query = $this->db->get('designations');
            $designations = array();
            if ($query->result()) {
                foreach ($query->result() as $value) {
                    $designations[$value->id] = $value->name;
                }
                return $designations;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
