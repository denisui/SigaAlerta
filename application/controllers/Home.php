<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('public/Model_Home');
        $this->load->model('public/Model_Services');
        $this->load->model('public/Model_Classified');
    }

    public function index()
    {
        $data['result'] = $this->massdot->getData();
        $data['worldNewsMenu'] = $this->Model_Home->getNewsCategory('Mundo', 'id', 'desc', '3', '0');
        $data['techNewsMenu'] = $this->Model_Home->getNewsCategory('Tecnologia', 'id', 'desc', '3', '0');
        $data['sliNews'] = $this->Model_Home->getNewsSli('id', 'desc', '4', '0');
        $data['sliColumnists'] = $this->Model_Home->getColumnists('id', 'desc', '1', '0');
        $data['newHealth'] = $this->Model_Home->getNewsCategory('Saúde', 'id', 'desc', '1', '1');
        $data['newHealth2'] = $this->Model_Home->getNewsCategory('Saúde', 'id', 'desc', '1', '1');
        $data['newsTec'] = $this->Model_Home->getNewsCategory('Tecnologia', 'id', 'desc', '1', '0');
        $data['newsEua'] = $this->Model_Home->getNewsCategory('Estados Unidos', 'id', 'desc', '1', '1');
        $data['newsEnter'] = $this->Model_Home->getNewsCategory('Entretenimento', 'id', 'desc', '1', '0');
        $data['newsPolitics'] = $this->Model_Home->getNewsCategory('Política', 'id', 'desc', '1', '1');
        $data['newsClime'] = $this->Model_Home->getNewsCategory('Clima', 'id', 'desc', '1', '0');
        $data['classifiedRandon'] = $this->Model_Home->getClassifiedRandon('11', '0');
        //$data['forHomeRandon'] = $this->Model_Home->getForHomeRand('11', '0');
        $data['newsWorld'] = $this->Model_Home->getNewsCategory('Mundo', 'id', 'desc', '1', '0');
        $data['newsWorld2'] = $this->Model_Home->getNewsCategory('Mundo', 'id', 'desc', '3', '1');
        $data['service'] = $this->Model_Home->_getService('id', 'desc', '2', '0');        
        $data['lastHealt'] = $this->Model_Home->getNewsCategory('Saúde', 'id', 'desc', '1', '2');
        $data['lastHealt2'] = $this->Model_Home->getNewsCategory('Saúde', 'id', 'desc', '8', '3');
        $data['lastNewsTec'] = $this->Model_Home->getNewsCategory('Tecnologia', 'id', 'desc', '1', '0');
        $data['lastNewsTec2'] = $this->Model_Home->getNewsCategory('Tecnologia', 'id', 'desc', '2', '1');
        $data['lastSport'] = $this->Model_Home->getNewsCategory('Esporte', 'id', 'desc', '4', '0');        
        $data['lastForHome'] = $this->Model_Home->getForHome('id', 'desc', '1', '0');
        $data['lastNewsPol'] = $this->Model_Home->getNewsCategory('Política', 'id', 'desc', '1', '0');
        $data['lastNewsWorld'] = $this->Model_Home->getNewsCategory('Mundo', 'id', 'desc', '1', '0');
        $data['lastNewsClime'] = $this->Model_Home->getNewsCategory('Clima', 'id', 'desc', '1', '0');
        $data['lastNewsTechnology'] = $this->Model_Home->getNewsCategory('Tecnologia', 'id', 'desc', '2', '0');
        $data['lastNewsFashion'] = $this->Model_Home->getNewsCategory('Moda', 'id', 'desc', '2', '0');
        $data['lastNewsEntertainment'] = $this->Model_Home->getNewsCategory('Entretenimento', 'id', 'desc', '2', '0');
        $data['morePopular'] = $this->Model_Home->getNewRand('4', '0');
        $data['columnists'] = $this->Model_Home->getColumnists('id', 'desc', '1', '0');
        $this->load->view('public/home', $data);
    }
}
