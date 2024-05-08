<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeliculaController extends CI_Controller {
    
    /**
     * Método para mostrar el listado de peliculas
     * 
     * @param bool $VerComoTarjeta Opcional. Indica si se debe mostrar la lista como tarjetas o como tabla.
     */
    public function index(bool $VerComoTarjeta = false){
        /**
         * Se carga el Modelo para realizar consultas (Solo se carga en este controlador).
        */
        $this -> load -> model('PeliculaModel');

        //? Dependiendo del parámetro cargamos una vista o otra
        if ($VerComoTarjeta === true) {
            $cuerpoDeLaPagina['contenido'] = 'Pelicula/tarjetas';
        } else {
            $cuerpoDeLaPagina['contenido'] = 'Pelicula/tabla';
        }

        //? Cargamos el contenido de la base de datos en el indice SQL_Peliculas
        $cuerpoDeLaPagina['SQL_Peliculas'] = $this -> PeliculaModel -> getPelicula();
        $cuerpoDeLaPagina['SQL_Categorias'] = $this -> PeliculaModel -> getCategorias();


        //? Cargamos la vista y le pasamos argumentos.
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    /**
     * Método que elimina la pelicula especificada.
     * 
     * @param int $id El ID de la pelicula.
     */
    public function eliminar(int $id){
        $this -> load -> model('PeliculaModel');
        $this -> PeliculaModel -> deletePeliculaById($id);
        $cuerpoDeLaPagina['contenido'] = 'Pelicula/eliminar';
    }

    /**
     * Método para obtener los detalles de una película por su ID.
     *
     * @param int $id El ID de la película.
     */
    public function getPeliculaById_and_Categoria($id) {
        $this -> load -> model('PeliculaModel');
        // Devolver los datos como JSON
        echo json_encode($this -> PeliculaModel -> getPeliculaById_and_Categoria($id));

    }

    /**
     * Método para modificar una película.
     */
    public function modificarPelicula() {
    // Obtener los datos del formulario
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    $direccion = $this->input->post('direccion');
    $descripcion = $this->input->post('descripcion');
    $categoria_id = $this->input->post('categoria_id');
    
    // Cargar el modelo de películas
    $this->load->model('PeliculaModel');

    // Llamar al método del modelo para modificar la película
    $this->PeliculaModel->modificarPelicula($id, $nombre, $direccion, $descripcion, $categoria_id);
    }

    public function addPelicula(){
        
        $nom = $this->input->post('nom');
        $direccion = $this->input->post('direccion');
        $descripcion = $this->input->post('descripcion');
        $categoria = $this->input->post('categoria');

        $this->load->model('PeliculaModel');

        $this->PeliculaModel->addPelicula($nom, $direccion, $descripcion, $categoria);
    }

}    
?>