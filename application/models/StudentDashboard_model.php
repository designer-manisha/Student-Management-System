<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDashboard_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

   
    public function check_student_login($email, $password)
{
    $query = $this->db->get_where('students', [
        'email' => $email,
        'password' => $password
    ]);

    return $query->row_array(); // Array return ho raha hai

    // $this->db->where('email', $email);
    // $query = $this->db->get('students');
    // $student = $query->row();

    // if ($student && password_verify($password, $student->password)) {
    //     return $student; // Login success
    // } else {
    //     return false; // Login fail
    // }
}

public function get_student_by_id($id){
    return $this->db->get_where('students', ['id' => $id])->row_array();
}

public function update_student($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('students', $data);
}


public function get_student_class_info($student_id)
{
    $this->db->select('students.id, students.name, students.class_id, classes.class_name, classes.section, teachers.name as class_teacher_id');
    $this->db->from('students');
    $this->db->join('classes', 'classes.id = students.class_id');
    $this->db->join('teachers', 'teachers.id = classes.class_teacher_id', 'left'); // join teacher table
    $this->db->where('students.id', $student_id);
    return $this->db->get()->row();
}

public function get_assigned_subjects($class_id, $section)
{
    // $this->db->select('subjects.name as subject_name, teachers.name as teacher_name');
    $this->db->select('subjects.subject_name as subject_name, teachers.name as teacher_name');
    $this->db->from('subject_assignments');
    $this->db->join('subjects', 'subjects.id = subject_assignments.subject_id');
    $this->db->join('teachers', 'teachers.id = subject_assignments.teacher_id');
    $this->db->where('subject_assignments.class_id', $class_id);
    $this->db->where('subject_assignments.section', $section);
    $query = $this->db->get();
    return $query->result();
}



public function get_class_subjects($class_id)
{
    $this->db->distinct();
    $this->db->select('subject_name');
    $this->db->from('subjects');
    $this->db->where('class_id', $class_id);
    return $this->db->get()->result();
}


//Subject Model
public function get_all_subjects() {
    return $this->db->get('subjects')->result();
}

public function get_subject_with_teacher($subject_id) {
    $this->db->select('subjects.subject_name, teachers.name as teacher_name');
    $this->db->from('subject_assignments'); // Use the correct table name
    $this->db->join('subjects', 'subjects.id = subject_assignments.subject_id'); // Correct the table name
    $this->db->join('teachers', 'teachers.id = subject_assignments.teacher_id'); // Correct the table name
    $this->db->where('subject_assignments.subject_id', $subject_id); // Correct the table name
    return $this->db->get()->row();
}

// appointment method 

public function get_all_teachers() {
    return $this->db->get('teachers')->result();
}

public function insert_appointment($data) {
    $this->db->insert('appointments', $data);
}

public function get_student_appointments($student_id) {
    $this->db->select('appointments.*, teachers.name as teacher_name');
    $this->db->from('appointments');
    $this->db->join('teachers', 'appointments.teacher_id = teachers.id');
    $this->db->where('appointments.student_id', $student_id);
    return $this->db->get()->result();
}



}
?>
