<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghasilan_model extends CI_Model {

    public function get_all_penghasilan() {

        return $this->db->get('penghasilan')->result();
    }

    public function tambah_penghasilan($data) {

        return $this->db->insert('penghasilan', $data);
    }

    public function update_penghasilan($id, $data) {

        $this->db->where('id_penghasilan', $id);
        return $this->db->update('penghasilan', $data);
    }

    public function delete_penghasilan($id) {
        
        $this->db->where('id_penghasilan', $id);
        return $this->db->delete('penghasilan');
    }
}
