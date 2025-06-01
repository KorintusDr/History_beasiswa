<?php
class Beasiswa_model extends CI_Model {

    public function get_all_beasiswa() {

        return $this->db->get('beasiswa')->result();
    }

    public function tambah_beasiswa($data) {

        return $this->db->insert('beasiswa', $data);
    }

    public function get_beasiswa_by_id($id) {

        return $this->db->get_where('beasiswa', ['id_beasiswa' => $id])->row();
    }

    public function update_beasiswa($id, $data) {

        $this->db->where('id_beasiswa', $id);
        return $this->db->update('beasiswa', $data);
    }

    public function delete_beasiswa($id) {
        
        $this->db->where('id_beasiswa', $id);
        return $this->db->delete('beasiswa');
    }
}
