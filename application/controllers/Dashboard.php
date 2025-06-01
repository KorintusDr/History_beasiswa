<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Data_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $data['agama_count'] = $this->Data_model->get_agama_count();
        $data['beasiswa_count'] = $this->Data_model->get_beasiswa_count();
        $data['fakultas_count'] = $this->Data_model->get_fakultas_count();
        $data['pekerjaan_count'] = $this->Data_model->get_pekerjaan_count();
        $data['penghasilan_count'] = $this->Data_model->get_penghasilan_count();
        $data['program_studi_count'] = $this->Data_model->get_program_studi_count();
        $data['universitas_count'] = $this->Data_model->get_universitas_count();
        $data['users_count'] = $this->Data_model->get_users_count();
        $data['pengajuan_count'] = $this->Data_model->get_pengajuan_count();
        $data['pencairan_dana_beasiswa_count'] = $this->Data_model->get_pencairan_dana_beasiswa_count();
        $data['penggunaan_beasiswa_count'] = $this->Data_model->get_penggunaan_beasiswa_count();
        $data['status_pendaftaran_count'] = $this->Data_model->get_status_pendaftaran_count();

        $id_user = $this->session->userdata('id_user');
        if (!$id_user) {
            redirect('auth');
        }

        $data['user'] = $this->Auth_model->get_user_by_id($id_user);
        $data['title'] = 'Dashboard';

        $role = $this->session->userdata('role');
        if ($role == 'petugas') {
            $this->_load_views('petugas/dashboard', $data);
        } else if ($role == 'pimpinan') {
            $this->_load_views('pimpinan/dashboard', $data);
        } else if ($role == 'mahasiswa') {
            $this->_load_views('mahasiswa/dashboard', $data);
        } else {
            redirect('auth');
        }
    }

    private function _load_views($view, $data) {
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view($view, $data);
        $this->load->view('layout/footer');
    }
}

