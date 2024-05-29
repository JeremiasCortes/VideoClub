<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {
    
    public function index(){
        $this -> load -> model('PeliculaModel');

		$cuerpoDeLaPagina['contenido'] = 'register';

        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function registerNow(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this -> form_validation -> set_rules('username', 'Nombre de la persona', 'required');
            $this -> form_validation -> set_rules('lastname', 'Apellido de la persona', 'required');
            $this -> form_validation -> set_rules('username', 'Nombre de usuario', 'required');
            $this -> form_validation -> set_rules('email', 'Correo elecrónico', 'required');
            $this -> form_validation -> set_rules('password', 'Contraseña', 'required');

            if($this->form_validation->run()==TRUE){
                $nombre = $this->input->post('firstname');
                $apellido = $this->input->post('lastname');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                
                $data = array(
                    'Firstname'=>$nombre,
                    'Lastname'=>$apellido,
                    'Email'=>$email,
                    'Nameuser'=>$username,
                    'Password'=>sha1($password),
                    'Status'=>'1'
                );
                // $this->load->library('session');

                $this -> load -> model('RegisterModel');
                $this -> RegisterModel -> insertNewRegisterUser($data);
                // $this->session->set_flashdata('success', 'Usuario Registrado Exitosamente');
                redirect(base_url('RegisterController'));
            }
        }
    }

} 
?>