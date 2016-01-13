<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class uploader_model extends CI_Model {

    public function __construct() {
        $this -> load -> database();
    }

    public function create($data,$table) {
        $this->db->insert($table,$data);
    }

    public function create_multiple($data,$table) {
        foreach ($data as $d) {
            $this->create($d,$table);
        }
    }
}
