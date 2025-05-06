<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubjectModel extends CI_Model
{

    public function insert_subject($data)
    {
        return $this->db->insert('subjects', $data);
    }

    public function get_all_subjects()
    {
        $this->db->select('subjects.*, classes.class_name');
        $this->db->from('subjects');
        $this->db->join('classes', 'classes.id = subjects.class_id');
        return $this->db->get()->result();
    }

    public function get_subject_by_id($id)
    {
        return $this->db->get_where('subjects', ['id' => $id])->row();
    }

    public function update_subject($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('subjects', $data);
    }


}
