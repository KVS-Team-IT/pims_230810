<?php 
if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Mis_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        //ini_set('MAX_EXECUTION_TIME', '-1'); 
    }
    
    public function ConsoleUnitData(){
        $sql="SELECT 
        IFNULL(KR.`code`,R.`code`) RO_CODE,IFNULL(CONCAT(KR.label,'-',KR.`name`),CONCAT(R.label,'-',R.`name`)) REGION,
        V.`code` UNIT_CODE,IFNULL(K.`name`,CONCAT(R.label,' ',R.`name`)) UNIT,A.ROLE,
        SUM(V.sanctioned_post) POST,SUM(V.inposition_post) IN_POST,A.TOTAL,A.VERIFY,A.NON_VERIFY
        FROM ci_vacancy_master V 
        LEFT JOIN ci_schools K ON(V.`code`= K.`code`)
        LEFT JOIN ci_regions R ON(V.`code`= R.`code` AND `master`=1)
        LEFT JOIN ci_regions KR ON(K.region_id=KR.id)
        LEFT JOIN (SELECT
        P.present_place ROLE,
        P.present_kvcode UNIT_CODE,
        COUNT(P.emp_id) TOTAL,
        SUM(CASE WHEN E.emp_acceptance = 1 THEN 1 ELSE 0 END) VERIFY,
        SUM(CASE WHEN E.emp_acceptance != 1 THEN 1 ELSE 0 END) NON_VERIFY
        FROM ci_present_service_details P
        LEFT JOIN ci_employee_details E ON(P.emp_id=E.emp_code)
        WHERE P.present_status=1
        GROUP BY P.present_kvcode) A ON(V.`code`=A.UNIT_CODE)
        GROUP BY V.`code`";    
        $qry = $this->db->query($sql);
        if($qry->num_rows())
        {
            return (array)$qry->result();
        }else{
            return (array)array();
        }
    }
    public function AllUnitList(){
        $sql="SELECT CONCAT(`label`,' ',`name`) UNIT, `code` UNIT_CODE FROM ci_regions WHERE `type` IN(2,3,4) AND `status`=1 ORDER BY `type`,`id`";
        $qry = $this->db->query($sql);
        if($qry->num_rows())
        {
            return (array)$qry->result();
        }else{
            return (array)array();
        }
    }
    public function ConsoleUnitPost(){
        $sql="SELECT V.designation DESIG_ID,D.`name` DESIG,(CASE WHEN D.cat_id=1 THEN 'TEACHING' ELSE 'NON-TEACHING' END) TYPE,SUM(V.sanctioned_post) SAN_POST, SUM(V.inposition_post) IN_POST 
        FROM ci_vacancy_master V
        LEFT JOIN ci_designations D ON(V.designation=D.id)
        GROUP BY V.designation, V.designation_type
        ORDER BY D.rank";    
        $qry = $this->db->query($sql);
        if($qry->num_rows())
        {
            return (array) $qry->result();
        }else{
            return (array) array();
        }
    }
   
}
