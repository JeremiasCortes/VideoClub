<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function index() {
        $cuerpoDeLaPagina['contenido'] = 'login';
        $this->load->view('plantilla', $cuerpoDeLaPagina);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('username', 'Nombre de Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contraseña', 'required');

            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = sha1($password);

                $this->load->model('UsersModel');
                $status = $this->UsersModel->checkPassword($username, $password);
                if ($status) {
                    $username = $status->Username;
                    $firstname = $status->Firstname;
                    $email = $status->Email;

                    $session_data = array(
                        'username' => $username,
                        'firstname' => $firstname,
                        'email' => $email,
                    );
                    $this->session->set_userdata('UserLoginSession', $session_data);
                    redirect(base_url('IndexController'));
                } else {
                    $this->session->set_flashdata('errorLogin', 'Usuario y/o Contraseña incorrectos');
                    redirect(base_url('Login'));
                }
            } else {
                $this->session->set_flashdata('errorLogin', 'Rellene todos los campos porfavor');
                redirect(base_url('Login'));
            }
        }
    }
}
?>
