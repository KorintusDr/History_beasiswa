<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

    public function get_all_pengajuan() {
        
        return $this->db->get('pengajuan')->result();
    }

    public function get_pengajuan_by_user($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('pengajuan');
        return $query->result();
    }

    public function tambah_pengajuan($data) {

        $this->db->insert('pengajuan', $data);
    }

    public function insertPengajuan($data) {
        return $this->db->insert('pengajuan', $data);
    }

    public function isPengajuanExists($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('pengajuan');
        return $query->num_rows() > 0;
    }

    public function update_status($id, $status) {
        $data = [
            'status_pendaftaran' => $status,
        ];
        $this->db->where('id_pengajuan', $id);
        return $this->db->update('pengajuan', $data);
    }

    public function getPengajuanById($id_pengajuan)
    {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->get('pengajuan')->row(); 
    }
    
    public function updatePengajuan($id, $data) {

        $data = array_filter($data, function($value) {
            return !is_null($value);
        });

        $this->db->where('id_pengajuan', $id);
        return $this->db->update('pengajuan', $data);
    }

    public function deletePengajuan($id_pengajuan) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->delete('pengajuan'); 
    }
    

}
