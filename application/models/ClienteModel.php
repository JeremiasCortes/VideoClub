<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClienteModel extends CI_Model{

    public function getAll(){
        return $this->db->get('cliente')->result();
    }

    public function getByID(int $id){
        $this -> db -> get('cliente');
        $this -> db -> where('nom_categoria', $id) -> row();
    }

    public function deleteById(int $id){
        return $this->db->delete('cliente', array('id' => $id));
    }

}