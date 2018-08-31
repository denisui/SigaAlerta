<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Services extends CI_Model {    

    public $sql;
    public $query;
    public $data;
    public $table = 'service';

    function __construct() {
        parent::__construct();
    }

    /**
     * _selectAll()
     * Selects all records in the table
     * @param: $table = Nome da tabela
     */
    public function _selectAll() {
        $this->query = $this->db->get($this->table);
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * _selectbyID()
     * Select by ID
     * @param int $id
     */
    public function _selectByID($id) {
        $this->db->select('*')->from("$this->table")->where('id', $id);
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * _getCategory()
     * Returns by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function _getCategory($category, $sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $sql = "SELECT T1.id AS id_service, T1.serv_name, T1.serv_description, T1.serv_address, T1.serv_img, T1.serv_category, T2.id AS id_service_category, T2.sc_title, T2.sc_url FROM service AS T1
        INNER JOIN service_category AS T2 WHERE T1.serv_category = '".$category."' AND T2.sc_title = '".$category."'";
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by($sort, $order);
        if ($category != '') {
            $this->db->where('serv_category', $category);
        }
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

  

    /**
     * _getNewRand()
     * Returns the random news
     * @param boolean $limit
     * @param boolean $start
     * Use: $this->MODEL_EXEMPLO->getNewRand('6', '0');
     */
    public function _getNewRand($limit = NULL, $start = NULL) {
        $this->db->from($this->table);
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by("rand()");
        $query = $this->db->get();
        if ($query->num_rows() > 0) :
            return $query->result();
        else :
            return NULL;
        endif;
    }

    
    /** @retorna o total de linhas da tabela */
    public function countAll($post = NULL) {
        if (empty($post)) :
            $this->query = $this->db->get($this->table);
            return $this->query->num_rows();
        else :
            $this->query = $this->db->where('blog', $post)->get($this->table);
            return $this->query->num_rows();
        endif;
    }


}
