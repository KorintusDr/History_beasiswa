<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghasilan extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Penghasilan_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['title'] = 'Data Penghasilan';
        $data['penghasilan'] = $this->Penghasilan_model->get_all_penghasilan();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/penghasilan/penghasilan', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $this->form_validation->set_rules('rentang_penghasilan', 'Rentang Penghasilan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'rentang_penghasilan' => $this->input->post('rentang_penghasilan')
            ];

            $this->Penghasilan_model->tambah_penghasilan($data);
            $this->session->set_flashdata('success', 'Data penghasilan berhasil ditambahkan!');
            redirect('penghasilan');
        } else {
            $this->session->set_flashdata('error', 'Data penghasilan gagal ditambahkan!');
            redirect('penghasilan');
        }
    }

    public function edit() {

        $id = $this->input->post('id_penghasilan');
        $this->form_validation->set_rules('rentang_penghasilan', 'Rentang Penghasilan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'rentang_penghasilan' => $this->input->post('rentang_penghasilan')
            ];

            $this->Penghasilan_model->update_penghasilan($id, $data_update);
            $this->session->set_flashdata('success', 'Data penghasilan berhasil diupdate!');
            redirect('penghasilan');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('penghasilan');
        }
    }

    public function hapus($id) {
        
        if ($this->Penghasilan_model->delete_penghasilan($id)) {
            $this->session->set_flashdata('success', 'Data penghasilan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data penghasilan gagal dihapus!');
        }
        redirect('penghasilan');
    }
}
