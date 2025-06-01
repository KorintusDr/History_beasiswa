<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universitas_model extends CI_Model {

    public function get_all_universitas() {
        
        return $this->db->get('universitas')->result();
    }

    public function tambah_universitas($data) {

        return $this->db->insert('universitas', $data);
    }

    public function update_universitas($id, $data) {

        $this->db->where('id_universitas', $id);
        return $this->db->update('universitas', $data);
    }

    public function delete_universitas($id) {

        $this->db->where('id_universitas', $id);
        return $this->db->delete('universitas');
    }

    public function get_universitas_by_id($id) {

        return $this->db->get_where('universitas', ['id_universitas' => $id])->row();
    }
}
