<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('public/Model_Search');
        $this->load->model('public/Model_Columnists');
    }

    public function index() {                
        $str = $this->input->get('s');
        $data['news'] = $this->Model_Search->getSearchSimpleNews($str, 'id', 'desc');
        $data['service'] = $this->Model_Search->getSearchSimpleService($str, 'id', 'desc');
        $data['classified'] = $this->Model_Search->getSearchSimpleClassified($str, 'id', 'desc');
        $data['columnists'] = $this->Model_Columnists->getColumnists('id', 'desc', '1', '0');
        $this->load->view('public/search', $data);
    }
    
}
