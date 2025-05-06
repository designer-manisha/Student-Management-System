<?php
class Attendance_model extends CI_Model {
    public function save_attendance($data) {
        return $this->db->insert_batch('attendance', $data);
    }

    public function get_attendance_by_teacher($teacher_id)
{
    $this->db->select('a.*, s.name, c.class_name');
    $this->db->from('attendance a');
    $this->db->join('students s', 'a.student_id = s.id');
    $this->db->join('classes c', 'a.class_id = c.id');
    $this->db->where('a.teacher_id', $teacher_id);
    $this->db->order_by('a.attendance_date', 'DESC');
    return $this->db->get()->result();
}

// Attendance Edit
public function get_attendance_by_id($id)
{
    return $this->db->get_where('attendance', ['id' => $id])->row();
}

// Update Attendance
public function update_attendance($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('attendance', $data);
}

// delete attendance
public function delete_attendance($id)
{
    return $this->db->delete('attendance', ['id' => $id]);
}

// admin dashboard view all students attendance

public function get_all_attendance($class_id = null, $subject = null, $date = null)
{
    $this->db->select('attendance.*, students.name, teachers.name as teacher_name, classes.class_name');
    $this->db->from('attendance');
    $this->db->join('students', 'students.id = attendance.student_id');
    $this->db->join('teachers', 'teachers.id = attendance.teacher_id');
    $this->db->join('classes', 'classes.id = attendance.class_id'); 

    if ($class_id) {
        $this->db->where('attendance.class_id', $class_id);
    }

    if ($subject) {
        $this->db->where('attendance.subject', $subject);
    }

    if ($date) {
        $this->db->where('attendance.attendance_date', $date);
    }

    return $this->db->get()->result();
}


public function get_attendance_by_student($student_id)
{
    $this->db->select('a.*, c.class_name, s.name, t.name as marked_by');
    $this->db->from('attendance a');
    $this->db->join('students s', 's.id = a.student_id');
    $this->db->join('classes c', 'c.id = a.class_id');
    $this->db->join('teachers t', 't.id = a.teacher_id');
    $this->db->where('a.student_id', $student_id);
    $this->db->order_by('a.attendance_date', 'DESC');
    return $this->db->get()->result();
}



}


