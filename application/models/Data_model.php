<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
   
    public function get_agama_count() {
        return $this->db->count_all('agama');
    }

    public function get_beasiswa_count() {
        return $this->db->count_all('beasiswa');
    }

    public function get_fakultas_count() {
        return $this->db->count_all('fakultas');
    }

    public function get_pekerjaan_count() {
        return $this->db->count_all('pekerjaan');
    }

    public function get_pencairan_dana_beasiswa_count() {
        return $this->db->count_all('pencairan_dana_beasiswa');
    }

    public function get_pengajuan_count() {
        return $this->db->count_all('pengajuan');
    }

    public function get_status_pendaftaran_count() {
        // Menghitung status pendaftaran
        $this->db->select('status_pendaftaran, COUNT(*) as count');
        $this->db->group_by('status_pendaftaran');
        $query = $this->db->get('pengajuan');
        $result = $query->result_array();

        $counts = array('Diterima' => 0, 'Ditolak' => 0, 'Menunggu Konfirmasi' => 0);
        foreach ($result as $row) {
            $counts[$row['status_pendaftaran']] = (int)$row['count'];
        }
        return array_values($counts);
    }

    public function get_penggunaan_beasiswa_count() {
        return $this->db->count_all('penggunaan_beasiswa');
    }

    public function get_penghasilan_count() {
        return $this->db->count_all('penghasilan');
    }

    public function get_program_studi_count() {
        return $this->db->count_all('program_studi');
    }

    public function get_universitas_count() {
        return $this->db->count_all('universitas');
    }

    public function get_users_count() {
        return $this->db->count_all('users');
    }
}




