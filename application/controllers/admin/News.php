<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class News extends CI_Controller {

    public $id;
    public $title;
    public $subtitle;
    public $category;
    public $featured;
    public $post;
    public $img;
    public $agendPost;
    public $status;
    public $_return;
    public $_arrData;

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Brazil/East");
        $this->load->model('admin/Model_News');
        $this->load->model('admin/Model_News_Category');
    }

    /* RENDER VIEW */
    public function index() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['data_news'] = $this->Model_News->_selectAll();
            $this->load->view('admin/news/view', $data);
        else :
            redirect(base_url('admin'));
        endif;        
    }

    /* RENDER VIEW INSERT */
    public function insert() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['category'] = $this->Model_News_Category->_selectAll();
            $this->load->view('admin/news/insert', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /* RENDER VIEW UPDATE */
    public function update($id) {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->user_name;
            $data['category'] = $this->Model_News_Category->_selectAll();
            $data['data_news'] = $this->Model_News->_selectByID($id);
            $this->load->view('admin/news/update', $data);
        else :
            redirect(base_url('admin'));
        endif;
    }

    /**
     * Insere o conteudo
     */
    public function setInsert() {  
        $this->title = $this->input->post("edtTitle");
        $this->subtitle = $this->input->post("edtSubtitle");
        $this->category = $this->input->post("cmbCategory");
        /*$this->featured = $this->input->post("cmbFeatured");*/
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");
        $this->agendPost = $this->input->post("edtDate");
        $dateActual = date("Y-m-d H:i:s", time());
        if (($this->agendPost <= $dateActual) || (empty($this->agendPost))) {
            $this->status = 'published';
        } else {
            $this->status = 'pending';
        }
           
        /*
        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

            // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/news/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/SigaAlerta/assets/public/images/news/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/news/';

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
                "new_title" => $this->title,
                "new_subtitle" => $this->subtitle,
                "new_category" => $this->category,
                "new_description" => $this->post,
                "new_date_time" => date("Y-m-d"),
                "new_img" => $this->img,
                "new_agend_date_post" => $this->agendPost,
                "new_status" => $this->status
            );

            //echo "<pre>";
            //print_r($this->_arrData);
            //echo "</pre>";

            $this->_return = $this->Model_News->_insert($this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "new_title" => $this->title,
                "new_subtitle" => $this->subtitle,
                "new_category" => $this->category,
                "new_description" => $this->post,
                "new_date_time" => date("Y-m-d"),
                "new_agend_date_post" => $this->agendPost,
                "new_status" => $this->status
            );

            /*echo "<pre>";
                print_r($this->_arrData);
            echo "</pre>";*/

            $this->_return = $this->Model_News->_insert($this->_arrData);
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
        $this->title = $this->input->post("edtTitle");
        $this->subtitle = $this->input->post("edtSubtitle");
        $this->category = $this->input->post("cmbCategory");
        $this->post = $this->input->post("txtDesc");
        $this->img = $this->input->post("image");
        $this->agendPost = $this->input->post("edtDate");         
        $dateActual = date("Y-m-d H:i:s", time());
        if (($this->agendPost <= $dateActual) || ($this->agendPost === "0000-00-00 00:00:00")) {
            $this->status = 'published';
        } else {
            $this->status = 'pending';
        }

        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

             // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/public/images/news/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/SigaAlerta/assets/public/images/news/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologation/sigalerta/assets/public/images/news/';

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
                "new_title" => $this->title,
                "new_subtitle" => $this->subtitle,
                "new_category" => $this->category,
                "new_description" => $this->post,                
                "new_img" => $this->img,
                "new_agend_date_post" => $this->agendPost,
                "new_status" => $this->status
            );

            $this->_return = $this->Model_News->_update($this->id, $this->_arrData);
            if ($this->_return) :
                echo 'TRUE';
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrData = array(
                "new_title" => $this->title,
                "new_subtitle" => $this->subtitle,
                "new_category" => $this->category,
                "new_description" => $this->post,
                "new_agend_date_post" => $this->agendPost,
                "new_status" => $this->status
            );

            $this->_return = $this->Model_News->_update($this->id, $this->_arrData);
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
        $this->_return = $this->Model_News->_delete($this->id);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

    
}