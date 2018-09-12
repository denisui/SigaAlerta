<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employment extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('public/Model_Classified');
        $this->load->model('public/Model_News');
        $this->load->model('public/Model_Advertising');    
        $this->load->model('public/Model_Columnists');    
    }

    public function index() {
        
        /** Recebe o numero de linhas */
        $this->row = $this->Model_Classified->countAll();

        /**
         * Configuração de paginação
         */
        $config["base_url"] = base_url() . 'classified/employment/p';
        $config["per_page"] = 24; // Define a exibição de registros por pagina
        $config["num_links"] = 4; // Define o numero de links
        $config["uri_segment"] = 4; // seta a qtd de parametros na url
        $config["total_rows"] = $this->row;
        $config["full_tag_open"] = "<ul class='pagination text-center'>";
        $config["full_tag_close"] = "</ul>";
        $config["first_link"] = FALSE;
        $config["last_link"] = FALSE;
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-left' aria-hidden='true'></i>";
        $config["prev_tag_open"] = "<li class='prev'>";
        $config["prev_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-right' aria-hidden='true'></i>";
        $config["next_tag_open"] = "<li class='next'>";
        $config["next_tag_close"] = "</li>";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";

        /**
         * Inicializa a paginação
         */
        $this->pagination->initialize($config);

        /**
         * Retorna os links de paginação
         */
        $data['pagination'] = $this->pagination->create_links();

        /**
         * verifica a qtd de parametros na url
         */
        //$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $offset = $this->uri->segment(4, 0);

        $data['data'] = $this->Model_Classified->getNewsCategory('employment','id', 'desc', $config['per_page'], $offset);
        $data['columnists'] = $this->Model_Columnists->getColumnists('id', 'desc', '1', '0');
        $data['adsW1140H87'] = $this->Model_Advertising->getByPage('Classificados', 'id', 'asc', '1', '0');
        $data['adsW263H293'] = $this->Model_Advertising->getByPage('Classificados', 'id', 'asc', '1', '1');
        $data['adsW263H293_2'] = $this->Model_Advertising->getByPage('Classificados', 'id', 'asc', '1', '2');
        $this->load->view('public/classified/employment/view', $data);
    }

    public function details($id = NULL) {
        if (empty($id)) {            
            redirect(base_url('classified/employment'));
        } else {
            $data['data'] = $this->Model_Classified->_selectByID($id);
            $data['older_data'] = $this->Model_Classified->_getNewRand('6', '0');
            $data['columnists'] = $this->Model_Columnists->getColumnists('id', 'desc', '1', '0');
            $data['adsW1140H87'] = $this->Model_Advertising->getByPage('Classificados', 'id', 'asc', '1', '0');
            $data['adsW263H293'] = $this->Model_Advertising->getByPage('Classificados', 'id', 'asc', '1', '1');
            $this->load->view('public/classified/employment/details', $data);
        }        
    }   
}
