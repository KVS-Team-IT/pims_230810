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
                $subId=$StfData['present_subject_1'];
                $EmpStr=$StfData['emp_strength'];
                $KvCode=$StfData['present_kvcode'];
            }elseif ($StfData['employment_type']==2) {
                $desigId=$StfData['present_designationid_2'];
                $subId=$StfData['present_subject_2'];
            }elseif ($StfData['employment_type']==3) {
                $desigId=$StfData['present_designationid_3'];
                $subId=$StfData['present_subject_3'];
            }
        
            $PostData = array(
                "staff_code"=>$StfId,
                "staff_catg"=>$StfData['employment_type'],
                "staff_type"=>$StfData['employment_type'],
                "staff_designation"=>$desigId,
                "staff_subject"=>($subId)?$subId:0,
                "staff_role"=>$StfData['present_role_id'],
                "staff_region"=>$StfData['present_region_id'],
                "staff_school"=>$StfData['present_school_id'],
                "staff_section"=>$StfData['present_section_id'],
                "staff_kvcode"=>$StfData['present_kvcode'],
                "staff_shift"=>$StfData['present_shift'],
                "staff_zone"=>$StfData['present_zone'],
                "staff_strength"=>$StfData['emp_strength'],
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
                    $this->InsUpdVacancyMaster($KvCode,$desigId,$subId,$EmpStr);
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
                $subId=$StfData['present_subject_1'];
                $EmpStr=$StfData['emp_strength'];
                $KvCode=$StfData['present_kvcode'];
            }elseif ($StfData['employment_type']==2) {
                $desigId=$StfData['present_designationid_2'];
                $subId=$StfData['present_subject_2'];
            }elseif ($StfData['employment_type']==3) {
                $desigId=$StfData['present_designationid_3'];
                $subId=$StfData['present_subject_3'];
            }
            $PostData = array(
                "staff_catg"=>$StfData['employment_type'],
                "staff_type"=>$StfData['employment_type'],
                "staff_designation"=>$desigId,
                "staff_subject"=>($subId)?$subId:0,
                "staff_role"=>$StfData['present_role_id'],
                "staff_region"=>$StfData['present_region_id'],
                "staff_school"=>$StfData['present_school_id'],
                "staff_section"=>$StfData['present_section_id'],
                "staff_kvcode"=>$StfData['present_kvcode'],
                "staff_shift"=>$StfData['present_shift'],
                "staff_zone"=>$StfData['present_zone'],
                "staff_strength"=>$StfData['emp_strength'],
                "staff_isactive"=>1,
                "staff_updated_on"=>date('Y-m-d H:i:s'),
                "staff_updated_by"=>$this->session->userdata('user_id')
            );
            $UpSSData = array(
                "staff_strength"=>$StfData['emp_strength'],
                "staff_updated_on"=>date('Y-m-d H:i:s'),
                "staff_updated_by"=>$this->session->userdata('user_id')
            );
            $this->db->where('staff_code',$StfId);
            if($this->db->update('support_staff', $UpSSData)) {
                $lastQry=$this->db->last_query();
                if($StfData['employment_type']==1){
                    $this->InsUpdVacancyMaster($KvCode,$desigId,$subId,$EmpStr);
                }
                $response['sts'] = 'success';
                $response['msg'] = 'Data saved successfully';
                
            } else {
                $lastQry=$this->db->last_query();
                $response['sts'] = 'error';
                $response['msg'] = 'Form Could not be saved,Please try again';
            }
            //Added Profile Activity
            //profile_activity($empId,'UPDATED','STAFF',json_encode($PostData),$this->session->userdata('user_id'),$response['status']);
            return $response;
           
            
    }
   
    public function InsUpdVacancyMaster($KvCode,$desigId,$subId=null,$EmpStr){ //Update Contractual Post strength
            $VCPData = array(
                "contractual_post"=>$EmpStr,
                "updated_on"=>date('Y-m-d H:i:s')
                
            );
            $this->db->where('code',$KvCode);
            $this->db->where('designation',$desigId);
            if($subId!=null){
            $this->db->where('subject',$subId);    
            }
            $this->db->update('vacancy_master', $VCPData);
            //$lastQry=$this->db->last_query();
            return;
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
        $this->db->select('S.*,D.name as designationname');
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
                  WHEN S.staff_type=3 THEN 'OTHER' 
            END ) AS staff_type,
            (CASE 
                  WHEN S.staff_catg=0 THEN 'NA' 
                  WHEN S.staff_catg=1 THEN 'TEACHING' 
                  WHEN S.staff_catg=2 THEN 'NON TEACHING' 
            END ) AS staff_cat,
            S.staff_designation,
            (CASE WHEN S.staff_type=1 THEN D.`name` WHEN S.staff_type=2 THEN 'Coach' ELSE 'Other' END) AS 'staff_desig',
            S.staff_subject,
            IFNULL((CASE WHEN S.staff_type=1 THEN SB.`name` ELSE CSB.`name` END),'NA') AS 'staff_sub',
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
            S.staff_strength,
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
           //show($this->db->last_query());
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
    public function getKvDetails($Kvid = null){
        $this->db->select("R.`name` AS 'REGION',
        S.name AS 'KVNAME',
        S.code AS 'KVCODE',
        (CASE WHEN S.status=1 THEN 'ACTIVE' ELSE 'INACTIVE' END) AS 'STATUS',
        Z.`name` AS 'ZONE',
        S.station_id AS 'STATION',
        (CASE WHEN S.sector=1 THEN 'CIVIL' WHEN S.sector=2 THEN 'DEFENCE' WHEN S.sector=3 THEN 'IHL' WHEN S.sector=4 THEN 'PROJECT' WHEN S.sector=5 THEN 'ABROAD' ELSE 'NA' END) AS 'SECTOR',
       (CASE 
        WHEN S.kv_upto_class=1 THEN 'I'
        WHEN S.kv_upto_class=2 THEN 'II'
        WHEN S.kv_upto_class=3 THEN 'III'
        WHEN S.kv_upto_class=4 THEN 'IV'
        WHEN S.kv_upto_class=5 THEN 'V'
        WHEN S.kv_upto_class=6 THEN 'VI'
        WHEN S.kv_upto_class=7 THEN 'VII'
        WHEN S.kv_upto_class=8 THEN 'VIII'
        WHEN S.kv_upto_class=9 THEN 'IX'
        WHEN S.kv_upto_class=10 THEN 'X'
        WHEN S.kv_upto_class=11 THEN 'XI'
        WHEN S.kv_upto_class=12 THEN 'XII' END) AS 'UPTO_CLASS',
        S.year_of_establish AS 'OPEN_YEAR',
        (CASE WHEN S.building_type=1 THEN 'PERMANENT' ELSE 'TEMPORARY' END) AS 'BUILDING',
        (CASE WHEN S.infra_type=1 THEN 'YES' ELSE 'NO' END) AS 'INFRASTRUCTURE',
        S.kv_upto_section AS 'SECTION',
        (CASE 
        WHEN S.ccea_upto_class=1 THEN 'I'
        WHEN S.ccea_upto_class=2 THEN 'II'
        WHEN S.ccea_upto_class=3 THEN 'III'
        WHEN S.ccea_upto_class=4 THEN 'IV'
        WHEN S.ccea_upto_class=5 THEN 'V'
        WHEN S.ccea_upto_class=6 THEN 'VI'
        WHEN S.ccea_upto_class=7 THEN 'VII'
        WHEN S.ccea_upto_class=8 THEN 'VIII'
        WHEN S.ccea_upto_class=9 THEN 'IX'
        WHEN S.ccea_upto_class=10 THEN 'X'
        WHEN S.ccea_upto_class=11 THEN 'XI'
        WHEN S.ccea_upto_class=12 THEN 'XII' END) AS 'CCEA_CLASS',
        S.udise_code AS 'UDISE',
        S.cbse_approval_code AS 'CBSE',
        (CASE WHEN S.kv_str_sci=1 THEN 'YES' ELSE 'NO' END) AS 'SCIENCE',
        (CASE WHEN S.kv_str_com=1 THEN 'YES' ELSE 'NO' END) AS 'COMMERCE',
        (CASE WHEN S.kv_str_hum=1 THEN 'YES' ELSE 'NO' END) AS 'HUMANITIES',
        S.ccea_teach_post AS 'CCEA_TECH',
        S.ccea_nonteach_post AS 'CCEA_NONTECH'");
        $this->db->from('ci_schools S');
        $this->db->join('ci_regions R','R.id=S.region_id','Left');
        $this->db->join('ci_regions Z','Z.id=S.zone_id','Left');
        $this->db->where('S.id=', $Kvid);
        $this->db->where('S.status=', 1);

        return $this->db->get()->row();
    }
    public function getKvVacancy($Kvid = null){
        $this->db->select("SUM(CASE WHEN V.designation_type=1 THEN V.sanctioned_post ELSE 0 END) AS 'TECH',
        SUM(CASE WHEN V.designation_type=2 THEN V.sanctioned_post ELSE 0 END) AS 'NONTECH',
        SUM(CASE WHEN V.designation_type=1 THEN V.inposition_post ELSE 0 END) AS 'IN_TECH',
        SUM(CASE WHEN V.designation_type=2 THEN V.inposition_post ELSE 0 END) AS 'IN_NONTECH',
        SUM(CASE WHEN V.designation_type=1 THEN V.contractual_post ELSE 0 END) AS 'TECH_CON',
        SUM(CASE WHEN V.designation_type=2 THEN V.contractual_post ELSE 0 END) AS 'NONTECH_CON'");
        $this->db->from('ci_vacancy_master V');
        $this->db->join('ci_schools S','S.`code`=V.`code`','Left');
        $this->db->where('S.id=', $Kvid);
        $this->db->where('S.status=', 1);
        return $this->db->get()->row();
    }
}
