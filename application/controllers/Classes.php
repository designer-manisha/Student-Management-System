<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ClassModel');
    }

    public function add() {
        $data['teachers'] = $this->ClassModel->get_teachers();

        if ($this->input->post()) {
            $classData = array(
                'class_name' => $this->input->post('class_name'),   
                'section' => $this->input->post('section'),
                'class_teacher_id' => $this->input->post('class_teacher_id')
            );

            $this->ClassModel->insert_class($classData);
            $this->session->set_flashdata('success', 'Class added successfully!');
            redirect('Classes/view');
        }

        $this->load->view('admin/classes/add_class', $data);
    }

    public function view() {
        $data['classes'] = $this->ClassModel->get_all_classes();
        $this->load->view('admin/classes/class_list', $data);
    }

    public function edit($id) {
        $this->load->model('ClassModel');
        
        $data['class_data'] = $this->ClassModel->get_class_by_id($id);
        $data['teachers'] = $this->ClassModel->get_teachers();
    
        if ($this->input->post()) {
            $updateData = array(
                'class_name' => $this->input->post('class_name'),
                'section' => $this->input->post('section'),
                'class_teacher_id' => $this->input->post('class_teacher_id')
            );
    
            $this->ClassModel->update_class($id, $updateData);
            $this->session->set_flashdata('success', 'Class updated successfully!');
            redirect('Classes/view');
        }
    
        $this->load->view('admin/classes/edit_class', $data);
    }

    public function delete($id) {
        $this->load->model('ClassModel');
        $this->ClassModel->delete_class($id);
        $this->session->set_flashdata('success', 'Class deleted successfully!');
        redirect('Classes/view');
    }
    

}
