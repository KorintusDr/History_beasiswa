<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbutil();
        $this->load->library('session');
    }

    public function download() {

        $prefs = array(
            'format'      => 'zip',             
            'filename'    => 'database_backup.sql' 
        );

        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('download');
        $nama_file = 'backup_' . date('YmdHis') . '.zip';
        force_download($nama_file, $backup);
    }
}
