<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Tools_model extends CI_Model {
	public function __construct(){
        parent::__construct();
	//show($this->session->userdata['user_id']);
        }
    public function GetRecipient($ST = null){
        $sql="E.emp_code 'ID',
        CONCAT(E.emp_name,' - [ ',E.emp_code,' ]') 'NAME'";
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
        //show($ObsData);
        $PostData = array('emp_code' => $ObsData['emp_code'],
                    'emp_name' => $ObsData['emp_name'],
                    'emp_mail' => $ObsData['emp_mail'],
                    'emp_region' => $ObsData['emp_region'],
                    'emp_kvname' => $ObsData['emp_kvname'],
                    'emp_kvcode' => $ObsData['emp_kvcode'],
                    'emp_desig' => $ObsData['emp_desig'],
                    'emp_subject' => $ObsData['emp_subject'],
                    'obs_name' => $ObsData['obs_name'],
                    'obs_desig' => $ObsData['obs_desig'],
                    'obs_class' => $ObsData['obs_class'],
                    'obs_section' => $ObsData['obs_section'],
                    'stu_onroll' => $ObsData['stu_onroll'],
                    'stu_present' => $ObsData['stu_present'],
                    'stu_absent' => $ObsData['stu_absent'],
                    'obs_subject' => $ObsData['obs_subject'],
                    'obs_topic' => $ObsData['obs_topic'],
                    'obs_sub_topic' => $ObsData['obs_sub_topic'],
                    'obs_competency' => $ObsData['obs_competency'],
                    'obs_time_period' => $ObsData['obs_time_period'],
                    'lession_topic' => implode("#",$ObsData['lession_topic']),
                    'lession_plan' => implode("#",$ObsData['lession_plan']),
                    'learner_skill' => $ObsData['learner_skill'],
                    'teacher_student' => implode("#",$ObsData['teacher_student']),
                    'audio_visual' => $ObsData['audio_visual'],
                    'student_involve' => implode("#",$ObsData['student_involve']),
                    'project_work' => $ObsData['project_work'],
                    'frequency_quality' => $ObsData['frequency_quality'],
                    'obs_findings' => $ObsData['obs_findings'],
                    'comm_skill' => $ObsData['comm_skill'],
                    'obs_records' => $ObsData['obs_records'],
                    'obs_planned' => $ObsData['obs_planned'],
                    'teacher_improve' => implode("#",$ObsData['teacher_improve']),
                    'instruction_tool' => implode("#",$ObsData['instruction_tool']),
                    'classroom_tool' => implode("#",$ObsData['classroom_tool']),
                    'assessment_tool' => implode("#",$ObsData['assessment_tool']),
                    'planning_tool' => implode("#",$ObsData['planning_tool']),
                    'suggestion_tool' => implode("#",$ObsData['suggestion_tool']),
                    'management_tool' => implode("#",$ObsData['management_tool']),
                    'action_tool' => implode("#",$ObsData['action_tool']),
                    'obs_grading' => $ObsData['obs_grading'],
                    'per_garding' => $ObsData['per_garding'],
                    'obs_sub_date' => $ObsData['obs_sub_date'],
                    'lession_topic_txt' => $ObsData['lession_topic_txt'],
                    'lession_plan_txt' => $ObsData['lession_plan_txt'],
                    'teacher_student_txt' => $ObsData['teacher_student_txt'],
                    'student_involve_txt' => $ObsData['student_involve_txt'],
                    'teacher_improve_txt' => $ObsData['teacher_improve_txt'],
                    'instruction_tool_txt' => $ObsData['instruction_tool_txt'],
                    'classroom_tool_txt' => $ObsData['classroom_tool_txt'],
                    'assessment_tool_txt' => $ObsData['assessment_tool_txt'],
                    'planning_tool_txt' => $ObsData['planning_tool_txt'],
                    'suggestion_tool_txt' => $ObsData['suggestion_tool_txt'],
                    'management_tool_txt' => $ObsData['management_tool_txt'],
                    'action_tool_txt' => $ObsData['action_tool_txt'],
                    'created_by' => $this->auth_user_id,
                    'created_on' => date('Y-m-d'));
        // show($PostData);
        if($ObsData['emp_sno']=='0'){ //New Record Insert
            if($this->db->insert('web_tools', $PostData)) {
                //show($this->db->last_query());
                return 1;
            }else{
                return 3;
            }
        }else{
            $this->db->where('sno',$ObsData['emp_sno']);
            if($this->db->update('web_tools', $PostData)) {
                //show($this->db->last_query());
                return 1;
            }else{
                return 3;
            }
        }
    }
    public function getObservedData($Sno){
        $getED="SELECT * FROM ci_web_tools
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
        if(func_num_args()==0)//this is used for getting total number of records
        {
            $this->db->select('count(sno) as total');
            $this->db->from('ci_web_tools');
            $qry=$this->db->get();
            return $qry->row()->total;
        }
        
        $this->db->select("SQL_CALC_FOUND_ROWS
                            W.sno,
                            W.emp_code,
                            W.emp_name,
                            W.emp_region,
                            W.emp_kvname,
                            W.emp_kvcode,
                            W.obs_name,
                            W.obs_grading,
                            W.created_on,W.created_by",false);
        $this->db->from('ci_web_tools W');
        if($this->role_id==1){
            
        }else{
            $this->db->where("W.created_by", $this->auth_user_id);
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
    function fetch_observed_data(){
        $this->db->order_by("sno", "ASC");
        $query = $this->db->get("web_tools");
        return $query->result();
    }
}
