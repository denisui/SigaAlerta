<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_For_Home extends CI_Model {

    public $query;
    public $data;
    public $table = 'forhome';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os registros da tabela
     * @param: $table = Nome da tabela
     */
    public function _selectAll() {
        $this->db->select('*')->from("$this->table");
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona a noticia pelo ID
     * @param: $id = ID do Médico
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
     * Insere os dados na tabela
     * @param: $data = Dados do formulario
     * @param: $table = Nome da tabela
     */
    public function _insert($data) {
        $this->db->set($data);
        $this->query = $this->db->insert($this->db->dbprefix . "$this->table");
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Altera os dados na tabela
     * @param: $id = ID do registro a ser atualizado
     * @param: $table = Nome da tabela
     * @param: $data = Dados do formulario
     */
    public function _update($id, $data) {
        $this->db->where('id', $id);
        $this->query = $this->db->update("$this->table", $data);
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Deleta os dados na tabela
     * @param: $id = ID do registro a ser deletado
     * @param: $table = Nome da tabela
     */
    public function _delete($id) {
        $this->query = $this->db->delete("$this->table", array('id' => $id));
        if ($this->query) :
            return true;
        endif;
    }   

    

}
