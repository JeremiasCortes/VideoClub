<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculaController extends CI_Controller {
    
    public function index($VerComoTarjeta = null){
        /**
         * Aquí se hace una instancia del modelo que se encargará de hacer las consultas a la base de datos 
        */
        $this -> load -> model('PeliculaModel');

        
        /**
         * Cargamos en diferentes indice de la variable argumentos que pasaremos a la hora de llamar una vista
         */
        // ? Ruta del contenido que cargará la vista
		$cuerpoDeLaPagina['contenido'] = 'plantilla/Pelicula/contenidoPelicula';
        // ? Cargamos el contenido de la base de datos en el indice SQL_Peliculas
        $cuerpoDeLaPagina['SQL_Peliculas'] = $this -> PeliculaModel -> getPelicula();
        $cuerpoDeLaPagina['VerComoTarjeta'] = $VerComoTarjeta;


        // ? Cargamos la vista y le pasamos argumentos, internamente contiene varias variables mediante indices.
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    
}    
?>