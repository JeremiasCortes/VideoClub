<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriaModel extends CI_Model{

    public function getAll(){
        return $this->db->get('categoria')->result();
    }

    public function getById(int $id){
        $this -> db -> get('categoria');
        $this -> db -> where('id_categoria', $id);
        return $this->db->get('categoria')->row();
    }

    public function deleteById(int $id){
        return $this->db->delete('categoria', array('id_categoria' => $id));
    }

    public function modificarDatos($id, $nombre){
        $data = array(
            'nom_categoria' => $nombre
        );

        $this->db->where('id_categoria', $id);
        $this->db->update('categoria', $data);
    }

    public function addNew($nombre){
        $data = array(
            'nom_categoria' => $nombre
        );
        $this->db->insert('categoria', $data);
    }

}