<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Search extends CI_Model {    

    public $sql;
    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    /**
     * getSearchSimpleNews()
     * Returns the all news
     * @param boolean $sort
     * @param boolean $order
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getSearchSimpleNews($like = NULL, $sort = 'id', $order = 'desc') {
        $this->db->order_by($sort, $order);        
        $this->db->or_like('new_title', $like);
        $this->db->or_like('new_category', $like);
        $this->db->or_like('new_description', $like);        
        $query = $this->db->get("news");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    /**
     * getSearchSimpleService()
     * Returns the all news
     * @param boolean $sort
     * @param boolean $order
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getSearchSimpleService($like = NULL, $sort = 'id', $order = 'desc') {
        $this->db->order_by($sort, $order);
        $this->db->or_like('serv_name', $like);
        $this->db->or_like('serv_description', $like);       
        $this->db->or_like('serv_category', $like);       
        $query = $this->db->get("service");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    /**
     * getSearchSimpleClassified()
     * Returns the all news
     * @param boolean $sort
     * @param boolean $order
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getSearchSimpleClassified($like = NULL, $sort = 'id', $order = 'desc') {
        $this->db->order_by($sort, $order);
        $this->db->or_like('cla_name', $like);
        $this->db->or_like('cla_category', $like);       
        $this->db->or_like('cla_subcategory', $like);        
        $this->db->or_like('cla_description', $like);        
        $query = $this->db->get("classified");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }


    /**
     * getSearchPagination()
     * Returns the all news
     * @param boolean $sort
     * @param boolean $order
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getSearchPagination($like = NULL, $sort = 'id', $order = 'desc', $limit = NULL, $offset = NULL) {
        $this->db->order_by($sort, $order);
        $this->db->like("new_title", $like);
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


}
