<?php
class Notice_model extends CI_Model
{
    public function insert_notice($data)
    {
        return $this->db->insert('notices', $data);
    }

    public function get_all_notices()
    {
        return $this->db->order_by('notice_date', 'DESC')->get('notices')->result();
    }

    public function delete_notice($id)
    {
        return $this->db->where('id', $id)->delete('notices');
    }

    // teacher view notice 

    public function get_teacher_notices()
{
    $this->db->where_in('audience', ['All', 'Teacher']);
    $this->db->order_by('notice_date', 'DESC');
    return $this->db->get('notices')->result();
}

public function get_student_notices()
{
    $this->db->where_in('audience', ['All', 'Student']);
    $this->db->order_by('notice_date', 'DESC');
    return $this->db->get('notices')->result();
}


}
