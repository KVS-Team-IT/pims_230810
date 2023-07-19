ERROR - 2023-07-19 12:00:09 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:00:09 --> Severity: Notice --> Undefined property: Home::$auth_user_id C:\wamp64\www\pims\application\modules\app\controllers\Home.php 13
ERROR - 2023-07-19 12:00:09 --> Severity: Notice --> Undefined property: Home::$role_id C:\wamp64\www\pims\application\modules\app\controllers\Home.php 13
ERROR - 2023-07-19 12:00:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'GROUP BY U.id' at line 21 - Invalid query: SELECT 
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
        WHERE U.id= GROUP BY U.id
ERROR - 2023-07-19 12:01:44 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:01:44 --> Severity: error --> Exception: Call to undefined method MY_Loader::_ci_object_to_array() C:\wamp64\www\pims\application\assets\MX\Loader.php 300
ERROR - 2023-07-19 12:01:54 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:01:54 --> Severity: error --> Exception: Call to undefined method MY_Loader::_ci_object_to_array() C:\wamp64\www\pims\application\assets\MX\Loader.php 300
ERROR - 2023-07-19 12:03:12 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:03:12 --> Severity: error --> Exception: Call to undefined method MY_Loader::_ci_object_to_array() C:\wamp64\www\pims\application\assets\MX\Loader.php 300
ERROR - 2023-07-19 12:03:18 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:03:18 --> Severity: error --> Exception: Call to undefined method MY_Loader::_ci_object_to_array() C:\wamp64\www\pims\application\assets\MX\Loader.php 300
ERROR - 2023-07-19 12:05:09 --> Severity: 8192 --> strpos(): Non-string needles will be interpreted as strings in the future. Use an explicit chr() call to preserve the current behavior C:\wamp64\www\pims\application\assets\MX\Router.php 239
ERROR - 2023-07-19 12:07:33 --> 404 Page Not Found: App/Home
ERROR - 2023-07-19 12:37:46 --> 404 Page Not Found: App/Home
ERROR - 2023-07-19 12:58:30 --> 404 Page Not Found: App/Home
ERROR - 2023-07-19 12:58:31 --> 404 Page Not Found: App/Home
ERROR - 2023-07-19 13:00:05 --> 404 Page Not Found: App/Home
ERROR - 2023-07-19 13:00:06 --> 404 Page Not Found: App/Home
