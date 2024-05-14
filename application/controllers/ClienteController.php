<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteController extends CI_Controller {

    public function index(){
        $this -> load -> model('ClienteModel');
        $cuerpoDeLaPagina['SQL_Clientes'] = $this -> ClienteModel -> getAll();
        $cuerpoDeLaPagina['contenido'] = 'Cliente/tabla';
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function eliminar(int $id){
        $this -> load -> model('CategoriaModel');
        $this -> CategoriaModel -> deleteById($id);
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