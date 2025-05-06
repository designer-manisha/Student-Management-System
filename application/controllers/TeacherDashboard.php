<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TeacherDashboard_model');
        $this->load->library('session');

        $current_method = $this->router->fetch_method();
        if (!$this->session->userdata('teacher_id') && !in_array($current_method, ['login', 'login_check'])) {
            redirect('TeacherDashboard/login');
        }
    }

    public function login() {
        $this->load->view('teacher/login');
    }

    public function login_check() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $teacher = $this->TeacherDashboard_model->verify_teacher($email, $password);

        if ($teacher) {
            $this->session->set_userdata('teacher_id', $teacher->id);
            $this->session->set_userdata('teacher_name', $teacher->name);
            redirect('TeacherDashboard/index');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('TeacherDashboard/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('teacher_id');
        $this->session->unset_userdata('teacher_name');
        // $this->session->sess_destroy();
    
        redirect('TeacherDashboard/login');
    }
  
    // public function dashboard() {
    //     if (!$this->session->userdata('teacher_id')) {
    //         redirect('TeacherDashboard/login');
    //     }
    //     $this->load->view('teacher/dashboard');
    // }

    public function index() {
        // Assuming teacher is already logged in and their ID is in session
        $teacher_id = $this->session->userdata('teacher_id');
    
        $data['teacher'] = $this->TeacherDashboard_model->get_teacher_by_id($teacher_id);
        $data['total_subjects'] = $this->TeacherDashboard_model->get_total_assigned_subjects($teacher_id);
        $data['total_students'] = $this->TeacherDashboard_model->get_total_students($teacher_id);
        $data['total_appointments'] = $this->TeacherDashboard_model->get_total_appointments($teacher_id);
    
        $this->load->view('teacher/dashboard', $data);
    }
    

    public function profile() {
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher'] = $this->TeacherDashboard_model->get_teacher_by_id($teacher_id);
        $this->load->view('teacher/profile', $data);
    }
    
    public function edit_profile() {
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher'] = $this->TeacherDashboard_model->get_teacher_by_id($teacher_id);
    
        if ($this->input->post()) {
            $update_data = [
                'name'   => $this->input->post('name'),
                'email'  => $this->input->post('email'),
                'phone'  => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
            ];
            $this->TeacherDashboard_model->update_teacher($teacher_id, $update_data);
            $this->session->set_flashdata('success', 'Profile updated successfully');
            redirect('TeacherDashboard/profile');
        }
    
        $this->load->view('teacher/edit_profile', $data);
    }

public function my_subjects() {
    $teacher_id = $this->session->userdata('teacher_id');
    
    // Get teacher data for header
    $data['teacher'] = $this->TeacherDashboard_model->get_teacher_by_id($teacher_id);
    
    // Get subjects data
    $data['subjects'] = $this->TeacherDashboard_model->get_teacher_subjects($teacher_id);

    $this->load->view('teacher/my_subject', $data);
}

// public function my_students($class_id, $section)
// {
//     $this->load->model('TeacherDashboard_model');
//     $students = $this->TeacherDashboard_model->get_students_by_class_section($class_id, $section);

//     $data['students'] = $students;
//     $data['total_data'] = count($students); // ✅ Add this line to avoid the error

//     $this->load->view('teacher/my_students', $data);
// }

public function my_students($class_id, $section)
{
    $teacher_id = $this->session->userdata('teacher_id');
    
    // Get teacher data for header
    $data['teacher'] = $this->TeacherDashboard_model->get_teacher_by_id($teacher_id);
    
    // Get students data
    $data['students'] = $this->TeacherDashboard_model->get_students_by_class_section($class_id, $section);
    $data['total_data'] = count($data['students']);
    
    // Get class and section info
    $data['class_id'] = $class_id;
    $data['section'] = $section;

    $this->load->view('teacher/my_students', $data);
}


// public function my_students($class_id)  
// {
//     $this->load->model('TeacherDashboard_model');
//     $data['students'] = $this->TeacherDashboard_model->get_students_by_class_section($class_id);
//     $this->load->view('teacher/my_students', $data);
// }


public function my_student() {
    $teacher_id = $this->session->userdata('teacher_id');
    $this->load->model('TeacherDashboard_model');

    $assignments = $this->TeacherDashboard_model->get_assigned_subjects($teacher_id);

    $students = [];
    foreach ($assignments as $a) {
        $class_students = $this->TeacherDashboard_model->get_students_by_class_section($a->class_id, $a->section);
        $students = array_merge($students, $class_students);
    }

    $data['students'] = $students;
    $data['total_data'] = count($students);


    $this->load->view('teacher/my_students', $data);
}

public function attendance_form()
{
    $teacher_id = $this->session->userdata('teacher_id');
    $this->load->model('TeacherDashboard_model');

    // Get subjects assigned to this teacher
    $data['assignments'] = $this->TeacherDashboard_model->get_assigned_subjects($teacher_id);

    $this->load->view('teacher/attendance_form', $data);
}

public function mark_attendance()
{
    $input = $this->input->post('class_id');
    $parts = explode('_', $input);

    $class_id = $parts[0];
    $section = $parts[1];
    $subject_name = $parts[2];
    $date = $this->input->post('attendance_date');

    // Load model
    $this->load->model('Student_model');
    
    // Fetch students
    $students = $this->Student_model->get_students_by_class_section($class_id);

    $data = [
        'students' => $students,
        'attendance_date' => $date,
        'class_id' => $class_id,
        // 'section' => $section,
        'subject_name' => $subject_name
    ];

    // Load view
    $this->load->view('teacher/mark_attendance_view', $data);
}


public function save_attendance()
{
    $this->load->model('Attendance_model');

    $class_id = $this->input->post('class_id');
    $subject_name = $this->input->post('subject_name');
    $attendance_date = $this->input->post('attendance_date');
    $attendance_data = $this->input->post('attendance'); // array: student_id => status

    // Assuming you are using session for logged in teacher
    $teacher_id = $this->session->userdata('teacher_id');

    $data = [];

    foreach ($attendance_data as $student_id => $status) {
        $data[] = [
            'student_id' => $student_id,
            'teacher_id' => $teacher_id,
            'subject' => $subject_name,
            'class_id' => $class_id,
            'attendance_date' => $attendance_date,
            'status' => $status
        ];
    }

    if ($this->Attendance_model->save_attendance($data)) {
        $this->session->set_flashdata('success', 'Attendance saved successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to save attendance.');
    }

    redirect('TeacherDashboard');
}


public function view_attendance()
{
    $this->load->model('Attendance_model');

    $teacher_id = $this->session->userdata('teacher_id');
    $data['attendances'] = $this->Attendance_model->get_attendance_by_teacher($teacher_id);

    $this->load->view('teacher/view_attendance', $data);
}

// Edit Attendance
public function edit_attendance($id)
{
    $this->load->model('Attendance_model');
    $data['attendance'] = $this->Attendance_model->get_attendance_by_id($id);
    $this->load->view('teacher/edit_attendance', $data);
}

// Update Attendance
public function update_attendance()
{
    $this->load->model('Attendance_model');

    $id = $this->input->post('id');
    $data = [
        'status' => $this->input->post('status')
    ];

    $this->Attendance_model->update_attendance($id, $data);
    redirect('TeacherDashboard/view_attendance');
}

// Delete Attendance
public function delete_attendance($id)
{
    $this->load->model('Attendance_model');
    $this->Attendance_model->delete_attendance($id);
    redirect('TeacherDashboard/view_attendance');
}

// notice method

public function notices()
{
    $this->load->model('Notice_model');
    $data['notices'] = $this->Notice_model->get_teacher_notices();
    $this->load->view('teacher/teacher_notices', $data);
}

// appointments method for teacher

public function view_appointments() {
    $this->load->model('TeacherDashboard_model');

    // 🔴 Temporary: Set teacher_id manually for testing
    if (!$this->session->userdata('teacher_id')) {
        $this->session->set_userdata('teacher_id', 1);  // id = 1 for Teacher 1
    }

    $teacher_id = $this->session->userdata('teacher_id');

    // 🔎 Optional: Debug
    // echo "Teacher ID: " . $teacher_id; exit;

    $data['appointments'] = $this->TeacherDashboard_model->get_teacher_appointments($teacher_id);
    $this->load->view('teacher/view_appointments', $data);
}


// public function view_appointments() {
//     $this->load->model('TeacherDashboard_model');
//     $teacher_id = $this->session->userdata('teacher_id');     
//     // $this->session->set_userdata('teacher_id', $teacher->id);


// //     echo "Teacher ID: " . $teacher_id;
// // exit;

//     $data['appointments'] = $this->TeacherDashboard_model->get_teacher_appointments($teacher_id);
//     $this->load->view('teacher/view_appointments', $data);
// }



public function update_appointment_status($id, $status) {
    $this->load->model('TeacherDashboard_model');
    $this->TeacherDashboard_model->change_appointment_status($id, $status);
    redirect('TeacherDashboard/view_appointments');
}


}
