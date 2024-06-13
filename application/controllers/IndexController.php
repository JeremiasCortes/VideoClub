<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Verificar si el usuario está logueado
        $this->checkLogin();
    }

    private function checkLogin() {
        // Verificar si el usuario está logueado
        if (!$this->session->userdata('UserLoginSession')) {
            // Si no está logueado, redirigir al login
            redirect(base_url('Login'));
        }
    }


    public function index(){
        /**
         * Aquí se hace una instancia del modelo que se encargará de hacer las consultas a la base de datos 
        */
        $this -> load -> model('PeliculaModel');

        
        /**
         * Cargamos en diferentes indice de la variable argumentos que pasaremos a la hora de llamar una vista
         */
        // ? Ruta del contenido que cargará la vista
		$cuerpoDeLaPagina['contenido'] = 'plantilla/contenidoIndex';
        // ? Booleano para mostrar o no el banner
        $cuerpoDeLaPagina['banner'] = true; 
        // ? Cargamos el contenido de la base de datos en el indice SQL_Peliculas
        $cuerpoDeLaPagina['SQL_Peliculas'] = $this -> PeliculaModel -> getPelicula(4);


        // ? Cargamos la vista y le pasamos argumentos, internamente contiene varias variables mediante indices.
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }
}    
?>