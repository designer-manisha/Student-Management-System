<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Teacher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Teacher_model');
        $this->load->helper('url');
    }

    public function add()
    {
        $this->load->view('admin/teacher/add_teacher');
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('joining_date', 'Joining Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/teacher/add_teacher');
            return;
        }
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'subject' => $this->input->post('subject'),
            'joining_date' => $this->input->post('joining_date')
        );
        $this->Teacher_model->insert_teacher($data);

        $this->session->set_flashdata('success', 'Teacher added successfully!');
        redirect('teacher/view');
    }

    public function view()
    {
        $data['teachers'] = $this->Teacher_model->get_all_teachers();
        $this->load->view('admin/teacher/view_teacher', $data);
    }

    public function edit($id)
    {
        $this->load->model('Teacher_model');
        $data['teacher'] = $this->Teacher_model->get_teacher_by_id($id);
        $this->load->view('admin/teacher/edit_teacher', $data);
    }

    public function update($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'subject' => $this->input->post('subject'),
            'joining_date' => $this->input->post('joining_date')
        );
        $this->Teacher_model->update_teacher($id, $data);

        $this->session->set_flashdata('success', 'Teacher updated successfully!');
        redirect('teacher/view');
    }

    public function delete($id)
    {
        $this->Teacher_model->delete_teacher($id);

        $this->session->set_flashdata('success', 'Teacher deleted successfully!');
        redirect('teacher/view');
    }

    public function generate_pdf($id)
    {
        $this->load->model('Teacher_model');
        $this->load->library('Fpdf_lib');

        $teacher = $this->Teacher_model->get_teacher_by_id($id);

        if (!$teacher) {
            $this->session->set_flashdata('error', 'Teacher not found.');
            redirect('teacher/view');
        }

        $pdf = new Fpdf_lib();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Teacher Details', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Name: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->name, 0, 1);

        $pdf->Cell(50, 10, 'Email: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->email, 0, 1);

        $pdf->Cell(50, 10, 'Phone: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->phone, 0, 1);

        $pdf->Cell(50, 10, 'Gender: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->gender, 0, 1);

        $pdf->Cell(50, 10, 'Subject: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->subject, 0, 1);

        $pdf->Cell(50, 10, 'Joining Date: ', 0, 0);
        $pdf->Cell(100, 10, $teacher->joining_date, 0, 1);

        $pdf->Output('D', 'teacher_' . $teacher->id . '.pdf');
    }

    public function download_all_pdf()
    {
        $this->load->model('Teacher_model');
        $this->load->library('Dompdf_lib');

        $teachers = $this->Teacher_model->get_all_teachers(); // ye function tu model me bana chuka hoga

        $html = '<h3 style="text-align:center;">All Teachers Details</h3>';
        $html .= '<table border="1" width="100%" ce+llpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Subject</th>
                        <th>Joining Date</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($teachers as $teacher) {
            $html .= '<tr>
                    <td>' . $teacher->id . '</td>
                    <td>' . $teacher->name . '</td>
                    <td>' . $teacher->email . '</td>
                    <td>' . $teacher->phone . '</td>
                    <td>' . $teacher->gender . '</td>
                    <td>' . $teacher->subject . '</td>
                    <td>' . $teacher->joining_date . '</td>
                  </tr>';
        }

        $html .= '</tbody></table>';

        $pdf = new Dompdf_lib();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream("all_teachers.pdf", array("Attachment" => 1));
    }


    public function download_excel($id)
    {
        $this->load->model('Teacher_model');
        $teacher = $this->Teacher_model->get_teacher_by_id($id); // ye tu already bana chuka hoga

        //require APPPATH . 'vendor/autoload.php'; // make sure autoload ka path sahi ho
        require_once APPPATH . '../vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Contact');
        $sheet->setCellValue('E1', 'Gender');
        $sheet->setCellValue('F1', 'Subject');
        $sheet->setCellValue('G1', 'Joining Date');

        $sheet->setCellValue('A2', $teacher->id);
        $sheet->setCellValue('B2', $teacher->name);
        $sheet->setCellValue('C2', $teacher->email);
        $sheet->setCellValue('D2', $teacher->phone);
        $sheet->setCellValue('E2', $teacher->gender);
        $sheet->setCellValue('F2', $teacher->subject);
        $sheet->setCellValue('G2', $teacher->joining_date);

        $filename = 'teacher_' . $teacher->id . '.xlsx';
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

    public function download_all_teacher_excel()
    {
        $this->load->model('Teacher_model');
        $teachers = $this->Teacher_model->get_all_teachers();

       
        require_once APPPATH . '../vendor/autoload.php';

    
        if (empty($teachers)) {
            show_error('No teachers found');
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
        $sheet->setCellValue('G1', 'Subject'); 
        $sheet->setCellValue('H1', 'Joining Date'); 
       
        
        // Data Rows
        $row = 2;
        foreach ($teachers as $teacher) {
            $sheet->setCellValue('A' . $row, $teacher->id);
            $sheet->setCellValue('C' . $row, $teacher->name);
            $sheet->setCellValue('D' . $row, $teacher->email);
            $sheet->setCellValue('E' . $row, $teacher->phone);
            $sheet->setCellValue('F' . $row, $teacher->gender);
            $sheet->setCellValue('G' . $row, $teacher->subject);
            $sheet->setCellValue('H' . $row, $teacher->joining_date);
            $row++;
        }

        $filename = 'All_teachers_Data.xlsx';

        if (ob_get_length()) ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
