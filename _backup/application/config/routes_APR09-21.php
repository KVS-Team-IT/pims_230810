<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//================== D E F A U L T - S E C T I O N ====================//
$route['default_controller'] = 'Login';
$route['404_override'] = 'PageNotFound/index';
$route['404'] = 'error/access_denied';
$route['400-PageNotFound'] = 'PageNotFound/index';
//==================== H O M E  -  S E C T I O N ======================//
$route['home']='app/Home/index'; 
$route['refresh-captcha']='register/Register/RefreshCaptcha';
//==================== L O G I N - S E C T I O N ======================//
$route['Login']        ='Login/index';
$route['Reset-Password']    ='Login/ResetPassword';
$route['Reset-Password']    ='Login/ResetPassword';
$route['Set-New-Password/(:any)/(:any)']  ='Login/recovery_password/$1/$2';
$route['Change-Password']   ='Login/ChangePassword';
$route['Update-Password']   ='Login/UpdatePassword';
$route['Update-Default-Password'] ='settings/Settings/ChangePasswd';
$route['Update-Login-Password'] ='settings/Settings/ChangePasswd';
$route['Logout']       ='Login/logout';
//$route['404_override'] = '';
//================ D A S H B O A R D - S E C T I O N ===================//
$route['dashboard']='admin/dashboard';
$route['dashboard/(:num)/(:num)/(:num)/(:num)/(:num)']='admin/dashboard/index/$1/$2/$3/$4/$5';
$route['Compose-Message']='admin/Contact/compose';
$route['My-Inbox']='admin/Contact/inbox';
$route['Reply-Message/(:any)']='admin/Contact/reply/$1';
$route['dashboard/(:any)']='admin/dashboard/$1';
$route['email'] = 'EmailController';
$route['send']  = 'EmailController/send';
$route['Activity-Logs']='admin/users/activities_logs';
//=============== E M P L O Y E E - S E C T I O N =====================//
$route['employee-master/(:any)'] = 'employee/index/$1';
$route['employee-master'] = 'employee/index';
$route['personal-details/(:any)'] = 'employee/personal_details/$1';
$route['personal-details'] = 'employee/personal_details';
$route['service-details/(:any)'] = 'employee/service_details/$1';
$route['academic-details/(:any)'] = 'employee/academic_details/$1';
//$route['result-details/(:any)'] = 'employee/result_details/$1';
$route['family-details/(:any)'] = 'employee/family_details/$1';
$route['payscale-details/(:any)'] = 'employee/payscale_section/$1';
$route['award-details/(:any)'] = 'employee/award_section/$1';
$route['training-details/(:any)'] = 'employee/training_section/$1';
$route['performance-details/(:any)'] = 'employee/performance_section/$1';
$route['promotion-details/(:any)'] = 'employee/promotion/$1';
$route['financial-details/(:any)'] = 'employee/financial/$1';
$route['teacher-exchange-details/(:any)'] = 'employee/teacher_exchange/$1';
$route['foreign-visit-details/(:any)'] = 'employee/foreign_visit/$1';

//================ P R O F I L E - S E C T I O N =====================//
$route['employee-details/(:any)'] = 'profile/index/$1';
$route['my-profile/(:any)'] = 'profile/index/$1';
$route['employee-details'] = 'profile/index';
$route['registered-employee'] = 'profile/ProfileList';
//================ T R A N S F E R - B O O K - K E E P I N G =====================//
$route['transferred-book-keeping'] = 'profile/TransferList';
//===================== M I S - S E C T I O N =======================//
$route['employee-report'] = 'reports/index';
$route['vacancy-report'] = 'reports/vacancy';

//================= T R A N S F E R - S E C T I O N ==================//
$route['initiate-transfer'] = 'transfer/Transfer/index';
$route['execute-transfer-order']  = 'transfer/Transfer/initiate_request';
$route['execute-transfer-order/(:any)/(:any)']  = 'transfer/Transfer/initiate_request/$1/$2';
$route['generate-lpc-letter']='transfer/Transfer/Generate_LPC';
$route['generate-lpc-letter/(:any)/(:any)']='transfer/Transfer/Generate_LPC/$1/$2';

$route['print-relieving-order']='transfer/initiate_request_success';
$route['print-relieving-order/(:any)/(:any)']='transfer/initiate_request_success/$1/$2';

