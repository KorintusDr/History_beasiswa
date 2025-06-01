<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($username) {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }

    public function get_user_by_id($id_user) {
        $this->db->where('id_user', $id_user); 
        return $this->db->get('users')->row(); 
    }
}
