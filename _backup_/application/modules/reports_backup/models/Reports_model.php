<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Reports_model extends CI_Model {
	public function __construct(){
            parent::__construct();
			//show($this->session->userdata['user_id']);
        }
    public function getAllRegisteredProfile($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('employee_details');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        //=====================================================================//
        $this->db->select('id')->from('ci_users');
        $this->db->where('region_id=', $this->session->userdata['region_id']);
        $subQuery =  $this->db->get_compiled_select();
        //====================================================================//
        
        $this->db->select("SQL_CALC_FOUND_ROWS
            E.id,
            E.emp_createdby,
            E.emp_code,
            (CASE 
                WHEN E.emp_title=1 THEN 'Sh.' 
                WHEN E.emp_title=2 THEN 'Smt.' 
                WHEN E.emp_title=3 THEN 'Ms.'
                WHEN E.emp_title=4 THEN 'Dr.'END
            ) AS emp_title,
            E.emp_name,E.emp_email,E.emp_mobile_no,E.emp_acceptance,
            S.present_designationid,S.present_place,S.present_unit,S.present_school,S.present_kvcode,S.present_zone,
            IFNULL(D.`name`,'NA') AS emp_desig,
            IFNULL(SU.`name`,'NA') AS emp_subject,
            IFNULL(R.`name`,'NA') AS emp_post_place,
            IFNULL(RO.`name`,'NA') AS emp_region,
            IFNULL(SC.`name`,'NA') AS emp_school,
            IFNULL(SC.`code`,'NA') AS emp_school_code,
            IFNULL(ZO.`name`,'NA') AS emp_zone",false);
        $this->db->from('ci_employee_details E');
        $this->db->join('ci_present_service_details S','E.emp_code=S.emp_id','Left');
        $this->db->join('ci_designations D','S.present_designationid=D.id','Left');
        $this->db->join('ci_subjects SU','SU.id=S.present_subject','LEFT');
        $this->db->join('ci_roles R','S.present_place=R.id','Left');
        $this->db->join('ci_regions RO','S.present_unit=RO.id','Left');
        $this->db->join('ci_schools SC','S.present_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.present_zone=ZO.id','Left');
        $this->db->join('ci_role_category CRO','CRO.id=S.present_section','Left');
        //======================= Check Role & According To Access ==============================//
        
        $LogAcs=$this->session->userdata['role_id'];
        if($LogAcs==2 && $this->role_category==9){
            $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
        }elseif($LogAcs==2 && $this->role_category==10){
            $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
        }elseif($LogAcs==2){
            $this->db->where('S.present_place=', $this->role_id);
            $this->db->where('S.present_section=', $this->role_category);
        }elseif($LogAcs==5 || $LogAcs==4){ //HQ/ZIET/KV
            $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
        }elseif($LogAcs==3){ //RO
           $this->db->where("E.emp_createdby IN ($subQuery)", NULL, FALSE);
        }else{
            $this->db->where("E.emp_createdby <>", 2018);
        }
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        if($col){
            $this->db->order_by($col,$dir);
        }
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('E.emp_name', $search);
            $this->db->or_like('E.emp_code', $search);
            $this->db->group_end();
        }
        //pr($post_data);
       /*============filter for report=======================================  */
        if(isset($post_data['initial_role_id'])&& !empty($post_data['initial_role_id'])){
            if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
               //$this->db->where('SC.id',$post_data['initial_school_id']);
            }else{
               $this->db->where('R.id',$post_data['initial_role_id']);
            }
        }
	if(isset($post_data['desiganition_id'])&& !empty($post_data['desiganition_id'])){
            $this->db->where('D.id',$post_data['desiganition_id']);
	}
        if(isset($post_data['sdesiganition_id'])&& !empty($post_data['sdesiganition_id'])){
            $this->db->where('D.id',$post_data['sdesiganition_id']);
	}
        if(isset($post_data['subject_id'])&& !empty($post_data['subject_id'])){
            $this->db->where('SU.id',$post_data['subject_id']);
	}
	
	if(isset($post_data['initial_section_id'])&& !empty($post_data['initial_section_id'])){
            $this->db->where('CRO.id',$post_data['initial_section_id']);
	}
	if(isset($post_data['initial_region_id'])&& !empty($post_data['initial_region_id'])){
            $this->db->where('RO.id',$post_data['initial_region_id']);
	}
	if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
            $this->db->where('SC.id',$post_data['initial_school_id']);
	}
	 /* ================================================================= */
        $qry=$this->db->get();
        //show($this->db->last_query());
	if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
	
    /* ========================================VACANCY================================================ */
    public function getAllRegisteredProfilevacancy($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data){
        //show($post_data['initial_school_id']);
        //====================================================================//
        $this->db->select('id')->from('ci_designations');
        $this->db->where('e1=', 1);
        $subE1Query =  $this->db->get_compiled_select();
        //====================================================================//
        //
        //====================================================================//
        $this->db->select('id')->from('ci_designations');
        $this->db->where('e2=', 1);
        $subE23Query =  $this->db->get_compiled_select();
        //====================================================================//
        //=====================================================================//
        $this->db->select('code')->from('ci_schools');
        $this->db->where('region_id=', $post_data['initial_region_id']);
        $subQuery =  $this->db->get_compiled_select();
        //====================================================================//
        //=====================================================================//
        $this->db->select('code')->from('ci_schools');
        $this->db->where('id=', $post_data['initial_school_id']);
        $subCQuery =  $this->db->get_compiled_select();
        //====================================================================//
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('ci_vacancy_master');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        $this->db->select("SQL_CALC_FOUND_ROWS V.`code` AS 'KV_CODE',
            V.type, R.`name` AS 'ROLE',
            (CASE WHEN V.type=5 THEN SC.`name` ELSE RO.`name` END) AS 'KV_REGION_ZEIT',
            V.designation, D.`name` AS 'IN_POST',
            (CASE WHEN V.designation_type=1 THEN 'TEACHING' ELSE 'NON-TEACHING' END) AS 'DESI_TYPE',
            V.`subject`,IFNULL(S.`name`,'NA') AS 'IN_SUBJECT',
            V.sanctioned_post AS 'SANCTION_POST',V.inposition_post AS 'IN_POSITION',
            (CASE WHEN D.id IN(1,2,3,4,11) THEN 'NA' ELSE V.contractual_post END) AS 'IN_CONTRACTUAL',
            (V.sanctioned_post-V.inposition_post) AS 'TOTAL_VACANCY'",false);
        $this->db->from('ci_vacancy_master V');
        $this->db->join('ci_roles R','V.type=R.id','Left');
        $this->db->join('ci_designations D','V.designation=D.id','Left');
        $this->db->join('ci_subjects S','V.`subject`=S.id','Left');
        $this->db->join('ci_regions RO','V.`code`=RO.`code`','Left');
        $this->db->join('ci_schools SC','V.`code`=SC.`code`','Left');

        /*============filter for report=======================================  */
        if(isset($post_data['initial_role_id'])&& !empty($post_data['initial_role_id'])){
            if(empty($post_data['initial_school_id'])){
                $this->db->where('R.id',$post_data['initial_role_id']);
            }else{
                $this->db->where('R.id',5);
            }
        }
        if($this->role_id==2 && $this->role_category==9){ // Establish - I
            $this->db->where("V.designation IN ($subE1Query)", NULL, FALSE);
        }
        if($this->role_id==2 && $this->role_category==10){ // Establish - II & III
            $this->db->where("V.designation IN ($subE23Query)", NULL, FALSE);
        }
    // if place id <> 5
    if($post_data['initial_role_id']==5){
        $this->db->where("V.code IN ($subQuery)", NULL, FALSE);
    }else{
        if(isset($post_data['initial_region_id'])&& !empty($post_data['initial_region_id'])){
            if(empty($post_data['initial_school_id'])){
                $this->db->where('RO.id',$post_data['initial_region_id']);
            }else{
                $this->db->where("V.code IN ($subQuery)", NULL, FALSE);
            }
        }
    }
  if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
  //$this->db->where('SC.id',$post_data['initial_school_id']);
  $this->db->where("V.code IN ($subCQuery)", NULL, FALSE);
  }
  if(isset($post_data['desiganition_id'])&& !empty($post_data['desiganition_id'])){
  $this->db->where('D.id',$post_data['desiganition_id']);
  }
  if(isset($post_data['subject_id'])&& !empty($post_data['subject_id'])){
  $this->db->where('S.id',$post_data['subject_id']);
  }
  if(isset($post_data['desiganition_category_id'])&& !empty($post_data['desiganition_category_id'])){
  $this->db->where('V.designation_type',$post_data['desiganition_category_id']);
  }

        /* ================================================================= */
       
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        $this->db->group_by('V.`id`');
        $this->db->order_by('V.`id`',$dir);
        //if($col){
            //$this->db->order_by($col,$dir);
        //}
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('V.`code`', $search);
            $this->db->or_like('S.`name`', $search);
            $this->db->or_like('SC.`name`', $search);
            $this->db->group_end();
        }
      
        $qry=$this->db->get();
        //echo $this->db->last_query(); die; 
        if($qry->num_rows())
        {
            $data['result']=$qry->result();
            //echo $lastQry=$this->db->last_query();
        }else{
            $data['result']=array();
        }
       
        $total = $this->db->query("SELECT FOUND_ROWS() AS count");
       // $lastQry=$this->db->last_query();
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
       
    }
	public function getAllEmployeeReport($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(id) as total');
            $this->db->from('employee_details');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        //=====================================================================//
        $this->db->select('id')->from('ci_users');
        $this->db->where('region_id=', $this->session->userdata['region_id']);
        $subQuery =  $this->db->get_compiled_select();
        //====================================================================//
        
        $this->db->select("SQL_CALC_FOUND_ROWS
            E.id,
            E.emp_createdby,
            E.emp_code,
            (CASE 
                WHEN E.emp_title=1 THEN 'Sh.' 
                WHEN E.emp_title=2 THEN 'Smt.' 
                WHEN E.emp_title=3 THEN 'Ms.' END
            ) AS emp_title,
            (CASE 
                WHEN S.present_place =5 THEN SC.name   
                ELSE R.name END
            ) AS kv_where_working,
			S.present_place AS role_id, PD.comp_other_prof as profesional_qualification ,S.present_joiningdate as doj ,
            E.emp_name,E.emp_email,E.emp_mobile_no,E.emp_dob AS e_dob,S.seniorityno as seniorti_no,S.present_joiningdate as date_oppointment,
            S.present_designationid,S.present_place,S.present_unit,S.present_school,S.present_kvcode,S.present_zone,F.order_date as date_of_drawing_center,T.t_from1 as training_from,T.t_to1 as tranig_to,T.duration as no_of_days,QL.name as educational_qualification,
            IFNULL(D.`name`,'NA') AS emp_desig,
            IFNULL(R.`name`,'NA') AS emp_post_place,
            IFNULL(RO.`name`,'NA') AS emp_region,
            IFNULL(SC.`name`,'NA') AS emp_school,
            IFNULL(SC.`code`,'NA') AS emp_school_code,
            IFNULL(ZO.`name`,'NA') AS emp_zone",false);
        $this->db->from('ci_employee_details E');
        $this->db->join('ci_present_service_details S','E.emp_code=S.emp_id','Left');
        $this->db->join('ci_designations D','S.present_designationid=D.id','Left');
        $this->db->join('ci_roles R','S.present_place=R.id','Left');
        $this->db->join('ci_regions RO','S.present_unit=RO.id','Left');
        $this->db->join('ci_schools SC','S.present_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.present_zone=ZO.id','Left');
        $this->db->join('ci_role_category CRO','CRO.id=S.present_section','Left');
        $this->db->join('ci_financial_upgradation F','F.emp_id=E.emp_code','Left');
        $this->db->join('ci_academic A','A.emp_id=E.emp_code','Left');
        $this->db->join('ci_training_details T','T.emp_id=E.emp_code','Left');
        $this->db->join('ci_qualification QL','QL.id=A.emp_education','Left');
        $this->db->join('ci_proficiency_details PD','PD.emp_id=E.emp_code','Left');
        //======================= Check Role & According To Access ==============================//
        
        $LogAcs=$this->session->userdata['role_id'];
        if($LogAcs==5 || $LogAcs==4 || $LogAcs==2){ //HQ/ZIET/KV
            $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
        }elseif($LogAcs==3){ //RO
           // $this->db->where('E.emp_createdby=', $this->session->userdata['user_id']);
           $this->db->where("E.emp_createdby IN ($subQuery)", NULL, FALSE);
        }else{
            
        }
        $this->db->where("D.active",1);
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        if($col){
            $this->db->order_by($col,$dir);
        }
		//pr($search);
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('S.emp_id',$search);
            $this->db->or_like('E.emp_first_name', $search);
            $this->db->or_like('E.emp_last_name', $search);
            $this->db->or_like('E.emp_middle_name', $search);
            $this->db->or_like('F.order_date', $search);
            $this->db->or_like('T.t_from1', $search);
            $this->db->or_like('T.t_to1', $search);
            $this->db->or_like('T.duration', $search);
            $this->db->or_like('QL.name', $search);
            $this->db->or_like('PD.comp_other_prof', $search);
            $this->db->or_like('S.seniorityno', $search);
            $this->db->or_like('E.emp_dob', $search);
            $this->db->or_like('SC.name', $search);
            $this->db->or_like('R.name', $search);
            $this->db->group_end();
        }
        //pr($post_data);
       /*============filter for report=======================================  */
        if(isset($post_data['initial_role_id'])&& !empty($post_data['initial_role_id'])){
            if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
               //$this->db->where('SC.id',$post_data['initial_school_id']);
            }else{
               $this->db->where('R.id',$post_data['initial_role_id']);
            }
        }
	if(isset($post_data['desiganition_id'])&& !empty($post_data['desiganition_id'])){
            $this->db->where('D.id',$post_data['desiganition_id']);
	}
	
	if(isset($post_data['initial_section_id'])&& !empty($post_data['initial_section_id'])){
            $this->db->where('CRO.id',$post_data['initial_section_id']);
	}
	if(isset($post_data['initial_region_id'])&& !empty($post_data['initial_region_id'])){
            $this->db->where('RO.id',$post_data['initial_region_id']);
	}
	if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
            $this->db->where('SC.id',$post_data['initial_school_id']);
	}
	 /* ================================================================= */
        $qry=$this->db->get();
        //show($this->db->last_query());
	if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
    public function AllStaffDetails($KvId=null) {
        $this->db->select(" 
        S.staff_code CODE,
        (CASE 
        WHEN S.staff_catg=1 THEN 'TEACHING'
        ELSE 'NON-TEACHING' END) CAT,
        (CASE 
        WHEN S.staff_type=1 THEN 'CONTRACTUAL'
        WHEN S.staff_type=2 THEN 'COACH'
        WHEN S.staff_type=3 THEN 'OTHER'
        ELSE 'NA' END) TYP,
        (CASE 
        WHEN S.staff_designation=99 THEN 'Coach'
        WHEN S.staff_designation=100 THEN 'Other'
        ELSE D.`name` END) DES,
        (CASE 
        WHEN S.staff_designation=99 THEN CS.`name`
        WHEN S.staff_designation=100 THEN CS.`name`
        ELSE DS.`name` END) SUB,
        SR.`name` PLC,
        RO.`name` REG,
        KV.`name` KVD,
        IFNULL(RC.`name`,'NA') SEC,
        S.staff_kvcode KVC,
        (CASE WHEN S.staff_shift=1 THEN 'I' ELSE 'II' END) SFT,
        ZO.`name` ZON,
        S.staff_strength TOT,
        (CASE WHEN S.staff_isactive=1 THEN 'YES' ELSE 'NO' END) ACT",false);
        $this->db->from('ci_support_staff S');
        $this->db->join('ci_designations D','S.staff_designation=D.id','Left');
        $this->db->join('ci_subjects DS','S.staff_subject=DS.id','Left');
        $this->db->join('ci_coach_subjects CS','S.staff_subject=CS.id','Left');
        $this->db->join('ci_roles SR','S.staff_role=SR.id','Left');
        $this->db->join('ci_regions RO','S.staff_region=RO.id','Left');
        $this->db->join('ci_schools KV','S.staff_school=KV.id','Left');
        $this->db->join('ci_role_category RC','S.staff_section=RC.id','Left');
        $this->db->join('ci_regions ZO','S.staff_zone=ZO.id','Left');
        if($this->role_id==5){
        $this->db->where('KV.id',$this->session->userdata['school_id']);
        }
       
        $qry=$this->db->get();
        //show($this->db->last_query());
	if($qry->num_rows()){
            $data=$qry->result();
        }else{
            $data=array();
        }
        return json_encode($data);
        
    }
    //============================ COMPARATIVE QUERY==============================//
    public function ComGOVDATA($KvCode=null){
        $this->db->select("K.id,K.kv_code,K.`code`,K.`name`,K.udise_code,
        (CASE WHEN K.shift=2 THEN 'II' ELSE 'I' END) shift,
        (CASE 
            WHEN K.sector=1 THEN 'Civil' 
            WHEN K.sector=2 THEN 'Defence' 
            WHEN K.sector=3 THEN 'IHL' 
            WHEN K.sector=4 THEN 'Project' 
            WHEN K.sector=5 THEN 'Abroad' 
            ELSE 'NA' END) sector,
        R.`name` region,
        (CASE WHEN K.building_type=1 THEN 'Permanent' ELSE 'Temporary' END) building,
        (CASE WHEN K.infra_type=1 THEN 'Yes' ELSE 'No' END) infra,
        (CASE 
            WHEN K.kv_upto_class=1 THEN 'I' 
            WHEN K.kv_upto_class=2 THEN 'II'
            WHEN K.kv_upto_class=3 THEN 'III'
            WHEN K.kv_upto_class=4 THEN 'IV'
            WHEN K.kv_upto_class=5 THEN 'V'
            WHEN K.kv_upto_class=6 THEN 'VI'
            WHEN K.kv_upto_class=7 THEN 'VII'
            WHEN K.kv_upto_class=8 THEN 'VIII'
            WHEN K.kv_upto_class=9 THEN 'IX'
            WHEN K.kv_upto_class=10 THEN 'X'
            WHEN K.kv_upto_class=11 THEN 'XI'
            WHEN K.kv_upto_class=12 THEN 'XII'
            ELSE 'NA'
            END) kv_upto_class,
        (CASE 
            WHEN K.ccea_upto_class=1 THEN 'I'
            WHEN K.ccea_upto_class=2 THEN 'II'
            WHEN K.ccea_upto_class=3 THEN 'III'
            WHEN K.ccea_upto_class=4 THEN 'IV'
            WHEN K.ccea_upto_class=5 THEN 'V'
            WHEN K.ccea_upto_class=6 THEN 'VI'
            WHEN K.ccea_upto_class=7 THEN 'VII'
            WHEN K.ccea_upto_class=8 THEN 'VIII'
            WHEN K.ccea_upto_class=9 THEN 'IX'
            WHEN K.ccea_upto_class=10 THEN 'X'
            WHEN K.ccea_upto_class=11 THEN 'XI'
            WHEN K.ccea_upto_class=12 THEN 'XII'
            ELSE 'NA'
            END) ccea_upto_class,
        IFNULL(K.kv_upto_section,0) kv_upto_section,
        IFNULL(K.ccea_upto_section,0) ccea_upto_section,
        IFNULL(K.ccea_teach_post,0) ccea_teach_post,
        IFNULL(K.ccea_nonteach_post,0) ccea_nonteach_post");
        $this->db->from("schools K");
        $this->db->join("regions R", "K.region_id=R.id", "LEFT");
        $this->db->where('K.`code`=', $KvCode);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    public function ComKVSDATA($KvCode=null){
        $this->db->select("IFNULL(SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END),0) teach,
        IFNULL(SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END),0) nonteach,
        IFNULL(SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END),0) inteach,
        IFNULL(SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END),0) innonteach,
        IFNULL(SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END),0) incontra,
        IFNULL(SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END),0) innoncontra");
        $this->db->from("vacancy_master ");
        
        $this->db->where('`code`=', $KvCode);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    public function ComRegionList() {
        $this->db->select("id, CONCAT(`name`,' (',`code`,')') `name`");
        $this->db->from("regions");
        $this->db->where('type=', 3);
        $this->db->where('status=', 1);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->result();
        } else {
            return array();
        }
    }
    public function ComACTDATA($KvCode=null) {
        $this->db->select("IFNULL(SUM(CASE WHEN D.cat_id=1 THEN 1 ELSE 0 END),0) teach,
        IFNULL(SUM(CASE WHEN D.cat_id=2 THEN 1 ELSE 0 END),0) nonteach");
        $this->db->from("present_service_details P");
        $this->db->join("designations D", "P.present_designationid=D.id", "LEFT");
        $this->db->where('present_kvcode=', $KvCode);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    
    public function ConsolidatedMaster($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        if(func_num_args()==0)
        {
            $this->db->select('count(id) as total');
            $this->db->from('schools');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        //=====================================================================//
        $this->db->select("code,session_year,
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) kvs_teach_post,
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) kvs_nonteach_post,
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) kv_teach_post,
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) kv_nonteach_post,
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) kv_contra_post,
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) kv_noncontra_post")->from('vacancy_master');
        $this->db->group_by("code"); 
        $VacQuery =  $this->db->get_compiled_select();
        //====================================================================//
        
        $this->db->select("SQL_CALC_FOUND_ROWS
        K.kv_code,K.`code`,K.`name`,
        (CASE WHEN K.shift=2 THEN 'II' ELSE 'I' END) shift,
        (CASE 
            WHEN K.sector=1 THEN 'Civil' 
            WHEN K.sector=2 THEN 'Defence' 
            WHEN K.sector=3 THEN 'IHL' 
            WHEN K.sector=4 THEN 'Project' 
            WHEN K.sector=5 THEN 'Abroad' 
            ELSE 'NA' END) sector,
        R.`name` region,K.year_of_establish,V.session_year,
        (CASE WHEN K.building_type=1 THEN 'Permanent' ELSE 'Temporary' END) building,
        (CASE WHEN K.infra_type=1 THEN 'Yes' ELSE 'No' END) infra,
        (CASE 
            WHEN K.kv_upto_class=1 THEN 'I' 
            WHEN K.kv_upto_class=2 THEN 'II'
            WHEN K.kv_upto_class=3 THEN 'III'
            WHEN K.kv_upto_class=4 THEN 'IV'
            WHEN K.kv_upto_class=5 THEN 'V'
            WHEN K.kv_upto_class=6 THEN 'VI'
            WHEN K.kv_upto_class=7 THEN 'VII'
            WHEN K.kv_upto_class=8 THEN 'VIII'
            WHEN K.kv_upto_class=9 THEN 'IX'
            WHEN K.kv_upto_class=10 THEN 'X'
            WHEN K.kv_upto_class=11 THEN 'XI'
            WHEN K.kv_upto_class=12 THEN 'XII'
            ELSE 'NA'
            END) kvs_class,
        K.kv_upto_section kvs_section,
        (CASE 
            WHEN K.ccea_upto_class=1 THEN 'I'
            WHEN K.ccea_upto_class=2 THEN 'II'
            WHEN K.ccea_upto_class=3 THEN 'III'
            WHEN K.ccea_upto_class=4 THEN 'IV'
            WHEN K.ccea_upto_class=5 THEN 'V'
            WHEN K.ccea_upto_class=6 THEN 'VI'
            WHEN K.ccea_upto_class=7 THEN 'VII'
            WHEN K.ccea_upto_class=8 THEN 'VIII'
            WHEN K.ccea_upto_class=9 THEN 'IX'
            WHEN K.ccea_upto_class=10 THEN 'X'
            WHEN K.ccea_upto_class=11 THEN 'XI'
            WHEN K.ccea_upto_class=12 THEN 'XII'
            ELSE 'NA'
            END) ccea_class,
        K.ccea_upto_section ccea_section,K.ccea_teach_post,K.ccea_nonteach_post,V.kvs_teach_post,
        V.kvs_nonteach_post,V.kv_teach_post,V.kv_nonteach_post,V.kv_contra_post,V.kv_noncontra_post",false);
        $this->db->from('schools K');
        $this->db->join('regions R','K.region_id=R.id','Left');
        $this->db->join('( '.$VacQuery. ') V','K.`code`=V.`code`','Left');
        if(isset($post_data['RegId'])&& !empty($post_data['RegId'])){
            $this->db->where("K.region_id", $post_data['RegId']);
	}else{
            $this->db->where("K.region_id", '');
        }
        $this->db->where("K.`status`",1);
        
        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        if($col){
            $this->db->order_by($col,$dir);
        }
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('K.`code`', $search);
            $this->db->or_like('K.`name`', $search);
            $this->db->group_end();
        }
        //pr($post_data);
       /*============filter for report=======================================  */
       /* 
	if(isset($post_data['desiganition_id'])&& !empty($post_data['desiganition_id'])){
            $this->db->where('D.id',$post_data['desiganition_id']);
	}
        if(isset($post_data['sdesiganition_id'])&& !empty($post_data['sdesiganition_id'])){
            $this->db->where('D.id',$post_data['sdesiganition_id']);
	}
        * *
        */
        /* ================================================================= */
        $qry=$this->db->get();
        $lq=$this->db->last_query();
	if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
}
