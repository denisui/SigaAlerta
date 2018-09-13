<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Brazil/East");
        $this->load->model('public/Model_Home');
        $this->load->model('public/Model_Services');
        $this->load->model('public/Model_Classified');
        $this->load->model('public/Model_Advertising');
        $data = $this->Model_Home->_selectAllPending();
        if (empty($data)):
        //
        else:
            $n = new ArrayIterator($data);
            $dateActual = date("Y-m-d H:i:s", time());      
            while ($n->valid()) :
                if ($dateActual >= $n->current()->new_agend_date_post) :
                    $arrData = array(                
                        "id" => $n->current()->id,
                        "new_status" => 'published'
                    );                
                    $this->Model_Home->publishPost($arrData['id'], $arrData);       
                endif;             
                $n->next();
            endwhile;            
        endif;
    }

    public function index() {
        /*NEWS*/
        $data['result'] = $this->massdot->getData();
        $data['sliNews'] =  $this->Model_Home->getNewsSli('id', 'desc', '4', '0');
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
        $data['lastHealt2'] = $this->Model_Home->getNewsCategory('Saúde', 'id', 'desc', '4', '3'); // padrão getNewsCategory('Saúde', 'id', 'desc', '8', '3')
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
        /*ADVERTISING*/
        $data['adsW263H588'] = $this->Model_Advertising->getByPage('Home', 'id', 'desc', '263x588', '1', '0');
        $data['adsW1140H87'] = $this->Model_Advertising->getByPage('Home', 'id', 'desc', '1140x87', '1', '0');
        $data['adsW555H88'] = $this->Model_Advertising->getByPage('Home', 'id', 'desc', '555x88', '1', '0');
        $data['adsW263H293'] = $this->Model_Advertising->getByPage('Home', 'id', 'desc', '263x293', '1', '0');
        $data['adsW263H293_2'] = $this->Model_Advertising->getByPage('Home', 'id', 'desc', '263x293', '1', '0');
        $this->load->view('public/home', $data);
    }
}
