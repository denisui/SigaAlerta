<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public $session;
    public $id;
    public $name;
    public $email;
    public $login;
    public $pass;
    public $_arrData;
    public $_result;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Model_User');
    }    

    public function index() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['user'] = $this->Model_User->_selectAll();
            $this->load->view('admin/user/view', $data);
        else :
            header('Location:' . base_url());
        endif;
    }

    /*
     * renderiza a view de insercao
     */

    public function insert() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $this->load->view('admin/user/insert', $data);
        else :
            header('Location:' . base_url());
        endif;
    }

    /*
     * renderiza a view de edição
     */

    public function update($id) {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['user'] = $this->Model_User->_selectById($id);
            $this->load->view('admin/user/update', $data);
        else :
            header('Location:' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados
     */
    public function setInsert() {
        $this->name = $this->input->post('edtName');
        $this->email = $this->input->post('edtEmail');
        $this->login = $this->input->post('edtLogin');
        $this->pass = base64_encode($this->input->post('edtPass'));
        $this->_arrData = array(
            "user_name" => $this->name,
            "user_email" => $this->email,
            "user_login" => $this->login,
            "user_pass" => $this->pass
        );
        $this->_return = $this->Model_User->_insert($this->_arrData);
        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    /*
     * executa a alteraçao dos dados
     */
    public function setUpdate() {    
        $this->name = $this->input->post('edtName');
        $this->email = $this->input->post('edtEmail');
        $this->login = $this->input->post('edtLogin');
        $this->pass = base64_encode($this->input->post('edtPass'));
        $this->_arrData = array(
            "user_name" => $this->name,
            "user_email" => $this->email,
            "user_login" => $this->login,
            "user_pass" => $this->pass
        );       
        
       /* if (empty($this->pass)) :
            $this->_arrData = array(
                "user_name" => $this->name,
                "user_email" => $this->email,
                "user_login" => $this->login
            );
        else :
            $this->_arrData = array(
                "user_name" => $this->name,
                "user_email" => $this->email,
                "user_login" => $this->login,
                "user_pass" =>  $this->pass
            );
        endif;*/

        //$this->_return = $this->Model_User->_update($this->id, $this->_arrData);

        echo "<pre>";
        print_r($this->_arrData);
        echo "</pre>";

        /*if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;*/
    }

    /*
     * executa a exclusão dos dados
     */

    public function setDelete() {        
        $this->id = $this->input->post('id');
        $this->_return = $this->Model_User->_delete($this->id);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
