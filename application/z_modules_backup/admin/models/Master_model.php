<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
      function for getting all users listing with searching and ordering
     */

    public function get_all_designation_category_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('designation_category');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS dc.*", false);
        $this->db->from('designation_category dc');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(dc.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function get_all_designation_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('designations');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS d.*,dc.name as category_name", false);
        $this->db->from('designations d');
        $this->db->join('designation_category dc', 'd.cat_id=dc.id', 'LEFT');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(d.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function get_designation_by_id($id) {
        $this->db->select('d.id as designation_id, d.name as designation_name, dc.id as category_id, dc.name as category_name ,d.zt,d.ro,d.kv,d.hq');
        $this->db->from('designations d');
        $this->db->join('designation_category dc', 'd.cat_id=dc.id', 'LEFT');
        $this->db->where('d.id', $id);
        return $this->db->get()->row();
    }

    public function get_designation_category_by_id($id) {
        $this->db->select('*');
        $this->db->from('designation_category');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function designation_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("designations");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function designation_category_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("designation_category");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_designation($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $this->db->where('id', $id);
            $qry = $this->db->update('designations', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Designation Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('designations', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Designation Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function add_designation_category($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $this->db->where('id', $id);
            $qry = $this->db->update('designation_category', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Designation Category Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('designation_category', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Designation Category Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    /*
      function for getting all users listing with searching and ordering
     */

    public function get_all_category_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('category');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*", false);
        $this->db->from('category rl');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function get_category_by_id($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function category_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("category");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_category($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $this->db->where('id', $id);
            $qry = $this->db->update('category', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Category Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('category', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Category Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function get_all_region_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        $arr=array(2,3,5);
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('regions');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
    
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*,z.name as zone", false);
        $this->db->from('regions rl');
        $this->db->join('regions z', 'z.id=rl.parent', 'LEFT');
        $this->db->where_in('rl.type', $arr);
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }
        
        $qry = $this->db->get();
        //show($this->db->last_query());
        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function add_region($post_data, $id) {
        if (!empty($id) && is_numeric($id)) {
            $string= explode('_', $post_data['region_type']);
            $label=$string[0];
            $type=$string[1];
            $insert_data['name'] = $post_data['name'];
            $insert_data['code'] = $post_data['code'];
            $insert_data['website'] = $post_data['website'];
            $insert_data['email'] = $post_data['email'];
            $insert_data['type'] = $type;
            $insert_data['label'] = $label;
            $insert_data['parent'] = $post_data['zone'];
            $insert_data['status'] = 1;
            unset($post_data['region_type']);
            $this->db->where('id=', $post_data['id']);
            $qry = $this->db->update('regions', $insert_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, '','Updated', json_encode($insert_data), 'Region Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            
            $string= explode('_', $post_data['region_type']);
            $label=$string[0];
            $type=$string[1];
            $insert_data['name'] = $post_data['name'];
            $insert_data['code'] = $post_data['code'];
            $insert_data['website'] = $post_data['website'];
            $insert_data['email'] = $post_data['email'];
            $insert_data['type'] = $type;
            $insert_data['label'] = $label;
            $insert_data['parent'] = $post_data['zone'];
            $insert_data['created'] = date("Y-m-d H:i:s");
            $insert_data['status'] = 1;
            unset($post_data['region_type']);
            $qry = $this->db->insert('regions', $insert_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id,'', 'Added', json_encode($insert_data), 'Region Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function get_region_by_id($id) {
        $this->db->select('r.*,r.parent as zone,concat(r.label,"_",r.type) as region_type,z.name as zonename');
        $this->db->from('regions r');
        $this->db->join('regions z', 'z.id=r.parent', 'LEFT');
        $this->db->where('r.id', $id);
        return $this->db->get()->row();
    }

    public function region_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("regions");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_school_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('schools');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS s.*,r.name as region_name,z.name as zone_name,(CASE WHEN s.station_type='0' THEN 'NA' ELSE s.station_type END) AS station_name", false);
        $this->db->from('schools s');
        $this->db->join('regions r', 'r.id=s.region_id', 'LEFT');
        $this->db->join('regions z', 'z.id=s.zone_id', 'LEFT');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(s.name,s.code,s.station_type,r.name,z.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();
        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function add_school($post_data, $id) {
		//show($post_data);
        if($post_data['shift']==2){
            $code=$post_data['kv_code'].'02';
        }else{
            $code=$post_data['kv_code'];
        }

        if (!empty($id) && is_numeric($id)) {
            
            $UpdData['name'] = $post_data['name'];
            $UpdData['kv_code'] = $post_data['kv_code'];
            $UpdData['code'] = $code;
            $UpdData['region_id'] = $post_data['region_id'];
            $UpdData['zone_id'] = $post_data['zone_id'];
            $UpdData['station_id'] = $post_data['station_id'];
            $UpdData['station_type'] = $post_data['station_type'];
            $UpdData['sector'] = $post_data['sector'];
            $UpdData['email'] = $post_data['email'];
            $UpdData['kv_upto_class'] = $post_data['kv_upto_class'];
            $UpdData['kv_upto_section'] = $post_data['kv_upto_section'];
            $UpdData['shift'] = $post_data['shift'];
            $UpdData['year_of_establish'] = $post_data['year_of_establish'];
            $UpdData['building_type'] = $post_data['building_type'];
            $UpdData['infra_type'] = $post_data['infra_type'];
            $UpdData['ccea_upto_section'] = $post_data['ccea_upto_section'];
            $UpdData['ccea_upto_class'] = $post_data['ccea_upto_class'];
            $UpdData['ccea_str_sci'] = $post_data['ccea_str_sci'];
            $UpdData['ccea_str_com'] = $post_data['ccea_str_com'];
            $UpdData['ccea_str_hum'] = $post_data['ccea_str_hum'];
            $UpdData['udise_code'] = $post_data['udise_code'];
            $UpdData['ccea_teach_post'] = $post_data['ccea_teach_post'];
            $UpdData['ccea_nonteach_post'] = $post_data['ccea_nonteach_post'];
            //$UpdData['total_post'] = $post_data['total_post'];
            $UpdData['kv_str_sci'] = $post_data['kv_str_sci'];
            $UpdData['kv_str_com'] = $post_data['kv_str_com'];
            $UpdData['kv_str_hum'] = $post_data['kv_str_hum'];
            $UpdData['class_rooms'] = $post_data['class_rooms'];
			//new changes according to Rinku Mam on 9-9-2022
			$UpdData['is_identified_gifted_child'] = $post_data['is_identified_gifted_child'];
			$UpdData['is_under_ebsb'] = $post_data['is_under_ebsb'];
			$UpdData['is_electric_facility'] = $post_data['is_electric_facility'];
			$UpdData['is_girls_toilet'] = $post_data['is_girls_toilet'];
			$UpdData['is_boys_toilet'] = $post_data['is_boys_toilet'];
			$UpdData['is_computer_for_ped'] = $post_data['is_computer_for_ped'];
			$UpdData['is_net_for_ped'] = $post_data['is_net_for_ped'];
			$UpdData['is_cwsn_toilet'] = $post_data['is_cwsn_toilet'];
			$UpdData['is_handwash_fac'] = $post_data['is_handwash_fac'];
			$UpdData['is_rw_harvesting'] = $post_data['is_rw_harvesting'];
			$UpdData['is_kitchen_garden'] = $post_data['is_kitchen_garden'];
			$UpdData['is_echo_club'] = $post_data['is_echo_club'];
			$UpdData['is_youth_club'] = $post_data['is_youth_club'];
			$UpdData['is_smart_class'] = $post_data['is_smart_class'];
			$UpdData['is_ict_lab'] = $post_data['is_ict_lab'];
			$UpdData['st_app_10_borad'] = $post_data['st_app_10_borad'];
			$UpdData['st_pass_10_borad'] = $post_data['st_pass_10_borad'];
			$UpdData['st_app_12_borad'] = $post_data['st_app_12_borad'];
			$UpdData['st_pass_12_borad'] = $post_data['st_pass_12_borad'];
            $UpdData['status'] = 1;
            
            $this->db->where('id=', $post_data['id']);
            if ($this->db->update('schools', $UpdData)) {
                $response['status'] = 'success';
                //add_user_activity($this->auth_user_id,'', 'Updated', json_encode($post_data), 'School Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
				
            }
            return $response;
        } else {
			unset($post_data['total_post']);
            $UpdData['name'] = $post_data['name'];
            $UpdData['kv_code'] = $post_data['kv_code'];
			if($post_data['shift']==2){
				$code=$post_data['kv_code'].'02';
			}else{
				$code=$post_data['kv_code'];
			}
            $UpdData['code'] = $code;
            $UpdData['region_id'] = $post_data['region_id'];
            $UpdData['zone_id'] = $post_data['zone_id'];
            $UpdData['station_id'] = $post_data['station_id'];
            $UpdData['station_type'] = $post_data['station_type'];
            $UpdData['sector'] = $post_data['sector'];
            $UpdData['email'] = $post_data['email'];
            $UpdData['kv_upto_class'] = $post_data['kv_upto_class'];
            $UpdData['kv_upto_section'] = $post_data['kv_upto_section'];
            $UpdData['shift'] = $post_data['shift'];
            $UpdData['year_of_establish'] = $post_data['year_of_establish'];
            $UpdData['building_type'] = $post_data['building_type'];
            $UpdData['infra_type'] = $post_data['infra_type'];
            $UpdData['ccea_upto_section'] = $post_data['ccea_upto_section'];
            $UpdData['ccea_upto_class'] = $post_data['ccea_upto_class'];
            $UpdData['ccea_str_sci'] = $post_data['ccea_str_sci'];
            $UpdData['ccea_str_com'] = $post_data['ccea_str_com'];
            $UpdData['ccea_str_hum'] = $post_data['ccea_str_hum'];
            $UpdData['udise_code'] = $post_data['udise_code'];
            $UpdData['ccea_teach_post'] = $post_data['ccea_teach_post'];
            $UpdData['ccea_nonteach_post'] = $post_data['ccea_nonteach_post'];
            //$UpdData['total_post'] = $post_data['total_post'];
            $UpdData['kv_str_sci'] = $post_data['kv_str_sci'];
            $UpdData['kv_str_com'] = $post_data['kv_str_com'];
            $UpdData['kv_str_hum'] = $post_data['kv_str_hum'];
            $UpdData['class_rooms'] = $post_data['class_rooms'];
            $UpdData['status'] = 1;
            
            $qry = $this->db->insert('schools', $UpdData);
			//echo $this->db->last_query();die('kkk');
            if ($qry) {
                $response['status'] = 'success';
                //add_user_activity($this->auth_user_id,'', 'Added', json_encode($post_data), 'School Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function get_school_by_id($id) {
        $this->db->select('s.*,r.id as regid,r.name as regionname,z.name as zone_name,(CASE WHEN s.station_type="0" THEN "NA" ELSE s.station_type END) AS station_name');
        $this->db->from('schools as s');
        $this->db->join('regions as r', 'r.id=s.region_id');
        $this->db->join('regions z', 'z.id=s.zone_id', 'LEFT');
        $this->db->where('s.id', $id);
        return $this->db->get()->row();
    }

    public function school_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("schools");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_subject_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('subjects');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*", false);
        $this->db->from('subjects rl');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function get_subject_by_id($id) {
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function subject_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("subjects");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_subject($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $post_data['status'] = 1;
            $this->db->where('id', $id);
            $qry = $this->db->update('subjects', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Subject Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['status'] = 1;
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('subjects', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Subject Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function get_all_qualification_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('qualification');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*", false);
        $this->db->from('qualification rl');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function get_qualification_by_id($id) {
        $this->db->select('*');
        $this->db->from('qualification');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function qualification_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("qualification");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function promotion_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("promotions");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_promotion_by_id($id) {
        $this->db->select('*');
        $this->db->from('promotions');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function add_promotion($post_data, $id) {
        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            //$post_data['status'] = 1;
            $this->db->where('id', $id);
            $qry = $this->db->update('promotions', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Promotion Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            //$post_data['status'] = 1;
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('promotions', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Promotion Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    public function add_qualification($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['name'] = $post_data['name'];
            $post_data['status'] = 1;
            $this->db->where('id', $id);
            $qry = $this->db->update('qualification', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Qualification Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['name'] = $post_data['name'];
            $post_data['status'] = 1;
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('qualification', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Qualification Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    /*
      function for getting all users listing with searching and ordering
     */

    public function get_all_promotion_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('promotions');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*", false);
        $this->db->from('promotions rl');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }

        $qry = $this->db->get();

        if ($qry->num_rows()) {
            $data['result'] = $qry->result();
        } else {
            $data['result'] = array();
        }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;
        return $data;
    }

    public function add_range($post_data, $id) {

        if (!empty($id) && !empty($id)) {
            $post_data['level_name'] = $post_data['level_name'];
            $post_data['range_from'] = $post_data['range_from'];
            $post_data['range_to'] = $post_data['range_to'];
            $post_data['status'] = 1;
            $this->db->where('id', $id);
            $qry = $this->db->update('level_range', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Updated', json_encode($post_data), 'Range Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        } else {
            $post_data['level_name'] = $post_data['level_name'];
            $post_data['range_from'] = $post_data['range_from'];
            $post_data['range_to'] = $post_data['range_to'];
            $post_data['status'] = 1;
            $post_data['created'] = date("Y-m-d H:i:s");
            $qry = $this->db->insert('level_range', $post_data);
            if ($qry) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, 'Added', json_encode($post_data), 'Range Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }

    /*
      function for getting all users listing with searching and ordering
     */

    public function get_all_range_list_json($limit = null, $start = null, $col = null, $dir = null, $search = null, $post_data = null) {
        if (func_num_args() == 0) {//this is used for getting total number of records
            $this->db->select('count(id) as total');
            $this->db->from('ci_level_range');
            $qry = $this->db->get();
            return $qry->row()->total;
        }
        
        $this->db->select("SQL_CALC_FOUND_ROWS L.id,L.level_name,L.range_from,L.range_to,L.status", false);
        $this->db->from('level_range L');
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }
        if ($col) {
            $this->db->order_by($col, $dir);
        }
        if ($search && !empty($search)) {
            $this->db->where("CONCAT(L.level_name) LIKE '%$search%' ");
        }
        $x=$this->db->last_query();
        $qry = $this->db->get();

            if ($qry->num_rows()) {
                $data['result'] = $qry->result();
            } else {
                $data['result'] = array();
            }

        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
        $data['count'] = isset($total->row()->count) ? $total->row()->count : 0;

        return $data;
    }

    public function level_is_exists($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("level_range");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_range_by_id($id) {
        $this->db->select('*');
        $this->db->from('level_range');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function add_schoolhistory($post_data) {
        $this -> db -> where('school_id', $post_data['id']);
        $this -> db -> delete('ci_schools_history');
        //add_user_activity($this->session->userdata('user_id'),$ids, 'Delete', 'Deleted Leave Data','Employee Module');
        foreach ($post_data['class'] as $key => $value)
        {   
            
            $historyData = array(
                'school_id' => $post_data['id'],
                'session_year' => $post_data['year'][$key],
                'upto_class' => $post_data['class'][$key] ,
                'science' => $post_data['sci'][$key] ,
                'commerce' => $post_data['com'][$key] ,
                'humanities' => $post_data['hum'][$key] ,
                'section'   => $post_data['section'][$key], 
                'created_by' => $this->session->userdata('user_id')

            );
            //echo '<pre>';print_r($historyData);die;
            if($this->db->insert(' ci_schools_history', $historyData)) {
                //add_user_activity($this->session->userdata('user_id'),$ids, 'Insert', 'Added Leave Data','Employee Module');
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Form Could not be saved,Please try again';
            } 
           
        }

            return $response;
    }

    public function getHistoryData($id = NULL){
        $this->db->select('L.*');
        $this->db->from('ci_schools_history as L');
        if(!empty($id)){
            $this->db->where('L.school_id', $id);
        }
        return $this->db->get()->result();           
    }
    

}
?>
