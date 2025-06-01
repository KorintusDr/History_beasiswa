<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Beasiswa_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['title'] = 'Daftar Beasiswa';
        $data['beasiswa'] = $this->Beasiswa_model->get_all_beasiswa();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/beasiswa/beasiswa', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $this->form_validation->set_rules('nama_beasiswa', 'Nama Beasiswa', 'required');
        $this->form_validation->set_rules('penyedia_beasiswa', 'Penyedia Beasiswa', 'required');
        $this->form_validation->set_rules('jenis_beasiswa', 'Jenis Beasiswa', 'required');
        $this->form_validation->set_rules('jumlah_beasiswa', 'Jumlah Beasiswa', 'required');
        $this->form_validation->set_rules('status_beasiswa', 'Status Beasiswa', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data = [
                'nama_beasiswa' => $this->input->post('nama_beasiswa'),
                'penyedia_beasiswa' => $this->input->post('penyedia_beasiswa'),
                'jenis_beasiswa' => $this->input->post('jenis_beasiswa'),
                'jumlah_beasiswa' => $this->input->post('jumlah_beasiswa'),
                'status_beasiswa' => $this->input->post('status_beasiswa')
            ];

            $this->Beasiswa_model->tambah_beasiswa($data);
            $this->session->set_flashdata('success', 'Beasiswa berhasil ditambahkan!');
            redirect('beasiswa');
        }

        $data['title'] = 'Tambah Beasiswa';
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/beasiswa/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'ID Beasiswa tidak ditemukan!');
            redirect('beasiswa');
        }

        $data['beasiswa'] = $this->Beasiswa_model->get_beasiswa_by_id($id);
        if (empty($data['beasiswa'])) {
            $this->session->set_flashdata('error', 'Beasiswa tidak ditemukan!');
            redirect('beasiswa');
        }

        $this->form_validation->set_rules('nama_beasiswa', 'Nama Beasiswa', 'required');
        $this->form_validation->set_rules('penyedia_beasiswa', 'Penyedia Beasiswa', 'required');
        $this->form_validation->set_rules('jenis_beasiswa', 'Jenis Beasiswa', 'required');
        $this->form_validation->set_rules('jumlah_beasiswa', 'Jumlah Beasiswa', 'required');
        $this->form_validation->set_rules('status_beasiswa', 'Status Beasiswa', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data_update = [
                'nama_beasiswa' => $this->input->post('nama_beasiswa'),
                'penyedia_beasiswa' => $this->input->post('penyedia_beasiswa'),
                'jenis_beasiswa' => $this->input->post('jenis_beasiswa'),
                'jumlah_beasiswa' => $this->input->post('jumlah_beasiswa'),
                'status_beasiswa' => $this->input->post('status_beasiswa')
            ];

            $this->Beasiswa_model->update_beasiswa($id, $data_update);
            $this->session->set_flashdata('success', 'Beasiswa berhasil diperbarui!');
            redirect('beasiswa');
        }

        $data['title'] = 'Edit Beasiswa';
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/beasiswa/edit', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id) {
        $this->Beasiswa_model->delete_beasiswa($id);
        $this->session->set_flashdata('success', 'Beasiswa berhasil dihapus!');
        redirect('beasiswa');
    }
}
