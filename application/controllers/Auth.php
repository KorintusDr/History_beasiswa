<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Auth_model->get_user($username);

        if ($user) {
            if ($password === $user->password || password_verify($password, $user->password)) {
                $data = [
                    'id_user' => $user->id_user,
                    'username' => $user->username,
                    'role' => $user->role
                ];
                $this->session->set_userdata($data);

                if ($user->role == 'petugas') {
                    redirect('petugas/dashboard');
                } else if ($user->role == 'pimpinan') {
                    redirect('pimpinan/dashboard');
                } else if ($user->role == 'mahasiswa') {
                    redirect('mahasiswa/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function register() {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');

        if ($this->form_validation->run() == FALSE) {
 
            $data['title'] = 'Pendaftaran';
            $this->load->view('auth/register', $data);
        } else {

            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'role' => 'mahasiswa' 
            ];
            
            $this->db->insert('users', $data);
            $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login.');
            redirect('auth');
        }
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

    public function logout() {
        $this->session->unset_userdata(['id_user', 'username', 'role']);
        $this->session->set_flashdata('success', 'Anda telah logout!');
        redirect('auth');
    }
}
