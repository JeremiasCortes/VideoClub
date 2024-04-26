<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeliculaModel extends CI_Model{
    public function a(){
    return $this->db->get('pelicula')->result();
    }
}