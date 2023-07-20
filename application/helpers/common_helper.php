<?php
//**************************without common_model*******************************//
if (!function_exists('status')) {
    function status($key = null)
    {
        $status = array(1 => 'Active', 2 => 'Inactive');
        if (isset($status) && !is_null($key)) {
            return $status[$key];
        } else {
            return $status;
        }
    }
}

if (!function_exists('status_par')) {
    function status_par($key = null)
    {
        $status_par = array(0 => 'Pending', 1 => 'Approved', 2 => 'Rejected');
        if (isset($status_par) && !is_null($key)) {
            return $status_par[$key];
        } else {
            return $status_par;
        }
    }
}

if (!function_exists('title_type')) {
    function title_type($key = null)
    {
        $title_type = array(1 => 'Sh.', 2 => "Smt.", 3 => "Ms.", 4 => "Dr.");
        if (isset($title_type) && !is_null($key)) {
            return $title_type[$key];
        } else {
            return $title_type;
        }
    }
}

if (!function_exists('passing_years')) {
    function passing_years($key = '')
    {
        $passing_years = array();
        for ($yi = 1950; $yi <= date('Y'); $yi++) {
            $passing_years[$yi] = $yi;
        }
        if (isset($passing_years) && !empty($key)) {
            return $passing_years[$key];
        } else {
            return $passing_years;
        }
    }
}

if (!function_exists('basic_education')) {
    function basic_education($key = null)
    {
        $basic_education = array(7 => 'VIII', 8 => 'X', 1 => 'XII', 2 => 'Graduation', 3 => 'Post-Graduation', 4 => 'MPhil', 5 => 'PhD', 6 => 'Others');
        if (isset($basic_education) && !is_null($key)) {
            return $basic_education[$key];
        } else {
            return $basic_education;
        }
    }
}

if (!function_exists('grad_duration')) {
    function grad_duration($key = null)
    {
        $grad_duration = array(12 => '12', 24 => '24', 36 => '36', 48 => '48');
        if (isset($grad_duration) && !is_null($key)) {
            return $grad_duration[$key];
        } else {
            return $grad_duration;
        }
    }
}

if (!function_exists('gender')) {
    function gender($key = null)
    {
        $gender = array(1 => 'Male', 2 => 'Female', 3 => 'Transgender');
        if (isset($gender) && !is_null($key)) {
            return $gender[$key];
        } else {
            return $gender;
        }
    }
}

if (!function_exists('marital_status')) {
    function marital_status($key = null)
    {
        $marital_status = array(1 => 'Married', 2 => 'Unmarried', 3 => 'Widow', 4 => 'Widower', 5 => 'Legally Separated');
        if (isset($marital_status) && !is_null($key)) {
            return $marital_status[$key];
        } else {
            return $marital_status;
        }
    }
}

if (!function_exists('religion')) {
    function religion($key = null)
    {
        $religion = array(1 => 'Buddhism', 2 => 'Christianity', 3 => 'Hinduism', 4 => 'Islam', 5 => 'Jainism', 6 => 'Sikhism', 7 => 'Others');
        if (isset($religion) && !is_null($key)) {
            return $religion[$key];
        } else {
            return $religion;
        }
    }
}

if (!function_exists('blood_group')) {
    function blood_group($key = null)
    {
        $blood_group = array(1 => 'A+', 2 => 'B+', 3 => 'O+', 4 => 'AB+', 5 => 'A-', 6 => 'B-', 7 => 'O-', 8 => 'AB-');
        if (isset($blood_group) && !is_null($key)) {
            return $blood_group[$key];
        } else {
            return $blood_group;
        }
    }
}

if (!function_exists('single_parent')) {
    function single_parent($key = null)
    {
        $single_parent = array(1 => 'Yes', 2 => 'No');
        if (isset($single_parent) && !is_null($key)) {
            return $single_parent[$key];
        } else {
            return $single_parent;
        }
    }
}

if (!function_exists('comp_prof')) {
    function comp_prof($key = null)
    {
        $comp_prof = array(1 => 'MS-Office', 10 => 'Others');
        if (isset($comp_prof) && !is_null($key)) {
            return $comp_prof[$key];
        } else {
            return $comp_prof;
        }
    }
}

if (!function_exists('physically_abled')) {
    function physically_abled($key = null)
    {
        $physically_abled = array(1 => 'Yes(Only if Disability percent is more than 40)', 2 => 'No');
        if (isset($physically_abled) && !is_null($key)) {
            return $physically_abled[$key];
        } else {
            return $physically_abled;
        }
    }
}

if (!function_exists('shift')) {
    function shift($key = null)
    {
        $shift = array(1 => 'I', 2 => 'II', 0 => 'N/A');
        if (isset($shift) && !is_null($key)) {
            return $shift[$key];
        } else {
            return $shift;
        }
    }
}

if (!function_exists('region_type')) {
    function region_type($key = null)
    {
        $region_type = array('RO_5' => 'Region', 'ZT_2' => 'ZIET', 'KV_3' => 'KV ABROAD');
        if (isset($region_typeshift) && !is_null($key)) {
            return $region_type[$key];
        } else {
            return $region_type;
        }
    }
}

if (!function_exists('zone')) {
    function zone($key = null)
    {
        $zone = array(1 => 'East', 2 => 'West', 3 => 'North', 4 => 'South');
        if (isset($zone) && !is_null($key)) {
            return $zone[$key];
        } else {
            return $zone;
        }
    }
}

if (!function_exists('direct_recruitment')) {
    function direct_recruitment($key = null)
    {
        $direct_recruitment = array(1 => 'Direct Recruitment', 2 => 'Promotion', 3 => 'Absorption', 4 => 'Deputation', 5 => 'LDE', 6 => 'Ad Hoc/Proforma/Notional', 14 => 'Displacement', 15 => 'Re-Deployment', 16 => 'Request Transfer', 17 => 'Public Interest', 18 => 'On Compassionate Ground',  19 => 'Mutual', 20 => 'No Taker', 21 => 'Administative', 22 => 'Medical', 23 => 'Spouse', 24 => 'Surplus');
        if (isset($direct_recruitment) && !is_null($key)) {
            return $direct_recruitment[$key];
        } else {
            return $direct_recruitment;
        }
    }
}
if (!function_exists('pre_reserve_post')) {
    function pre_reserve_post($key = null)
    {
        $pre_reserve_post = array(1 => 'Unreserved', 2 => 'SC', 3 => 'ST', 4 => 'OBC Non-Creamy', 5 => 'PH', 6 => 'Ex  Servicemen', 7 => 'Unreserved(EWS)');
        if (isset($pre_reserve_post) && !is_null($key)) {
            return $pre_reserve_post[$key];
        } else {
            return $pre_reserve_post;
        }
    }
}
if (!function_exists('reserve_post')) {
    function reserve_post($key = null)
    {
        $reserve_post = array(1 => 'Unreserved', 2 => 'SC', 3 => 'ST', 4 => 'OBC Non-Creamy', 5 => 'PH', 6 => 'Ex  Servicemen', 7 => 'Unreserved(EWS)');
        if (isset($reserve_post) && !is_null($key)) {
            return $reserve_post[$key];
        } else {
            return $reserve_post;
        }
    }
}

if (!function_exists('disciplinary_action')) {
    function disciplinary_action($key = null)
    {
        $disciplinary_action = array(1 => '81-B', 2 => '81-D', 3 => 'Rule 14', 4 => 'Rule 16');
        if (isset($disciplinary_action) && !is_null($key)) {
            return $disciplinary_action[$key];
        } else {
            return $disciplinary_action;
        }
    }
}

if (!function_exists('leave_type')) {
    function leave_type($key = null)
    {
        $leave_type = array(1 => 'Child Care', 2 => 'Extra Ordinary on Medical Ground', 3 => 'Extra Ordinary on Private Affair', 4 => 'Study Leave', 5 => 'Maternity Leave', 6 => 'Paternity Leave', 7 => 'Miscarriage Leave', 8 => 'N/A');
        if (isset($leave_type) && !is_null($key)) {
            return $leave_type[$key];
        } else {
            return $leave_type;
        }
    }
}

if (!function_exists('intial_recruitment')) {
    function intial_recruitment($key = null)
    {
        $direct_recruitment = array(1 => 'Direct Recruitment', 2 => 'On Compassionate Ground', 5 => 'LDE', 3 => 'Absorption', 4 => "Deputation", 6 => 'Ad Hoc/Proforma/Notional');
        if (isset($direct_recruitment) && !is_null($key)) {
            return $direct_recruitment[$key];
        } else {
            return $direct_recruitment;
        }
    }
}

if (!function_exists('transfer_reason')) {
    function transfer_reason($key = null)
    {
        $direct_recruitment = array(1 => 'Public Interest', 2 => 'Request Transfer', 3 => 'Direct Recruitment', 4 => 'Promotion', 5 => 'On Compassionate Ground', 6 => 'Absorption', 7 => 'Deputation', 8 => 'Mutual', 9 => 'No Taker', 10 => 'Administative', 11 => 'Medical', 12 => 'Spouse', 13 => 'Surplus', 14 => 'Displacement', 15 => 'Re-Deployment');
        if (isset($direct_recruitment) && !is_null($key)) {
            return $direct_recruitment[$key];
        } else {
            return $direct_recruitment;
        }
    }
}

