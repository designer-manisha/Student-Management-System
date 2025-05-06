<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');

        $current_method = $this->router->fetch_method();
        if (!$this->session->userdata('admin_logged_in') && !in_array($current_method, ['login', 'do_login'])) {
            redirect('admin/login');
        }
    }

    public function login() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        $this->load->view('home/login');
    }

    public function do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email === 'admin@gmail.com' && $password === '12345') {
            $this->session->set_userdata('admin_logged_in', true);
            $this->session->set_userdata('email', $email);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid Credentials');
            redirect('admin/login');
        }
    }

    // public function dashboard() {
    //     if (!$this->session->userdata('admin_logged_in')) {
    //         redirect('admin/login');
    //     }              
    //     $this->load->view('admin/dashboard');
    // }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        // Stop browser from caching
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        // Get counts from database
        $this->db->select('COUNT(*) as count');
        $this->db->from('students');
        $query = $this->db->get();
        $data['student_count'] = $query->row()->count;

        $this->db->select('COUNT(*) as count');
        $this->db->from('teachers');
        $query = $this->db->get();
        $data['teacher_count'] = $query->row()->count;

        $this->db->select('COUNT(*) as count');
        $this->db->from('classes');
        $query = $this->db->get();
        $data['class_count'] = $query->row()->count;

        $this->db->select('COUNT(*) as count');
        $this->db->from('parents');
        $query = $this->db->get();
        $data['parent_count'] = $query->row()->count;

        // Load dashboard view with data
        $this->load->view('admin/dashboard', $data);
    }
    
    public function logout() {
       $this->session->unset_userdata('admin_logged_in');
    $this->session->sess_destroy();
        redirect('admin/login');
    }

    // public function logout() {
    //     // $this->session->sess_destroy(); 
    //     // redirect('admin/login');
    //     $this->session->unset_userdata('admin_id');
    //     $this->session->unset_userdata('admin_name');
    //     // $this->session->sess_destroy();
    //     redirect('StudentDashboard/login'); 
    // }
    
    public function view_attendance()
{
    $this->load->model('Attendance_model');

    $class_id = $this->input->get('class_id');
    $subject = $this->input->get('subject');
    $date = $this->input->get('date');

    $data['attendance_records'] = $this->Attendance_model->get_all_attendance($class_id, $subject, $date);
    $this->load->view('admin/attendance_list', $data);
}

public function add_notice()
{
    $this->load->view('admin/add_notice_view');
}

public function save_notice()
{
    $this->load->model('Notice_model');

    $data = [
        'title' => $this->input->post('title'),
        'message' => $this->input->post('message'),
        'audience' => $this->input->post('audience'),
        'notice_date' => $this->input->post('notice_date')
    ];

    $this->Notice_model->insert_notice($data);
    redirect('Admin/view_notices');
}

public function view_notices()
{
    $this->load->model('Notice_model');
    $data['notices'] = $this->Notice_model->get_all_notices();
    $this->load->view('admin/view_notices', $data);
}

public function delete_notice($id)
{
    $this->load->model('Notice_model');
    $this->Notice_model->delete_notice($id);
    redirect('Admin/view_notices');
}
    
}
