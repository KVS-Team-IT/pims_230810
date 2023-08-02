<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('role_model');
    }

    public function index() {
        $view = 'roles/index';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Roles List',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function get_roles() {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'description',
            3 => 'status',
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->role_model->get_all_roles_list_json();
        $post_data = $this->input->post(null, true);
        $search = $this->input->post('search')['value'];
        $response = $this->role_model->get_all_roles_list_json($limit, $start, $order, $dir, $search, $post_data);
        $users = isset($response['result']) ? $response['result'] : array();
        $totalFiltered = isset($response['count']) ? $response['count'] : 0;

        $data = array();
        if (!empty($users)) {
            $serial = $start;
            foreach ($users as $user) {
                ++$serial;
                $nestedData['id'] = $user->id;
                $nestedData['decode_id'] = base64_encode($user->id);
                $nestedData['name'] = $user->name;
                $nestedData['description'] = $user->description;
                $nestedData['status'] = $user->status == 1 ? 'Active' : 'In-active';
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

    public function change_status() {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post(null, true);
            if (isset($post['role_id']) && isset($post['status'])) {
                $this->db->where('id', $post['role_id']);
                $qry = $this->db->update('ci_roles', array('status' => $post['status']));
                if ($qry) {
                    add_user_activity($this->auth_user_id, 'Change Status', json_encode($post), 'Role Module');
                    echo '1';
                }
            }
        }
    }

    public function details($id) {
        $view = 'roles/view';
        if (isset($id) || !empty($id)) {
            $view_data['roles'] = $this->role_model->get_role_by_id($id);
        }

        $data = array(
            'title' => WEBSITE_TITLE . ' - Roles List',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function add($id = null) {
        if (!empty($id) && !is_numeric($id)) {
            redirect('admin/roles');
        }

        if (!is_null($id) && !$this->role_model->role_is_exists($id)) {
            $this->session->set_flashdata('flashError', 'Roles does not exists.');
            redirect('admin/roles');
        }

        if (isset($id) && !empty($id)) {
            $view_data['roles'] = $this->role_model->get_role_by_id($id);
        }
        
        if ($post_data = $this->input->post(null, true)) {
            if(!empty($this->input->post('id'))){
                $this->form_validation->set_rules('id', 'User Id', 'required|xss_clean|numeric|max_length[2]',['Error! Reload Form']);
            }
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean|callback_check_unique_name|callback_regex_check');
            $this->form_validation->set_rules('description', 'Description', 'required|xss_clean|callback_regex_check');
            if ($this->form_validation->run($this) !== FALSE) {
                $response = $this->role_model->add_roles($post_data, $id);
                if($response['status'] == 'success') {
                    if (!empty($id)) {
                        $this->session->set_flashdata('success', 'Roles Updated Successfully.');
                        redirect('admin/roles');
                    } else {
                        $this->session->set_flashdata('success', 'Roles Added Successfully.');
                        redirect('admin/roles');
                    }
                } else {
                    if (!empty($id)) {
                        $this->session->set_flashdata('error', 'Roles Not Updated Successfully.');
                        redirect('admin/roles/add' . $id);
                    } else {
                        $this->session->set_flashdata('error', 'Roles Not Added Successfully.');
                        redirect('admin/roles/add' . $id);
                    }
                }
            }
        }
        $view = 'roles/add';


        $data = array(
            'title' => WEBSITE_TITLE . ' - Add Roles',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
    }

    public function check_unique_name() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $this->db->select("ro.id");
        $this->db->from("roles ro");
        if (!empty($id) && $id != 0) {
            $this->db->where('ro.id !=', $id);
        }
        $this->db->where('ro.name', $name);
        $q = $this->db->get();
        if ($q->num_rows()) {
            $this->form_validation->set_message('check_unique_name', 'This name already existed');
            return false;
        } else {
            return true;
        }
    }

}
