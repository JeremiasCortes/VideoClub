<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculaController extends CI_Controller {
    
    public function index(bool $VerComoTarjeta = false){
        /**
         * Aquí se hace una instancia del modelo que se encargará de hacer las consultas a la base de datos 
        */
        $this -> load -> model('PeliculaModel');

        //? Dependiendo del valor cargamos una vista o otra
        if ($VerComoTarjeta === true) {
            $cuerpoDeLaPagina['contenido'] = 'plantilla/Pelicula/tarjetas';
        } else {
            $cuerpoDeLaPagina['contenido'] = 'plantilla/Pelicula/tabla';
        }

        //? Cargamos el contenido de la base de datos en el indice SQL_Peliculas
        $cuerpoDeLaPagina['SQL_Peliculas'] = $this -> PeliculaModel -> getPelicula();


        //? Cargamos la vista y le pasamos argumentos.
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    
}    
?>