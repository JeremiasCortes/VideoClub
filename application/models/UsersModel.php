<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {
    
    public function insertNewRegisterUser($data){
        $this -> db -> insert('users',$data);
    }

    public function checkPassword($user, $password){
        $query = $this -> db -> get_where('users', array('Password' => $password));
        if($query->num_rows()==1){
            return $query->row();
        } else {
            return false;
        }
    }
} 
?>