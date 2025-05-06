<?php
class TeacherDashboard_model extends CI_Model {

    public function verify_teacher($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // Simple password check. Hashing recommended
        return $this->db->get('teachers')->row();
    }


    public function get_teacher_by_id($teacher_id) {
        return $this->db->get_where('teachers', ['id' => $teacher_id])->row();
    }
    
    public function get_total_assigned_subjects($teacher_id) {
        return $this->db->where('teacher_id', $teacher_id)->count_all_results('subject_assignments');
    }

    public function get_total_students($teacher_id) {
        $this->db->select('students.id');
        $this->db->from('subject_assignments');
        $this->db->join('students', 'students.class_id = subject_assignments.class_id');
        $this->db->where('subject_assignments.teacher_id', $teacher_id);
        $this->db->group_by('students.id');
        return $this->db->count_all_results();
    }
    
    public function get_total_appointments($teacher_id) {
        return $this->db->where('teacher_id', $teacher_id)->count_all_results('appointments');
    }

    // my profile method

    public function update_teacher($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('teachers', $data);
    }
    


// public function get_assigned_subjects($teacher_id) {
//     // Get the subjects assigned to the teacher
//     $this->db->select('s.subject_name, s.class_name, s.section');
//     $this->db->from('subjects s');
//     $this->db->where('s.teacher_id', $teacher_id);
//     $query = $this->db->get();
    
//     // Return the result
//     return $query->result();
// }


public function get_teacher_subjects($teacher_id)
{
    $this->db->select('sub.subject_name, cls.class_name, cls.id as class_id, sa.section');
    $this->db->from('subject_assignments sa');
    $this->db->join('subjects sub', 'sa.subject_id = sub.id');
    $this->db->join('classes cls', 'sa.class_id = cls.id');
    $this->db->where('sa.teacher_id', $teacher_id);
    $query = $this->db->get();
    return $query->result();
}


// public function get_students_by_subject($teacher_id, $subject_name) {
//     // Get the students for the specific subject assigned to the teacher
//     $this->db->select('st.name, st.email, st.phone');
//     $this->db->from('students st');
//     $this->db->join('subjects s', 's.id = st.subject_id');
//     $this->db->where('s.teacher_id', $teacher_id);
//     $this->db->where('s.subject_name', $subject_name);
//     $query = $this->db->get();
    
//     // Return the result
//     return $query->result();
// }

public function get_students_by_class_section($class_id)
{
    $this->db->where('class_id', $class_id);
    // $this->db->where('section', $section);
    $query = $this->db->get('students');
    return $query->result();
}


// public function get_assigned_subjects($teacher_id) {
//     $this->db->where('teacher_id', $teacher_id);
//     return $this->db->get('subject_assignments')->result();
// }

public function get_students_for_attendance($class_id, $section)
{
    $this->db->where('class_id', $class_id);
    $this->db->where('section', $section);
    $query = $this->db->get('students');
    return $query->result();
}

public function get_assigned_subjects($teacher_id) {
    $this->db->select('subject_assignments.class_id, subject_assignments.section, subjects.subject_name, classes.class_name');
    $this->db->from('subject_assignments');
    $this->db->join('classes', 'classes.id = subject_assignments.class_id');
    $this->db->join('subjects', 'subjects.id = subject_assignments.subject_id');
    $this->db->where('subject_assignments.teacher_id', $teacher_id);
    return $this->db->get()->result();
}

// appointment method 

public function get_teacher_appointments($teacher_id) {
    $this->db->select('appointments.*, students.name as student_name');
    $this->db->from('appointments');
    $this->db->join('students', 'appointments.student_id = students.id');
    $this->db->where('appointments.teacher_id', $teacher_id);
    return $this->db->get()->result();
}

public function change_appointment_status($id, $status) {
    $this->db->set('status', $status);
    $this->db->where('id', $id);
    $this->db->update('appointments');
}   
    
}
