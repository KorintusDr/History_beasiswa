<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->model('Pekerjaan_model'); 
        $this->load->library('form_validation');
    }

    public function index() {

        $data['title'] = 'Daftar Pekerjaan'; 
        $data['pekerjaan'] = $this->Pekerjaan_model->get_all_pekerjaan(); 

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/pekerjaan/pekerjaan', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_pekerjaan' => $this->input->post('nama_pekerjaan')
            ];

            $this->Pekerjaan_model->tambah_pekerjaan($data);
            $this->session->set_flashdata('success', 'Data Pekerjaan berhasil ditambahkan!');
            redirect('pekerjaan');
        } else {
            $this->session->set_flashdata('error', 'Data pekerjaan gagal ditambahkan!');
            redirect('pekerjaan');
        }
    }

    public function edit() {

        $id = $this->input->post('id_pekerjaan');
        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nama_pekerjaan' => $this->input->post('nama_pekerjaan')
            ];

            $this->Pekerjaan_model->update_pekerjaan($id, $data_update);
            $this->session->set_flashdata('success', 'Data pekerjaan berhasil diupdate!');
            redirect('pekerjaan');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pekerjaan');
        }
    }

    public function hapus($id) {

        if ($this->Pekerjaan_model->delete_pekerjaan($id)) {
            $this->session->set_flashdata('success', 'Data pekerjaan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data pekerjaan gagal dihapus!');
        }
        redirect('pekerjaan');
    }
}
