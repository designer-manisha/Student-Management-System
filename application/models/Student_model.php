<?php
class Student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_student($data)
    {
        return $this->db->insert('students', $data);
    }

    // public function get_all_students()
    // {
    //     return $this->db->get('students')->result();
    // }

    public function get_all_students()
    {
        $this->db->select('students.*, classes.class_name, classes.section');
        $this->db->from('students');
        $this->db->join('classes', 'classes.id = students.class_id', 'left'); // <-- yahan change kiya
        return $this->db->get()->result();
    }
    


    // Get single student
    public function get_student_by_id($id)
    {
        return $this->db->get_where('students', array('id' => $id))->row_array();
    }

    // Update student
    public function update_student($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    // Delete student
    public function delete_student($id)
    {
        return $this->db->delete('students', array('id' => $id));
    }

    public function get_all_classes()
{
    return $this->db->get('classes')->result_array();
}


public function get_students_by_class_section($class_id)
{
    $this->db->where('class_id', $class_id);
    // $this->db->where('section', $section);
    return $this->db->get('students')->result();
}


}
