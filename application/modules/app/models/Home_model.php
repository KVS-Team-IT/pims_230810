<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function LogMasterData($LogID, $LogRO)
    {
        $SacKvsHQ = "SELECT 
        U.id AS 'UID',R.`name` AS 'PLACE',C.`name` AS 'DEPT',RO.`name` AS 'REGION',U.email_id AS 'EMAIL',
        (CASE 
                WHEN U.role_id=1 THEN 'PIMS ADMIN'
                WHEN U.role_id=2 THEN RO.`name`
                WHEN U.role_id=3 THEN RO.`name`
                WHEN U.role_id=4 THEN ZT.`name`
                WHEN U.role_id=5 THEN KV.`name`
                WHEN U.role_id=6 THEN EM.emp_name
                WHEN U.role_id=7 THEN RO.`name`
                ELSE 'GUEST' 
                END) AS 'NAME'
        FROM ci_users U
        LEFT JOIN ci_roles R ON(U.role_id=R.id)
        LEFT JOIN ci_role_category C ON(U.role_category=C.id)
        LEFT JOIN ci_regions RO ON(U.region_id=RO.id)
        LEFT JOIN ci_regions ZT ON(U.region_id=ZT.parent)
        LEFT JOIN ci_schools KV ON(U.school_id=KV.id)
        LEFT JOIN ci_sessions_info SS ON(U.id=SS.USER_ID)
        LEFT JOIN ci_employee_details EM ON(U.username=EM.emp_code)
        WHERE U.id=$LogID GROUP BY U.id";
        $query = $this->db->query($SacKvsHQ);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
}