<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClienteModel extends CI_Model{

    public function getAll(){
        return $this->db->get('cliente')->result();
    }

    public function getByID(int $id){
        $this -> db -> get('cliente');
        $this -> db -> where('id_cliente', $id);
        return $this->db->get('cliente')->row();
    }

    public function deleteByID(int $id){
        return $this->db->delete('cliente', array('id_cliente' => $id));
    }

    public function modificarDatos($id, $nombre){
        $data = array(
            'nom_cliente' => $nombre
        );
        $this->db->where('id_cliente', $id);
        $this->db->update('cliente', $data);
    }

    public function addNew($nombre){

        $this->db->insert('cliente', array('nom_cliente' => $nombre));
    }
}