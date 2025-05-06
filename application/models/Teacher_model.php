<?php
class Teacher_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_teacher($data)
    {
        return $this->db->insert('teachers', $data);
    }

    public function get_all_teachers()
    {
        return $this->db->get('teachers')->result();
    }

    public function get_teacher_by_id($id)
    {
        return $this->db->get_where('teachers', ['id' => $id])->row();
    }

    public function update_teacher($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('teachers', $data);
    }

    public function delete_teacher($id)
    {
        return $this->db->delete('teachers', ['id' => $id]);
    }

    public function get_teacher_name($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('teachers')->row();
        return $query ? $query->name : '';
    }
}
