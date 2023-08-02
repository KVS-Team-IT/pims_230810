<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Staff_model extends CI_Model {
	public function __construct(){
            parent::__construct();
        }
    //============================= PERSONAL SECTION START =================================//
    public function InsStaffData($StfData,$StfId){
          
            $response = array();
            if($StfData['employment_type']==1){
                $desigId=$StfData['present_designationid'];
                $subId=$StfData['present_subject'];
            }elseif ($StfData['employment_type']==2) {
                $desigId=$StfData['present_designationid_2'];
                $subId=$StfData['present_subject_2'];
            }
        
            $PostData = array(
                "staff_code"=>$StfId,
                "staff_type"=>$StfData['employment_type'],
                "staff_designation"=>$desigId,
                "staff_subject"=>$subId,
                "staff_title"=>$StfData['emp_title'],
                "staff_catg"=>1,
                "staff_name"=>$StfData['emp_name'],
                "staff_photo"=>'NA',
                "staff_gender"=>$StfData['emp_gender'],
                "staff_dob"=>date('Y-m-d', strtotime($StfData['emp_dob'])),
                "staff_marital_status"=>$StfData['emp_marital_status'],
                "staff_email"=>$StfData['emp_email'],
                "staff_mobile"=>$StfData['emp_mobile'],
                "staff_blood_group"=>$StfData['emp_blood_group'],
                "staff_qualification"=>$StfData['emp_qualification'],
                "staff_post_addrs"=>$StfData['emp_resaddress'],
                "staff_pincode"=>$StfData['emp_pincode'],
                "staff_period_from"=>date('Y-m-d', strtotime($StfData['present_joiningdate'])),
                "staff_period_to"=>date('Y-m-d', strtotime($StfData['present_joiningdate'])),
                "staff_role"=>$StfData['present_role_id'],
                "staff_region"=>$StfData['present_region_id'],
                "staff_kvcode"=>$StfData['present_kvcode'],
                "staff_section"=>$StfData['present_section_id'],
                "staff_school"=>$StfData['present_school_id'],
                "staff_shift"=>$StfData['present_shift'],
                "staff_zone"=>$StfData['present_zone'],
                "staff_isactive"=>1,
                "staff_created_on"=>date('Y-m-d H:i:s'),
                "staff_created_by"=>$this->session->userdata('user_id'),
                "staff_updated_on"=>date('Y-m-d H:i:s'),
                "staff_updated_by"=>$this->session->userdata('user_id')
            );
            //$this->db->insert('employee_details', $PostData);
            //show($lastQry=$this->db->last_query());
            //die;
            if($this->db->insert('support_staff', $PostData)) {
                if($StfData['employment_type']==1){
                    $this->InsUpdVacancyMaster($empData,$empId);
                }
                $response['sts'] = 'success';
                $response['msg'] = 'Data saved successfully';
                
            } else {
                $lastQry=$this->db->last_query();
                $response['sts'] = 'error';
                $response['msg'] = 'Form Could not be saved,Please try again';
            }
            //Added Profile Activity
            profile_activity($empId,'CREATED','STAFF',json_encode($PostData),$this->session->userdata('user_id'),$response['status']);
            return $response;
    }
    public function UpdStaffData($StfData,$StfId){
           
            $response = array();
            if($StfData['employment_type']==1){
                $desigId=$StfData['present_designationid'];
                $subId=$StfData['present_subject'];
            }elseif ($StfData['employment_type']==2) {
                $desigId=$StfData['present_designationid_2'];
                $subId=$StfData['present_subject_2'];
            }
        
            $PostData = array(
                "staff_type"=>$StfData['employment_type'],
                "staff_designation"=>$desigId,
                "staff_subject"=>$subId,
                "staff_title"=>$StfData['emp_title'],
                "staff_catg"=>1,
                "staff_name"=>$StfData['emp_name'],
                "staff_photo"=>'NA',
                "staff_gender"=>$StfData['emp_gender'],
                "staff_dob"=>date('Y-m-d', strtotime($StfData['emp_dob'])),
                "staff_marital_status"=>$StfData['emp_marital_status'],
                "staff_email"=>$StfData['emp_email'],
                "staff_mobile"=>$StfData['emp_mobile'],
                "staff_blood_group"=>$StfData['emp_blood_group'],
                "staff_qualification"=>$StfData['emp_qualification'],
                "staff_post_addrs"=>$StfData['emp_resaddress'],
                "staff_pincode"=>$StfData['emp_pincode'],
                "staff_period_from"=>date('Y-m-d', strtotime($StfData['present_joiningdate'])),
                "staff_period_to"=>date('Y-m-d', strtotime($StfData['present_joiningdate'])),
                "staff_role"=>$StfData['present_role_id'],
                "staff_region"=>$StfData['present_region_id'],
                "staff_kvcode"=>$StfData['present_kvcode'],
                "staff_section"=>$StfData['present_section_id'],
                "staff_school"=>$StfData['present_school_id'],
                "staff_shift"=>$StfData['present_shift'],
                "staff_zone"=>$StfData['present_zone'],
                "staff_isactive"=>1,
                "staff_updated_on"=>date('Y-m-d H:i:s'),
                "staff_updated_by"=>$this->session->userdata('user_id')
            );
            $this->db->where('staff_code',$StfId);
            if($this->db->update('support_staff', $PostData)) {
                if($StfData['employment_type']==1){
                    //$this->InsUpdVacancyMaster($empData,$empId);
                }
                $response['sts'] = 'success';
                $response['msg'] = 'Data saved successfully';
                
            } else {
                $lastQry=$this->db->last_query();
                $response['sts'] = 'error';
                $response['msg'] = 'Form Could not be saved,Please try again';
            }
            //Added Profile Activity
            profile_activity($empId,'UPDATED','STAFF',json_encode($PostData),$this->session->userdata('user_id'),$response['status']);
            return $response;
           
            
    }
   
    public function InsUpdVacancyMaster($empData,$empId){
        //====================== Submitted Posting Details =========================//
        $SubEmpId   = $empId;
        $SubKvCode  = $empData['present_kvcode'];
        $SubDesigId = $empData['present_designationid'];
        $SubSubId   = $empData['present_subject'];
        if(empty($SubSubId)){$SubSubId='NULL';}
        //======================= Ex Current Posting Details =========================//
        $this->db->select('emp_id,present_kvcode,present_designationid,present_subject');
        $this->db->from('ci_present_service_details');
        $this->db->where('emp_id=', $empId);
        
        $qry = $this->db->get();
        $lastQry=$this->db->last_query();
        if ($qry->num_rows()) {
            $resData = $qry->row();
            $CurEmpId   = $resData->emp_id;
            $CurKvCode  = $resData->present_kvcode;

            $CurDesigId = $resData->present_designationid; 
            $CurSubId   = $resData->present_subject; 
            if(empty($CurSubId)){$CurSubId='NULL';}
        }else{ //for first time insertion case
            $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post+1 WHERE code=$SubKvCode AND designation=$SubDesigId AND subject=ifnull($SubSubId,subject)");
            $lastQry=$this->db->last_query();
            return;
        }
        
        //============ Check Submitted Designation vs Present Designation ===========//
        if($CurKvCode==$SubKvCode){
            if($CurDesigId==$SubDesigId){
                if(!empty($SubSubId ) && ($CurSubId==$SubSubId)){

                }else{// Update Vacancy By Designation
                    $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post-1 WHERE code=$CurKvCode AND designation=$CurDesigId AND subject=ifnull($CurSubId,subject)");
                    $lastQry=$this->db->last_query();
                    $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post+1 WHERE code=$SubKvCode AND designation=$SubDesigId AND subject=ifnull($SubSubId,subject)");
                    $lastQry=$this->db->last_query();
                    return;
                }
            }else{// Update Vacancy By Designation
                $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post-1 WHERE code=$CurKvCode AND designation=$CurDesigId AND subject=ifnull($CurSubId,subject)");
                $lastQry=$this->db->last_query();
                $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post+1 WHERE code=$SubKvCode AND designation=$SubDesigId AND subject=ifnull($SubSubId,subject)");
                $lastQry=$this->db->last_query();
                return;
            }
            
        }else{// Update Vacancy By Designation
            $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post-1 WHERE code=$CurKvCode AND designation=$CurDesigId AND subject=ifnull($CurSubId,subject)");
            $lastQry=$this->db->last_query();
            $this->db->query("UPDATE ci_vacancy_master SET inposition_post=inposition_post+1 WHERE code=$SubKvCode AND designation=$SubDesigId AND subject=ifnull($SubSubId,subject)");
            $lastQry=$this->db->last_query();
            return;
        }
    }
    
    public function setStaffData($StfData){
        $StfId=$StfData['emp_id']; 
        if(empty($StfId)){ // Insert Record
           $now = DateTime::createFromFormat('U.u', microtime(true));
           $StfId=$now->format("YmdHis");
            return $this->InsStaffData($StfData,$StfId);
        }else{
           
            return $this->UpdStaffData($StfData,$StfId); // Update records
           
        }
    }	
   
    public function getStaffData($ExStaff = NULL){
        $this->db->select('S.*,D.name as designationname,DATE_FORMAT(S.staff_period_from,"%d-%m-%Y") as staff_period_from');
        $this->db->from('ci_support_staff as S');
        $this->db->join('designations D', 'D.id=S.staff_designation', 'LEFT');
        if(!empty($ExStaff)){
            $this->db->where('S.staff_code', $ExStaff);
        }
        return $this->db->get()->row();
    }
    
    public function getCurrentData(){
        $UsrId=$this->session->userdata('user_id');
        $CdQry=$this->db->query("SELECT 
            U.id,U.username,
            U.role_id,R.name AS role_name,
            U.role_category,IFNULL(RC.name,'NA') AS role_category_name,
            U.region_id,IFNULL(RO.name,'NA') AS region_name,IFNULL(RO.code,'NA') AS 'KCODE',
            U.school_id,SC.name AS school_name, IFNULL(SC.code,'NA') AS 'SCODE',
            (CASE WHEN U.role_id=5 THEN SC.code ELSE RO.code END) AS 'CCODE'
            FROM ci_users U
            LEFT JOIN ci_roles R ON(U.role_id=R.id)
            LEFT JOIN ci_role_category RC ON(U.role_category=RC.id)
            LEFT JOIN ci_regions RO ON(U.region_id=RO.id)
            LEFT JOIN ci_schools SC ON(U.school_id=SC.id)
            WHERE U.status=1 AND U.id='".$UsrId."'");
        //show($this->db->last_query());
        return $CdQry->row();
    }
    //============================= PERSONAL SECTION END =================================//
   public function getAllStaff($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('support_staff');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        //=====================================================================//
        $this->db->select('id')->from('ci_users');
        $this->db->where('region_id=', $this->session->userdata['region_id']);
        $subQuery =  $this->db->get_compiled_select();
        //====================================================================//
        
        $this->db->select("SQL_CALC_FOUND_ROWS
            S.id,
            S.staff_code,
            (CASE 
                  WHEN S.staff_type=1 THEN 'CONTRACTUAL' 
                  WHEN S.staff_type=2 THEN 'COACH' 
            END ) AS staff_type,
            (CASE 
                  WHEN S.staff_title=1 THEN 'Sh.' 
                  WHEN S.staff_title=2 THEN 'Smt.' 
                  WHEN S.staff_title=3 THEN 'Ms.' 
            END ) AS emp_title,
            S.staff_name,
            S.staff_designation,
            (CASE WHEN S.staff_type=1 THEN D.`name` ELSE 'Coach' END) AS 'staff_desig',
            S.staff_subject,
            (CASE WHEN S.staff_type=1 THEN SB.`name` ELSE CSB.`name` END) AS 'staff_sub',
            S.staff_role,
            R.`name` AS 'staff_loc',
            S.staff_region,
            RO.`name` AS 'staff_unit_ro',
            S.staff_section,
            IFNULL(RC.`name`,'NA') AS 'staff_div',
            S.staff_kvcode,
            (CASE WHEN S.staff_role=5 THEN SK.`name` ELSE RK.`name` END) AS 'staff_kvc',
            S.staff_school,
            SC.`name` AS 'staff_kv',
            S.staff_shift,
            S.staff_zone,
            ZO.`name` AS 'staff_zo',S.staff_created_by,
            (CASE WHEN S.staff_isactive=1 THEN 'ACTIVE' ELSE 'INACTIVE' END) AS 'staff_act'",false);
        $this->db->from('ci_support_staff S');
        $this->db->join('ci_designations D','S.staff_designation=D.id','Left');
        $this->db->join('ci_subjects SB','S.staff_subject=SB.id','Left');
        $this->db->join('ci_coach_subjects CSB','S.staff_subject=CSB.id','Left');
        $this->db->join('ci_roles R','S.staff_role=R.id','Left');
        $this->db->join('ci_regions RO','S.staff_region=RO.id','Left');
        $this->db->join('ci_role_category RC','S.staff_section=RC.id','Left');
        
        $this->db->join('ci_schools SK','S.staff_kvcode=SK.`code`','Left');
        $this->db->join('ci_regions RK','S.staff_kvcode=RK.`code`','Left');
        $this->db->join('ci_schools SC','S.staff_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.staff_zone=ZO.id','Left');
        //======================= Check Role & According To Access ==============================//
        
        $LogAcs=$this->session->userdata['role_id'];
        if($LogAcs==5 || $LogAcs==4 || $LogAcs==2){ //HQ/ZIET/KV
            $this->db->where('S.staff_created_by=', $this->session->userdata['user_id']);
        }elseif($LogAcs==3){ //RO
           // $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
           $this->db->where("S.staff_created_by IN ($subQuery)", NULL, FALSE);
        }else{
            // for Web Admin
        }
        
        
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        if($col){
            $this->db->order_by($col,$dir);
        }
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('S.staff_name', $search);
            $this->db->or_like('S.staff_code', $search);
            $this->db->group_end();
        }
        	
        $qry=$this->db->get();
       
        if($qry->num_rows())
        {
            $data['result']=$qry->result();
            $x=$this->db->last_query();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
  
}
