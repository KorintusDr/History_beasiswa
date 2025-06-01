<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;


class Pencairan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pencairan_model');   
        $this->load->library('form_validation');
    }

    public function index() {
        $role = $this->session->userdata('role');
        $id_user = $this->session->userdata('id_user');
        
        $data['title'] = 'Data Pencairan';
    
        if ($role === 'petugas') {
            $data['pencairan'] = $this->Pencairan_model->get_all_pencairan();
            $view = 'petugas/pencairan/pencairan';
        } elseif ($role === 'pimpinan') {
            $data['pencairan'] = $this->Pencairan_model->get_all_pencairan();
            $view = 'pimpinan/pencairan/pencairan';
        } elseif ($role === 'mahasiswa') {

            $id_pengajuan = $this->Pencairan_model->get_pengajuan_by_user($id_user); 

            $data['pencairan'] = $this->Pencairan_model->get_pencairan_by_pengajuan($id_pengajuan);

            if (empty($data['pencairan'])) {
                $this->session->set_flashdata('error', 'Tidak ada data pencairan untuk pengajuan Anda.');
                redirect('mahasiswa/dashboard'); 
                return;
            }
            
            $view = 'mahasiswa/pencairan/pencairan';
        } else {
            redirect('auth'); 
            return;
        }
    
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', ['user' => $role]);
        $this->load->view($view, $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Tambah Pencairan Dana Beasiswa';
        $data['mahasiswa'] = $this->Pencairan_model->get_all_mahasiswa();  

        $this->form_validation->set_rules('id_pengajuan', 'Mahasiswa', 'required');
        $this->form_validation->set_rules('tanggal_pencairan', 'Tanggal Pencairan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Pencairan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('petugas/pencairan/tambah', $data);
            $this->load->view('layout/footer');
        } else {

            $pencairan_data = [
                'id_user' => $id_user,
                'id_pengajuan' => $this->input->post('id_pengajuan'),
                'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $this->Pencairan_model->tambah_pencairan($pencairan_data);
            $this->session->set_flashdata('success', 'Data pencairan berhasil ditambahkan.');
            redirect('pencairan');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Pencairan Dana Beasiswa';
        $data['pencairan'] = $this->Pencairan_model->get_pencairan_by_id($id);
        $data['mahasiswa'] = $this->Pencairan_model->get_all_mahasiswa(); 

        $this->form_validation->set_rules('id_pengajuan', 'Mahasiswa', 'required');
        $this->form_validation->set_rules('tanggal_pencairan', 'Tanggal Pencairan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Pencairan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('petugas/pencairan/edit', $data);
            $this->load->view('layout/footer');
        } else {

            $pencairan_data = [
                'id_pengajuan' => $this->input->post('id_pengajuan'),
                'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $this->Pencairan_model->update($id, $pencairan_data);
            $this->session->set_flashdata('success', 'Data pencairan berhasil diperbarui.');
            redirect('pencairan');
        }
    }

    public function get_mahasiswa_data() {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $data = $this->Pencairan_model->get_mahasiswa_by_pengajuan($id_pengajuan);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode([]); 
        }
    }

    public function verifikasi($id)
    {
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'status' => $status,
            'keterangan' => $keterangan,
        );

        $this->Pencairan_model->update($id, $data);

        $this->session->set_flashdata('success', 'Pencairan dana telah diverifikasi.');
        redirect('pencairan');
    }

    public function hapus($id) {

        $this->Pencairan_model->hapus_pencairan($id);
        $this->session->set_flashdata('success', 'Data pencairan berhasil dihapus.');
        redirect('pencairan');
    }

    public function export_excel() {
        $pencairan = $this->Pencairan_model->get_all_pencairan(); 

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'NIM');
        $sheet->setCellValue('C1', 'No Telepon');
        $sheet->setCellValue('D1', 'Universitas');
        $sheet->setCellValue('E1', 'Bantuan');
        $sheet->setCellValue('F1', 'Jumlah');
        $sheet->setCellValue('G1', 'Tanggal');
        $sheet->setCellValue('H1', 'Status Pencairan');
        $sheet->setCellValue('I1', 'Keterangan');

        $row = 2; 
        foreach ($pencairan as $item) {
            $sheet->setCellValue('A' . $row, $item['nama_lengkap']);
            $sheet->setCellValue('B' . $row, $item['nim']);
            $sheet->setCellValue('C' . $row, $item['no_telepon']);
            $sheet->setCellValue('D' . $row, $item['nama_universitas']);
            $sheet->setCellValue('E' . $row, $item['nama_beasiswa']);
            $sheet->setCellValue('F' . $row, $item['jumlah_beasiswa']);
            $sheet->setCellValue('G' . $row, date('d-m-Y', strtotime($item['tanggal_pencairan'])));
            $sheet->setCellValue('H' . $row, $item['status']);
            $sheet->setCellValue('I' . $row, $item['keterangan']);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data_Pencairan_Dana.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

 
    public function export_pdf() {
        $pencairan = $this->Pencairan_model->get_all_pencairan(); 

        $dompdf = new Dompdf();

        $html = $this->load->view('petugas/pencairan/pdf', ['pencairan' => $pencairan], true); 

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); 
        $dompdf->render();

        $dompdf->stream("Data_Pencairan_Dana.pdf", array("Attachment" => true));
    }
    

}
