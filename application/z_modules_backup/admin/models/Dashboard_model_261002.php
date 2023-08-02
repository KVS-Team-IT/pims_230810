<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
class Dashboard_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        //show($this->session->userdata());
    }
    //======================== UPADETD DASHBOARD QUERY(KVS ADMIN) =======================//
    public function VacancyMasterADM(){
        $this->db->select("
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'");
        $this->db->from("vacancy_master");
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    public function TotalInPosADM(){
        $this->db->select("
            SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
            SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
            SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'");
        $this->db->from("present_service_details PS");
        $this->db->join("designations DS", "DS.id=PS.present_designationid", "LEFT");
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    public function TotalTransADM(){
        $this->db->select("
            SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
            SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'");
        $this->db->from("emp_transfer_details");
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return array();
        }
    }
    public function ChartInPosADM() {
        $this->db->select("
            COUNT(PS.id) AS 'INP',
            CONCAT(RO.`name`,'( ',RO.label,' )') AS 'NAME' ");
        $this->db->from("present_service_details PS");
        $this->db->join("regions RO", "PS.present_unit=RO.id", "LEFT");
        $this->db->group_by("PS.present_unit"); 
        $this->db->order_by("RO.type","DESC");
        $this->db->order_by("RO.name","ASC");
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return array();
        }
    }
    public function ChartSacHQ() {
        $SacKvsHQ="SELECT 
        SUM(VC.sanctioned_post) AS 'SAC',
        SUM(VC.inposition_post) AS 'INP',
        HQ.id AS 'ID',
        HQ.`name` AS 'NAME',
        US.role_id AS 'RID',
        US.id AS 'UID',
        VC.`code` AS 'MAC',
        RO.id AS 'REG',
        0 AS 'KID'
        FROM ci_vacancy_master VC
	LEFT JOIN (SELECT id,`name`,`code`,type,label,parent,`status` FROM ci_regions WHERE type=2 AND `status`=1)HQ ON (VC.`code`=HQ.`code`)
	LEFT JOIN (SELECT id,`name`,`code`,type,label,parent,`status` FROM ci_regions WHERE type=3 AND `status`=0)RO ON (RO.`code`=HQ.`code`)
	LEFT JOIN (SELECT id,role_id,role_category,region_id,school_id FROM ci_users WHERE role_id=1 AND role_category=0) US ON(RO.id=US.region_id)
        WHERE VC.`status`=1 AND VC.type=2";
        $query = $this->db->query($SacKvsHQ);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function ChartSacRO() {
        $SacRoKV="SELECT SUM(RX.SAC) AS 'SAC',SUM(RX.INP) AS 'INP',RX.ID,CONCAT(R.`name`,' ',R.label) AS 'NAME',
        RX.RID,RX.UID,R.`code` AS 'MAC',R.id AS 'REG', 0 AS 'KID'
        FROM(SELECT 
            SUM(VC.sanctioned_post) AS 'SAC',
            SUM(VC.inposition_post) AS 'INP',
            (CASE WHEN VC.type=5 THEN KV.region_id ELSE RO.id END) AS 'ID',US.role_id AS 'RID',US.id AS 'UID'
            FROM ci_vacancy_master VC
            LEFT JOIN ci_schools KV ON (VC.`code`=KV.`code`)
            LEFT JOIN (SELECT id,`name`,`code`,type,label,parent,`status` FROM ci_regions WHERE type=3 AND `status`=1)RO ON (VC.`code`=RO.`code`)
            LEFT JOIN (SELECT id,role_id,role_category,region_id,school_id FROM ci_users WHERE role_id=3) US ON(RO.id=US.region_id)
            WHERE VC.`status`=1 AND VC.type IN(3,5) GROUP BY VC.id
            ) RX
        LEFT JOIN ci_regions R  ON(R.id=RX.ID) 
	GROUP BY RX.ID ORDER BY R.`name` DESC";
        $query = $this->db->query($SacRoKV);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function ChartSacZT() {
        $SacKvsZT="SELECT 
        SUM(VC.sanctioned_post) AS 'SAC',
        SUM(VC.inposition_post) AS 'INP',
        RO.id AS 'ID',
        CONCAT(RO.`name`,' ',RO.label) AS 'NAME',
        US.role_id AS 'RID',
        US.id AS 'UID',
        RO.`code` AS 'MAC',
        0 AS 'REG',
        0 AS 'KID'
        FROM ci_vacancy_master VC
        LEFT JOIN ci_regions RO ON (VC.`code`=RO.`code` AND RO.type=4)
	LEFT JOIN ci_users US ON(US.region_id=RO.parent)
        WHERE VC.`status`=1 AND VC.type=4 GROUP BY VC.`code` ORDER BY RO.`name` DESC";
        $query = $this->db->query($SacKvsZT);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //====================== UPADETD DASHBOARD QUERY(KVS ADMIN) END  ======================//
    //
    //
    //
    //===================== UPADETD DASHBOARD QUERY(REGIONAL OFFICE) ======================//
    public function getRoDetails( $AuthId=null,$RoID=null ){
        $this->db->select('U.id,U.role_id,U.role_category,U.region_id,U.school_id,R.`name` AS role_name,RO.`name` AS region_name ,SC.`name` AS school_name');
        $this->db->from('ci_users U');
        $this->db->join('ci_roles R', 'U.role_id=R.id', 'LEFT');
        $this->db->join('ci_regions RO', 'U.region_id=RO.id', 'LEFT');
        $this->db->join('ci_regions SC', 'U.school_id=SC.id', 'LEFT');
        //$this->db->join('schools S', 'U.school_id=S.id', 'LEFT');
        if(!empty($AuthId)){
             $this->db->where('U.id=', $AuthId);
        }
        return $this->db->get()->row();
    }
    public function VacancyMasterROKV($RoID=null){
        $VacRoKV="SELECT
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'
        FROM ci_vacancy_master 
        WHERE `code` IN(SELECT `code` from ci_schools WHERE region_id=$RoID)";
        $query = $this->db->query($VacRoKV);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function VacancyMasterRO($RoID=null){
        $VacRO="SELECT
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'
        FROM ci_vacancy_master 
        WHERE `code`= (SELECT `code` from ci_regions WHERE id=$RoID)";
        $query = $this->db->query($VacRO);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    
    public function TotalInPosROKV($RoID=null){
        $PPRoKV="SELECT 
        SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'
        FROM ci_present_service_details PS
        LEFT JOIN ci_designations DS ON(DS.id=PS.present_designationid)
        WHERE PS.present_kvcode IN (SELECT `code` from ci_schools WHERE region_id=$RoID)";
        $query = $this->db->query($PPRoKV);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalInPosRO($RoID=null){
        $PPRo="SELECT 
        SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'
        FROM ci_present_service_details PS
        LEFT JOIN ci_designations DS ON(DS.id=PS.present_designationid)
        WHERE PS.present_kvcode = (SELECT `code` from ci_regions WHERE id=$RoID)";
        $query = $this->db->query($PPRo);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalTransROKV($RoID=null){
        $TRRoKv="SELECT 
        SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
        SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'
        FROM ci_emp_transfer_details
        WHERE present_kvcode IN (SELECT `code` from ci_schools WHERE region_id=$RoID)";
        $query = $this->db->query($TRRoKv);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalTransRO($RoID=null){
        $TRRo="SELECT 
        SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
        SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'
        FROM ci_emp_transfer_details
        WHERE present_kvcode = (SELECT `code` from ci_regions WHERE id=$RoID)";
        $query = $this->db->query($TRRo);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function ChartInPosROKV($RoID=null) {
        $CIRoKv="SELECT COUNT(PS.id) AS 'INP', `KV`.`name` AS 'NAME'
        FROM `ci_present_service_details` `PS`
        LEFT JOIN `ci_schools` `KV` ON `PS`.`present_kvcode`=`KV`.`code`
        WHERE `PS`.`present_unit`=$RoID AND `PS`.`present_place`=5
        GROUP BY `KV`.`code` ORDER BY  `KV`.`name` ASC";
        $query = $this->db->query($CIRoKv);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function ChartInPosRO($RoID=null) {
        $CIRo="SELECT COUNT(PS.id) AS 'INP', CONCAT(RO.`name`, '( ', `RO`.`label`, ' )') AS 'NAME'
        FROM `ci_present_service_details` `PS`
        LEFT JOIN `ci_regions` `RO` ON `PS`.`present_unit`=`RO`.`id`
        WHERE `PS`.`present_unit`=$RoID AND `PS`.`present_place`=3
        ORDER BY `RO`.`name` ASC";
        $query = $this->db->query($CIRo);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function CIISacROKV($RoID=null){
        $CIIRoKv="SELECT 
        SUM(V.sanctioned_post) AS 'SAC',SUM(V.inposition_post) AS 'INP',K.id AS 'ID',K.`name` AS 'NAME'
        FROM ci_vacancy_master V
        LEFT JOIN ci_schools K ON(V.`code`=K.`code`)
        WHERE V.type=5 AND K.region_id=$RoID GROUP BY V.`code`  ORDER BY K.`name` DESC";
        $query = $this->db->query($CIIRoKv);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function CIISacRO($RoID=null){
        $CIIRo="SELECT 
        SUM(V.sanctioned_post) AS 'SAC',SUM(V.inposition_post) AS 'INP',R.id AS 'ID',CONCAT(R.`name`,' ( ',R.label,' )') AS 'NAME'
        FROM ci_vacancy_master V
        LEFT JOIN ci_regions R ON(V.`code`=R.`code`)
        WHERE V.type=3 AND R.id=$RoID GROUP BY V.`code`  ORDER BY R.`name` DESC";
        $query = $this->db->query($CIIRo);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //=================== UPADETD DASHBOARD QUERY(REGIONAL OFFICE)END =====================//
    //
    //================ UPADETD DASHBOARD QUERY(KENDRIYA VIDYALAYA)START =====================//
    public function getKvDetails($KvID=null){

        $KvSql="SELECT 
        K.id AS 'KV_ID',K.`code` AS 'KV_CODE',K.`name` AS 'KV_NAME',R.`name` AS 'KV_REGION',
        U.id AS	'KV_UID',U.role_id AS 'KV_ROLE',C.label AS 'KV_PLACE'
        FROM ci_schools K 
        LEFT JOIN ci_regions R ON(K.region_id=R.id)
        LEFT JOIN ci_users U ON(K.id=U.school_id)
        LEFT JOIN ci_roles C ON(U.role_id=C.id)
        WHERE K.id=$KvID";
        $query = $this->db->query($KvSql);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function VacancyMasterKV($KvID = null){
        $VacKV="SELECT
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'
        FROM ci_vacancy_master 
        WHERE `code`= (SELECT `code` from ci_schools WHERE id=$KvID)";
        $query = $this->db->query($VacKV);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalInPosKV($KvID = null){
        $PPKv="SELECT 
        SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'
        FROM ci_present_service_details PS
        LEFT JOIN ci_designations DS ON(DS.id=PS.present_designationid)
        WHERE PS.present_kvcode = (SELECT `code` from ci_schools WHERE id=$KvID)";
        $query = $this->db->query($PPKv);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalTransKV($KvID = null){
        $TRKv="SELECT 
        SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
        SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'
        FROM ci_emp_transfer_details
        WHERE present_kvcode = (SELECT `code` from ci_schools WHERE id=$KvID)";
        $query = $this->db->query($TRKv);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function CIInPosKV($KvID=null) {
        $CIKv="SELECT COUNT(PS.id) AS 'INP', 
        (CASE WHEN PS.present_subject=0 THEN CD.`alias` ELSE CONCAT(CD.`alias` ,' ( ',SB.`alias`,' )') END)AS 'NAME'
        FROM `ci_present_service_details` `PS`
        LEFT JOIN `ci_designations` `CD` ON `PS`.`present_designationid`=`CD`.`id`
	LEFT JOIN `ci_subjects` `SB` ON `PS`.`present_subject`=`SB`.`id`
        WHERE `PS`.`present_school`=$KvID AND `PS`.`present_place`=5
        GROUP BY `PS`.`present_designationid`,`PS`.`present_subject`
        ORDER BY `CD`.`name` ASC";
        $query = $this->db->query($CIKv);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function CIISacKV($KvID=null){
        $CIIKv="SELECT 
        SUM(V.sanctioned_post) AS 'SAC',SUM(V.inposition_post) AS 'INP',
        (CASE WHEN V.`subject`=0 THEN D.`name` ELSE CONCAT(D.`name` ,' ( ',S.`alias`,' )') END)AS 'NAME'
        FROM ci_vacancy_master V
	LEFT JOIN ci_designations D ON(V.designation=D.id)
	LEFT JOIN ci_subjects S ON(V.`subject`=S.id)
        WHERE V.`code`=(SELECT `code` from ci_schools WHERE id=$KvID) 
	GROUP BY V.designation , V.`subject` ORDER BY V.designation DESC";
        $query = $this->db->query($CIIKv);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //=================== UPADETD DASHBOARD QUERY(KENDRIYA VIDYALAYA)START =====================//
    //
    //========================== UPADETD DASHBOARD QUERY(ZIET)START ============================//
    public function getZTDetails($ZtCODE=null){

        $ZtSql="SELECT 
        Z.id AS 'ZT_ID',Z.`code` AS 'ZT_CODE',CONCAT(Z.`label`,'  ', Z.`name`) AS 'ZT_NAME',R.`name` AS 'ZT_ZONE'
        FROM ci_regions Z
        LEFT JOIN ci_regions R ON(Z.parent=R.id)
        WHERE Z.`code`=$ZtCODE";
        $query = $this->db->query($ZtSql);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function VacancyMasterZT($ZtCODE=null){
        $VacZT="SELECT
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'
        FROM ci_vacancy_master 
        WHERE `code`= $ZtCODE";
        $query = $this->db->query($VacZT);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalInPosZT($ZtCODE=null){
        $PPZt="SELECT 
        SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'
        FROM ci_present_service_details PS
        LEFT JOIN ci_designations DS ON(DS.id=PS.present_designationid)
        WHERE PS.present_kvcode = $ZtCODE";
        $query = $this->db->query($PPZt);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalTransZT($ZtCODE=null){
        $TRZt="SELECT 
        SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
        SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'
        FROM ci_emp_transfer_details
        WHERE present_kvcode = $ZtCODE";
        $query = $this->db->query($TRZt);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function CIInPosZT($ZtCODE=null) {
        $CIZt="SELECT COUNT(PS.id) AS 'INP', 
        (CASE WHEN PS.present_subject=0 THEN CD.`alias` ELSE CONCAT(CD.`alias` ,' ( ',SB.`alias`,' )') END)AS 'NAME'
        FROM `ci_present_service_details` `PS`
        LEFT JOIN `ci_designations` `CD` ON `PS`.`present_designationid`=`CD`.`id`
	LEFT JOIN `ci_subjects` `SB` ON `PS`.`present_subject`=`SB`.`id`
        WHERE `PS`.`present_kvcode`=$ZtCODE AND `PS`.`present_place`=4
        GROUP BY `PS`.`present_designationid`,`PS`.`present_subject`
        ORDER BY `CD`.`name` ASC";
        $query = $this->db->query($CIZt);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function CIISacZT($ZtCODE=null){
        $CIIZt="SELECT 
        SUM(V.sanctioned_post) AS 'SAC',SUM(V.inposition_post) AS 'INP',
        (CASE WHEN V.`subject`=0 THEN D.`name` ELSE CONCAT(D.`name` ,' ( ',S.`alias`,' )') END)AS 'NAME'
        FROM ci_vacancy_master V
	LEFT JOIN ci_designations D ON(V.designation=D.id)
	LEFT JOIN ci_subjects S ON(V.`subject`=S.id)
        WHERE V.`code`=$ZtCODE
	GROUP BY V.designation , V.`subject` ORDER BY V.designation DESC";
        $query = $this->db->query($CIIZt);
        //show($this->db->last_query());
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //========================== UPADETD DASHBOARD QUERY(ZIET)END ============================//
    //
    //========================== UPADETD DASHBOARD QUERY(KVS)START ============================//
    public function getHQDetails($HqID=null){

        $HqSql="SELECT 
        Q.id AS 'HQ_ID', RO.`code` AS 'HQ_CODE', CONCAT(D.`name`,' ',C.`name`) AS 'HQ_NAME'
        FROM ci_users Q
        LEFT JOIN ci_roles D ON(Q.role_id=D.id)
        LEFT JOIN ci_role_category C ON(Q.role_category=C.id)
        LEFT JOIN ci_regions RO ON(Q.region_id=RO.id)
        WHERE Q.id=$HqID";
        $query = $this->db->query($HqSql);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function VacancyMasterHQ($HqCODE=null){
        $VacHq="SELECT
        SUM(CASE WHEN designation_type=1 THEN sanctioned_post ELSE 0 END) AS 'T_SAC',
        SUM(CASE WHEN designation_type=2 THEN sanctioned_post ELSE 0 END) AS 'NT_SAC',
        SUM(CASE WHEN designation_type=1 THEN inposition_post ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN designation_type=2 THEN inposition_post ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN designation_type=1 THEN contractual_post ELSE 0 END) AS 'T_CON',
        SUM(CASE WHEN designation_type=2 THEN contractual_post ELSE 0 END) AS 'NT_CON'
        FROM ci_vacancy_master 
        WHERE `code`= $HqCODE";
        if($this->role_id==2 && $this->role_category==9){ // HQ Establish Section- I
            $VacHq.=" AND designation IN(SELECT id from ci_designations WHERE e1=1)";
        }
        if($this->role_id==2 && $this->role_category==10){ // HQ Establish Section- I
            $VacHq.=" AND designation IN(SELECT id from ci_designations WHERE e2=1)";
        }
        //show($VacHq);
        $query = $this->db->query($VacHq);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalInPosHQ($HqID=null){
        $PPHq="SELECT 
        SUM(CASE WHEN DS.cat_id = 1 THEN 1 ELSE 0 END) AS 'T_INPOS',
        SUM(CASE WHEN DS.cat_id = 2 THEN 1 ELSE 0 END) AS 'NT_INPOS',
        SUM(CASE WHEN  DATE_FORMAT(PS.created_at,'%Y-%m')= DATE_FORMAT(CURDATE(),'%Y-%m') THEN 1 ELSE 0 END) AS 'CM_INPOS'
        FROM ci_present_service_details PS
        LEFT JOIN ci_designations DS ON(DS.id=PS.present_designationid)
        WHERE (PS.created_by = $HqID OR PS.updated_by = $HqID )";
        //show($PPHq);
        $query = $this->db->query($PPHq);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function TotalTransHQ($HqCODE=null){
        $TRHq="SELECT 
        SUM(CASE WHEN in_process IN(1,3) THEN 1 ELSE 0 END) AS 'T_ACT',
        SUM(CASE WHEN in_process=2 THEN 1 ELSE 0 END) AS 'T_COM'
        FROM ci_emp_transfer_details
        WHERE present_kvcode = $HqCODE";
        $query = $this->db->query($TRHq);
        if($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    public function CIInPosHQ($HqCODE=null) {
        $CIHq="SELECT COUNT(PS.id) AS 'INP', 
        (CASE WHEN PS.present_subject=0 THEN CD.`alias` ELSE CONCAT(CD.`alias` ,' ( ',SB.`alias`,' )') END)AS 'NAME'
        FROM `ci_present_service_details` `PS`
        LEFT JOIN `ci_designations` `CD` ON `PS`.`present_designationid`=`CD`.`id`
	LEFT JOIN `ci_subjects` `SB` ON `PS`.`present_subject`=`SB`.`id`
        WHERE `PS`.`present_kvcode`=$HqCODE AND `PS`.`present_place`=2";
        if($this->role_id==2 && $this->role_category==9){ // HQ Establish Section- I
            $CIHq.=" AND `CD`.`id` IN(SELECT id from ci_designations WHERE e1=1)";
        }
        if($this->role_id==2 && $this->role_category==10){ // HQ Establish Section- I
            $CIHq.=" AND `CD`.`id` IN(SELECT id from ci_designations WHERE e2=1)";
        }
        $CIHq.=" GROUP BY `PS`.`present_designationid`,`PS`.`present_subject`
        ORDER BY `CD`.`name` ASC";
        //show($CIHq);
        $query = $this->db->query($CIHq);
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function CIISacHQ($HqCODE=null){
        $CIIHq="SELECT 
        SUM(V.sanctioned_post) AS 'SAC',SUM(V.inposition_post) AS 'INP',
        (CASE WHEN V.`subject`=0 THEN D.`name` ELSE CONCAT(D.`name` ,' ( ',S.`alias`,' )') END)AS 'NAME'
        FROM ci_vacancy_master V
	LEFT JOIN ci_designations D ON(V.designation=D.id)
	LEFT JOIN ci_subjects S ON(V.`subject`=S.id)
        WHERE V.`code`=$HqCODE ";
        if($this->role_id==2 && $this->role_category==9){ // HQ Establish Section- I
            $CIIHq.=" AND `D`.`id` IN(SELECT id from ci_designations WHERE e1=1)";
        }
        if($this->role_id==2 && $this->role_category==10){ // HQ Establish Section- I
            $CIIHq.=" AND `D`.`id` IN(SELECT id from ci_designations WHERE e2=1)";
        }
	$CIIHq.=" GROUP BY V.designation , V.`subject` ORDER BY V.designation DESC";
        $query = $this->db->query($CIIHq);
        //show($this->db->last_query());
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //========================== UPADETD DASHBOARD QUERY(ZIET)END ============================//
   
}
