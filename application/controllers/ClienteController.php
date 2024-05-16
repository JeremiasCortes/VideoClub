<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteController extends CI_Controller {

    public function index(){
        $this -> load -> model('ClienteModel');
        $cuerpoDeLaPagina['SQL_Clientes'] = $this -> ClienteModel -> getAll();
        $cuerpoDeLaPagina['contenido'] = 'Cliente/tabla';
        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function eliminarByID(int $id){
        $this -> load -> model('ClienteModel');
        $this -> ClienteModel -> deleteById($id);
    }

    /**
     * Método para modificar una película.
     */
    public function modificarDatos() {
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    
    $this->load->model('ClienteModel');

    $this->ClienteModel->modificarDatos($id, $nombre);
    }

    public function addnew(){
        
        $nom = $this->input->post('nom');

        $this->load->model('ClienteModel');

        $this->ClienteModel->addnew($nom);
    }

    public function getById(int $id) {
        $this->load->model('ClienteModel');
        echo json_encode($this->ClienteModel->getById($id));
    }

    public function test(int $id){
        $this->load->model('ClienteModel');
        echo json_encode($this -> ClienteModel -> test($id));
    }

}    
?>