<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
    public function index(){
        $this -> load -> model('PeliculaModel');

		$cuerpoDeLaPagina['contenido'] = 'login';

        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function registerNow(){
        
    }
}    
?>