$route['pending-for-approval']  = 'transfer/Transfer/pending_for_approval';

$route['process-transfer-request']  = 'transfer/Transfer/process_pending_for_approval';
$route['process-transfer-request/(:any)']  = 'transfer/Transfer/process_pending_for_approval/$1';

$route['pending-for-resolution'] = 'transfer/Transfer/pending_for_resolution';
$route['resolution-details'] = 'transfer/Transfer/resolution_details';

$route['transfer-history']  = 'transfer/Transfer/transfer_history';
$route['transfer-book']  = 'transfer/Transfer/transfer_history';

//==================== C O M P L I A N C E - S E C T I O N ===================//
$route['submit-compliance'] = 'compliance/index';
$route['compliance-report'] = 'compliance/compliance_report';
$route['submit-acceptance'] = 'compliance/acceptance';
//================== N O T I F I C A T I O N - S E C T I O N =================//
$route['notifications']='admin/Notification';
$route['update-status/(:any)']='admin/Notification/changestatus/$1';
$route['send-notifications']='admin/Notification/sendmessage';
//================== P A S S W O R D - S E C T I O N =================//
$route['forgot-password']='login/forgot_password';
$route['recovery-password/(:any)/(:any)'] = 'login/recovery_password/$1/$2';
//================== P R O F I L E - N O T I F I C A T I O N S =================//
$route['profile-activities']='profile/ProfileNotifications';
//================== S U P P O R T - S T A F F =================//
$route['support-staff-list']='staff/Staff/index';
$route['support-staff-add']='staff/Staff/SupportStaff/';
$route['support-staff-edit/(:any)']='staff/Staff/SupportStaff/$1';
$route['support-staff-delete']='staff/Staff/TrashStaff';
//$route['consolidated-report']='staff/Staff/ComparativeReport/';
$route['comparative-report']='reports/Reports/ComparativeReport/';
$route['comparative-report/(:any)']='reports/Reports/ComparativeReport/$1';
$route['consolidated-report']='reports/Reports/ConsolidatedReport/';
$route['consolidated-master']='reports/Reports/ConsolidatedData';
$route['class-section-proposal']='proposal/index';
$route['post-strength-proposal']='proposal/post_proposal';
//================== S E C T I O N  P R O P O S A L  =================//
$route['class-section-proposal-ro']='proposal/section_report';
$route['class-section-proposal-hq']='proposal/section_report';
$route['proposal-details-ro']='proposal/viewproposal';
$route['proposal-details-ro/(:any)']='proposal/viewproposal/$1';
$route['proposal-details-hq']='proposal/viewproposalhq';
$route['proposal-details-hq/(:any)']='proposal/viewproposalhq/$1';
//================== C L A S S  P R O P O S A L  =================//
$route['post-strength-proposal-ro']='proposal/post_report';
$route['post-strength-proposal-hq']='proposal/post_report';
$route['postproposal-details-ro']='proposal/viewpostproposalro';
$route['postproposal-details-ro/(:any)']='proposal/viewpostproposalro/$1';
$route['postproposal-details-hq']='proposal/viewpostproposalhq';
$route['postproposal-details-hq/(:any)']='proposal/viewpostproposalhq/$1';
//=============================== T O O L S =================================//
$route['web-tools']='tools/Webtools/Observation';
$route['web-tools/(:any)']='tools/Webtools/Observation/$1';
$route['observed-data']='tools/Webtools/AllObservation';
$route['send-observed-data']='tools/Webtools/SendObservedData';
//============================ MIS ADMIN REPORTS =============================//
$route['consolidated-unit-report']='MisReport/Mis/ConsolidatedUnitData';
$route['detailed-unit-report']='MisReport/Mis/DetailedUnitData';
// ====================== M A N A G E  U S E R ===============================//
$route['user-master']='admin/users/index';
$route['emp-master']='admin/users/eindex';
$route['add-user']='admin/users/add';
$route['add-user/(:any)']='admin/users/add/$1';
$route['add-employee']='admin/users/add_employee';
$route['add-employee/(:any)']='admin/users/add_employee/$1';
//======================= A N ON Y M O U S   A C C E S S =====================//
$route['search-kv-profile'] = 'Anonymous/index';
$route['kv-profile-details'] = 'Anonymous/KvProfile';
$route['filtered-kv'] = 'Anonymous/FilteredKV';