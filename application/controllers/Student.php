<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('url');
    }
    
    public function add()
    {
        $this->load->model('Student_model');
        $data['classes'] = $this->Student_model->get_all_classes(); // add this line
        $this->load->view('admin/student/add_student', $data); // pass $data to view
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('class_id', 'Class', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/student/add_student');
            return;
        }

        $data = array(
            'name'     => $this->input->post('name'),
            'email'    => $this->input->post('email'),
            'phone'    => $this->input->post('phone'),
            'gender'   => $this->input->post('gender'),
            'dob'      => $this->input->post('dob'),
            'address'  => $this->input->post('address'),
            'class_id' => $this->input->post('class_id'),
            'password' => $this->input->post('password'),
            // 'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        );
        $this->Student_model->insert_student($data);

        $this->session->set_flashdata('success', 'Student added successfully!');
        redirect('student/view');
    }

    public function view()
    {
        $data['students'] = $this->Student_model->get_all_students();
        $this->load->view('admin/student/view_students', $data);
    }

    // Show edit form
    public function edit($id)
    {
        $this->load->model('Student_model');
        $data['student'] = $this->Student_model->get_student_by_id($id);
        $this->load->view('admin/student/edit_student', $data);
    }

    // Update student data
    public function update($id)
    {
        $this->load->model('Student_model');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'class' => $this->input->post('class'),
        );
        $this->Student_model->update_student($id, $data);

        $this->session->set_flashdata('success', 'Student updated successfully!');
        redirect('student/view');
    }

    // Delete student
    public function delete($id)
    {
        $this->load->model('Student_model');
        $this->Student_model->delete_student($id);

        $this->session->set_flashdata('success', 'Student deleted successfully!');
        redirect('student/view');
    }

  
    public function generate_pdf($id)
    {
        $this->load->model('student_model');
        $this->load->library('Fpdf_lib');

        $student = $this->student_model->get_student_by_id($id);

        if (!$student) {
            show_404();
        }

        $pdf = new Fpdf_lib();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Student Details', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Name: ', 0, 0);
        $pdf->Cell(100, 10, $student['name'], 0, 1);

        $pdf->Cell(50, 10, 'Email: ', 0, 0);
        $pdf->Cell(100, 10, $student['email'], 0, 1);

        $pdf->Cell(50, 10, 'Phone: ', 0, 0);
        $pdf->Cell(100, 10, $student['phone'], 0, 1);

        $pdf->Cell(50, 10, 'Gender: ', 0, 0);
        $pdf->Cell(100, 10, $student['gender'], 0, 1);

        $pdf->Cell(50, 10, 'DOB: ', 0, 0);
        $pdf->Cell(100, 10, $student['dob'], 0, 1);

        $pdf->Cell(50, 10, 'Class: ', 0, 0);
        // $pdf->Cell(100, 10, $student['class'], 0, 1);

        $pdf->Output('D', 'student_' . $student['id'] . '.pdf');
    }


    public function download_all_pdf()
    {
        $this->load->model('student_model');
        $this->load->library('Dompdf_lib');

        $students = $this->student_model->get_all_students(); // ye function tu model me bana chuka hoga

        $html = '<h3 style="text-align:center;">All Students Details</h3>';
        $html .= '<table border="1" width="100%" ce+llpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($students as $student) {
            $html .= '<tr>
                    <td>' . $student->id . '</td>
                    <td>' . $student->name . '</td>
                    <td>' . $student->email . '</td>
                    <td>' . $student->phone . '</td>
                    <td>' . $student->gender . '</td>
                    <td>' . $student->dob . '</td>
                  </tr>';
        }

        $html .= '</tbody></table>';

        $pdf = new Dompdf_lib();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream("all_students.pdf", array("Attachment" => 1));
    }


    public function download_excel($id)
    {
        $this->load->model('student_model');
        $student = $this->student_model->get_student_by_id($id); // ye tu already bana chuka hoga

        //require APPPATH . 'vendor/autoload.php'; // make sure autoload ka path sahi ho
        require_once APPPATH . '../vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Phone');
        $sheet->setCellValue('E1', 'Gender');
        $sheet->setCellValue('F1', 'DOB');
        $sheet->setCellValue('G1', 'Class');

        $sheet->setCellValue('A2', $student['id']);
        $sheet->setCellValue('B2', $student['name']);
        $sheet->setCellValue('C2', $student['email']);
        $sheet->setCellValue('D2', $student['phone']);
        $sheet->setCellValue('E2', $student['gender']);
        $sheet->setCellValue('F2', $student['dob']);
        $sheet->setCellValue('G2', $student['class']);

        $filename = 'student_' . $student->id . '.xlsx';
        // $writer = new Xlsx($spreadsheet);

        // Download
        if (ob_get_length()) ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function download_all_student_excel()
    {
        $this->load->model('student_model');

        $students = $this->student_model->get_all_students(); // ye function tu model me bana chuka hoga
        require_once APPPATH . '../vendor/autoload.php';

    
        if (empty($students)) {
            show_error('No students found');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $sheet->setCellValue('A1', 'ID'); 
        $sheet->setCellValue('C1', 'Name'); 
        $sheet->setCellValue('D1', 'Email'); 
        $sheet->setCellValue('E1', 'Contact'); 
        $sheet->setCellValue('F1', 'Gender'); 
        $sheet->setCellValue('G1', 'DOB'); 
        $sheet->setCellValue('H1', 'Class'); 
       
        
        // Data Rows
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->id);
            $sheet->setCellValue('C' . $row, $student->name);
            $sheet->setCellValue('D' . $row, $student->email);
            $sheet->setCellValue('E' . $row, $student->phone);
            $sheet->setCellValue('F' . $row, $student->gender);
            $sheet->setCellValue('G' . $row, $student->dob);
            // $sheet->setCellValue('H' . $row, $student->class);
            $row++;
        }

        $filename = 'All_students_Data.xlsx';

        if (ob_get_length()) ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

}
