<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Advertising extends CI_Model {    

    public $sql;
    public $query;
    public $data;
    public $table = 'advertising';

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
     * getByPage()
     * Returns the records by Page
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getByPage($page, $sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from($this->table);        
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);      
        if ($page != '') {
            $this->db->where('ads_page', $page);
        }
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) {
            return $this->query->result();
        } else {
            return null;
        }
    }
}
