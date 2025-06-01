<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penggunaan_model');
        $this->load->library(['form_validation', 'session', 'upload']);
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $role = $this->session->userdata('role'); 
        $data['title'] = 'Data Penggunaan Dana Beasiswa';
    
        if ($role == 'mahasiswa') {

            $id_pengajuan = $this->Penggunaan_model->get_pengajuan_by_user($id_user);   
            $data['penggunaan'] = $this->Penggunaan_model->get_penggunaan_by_user($id_user);
    
            if (!$this->Penggunaan_model->has_pencairan($id_pengajuan)) {
                $this->session->set_flashdata('error', 'Anda belum memiliki data pencairan untuk pengajuan ini.');
                redirect('mahasiswa/dashboard'); 
                return;
            }
            
            $view = 'mahasiswa/penggunaan/penggunaan';
    
        } elseif ($role == 'petugas') {
            $data['penggunaan'] = $this->Penggunaan_model->get_all_penggunaan();
            $view = 'petugas/penggunaan/penggunaan'; 
        } elseif ($role == 'pimpinan') {
            $data['penggunaan'] = $this->Penggunaan_model->get_all_penggunaan();
            $view = 'pimpinan/penggunaan/penggunaan'; 
        } else {
            show_error('Anda tidak memiliki akses ke halaman ini.');
            return;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view($view, $data); 
        $this->load->view('layout/footer');
    }
    
    public function tambah() {
        $data['title'] = 'Tambah Penggunaan Dana Beasiswa';
        $id_user = $this->session->userdata('id_user');
        $mahasiswa = $this->Penggunaan_model->get_mahasiswa_by_user($id_user);
        
        if ($mahasiswa) {
            $data['nama_lengkap'] = $mahasiswa['nama_lengkap'];
            $data['nim'] = $mahasiswa['nim'];
            $data['id_pengajuan'] = $mahasiswa['id_pengajuan'];
        } else {
            $data['nama_lengkap'] = '';
            $data['nim'] = '';
            $data['id_pengajuan'] = ''; 
            $data['error'] = 'Data mahasiswa tidak ditemukan.';
        }

        $this->form_validation->set_rules('tanggal_penggunaan', 'Tanggal penggunaan', 'required');
        $this->form_validation->set_rules('keterangan_penggunaan', 'Keterangan Penggunaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('penggunaan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/';
            $config['allowed_types'] = 'jpg|png|pdf|jpeg';
            $config['max_size'] = 2048; 
            $this->upload->initialize($config);  
    
            if (!$this->upload->do_upload('bukti_penggunaan')) {
                $data['error_upload'] = $this->upload->display_errors();
                $this->load->view('layout/header', $data);
                $this->load->view('layout/navbar');
                $this->load->view('layout/sidebar');
                $this->load->view('penggunaan/tambah', $data);
                $this->load->view('layout/footer');
            } else {
                $upload_data = $this->upload->data();
                $bukti_penggunaan = $upload_data['file_name'];
    
                $penggunaan_data = [
                    'id_user' => $this->session->userdata('id_user'),
                    'id_pengajuan' => $this->input->post('id_pengajuan'), 
                    'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
                    'keterangan_penggunaan' => $this->input->post('keterangan_penggunaan'),
                    'bukti_penggunaan' => $bukti_penggunaan
                ];
                
                $this->Penggunaan_model->tambah_penggunaan($penggunaan_data);
    
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data penggunaan berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data penggunaan.');
                }
    
                redirect('penggunaan');
            }
        }
    } 

    public function verifikasi($id_penggunaan) {
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Verifikasi gagal. Status tidak valid.');
        } else {
            $status = $this->input->post('status');
            if ($this->Penggunaan_model->update($id_penggunaan, $status)) {
                $this->session->set_flashdata('success', 'Status penggunaan dana berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Update status gagal. Tidak ada perubahan yang dilakukan.');
            }
        }
        redirect('penggunaan');
    }

    public function edit($id_penggunaan) {
        $data['title'] = 'Edit Penggunaan Dana Beasiswa';
        
        $penggunaan = $this->Penggunaan_model->get_penggunaan_by_id($id_penggunaan);
        
        if (!$penggunaan) {
            $this->session->set_flashdata('error', 'Data penggunaan tidak ditemukan.');
            redirect('penggunaan');
            return;
        }
    
        $data['penggunaan'] = $penggunaan;
        
        $this->form_validation->set_rules('tanggal_penggunaan', 'Tanggal penggunaan', 'required');
        $this->form_validation->set_rules('keterangan_penggunaan', 'Keterangan Penggunaan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('mahasiswa/penggunaan/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $config['upload_path'] = './uploads/bukti/';
            $config['allowed_types'] = 'jpg|png|pdf|jpeg';
            $config['max_size'] = 2048; 
            $this->upload->initialize($config);  
    
            if (!empty($_FILES['bukti_penggunaan']['name'])) {
                if (!$this->upload->do_upload('bukti_penggunaan')) {
                    $data['error_upload'] = $this->upload->display_errors();
                    $this->load->view('layout/header', $data);
                    $this->load->view('layout/navbar');
                    $this->load->view('layout/sidebar');
                    $this->load->view('mahasiswa/penggunaan/edit', $data);
                    $this->load->view('layout/footer');
                } else {

                    if (file_exists('./uploads/bukti/' . $penggunaan['bukti_penggunaan'])) {
                        unlink('./uploads/bukti/' . $penggunaan['bukti_penggunaan']);
                    }

                    $upload_data = $this->upload->data();
                    $bukti_penggunaan = $upload_data['file_name'];
    
                    $penggunaan_data = [
                        'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
                        'keterangan_penggunaan' => $this->input->post('keterangan_penggunaan'),
                        'bukti_penggunaan' => $bukti_penggunaan
                    ];
                }
            } else {

                $penggunaan_data = [
                    'tanggal_penggunaan' => $this->input->post('tanggal_penggunaan'),
                    'keterangan_penggunaan' => $this->input->post('keterangan_penggunaan'),
                ];
            }
    
            $this->Penggunaan_model->update_penggunaan($id_penggunaan, $penggunaan_data);
    
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data penggunaan berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data penggunaan.');
            }
    
            redirect('penggunaan');
        }
    }

    public function hapus($id_penggunaan) {

        $penggunaan = $this->Penggunaan_model->get_penggunaan_by_id($id_penggunaan);
    
        if (!$penggunaan) {
            $this->session->set_flashdata('error', 'Data penggunaan tidak ditemukan.');
            redirect('penggunaan');
            return;
        }

        if (file_exists('./uploads/bukti/' . $penggunaan['bukti_penggunaan'])) {
            unlink('./uploads/bukti/' . $penggunaan['bukti_penggunaan']);
        }
    
        $this->Penggunaan_model->hapus_penggunaan($id_penggunaan);
    
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data penggunaan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data penggunaan.');
        }
    
        redirect('penggunaan');
    }
    
}
