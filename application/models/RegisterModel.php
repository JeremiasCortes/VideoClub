<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {
    
    public function insertNewRegisterUser($data){
        $this -> db -> insert('users',$data);
    }
} 
?>