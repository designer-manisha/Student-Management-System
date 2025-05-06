<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssignSubjectModel extends CI_Model
{

    public function get_classes()
    {
        return $this->db->get('classes')->result();  // Fetch all classes
    }

    public function get_teachers()
    {
        return $this->db->get('teachers')->result();  // Fetch all teachers
    }

    public function get_subjects()
    {
        return $this->db->get('subjects')->result();  // Fetch all subjects
    }

    // public function assign_subject($data)
    // {
    //     // Insert the assignment data into the subject_assign table
    //     return $this->db->insert('subject_assignments', $data);
    // }


    public function assign_subject($data)
{
    if ($this->db->insert('subject_assignments', $data)) {
        return true;
    } else {
        log_message('error', 'Insert failed: ' . $this->db->_error_message());
        return false;
    }
}


    public function get_all_assignments()
    {
        // $this->db->select('subject_assignments.*, classes.class_name, teachers.name as teacher_name, subjects.subject_name');
        $this->db->select('subject_assignments.*, classes.class_name, teachers.name as teacher_name, subjects.subject_name');

        $this->db->from('subject_assignments');
        $this->db->join('classes', 'subject_assignments.class_id = classes.id');
        $this->db->join('teachers', 'subject_assignments.teacher_id = teachers.id');
        $this->db->join('subjects', 'subject_assignments.subject_id = subjects.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_assignment_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('subject_assignments')->row();
    }


    public function update_assignment($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('subject_assignments', $data);
    }

    public function delete_assignment($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('subject_assignments');
    }

    public function get_assignments_by_class($class_id)
    {
        $this->db->select('sa.*, s.subject_name, t.name as teacher_name, c.class_name');
        $this->db->from('subject_assignments sa');
        $this->db->join('subjects s', 'sa.subject_id = s.id');
        $this->db->join('teachers t', 'sa.teacher_id = t.id');
        $this->db->join('classes c', 'sa.class_id = c.id');
        $this->db->where('sa.class_id', $class_id);
        return $this->db->get()->result();
    }

    public function get_subjects_by_teacher($teacher_id)
    {
        $this->db->select('sa.*, c.class_name, s.subject_name');
        $this->db->from('subject_assignments sa');
        $this->db->join('classes c', 'sa.class_id = c.id');
        $this->db->join('subjects s', 'sa.subject_id = s.id');
        $this->db->where('sa.teacher_id', $teacher_id);
        return $this->db->get()->result();
    }


// public function check_assignment_exists($class_id, $section, $subject_id)
// {
//     $this->db->where('class_id', $class_id);
//     $this->db->where('section', $section);
//     $this->db->where('subject_id', $subject_id);
//     $query = $this->db->get('subject_assignments'); // table ka naam wahi rakho jo tumhara actual hai

//     return $query->num_rows() > 0;
// }

public function check_assignment_exists($class_id, $section, $subject_id)
{
    $this->db->where('class_id', $class_id);
    $this->db->where('section', $section);
    $this->db->where('subject_id', $subject_id);
    $query = $this->db->get('subject_assignments');  // <- Table ka correct naam yahan daalo

    return $query->num_rows() > 0; // true if exists
}



}
