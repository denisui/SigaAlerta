<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Columnists extends CI_Controller {

    public $id;
    public $title;
    public $post;
    public $img;
    public $_return;
    public $_arrData;

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Model_Columnists');
    }

    /* RENDER VIEW */
    public function index() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_col'] = $this->Model_Columnists->_selectAll();
            $this->load->view('admin/columnists/view', $data);
        else :
            redirect(base_url('admin'));
        endif;        
    }

    /* RENDER VIEW INSERT */
    public function insert() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $this->load->view('admin/columnists/insert', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /* RENDER VIEW UPDATE */
    public function update($id) {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_col'] = $this->Model_Columnists->_selectByID($id);
            $this->load->view('admin/columnists/update', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /**
     * Insere o conteudo
     */
    public function setInsert() {  
        $session = $this->session->userdata('session');
        $this->title = $this->input->post("edtTitle");
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");
                
        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

            // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/columnists/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/SigaAlerta/assets/public/images/columnists/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/columnists/';

            // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
            $_UP['renomeia'] = true;            

            // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
            // Faz a verificação da extensão do arquivo
            $extensao = @strtolower(end(explode('.', $_FILES['image']['name'])));

            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            // Primeiro verifica se deve trocar o nome do arquivo
            if ($_UP['renomeia'] == true) {
                // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                $nome_final = md5($_FILES['image']['name']) . '.jpg';
            } else {
                // Mantém o nome original do arquivo
                $nome_final = $_FILES['image']['name'];
            }

            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['image']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                $this->img = $nome_final;
            } else {
                // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                echo "Não foi possível enviar o arquivo, tente novamente";
            }

            $this->_arrData = array(
                "col_editor" => $session->id,
                "col_title" => $this->title,
                "col_description" => $this->post,
                "col_date_time" => date("Y-m-d"),
                "col_img" => $this->img
            );

            //echo "<pre>";
            //print_r($this->_arrData);
            //echo "</pre>";

            $this->_return = $this->Model_Columnists->_insert($this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "col_editor" => $session->id,
                "col_title" => $this->title,
                "col_description" => $this->post,
                "col_date_time" => date("Y-m-d"),
            );

            /*echo "<pre>";
                print_r($this->_arrData);
            echo "</pre>";*/

            $this->_return = $this->Model_Columnists->_insert($this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        }
    }


    /**
     * Editar o conteudo
     */
    public function setUpdate() {        
        $session = $this->session->userdata('session');
        $this->id = $this->input->post('edtID');
        $this->title = $this->input->post("edtTitle");
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");

        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

             // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/columnists/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/SigaAlerta/assets/public/images/columnists/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/columnists/';

            // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
            $_UP['renomeia'] = true;

            // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
            // Faz a verificação da extensão do arquivo
            $extensao = @strtolower(end(explode('.', $_FILES['image']['name'])));

            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            // Primeiro verifica se deve trocar o nome do arquivo
            if ($_UP['renomeia'] == true) {
                // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                $nome_final = md5($_FILES['image']['name']) . '.jpg';
            } else {
                // Mantém o nome original do arquivo
                $nome_final = $_FILES['image']['name'];
            }

            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['image']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                $this->img = $nome_final;
            } else {
                // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                echo "Não foi possível enviar o arquivo, tente novamente";
            }

            $this->_arrData = array(
                "col_editor" => $session->id,
                "col_title" => $this->title,
                "col_description" => $this->post,                
                "col_img" => $this->img
            );

            $this->_return = $this->Model_Columnists->_update($this->id, $this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "col_editor" => $session->id,
                "col_title" => $this->title,
                "col_description" => $this->post
            );

            $this->_return = $this->Model_Columnists->_update($this->id, $this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        }
    }

    /*
     * executa a exclusão dos dados
     */

    public function setDelete() {
        $this->id = $this->input->post('id');
        $this->_return = $this->Model_Columnists->_delete($this->id);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

    
}