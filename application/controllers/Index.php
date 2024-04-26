<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    
    public function index(){
		$cuerpoDeLaPagina['contenido'] = null;
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }
}    
?>