<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramStudi_model extends CI_Model {

    public function get_all_program_studi() {

        return $this->db->get('program_studi')->result();
    }

    public function tambah_program_studi($data) {

        return $this->db->insert('program_studi', $data);
    }

    public function update_program_studi($id, $data_update) {

        $this->db->where('id_program_studi', $id);
        return $this->db->update('program_studi', $data_update);
    }

    public function delete_program_studi($id) {
        
        $this->db->where('id_program_studi', $id);
        return $this->db->delete('program_studi');
    }
}
