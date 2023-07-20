<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Tools_model extends CI_Model {
	public function __construct(){
        parent::__construct();
	//show($this->session->all_userdata['user_id']);
        }
	public function GetRecipient($ST = null){
        $sql="E.emp_code 'ID',
        CONCAT(E.emp_name,' ( ',D.alias,' ) - ',E.emp_code) 'NAME'";
        $this->db->select($sql);
        $this->db->from('employee_details E');
        $this->db->join('present_service_details P','E.emp_code=P.emp_id','Left');
        $this->db->join('designations D','P.present_designationid=D.id','Left');
        $this->db->where('D.cat_id',1);
        $this->db->where('P.present_kvcode', $this->master_code);
        if($ST != null || $ST!='undefined'){
            $this->db->group_start();
            $this->db->like('E.emp_code', urldecode($ST));
            $this->db->or_like('E.emp_name',urldecode($ST));
            $this->db->group_end();
            $this->db->limit(100);
        }else if($ST != null && $ST=='undefined'){
            $this->db->limit(7);
        }else{
            $this->db->limit(7);
        }
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
    }
/*
    public function GetRecipient($ST = null){
        $sql="E.emp_code 'ID',
        CONCAT(E.emp_name,' ( ',D.alias,' ) - ',E.emp_code) 'NAME'";
        $this->db->select($sql);
        $this->db->from('employee_details E');
        $this->db->join('present_service_details P','E.emp_code=P.emp_id','Left');
        $this->db->join('designations D','P.present_designationid=D.id','Left');
        $this->db->where('D.cat_id',1);
        if($ST != null || $ST!='undefined'){
            $this->db->like('E.emp_code', urldecode($ST));
            $this->db->or_like('E.emp_name',urldecode($ST));
            $this->db->limit(100);
        }else if($ST != null && $ST=='undefined'){
            $this->db->limit(7);
        }else{
            $this->db->limit(7);
        }
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
    }
*/
    public function GetEmpBasic($EmpId=null) {
        $EmpMas="SELECT 
                E.emp_code 'ECODE',
                CONCAT((CASE 
                        WHEN E.emp_title=1 THEN 'Sh.' 
                        WHEN E.emp_title=2 THEN 'Smt.' 
                        WHEN E.emp_title=3 THEN 'Ms.' 
                        WHEN E.emp_title=4 THEN 'Dr.'
                        ELSE '' END),' ',emp_name) 'ENAME',
                        E.emp_email 'EMAIL',
                        R.`name` 'EREGION',
                        K.`code` 'KCODE',
                        K.`name` 'KNAME',
                        D.`name` 'EDESIG',
                        IFNULL(S.`name`,'NA') 'ESUBJECT'
                FROM ci_employee_details E
                LEFT JOIN ci_present_service_details P ON(E.emp_code=P.emp_id)
                LEFT JOIN ci_regions R ON (P.present_unit=R.id)
                LEFT JOIN ci_schools K ON(P.present_school=K.id)
                LEFT JOIN ci_designations D ON(P.present_designationid=D.id)
                LEFT JOIN ci_subjects S ON(P.present_subject=S.id)
                WHERE emp_code=$EmpId";
        $query = $this->db->query($EmpMas);
        if($query->num_rows() > 0) {
            return $query->result_object();
        } else {
            return array();
        }
    }
    public function setObservedData($ObsData=null) {
        
        $MasterData=array(
            'emp_code' => $ObsData['emp_code'],
            'emp_name' => $ObsData['emp_name'],
            'emp_mail' => $ObsData['emp_mail'],
            'emp_region' => $ObsData['emp_region'],
            'emp_kvname' => $ObsData['emp_kvname'],
            'emp_kvcode' => $ObsData['emp_kvcode'],
            'emp_desig' => $ObsData['emp_desig'],
            'emp_subject' => $ObsData['emp_subject'],
            'obs_name' => $ObsData['obs_name'],
            'obs_desig' => $ObsData['obs_desig'],
            'obs_region' => $ObsData['obs_region'],
            'obs_unit' => $ObsData['obs_unit'],
            'obs_class' => $ObsData['obs_class'],
            'obs_subject' => $ObsData['obs_subject'],
            'obs_section' => $ObsData['obs_section'],
            'stu_onroll' => $ObsData['stu_onroll'],
            'stu_present' => $ObsData['stu_present'],
            'stu_absent' => $ObsData['stu_absent'],
            'obs_topic' => $ObsData['obs_topic'],
            'obs_sub_topic' => $ObsData['obs_sub_topic'],
            'obs_competency' => $ObsData['obs_competency'],
            'obs_time_period' => $ObsData['obs_time_period'],
            'lession_topic' => implode("#",$ObsData['lession_topic']),
            'lession_topic_txt' => $ObsData['lession_topic_txt'],
            'lession_plan' => implode("#",$ObsData['lession_plan']),
            'lession_plan_txt' => $ObsData['lession_plan_txt'],
            'learner_skill' => $ObsData['learner_skill'],
            'teacher_student' => implode("#",$ObsData['teacher_student']),
            'teacher_student_txt' => $ObsData['teacher_student_txt'],
            'application_tlm' => implode("#",$ObsData['application_tlm']),
            'application_tlm_txt' => $ObsData['application_tlm_txt'],
            'student_involve' => implode("#",$ObsData['student_involve']),
            'student_involve_txt' => $ObsData['student_involve_txt'],
            'assignment_mode' => $ObsData['assignment_mode'],
            'online_platform_txt' => $ObsData['online_platform_txt'],
            'video_link_txt' => $ObsData['video_link_txt'],
            'int_worksheet_txt' => $ObsData['int_worksheet_txt'],
            'non_int_worksheet' => $ObsData['non_int_worksheet'],
            'non_int_assignment' => $ObsData['non_int_assignment'],
            'assignment_mode_txt' => $ObsData['assignment_mode_txt'],
            'obs_findings' => $ObsData['obs_findings'],
            'comm_skill' => $ObsData['comm_skill'],
            'maintain_mode' => $ObsData['maintain_mode'],
            'obs_planned' => $ObsData['obs_planned'],
            'teacher_improve' => implode("#",$ObsData['teacher_improve']),
            'teacher_improve_txt' => $ObsData['teacher_improve_txt'],
            'instruction_tool' => implode("#",$ObsData['instruction_tool']),
            'instruction_tool_txt' => $ObsData['instruction_tool_txt'],
            'classroom_tool' => implode("#",$ObsData['classroom_tool']),
            'classroom_tool_txt' => $ObsData['classroom_tool_txt'],
            'assessment_tool' => implode("#",$ObsData['assessment_tool']),
            'assessment_tool_txt' => $ObsData['assessment_tool_txt'],
            'planning_tool' => implode("#",$ObsData['planning_tool']),
            'planning_tool_txt' => $ObsData['planning_tool_txt'],
            'instruction_tool2' => implode("#",$ObsData['instruction_tool2']),
            'instruction_tool_txt2' => $ObsData['instruction_tool_txt2'],
            'classroom_tool2' => implode("#",$ObsData['classroom_tool2']),
            'classroom_tool_txt2' => $ObsData['classroom_tool_txt2'],
            'assessment_tool2' => implode("#",$ObsData['assessment_tool2']),
            'assessment_tool_txt2' => $ObsData['assessment_tool_txt2'],
            'overall_grading' => $ObsData['overall_grading'],
            'overall_briefing' => $ObsData['overall_briefing'],
            'overall_briefing_txt' => $ObsData['overall_briefing_txt'],
            'overall_rating' => $ObsData['overall_rating'],
            'obs_sub_date' => $ObsData['obs_sub_date'],
            'created_by' => $this->auth_user_id
        );
       
        // show($PostData);
        if($ObsData['emp_sno']=='0'){ //New Record Insert
            if($this->db->insert('ci_classroom_tools', $MasterData)) {
                //show($this->db->last_query());
                return 1;
            }else{
                return 3;
            }
        }else{
            $this->db->where('sno',$ObsData['emp_sno']);
            if($this->db->update('ci_classroom_tools', $MasterData)) {
                //show($this->db->last_query());
                return 1;
            }else{
                return 3;
            }
        }
    }
    public function getObservedData($Sno){
        $getED="SELECT * FROM ci_classroom_tools
                WHERE sno=$Sno";
        $query = $this->db->query($getED);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function getAllObservedProfile($limit=null,$start=null,$col=null,$dir=null,$search=null,$post_data=null)
    {
        //show($post_data);
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(sno) as total');
            $this->db->from('ci_classroom_tools');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        
        $this->db->select("SQL_CALC_FOUND_ROWS
                            W.sno,
                            W.emp_code,
                            W.emp_name,
                            W.emp_region,
                            W.emp_kvname,
                            W.emp_desig,
                            W.emp_subject,
                            W.obs_name,
                            D.`name`obs_desig,
                            W.overall_grading,
                            K.region_id,K.id,
                            DATE_FORMAT(W.created_at,'%d-%m-%Y %H:%i:%s')created_at,
                            W.created_by",false);
        $this->db->from('ci_classroom_tools W');
        $this->db->join('ci_schools K','W.emp_kvcode=K.code','Left');
        $this->db->join('ci_web_tools_author D','W.obs_desig=D.id','Left');
        
        if($this->role_id==1){
            
        }else if($this->role_id==3){
            $this->db->where("K.region_id", $this->region_id);
        }else if($this->role_id==5){
            $this->db->where("W.emp_kvcode", $this->master_code);
        }
        /*============filter for report=======================================  */
        if(isset($post_data['initial_region_id'])&& !empty($post_data['initial_region_id'])){
               $this->db->where('K.region_id',$post_data['initial_region_id']);
        }
        if(isset($post_data['initial_school_id'])&& !empty($post_data['initial_school_id'])){
               $this->db->where('K.id',$post_data['initial_school_id']);
        }

        if($limit > 0){
            $this->db->limit($limit,$start);
        }
        if($col){
            $this->db->order_by($col,$dir);
        }
        if($search && !empty($search)) {
            $this->db->group_start();
            $this->db->like('W.emp_name', urlencode($search));
            $this->db->or_like('W.emp_code', $search);
            $this->db->group_end();
        }
        $qry=$this->db->get();
        //show($lq=$this->db->last_query());
        
	if($qry->num_rows()){
            $data['result']=$qry->result();
        }else{
            $data['result']=array();
        }
        
        $total = $this->db->query("SELECT FOUND_ROWS() AS count"); 
        $data['count']=isset($total->row()->count)?$total->row()->count:0;
        return $data;
        
    }
    function fetch_observed_data($RoId=null,$KvId=null){
        $UsrId=$this->auth_user_id;
        $RolId=$this->role_id;	
        $RegId=$this->region_id;
        $KvsId=$this->school_id;
        $this->db->select("SQL_CALC_FOUND_ROWS
            C.emp_region 'REG',C.emp_kvname 'KVN', C.emp_kvcode 'KVC',C.emp_name 'EMP',
            C.emp_code 'EMC',C.emp_desig 'POS',C.emp_subject 'SUB',C.obs_name 'OBS', 
            C.obs_desig 'OBD',C.obs_region 'REGION',C.obs_unit 'UNIT',C.overall_grading 'GRD', DATE_FORMAT(C.updated_at,'%d-%m-%Y %H:%i:%s') 'ODT'",false);
        $this->db->from('ci_classroom_tools C');
        $this->db->join('ci_schools K','C.emp_kvcode=K.code','Left');
        if($RolId==1){ 
            if (is_numeric($RoId)){
                $this->db->where('K.region_id',$RoId);
            }
            if (is_numeric($KvId)){
                $this->db->where('K.id',$KvId);
            }
        } // For Admin End
        
        if($RolId==3){ 
            $this->db->where('K.region_id',$RegId);
            if (is_numeric($KvId)){
                $this->db->where('K.id',$KvId);
            }
        } // For RO End
        
        if($RolId==5){ 
            $this->db->where('K.region_id',$RegId);
            $this->db->where('K.id',$KvsId);
        } // For KV End
        
        $this->db->order_by("C.sno", "ASC");
        $qry=$this->db->get();
        //$lq=$this->db->last_query();
	if($qry->num_rows()){
            return $data['result']=$qry->result();
        }else{
            return $data['result']=array();
        }
    }
    public function addObserver($PD) {
        $response = array();
        unset($PD['cpassword']);
        $UserData = array(
            'role_id'       => 5,
            'role_category' => 3,
            'region_id'     => $this->region_id,
            'school_id'     => $this->school_id,
            'username'      => "CO.".$PD['observer_id'],
            'password'      => hash('sha512', $PD['password']),
            'email_id'      => $this->email_id ,
            'status'        => 1,
            'is_password_changed'=>1,
            'created' => date("Y-m-d H:i:s")
        );
        if($this->db->insert('users', $UserData)) {
            add_user_activity($this->session->userdata('user_id'),$this->db->insert_id(), 'ADD', 'Added User Successfully','User Module');
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['error'] = 'Form Could not be saved,Please try again';
        }
        return $response;
    }
    public function ObserverList() {
        $this->db->select("U.id ID,
            U.username USER_ID,E.emp_name OBSERVER_NAME,D.alias DESIGNATION,R.`name` REGION,
            IFNULL(S.`name`,R.`name`) UNIT,(CASE WHEN U.`status`= 1 THEN 'ACTIVE' ELSE 'SUSPEND' END) `STATUS`",false);
        $this->db->from('ci_users U');
        $this->db->join('ci_employee_details E','SUBSTRING(U.username,4)=E.emp_code','Left');
        $this->db->join('ci_present_service_details P','SUBSTRING(U.username,4)=P.emp_id','Left');
        $this->db->join('ci_designations D','P.present_designationid=D.id','Left');
        $this->db->join('ci_regions R','P.present_unit=R.id','Left');
        $this->db->join('ci_schools S','P.present_school=S.id','Left');
        $this->db->where('U.role_id',5);
        $this->db->where('U.role_category',3);
        $this->db->where('U.school_id',$this->school_id);
        $qry=$this->db->get();
        //$lq=$this->db->last_query();
	if($qry->num_rows()){
            return $data['result']=$qry->result();
        }else{
            return $data['result']=array();
        }
    }
    public function logObservedProfile($EmpId=null){
        $this->db->select("E.emp_name OBS,(CASE 
            WHEN P.present_designationid IN(19,20,21,22) THEN 1 
            WHEN P.present_designationid IN(23,24,25,26) THEN 2 
            WHEN P.present_designationid IN(1) THEN 3 
            WHEN P.present_designationid IN(3) THEN 4 
            WHEN P.present_designationid IN(4) THEN 5 
            ELSE 0 END) DESIG_ID, D.alias DESIG,R.`name` REGION,IFNULL(S.`name`,R.`name`) UNIT");
        $this->db->from('ci_employee_details E');
        $this->db->join('ci_present_service_details P','E.emp_code=P.emp_id','Left');
        $this->db->join('ci_designations D','P.present_designationid=D.id','Left');
        $this->db->join('ci_regions R','P.present_unit=R.id','Left');
        $this->db->join('ci_schools S','P.present_school=S.id','Left');
        if($this->session->userdata('role_category')==3){ //OBSERVER
            $this->db->where('E.emp_code',$EmpId);
        }
        if($this->session->userdata('role_category')==0){ //PRINCIPAL
            $this->db->where('P.present_kvcode',$EmpId);
            $this->db->where('P.present_designationid',1);
        }
        if($this->session->userdata('role_category')==1){ // VICE PRINCIPAL
            $this->db->where('P.present_kvcode',$EmpId);
            $this->db->where('P.present_designationid',3);
        }
        if($this->session->userdata('role_category')==2){ // HMS
            $this->db->where('P.present_kvcode',$EmpId);
            $this->db->where('P.present_designationid',4);
        }
        $qry=$this->db->get();
        //show($lq=$this->db->last_query());
	if($qry->num_rows()){
            return $qry->row();
        }else{
            return array();
        }
    }
}
