<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model {

    public function get_all_pekerjaan() {

        return $this->db->get('pekerjaan')->result();
    }

    public function tambah_pekerjaan($data) {

        return $this->db->insert('pekerjaan', $data);
    }

    public function update_pekerjaan($id, $data) {
        
        $this->db->where('id_pekerjaan', $id);
        return $this->db->update('pekerjaan', $data);
    }

    public function delete_pekerjaan($id) {

        $this->db->where('id_pekerjaan', $id);
        return $this->db->delete('pekerjaan');
    }
}
