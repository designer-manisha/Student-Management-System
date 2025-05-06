<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentDashboard_model');

    }

    public function login()
    {
        if ($this->session->userdata('student_id')) {
            redirect('StudentDashboard/student_dashboard');
        }
        $this->load->view('student/student_login');
    }

    public function student_login_submit()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // Check karo student ka email-password database me hai ya nahi
    $this->load->model('StudentDashboard_model'); // Model load karenge
    $student = $this->StudentDashboard_model->check_student_login($email, $password);

    if ($student) {
        // Login success - session bana do
        $this->session->set_userdata('student_id', $student['id']);
        $this->session->set_userdata('student_name', $student['name']);
    
        redirect('StudentDashboard/student_dashboard');
    } else {
        // Login fail - error message aur wapas login page
        $this->session->set_flashdata('error', 'Invalid Email or Password');
        redirect('StudentDashboard/login');
    }
    
}

public function logout() {
    $this->session->unset_userdata('student_id');
    $this->session->unset_userdata('student_name');
    // $this->session->sess_destroy();
    redirect('StudentDashboard/login');  
}


public function student_dashboard()
{
    // Check session
    if (!$this->session->userdata('student_id')) {
        redirect('StudentDashboard/login');
    }

    // Agar login hai to dashboard dikhao
    $this->load->view('student/dashboard');
}


public function  my_profile() {
    // $this->load->view('student/my_profile');

    if (!$this->session->userdata('student_id')) {
        redirect('StudentDashboard/login');
    }

    $this->load->model('StudentDashboard_model');
    $student = $this->StudentDashboard_model->get_student_by_id($this->session->userdata('student_id'));

    $this->load->view('student/profile', ['student' => $student]);  
}



// public function subjects() {
//     // $this->load->view('student/subjects');

//     $data['subjects'] = $this->StudentDashboard_model->get_all_subjects();

//     if ($this->input->post('subject_id')) {
//         $subject_id = $this->input->post('subject_id');
//         $data['selected_subject'] = $this->StudentDashboard_model->get_subject_by_id($subject_id);
//     }

//     $this->load->view('student/subjects', $data);
// }

public function subjects() {
    // Fetch all subjects
    $data['subjects'] = $this->StudentDashboard_model->get_all_subjects();

    // If subject is selected by user, fetch subject and teacher details
    if ($this->input->post('subject_id')) {
        $subject_id = $this->input->post('subject_id');
        // Fetch the subject and teacher details by subject_id
        $data['selected_subject'] = $this->StudentDashboard_model->get_subject_with_teacher($subject_id);
    }

    // Load the view and pass the data
    $this->load->view('student/subjects', $data);
}




public function attendance() {
    $this->load->view('student/attendance');    
}

public function appointments() {
    $this->load->view('student/appointments');
}



public function edit_profile()
{
    if (!$this->session->userdata('student_id')) {
        redirect('StudentDashboard/login');
    }

    $this->load->model('StudentDashboard_model');
    $student_id = $this->session->userdata('student_id');
    $data['student'] = $this->StudentDashboard_model->get_student_by_id($student_id);

    $this->load->view('student/edit_profile', $data);
}

public function update_profile()
{
    if (!$this->session->userdata('student_id')) {
        redirect('StudentDashboard/login');
    }

    $student_id = $this->session->userdata('student_id');

    $updateData = [
        'name' => $this->input->post('name'),
        'phone' => $this->input->post('phone'),
        'address' => $this->input->post('address'),
    ];

    $this->load->model('StudentDashboard_model');
    $this->StudentDashboard_model->update_student($student_id, $updateData);

    $this->session->set_flashdata('success', 'Profile updated successfully!');
    redirect('StudentDashboard/edit_profile');
}


// public function my_class()
// {
//     $student_id = $this->session->userdata('student_id');
//     // echo "Student ID: " . $student_id; 

//     $data['class_info'] = $this->StudentDashboard_model->get_student_class_info($student_id);

//     // Get subjects
//     $class_id = $data['class_info']->class_id ?? null; // yeh line check karo
//     $data['subjects'] = $this->StudentDashboard_model->get_class_subjects($class_id);


//     // echo "<pre>";
//     // print_r($data['class_info']); 
//     // echo "</pre>";

//     $this->load->view('student/class_info', $data);
// }


// public function my_class()
// {
//     $student_id = $this->session->userdata('student_id');

//     // Get student class & section info
//     $data['class_info'] = $this->StudentDashboard_model->get_student_class_info($student_id);

//     $class_id = $data['class_info']->class_id ?? null;
//     $section = $data['class_info']->section ?? null;

//     // Get assigned subjects from assigned_subjects table
//     $data['subject_assignments'] = $this->StudentDashboard_model->get_assigned_subjects($class_id, $section);

//     $this->load->view('student/class_info', $data);
// }

public function my_class()
{
    $student_id = $this->session->userdata('student_id');
    $data['class_info'] = $this->StudentDashboard_model->get_student_class_info($student_id);

    $class_id = $data['class_info']->class_id ?? null;
    $section = $data['class_info']->section ?? null;

    // YAHAN Sahi function call karo aur check karo result mila ya nahi
    if ($class_id && $section) {
        $data['subjects'] = $this->StudentDashboard_model->get_assigned_subjects($class_id, $section);
    } else {
        $data['subjects'] = []; // empty array bhejna hoga agar kuch nahi mila
    }

    $this->load->view('student/class_info', $data);
}

// view student attendance

public function view_attendance()
{
    // Check login session
    if (!$this->session->userdata('student_id')) {
        redirect('Login/student_login');
    }

    $student_id = $this->session->userdata('student_id');
    $this->load->model('Attendance_model');
    $data['attendance_records'] = $this->Attendance_model->get_attendance_by_student($student_id);

    $this->load->view('student/attendance_view', $data);
}

// view notice methodn for student 

public function notices()
{
    $this->load->model('Notice_model');
    $data['notices'] = $this->Notice_model->get_student_notices();
    $this->load->view('student/student_notices', $data);
}


// Appointment method 

public function request_appointment() {
    $this->load->model('StudentDashboard_model');
    $data['teachers'] = $this->StudentDashboard_model->get_all_teachers();
    $this->load->view('student/request_appointment_view', $data);
}

public function save_appointment() {
    $this->load->model('StudentDashboard_model');

    $student_id = $this->session->userdata('student_id');
    $teacher_id = $this->input->post('teacher_id');
    $appointment_date = $this->input->post('appointment_date');
    $reason = $this->input->post('reason');

    $data = [
        'student_id' => $student_id,
        'teacher_id' => $teacher_id,
        'appointment_date' => $appointment_date,
        'reason' => $reason,
        'status' => 'Pending'
    ];

    $this->StudentDashboard_model->insert_appointment($data);
    redirect('StudentDashboard/view_appointments');
}

public function view_appointments() {
    $this->load->model('StudentDashboard_model');
    $student_id = $this->session->userdata('student_id');
    $data['appointments'] = $this->StudentDashboard_model->get_student_appointments($student_id);
    $this->load->view('student/view_appointments', $data);
}



}
?>
