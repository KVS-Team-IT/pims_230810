<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessment extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('assessment_model');
        $this->load->model('AssessmentModelClassWise');
    }

    public function index($id = null)
    {

        //$view = 'maintain_mode';   
        $kv_code = $this->session->userdata['master_code'];

        //if($kv_code==2167)
        if ($kv_code == 2402 || $kv_code == 2440 || $kv_code == 2434 || $kv_code == 2444) //for No staff
        {
            $view = 'listing_particular';
        } else {
            $view = 'listing';
        }
        $view_data['emp_list'] = $this->assessment_model->get_emp_by_kvs_id();
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function teacher_listing()
    {
        //$view = 'maintain_mode'; 
        $view = 'teacher_listing';
        $id = $this->session->userdata['user_name'];
        $view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id);
        //print_r($view_data['emp_list']); die;
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function all()
    { //die(hhh);

        $view = 'listing_all';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );


        $this->load->view($this->template, $data);
    }

    public function assessment_status()
    {
        $view = 'assessment_status';
        $data = array(
            'title' => WEBSITE_TITLE . '- Assesment Status',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function recycle_bin()
    {
        $view = 'recycle';
        //$view = 'maintain_mode';  
        $id = $this->session->userdata['user_name'];
        $view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id);
        $data = array(
            'title' => WEBSITE_TITLE . ' - Recycle Data ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function progress_report($id = NULL, $SID = null)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id, $SID)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id, $SID);
            $view_data['classRubrics'] = $this->assessment_model->get_class_wise_data($id, $SID);
        }
        if ($id == 1) {
            $view = 'progress_report_class_1st';
        } else if ($id == 2) {
            $view = 'progress_report_class_2nd';
        } else if ($id == 3) {
            $view = 'progress_report_class_3rd';
        }
        $data = array(
            'title' => WEBSITE_TITLE . '- Progress Status',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }


    public function FilteredKV()
    {
        if ($this->input->is_ajax_request()) {
            $fillData = $this->assessment_model->RefinedListKV();
            echo $fillData;
        }
    }

    public function FilteredKVList()
    {
        if ($this->input->is_ajax_request()) {
            $fillData = $this->assessment_model->FilteredKVList();
            echo $fillData;
        }
    }

    public function FilteredKVstU()
    {
        if ($this->input->is_ajax_request()) {
            //die();        
            $fillData = $this->assessment_model->FindStuKV();
            echo $fillData;
        }
    }

    public function KvAssessmentStatus()
    {
        $columns = array(
            1 => 'S.id'
        );
        $PostData = $this->input->post(null, true);
        $class = $this->input->post('CLASS_ID');
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        $totalData = $this->assessment_model->KVAssessmentStatus();
        $response = $this->assessment_model->KVAssessmentStatus($limit, $start, $order, $dir, $search, $PostData);
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;
        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['kv_id'] = $user->kv_id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['total'] = $user->totalStu;
                $nestedData['remains'] = $this->RemainsAssessmentStudent($user->kv_id, $class, $user->totalStu);
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
    public function update_deleted_kvcode()
    {  //https://pis.kvs.gov.in/assessment/assessment/update_kvcode
        $this->db->select("id,is_deleted", false);
        $this->db->from('ci_students_backup_20june2022');
        $this->db->where('is_deleted', 1);
        //$this->db->where('kv_id','1887');     
        $data = $this->db->get();
        foreach ($data->result() as $value) {
            // $this->db->select("is_deleted",false);
            // $this->db->from('ci_students_backup_20june2022');
            // $this->db->where('is_deleted','1');              
            // $this->db->where('id',$value->id);  
            // $is_deleted= $this->db->get()->row()->is_deleted; 
            // echo $region_id; die(); 

            $dataArray = array(
                'is_deleted'    => $value->is_deleted,
            );
            $this->db->where('student_id', $value->id);
            $this->db->update('ci_students_class_2nd_rubrics', $dataArray);
        }
        echo "update";
    }

    public function RemainsAssessmentStudent($kv_id, $class_id, $total)
    {
        if ($class_id == '1') {
            $table = 'ci_students';
        } elseif ($class_id == '2') {
            $table = 'ci_students_class_2nd_rubrics';
        } else {
            $table = 'ci_students';
        }
        $this->db->select("count(id) as total", false);
        $this->db->from($table . ' S');
        $this->db->where('S.kv_id', $kv_id);

        if ($class_id == '1') {
            $this->db->where('S.reading_sentences', '0');
        } else {

            $this->db->where('S.numeracy_iv!=', '0');
        }

        $this->db->where('S.is_deleted', '0');
        $data = $this->db->get();
        //echo $this->db->last_query(); die();
        if ($class_id == '1') {
            return ($data->row()->total == 0) ? 'Completed' : $data->row()->total;
        } else {
            return ($total <= $data->row()->total)
                ? 'Completed'
                : (($data->row()->total == 0) ? 'Not Updated' : $data->row()->total);
        }
    }
    public function KvAllStudents()
    {
        $columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
        );


        $PostData = $this->input->post(null, true);
        $order = $columns[$this->input->post('order')[0]['column']];
        //echo $order; die;
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        if (!empty($PostData['column'])) {
            $totalData = $this->assessment_model->KvDupDetails();
            $response = $this->assessment_model->KvDupDetails($limit, $start, $order, $dir, $search, $PostData);
        } else {
            $totalData = $this->assessment_model->KvAllStudents();

            $response = $this->assessment_model->KvAllStudents($limit, $start, $order, $dir, $search, $PostData);
        }
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                if ($_POST['CLASS_ID'] == '1') {

                    $entryLevel =  $user->write_language_eng != '' ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                    $exitLevel = $user->writing_hindi_drawing != 0 ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                } else {
                    $entryLevel = $user->writing_hindi_drawing != '' ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                    $exitLevel = $user->writing_hindi_ii != null ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                }
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['name'] = $user->name;
                $nestedData['gender'] = $user->gender;
                $nestedData['category'] = $user->category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
                $nestedData['is_mid_updated'] = $entryLevel;
                $nestedData['is_yearend_updated'] = $user->writing_hindi_drawing != '0' ? '<span style="color:green">Updated </span>' : '<span style="red">Not-Updated</span>';

                $nestedData['class2ndStatus'] = $exitLevel;
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function KvStudents($id = null)
    {

        $columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
        );


        $PostData = $this->input->post(null, true);
        $order = $columns[$this->input->post('order')[0]['column']];
        //echo $order; die;
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        if (!empty($PostData['column'])) {
            $totalData = $this->assessment_model->KvDupDetails();
            $response = $this->assessment_model->KvDupDetails($limit, $start, $order, $dir, $search, $PostData);
        } else {
            $totalData = $this->assessment_model->KvStudents();
            $response = $this->assessment_model->KvStudents($limit, $start, $order, $dir, $search, $PostData);
        }
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {

                if ($id == 1) {
                    $entryLevel =  $user->write_language_eng != '' ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                } else {
                    $entryLevel = $user->writing_hindi_drawing != '' ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                }
                //print_r($user); die;
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->stu_id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                //$nestedData['emp_name'] = $user->emp_title. $user->emp_name;
                $nestedData['name'] = $user->stu_name;
                $nestedData['gender'] = $user->stu_gender;
                $nestedData['category'] = $user->stu_category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
                $nestedData['assigned_status'] = $user->teacher_id != '' ? '<span style="color:green">Assigned </span>' . $user->emp_title . $user->emp_name . $user->emp_code : '<span style="color:red">Not-Assigned</span>';
                $nestedData['status'] = $user->teacher_id != '' ? '1' : '0';
                $nestedData['midstatus'] =   $entryLevel;
                $nestedData['endstatus'] = $user->writing_hindi_drawing != '0' ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                $nestedData['class2ndStatus'] = $user->writing_hindi_ii != null ? '<span style="color:green">Updated </span>' : '<span style="color:red">Not Update</span>';
                $nestedData['MidStColumn'] = $user->oral_language_eng_mid_term != '' ? '1' : '0';
                $nestedData['EndStColumn'] = $user->writing_hindi_drawing != '0' ? '1' : '0';
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function StudentslistForTeacher()
    {
        $columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
        );


        $PostData = $this->input->post(null, true);
        $order = $columns[$this->input->post('order')[0]['column']];
        //echo $order; die;
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        if (!empty($PostData['column'])) {

            $totalData = $this->assessment_model->KvDupDetails();
            $response = $this->assessment_model->KvDupDetails($limit, $start, $order, $dir, $search, $PostData);
        } else {

            $totalData = $this->assessment_model->KvStudentsList();

            $response = $this->assessment_model->KvStudentsList($limit, $start, $order, $dir, $search, $PostData);
            //print_r($response); die(kkkkkk);
        }
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->sid;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['name'] = $user->name;
                $nestedData['gender'] = $user->gender;
                $nestedData['category'] = $user->category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
                $nestedData['endstatus'] = ($user->writing_hindi_drawing != 0) ? '1' : '0';
                $nestedData['class2ndStatus'] = ($user->writing_hindi_ii != null) ? '1' : '0';
                $nestedData['MidStColumn'] = $user->oral_language_eng_mid_term != '' ? '1' : '0';
                $nestedData['EndStColumn'] = $user->writing_hindi_drawing != '' ? '1' : '0';
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function download_excel_report()
    {
        $columns = array(
            1 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            4 => 'S.adminssion_no'
        );


        $PostData = $this->input->post(null, true);
        $order = $columns[$this->input->post('order')[0]['column']];
        //echo $order; die;
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        $totalData = $this->assessment_model->KvStudents();
        $response = $this->assessment_model->download_excel($limit, $start, $order, $dir, $search, $PostData);
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                //print_r($user); die;
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->stu_id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['name'] = $user->stu_name;
                $nestedData['gender'] = $user->stu_gender;
                $nestedData['category'] = $user->stu_category;
                $nestedData['oral_language_eng'] = $user->oral_language_eng;
                $nestedData['write_language_eng'] = $user->write_language_eng;
                $nestedData['read_language_eng'] = $user->read_language_eng;
                $nestedData['is_numeracy_skills'] = $user->is_numeracy_skills;
                $nestedData['oral_language_hindi'] = $user->oral_language_hindi;
                $nestedData['write_language_hindi'] = $user->write_language_hindi;
                $nestedData['read_language_hindi'] = $user->read_language_hindi;
                $nestedData['oral_language_eng_mid_term'] = $user->oral_language_eng_mid_term;
                $nestedData['write_language_eng_mid_term'] = $user->write_language_eng_mid_term;
                $nestedData['read_language_eng_mid_term'] = $user->read_language_eng_mid_term;
                $nestedData['is_numeracy_skills_mid_term'] = $user->is_numeracy_skills_mid_term;
                $nestedData['oral_language_hindi_mid_term'] = $user->oral_language_hindi_mid_term;
                $nestedData['write_language_hindi_mid_term'] = $user->write_language_hindi_mid_term;
                $nestedData['read_language_hindi_mid_term'] = $user->read_language_hindi_mid_term;
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function KvDupStudents()
    {
        if ($this->input->is_ajax_request()) {
            $fillK = $this->input->post('KV_ID');
            $fillColumn = $this->input->post('column');
            $kv_data['CLS'] = $this->assessment_model->KvDupDetails($fillK, $fillColumn);
            echo json_encode($kv_data);
        }
    }

    public function deleteDuplicate()
    {
        if ($this->input->is_ajax_request()) {
            $RowID = $this->input->post('row_id');
            $Class_ID = $this->input->post('cid');
            if ($Class_ID == '1') {
                $table = 'ci_students';
            } elseif ($Class_ID == '2') {
                $table = 'ci_students_backup_20june2022';
            } else {
                $table = 'ci_students';
            }
            $update_rows = array('is_deleted' => '1',);
            $this->db->where('id', $RowID);
            $qry = $this->db->update($table, $update_rows);
            if ($qry) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function restore_data()
    {
        if ($this->input->is_ajax_request()) {
            if ($_POST['Class_ID'] == '1') {
                $table = 'ci_students';
            } elseif ($_POST['Class_ID'] == '2') {
                $table = 'ci_students_backup_20june2022';
            } else {
                $table = 'ci_students';
            }
            $RowID = $this->input->post('row_id');
            $update_rows = array('is_deleted' => '0',);
            $this->db->where('id', $RowID);
            $qry = $this->db->update($table, $update_rows);
            //echo $this->db->last_query(); die;
            if ($qry) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function permanentDelete()
    {
        if ($this->input->is_ajax_request()) {
            $RowID = $this->input->post('row_id');

            if ($this->db->delete('ci_students', array('id' => $RowID))) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function add_new($id = NULL, $SID = NULL)
    {
        //die($id);
        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/teacher_listing/' . $id);
        }
        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id, $SID);
        }
        if ($post_data = $this->input->post(null, true)) {

            $this->form_validation->set_rules('region_id', 'Region', 'required|xss_clean');
            $this->form_validation->set_rules('name_of_kv', 'Name of KV', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
            $this->form_validation->set_rules('adminssion_no', 'Admission No', 'required|xss_clean');
            $this->form_validation->set_rules('name', 'Name Of Student', 'required|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'required|xss_clean');
            $this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');
            $this->form_validation->set_rules('admission_priority', 'Admission Priority ', 'required|xss_clean');
            $this->form_validation->set_rules('is_rte_quota', 'Whether admitted under RTE quota', 'required|xss_clean');
            $this->form_validation->set_rules('is_dispensation_quota', ' under special dispensation quota', 'required|xss_clean');
            $this->form_validation->set_rules('is_differently_abled', ' Whether the child is differently abled', 'required|xss_clean');
            $this->form_validation->set_rules('father_qualification', 'Father\'s Qualification', 'required|xss_clean');
            $this->form_validation->set_rules('mother_qualification', ' Mother\'s Qualification', 'required|xss_clean');
            $this->form_validation->set_rules('mother_tongu', ' Mother Tongue', 'required|xss_clean');
            $this->form_validation->set_rules('years_of_pre-schooling', ' No. of years of pre-schooling exposure', 'required|xss_clean');
            $this->form_validation->set_rules('number_of_sibling', ' Number of Siblings', 'required|xss_clean');
            //$this->form_validation->set_rules('type_of_gadgets', ' Type of Gadgets available', 'required|xss_clean');          
            $this->form_validation->set_rules('no_of_gadgets', ' Number of Gadgets available', 'required|xss_clean');
            $this->form_validation->set_rules('gadget_availability_time', ' Gadget availability Time', 'required|xss_clean');
            $this->form_validation->set_rules('parent_mobile_no', ' Contact number of parent', 'required|xss_clean');
            $this->form_validation->set_rules('parent_email_id', 'email id of parent', 'required|xss_clean');
            $this->form_validation->set_rules('is_parent_competence', 'Whether the parents have any specific competence', 'required|xss_clean');
            // $this->form_validation->set_rules('oral_language_eng', 'Oral Language Ability in English', 'required|xss_clean');          
            //$this->form_validation->set_rules('write_language_eng', 'Writing Ability in English', 'required|xss_clean');          
            //$this->form_validation->set_rules('read_language_eng', 'Reading Ability in English', 'required|xss_clean');          
            //$this->form_validation->set_rules('is_numeracy_skills', 'Numeracy Skills', 'required|xss_clean');          
            // $this->form_validation->set_rules('oral_language_hindi', ' मौखिक भाषा क्षमता ( हिंदी)', 'required|xss_clean');          
            //$this->form_validation->set_rules('write_language_hindi', ' लेखन क्षमता (हिंदी) ', 'required|xss_clean');          
            //$this->form_validation->set_rules('read_language_hindi', ' पठन क्षमता (हिंदी)','required|xss_clean');          
            //$this->form_validation->set_rules('transfered', 'Transfered from which KV' ,'required|xss_clean');          

            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->assessment_model->add_student($post_data, $id, $SID);
                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        if ($this->session->userdata('role_id') != '5') {
                            $this->session->set_flashdata('success', 'Student Updated Successfully.');
                            redirect('assessment/teacher_listing/' . $id);
                        } else {
                            $this->session->set_flashdata('success', 'Student  Added Successfully.');
                            redirect('assessment/' . $id);
                        }
                    } else {
                        if ($this->session->userdata('role_id') == '6') {
                            $this->session->set_flashdata('success', 'Student  Added Successfully.');
                            redirect('assessment/teacher_listing/' . $id);
                        } else {
                            $this->session->set_flashdata('success', 'Student  Added Successfully.');
                            redirect('assessment/teacher_listing/' . $id);
                        }
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Student Not Updated Successfully.');
                        redirect('assessment/add_new/' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Student Not Added Successfully.');
                        redirect('assessment/add_new/' . $id);
                    }
                }
            }
        }
        //$view = 'add_student';
        if ($id == 2) {
            $view = 'add_student_for_class2nd';
        } else {
            $view = 'add_student';
        }
        $id = $this->session->userdata['user_name'];
        $view_data['emp_list'] = $this->assessment_model->get_emp_by_id($id);
        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Student',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function middle($id = NULL)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id);
        }

        if ($post_data = $this->input->post(null, true)) {
            $this->form_validation->set_rules('oral_language_eng_mid_term', 'Oral Language Ability in English', 'required|xss_clean');
            $this->form_validation->set_rules('write_language_eng_mid_term', 'Writing Ability in English', 'required|xss_clean');
            $this->form_validation->set_rules('read_language_eng_mid_term', 'Reading Ability in English', 'required|xss_clean');
            $this->form_validation->set_rules('is_numeracy_skills_mid_term', 'Numeracy Skills', 'required|xss_clean');
            $this->form_validation->set_rules('oral_language_hindi_mid_term', ' मौखिक भाषा क्षमता ( हिंदी)', 'required|xss_clean');
            $this->form_validation->set_rules('write_language_hindi_mid_term', ' लेखन क्षमता (हिंदी) ', 'required|xss_clean');
            $this->form_validation->set_rules('read_language_hindi_mid_term', ' पठन क्षमता (हिंदी)', 'required|xss_clean');

            if ($this->form_validation->run($this) !== FALSE) {
                //echo "<pre>"; print_r($post_data); die;
                $response = $this->assessment_model->update_middle_term($post_data, $id);

                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Middle Term Added Successfully.');
                        redirect('assessment/middle/' . $id);
                    } else {
                        $this->session->set_flashdata('success', 'Middle Term  Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Middle Term Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Middle Term Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }
        $view = 'middle';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Update Middle End Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function reason($id = NULL)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id);
        }

        if ($post_data = $this->input->post(null, true)) {
            $this->form_validation->set_rules('reason', 'Reason', 'required|xss_clean');

            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->assessment_model->update_reason_middle_term($post_data, $id);

                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Reason Added Successfully.');
                        redirect('assessment/reason/' . $id);
                    } else {
                        $this->session->set_flashdata('success', 'Reason Added Successfully.');
                        redirect('assessment');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Reason Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Reason Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }
        $view = 'reason';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Update Reason',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function details($id = NULL, $SID = null)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id, $SID)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id, $SID);
        }

        $view = 'details';
        $data = array(
            'title' => WEBSITE_TITLE . ' - View Details',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function deleteFlnData()
    {
        $columns = array(
            0 => 'S.id',
            2 => 'S.name_of_kv',
            3 => 'S.name',
            1 => 'S.adminssion_no'
        );

        $PostData = $this->input->post(null, true);
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $search = $this->input->post('search')['value'];
        $totalData = $this->assessment_model->StuDeleted_data();
        $response = $this->assessment_model->StuDeleted_data($limit, $start, $order, $dir, $search, $PostData);
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['adminssion_no'] = $user->adminssion_no;
                $nestedData['id'] = $user->id;
                $nestedData['name_of_kv'] = $user->name_of_kv;
                $nestedData['name'] = $user->name;
                $nestedData['gender'] = $user->gender;
                $nestedData['category'] = $user->category;
                $nestedData['parent_mobile_no'] = $user->parent_mobile_no;
                $nestedData['parent_email_id'] = $user->parent_email_id;
                $nestedData['serial_no'] = $serial;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    public function assigned_employee()
    {
        if ($this->input->is_ajax_request()) {
            $EMPID = $this->input->post('emp_Id');
            $ROWID = $this->input->post('row_id');
            $ClassID = $this->input->post('ClassID');
            $KVID = $this->session->userdata('master_code');
            $qry = $this->assessment_model->Update_EmpId_Selected_Data($EMPID, $KVID, $ROWID, $ClassID);
            echo $qry;
        }
    }

    public function assign_data_to_shift()
    {
        if ($this->input->is_ajax_request()) {
            $ShiftID = $this->input->post('shiftID');
            $ROWID = $this->input->post('row_id');
            $ClassID = $this->input->post('ClassID');
            $qry = $this->assessment_model->Update_Shift_Selected_Data($ShiftID, $ROWID, $ClassID);
            echo $qry;
        }
    }

    public function generate_report($id = null)
    {
        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all');
        }
        if ($id != '001') {
            if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
                $this->session->set_flashdata('error', 'Report does not exists.');
                redirect('assessment/all');
            }
        }

        if (isset($id) && !empty($id)) {
            $view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id);
            $view_data['page2A'] = $this->assessment_model->get_page2A_data_by_id($id);
            $view_data['Midpage2A'] = $this->assessment_model->get_Midpage2A_data_by_id($id);
            $view_data['page2B'] = $this->assessment_model->get_hindi2A_data_by_id($id);
            $view_data['Midpage2B'] = $this->assessment_model->get_Midhindi2A_data_by_id($id);
        }
        /* echo "<pre>";
         print_r($view_data['page2A']);  
         print_r($view_data['page2B']); 
         die();*/
        $view = 'generate_report';
        $data = array(
            'title' => WEBSITE_TITLE . ' - View Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function download_excel($id = null)
    {
        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all');
        }

        if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
            $this->session->set_flashdata('error', 'Report does not exists.');
            redirect('assessment/all');
        }

        $view = 'download_excel';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Download Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function year_end($id = NULL, $SID = null)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment');
        }

        if (!is_null($id) && !$this->assessment_model->student_is_exists($id, $SID)) {
            $this->session->set_flashdata('error', 'Student does not exists.');
            redirect('assessment');
        }

        if (isset($id) && !empty($id)) {
            $view_data['details'] = $this->assessment_model->get_student_by_id($id, $SID);
        }


        if ($post_data = $this->input->post(null, true)) {                        // print_r($SID); die();
            $this->form_validation->set_rules('oral_converse', 'Oral Converse', 'required|xss_clean');
            $this->form_validation->set_rules('oral_talks', 'Oral Talk', 'required|xss_clean');
            $this->form_validation->set_rules('oral_recites', 'Oral Recites', 'required|xss_clean');
            $this->form_validation->set_rules('reading_participate', 'Reading Participate', 'required|xss_clean');
            $this->form_validation->set_rules('reading_uses', 'Reading Uses', 'required|xss_clean');
            $this->form_validation->set_rules('reading_sentences', 'Reading Sentences', 'required|xss_clean');
            $this->form_validation->set_rules('writing_words', 'Writing Words', 'required|xss_clean');
            $this->form_validation->set_rules('writing_convey', 'Writing Convey', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_count', 'Numeracy Counts', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_read', 'Numeracy Reads', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_addition', 'Numeracy addition', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_observes', 'Numeracy Observes', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_units', 'Numeracy Estimates', 'required|xss_clean');
            $this->form_validation->set_rules('numeracy_recites', 'Numeracy Creates ', 'required|xss_clean');
            if ($this->form_validation->run($this) !== FALSE) {

                $response = $this->assessment_model->update_yearEnd_term($post_data, $SID);

                if ($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'YearEnd Term Added Successfully.');
                        redirect('assessment/teacher_listing/' . $id);
                    } else {
                        $this->session->set_flashdata('success', 'YearEnd Term  Added Successfully.');
                        redirect('teacher_listing/' . $id . '/' . $SID);
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'YearEnd Term Not Updated Successfully.');
                        redirect('assessment/add_new' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'YearEnd Term Not Added Successfully.');
                        redirect('assessment/add_new' . $id);
                    }
                }
            }
        }

        if ($id == '1') {
            $view = 'year_end';
        } elseif ($id == '2') {
            $view = 'year_end_second';
        } else {
            $view = 'year_end';
        }
        $data = array(
            'title' => WEBSITE_TITLE . ' - Year End Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function update_class_second($Class_ID = NULL, $SID)
    {
        if (isset($Class_ID) && !empty($Class_ID)) {
            $view_data['details'] = $this->assessment_model->get_class_wise_data($Class_ID, $SID);
        }
        $kv_code = $this->session->userdata['master_code'];
        if ($post_data = $this->input->post(null, true)) {
            $this->form_validation->set_rules('oral_i', 'Converse and talks', 'required|xss_clean');

            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->assessment_model->update_Class2ndyearEnd_term($post_data, $SID);

                if ($response['status'] == 'success') {
                    $this->session->set_flashdata('success', 'YearEnd Term Added Successfully.');
                    if ($kv_code == 2402 || $kv_code == 2440 || $kv_code == 2434 || $kv_code == 2444) {
                        redirect('assessment/' . $Class_ID);
                    } else {
                        redirect('assessment/teacher_listing/' . $Class_ID);
                    }
                } else {
                    $this->session->set_flashdata('error', 'YearEnd Term Not Updated Successfully.');
                    redirect('assessment/update_class_second/' . $Class_ID . '/' . $SID);
                }
            }
        }

        $view = 'year_end_second_rubrics';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Year End Assesment Abilities ',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function class1st_final_report($id = null, $kv_id = null, $class_id = null)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all/' . $class_id);
        }
        if ($id != '001') {
            if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
                $this->session->set_flashdata('error', 'Report does not exists.');
                redirect('assessment/all/' . $class_id);
            }
        }

        if (isset($id) && !empty($id)) {
            $view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id, $kv_id, $class_id);
            $view_data['EntryData'] = $this->assessment_model->get_page2A_data_by_id($id, $kv_id, $class_id); // Entry Level
            $view_data['YearEndOral'] = $this->assessment_model->get_YearEndOral_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndReading'] = $this->assessment_model->get_YearEndReading_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndWriting'] = $this->assessment_model->get_YearEndWriting_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNumeracy'] = $this->assessment_model->get_YearEndNumeracy_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndHindi'] = $this->assessment_model->get_YearEndHindi_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonSchl'] = $this->assessment_model->get_YearEndNonSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonNumSchl'] = $this->assessment_model->get_YearEndNonNumSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonHindiSchl'] = $this->assessment_model->get_YearEndHindiNonSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreSchl'] = $this->assessment_model->get_YearEndPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreNumSchl'] = $this->assessment_model->get_YearEndPreNumSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreHindiSchl'] = $this->assessment_model->get_YearEndHindiPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentSchl'] = $this->assessment_model->get_YearEndParent_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentNumSchl'] = $this->assessment_model->get_YearEndParentSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentHindiSchl'] = $this->assessment_model->get_YearEndHindiParent_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduSchl'] = $this->assessment_model->get_YearEndNonEdu_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduNumSchl'] = $this->assessment_model->get_YearEndNonEduSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduHindiSchl'] = $this->assessment_model->get_YearEndHindiNonEdu_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisSchl'] = $this->assessment_model->get_YearEndDis_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisNumSchl'] = $this->assessment_model->get_YearEndDisSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisHindiSchl'] = $this->assessment_model->get_YearEndHindiDis_data_by_id($id, $kv_id, $class_id);

            $view_data['YearEndRTESchl'] = $this->assessment_model->get_YearEndRTE_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndRTENumSchl'] = $this->assessment_model->get_YearEndRTESchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndRTEHindiSchl'] = $this->assessment_model->get_YearEndHindiRTE_data_by_id($id, $class_id);

            $view_data['EntryHindi'] = $this->assessment_model->get_hindi2A_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDataPre'] = $this->assessment_model->get_EntryPre_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryPreHindi'] = $this->assessment_model->get_EntryPreHindi_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDataNoPre'] = $this->assessment_model->get_EntryNoPre_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryNoPreHindi'] = $this->assessment_model->get_EntryNoPreHindi_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDataEdu'] = $this->assessment_model->get_EntryEdu_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryEduHindi'] = $this->assessment_model->get_EntryEduHindi_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDataNoEdu'] = $this->assessment_model->get_EntryNoEdu_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryNoEduHindi'] = $this->assessment_model->get_EntryNoEduHindi_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDisData'] = $this->assessment_model->get_EntryDis_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryDisHindi'] = $this->assessment_model->get_EntryDisHindi_data_by_id($id, $kv_id); // Entry Level

            $view_data['EntryRTEData'] = $this->assessment_model->get_EntryRTE_data_by_id($id, $kv_id); // Entry Level
            $view_data['EntryRTEHindi'] = $this->assessment_model->get_EntryRTEHindi_data_by_id($id, $kv_id); // Entry Level             
        }
        $view = 'class_1st_final_report';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Class 1st Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function class2st_final_report($id = null, $kv_id = null, $class_id = null)
    {
        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all/' . $class_id);
        }
        if ($id != '001') {
            if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
                $this->session->set_flashdata('error', 'Report does not exists.');
                redirect('assessment/all/' . $class_id);
            }
        }

        if (isset($id) && !empty($id)) {

            $view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id, $kv_id, $class_id);
            $view_data['EntryData'] = $this->assessment_model->get_page2A_data_by_id($id, $kv_id, $class_id); // Entry Level
            $view_data['YearEndOral'] = $this->assessment_model->get_YearEndOral_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndReading'] = $this->assessment_model->get_YearEndReading_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndWriting'] = $this->assessment_model->get_YearEndWriting_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNumeracy'] = $this->assessment_model->get_YearEndNumeracy_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndHindi'] = $this->assessment_model->get_YearEndHindi_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonSchl'] = $this->assessment_model->get_YearEndNonSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonNumSchl'] = $this->assessment_model->get_YearEndNonNumSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonHindiSchl'] = $this->assessment_model->get_YearEndHindiNonSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreSchl'] = $this->assessment_model->get_YearEndPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreNumSchl'] = $this->assessment_model->get_YearEndPreNumSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndPreHindiSchl'] = $this->assessment_model->get_YearEndHindiPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentSchl'] = $this->assessment_model->get_YearEndParent_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentNumSchl'] = $this->assessment_model->get_YearEndParentSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndParentHindiSchl'] = $this->assessment_model->get_YearEndHindiParent_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduSchl'] = $this->assessment_model->get_YearEndNonEdu_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduNumSchl'] = $this->assessment_model->get_YearEndNonEduSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndNonEduHindiSchl'] = $this->assessment_model->get_YearEndHindiNonEdu_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisSchl'] = $this->assessment_model->get_YearEndDis_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisNumSchl'] = $this->assessment_model->get_YearEndDisSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndDisHindiSchl'] = $this->assessment_model->get_YearEndHindiDis_data_by_id($id, $kv_id, $class_id);

            $view_data['YearEndRTESchl'] = $this->assessment_model->get_YearEndRTE_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndRTENumSchl'] = $this->assessment_model->get_YearEndRTESchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['YearEndRTEHindiSchl'] = $this->assessment_model->get_YearEndHindiRTE_data_by_id($id, $kv_id, $class_id);
            //Class2nd
            $view_data['Class2YearEndOral'] = $this->AssessmentModelClassWise->get_Class2ndYearEndOral_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndReading'] = $this->AssessmentModelClassWise->get_Class2ndYearEndReading_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndWriting'] = $this->AssessmentModelClassWise->get_Class2ndYearEndWriting_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndNumeracy'] = $this->AssessmentModelClassWise->get_Class2ndYearEndNumeracy_data_by_iddata($id, $kv_id, $class_id);
            $view_data['Class2YearEndOralHindi'] = $this->AssessmentModelClassWise->get_Class2ndYearEndHindi_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndPreSchl'] = $this->AssessmentModelClassWise->get_Class2ndYearEndPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['Class2YearEndNoPreSchl'] = $this->AssessmentModelClassWise->get_Class2ndYearEndNoPreSchooling_data_by_id($id, $kv_id, $class_id);
            $view_data['Class2YearEndParentEdu'] = $this->AssessmentModelClassWise->get_Class2ndYearEndParentEdu_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndFirstGen'] = $this->AssessmentModelClassWise->get_Class2ndYearEndFirstGen_data_by_id($id, $kv_id, $class_id);

            $view_data['Class2YearEndDifferently'] = $this->AssessmentModelClassWise->get_Class2ndYearEndDifferently_data_by_id($id, $kv_id, $class_id);
        }

        $view = 'class_2st_final_report';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Class 2st Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function mean_report($id = null)
    {

        if (!empty($id) && !is_numeric($id)) {
            redirect('assessment/all');
        }
        if ($id != '001') {
            if (!is_null($id) && !$this->assessment_model->report_is_exists($id)) {
                $this->session->set_flashdata('error', 'Report does not exists.');
                redirect('assessment/all');
            }
        }

        if (isset($id) && !empty($id)) {
            $view_data['firstSec'] = $this->assessment_model->get_firstStep_data_by_id($id);
            $view_data['EntryData'] = $this->assessment_model->get_page2A_data_by_id($id); // Entry Level
            $view_data['YearEndOral'] = $this->assessment_model->get_YearEndOral_data_by_id($id);
            $view_data['YearEndReading'] = $this->assessment_model->get_YearEndReading_data_by_id($id);
            $view_data['YearEndWriting'] = $this->assessment_model->get_YearEndWriting_data_by_id($id);
            $view_data['YearEndNumeracy'] = $this->assessment_model->get_YearEndNumeracy_data_by_id($id);
            $view_data['YearEndHindi'] = $this->assessment_model->get_YearEndHindi_data_by_id($id);
            $view_data['YearEndNonSchl'] = $this->assessment_model->get_YearEndNonSchooling_data_by_id($id);
            $view_data['YearEndNonNumSchl'] = $this->assessment_model->get_YearEndNonNumSchooling_data_by_id($id);
            $view_data['YearEndNonHindiSchl'] = $this->assessment_model->get_YearEndHindiNonSchooling_data_by_id($id);
            $view_data['YearEndPreSchl'] = $this->assessment_model->get_YearEndPreSchooling_data_by_id($id);
            $view_data['YearEndPreNumSchl'] = $this->assessment_model->get_YearEndPreNumSchooling_data_by_id($id);
            $view_data['YearEndPreHindiSchl'] = $this->assessment_model->get_YearEndHindiPreSchooling_data_by_id($id);
            $view_data['YearEndParentSchl'] = $this->assessment_model->get_YearEndParent_data_by_id($id);
            $view_data['YearEndParentNumSchl'] = $this->assessment_model->get_YearEndParentSchooling_data_by_id($id);
            $view_data['YearEndParentHindiSchl'] = $this->assessment_model->get_YearEndHindiParent_data_by_id($id);
            $view_data['YearEndNonEduSchl'] = $this->assessment_model->get_YearEndNonEdu_data_by_id($id);
            $view_data['YearEndNonEduNumSchl'] = $this->assessment_model->get_YearEndNonEduSchooling_data_by_id($id);
            $view_data['YearEndNonEduHindiSchl'] = $this->assessment_model->get_YearEndHindiNonEdu_data_by_id($id);
            $view_data['YearEndDisSchl'] = $this->assessment_model->get_YearEndDis_data_by_id($id);
            $view_data['YearEndDisNumSchl'] = $this->assessment_model->get_YearEndDisSchooling_data_by_id($id);
            $view_data['YearEndDisHindiSchl'] = $this->assessment_model->get_YearEndHindiDis_data_by_id($id);
            $view_data['EntryHindi'] = $this->assessment_model->get_hindi2A_data_by_id($id); // Entry Level
            $view_data['EntryDataPre'] = $this->assessment_model->get_EntryPre_data_by_id($id); // Entry Level
            $view_data['EntryPreHindi'] = $this->assessment_model->get_EntryPreHindi_data_by_id($id); // Entry Level
            $view_data['EntryDataNoPre'] = $this->assessment_model->get_EntryNoPre_data_by_id($id); // Entry Level
            $view_data['EntryNoPreHindi'] = $this->assessment_model->get_EntryNoPreHindi_data_by_id($id); // Entry Level
            $view_data['EntryDataEdu'] = $this->assessment_model->get_EntryEdu_data_by_id($id); // Entry Level
            $view_data['EntryEduHindi'] = $this->assessment_model->get_EntryEduHindi_data_by_id($id); // Entry Level
            $view_data['EntryDataNoEdu'] = $this->assessment_model->get_EntryNoEdu_data_by_id($id); // Entry Level
            $view_data['EntryNoEduHindi'] = $this->assessment_model->get_EntryNoEduHindi_data_by_id($id); // Entry Level
            $view_data['EntryDisData'] = $this->assessment_model->get_EntryDis_data_by_id($id); // Entry Level
            $view_data['EntryDisHindi'] = $this->assessment_model->get_EntryDisHindi_data_by_id($id); // Entry Level 
        }
        /*$arr = array();
             echo "<pre>";
         print_r($view_data['EntryDataNoEdu']);    
         die(); */
        $view = 'mean_report';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Mean Report Analysis',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }
    public function delete_duplicat()
    {
        $class_id = $this->input->post('class_id');
        if ($this->input->post('row_id')) {
            $id = $this->input->post('row_id');
            $result = $this->assessment_model->deleterecord($id, $class_id);
            if ($result == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
}
