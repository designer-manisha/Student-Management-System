<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageClassController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ManageClassModel');
    }

    public function manage() {
        // Fetch distinct class names for dropdown
        $data['class_names'] = $this->ManageClassModel->get_class_names();
        $data['class_data'] = []; // by default empty
        $this->load->view('admin/classes/manage_class', $data);
    }

    public function filter() {
        $class_name = $this->input->post('class_name');
        $data['class_names'] = $this->ManageClassModel->get_class_names();
        $data['class_data'] = $this->ManageClassModel->get_class_details($class_name);
        $data['selected_class'] = $class_name;
        $this->load->view('admin/classes/manage_class', $data);
    }
}
