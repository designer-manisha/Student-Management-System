<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Parents extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Parent_model');
    }

    public function add()
    {
        $this->load->view('admin/parent/add_parent');
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/parent/add_parent');
            return;
        }
        
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'address' => $this->input->post('address')
        );
        $this->Parent_model->insert_parent($data);

        $this->session->set_flashdata('success', 'parent added successfully!');
        redirect('parents/view');
    }

    public function view()
    {
        $data['parents'] = $this->Parent_model->get_all_parents();
        $this->load->view('admin/parent/view_parents', $data);
    }

    // Show edit form
    public function edit($id)
    {
        $this->load->model('Parent_model');
        $data['parent'] = $this->Parent_model->get_parent_by_id($id);
        $this->load->view('admin/parent/edit_parent', $data);
    }

    // Update parent
    public function update($id)
    {
        $this->load->model('Parent_model');

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
        ];

        $this->Parent_model->update_parent($id, $data);

        $this->session->set_flashdata('success', 'Parent updated successfully!');
        redirect('parents/view');
    }

    // Delete parent
    public function delete($id)
    {
        $this->load->model('Parent_model');
        $this->Parent_model->delete_parent($id);

        $this->session->set_flashdata('success', 'Parent deleted successfully!');
        redirect('parents/view');
    }

    public function generate_pdf($id)
    {
        $this->load->model('Parent_model');
        $this->load->library('Fpdf_lib');

        $parent = $this->Parent_model->get_parent_by_id($id);

        if (!$parent) {
            show_404();
        }

        $pdf = new Fpdf_lib();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Parent Details', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Name: ', 0, 0);
        $pdf->Cell(100, 10, $parent->name, 0, 1);

        $pdf->Cell(50, 10, 'Email: ', 0, 0);
        $pdf->Cell(100, 10, $parent->email, 0, 1);

        $pdf->Cell(50, 10, 'Phone: ', 0, 0);
        $pdf->Cell(100, 10, $parent->phone, 0, 1);

        $pdf->Cell(50, 10, 'Address: ', 0, 0);
        $pdf->Cell(100, 10, $parent->address, 0, 1);

        $pdf->Output('D', 'parent_' . $parent->id . '.pdf');
    }

    public function download_all_pdf()
    {
        $this->load->model('Parent_model');
        $this->load->library('Dompdf_lib');

        $students = $this->Parent_model->get_all_parents(); // ye function tu model me bana chuka hoga

        $html = '<h3 style="text-align:center;">All Students Details</h3>';
        $html .= '<table border="1" width="100%" ce+llpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>    
                    </tr>
                </thead>
                <tbody>';

        foreach ($students as $student) {
            $html .= '<tr>
                    <td>' . $student->id . '</td>
                    <td>' . $student->name . '</td>
                    <td>' . $student->email . '</td>
                    <td>' . $student->phone . '</td>
                    <td>' . $student->address . '</td>
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
        $this->load->model('Parent_model');
        $parent = $this->Parent_model->get_parent_by_id($id); // ye tu already bana chuka hoga

        //require APPPATH . 'vendor/autoload.php'; // make sure autoload ka path sahi ho
        require_once APPPATH . '../vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Contact');
        $sheet->setCellValue('E1', 'Address');

        $sheet->setCellValue('A2', $parent->id);
        $sheet->setCellValue('B2', $parent->name);
        $sheet->setCellValue('C2', $parent->email);
        $sheet->setCellValue('D2', $parent->phone);
        $sheet->setCellValue('E2', $parent->address);
       

        $filename = 'parent_' . $parent->id . '.xlsx';
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

    public function download_all_parents_excel()
    {
      $this->load->model('Parent_model');
        $parents = $this->Parent_model->get_all_parents();

       
        require_once APPPATH . '../vendor/autoload.php';

    
        if (empty($parents)) {
            show_error('No parents found');
            return;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $sheet->setCellValue('A1', 'ID'); 
        $sheet->setCellValue('C1', 'Name'); 
        $sheet->setCellValue('D1', 'Email'); 
        $sheet->setCellValue('E1', 'Contact'); 
        $sheet->setCellValue('F1', 'Address'); 
        
        // Data Rows
        $row = 2;
        foreach ($parents as $parent) {
            $sheet->setCellValue('A' . $row, $parent->id);
            $sheet->setCellValue('C' . $row, $parent->name);
            $sheet->setCellValue('D' . $row, $parent->email);
            $sheet->setCellValue('E' . $row, $parent->phone);
            $sheet->setCellValue('F' . $row, $parent->address);
            $row++;
        }

        $filename = 'All_parents_Data.xlsx';

        if (ob_get_length()) ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}

