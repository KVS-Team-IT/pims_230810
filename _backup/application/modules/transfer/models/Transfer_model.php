<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Transfer_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getAllRegEmp($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
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
            CONCAT(
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.'  WHEN E.emp_title=3 THEN 'Ms.' WHEN E.emp_title=4 THEN 'Dr.' END),' ',E.emp_name) 'ENAME',
            E.emp_code 'ECODE',E.emp_istransffered 'EISTRANS',
            IFNULL(R.`label`, 'NA') AS 'EUNIT', 
            IFNULL(RO.`name`, 'NA') AS 'EREGION',
            (CASE WHEN S.present_place=5 THEN SC.`name` ELSE RO.`name` END) AS 'EPLACE',
            (CASE 
               WHEN S.present_status=1 THEN 'REGULAR' 
               WHEN S.present_status=2 THEN 'SURPLUS' 
               WHEN S.present_status=3 THEN 'RETIRED' 
               WHEN S.present_status=4 THEN 'RESIGNED' 
               WHEN S.present_status=5 THEN 'VRS' 
               WHEN S.present_status=6 THEN 'DEPUTATION' 
               WHEN S.present_status=7 THEN 'LIEN' 
               WHEN S.present_status=8 THEN 'LONG LEAVE' 
               WHEN S.present_status=9 THEN 'TERMINATION' 
               WHEN S.present_status=10 THEN 'DEATH' END
            ) AS 'ESTATUS',
            D.alias 'EDESIG',IFNULL(J.`alias`,'NA') 'ESUB'",false);
        $this->db->from('ci_present_service_details S');
        $this->db->join('ci_employee_details E','S.emp_id=E.emp_code','Left');
        $this->db->join('ci_designations D','S.present_designationid=D.id','Left');
        $this->db->join('ci_subjects J','S.present_subject=J.`id`','LEFT');
        $this->db->join('ci_roles R','S.present_place=R.id','Left');
        $this->db->join('ci_regions RO','S.present_unit=RO.id','Left');
        $this->db->join('ci_schools SC','S.present_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.present_zone=ZO.id','Left');
        $this->db->join('ci_role_category CRO','CRO.id=S.present_section','Left');
        //======================= Check Role & According To Access ==============================//
        
        $LogAcs=$this->role_id;
        
        if($LogAcs==5 || $LogAcs==4 || $LogAcs==3 || $LogAcs==2){ //HQ/ZIET/KV
            $this->db->where('S.created_by=', $this->auth_user_id);
        }else{
            // All record accessed by web administrator
        }
        $this->db->group_start();
        $this->db->where('S.present_status=', 1);
        $this->db->or_where('S.present_status=', 2);
        $this->db->group_end();
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
        
        if(isset($post_data['pre_emp_status'])&& !empty($post_data['pre_emp_status'])){
            $this->db->where('S.present_status',$post_data['pre_emp_status']);
	}
	 /* ================================================================= */
        $qry=$this->db->get();
        //$lq=$this->db->last_query();
	if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
	public function revertrecord_Byempid($id){
		// print_r($id);  die();
		if($id){
		$sql="UPDATE ci_emp_transfer_details SET transfer_status='5' WHERE emp_id='".$id['id']."' ";
		$que=$this->db->query($sql);
	    }
		if($id){
			$sql= "UPDATE ci_employee_details SET emp_istransffered='0' WHERE emp_code='".$id['id']."' ";
			$que=$this->db->query($sql);
		 }
	
		
	}
    public function getAllEmp(){
        
        $this->db->select("SQL_CALC_FOUND_ROWS
        E.emp_code AS 'TR_EMP_CODE',
        (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END ) AS 'TR_EMP_TTL', 
        E.emp_name AS 'TR_EMP_NAME',
        E.emp_mobile_no AS 'TR_EMP_MOB',
        E.emp_email AS 'TR_EMP_MAIL',
        E.emp_createdby AS 'TR_EMP_CRBY',
        E.emp_istransffered AS 'TR_EMP_TRANS',
        S.present_designationid AS 'TR_EMP_DESID', 
        IFNULL(D.`name`, 'NA') AS 'TR_EMP_DESNAME',
        S.present_place AS 'TR_EMP_PLACE', 
        IFNULL(R.`name`, 'NA') AS 'TR_EMP_PLACENAME', 
        S.present_unit AS 'TR_EMP_UNIT', 
        (CASE WHEN S.present_place=5 THEN SC.`name` ELSE RO.`name` END) AS 'TR_EMP_UNITNAME', 
            
        S.present_school AS 'TR_EMP_SCHOOL', 
        IFNULL(SC.`name`, 'NA') AS 'TR_EMP_SCHOOL_NAME',
        S.present_kvcode AS 'TR_EMP_KVCODE', 
        S.present_zone AS 'TR_EMP_ZONE',
        IFNULL(ZO.`name`, 'NA') AS 'TR_EMP_ZONE_NAME',
        S.present_subject AS 'TR_EMP_SUB',
        IFNULL(SB.`name`, 'NA') AS 'TR_EMP_SUBNAME',
        T.emp_id AS 'TR_TRS_EMP_ID', 
        T.in_process AS 'TR_TRS_EMP_STS'",false);
        
        $this->db->from('ci_employee_details E');
        $this->db->join('ci_present_service_details S','E.emp_code=S.emp_id','Left');
        $this->db->join('ci_designations D','S.present_designationid=D.id','Left');
        $this->db->join('ci_roles R','S.present_place=R.id','Left');
        $this->db->join('ci_regions RO','S.present_unit=RO.id','Left');
        $this->db->join('ci_schools SC','S.present_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.present_zone=ZO.id','Left');
        $this->db->join('ci_subjects SB','S.present_subject=SB.id','Left');
        $this->db->join('ci_emp_transfer_details T','E.emp_code=T.emp_id AND T.in_process=1'  ,'Left');
        //======================= Check Role & According To Access ==============================//
        
        $LogAcs=$this->role_id;
        if($LogAcs==5 || $LogAcs==4 || $LogAcs==3 || $LogAcs==2){ //HQ/ZIET/KV
            $this->db->where('E.emp_createdby=', $this->auth_user_id);
        }else{
            // All record accessed by web administrator
        }
       
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            return $data=$qry->result();
        }else{
            return $data=array();
        }
         
    }
    //==================================== GET EMPLOYEE DATA ==========================================//  
    public function getEmpDetails($empCode=null){
        
        $this->db->select("E.`emp_code` AS `P_EMP_CODE`, 
        (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS P_EMP_TTL, 
        E.emp_name AS P_EMP_NAME,
        E.`emp_email` AS `P_EMP_MAIL`, 
        E.`emp_mobile_no` AS `P_EMP_MOB`, 
        S.`present_status` AS `P_EMP_STS`,
        S.`present_designationid` AS `P_DESG_ID`, 
        D.`name` AS `P_DESG_NAME`, 
        S.`present_subject` AS `P_SUB_ID`, 
        SB.`name` AS `P_SUB_NAME`,
        S.`present_place` AS `P_PLACE_ID`, 
        R.`name` AS `P_PLACE_NAME`,
        S.`present_unit` AS `P_UNIT_ID`, 
        RO.`name` AS `P_UNIT_NAME`, 
        S.`present_section` AS `P_SECTION_ID`, 
        IFNULL(RC.`name`,'NA') AS `P_SECTION_NAME`, 
        S.`present_school` AS `P_SCHOOL_ID`, 
        SC.`name` AS `P_SCHOOL_NAME`, 
        S.`present_kvcode` AS `P_KVCODE`, 
        S.`present_zone` AS `P_EMP_ZONE`, 
        S.`present_joiningdate` AS `P_JOIN_DATE`,
        SC.`code` AS `P_CODE`, 
        ZO.`name` AS `P_ZONE`");
        
        $this->db->from('ci_employee_details E');
        $this->db->join('ci_present_service_details S','E.emp_code=S.emp_id','Left');
        $this->db->join('ci_designations D','S.present_designationid=D.id','Left');
        $this->db->join('ci_roles R','S.present_place=R.id','Left');
        $this->db->join('ci_regions RO','S.present_unit=RO.id','Left');
        $this->db->join('ci_schools SC','S.present_school=SC.id','Left');
        $this->db->join('ci_regions ZO','S.present_zone=ZO.id','Left');
        $this->db->join('ci_subjects SB','S.present_subject=SB.id','Left');
        $this->db->join('ci_role_category RC','S.present_section=RC.id','Left');
        $this->db->where('E.emp_code=', $empCode);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            return $data=$qry->row_array();
        }else{
            return $data=array();
        }
    }
    
    //==================================== INITIATE TRANSFER REQUEST =======================================// 
    public function setTransferinitiateData($InsTrans,$typ=0){
		 //print_r($InsTrans); die();
    //show($InsTrans);
    $response = array();
    $transOrdDate   =(empty($InsTrans['transfer_orderdate']))?'NULL' : date('Y-m-d', strtotime($InsTrans['transfer_orderdate']));
    $relievOrdDate  =(empty($InsTrans['relieving_date']))?'NULL' : date('Y-m-d', strtotime($InsTrans['relieving_date']));
        
        $PostData = array(
            'emp_id' => $InsTrans['emp_id'],
            
            'present_place' => $InsTrans['present_place'],
            'present_unit' => $InsTrans['present_unit'],
            'present_section' => $InsTrans['present_section'],
            'present_school' => $InsTrans['present_school'],
            'present_designation' => $InsTrans['present_designation'],
            'present_subject' => $InsTrans['present_subject'],
            'present_kvcode' => $InsTrans['present_kvcode'],
            
            'transfer_place' => $InsTrans['transfer_place'],
            'transfer_unit' => $InsTrans['transfer_unit'],
            'transfer_section' => $InsTrans['transfer_section'],
            'transfer_school' => $InsTrans['transfer_school'],
            'transfer_designation' => $InsTrans['transfer_designation'],
            'transfer_subject' => $InsTrans['transfer_subject'],
            'transfer_kvcode' => $InsTrans['transfer_kvcode'],
            
            'transfer_orderno' => $InsTrans['transfer_orderno'],
            'transfer_date' => $transOrdDate,
            'transfer_period'=>$InsTrans['trans_period'],
            'relieving_orderno' => $InsTrans['relieving_orderno'],
            'relieving_date' => $relievOrdDate,
            
            'transfer_status'=>1, //1-Pending, 2-Accept, 3-Transfered to HQ, 0-Reject 
            'transfer_remarks'=>'NA',
            
            'created_by' => $this->session->userdata('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
            'updated_at' => date('Y-m-d H:i:s'),
            'accept_period'=>'NA',
            'in_process' => 1 // 1 - Service Record Active  / 2 - Service Completed / Transffered
        );
        $this->db->query("update ci_emp_transfer_details set in_process='0' where in_process='1' and emp_id='".$InsTrans['emp_id']."'");
        //$Lx=$this->db->last_query();
        if($this->db->insert('emp_transfer_details', $PostData)) {
            // On Successful 
           
            if($typ==1){ // Direct Transfer
                //Entry on Transfer Book
                $TranBook=array(
                'emp_id' => $InsTrans['emp_id'],
                
                'present_place' => $InsTrans['present_place'],
                'present_unit' => $InsTrans['present_unit'],
                'present_section' => $InsTrans['present_section'],
                'present_school' => $InsTrans['present_school'],
                'present_designation' => $InsTrans['present_designation'],
                'present_subject' => $InsTrans['present_subject'],
                'present_kvcode' => $InsTrans['present_kvcode'],
                'transfer_place' => $InsTrans['transfer_place'],
                'transfer_unit' => $InsTrans['transfer_unit'],
                'transfer_section' => $InsTrans['transfer_section'],
                'transfer_school' => $InsTrans['transfer_school'],
                'transfer_designation' => $InsTrans['transfer_designation'],
                'transfer_subject' => $InsTrans['transfer_subject'],
                'transfer_kvcode' => $InsTrans['transfer_kvcode'],
                'transfer_orderno' => $InsTrans['transfer_orderno'],
                'joining_date'=>$InsTrans['present_DOJ'],
                'transfer_date' => $transOrdDate,
                'transfer_period'=>$InsTrans['trans_period'],
                'relieving_orderno' => $InsTrans['relieving_orderno'],
                'relieving_date' => $relievOrdDate,
                'transfer_status'=>3, //1-Pending, 2-Accept, 3-Transfered to HQ, 0-Reject 
                'transfer_remarks'=>'Transferred',
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_at' => date('Y-m-d H:i:s'),
                'in_process' => 2 // 1 - Service Record Active  / 2 - Service Completed / Transffered
                 );
                $this->db->insert('emp_transfer_book', $TranBook);
                // Update vacancy_master
                if($InsTrans['present_kvcode']){ $code=$InsTrans['present_kvcode'];}
                if($InsTrans['present_designation']){ $desig=$InsTrans['present_designation'];}
                //$sql="update ci_vacancy_master set inposition_post=inposition_post-1 where code=$code and designation=$desig";
                if($InsTrans['present_status']==2){ // For Surplus Employee
                $sql="update ci_vacancy_master set surplus_post=surplus_post-1 where code=$code and designation=$desig";
                }
                if($InsTrans['present_status']==1){ // For Regular Employee
                $sql="update ci_vacancy_master set inposition_post=inposition_post-1 where code=$code and designation=$desig";
                }
                if($InsTrans['present_subject']){ $sub=$InsTrans['present_subject']; $sql.=" and subject=$sub";}
                //show($sql);
               $this->db->query($sql);
                
            }
            

            // Update employee_details
            if($InsTrans['emp_id']){$empId=$InsTrans['emp_id'];}
            $this->db->query("update ci_employee_details set emp_istransffered=1 where emp_code=$empId");
            
            // Set Response Status
            $response['status'] = 'success';
        } else {
            //$Lx=$this->db->last_query();
            // Set Response Status
            $response['status'] = 'error';
            $response['error'] = 'Form Could not be saved,Please try again';
        }
        return $response;
        
    }
	
    
    public function getTransferinitiateData($ExEc = NULL){
        
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name AS EMP_NAME,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            DATE_FORMAT(T.created_at,'%d-%m-%Y')AS 'REQUEST_CREATE_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.transfer_period,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        if(!empty($ExEc)){
            $this->db->where('T.emp_id', $ExEc);
            $this->db->where('T.in_process=', 1);
        }
        return $this->db->get()->row(); 
    }
    
    //============================== STEP - II (INCOMING REQUEST DETAILS) ==================================//
    public function getAllTransferEmp(){
        
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name  AS EMP_NAME,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        
        //=========================  PICK DATA AGAINST ROLEID =============================//
        $LogAcs=$this->session->userdata['role_id'];
        if($LogAcs==5){ //KV
            $this->db->where('T.transfer_school=', $this->session->userdata['school_id']);

        }elseif($LogAcs==4){ //ZEIT
            
            $ZtCode=substr($this->session->userdata('user_name'),3);
            $this->db->where('T.transfer_kvcode=',    $ZtCode);

        }elseif($LogAcs==3){ //RO
            
            $this->db->where('T.transfer_unit=',    $this->session->userdata['region_id']);

        }elseif($LogAcs==2){ //HQ
            $this->db->where('T.transfer_section=', $this->session->userdata['role_category']);

        }else{
            // for Web Admin
        }
        $this->db->where('T.in_process=', 1);
        //https://www.javahelps.com/2017/09/install-oracle-jdk-9-on-linux.html
        //$this->db->where('T.transfer_status=', 1);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        return $data;
    }
    
    //============================== STEP - III (INCOMING REQUEST DETAILS) ==================================//
    public function getAllResolutionEmp(){
        
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name AS EMP_NAME,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        
        //=========================  PICK DATA AGAINST ROLEID =============================//
        $LogAcs=$this->session->userdata['role_id'];
        $LogAcs=$this->session->userdata['role_category'];
        if($this->session->userdata['role_id']=='2' && $this->session->userdata['role_category']=='2'){ 
            $this->db->where('T.transfer_status=', 3);

        }else{
            // for Web Admin
        }
        $this->db->where('T.in_process=', 1);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        return $data;
    }
    
    public function getTransferEmpDetails($empCode=null){
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name  AS EMP_NAME,
            E.emp_email AS EMP_MAIL, E.emp_mobile_no AS EMP_MOB,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
        
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        

        $this->db->where('T.emp_id=', $empCode);
        $this->db->where('T.in_process=', 1);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->row_array();
        }else{
            $data=array();
        }
        return $data;
    }
    public function getTransferEmpPresent($EmpCode=null) {
        $preSql="P.*";
        $this->db->select($preSql);
        $this->db->from('present_service_details P');
        $this->db->where('P.emp_id=', $EmpCode);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->row_array();
        }else{
            $data=array();
        }
        return $data;
    }
    //  Request Process Start (Accept / Transferred)
    public function updateTransferData($TransData,$SubmitData,$PSD){
       // show($TransData);
       // show($PSD);
       // show($SubmitData);
        $response = array();
        $respSts=$SubmitData['status'];
        $RowId=$TransData['id'];
        //===============================Fresh Code Start ====================================//
        if($respSts=='2'){ // Accepted or Approved Request
            $CvQry= $this->db->query("SELECT (VM.sanctioned_post - VM.inposition_post) AS AVL_POST 
            FROM ci_vacancy_master  VM 
            JOIN ci_emp_transfer_details TD ON(VM.`code`=TD.transfer_kvcode)
            WHERE VM.designation=TD.transfer_designation AND VM.subject=TD.transfer_subject AND TD.id='".$RowId."'");
            $CvRes=$CvQry->row();
            $AvlPost=$CvRes->AVL_POST;
            if($AvlPost && $AvlPost>0){ // Post Available for Transfer
                
                //Update Transfer Details
                $PostDataETD = array( 'transfer_status' => 2,'transfer_remarks' => 'Approved', 'updated_by' => $this->session->userdata('user_id') ,'updated_at' => date('Y-m-d H:i:s'),'accept_period'=>$SubmitData['accept_period'],'in_process'=>2);
                $this->db->where('id=', $TransData['id']);
                $this->db->where('in_process=', 1);
                $this->db->update('ci_emp_transfer_details', $PostDataETD);
                
                //Update Employee Details
                $PostDataED = array( 'emp_istransffered' => 0,'emp_createdby'=>$this->session->userdata('user_id'),'emp_updatedon'=>date('Y-m-d H:i:s'));
                $this->db->where('emp_code=', $TransData['EMP_ID']);
                $this->db->update('ci_employee_details', $PostDataED);
                //Last Posting Place Insert Into ALL_SERVICE_DETAILS
                $AllServData = array(
                    'emp_id'=> $PSD['emp_id'],
                    'all_designationid'=> $PSD['present_designationid'],
                    'all_subjectid'=> $PSD['present_subject'],
                    'all_place'=> $PSD['present_place'],
                    'all_unit'=> $PSD['present_unit'],
                    'all_section'=> $PSD['present_section'],
                    'all_school'=> $PSD['present_school'],
                    'all_kvcode'=> $PSD['present_kvcode'],
                    'all_shift'=> $PSD['present_shift'],
                    'all_station'=> null,
                    'all_fromdate'=> $PSD['present_joiningdate'],
                    'all_todate'=> date("Y-m-d", strtotime($TransData['REL_OR_DT'])),
                    'all_appoint_trail'=> $PSD['present_appoint_trail'],
                    'all_trailsdate'=> $PSD['present_trailsdate'],
                    'all_trailedate'=> $PSD['present_trailedate'],
                    'all_regulardate'=> $PSD['present_regulardate'],
                    'transfer_ground'=> 1,
                    'all_panel_year'=> $PSD['present_panel_year'],
                    'created_by' => $this->session->userdata('user_id'),
                    'updated_by' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('all_service_details', $AllServData);
                //show($this->db->last_query());
                //Update Present Service Details
                $PostDataPSD = array(   'present_status' => 1,
                                        'present_designationid' => $TransData['transfer_designation'],
                                        'present_subject' => $TransData['transfer_subject'],
                                        'present_place' => $TransData['transfer_place'],
                                        'present_unit' => $TransData['transfer_unit'],
                                        'present_section' => $TransData['transfer_section'],
                                        'present_school' => $TransData['transfer_school'],
                                        'present_kvcode' => $TransData['TRA_KCODE'],
                                        'present_joiningdate' => date("Y-m-d"),
                                        'created_by' => $this->session->userdata('user_id'),
                                        'updated_at' => date('Y-m-d H:i:s')
                                );
                $this->db->where('emp_id=', $TransData['EMP_ID']);
                $this->db->update('ci_present_service_details', $PostDataPSD);
                
                //Update Vacancy Master
                if($TransData['TRA_KCODE']){ $code=$TransData['TRA_KCODE'];}
                if($TransData['transfer_designation']){ $desig=$TransData['transfer_designation'];}
                $sql="update ci_vacancy_master set inposition_post=inposition_post+1 where code=$code and designation=$desig";
                if($TransData['transfer_subject']){ 
                    $sub=$TransData['transfer_subject']; $sql.=" and subject=$sub";
                }
                $this->db->query($sql);
                $response['status'] = 'approved';
                $response['message'] = 'Transfer requested has been accepted.';

            }
            else{
                $response['status'] = 'error';
                $response['message'] = 'Sorry! There is no vacancy available for the transfer requested post';
            }
        }elseif ($respSts=='3') { // Transfered to HQ
            //Update Transfer Details
            $PostDataETD = array( 'transfer_status' => 3,'transfer_remarks' => $SubmitData['reason'], 'updated_by' => $this->session->userdata('user_id') ,'updated_at' => date('Y-m-d H:i:s'));
            $this->db->where('id=', $TransData['id']);
            $this->db->where('in_process=', 1);
            $this->db->update('ci_emp_transfer_details', $PostDataETD);
            
            //Update Employee Details
            $PostDataED = array( 'emp_istransffered' => 3);
            $this->db->where('emp_code=', $TransData['EMP_ID']);
            $this->db->update('ci_employee_details', $PostDataED);
            //$LS= $this->db->last_query();
            $response['status'] = 'transferred';
            $response['message'] = 'Transfer requested has been transferred to Head Quarter.';
        }else{
            $response['status'] = 'error';
            $response['message'] = 'Some Error Occured';
        }
        //===============================Fresh Code End ====================================//
        return $response;     
    }
    
    public function getTransferCompletionData($ExEc = NULL,$Resp = NULL){
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name AS EMP_NAME,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            DATE_FORMAT(T.updated_at,'%d-%m-%Y')AS 'ACCEPT_UPDATE_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.accept_period,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        if(!empty($ExEc)){
            $this->db->where('T.emp_id', $ExEc);
            $this->db->where('T.in_process=', $Resp);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->row(); 
    }
    
    public function transferHistory(){
        //=====================================================================//
        $this->db->select('id')->from('ci_users');
        $this->db->where('region_id=', $this->session->userdata['region_id']);
        $subQuery =  $this->db->get_compiled_select();
        //====================================================================//
        $sql="T.id,
            T.emp_id AS EMP_ID,
            (CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) AS EMP_TTL, 
            E.emp_name AS EMP_NAME,
            T.present_place,PP.name AS EMP_PRE_PLACE,
            T.present_unit,PU.name AS EMP_PRE_UNIT,
            T.present_section,IFNULL(PS.name,'NA') AS EMP_PRE_SECTION,
            T.present_school,IFNULL(PK.name,'NA') AS EMP_PRE_SCHOOL,
            T.present_designation,IFNULL(PD.name,'NA') AS EMP_PRE_DESIG,
            T.present_subject,IFNULL(PC.name,'NA') AS EMP_PRE_SUB,
            T.present_kvcode AS PRE_KCODE,
            (CASE WHEN T.present_place=5 THEN PKA.name ELSE PA.name END) AS EMP_PRE_AUTH,
            T.transfer_place,TP.name AS EMP_TRA_PLACE,
            T.transfer_unit,TU.name AS EMP_TRA_UNIT,
            T.transfer_section,IFNULL(TS.name,'NA') AS EMP_TRA_SECTION,
            T.transfer_school,IFNULL(TK.name,'NA') AS EMP_TRA_SCHOOL,
            T.transfer_designation,IFNULL(TD.name,'NA') AS EMP_TRA_DESIG,
            T.transfer_subject,IFNULL(TC.name,'NA') AS EMP_TRA_SUB,
            T.transfer_kvcode AS TRA_KCODE,
            (CASE WHEN T.present_place=5 THEN TKA.name ELSE TA.name END) AS EMP_TRA_AUTH,
            T.transfer_orderno AS 'TRA_OR_NO',
            DATE_FORMAT(T.transfer_date,'%d-%m-%Y') AS 'TRA_OR_DT',
            T.relieving_orderno AS 'REL_OR_NO',
            DATE_FORMAT(T.relieving_date,'%d-%m-%Y')AS 'REL_OR_DT',
            T.transfer_status,
            (CASE 
                WHEN T.transfer_status=1 THEN 'PENDING' 
                WHEN T.transfer_status=2 THEN 'ACCEPTED' 
                WHEN T.transfer_status=3 THEN 'TRANSFFERED TO HQ'
                WHEN T.transfer_status=0 THEN 'REJECTED'
				WHEN T.transfer_status=5 THEN 'REVERTED'
                ELSE 'NA' 
            END) AS EMP_TRA_STS,
            T.transfer_remarks,
            T.created_by,
            T.created_at,
            T.updated_by,
            T.updated_at,
            T.in_process";
            $this->db->select($sql);
            $this->db->from('emp_transfer_details T');
            $this->db->join('employee_details E','T.emp_id=E.emp_code','Left');
            $this->db->join('roles PP','T.present_place=PP.id','Left');
            $this->db->join('roles TP','T.transfer_place=TP.id','Left');
            $this->db->join('regions PU','T.present_unit=PU.id','Left');
            $this->db->join('regions TU','T.transfer_unit=TU.id','Left');
            $this->db->join('role_category PS','T.present_section=PS.id','Left');
            $this->db->join('role_category TS','T.transfer_section=TS.id','Left');
            $this->db->join('schools PK','T.present_school=PK.id','Left');
            $this->db->join('schools TK','T.transfer_school=TK.id','Left');
            $this->db->join('designations PD','T.present_designation=PD.id','Left');
            $this->db->join('designations TD','T.transfer_designation=TD.id','Left');
            $this->db->join('subjects PC','T.present_subject=PC.id','Left');
            $this->db->join('subjects TC','T.transfer_subject=TC.id','Left');
            $this->db->join('regions PA','T.present_kvcode=PA.code','Left');
            $this->db->join('schools PKA','T.present_kvcode=PKA.code','Left');
            $this->db->join('regions TA','T.transfer_kvcode=TA.code','Left');
            $this->db->join('schools TKA','T.transfer_kvcode=TKA.code','Left');
        
        //=========================  PICK DATA AGAINST ROLEID =============================//
        $LogAcs=$this->session->userdata['role_id'];
        if($LogAcs==5){ //KV
            $this->db->where('T.transfer_school=', $this->session->userdata['school_id']);
            $this->db->or_where('T.present_school=', $this->session->userdata['school_id']);
        }elseif($LogAcs==3 || $LogAcs==4){ //RO/ZEIT
            $this->db->where('T.transfer_unit=',    $this->session->userdata['region_id']);
            $this->db->or_where('T.present_unit=',    $this->session->userdata['region_id']);
        }elseif($LogAcs==2){ //HQ
            $this->db->where('T.transfer_section=', $this->session->userdata['role_category']);
            $this->db->or_where('T.present_section=', $this->session->userdata['role_category']);
        }else{
            // for Web Admin
        }
        //$this->db->where('T.in_process=', 1);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->result();
        }else{
            $data=array();
        }
        //show($data);
        return $data;
        //$this->db->where("T.created_by IN ($subQuery)", NULL, FALSE);
        
    }
    //========================================= LPC DATA =================================//
    public function EmployeeLPC($EmpCode = NULL){
        $sql="(CASE WHEN E.emp_title=1 THEN 'Sh.' WHEN E.emp_title=2 THEN 'Smt.' WHEN E.emp_title=3 THEN 'Ms.' END) 'emp_title', E.emp_name,E.emp_code,E.emp_gender,
        E.emp_gpfcpfnps,E.emp_gpfcpfnpsnumber,
        P.present_designationid,
        D.`name` 'designation',
        P.present_subject,
        S.`name` 'subject',
        P.present_kvcode,
        K.`name` 'school',
        T.transfer_period";
        $this->db->select($sql);
        $this->db->from('employee_details E');
        $this->db->join('present_service_details P','P.emp_id=E.emp_code','Left');
        $this->db->join('designations D','D.id=P.present_designationid','Left');
        $this->db->join('subjects S','S.id=P.present_subject','Left');
        $this->db->join('schools K','K.`code`=P.present_kvcode','Left');
        $this->db->join('emp_transfer_details T','T.emp_id=E.emp_code AND T.in_process=1','Left');
        $this->db->where('E.emp_code=', $EmpCode);
        $qry=$this->db->get();
        //show($this->db->last_query());
        if($qry->num_rows())
        {
            $data=$qry->row();
        }else{
            $data=array();
        }
        //show($data);
        return $data;
    }
    public function SubmitLPC($L){
            $DataSet=array(
                'emp_id'=>$L['emp_id'],
                'emp_name'=>$L['emp_name'],
                'emp_post'=>$L['emp_post'],
                'emp_sub'=>$L['emp_sub'],
                'emp_loc'=>$L['emp_loc'],
                'leave_from'=>$L['leave_from'],
                'leave_to'=>$L['leave_to'],
                'paid_upto'=>$L['paid_upto'],
                'sub_pay'=>$L['sub_pay'],
                'off_pay'=>$L['off_pay'],
                'teach_all'=>$L['teach_all'],
                'dear_all'=>$L['dear_all'],
                'house_all'=>$L['house_all'],
                'city_all'=>$L['city_all'],
                'trans_all'=>$L['trans_all'],
                'hill_all'=>$L['hill_all'],
                'winter_all'=>$L['winter_all'],
                'income_tax'=>$L['income_tax'],
                'gpf_cpf_nps_sub'=>$L['gpf_cpf_nps_sub'],
                'gpf_cpf_nps_adv'=>$L['gpf_cpf_nps_adv'],
                'group_scheme'=>$L['group_scheme'],
                'gpf_cpf_nps_ac_1'=>$L['gpf_cpf_nps_ac_1'],
                'ac_gen'=>$L['ac_gen'],
                'gpf_cpf_nps_ac_2'=>$L['gpf_cpf_nps_ac_2'],
                'gpf_cpf_nps_rs'=>$L['gpf_cpf_nps_rs'],
                'welfare_rs'=>$L['welfare_rs'],
                'month_upto'=>$L['month_upto'],
                'made_over'=>$L['made_over'],
                'noon_type'=>$L['noon_type'],
                'made_over_date'=>$L['made_over_date'],
                'paid_leave_from_1'=>$L['paid_leave_from'][0],
                'paid_leave_to_1'=>$L['paid_leave_to'][0],
                'paid_leave_rs_1'=>$L['paid_leave_rs'][0],
                'paid_leave_month_1'=>$L['paid_leave_month'][0],
                'paid_leave_from_2'=>$L['paid_leave_from'][1],
                'paid_leave_to_2'=>$L['paid_leave_to'][1],
                'paid_leave_rs_2'=>$L['paid_leave_rs'][1],
                'paid_leave_month_2'=>$L['paid_leave_month'][1],
                'paid_leave_from_3'=>$L['paid_leave_from'][2],
                'paid_leave_to_3'=>$L['paid_leave_to'][2],
                'paid_leave_rs_3'=>$L['paid_leave_rs'][2],
                'paid_leave_month_3'=>$L['paid_leave_month'][2],
                'pay_from_date'=>$L['pay_from_date'],
                'pay_to_date'=>$L['pay_to_date'],
                'join_in_date_time'=>$L['joining_time'],
                'letter_no'=>$L['letter_no'],
                'cr_by'=>$this->session->userdata('user_id'),
                'cr_date'=>date('Y-m-d H:i:s')
            );
            if($this->db->insert('emp_lpc', $DataSet)) {
            // On Successful 
            // Set Response Status
            $response['status'] = 'success';
        } else {
            //$Lx=$this->db->last_query();
            // Set Response Status
            $response['status'] = 'error';
            $response['error'] = 'Form Could not be saved,Please try again';
        }
        return $response;
    }
}
