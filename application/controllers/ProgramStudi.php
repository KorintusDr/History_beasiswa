<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramStudi extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProgramStudi_model');
        $this->load->library('form_validation');
        $this->load->library('session'); 
    }

    public function index() {

        $data['title'] = 'Data Program Studi';
        $data['programstudi'] = $this->ProgramStudi_model->get_all_program_studi();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/program_studi/program_studi', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {

        $this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_program_studi' => $this->input->post('nama_program_studi')
            ];

            $this->ProgramStudi_model->tambah_program_studi($data);
            $this->session->set_flashdata('success', 'Data program studi berhasil ditambahkan!');
            redirect('programstudi');
        } else {
            $this->session->set_flashdata('error', 'Data program studi gagal ditambahkan!');
            redirect('programstudi');
        }
    }

    public function edit() {

        $id = $this->input->post('id_programstudi');
        $this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_update = [
                'nama_program_studi' => $this->input->post('nama_program_studi')
            ];

            if ($this->ProgramStudi_model->update_program_studi($id, $data_update)) {
                $this->session->set_flashdata('success', 'Data program studi berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Data program studi gagal diupdate!');
            }
            redirect('programstudi');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('programstudi');
        }
    }

    public function hapus() {

        $id = $this->input->post('id');
    
        if ($this->ProgramStudi_model->delete_program_studi($id)) {
            $this->session->set_flashdata('success', 'Data program studi berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data program studi gagal dihapus!');
        }
        redirect('programstudi');
    }
}