if (!function_exists('level')) {
    function level($key = null)
    {
        $promotion_type = array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12', 13 => '13', '13-A' => '13-A', 14 => '14', 15 => '15', 16 => '16', 17 => '17', 18 => '18');
        if (isset($promotion_type) && !is_null($key)) {
            return $promotion_type[$key];
        } else {
            return $promotion_type;
        }
    }
}

if (!function_exists('performance_years')) {
    function performance_years($key = '')
    {
        $performance_years = array();
        $tenth_year = date('Y') - 9;
        for ($yi = $tenth_year; $yi <= date('Y'); $yi++) {
            $performance_years[$yi] = $yi;
        }
        if (isset($performance_years) && !empty($key)) {
            return $performance_years[$key];
        } else {
            return $performance_years;
        }
    }
}
if (!function_exists('performance_years_group')) {
    function performance_years_group($key = '')
    {
        $performance_years_group = array();
        $tenth_year = date('Y') - 19;
        for ($yi = $tenth_year; $yi <= date('Y'); $yi++) {

            $A = $yi;
            $B = $yi + 1;
            $val = $A . '-' . $B;
            $performance_years_group[$val] = $val;
        }
        if (isset($performance_years_group) && !empty($key)) {
            return $performance_years_group[$key];
        } else {
            return $performance_years_group;
        }
    }
}

if (!function_exists('awards_years')) {
    function awards_years($key = '')
    {
        $awards_years = array();
        for ($yi = 1963; $yi <= date('Y'); $yi++) {
            $awards_years[$yi] = $yi;
        }
        if (isset($awards_years) && !empty($key)) {
            return $awards_years[$key];
        } else {
            return $awards_years;
        }
    }
}

if (!function_exists('panel_years')) {
    function panel_years($key = '')
    {
        $awards_years = array();
        for ($yi = 1963; $yi <= date('Y'); $yi++) {
            $awards_years[$yi] = $yi;
        }
        if (isset($awards_years) && !empty($key)) {
            return $awards_years[$key];
        } else {
            return $awards_years;
        }
    }
}


if (!function_exists('last5_years')) {
    function last5_years($key = '')
    {
        $last5_years = array();
        $tenth_year = date('Y') - 19;
        for ($yi = $tenth_year; $yi <= date('Y'); $yi++) {
            $last5years[$yi] = $yi;
        }
        if (isset($last5years) && !empty($key)) {
            return $last5years[$key];
        } else {
            return $last5years;
        }
    }
}

if (!function_exists('training_role')) {
    function training_role($key = null)
    {
        $training_role = array(1 => 'Course Director', 2 => 'Associate Director', 3 => 'Resource Person', 4 => 'Participants', 5 => 'Master Trainers(CCT/AEP)');
        if (isset($training_role) && !is_null($key)) {
            return $training_role[$key];
        } else {
            return $training_role;
        }
    }
}

if (!function_exists('master_station_lists')) {
    function master_station_lists($key = null)
    {
        $master_station_lists = array('H' => 'Hard', 'VH' => 'Very Hard', 'NER' => 'North East Region', 'NA' => 'Not Applicable');
        if (isset($master_station_lists) && !is_null($key)) {
            return $master_station_lists[$key];
        } else {
            return $master_station_lists;
        }
    }
}

if (!function_exists('promotion_type')) {
    function promotion_type($key = null)
    {
        $training_role = array(1 => 'Promotion(LDE)', 2 => 'Promotion(DPC)', 3 => 'Direct recruitment');
        if (isset($training_role) && !is_null($key)) {
            return $training_role[$key];
        } else {
            return $training_role;
        }
    }
}

if (!function_exists('financial_type')) {
    function financial_type($key = null)
    {
        $financial_type = array(1 => 'Senior Scale', 2 => 'Selection Scale', 3 => 'MACP I', 4 => 'MACP II', 5 => 'MACP III', 7 => 'ACP I', 8 => 'ACP II', 6 => 'NA');
        if (isset($financial_type) && !is_null($key)) {
            return $financial_type[$key];
        } else {
            return $financial_type;
        }
    }
}

if (!function_exists('awards')) {
    function awards($key = null)
    {
        $awards = array(
            'KVS National Incentive Award' => 'KVS National Incentive Award',
            'KVS Regional Incentive Award' => 'KVS Regional Incentive Award',
            'National Award' => 'National Award',
            'Innovation and Experimentation Award' => 'Innovation and Experimentation Award',
            'Other' => 'Any Other'
        );
        if (isset($awards) && !is_null($key)) {
            return $awards[$key];
        } else {
            return $awards;
        }
    }
}

if (!function_exists('relation')) {
    function relation($key = null)
    {
        $relation = array(
            'Father' => 'Father',
            'Mother' => 'Mother',
            'Son' => 'Son',
            'Daughter' => 'Daughter',
            'Brother' => 'Brother',
            'Sister' => 'Sister',
            'Not Applicable' => 'Not Applicable'
        );
        if (isset($relation) && !is_null($key)) {
            return $relation[$key];
        } else {
            return $relation;
        }
    }
}
if (!function_exists('nominee')) {
    function nominee($key = null)
    {
        $nominee = array(
            'Father' => 'Father',
            'Mother' => 'Mother',
            'Spouse' => 'Spouse',
            'Son' => 'Son',
            'Daughter' => 'Daughter',
            'Brother' => 'Brother',
            'Sister' => 'Sister',
            'Father-in-law' => 'Father-in-law',
            'Mother-in-law' => 'Mother-in-law',
            'Not Applicable' => 'Not Applicable'
        );
        if (isset($nominee) && !is_null($key)) {
            return $nominee[$key];
        } else {
            return $nominee;
        }
    }
}
if (!function_exists('title')) {
    function title($key = null)
    {
        $title = array('Sh' => 'Sh', 'Smt.' => 'Smt.', 'Ms.' => 'Ms.', 'Late' => 'Late');
        if (isset($title) && !is_null($key)) {
            return $title[$key];
        } else {
            return $title;
        }
    }
}
if (!function_exists('title_family')) {
    function title_family($key = null)
    {
        $title = array('Sh' => 'Sh', 'Smt.' => 'Smt.', 'Ms.' => 'Ms.');
        if (isset($title) && !is_null($key)) {
            return $title[$key];
        } else {
            return $title;
        }
    }
}
if (!function_exists('course_type')) {
    function course_type($key = null)
    {
        $course_type = array(1 => 'Induction', 2 => 'Short Duration', 3 => 'In Service', 4 => 'Orientation', 5 => 'CEPT', 6 => 'CPPDPT', 7 => 'Disciplinary Proceedings', 8 => 'Capacity Building', 9 => 'Online Training', 10 => 'Scout & Guide', 11 => 'NCC');
        if (isset($course_type) && !is_null($key)) {
            return $course_type[$key];
        } else {
            return $course_type;
        }
    }
}

if (!function_exists('spell')) {
    function spell($key = null)
    {
        $spell = array(1 => 'Single', 2 => 'Double', 3 => '12+3+3+3');
        if (isset($spell) && !is_null($key)) {
            return $spell[$key];
        } else {
            return $spell;
        }
    }
}

if (!function_exists('conductedfor')) {
    function conductedfor($key = null)
    {
        $conductedfor = array('' => 'SELECT', 1 => 'PRT', 2 => 'TGT', 3 => 'PGT');
        if (isset($conductedfor) && !is_null($key)) {
            return $conductedfor[$key];
        } else {
            return $conductedfor;
        }
    }
}

if (!function_exists('training_agency')) {
    function training_agency($key = null)
    {
        $training_agency = array(1 => 'Govt. Agency', 2 => 'Non Govt. Agency');
        if (isset($training_agency) && !is_null($key)) {
            return $training_agency[$key];
        } else {
            return $training_agency;
        }
    }
}

if (!function_exists('govt_org')) {
    function govt_org($key = null)
    {
        $govt_org = array(1 => 'KVS', 2 => 'ZIET', 3 => 'NCERT', 4 => 'CBSE', 5 => 'ISTM', 6 => 'NUEPA', 7 => 'RIEs', 8 => 'SCERT', 9 => 'NIFM', 10 => 'NCUI', 11 => 'IIT', 12 => 'MG SIPA', 13 => 'HIPA GURUGRAM', 14 => 'IIM', 15 => 'NIFM', 16 => 'NCC', 17 => 'Scouts and Guides', 18 => 'LNIPE', 19 => 'IISc');
        if (isset($govt_org) && !is_null($key)) {
            return $govt_org[$key];
        } else {
            return $govt_org;
        }
    }
}

if (!function_exists('mother_title')) {
    function mother_title($key = null)
    {
        $title_type = array(1 => 'Smt.', 2 => "Late.", 3 => "Dr.");
        if (isset($title_type) && !is_null($key)) {
            return $title_type[$key];
        } else {
            return $title_type;
        }
    }
}

if (!function_exists('father_title')) {
    function father_title($key = null)
    {
        $title_type = array(1 => 'Sh.', 2 => "Late.", 3 => "Dr.");
        if (isset($title_type) && !is_null($key)) {
            return $title_type[$key];
        } else {
            return $title_type;
        }
    }
}

if (!function_exists('provident_fund')) {
    function provident_fund($key = null)
    {
        $title_type = array(1 => 'GPF', 2 => "CPF", 3 => "NPS");
        if (isset($title_type) && !is_null($key)) {
            return $title_type[$key];
        } else {
            return $title_type;
        }
    }
}

