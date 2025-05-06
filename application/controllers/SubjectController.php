<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SubjectModel');
        $this->load->model('ClassModel');
    }


    public function add() {
        $data['classes'] = $this->ClassModel->get_all_classes();
    
        if ($this->input->post()) {
            $subject_name = $this->input->post('subject_name');
            $class_id = $this->input->post('class_id');
    
            // ✅ Duplicate check
            $this->db->where('subject_name', $subject_name);
            $this->db->where('class_id', $class_id);
            $existing = $this->db->get('subjects')->row();
    
            if ($existing) {
                // 🔴 Subject already exists
                $this->session->set_flashdata('error', 'This subject already exists for the selected class.');
                redirect('SubjectController/add');
            } else {
                // ✅ Add new subject
                $subjectData = array(
                    'subject_name' => $subject_name,
                    'class_id' => $class_id
                );
                $this->SubjectModel->insert_subject($subjectData);
                $this->session->set_flashdata('success', 'Subject added successfully!');
                redirect('SubjectController/list');
            }
        }
    
        $this->load->view('admin/subjects/add_subject', $data);
    }
    

    // public function add() {
    //     $data['classes'] = $this->ClassModel->get_all_classes();

    //     if ($this->input->post()) {
    //         $subjectData = array(
    //             'subject_name' => $this->input->post('subject_name'),
    //             'class_id' => $this->input->post('class_id')
    //         );
    //         $this->SubjectModel->insert_subject($subjectData);
    //         $this->session->set_flashdata('success', 'Subject added successfully!');
    //         redirect('SubjectController/list');
    //     }

    //     $this->load->view('admin/subjects/add_subject', $data);
    // }

    public function list() {
        $data['subjects'] = $this->SubjectModel->get_all_subjects();
        $this->load->view('admin/subjects/subject_list', $data);
    }

    public function edit($id) {
        $data['classes'] = $this->ClassModel->get_all_classes();
        $data['subject'] = $this->SubjectModel->get_subject_by_id($id);
    
        if ($this->input->post()) {
            $updateData = array(
                'subject_name' => $this->input->post('subject_name'),
                'class_id' => $this->input->post('class_id')
            );
            $this->SubjectModel->update_subject($id, $updateData);
            $this->session->set_flashdata('success', 'Subject updated successfully!');
            redirect('SubjectController/list');
        }
    
        $this->load->view('admin/subjects/edit_subject', $data);
    }
    
}
