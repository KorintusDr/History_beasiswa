<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation'); 
    }

    public function index() {

        $data['title'] = 'Daftar Pengguna';
        $data['users'] = $this->User_model->get_all_users();
        $user = $this->session->userdata('user');

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', ['user' => $user]);
        $this->load->view('petugas/user/pengguna', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        
        $data['roles'] = $this->User_model->get_all_roles();
    
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'username' => $this->input->post('username'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'alamat' => $this->input->post('alamat'),
                    'nomor_hp' => $this->input->post('nomor_hp'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'role' => $this->input->post('role'),
                    'created_at' => date('Y-m-d')
                ];
    
                $this->User_model->tambah_user($data);
                $this->session->set_flashdata('success', 'Data pengguna berhasil ditambahkan!');
                redirect('user');
            }
        }
    
        $data['title'] = 'Tambah Pengguna';
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/user/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_user) {

        $data['user'] = $this->User_model->get_user_by_id($id_user);
        if (empty($data['user'])) {
            $this->session->set_flashdata('error', 'Data pengguna tidak ditemukan!');
            redirect('user'); 
        }

        $data['roles'] = $this->User_model->get_all_roles();
    
        if ($this->input->post()) {

            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');

            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
            }
    
            if ($this->form_validation->run() == TRUE) {

                $update_data = [
                    'username' => $this->input->post('username'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'alamat' => $this->input->post('alamat'),
                    'nomor_hp' => $this->input->post('nomor_hp'),
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role')
                ];

                if ($this->input->post('password')) {
                    $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                }

                $this->User_model->update_user($id_user, $update_data);
                $this->session->set_flashdata('success', 'Data pengguna berhasil diperbarui!');
                redirect('user'); 
            }
        }

        $data['title'] = 'Edit Pengguna';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('petugas/user/edit', $data);
        $this->load->view('layout/footer');
    }

    public function username_check($username) {
        $id_user = $this->uri->segment(3); 
        $user = $this->User_model->get_user_by_id($id_user);
        
        if ($this->User_model->check_unique_username($username, $id_user)) {
            $this->form_validation->set_message('username_check', 'Username sudah digunakan oleh pengguna lain.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function delete($id_user) {
        if ($this->User_model->delete_user($id_user)) {
            $this->session->set_flashdata('success', 'Data pengguna berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data pengguna!');
        }
        redirect('user');
    }
    
    public function generate_username() {
        $name = $this->input->get('name');
        $username = $this->generate_strong_username($name);
        echo $username;
    }
    
    public function generate_password() {
        $password = $this->generate_random_string(12);
        echo $password;
    }
    
    private function generate_strong_username($name) {
        $nameParts = explode(' ', $name);
        $initials = strtoupper(substr($nameParts[0], 0, 3)); 
        $randomNumber = rand(10, 99);
        $suffix = substr(md5(time()), 0, 6); 
        return $initials . $randomNumber . $suffix; 
    }
    
    private function generate_random_string($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+[]{}|;:,.<>?';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
