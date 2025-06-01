<?php
class Penggunaan_model extends CI_Model {

    public function get_all_penggunaan() {
        $this->db->select('pd.*, p.nama_lengkap, p.nim');
        $this->db->from('penggunaan_beasiswa pd');
        $this->db->join('pengajuan p', 'pd.id_pengajuan = p.id_pengajuan');
        return $this->db->get()->result_array();
    }

    public function get_mahasiswa_by_user($id_user) {
        $this->db->select('m.nama_lengkap, m.nim, m.id_pengajuan'); 
        $this->db->from('pengajuan m');
        $this->db->where('m.id_user', $id_user);
        return $this->db->get()->row_array();
    }

    public function get_penggunaan_by_user($id_user) {
        $this->db->select('pd.*, p.nama_lengkap, p.nim');
        $this->db->from('penggunaan_beasiswa pd');
        $this->db->join('pengajuan p', 'pd.id_pengajuan = p.id_pengajuan');
        $this->db->where('pd.id_user', $id_user);
        return $this->db->get()->result_array();
    }

    public function tambah_penggunaan($data) {
        if (!empty($data)) {
            $this->db->insert('penggunaan_beasiswa', $data);
        }
    }

    public function get_pengajuan_by_user($id_user) {
        $this->db->select('id_pengajuan');
        $this->db->from('pengajuan');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row()->id_pengajuan; 
    }

    public function has_pencairan($id_pengajuan) {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->get('pencairan_dana_beasiswa')->num_rows() > 0;
    }

    public function update($id_penggunaan, $status) {
        $data = [
            'status' => $status
        ];
        
        $this->db->where('id_penggunaan', $id_penggunaan);
        $this->db->update('penggunaan_beasiswa', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }     
    }

    public function update_penggunaan($id_penggunaan, $data) {
        $this->db->where('id_penggunaan', $id_penggunaan);
        $this->db->update('penggunaan_beasiswa', $data);

        return $this->db->affected_rows() > 0;
    }

    // Fungsi untuk menghapus penggunaan
    public function hapus_penggunaan($id_penggunaan) {
        // Mengambil data penggunaan untuk cek apakah ada file yang perlu dihapus
        $penggunaan = $this->get_penggunaan_by_id($id_penggunaan);
        
        // Jika ada file di database, hapus file dari folder
        if (!empty($penggunaan['file_dokumen'])) {
            $file_path = './uploads/' . $penggunaan['file_dokumen'];
            if (file_exists($file_path)) {
                unlink($file_path); // Menghapus file dari server
            }
        }

        // Hapus data dari database
        $this->db->where('id_penggunaan', $id_penggunaan);
        $this->db->delete('penggunaan_beasiswa');

        return $this->db->affected_rows() > 0;
    }

    public function get_penggunaan_by_id($id_penggunaan) {
        $this->db->select('pd.*, p.nama_lengkap, p.nim');
        $this->db->from('penggunaan_beasiswa pd');
        $this->db->join('pengajuan p', 'pd.id_pengajuan = p.id_pengajuan');
        $this->db->where('pd.id_penggunaan', $id_penggunaan);
        return $this->db->get()->row_array(); // Kembalikan 1 hasil saja
    }
    
    
}


