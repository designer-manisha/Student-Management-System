<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassModel extends CI_Model {

    public function insert_class($data) {
        return $this->db->insert('classes', $data);
    }

    public function get_teachers() {
        return $this->db->get('teachers')->result();
    }

    public function get_all_classes() {
        $this->db->select('classes.*, teachers.name as teacher_name');
        $this->db->from('classes');
        $this->db->join('teachers', 'teachers.id = classes.class_teacher_id', 'left');
        return $this->db->get('')->result();
    }

    public function get_class_by_id($id) {
        return $this->db->get_where('classes', ['id' => $id])->row();
    }
    
    public function update_class($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('classes', $data);
    }

    public function delete_class($id) {
        return $this->db->delete('classes', ['id' => $id]);
    }
    
}
