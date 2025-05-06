<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageClassModel extends CI_Model {

    public function get_class_names() {
        $this->db->distinct();
        $this->db->select('class_name');
        $this->db->from('classes');
        return $this->db->get()->result();
    }

    public function get_class_details($class_name) {
        $this->db->select('classes.*, teachers.name as teacher_name');
        $this->db->from('classes');
        $this->db->join('teachers', 'teachers.id = classes.class_teacher_id', 'left');
        $this->db->where('class_name', $class_name);
        return $this->db->get()->result();
    }
}
