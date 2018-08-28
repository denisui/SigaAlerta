<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    public $id;
    public $name;
    public $type;
    public $address;
    public $post;
    public $img;
    public $category;
    public $typeCategory;
    public $_return;
    public $_arrData;    

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Model_Service');
        $this->load->model('admin/Model_Service_Category');
    }

    /* RENDER VIEW */
    public function index() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_service'] = $this->Model_Service->_selectAll();            
            $this->load->view('admin/service/view', $data);
        else :
            redirect(base_url('admin'));
        endif;        
    }

    /* RENDER VIEW INSERT */
    public function insert() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_service_category'] = $this->Model_Service_Category->_selectAll();
            $this->load->view('admin/service/insert', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /* RENDER VIEW UPDATE */
    public function update($id) {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_service'] = $this->Model_Service->_selectByID($id);
            $this->load->view('admin/service/update', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /**
     * Insere o conteudo
     */
    public function setInsert() {  
        $this->name = $this->input->post("edtName");
        $this->type = $this->input->post("cmbType");
        $this->address = $this->input->post("edtAddress");        
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");
        $this->category = $this->input->post("cmbCategory");
        $this->typeCategory = $this->input->post("cmbTypeCategory");
                
        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

            // Pasta onde o arquivo vai ser salvo
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/services/';
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/sigalerta/assets/public/images/services/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/services/';

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
                "serv_name" => $this->name,                
                "serv_description" => $this->post,
                "serv_address" => $this->address,                                
                "serv_img" => $this->img,
                "serv_category" => $this->category,
                "serv_type_category" => $this->typeCategory
            );

            //echo "<pre>";
            //print_r($this->_arrData);
            //echo "</pre>";

            $this->_return = $this->Model_Service->_insert($this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "serv_name" => $this->name,
                "serv_type" => $this->type,                
                "serv_description" => $this->post,
                "serv_address" => $this->address,
                "serv_category" => $this->category,
                "serv_type_category" => $this->type_category
            );

            /*echo "<pre>";
                print_r($this->_arrData);
            echo "</pre>";*/

            $this->_return = $this->Model_Service->_insert($this->_arrData);
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
        $this->id = $this->input->post('edtID');
        $this->name = $this->input->post("edtName");        
        $this->address = $this->input->post("edtAddress");
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");
        $this->category = $this->input->post("cmbCategory");
        $this->typeCategory = $this->input->post("cmbTypeCategory");

        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

            // Pasta onde o arquivo vai ser salvo
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/services/';
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/sigalerta/assets/public/images/services/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/services/';


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
                "serv_name" => $this->name,                
                "serv_description" => $this->post,
                "serv_address" => $this->address,                                
                "serv_img" => $this->img,
                "serv_category" => $this->category,
                "serv_type_category" => $this->typeCategory
            );

            $this->_return = $this->Model_Service->_update($this->id, $this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "serv_name" => $this->name,                
                "serv_description" => $this->post,
                "serv_address" => $this->address,
                "serv_category" => $this->category,
                "serv_type_category" => $this->typeCategory
            );

            $this->_return = $this->Model_Service->_update($this->id, $this->_arrData);
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
        $this->_return = $this->Model_Service->_delete($this->id);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

    
}