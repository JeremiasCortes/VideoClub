<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {
    
    public function index(){
        $this -> load -> model('PeliculaModel');

		$cuerpoDeLaPagina['contenido'] = 'register';

        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function registerNow(){
        if($_SERVER['ReQUEST_METHOD'] == 'POST'){
            $this -> form_validation -> set_rules('username', 'Nombre de Usuario', 'required');
            $this -> form_validation -> set_rules('username', 'Nombre de Usuario', 'required');
        }
    }
} 
?>