if (!function_exists('phtype')) {
    function phtype($key = null)
    {
        $title_type = array(1 => 'OH', 2 => "VH", 3 => "HH", 4 => "Others");
        if (isset($title_type) && !is_null($key)) {
            return $title_type[$key];
        } else {
            return $title_type;
        }
    }
}

if (!function_exists('gadget')) {
    function gadget($key = null)
    {
        $gadget_type = array(1 => 'Laptop', 2 => "Ipad", 3 => "N/A");
        if (isset($gadget_type) && !is_null($key)) {
            return $gadget_type[$key];
        } else {
            return $gadget_type;
        }
    }
}

if (!function_exists('medical_history')) {
    function medical_history($key = null)
    {
        $medical_type = array(1 => 'Cancer', 2 => "Paralytic Stroke", 3 => "Renal Failure", 4 => 'Coronary Artery Disease', 5 => 'Thalassaemia', 6 => 'Parkinsons Disease', 7 => 'Motor-Neuron Disease', 8 => 'Any Disease With More Than 50% Mental Disability', 9 => 'Aids', 0 => 'NA');
        if (isset($medical_type) && !is_null($key)) {
            return $medical_type[$key];
        } else {
            return $medical_type;
        }
    }
}

if (!function_exists('rajbhasa')) {
    function rajbhasa($key = null)
    {
        $rajbhasa = array(1 => 'Praveen', 2 => "Karya Sadhak Gyan");
        if (isset($rajbhasa) && !is_null($key)) {
            return $rajbhasa[$key];
        } else {
            return $rajbhasa;
        }
    }
}

if (!function_exists('professional_education')) {
    function professional_education($key = null)
    {
        $professional_education = array(1 => 'D.El.Ed', 2 => 'B.El.Ed', 3 => 'B.Ed', 4 => 'M.Ed', 6 => 'B.P.Ed', 7 => 'M.P.Ed', 8 => 'B.Lib', 9 => 'M.Lib', 10 => 'BFA', 5 => 'Other (Recognized Primary Teacher Training Courses After 12th)');
        if (isset($professional_education) && !is_null($key)) {
            return $professional_education[$key];
        } else {
            return $professional_education;
        }
    }
}

if (!function_exists('exemption_ground')) {
    function exemption_ground($key = null)
    {
        $exemption_ground = array(1 => 'Medical', 2 => 'Exam');
        if (isset($exemption_ground) && !is_null($key)) {
            return $exemption_ground[$key];
        } else {
            return $exemption_ground;
        }
    }
}

if (!function_exists('ltc_type')) {
    function ltc_type($key = null)
    {
        $ltc_type = array(1 => 'Home Town', 2 => 'All India', 3 => 'N/A');
        if (isset($ltc_type) && !is_null($key)) {
            return $ltc_type[$key];
        } else {
            return $ltc_type;
        }
    }
}

if (!function_exists('sector')) {
    function sector($key = null)
    {
        $sector = array(1 => 'Civil', 2 => 'Defence', 3 => 'IHL', 4 => 'Project', 5 => 'Abroad');
        if (isset($sector) && !is_null($key)) {
            return $sector[$key];
        } else {
            return $sector;
        }
    }
}

