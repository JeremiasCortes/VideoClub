<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaController extends CI_Controller {

    public function index(){
        $this -> load -> model('CategoriaModel');
        $cuerpoDeLaPagina['SQL_Categorias'] = $this -> CategoriaModel -> getAll();
        $cuerpoDeLaPagina['contenido'] = 'Categoria/tabla';
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function eliminarByID(int $id){
        $this -> load -> model('CategoriaModel');
        $this -> CategoriaModel -> deleteById($id);
    }

    public function modificarDatos() {
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    
    $this->load->model('CategoriaModel');

    $this->CategoriaModel->modificarDatos($id, $nombre);
    }

    public function addNew(){
        
        $nom = $this->input->post('nombre');

        $this->load->model('CategoriaModel');

        $this->CategoriaModel->addNew($nom);
    }

    public function getById(int $id) {
        $this->load->model('CategoriaModel');
        $categoria = $this->CategoriaModel->getById($id);
    
        $result = [
            'id' => $categoria->id_categoria,
            'nom' => $categoria->nom_categoria
        ];
    
        echo json_encode($result);
    }
}    
?>