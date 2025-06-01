<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

    public function get_all_fakultas() {

        return $this->db->get('fakultas')->result();
    }

    public function tambah_fakultas($data) {

        return $this->db->insert('fakultas', $data);
    }

    public function update_fakultas($id, $data) {

        $this->db->where('id_fakultas', $id);
        return $this->db->update('fakultas', $data);
    }

    public function delete_fakultas($id) {
        
        $this->db->where('id_fakultas', $id);
        return $this->db->delete('fakultas');
    }
}
