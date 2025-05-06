<?php
class Parent_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_parent($data)
    {
        return $this->db->insert('parents', $data);
    }

    public function get_all_parents()
    {
        return $this->db->get('parents')->result();
    }

    // Get single parent by ID
    public function get_parent_by_id($id)
    {
        return $this->db->get_where('parents', ['id' => $id])->row();
    }

    // Update parent
    public function update_parent($id, $data)
    {
        return $this->db->where('id', $id)->update('parents', $data);
    }

    // Delete parent
    public function delete_parent($id)
    {
        return $this->db->where('id', $id)->delete('parents');
    }
}
