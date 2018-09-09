<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Columnists extends CI_Model {    

    public $sql;
    public $query;
    public $data;
    public $table = 'columnists';

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
        $this->db->select('*')->from($this->table)->where('id', $id);
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * getColumnists()
     * Returns the news by categories
     * @param boolean $editor
     * @param boolean $order
     * @param boolean $sort
     * @param boolean $limit
     * @param boolean $offset
     */
    public function getColumnists($editor = NULL, $sort = 'id', $order = 'desc', $limit = NULL, $start = NULL) {
        $sql = "SELECT T1.id as id_columnists, T1.col_editor, T1.col_title, T1.col_description, T1.col_date_time, T1.col_img, T2.id as id_user, T2.user_name FROM columnists AS T1 INNER JOIN user AS T2 WHERE T2.id = ". $editor;
               
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }        
        $this->db->order_by($sort, $order);
        $this->query = $this->db->query($sql);
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
     * getLocalAll()
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
    public function getLocalAll($sort = 'id', $order = 'desc', $limit = NULL, $offset = NULL) {
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
            $this->query = $this->db->where('new_title', $post)->get($this->table);
            return $this->query->num_rows();
        endif;
    }

}
