<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();        
    }

    public function index() {
         if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $this->load->view('admin/dashboard', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

}
