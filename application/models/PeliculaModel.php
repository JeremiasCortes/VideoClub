<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeliculaModel extends CI_Model{
    public function getPelicula($limit = null){
    return $this->db->get('pelicula', $limit)->result();
    }
}