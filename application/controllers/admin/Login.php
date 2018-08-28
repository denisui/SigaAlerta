<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {
    public $username;
    public $password;
    public $login_exists;
    public $data;
    public $arrSession;

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Model_Login');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    /**
     * @method check_login
     * Verifica se o usuario existe
     * @return boolean
     */
    public function check_login() {        
        $this->username = $this->input->post('edtLogin');
        $this->password = base64_encode($this->input->post('edtPass'));
        $this->login_exists = $this->Model_Login->_getLogin($this->username, $this->password);

        if ($this->login_exists) :
            $this->data = $this->login_exists;
        $this->arrSession = array(
                'session' => $this->data
            );
        $this->session->set_userdata($this->arrSession);
            echo 'TRUE'; 
        else :
            echo 'FALSE';
        endif;
    }
}
