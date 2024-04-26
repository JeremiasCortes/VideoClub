<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelicula extends CI_Controller {
    
    public function index(){
		$this->load->model('PeliculaModel');
        debug ($this->PeliculaModel->a());
    }
}    
?>