<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users() {

        return $this->db->get('users')->result_array();
    }

    public function get_all_roles() {

        return $this->db->distinct()->select('role')->get('users')->result();
    }

    public function tambah_user($data) {

        return $this->db->insert('users', $data);
    }

    public function get_user_by_id($id_user) {

        return $this->db->get_where('users', ['id_user' => $id_user])->row();
    }

    public function update_user($id_user, $data) {

        $this->db->where('id_user', $id_user);
        return $this->db->update('users', $data);
    }

    public function delete_user($id_user) {

        $this->db->where('id_user', $id_user);
        return $this->db->delete('users');
    }

    public function check_unique_username($username, $id_user = null) {

        $this->db->where('username', $username);
        if ($id_user !== null) {
            $this->db->where('id_user !=', $id_user); 
        }
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

}
