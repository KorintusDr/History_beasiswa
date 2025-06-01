<?php
class Agama_model extends CI_Model {

    public function get_all_agama() {
        return $this->db->get('agama')->result(); 
    }

    public function tambah_agama($data) {
        return $this->db->insert('agama', $data);
    }

    public function get_agama_by_id($id) {
        return $this->db->get_where('agama', ['id_agama' => $id])->row();
    }

    public function update_agama($id, $data) {
        $this->db->where('id_agama', $id);
        return $this->db->update('agama', $data);
    }

    public function delete_agama($id) {
        $this->db->where('id_agama', $id);
        return $this->db->delete('agama');
    }
}
