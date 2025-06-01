<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universitas extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Universitas_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['title'] = 'Data Universitas';
        $data['universitas'] = $this->Universitas_model->get_all_universitas();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/universitas/universitas', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $data['title'] = 'Tambah Universitas';

        $this->form_validation->set_rules('nama_universitas', 'Nama Universitas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {
            $data_insert = [
                'nama_universitas' => $this->input->post('nama_universitas'),
                'alamat' => $this->input->post('alamat'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'email' => $this->input->post('email')
            ];

            $this->Universitas_model->tambah_universitas($data_insert);
            $this->session->set_flashdata('success', 'Data universitas berhasil ditambahkan!');
            redirect('universitas');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('petugas/universitas/tambah', $data);
            $this->load->view('layout/footer');
        }
    }

    public function edit($id) {

        $data['universitas'] = $this->Universitas_model->get_universitas_by_id($id);
        
        if (empty($data['universitas'])) {
            show_404();
        }
    
        $data['title'] = 'Edit Universitas'; 
    
        $this->form_validation->set_rules('nama_universitas', 'Nama Universitas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nama_universitas' => $this->input->post('nama_universitas'),
                'alamat' => $this->input->post('alamat'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'email' => $this->input->post('email')
            ];
    
            $this->Universitas_model->update_universitas($id, $data_update);
            $this->session->set_flashdata('success', 'Data universitas berhasil diupdate!');
            redirect('universitas');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('petugas/universitas/edit', $data);
            $this->load->view('layout/footer');
        }
    }

    public function hapus($id) {
        
        if ($this->Universitas_model->delete_universitas($id)) {
            $this->session->set_flashdata('success', 'Data universitas berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data universitas gagal dihapus!');
        }
        redirect('universitas');
    }
}
