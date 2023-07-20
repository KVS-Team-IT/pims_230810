<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
    class Role_model extends CI_Model {
	public function __construct(){
        parent::__construct();
    }
    
    public function get_all_roles_list_json($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('roles');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS rl.*",false);
        $this->db->from('roles rl');
        if($limit > 0)
        {
            $this->db->limit($limit,$start);
        }
        if($col)
        {
            $this->db->order_by($col,$dir);
        }
        if($search && !empty($search))
        {
            $this->db->where("CONCAT(rl.name) LIKE '%$search%' ");
        }
		
        $qry=$this->db->get();
       
        if($qry->num_rows())
        {
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
	
    public function get_role_by_id($id){
     $this->db->select('*');
     $this->db->from('ci_roles');
     $this->db->where('id',$id);
     return  $this->db->get()->row();		 

    }
        
    public function role_is_exists($id) {
            $this->db->where("id", $id);
            $query = $this->db->get("roles");
            if ($query->num_rows() > 0) {
                    return true;
            } else {
                    return false;
            }
    } 
    
    public function add_roles($post_data,$id) {
		
	if (!empty($id) && is_numeric($id)) {
            
            $UpdData= array(
                'name' => $post_data['name'],
                'description'=>$post_data['description'],
                'updated' => date('Y-m-d H:i:s')
            );
            $this->db->where('id=',$post_data['id']);
            if ($this->db->update('roles', $UpdData)) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, $id, 'Updated', json_encode($post_data), 'Role Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
	}else{
            
            $insData= array(
                'name' => $post_data['name'],
                'description'=>$post_data['description'],
                'label' => $post_data['name'],
                'status' =>1,
                'created' => date('Y-m-d H:i:s')
            );
            if ($this->db->insert('roles', $insData)) {
                $response['status'] = 'success';
                add_user_activity($this->auth_user_id, $id, 'Added', json_encode($post_data), 'Role Module');
            } else {
                $response['status'] = 'error';
                $response['error'] = 'Some Error Occured';
            }
            return $response;
        }
    }
}
