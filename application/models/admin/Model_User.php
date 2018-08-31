<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model {

    public $query;
    public $data;
    public $table = 'user';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os usuarios
     */
    public function _selectAll() {
        $this->db->select("*")->from($this->table)
                ->where("id !=", 1);
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona o USUARIO pelo ID
     */
    public function _selectById($id) {
        $this->db->select('*')
                ->from($this->table)
                ->where('id', $id);
        $this->query = $this->db->get();

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Insere os dados na tabela
     */
    public function _insert($data) {
        $this->db->set($data);
        $this->query = $this->db->insert($this->db->dbprefix . $this->table);
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Altera os dados na tabela
     */
    public function _update($id, $data) {
        $this->db->where('id', $id);
        $this->query = $this->db->update($this->table, $data);
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Deleta os dados na tabela
     */
    public function _delete($id) {
        $this->query = $this->db->delete($this->table, array('id' => $id));
        if ($this->query) :
            return TRUE;
        endif;
    }

}
