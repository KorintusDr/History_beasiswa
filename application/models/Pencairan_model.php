<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencairan_model extends CI_Model {

    public function get_all_pencairan() {
        $this->db->select('pd.*, p.nama_lengkap, p.nim, p.no_telepon, u.nama_universitas, b.nama_beasiswa, b.jumlah_beasiswa');
        $this->db->from('pencairan_dana_beasiswa pd');
        $this->db->join('pengajuan p', 'pd.id_pengajuan = p.id_pengajuan');
        $this->db->join('beasiswa b', 'p.id_beasiswa = b.id_beasiswa');
        $this->db->join('universitas u', 'p.id_universitas = u.id_universitas');
        return $this->db->get()->result_array();
    }

    public function get_mahasiswa_by_pengajuan($id_pengajuan) {
        $this->db->select('m.nim, m.no_telepon, u.nama_universitas, b.nama_beasiswa, b.jumlah_beasiswa');
        $this->db->from('pengajuan m');
        $this->db->join('beasiswa b', 'm.id_beasiswa = b.id_beasiswa');
        $this->db->join('universitas u', 'm.id_universitas = u.id_universitas');
        $this->db->where('m.id_pengajuan', $id_pengajuan);
        return $this->db->get()->row_array();
    }

    public function get_pengajuan_by_user($id_user) {
        $this->db->select('id_pengajuan');
        $this->db->from('pengajuan');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->id_pengajuan;  
        } else {
            return null; 
        }
    }
    
    public function get_all_mahasiswa() {
        $this->db->select('m.id_pengajuan, m.nama_lengkap, m.nim, m.no_telepon, b.nama_beasiswa, b.jumlah_beasiswa');
        $this->db->from('pengajuan m');
        $this->db->join('beasiswa b', 'm.id_beasiswa = b.id_beasiswa');
        return $this->db->get()->result_array();
    }

    public function tambah_pencairan($data) {
        if (!empty($data)) {
            $this->db->insert('pencairan_dana_beasiswa', $data);
        }
    }

    public function get_pencairan_by_pengajuan($id_pengajuan) {
        $this->db->select('pd.*, p.nama_lengkap, p.nim, p.no_telepon, u.nama_universitas, b.nama_beasiswa, b.jumlah_beasiswa');
        $this->db->from('pencairan_dana_beasiswa pd');
        $this->db->join('pengajuan p', 'pd.id_pengajuan = p.id_pengajuan');
        $this->db->join('beasiswa b', 'p.id_beasiswa = b.id_beasiswa');
        $this->db->join('universitas u', 'p.id_universitas = u.id_universitas');
        $this->db->where('pd.id_pengajuan', $id_pengajuan);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();  
        } else {
            return []; 
        }
    }
    
    public function get_pencairan_by_id($id) {
        $this->db->where('id_pencairan', $id);
        return $this->db->get('pencairan_dana_beasiswa')->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id_pencairan', $id);
        return $this->db->update('pencairan_dana_beasiswa', $data);
    }

    public function hapus_pencairan($id) {
        $this->db->where('id_pencairan', $id);
        $this->db->delete('pencairan_dana_beasiswa');
    }
    
}
