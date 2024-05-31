<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {
    
    public function index(){

		$cuerpoDeLaPagina['contenido'] = 'register';

        $this -> load -> view('plantilla', $cuerpoDeLaPagina);
    }

    public function registerNow(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this -> form_validation -> set_rules('username', 'Nombre', 'required');
            $this -> form_validation -> set_rules('lastname', 'Apellido', 'required');
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
                    'Username'=>$username,
                    'Password'=>'sha1'($password),
                    'Status'=>'1'
                );

                $this -> load -> model('UsersModel');
                $this -> UsersModel -> insertNewRegisterUser($data);
                $this->session->set_flashdata('registerSuccess', 'Registrado Exitosamente');
                redirect(base_url('RegisterController'));
            }
        }
    }
} 
?>