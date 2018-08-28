<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    public function _getLogin($username, $password) {
        $this->db->select('id, user_name, user_login, user_pass');
        $this->db->from('user');
        $this->db->where('user_login', $username);
        $this->db->where('user_pass', $password);
        $this->query = $this->db->get();

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data[0];
        endif;
    }

}
