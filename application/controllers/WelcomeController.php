<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends CI_Controller {
    
    public function index(){
        $this -> load -> model('PeliculaModel');

		$cuerpoDeLaPagina['contenido'] = 'home';


        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }
}    
?>