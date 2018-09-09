<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Home extends CI_Model {    

    public $sql;
    public $query;
    public $data;
    public $table = 'news';

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
     * getNewsAll()
     * Returns the all news
     * @param boolean $sort
     * @param boolean $order
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getNewsAll($sort = 'id', $order = 'desc', $limit = NULL, $offset = NULL) {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    /**
     * getNewsCategory()
     * Returns the news by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getNewsCategory($category = NULL, $sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from($this->table);        
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);        
        if ($category != '') {
            $this->db->where('new_category', $category);
        }
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

    /**
     * getNewsSli()
     * Returns the news by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getNewsSli($sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from($this->table);        
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);                
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

    /**
     * getNewRand()
     * Returns the random news
     * @param boolean $limit
     * @param boolean $start
     */
    public function getNewRand($limit = NULL, $start = NULL) {
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

    /**
     * getClassifiedRand()
     * Returns the random For Home
     * @param boolean $limit
     * @param boolean $start
     */
    public function getClassifiedRandon($limit = NULL, $start = NULL) {
        $this->db->from('classified');
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

    /**
     * getForHome()
     * Returns the news by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getForHome($sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from('forhome');        
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);        
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

      /**
     * _getCategoryServiceAll()
     * Returns by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function _getService($sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $sql = "SELECT T1.id AS id_service, T1.serv_name, T1.serv_description, T1.serv_address, T1.serv_img, T1.serv_category, T2.sc_title, T2.sc_url FROM service AS T1
        INNER JOIN service_category AS T2 WHERE T1.serv_category = T2.sc_title";
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

    /**
     * getColumnists()
     * Returns by Columnists
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getColumnists($sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from('columnists');
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);        
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }

}
