<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Fakultas_model');
        $this->load->library('form_validation');
        $this->load->library('session'); 
    }

    public function index() {
        $data['title'] = 'Data Fakultas';
        $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();

        if ($this->session->flashdata('success')) {
            $data['success'] = $this->session->flashdata('success');
        } elseif ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/fakultas/fakultas', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_fakultas' => $this->input->post('nama_fakultas')
            ];

            $this->Fakultas_model->tambah_fakultas($data);
            $this->session->set_flashdata('success', 'Data fakultas berhasil ditambahkan!');
            redirect('fakultas');
        } else {
            $this->session->set_flashdata('error', 'Data fakultas gagal ditambahkan!');
            redirect('fakultas');
        }
    }

    public function edit() {
        $id = $this->input->post('id_fakultas'); 
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nama_fakultas' => $this->input->post('nama_fakultas')
            ];

            if ($this->Fakultas_model->update_fakultas($id, $data_update)) {
                $this->session->set_flashdata('success', 'Data fakultas berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Data fakultas gagal diupdate!');
            }
            redirect('fakultas');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('fakultas');
        }
    }

    public function hapus() {

        $id = $this->input->post('id');
    
        if ($this->Fakultas_model->delete_fakultas($id)) {
            $this->session->set_flashdata('success', 'Data fakultas berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data fakultas gagal dihapus!');
        }
        redirect('fakultas');
    }
}

