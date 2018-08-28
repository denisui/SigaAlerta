<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Forhome extends CI_Model {    

    public $sql;
    public $query;
    public $data;
    public $table = 'forhome';

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
     * getNewsCategory()
     * Returns the news by categories
     * @param boolean $category
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function _getCategory($category, $sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $this->db->from($this->table);        
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by($sort, $order);
        if ($category != '') {
            $this->db->where('fh_category', $category);
        }
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

    /**
     * getAdvocateAll()
     * @param type $sort = Campo
     * @param type $order
     * @param type $limit
     * @param type $offset
     * @retorn todos os Registros
     * recupera as postagens mais recentes
     * Modo de uso:
     * Repassar o qtd que será mostrada (limit) e o inicio (offset)
     * $this->MODEL_EXEMPLO->getLocalAll('id', 'desc', '6', '0');
     *
     */
    public function getAdvocateAll($sort = 'id', $order = 'desc', $limit = NULL, $offset = NULL) {
        $this->db->order_by($sort, $order);
        if ($limit) :
            $this->db->limit($limit, $offset);
        endif;

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
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
