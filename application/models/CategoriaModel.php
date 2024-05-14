<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriaModel extends CI_Model{

    public function getAll(){
        return $this->db->get('categoria')->result();
    }

    public function getByID(int $id){
        $this -> db -> get('categoria');
        $this -> db -> where('id_categoria', $id) -> row();
    }

    public function deleteById(int $id){
        return $this->db->delete('categoria', array('id' => $id));
    }

}