if (!function_exists('upto_class')) {
    function upto_class($key = null)
    {
        $upto_class = array(1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII');
        if (isset($upto_class) && !is_null($key)) {
            return $upto_class[$key];
        } else {
            return $upto_class;
        }
    }
}

if (!function_exists('opening_years')) {
    function opening_years($key = '')
    {
        $opening_years = array();
        for ($yi = 1963; $yi <= date('Y'); $yi++) {
            $A = $yi;
            $B = $yi + 1;
            $val = $A . '-' . $B;
            $opening_years[$val] = $val;
        }
        if (isset($opening_years) && !empty($key)) {
            return $opening_years[$key];
        } else {
            return $opening_years;
        }
    }
}

if (!function_exists('ccea_class')) {
    function ccea_class($key = null)
    {
        $ccea_class = array(1 => 'I', 2 => 'I-II', 3 => 'I-III', 4 => 'I-IV', 5 => 'I-V', 6 => 'I-VI', 7 => 'I-VII', 8 => 'I-VIII', 9 => 'I-IX', 10 => 'I-X', 11 => 'I-XI', 12 => 'I-XII');
        if (isset($ccea_class) && !is_null($key)) {
            return $ccea_class[$key];
        } else {
            return $ccea_class;
        }
    }
}

if (!function_exists('building_type')) {
    function building_type($key = null)
    {
        $building_type = array(1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D');
        if (isset($building_type) && !is_null($key)) {
            return $building_type[$key];
        } else {
            return $building_type;
        }
    }
}

if (!function_exists('section_status')) {
    function section_status($key = null)
    {
        $section_status = array(1 => 'Pending', 2 => 'Recommended');
        if (isset($section_status) && !is_null($key)) {
            return $section_status[$key];
        } else {
            return $section_status;
        }
    }
}
if (!function_exists('section_kvuptosection')) {
    function section_kvuptosection($key = null)
    {
        $section_kvuptosection = array(1 => 'I', 2 => 'II');
        if (isset($section_kvuptosection) && !is_null($key)) {
            return $section_kvuptosection[$key];
        } else {
            return $section_kvuptosection;
        }
    }
}
if (!function_exists('section_class')) {
    function section_class($key = null)
    {
        $ci = &get_instance();
        $ignore = [0];
        $ci->db->select('id,name');
        $ci->db->from('classes');
        $ci->db->where_not_in('id', $ignore);
        $ci->db->order_by('id');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $strtolower = $row['name'];
            $return[$row['id']] = $strtolower;
        }
        return $return;
    }
}


//=========================== Captcha Generate / Re-Generate Function ===========================//
function getCaptcha()
{
    $ci = &get_instance();
    $ci->load->helper('captcha');
    $config = array(
        'img_url'       => base_url() . 'captcha/',
        'img_path'      => './captcha/',
        'img_width'     => '160',
        'img_height'    => 40,
        'word_length'   => 6,
        'font_size'     => 18,
        'font_path'     => FCPATH . 'system/fonts/texb.ttf',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'colors'        => array(
            'background' => array(255, 255, 255),
            'border'    => array(204, 204, 204),
            'text'      => array(106, 106, 106),
            'grid'      => array(180, 182, 182)
        )
    );
    //pr($config);die;
    $captcha = create_captcha($config);
    $ci->session->unset_userdata('captcha');
    $ci->session->set_userdata('captcha', $captcha['word']);
    $session = $ci->session->all_userdata();
    $time = $session['__ci_last_regenerate'];
    $secret = array(
        'session_id' => $time,
        'captcha' => $captcha['word'],
    );
    $check = $ci->db->get_where('ci_secret_key', array('session_id' => $time));
    if ($check->num_rows()) {
        $ci->db->where('session_id', $time);
        $ci->db->update('ci_secret_key', array('captcha' => $captcha['word']));
    } else {
        $ci->db->insert('ci_secret_key', $secret);
    }
    return $captcha['image'];
}
function IsEmpExist($EncEmpId = null)
{
    $EmpId = DecryptIt($EncEmpId);
    if (chkNumeric($EmpId)) {
        $ci = &get_instance();
        $check = $ci->db->get_where('ci_users', array('username' => $EmpId));
        if ($check->num_rows()) {
            return $EmpId;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function EncryptIt($plainStr = null)
{

    // Store the cipher method 
    $ciphering = "AES-128-CTR";
    // Use OpenSSl Encryption method 
    // $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;
    // Non-NULL Initialization Vector for encryption 
    $encryption_iv = 'iAasitKumarSahoo';
    // Store the encryption key 
    $encryption_key = "KendriyaVidyalayaSangathan";
    $EncryptStr = openssl_encrypt($plainStr, $ciphering, $encryption_key, $options, $encryption_iv);
    $EncryptStr = str_replace(array("/"), array("-"),  $EncryptStr);
    return $EncryptStr;
}
function DecryptIt($EncryptStr = null)
{

    // Store the cipher method 
    $ciphering = "AES-128-CTR";
    // Use OpenSSl decryption method 
    // $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;
    // Non-NULL Initialization Vector for decryption 
    $decryption_iv = 'iAasitKumarSahoo';
    // Store the decryption key 
    $decryption_key = "KendriyaVidyalayaSangathan";
    //$EncryptStr = str_replace( array(".", "-","~"),array("+","=","/"),  $EncryptStr);
    $EncryptStr = str_replace(array("-"), array("/"),  $EncryptStr);
    $plainStr = openssl_decrypt($EncryptStr, $ciphering, $decryption_key, $options, $decryption_iv);
    return $plainStr;
}
function chkNumeric($value = null)
{
    if (is_numeric($value) && $value > 0 && $value == round($value, 0)) {
        return true;
    } else {
        return false;
    }
}
function MaskIt($str = null)
{
    $start = 4;
    $length = 10;
    $mask = preg_replace("/\S/", "*", $str);
    if (is_null($length)) {
        $mask = substr($mask, $start);
        $str = substr_replace($str, $mask, $start);
    } else {
        $mask = substr($mask, $start, $length);
        $str = substr_replace($str, $mask, $start, $length);
    }
    return $str;
}
function MaskedStr($getStr)
{
    $MaskedStr =  str_repeat("*", strlen($getStr) - 4) . substr($getStr, -4);
    return $MaskedStr;
}
function show($arr)
{
    echo "<pre>";
    print_r($arr);
    die;
}
/*
#===================================================================================================================//
#                                                                                                                   #
#              ##################### Helper Function Using Database (Common_Model) ######################           #
#                                                                                                                   #
#===================================================================================================================//
*/

if (!function_exists('retirement_date')) {
    function retirement_date($dob)
    {
        $ci = &get_instance();
        $sql = "IF( DAYOFWEEK( LAST_DAY( DATE_ADD( '$dob' , INTERVAL 60 YEAR ) ) ) = 1 , DATE_SUB( LAST_DAY( DATE_ADD( '$dob', INTERVAL 60 YEAR ) ) ,INTERVAL 1 DAY ) , LAST_DAY( DATE_ADD( '$dob', INTERVAL 60 YEAR ) ) ) as retirement_date";
        $data = $ci->db->select($sql)->get()->row();
        //$date = new DateTime($data ->retirement_date);
        //return  $date->format('d-m-Y');
        return $data->retirement_date;
    }
}

if (!function_exists('user_name')) {
    function user_name($user_id)
    {
        $ci = &get_instance();
        return $ci->db->select("first_name")->from('users')->where("id", $user_id)->get()->row("first_name");
    }
}

//Newly Added for Result Section 30072019
if (!function_exists('subject_lists_tgt')) {
    function subject_lists_tgt($key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('subjects');
        $ci->db->where('find_in_set("8", in_classes) <> 0');
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
}

if (!function_exists('subject_lists_headmaster_prt')) {
    function subject_lists_headmaster_prt($key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('subjects');
        $ci->db->where('find_in_set("3", in_classes) <> 0');
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
}

if (!function_exists('subject_lists_pgt')) {
    function subject_lists_pgt($key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('subjects');
        $ci->db->where('find_in_set("6", in_classes) <> 0');
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $return[$row['id']] = $row['name'];
        }
        return $return;
    }
}
if (!function_exists('get_designated_post')) {
    function get_designated_post($key = null)
    {
        $ci = &get_instance();
        $ignore = [4, 5, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 32, 33, 34, 35, 36, 46, 47, 48, 51, 52];
        $ci->db->select('id,name');
        $ci->db->from('designations');
        $ci->db->where('cat_id', 2);
        $ci->db->where_not_in('id', $ignore);
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $strtolower = strtolower($row['name']);
            $return[$row['id']] = ucfirst($strtolower);
        }
        return $return;
    }
}

function add_user_activity($user_id = null, $act_user_id = null, $activity_type = null, $activity_data = null, $form_type = null)
{
    $ci = &get_instance();
    $activity = array(
        'user_id' => $user_id,
        'act_user_id' => $act_user_id,
        'time' => date('Y-m-d H:i:s'),
        'ipaddress' => $_SERVER['REMOTE_ADDR'],
        'activity_type' => htmlentities($activity_type),
        'activity_data' => htmlentities($activity_data),
        'form_type' => $form_type,
    );
    $ci->db->insert('user_activities', $activity);
    //show($ci->db->last_query());
}

function category()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('category');
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function designation_category_lists()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('designation_category');
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function masterregion_lists()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('regions');
    $ci->db->where("status", 1);
    $ci->db->where("label", 'RO');
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function role_lists($role_id = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('roles');
    $ci->db->where("status", ACTIVE);
    if ($role_id) {
        $ci->db->where("id", $role_id);
    }
    $ci->db->where("id !=", ROLE_ADMIN);
    $ci->db->where("id !=", ROLE_EMPLOYEE);
    $ci->db->order_by('id');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
function zone()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('regions');
    $ci->db->where("type", 8);
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function region_lists($region_id = null, $zit = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('regions');
    $ci->db->where("status", 1);
    if ($region_id) {
        if ($zit == 'ZT') {
            $ci->db->where("parent", $region_id);
        } else {
            $ci->db->where("id", $region_id);
        }
    }
    if ($zit) {
        $ci->db->where("label=", $zit);
    }
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function region_lists_filter()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('regions');
    $ci->db->where("status", 1);
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function school_lists($region_id = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('schools');
    // $ci->db->where("status", 1);
    if ($region_id) {
        $ci->db->where("region_id", $region_id);
    }
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
function school_lists_name($school_id = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('schools');
    $ci->db->where("status", 1);
    if ($school_id) {
        $ci->db->where("id", $school_id);
    }
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
function section_lists($section_id = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('role_category');
    $ci->db->where('status=', 1);
    if ($section_id) {
        $ci->db->where('id', $section_id);
    }
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $lq = $ci->db->last_query();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function state_lists($state_id = null)
{
    $ci = &get_instance();
    $ci->db->select('state_id id,state_name name');
    $ci->db->from('states');
    if ($state_id) {
        $ci->db->where("state_id", $state_id);
    }
    $ci->db->order_by('state_name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function district_lists($district_id = null)
{

    $ci = &get_instance();
    $ci->db->select('district_id id,district_name name');
    $ci->db->from('districts');
    if ($district_id) {
        echo $district_id;
        die('hh');
        $ci->db->where("district_id", $district_id);
    }
    $ci->db->order_by('district_name');

    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function subject_lists()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('subjects');
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = strtolower($row['name']);
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}

function user_info($user_id)
{
    $ci = &get_instance();
    $qry = $ci->db->get_where('users', array('id' => $user_id));
    if ($qry->num_rows()) {
        return $qry->row();
    }
}



function getwhere($table, $fields, $where = array())
{
    $ci = &get_instance();
    $ci->db->select($fields);
    $ci->db->from($table);
    if (!empty($where)) {
        $ci->db->where($where);
    }
    $qry = $ci->db->get();
    if ($qry->num_rows()) {
        return $qry->result();
    }
}

function get_field_value($field, $row)
{
    if (isset($_POST[$field])) {
        $val = $_POST[$field];
    } else if (isset($row[$field])) {
        $val = $row[$field];
    } else {
        $val = '';
    }
    return $val;
}

function user_data($user_id)
{

    $ci = &get_instance();
    $qry = $ci->db->get_where('ci_users', array('id' => $user_id));
    if ($qry->num_rows()) {
        return $qry->row();
    }
}

function state_name_by_id($state_id)
{

    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('ci_states');
    $ci->db->where('id', $state_id);
    $name = $ci->db->get()->row()->name;
    return $name;
}

function sex($key = null)
{
    $data[1] = 'Male';
    $data[2] = 'Female';
    if ($key) {
        return $data[$key];
    }
}

function has_malicious($file)
{
    return '0';
    $file = base_url() . $file;
    $z = '0';
    $string = file_get_contents($file);
    //$forbidden = array("<html","/XObject","<?php","<form","<script","prompt(","onmouseover(","java","<div","alert(","<table","<span","<tr","<td","<th","submit","<body","<head","var","function");
    $forbidden = array("<script");
    foreach ($forbidden as $row) {
        if (stripos($string, $row) !== false) {
            $z = '1';
            return $z;
        }
    }
    return $z;
}

function has_malicious_field($string)
{
    return '0';
    $z = '0';
    //$forbidden = array("<html","/XObject","<?php","<form","<script","prompt(","onmouseover(","java","<div","alert(","<table","<span","<tr","<td","<th","submit","<body","<head","var","function","|");
    $forbidden = array("<script");
    foreach ($forbidden as $row) {
        if (stripos($string, $row) !== false) {
            $z = '1';
            return $z;
        }
    }
    return $z;
}

function has_permission($module)
{
    $ci = &get_instance();
    if ($ci->user_permissions != '') {
        $user_permissions = json_decode($ci->user_permissions);

        if (in_array($module, $user_permissions)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function lang_text($key)
{
    $ci = &get_instance();
    return $ci->lang->line($key);
}

function subject_name_by_id($subjectID)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('subjects');
    $ci->db->where('id', $subjectID);
    $query = $ci->db->get();
    $result = $query->row_array();
    return $result['name'];
}

function role_lists_by_id($roleID)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('roles');
    $ci->db->where("id", $roleID);
    $query = $ci->db->get();
    $result = $query->row_array();
    return $result['name'];
}

function region_lists_by_id($regionID)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('regions');
    $ci->db->where("id", $regionID);
    $query = $ci->db->get();
    $result = $query->row_array();

    return $result['name'];
}

function school_lists_by_id($schoolID)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('schools');
    $ci->db->where("id", $schoolID);
    $query = $ci->db->get();
    $result = $query->row_array();

    return $result['name'];
}

if (!function_exists('designation_list')) {
    function designation_list($key = null)
    {
        $ci = &get_instance();
        $ci->load->model("common_model");
        if (!is_null($key)) {
            return $ci->common_model->get_designation_list($key);
        } else {
            return $ci->common_model->get_designation_list();
        }
    }
}

//=============================== Added for Transfer Modules ==============================//
if (!function_exists('all_designations')) {
    function all_designations($key = null)
    {
        $ci = &get_instance();
        $ignore = [0];
        $ci->db->select('id,name');
        $ci->db->from('designations');
        $ci->db->where('active', 1);
        $ci->db->where_not_in('id', $ignore);
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $strtolower = $row['name'];
            $return[$row['id']] = $strtolower;
        }
        return $return;
    }
}
if (!function_exists('all_unit_region')) {
    function all_unit_region($key = null)
    {
        $ci = &get_instance();
        $ignore = [0];
        $ci->db->select('id,name');
        $ci->db->from('regions');
        $ci->db->where_not_in('id', $ignore);
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $strtolower = strtoupper($row['name']);
            $return[$row['id']] = ucfirst($strtolower);
        }
        return $return;
    }
}
if (!function_exists('all_unit_region')) {
    function all_unit_region($key = null)
    {
        $ci = &get_instance();
        $ignore = [0];
        $ci->db->select('id,name');
        $ci->db->from('regions');
        $ci->db->where_not_in('id', $ignore);
        $ci->db->order_by('name');
        $query = $ci->db->get();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            $strtolower = strtolower($row['name']);
            $return[$row['id']] = ucfirst($strtolower);
        }
        return $return;
    }
}


function GetRegionNameById($id)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('ci_regions');
    $ci->db->where('id', $id);
    $q = $ci->db->get();
    if ($q->num_rows() > 0) {
        return $q->row()->name;
    } else {
        return '';
    }
}

function GetTotalRegionalVacancyRegionId($id)
{
    $ci = &get_instance();
    $ci->db->select('code');
    $ci->db->from('ci_regions');
    $ci->db->where('id', $id);
    $q = $ci->db->get();
    $code = $q->row()->code;
    if ($code) {
        $ci = &get_instance();
        $ci->db->select('SUM(sanctioned_post) as total_reg_vacancy');
        $ci->db->from('ci_vacancy_master');
        $ci->db->where('code', $code);
        $q = $ci->db->get();
        if ($q->num_rows() > 0) {
            return $q->row()->total_reg_vacancy;;
        } else {
            return '';
        }
    }
}
// Designation List
function designation_lists($role_id = null, $role_cat = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('ci_designations');
    if ($role_id == 2 && $role_cat == 9) {
        $ci->db->where('e1', 1);
    } elseif ($role_id == 2 && $role_cat == 10) {
        $ci->db->where('e2', 1);
    } elseif ($role_id == 2) {
        $ci->db->where('hq', 1);
    } else if ($role_id == 3) {
        $ci->db->where('ro', 1);
    } else if ($role_id == 4) {
        $ci->db->where('zt', 1);
    } else if ($role_id == 5) {
        $ci->db->where('kv', 1);
    } else {
        //admin
    }
    $ci->db->where('active', 1);
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
/* get school name and regional name by type and code */

function get_scholl_name_by_ccde_and_type($code = null, $type = null)
{
    $ci = &get_instance();
    if ($type == 5) {
        $ci->db->select('id,name');
        $ci->db->from('ci_schools');
        $ci->db->where('code', $code);
    } else {
        $ci->db->select('id,name');
        $ci->db->from('ci_regions');
        $ci->db->where('code', $code);
    }
    $q = $ci->db->get();
    if ($q->num_rows() > 0) {
        return $q->row()->name;
    } else {
        return '';
    }
}
// P-15_11_19
function GetNotificationCount($id)
{
    $ci = &get_instance();
    $ci->db->select('count(id) as counts');
    $ci->db->from('ci_notifications');
    $ci->db->where(array('receiverid' => $id, 'readstatus' => 0));

    $q = $ci->db->get();
    if ($q->num_rows() > 0) {
        return $q->row()->counts;
    } else {
        return '';
    }
}

if (!function_exists('subject_lists_designationwise')) {
    function subject_lists_designationwise($key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('subjects');
        $ci->db->where('find_in_set("' . $key . '", in_desig) <> 0');
        $ci->db->where('status', 1);
        $ci->db->order_by('name');
        $query = $ci->db->get();
        //$lq=$ci->db->last_query();
        $result = $query->result_array();
        $return = array();
        foreach ($result as $row) {
            //$strtolower = strtolower($row['name']);
            $return[$row['id']] = $row['name']; //ucfirst($strtolower);
        }
        return $return;
    }
}
if (!function_exists('get_name_by_code')) {
    function get_name_by_code($code = null)
    {
        $ci = &get_instance();
        $region_id = '';
        $results['status'] = 0;
        $ci->db->select('id')->from('ci_regions');
        $ci->db->where("code=", $code);
        $query = $ci->db->get();
        if ($query->num_rows()) {
            $region_id = $query->row()->id;
        }
        if ($region_id) {
            $ci->db->select('name,label');
            $ci->db->from('ci_regions');
            $ci->db->where("code", $code);
            $query = $ci->db->get();
            $result = $query->row();
            $results['name'] = $result->name;
            $results['label'] = ($result->label == 'KV') ? 'HQ' : $result->label;
            $results['status'] = ($region_id) ? 1 : 0;
        } else {
            $ci->db->select('id,name');
            $ci->db->from('ci_schools');
            $ci->db->where("code", $code);
            $query = $ci->db->get();
            if ($query->num_rows()) {
                $result = $query->row();
                $results['name'] = $result->name;
                $results['label'] = 'School';
                $results['status'] = ($result->id) ? 1 : 0;
            }
        }
        return $results;
    }
}
if (!function_exists('getCodeBySchoolId')) {
    function getCodeBySchoolId($school_id = null)
    {
        $ci = &get_instance();
        $ci->db->select('code')->from('ci_schools');
        $ci->db->where('id=', $school_id);
        $query = $ci->db->get();
        if ($query->num_rows()) {
            return $query->row()->code;
        }
    }
}
if (!function_exists('getCodeByRegionId')) {
    function getCodeByRegionId($region_id = null)
    {
        $ci = &get_instance();
        $ci->db->select('code')->from('ci_regions');
        $ci->db->where('id=', $region_id);
        $query = $ci->db->get();
        if ($query->num_rows()) {
            return $query->row()->code;
        }
    }
}

if (!function_exists('getEmployeeidByEmpcode')) {
    function getEmployeeidByEmpcode($emp_id = null)
    {
        $ci = &get_instance();
        $ci->db->select('id')->from('ci_users');
        $ci->db->where('username=', $emp_id);
        $query = $ci->db->get();
        if ($query->num_rows()) {
            return $query->row()->id;
        }
    }
}

function profile_activity($act_emp_code = null, $act_type = null, $act_section = null, $act_data = null, $act_by = null, $act_action = null)
{
    $ci = &get_instance();
    $pro_data = array(
        'act_emp_code' => $act_emp_code,
        'act_type' => $act_type,
        'act_section' => htmlentities($act_section),
        'act_data' => htmlentities($act_data),
        'act_by' => $act_by,
        'act_ip' => $_SERVER['REMOTE_ADDR'],
        'act_action' => $act_action,
        'act_date' => date('Y-m-d H:i:s')
    );
    $ci->db->insert('profile_activity', $pro_data);
    //$xx=$ci->db->last_query();
    //show($xx);
}
function coach_subject_lists()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('coach_subjects');
    $ci->db->where('in_classes=', 2);
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = strtolower($row['name']);
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
function other_subject_lists()
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('coach_subjects');
    $ci->db->where('in_classes=', 3);
    $ci->db->order_by('name');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = strtolower($row['name']);
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
if (!function_exists('employment_type')) {
    function employment_type($key = null)
    {
        $employment_type = array(1 => 'Contractual', 2 => 'Coach', 3 => 'Other');
        if (isset($employment_type) && !is_null($key)) {
            return $employment_type[$key];
        } else {
            return $employment_type;
        }
    }
}
if (!function_exists('employment_cat')) {
    function employment_cat($key = null)
    {
        $employment_cat = array(1 => 'Teaching', 2 => 'Non Teaching');
        if (isset($employment_cat) && !is_null($key)) {
            return $employment_cat[$key];
        } else {
            return $employment_cat;
        }
    }
}
if (!function_exists('staff_strength')) {
    function staff_strength($key = null)
    {
        $staff_strength = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10);
        if (isset($staff_strength) && !is_null($key)) {
            return $staff_strength[$key];
        } else {
            return $staff_strength;
        }
    }
}
function IsStaffExist($EncEmpId = null)
{
    $EmpId = DecryptIt($EncEmpId);
    if (chkNumeric($EmpId)) {
        $ci = &get_instance();
        $check = $ci->db->get_where('ci_support_staff', array('staff_code' => $EmpId));
        if ($check->num_rows()) {
            return $EmpId;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
//================================= E M P L O Y E E - S T A T U S ==============================//
if (!function_exists('emp_status')) {
    function emp_status($key = null)
    {
        $emp_status = array(
            1 => 'REGULAR',
            /*   2 => 'SURPLUS', */
            3 => 'RETIRED',
            4 => 'RESIGNED',
            5 => 'VRS',
            6 => 'DEPUTATION',
            7 => 'LIEN',
            8 => 'LONG LEAVE',
            9 => 'TERMINATION',
            10 => 'DEATH'
        );
        if (isset($emp_status) && !is_null($key)) {
            return $emp_status[$key];
        } else {
            return $emp_status;
        }
    }
}
//================================== Class Room Tool Functions ==================================//
if (!function_exists('lession_topic')) {
    function lession_topic($key = null)
    {
        $lession_topic = array(
            1 => 'Demonstrated enthusiastic approach',
            2 => 'Reviewed relevant prerequisites',
            3 => 'Used motivational introduction',
            4 => 'Provided overview and shares objectives with students',
            99 => 'Other'
        );
        if (isset($lession_topic) && !is_null($key)) {
            return $lession_topic[$key];
        } else {
            return $lession_topic;
        }
    }
}
if (!function_exists('lession_plan')) {
    function lession_plan($key = null)
    {
        $lession_plan = array(
            1 => 'Clearly written plans with adequate forethought',
            2 => 'Well defined, measurable objectives/learning outcomes',
            3 => 'Objectives related to previous/future lessons',
            4 => 'Plan addressed modifications for individual needs',
            5 => 'Multiple intelligences addressed',
            6 => 'Plans presented in logical sequence',
            7 => 'Materials were relevant, available and appropriate',
            99 => 'Other'
        );
        if (isset($lession_plan) && !is_null($key)) {
            return $lession_plan[$key];
        } else {
            return $lession_plan;
        }
    }
}
if (!function_exists('teacher_student')) {
    function teacher_student($key = null)
    {
        $teacher_student = array(
            1 => 'Used higher order questioning.',
            2 => 'Incorporated wait time when questioning.',
            3 => 'Expectations for students evident/communicated.',
            4 => 'Engaged all students in learning.',
            5 => 'Communicated about expectations and rules.',
            6 => 'Redirected/stopped inappropriate behavior.',
            7 => 'Used proximity to redirect student attention.',
            8 => 'Responded to disruptive behavior consistently and respectfully.',
            9 => 'Dealt firmly and positively with behaviors.',
            10 => 'Demonstrated personal regard for each student.',
            11 => 'Students demonstrated respect for teacher and each other.',
            12 => 'Meaningful feedback provided to students.',
            99 => 'Other'
        );
        if (isset($teacher_student) && !is_null($key)) {
            return $teacher_student[$key];
        } else {
            return $teacher_student;
        }
    }
}
if (!function_exists('student_involve')) {
    function student_involve($key = null)
    {

        $student_involve = array(
            1 => 'Encouraged student to student interaction.',
            2 => 'Involved many/all students.',
            3 => 'Allowed ample time for practice.',
            4 => 'Provided appropriate feedback.',
            5 => 'Reviewed periodically during lesson.',
            6 => 'Addressed needs of individual students.',
            99 => 'Other'
        );
        if (isset($student_involve) && !is_null($key)) {
            return $student_involve[$key];
        } else {
            return $student_involve;
        }
    }
}
if (!function_exists('teacher_improve')) {
    function teacher_improve($key = null)
    {
        $teacher_improve = array(
            1 => 'Notebook correction.',
            2 => 'Communication.',
            3 => 'Methodology.',
            4 => 'Lesson planning.',
            5 => 'Assessment techniques.',
            6 => 'Questioning.',
            99 => 'Other'
        );
        if (isset($teacher_improve) && !is_null($key)) {
            return $teacher_improve[$key];
        } else {
            return $teacher_improve;
        }
    }
}
if (!function_exists('instruction_tool')) {
    function instruction_tool($key = null)
    {

        $instruction_tool = array(
            1 => 'Used variety of approaches and strategies.',
            2 => 'Demonstrated knowledge of subject matter.',
            3 => 'Kept focus on key objectives.',
            4 => 'Used proximity to increase engaged time.',
            5 => 'Built on prior knowledge.',
            6 => 'Paced lesson appropriately.',
            7 => 'Modeled what is to be learned.',
            8 => 'Provided summary/closure.',
            99 => 'Other'
        );
        if (isset($instruction_tool) && !is_null($key)) {
            return $instruction_tool[$key];
        } else {
            return $instruction_tool;
        }
    }
}
if (!function_exists('classroom_tool')) {
    function classroom_tool($key = null)
    {
        $classroom_tool = array(
            1 => 'Procedures/routines well established.',
            2 => 'Class controlled during lesson.',
            3 => 'Preventive discipline used.',
            4 => 'Kept students focused and on task.',
            5 => 'Physical arrangement appropriate.',
            6 => 'Minimal time used for transitions, discipline, organization.',
            7 => 'Exhibited high expectations for all students.',
            8 => 'Students intrinsically motivated to participate',
            9 => 'Used effective time management.',
            10 => 'Maintained a positive learning environment',
            11 => 'Used instructional time effectively',
            12 => 'Maintained consistent standards for students',
            13 => 'Reinforced classroom behavior expectations',
            14 => 'Constantly monitored classroom while teaching',
            15 => 'No misbehavior observed, but there was evidence that candidate understood how to handle disruptive behavior.',
            99 => 'Other'
        );
        if (isset($classroom_tool) && !is_null($key)) {
            return $classroom_tool[$key];
        } else {
            return $classroom_tool;
        }
    }
}
if (!function_exists('assessment_tool')) {
    function assessment_tool($key = null)
    {
        $assessment_tool = array(
            1 => 'Monitored and retaught as necessary.',
            2 => 'Students had opportunity to self and/or peer assess',
            3 => 'Criteria for assessment was clear to students.',
            4 => 'Used results of pre-assessment to develop lesson.',
            5 => 'Used results of previous assessment to drive lesson.',
            6 => 'Kept up-to-date records of student progress.',
            99 => 'Other'
        );
        if (isset($assessment_tool) && !is_null($key)) {
            return $assessment_tool[$key];
        } else {
            return $assessment_tool;
        }
    }
}
if (!function_exists('planning_tool')) {
    function planning_tool($key = null)
    {
        $planning_tool = array(
            1 => 'Write lesson plan clearly with adequate forethought.',
            2 => 'Make well defined, measurable objectives.',
            3 => 'Relate objectives to previous/future lessons.',
            4 => 'Lesson Plan needs to address modifications for individual needs.',
            5 => 'Address Multiple intelligences.',
            6 => 'Plans should be presented in logical sequence.',
            7 => 'Make appropriate and relevant material available.',
            99 => 'Other'
        );
        if (isset($planning_tool) && !is_null($key)) {
            return $planning_tool[$key];
        } else {
            return $planning_tool;
        }
    }
}
if (!function_exists('suggestion_tool')) {
    function suggestion_tool($key = null)
    {
        $suggestion_tool = array(
            1 => 'Demonstrate enthusiastic approach.',
            2 => 'Review relevant prerequisites.',
            3 => 'Use motivational introduction.',
            4 => 'Provide overview and share objectives with students.',
            5 => 'Use variety of approaches and strategies.',
            6 => 'Use higher order questioning.',
            7 => 'Incorporate wait time when questioning.',
            8 => 'Demonstrate knowledge of subject matter.',
            9 => 'Keep focus on key objectives.',
            10 => 'Use proximity to increase engaged time.',
            11 => 'Address needs of individual students.',
            12 => 'Build on prior knowledge.',
            13 => 'Communicate clearly.',
            14 => 'Pace lesson appropriately.',
            15 => 'Provide appropriate feedback.',
            16 => 'Review periodically during lesson.',
            17 => 'Involve many/all students.',
            18 => 'Model what is to be learned.',
            19 => 'Allow ample time for practice.',
            20 => 'Provide summary/closure.',
            21 => 'Encourage student to student interaction.',
            99 => 'Other'
        );
        if (isset($suggestion_tool) && !is_null($key)) {
            return $suggestion_tool[$key];
        } else {
            return $suggestion_tool;
        }
    }
}
if (!function_exists('management_tool')) {
    function management_tool($key = null)
    {
        $management_tool = array(
            1 => 'Establish procedures/routines well.',
            2 => 'Control class during lesson.',
            3 => 'Use preventive discipline.',
            4 => 'Keep students focused and on task.',
            5 => 'Make appropriate physical arrangements.',
            6 => 'Use minimal time for transitions, discipline, organization.',
            7 => 'Exhibit high expectations for all students.',
            8 => 'Positively reinforce appropriate student behavior.',
            9 => 'Use effective time management.',
            10 => 'Maintain a positive learning environment.',
            11 => 'Use instructional time effectively.',
            12 => 'Engage all students in learning.',
            13 => 'Maintain consistent standards for students.',
            14 => 'Communicate about expectations and rules.',
            15 => 'Reinforce classroom behavior expectations.',
            16 => 'Constantly monitor classroom while teaching.',
            17 => 'Redirect/stop inappropriate behavior.',
            18 => 'Respond to disruptive behavior consistently and respectfully.',
            19 => 'Deal firmly and positively with behaviors.',
            20 => 'Demonstrate personal regard for each student.',
            99 => 'Other'
        );
        if (isset($management_tool) && !is_null($key)) {
            return $management_tool[$key];
        } else {
            return $management_tool;
        }
    }
}
if (!function_exists('action_tool')) {
    function action_tool($key = null)
    {
        $action_tool = array(
            1 => 'Monitor and reteach as and when required.',
            2 => 'Give opportunity to self and/or peer assess.',
            3 => 'State criteria for assessment clearly to students.',
            4 => 'Provide meaningful feedback to students.',
            5 => 'Use results of pre assessment to develop lesson.',
            6 => 'Use results of previous assessment to drive lesson.',
            7 => 'Keep up-to-date records of student progress.',
            99 => 'Other'
        );
        if (isset($action_tool) && !is_null($key)) {
            return $action_tool[$key];
        } else {
            return $action_tool;
        }
    }
}
if (!function_exists('desig_of_observer')) {
    function desig_of_observer($key = null)
    {
        $desig_of_observer = array(1 => 'Deputy Commissioner', 2 => 'Assistant Commissioner', 3 => 'Principal', 4 => 'Vice Principal', 5 => 'Head Master or Mistress');
        if (isset($desig_of_observer) && !is_null($key)) {
            return $desig_of_observer[$key];
        } else {
            return $desig_of_observer;
        }
    }
}
if (!function_exists('observed_class')) {

    function observed_class($key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('ci_classes');
        $query = $ci->db->get();
        $result = $query->result_array();
        $observed_class = array();
        foreach ($result as $row) {
            $observed_class[$row['id']] = $row['name'];
        }
        if (!empty($key)) {
            return $observed_class[$key];
        } else {
            return $observed_class;
        }
    }
}
if (!function_exists('observed_subject')) {
    function observed_subject($Cls = null, $key = null)
    {
        $ci = &get_instance();
        $ci->db->select('id,name');
        $ci->db->from('ci_web_tools_subject');
        if ($key == null) {
            if (!empty($Cls)) {
                $ci->db->where('find_in_set("' . $Cls . '", in_classes) <> 0');
            }
            $ci->db->where('active', 1);
            $ci->db->order_by('name');
            $query = $ci->db->get();
            $result = $query->result_array();
            $observed_subject = array();
            foreach ($result as $row) {
                $observed_subject[$row['id']] = $row['name'];
            }
            return $observed_subject;
        } else {
            $ci->db->where('active', 1);
            $ci->db->order_by('name');
            $query = $ci->db->get();
            $result = $query->result_array();
            $observed_subject = array();
            foreach ($result as $row) {
                $observed_subject[$row['id']] = $row['name'];
            }
            return $observed_subject[$key];
        }
    }
}
if (!function_exists('observed_section')) {
    function observed_section($key = null)
    {
        $observed_section = array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I');
        if (isset($observed_section) && !is_null($key)) {
            return $observed_section[$key];
        } else {
            return $observed_section;
        }
    }
}
//================================== Class Room Tool Functions End==================================//
//
//================================== NEW CLASSROOM OBSERVATION START ===============================//

if (!function_exists('new_lession_topic')) {
    function new_lession_topic($key = null)
    {
        $new_lession_topic = array(
            1 => 'Provided overview and shared objectives of the lesson with students',
            2 => 'Reviewed relevant pre-requisites',
            3 => 'Used motivational elements',
            4 => 'Demonstrated an enthusiastic approach',
            99 => 'Other'
        );
        if (isset($new_lession_topic) && !is_null($key)) {
            return $new_lession_topic[$key];
        } else {
            return $new_lession_topic;
        }
    }
}

if (!function_exists('new_lession_plan')) {
    function new_lession_plan($key = null)
    {
        $new_lession_plan = array(
            1 => 'Clearly written plan incorporating Learning Outcome(s)',
            2 => 'Well defined, measurable objectives/learning outcomes',
            3 => 'Objectives related to previous/future lessons',
            4 => 'Plan addressed modifications for individual needs',
            5 => 'Multiple intelligences addressed in the Plan',
            6 => 'Plan presented in a logical sequence',
            7 => 'Materials proposed to be used were relevant, appropriate and also available',
            99 => 'Other'
        );
        if (isset($new_lession_plan) && !is_null($key)) {
            return $new_lession_plan[$key];
        } else {
            return $new_lession_plan;
        }
    }
}

if (!function_exists('new_teacher_student')) {
    function new_teacher_student($key = null)
    {
        $new_teacher_student = array(
            1 => 'The teacher used questions requiring higher order thinking',
            2 => 'Gave sufficient ‘wait time’ before calling students to answer',
            3 => 'Communicated the expectations and rules for the class',
            4 => 'Expectations for students evident/communicated',
            5 => 'Engaged many/all students in learning',
            6 => 'Demonstrated personal regard for each student',
            7 => 'Students demonstrated respect for teacher and each other',
            8 => 'Meaningful feedback was provided to students',
            99 => 'Other'
        );
        if (isset($new_teacher_student) && !is_null($key)) {
            return $new_teacher_student[$key];
        } else {
            return $new_teacher_student;
        }
    }
}

if (!function_exists('new_application_tlm')) {
    function new_application_tlm($key = null)
    {
        $new_application_tlm = array(
            1 => 'Video clip',
            2 => 'Audio clip',
            3 => 'Images',
            4 => 'Web resources-live',
            5 => 'PPT',
            6 => 'White board (Physical)on camera',
            7 => 'White board digital',
            8 => 'Screen sharing & live demo from PC',
            99 => 'Other'
        );
        if (isset($new_application_tlm) && !is_null($key)) {
            return $new_application_tlm[$key];
        } else {
            return $new_application_tlm;
        }
    }
}

if (!function_exists('new_student_involve')) {
    function new_student_involve($key = null)
    {

        $new_student_involve = array(
            1 => 'Involved many/all students',
            2 => 'Assigned exercises/problems for practice',
            3 => 'Provided appropriate feedback',
            4 => 'Reviewed essential concepts/ideas during the lesson',
            5 => 'Addressed needs of individual students',
            99 => 'Other'
        );
        if (isset($new_student_involve) && !is_null($key)) {
            return $new_student_involve[$key];
        } else {
            return $new_student_involve;
        }
    }
}
if (!function_exists('new_assignment_mode')) {
    function new_assignment_mode($key = null)
    {

        $new_assignment_mode = array(
            1 => 'Name of the online platform(e.g. Google classroom/Whatsapp/blog)',
            2 => 'Links of videos assigned (Self-made/from other sources) and exercises based on the videos',
            3 => 'Interactive worksheets used - Quality and type',
            4 => 'Non-interactive worksheets – Whether correction was done?',
            5 => 'Writing assignments given & collected back as image/pdf and correction done?',
            6 => 'Not at all given',
            99 => 'Other'
        );
        if (isset($new_assignment_mode) && !is_null($key)) {
            return $new_assignment_mode[$key];
        } else {
            return $new_assignment_mode;
        }
    }
}
if (!function_exists('new_comm_skill')) {
    function new_comm_skill($key = null)
    {

        $new_comm_skill = array(
            1 => 'Teacher communicates clearly in English',
            2 => 'Teacher communicates clearly in Hindi',
            3 => 'Teacher communicates clearly both in English and Hindi'
        );
        if (isset($new_comm_skill) && !is_null($key)) {
            return $new_comm_skill[$key];
        } else {
            return $new_comm_skill;
        }
    }
}
if (!function_exists('new_maintain_mode')) {
    function new_maintain_mode($key = null)
    {

        $new_maintain_mode = array(
            1 => 'Maintained properly',
            2 => 'Maintained but not proper',
            3 => 'No record/notebook maintained',
            4 => 'Not checked'
        );
        if (isset($new_maintain_mode) && !is_null($key)) {
            return $new_maintain_mode[$key];
        } else {
            return $new_maintain_mode;
        }
    }
}

if (!function_exists('new_teacher_improve')) {
    function new_teacher_improve($key = null)
    {
        $new_teacher_improve = array(
            1 => 'Better use of IT tools and resources',
            2 => 'Correction work',
            3 => 'Communication.',
            4 => 'Methodology',
            5 => 'Lesson planning',
            6 => 'Assessment techniques',
            7 => 'Questioning',
            99 => 'Other'
        );
        if (isset($new_teacher_improve) && !is_null($key)) {
            return $new_teacher_improve[$key];
        } else {
            return $new_teacher_improve;
        }
    }
}

if (!function_exists('new_instruction_tool')) {
    function new_instruction_tool($key = null)
    {

        $new_instruction_tool = array(
            1 => 'Used variety of approaches and strategies',
            2 => 'Demonstrated knowledge of subject matter',
            3 => 'Kept focus on key objectives',
            4 => 'Built on prior knowledge',
            5 => 'Paced lesson appropriately',
            6 => 'Modelled what is to be learned',
            7 => 'Provided summary/closure ',
            8 => 'Adopted experiential learning strategies',
            9 => 'Actions were consistent with her/his STP',
            99 => 'Other'
        );
        if (isset($new_instruction_tool) && !is_null($key)) {
            return $new_instruction_tool[$key];
        } else {
            return $new_instruction_tool;
        }
    }
}

if (!function_exists('new_classroom_tool')) {
    function new_classroom_tool($key = null)
    {
        $new_classroom_tool = array(
            1 => 'Procedures/routines well established',
            2 => 'Teacher kept students focused and on task',
            3 => 'Minimal time was used for transitions, discipline, organization',
            4 => 'Teacher exhibited high expectations for all students',
            5 => 'Students were intrinsically motivated to participate',
            6 => 'Teacher used effective time management',
            7 => 'Maintained a positive learning environment',
            8 => 'Used instructional time effectively',
            9 => 'Reinforced classroom behaviour expectations',
            10 => 'Constantly monitored classroom while teaching',
            99 => 'Other'
        );
        if (isset($new_classroom_tool) && !is_null($key)) {
            return $new_classroom_tool[$key];
        } else {
            return $new_classroom_tool;
        }
    }
}

if (!function_exists('new_assessment_tool')) {
    function new_assessment_tool($key = null)
    {
        $new_assessment_tool = array(
            1 => 'Monitored and re-taught as and when necessary',
            2 => 'Students had opportunity to self and/or peer assess',
            3 => 'Criteria for assessment was clear to students',
            4 => 'Used results of previous assessment to drive lesson',
            99 => 'Other'
        );
        if (isset($new_assessment_tool) && !is_null($key)) {
            return $new_assessment_tool[$key];
        } else {
            return $new_assessment_tool;
        }
    }
}

if (!function_exists('new_planning_tool')) {
    function new_planning_tool($key = null)
    {
        $new_planning_tool = array(
            1 => 'Write lesson plan clearly with adequate forethought',
            2 => 'Make well defined, measurable objectives',
            3 => 'Relate objectives to previous/future lessons',
            4 => 'Lesson Plan needs to address modifications for individual needs',
            5 => 'Address Multiple intelligences',
            6 => 'Plans should be presented in logical sequence',
            7 => 'Make appropriate and relevant material available ',
            99 => 'Other'
        );
        if (isset($new_planning_tool) && !is_null($key)) {
            return $new_planning_tool[$key];
        } else {
            return $new_planning_tool;
        }
    }
}
if (!function_exists('new_instruction_tool2')) {
    function new_instruction_tool2($key = null)
    {
        $new_instruction_tool2 = array(
            1 => 'Demonstrate enthusiastic approach',
            2 => 'Review relevant prerequisites',
            3 => 'Use motivational introduction',
            4 => 'Provide overview and share objectives with students',
            5 => 'Use variety of approaches and strategies',
            6 => 'Use higher order questioning',
            7 => 'Incorporate wait time when questioning',
            8 => 'Demonstrate knowledge of subject matter',
            9 => 'Keep focus on key objectives',
            10 => 'Address needs of individual students',
            11 => 'Build on prior knowledge',
            12 => 'Communicate clearly',
            13 => 'Pace lesson appropriately',
            14 => 'Provide appropriate feedback',
            15 => 'Review periodically during lesson',
            16 => 'Involve many/all students',
            17 => 'Modelled what is to be learned',
            18 => 'Provide ample opportunities for practice',
            19 => 'Provide summary/closure',
            20 => 'Encourage student to student interaction(after synchronous sessions)',
            99 => 'Other'
        );
        if (isset($new_instruction_tool2) && !is_null($key)) {
            return $new_instruction_tool2[$key];
        } else {
            return $new_instruction_tool2;
        }
    }
}
if (!function_exists('new_classroom_tool2')) {
    function new_classroom_tool2($key = null)
    {
        $new_classroom_tool2 = array(
            1 => 'Establish procedures/routines well',
            2 => 'Control class during lesson',
            3 => 'Keep students focused and on task',
            4 => 'Use minimal time for transitions, discipline, organization',
            5 => 'Exhibit high expectations for all students',
            6 => 'Positively reinforce appropriate student behaviour',
            7 => 'Use effective time management',
            8 => 'Maintain a positive learning environment',
            9 => 'Use instructional time effectively',
            10 => 'Engage all students in learning',
            11 => 'Maintain consistent standards for students',
            12 => 'Communicate about expectations and rules',
            13 => 'Constantly monitor classroom while teaching',
            14 => 'Demonstrate personal regard for each student',
            99 => 'Other'
        );
        if (isset($new_classroom_tool2) && !is_null($key)) {
            return $new_classroom_tool2[$key];
        } else {
            return $new_classroom_tool2;
        }
    }
}

if (!function_exists('new_assessment_tool2')) {
    function new_assessment_tool2($key = null)
    {
        $new_assessment_tool2 = array(
            1 => 'Monitor and re-teach as and when required',
            2 => 'Give opportunity to self and/or peer assess',
            3 => 'State criteria for assessment clearly to students',
            4 => 'Provide meaningful feedback to students',
            5 => 'Use results of pre-assessment to develop lesson',
            6 => 'Use results of previous assessment to drive lesson',
            7 => 'Keep up-to-date records of student progress',
            99 => 'Other'
        );
        if (isset($new_assessment_tool2) && !is_null($key)) {
            return $new_assessment_tool2[$key];
        } else {
            return $new_assessment_tool2;
        }
    }
}
if (!function_exists('overall_grading')) {
    function overall_grading($key = null)
    {
        $overall_grading = array(
            1 => 'Outstanding',
            2 => 'Very Good',
            3 => 'Good',
            4 => 'Average',
            5 => 'Below average'
        );
        if (isset($overall_grading) && !is_null($key)) {
            return $overall_grading[$key];
        } else {
            return $overall_grading;
        }
    }
}
if (!function_exists('overall_rating')) {
    function overall_rating($key = null)
    {
        $overall_rating = array(
            1 => 'Fully satisfied',
            2 => 'Satisfied',
            3 => 'Not upto the expectation',
            4 => 'No improvement at all'
        );
        if (isset($overall_rating) && !is_null($key)) {
            return $overall_rating[$key];
        } else {
            return $overall_rating;
        }
    }
}
if (!function_exists('overall_briefing')) {
    function overall_briefing($key = null)
    {
        $overall_briefing = array(
            1 => 'Yes',
            2 => 'No'
        );
        if (isset($overall_briefing) && !is_null($key)) {
            return $overall_briefing[$key];
        } else {
            return $overall_briefing;
        }
    }
}
if (!function_exists('learner_skill')) {
    function learner_skill($key = null)
    {
        $learner_skill = array(
            1 => 'Yes',
            2 => 'No',
            3 => 'Up to some extent only'
        );
        if (isset($learner_skill) && !is_null($key)) {
            return $learner_skill[$key];
        } else {
            return $learner_skill;
        }
    }
}
if (!function_exists('opt_yes_no')) {
    function opt_yes_no($key = null)
    {
        $opt_yes_no = array(
            1 => 'Yes',
            2 => 'No'
        );
        if (isset($opt_yes_no) && !is_null($key)) {
            return $opt_yes_no[$key];
        } else {
            return $opt_yes_no;
        }
    }
}
function ObserverRole($role_id = null)
{
    $ci = &get_instance();
    $ci->db->select('id,name');
    $ci->db->from('roles');
    $ci->db->where("status", ACTIVE);
    $Roles = array(2, 3, 5);
    $ci->db->where_in('id', $Roles);
    if ($role_id) {
        $ci->db->where("id", $role_id);
    }
    $ci->db->order_by('id');
    $query = $ci->db->get();
    $result = $query->result_array();
    $return = array();
    foreach ($result as $row) {
        $strtolower = $row['name'];
        $return[$row['id']] = ucfirst($strtolower);
    }
    return $return;
}
//================================== NEW CLASSROOM OBSERVATION END ===============================//
if (!function_exists('check_kv_shift_availibility')) {
    function check_kv_shift_availibility($KVID)
    {
        if (strlen($KVID) == 4) { //for shift one
            $kvCode2 = $KVID . "02";
            $ci = &get_instance();
            $ci->db->select('kv_code,name');
            $ci->db->from('schools');
            $ci->db->where("code", $kvCode2);
            $ci->db->where("status", ACTIVE);
            $query = $ci->db->get();
            if ($query->num_rows() > 0) {
                return '1';
            } else {
                return '0';
            }
        }
    }
}

function subject_listsPGT_helper()
{
    $data = subject_lists();
    $str = '<select name="transfer_subject" class="form-control validate[required]" autocomplete="off" id="subject_id"><option value="" selected="selected">Select</option>';
    foreach ($data as $key => $val) {
        if ($key == 17 || $key == 21 || $key == 20 || $key == 19 || $key == 16 || $key == 13 || $key == 15 || $key == 14 || $key == 18 || $key == 22) {
            unset($data[$key]);
        }
    }
    foreach ($data as $key => $val) {
        $str .= '<option value="' . $key . '">' . $val . '</option>';
    }
    $str .= '</select>';
    echo $str;
    die;
}
function subject_listsTGT_helper()
{

    $data = subject_lists();
    $str = '<select name="transfer_subject" class="form-control validate[required]" autocomplete="off" id="subject_id" ><option value="" selected="selected">Select</option>';
    foreach ($data as $key => $val) {
        if ($key == 12 || $key == 9 || $key == 7 || $key == 10 || $key == 11 || $key == 21 || $key == 4 || $key == 20 || $key == 5 || $key == 30 || $key == 19 || $key == 6 || $key == 3) {
            unset($data[$key]);
        }
    }
    foreach ($data as $key => $val) {
        $str .= '<option value="' . $key . '">' . $val . '</option>';
    }
    $str .= '</select>';
    echo $str;
    die;
}
function chackvacancy_helper($data)
{
    //echo "<pre>";print_r($data);die;
    if ($data['transfer_designation'] == 5 || $data['transfer_designation'] == 6) {
        $ci = &get_instance();
        $ci->db->select('sanctioned_post , inposition_post');
        $ci->db->from('vacancy_master');
        $ci->db->where("code", $data['transfer_kvcode']);
        $ci->db->where("subject", $data['transfer_subject']);
        $ci->db->where("designation", $data['transfer_designation']);
        $ci->db->where("status", '1');
        $query = $ci->db->get();
        //show($ci->db->last_query());
        $result = $query->result_array();
        $vacancy = $result[0]['sanctioned_post'] - $result[0]['inposition_post'];
        if ($query->num_rows() > 0 && $vacancy > 0) {

            echo '1';
        } else {
            echo '0';
        }
    }
    echo '1';
}
