<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
    
    public function index(){
        $this -> load -> model('PeliculaModel');

		$cuerpoDeLaPagina['contenido'] = 'plantilla/contenidoIndex';
        $cuerpoDeLaPagina['banner'] = true;
        $cuerpoDeLaPagina['SQL_Peliculas'] = $this -> PeliculaModel -> getPelicula();

        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }
}    
?>