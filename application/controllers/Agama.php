<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Agama_model'); 
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Daftar Agama';
        $data['agama'] = $this->Agama_model->get_all_agama();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/agama/agama', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $this->form_validation->set_rules('nama_agama', 'Nama Agama', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_agama' => $this->input->post('nama_agama')
            ];

            $this->Agama_model->tambah_agama($data);
            $this->session->set_flashdata('success', 'Data Agama berhasil ditambahkan!');
            redirect('agama');
        } else {
            $this->session->set_flashdata('error', 'Data agama gagal ditambahkan!');
            redirect('agama');
        }
    }

    public function edit() {
        
        $id = $this->input->post('id_agama');
        $this->form_validation->set_rules('nama_agama', 'Nama Agama', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nama_agama' => $this->input->post('nama_agama')
            ];

            $this->Agama_model->update_agama($id, $data_update);
            $this->session->set_flashdata('success', 'Data agama berhasil diupdate!');
            redirect('agama');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('agama');
        }
    }

    public function hapus($id) {

        if ($this->Agama_model->delete_agama($id)) {
            $this->session->set_flashdata('success', 'Data agama berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data agama gagal dihapus!');
        }
        redirect('agama');
    }
}
