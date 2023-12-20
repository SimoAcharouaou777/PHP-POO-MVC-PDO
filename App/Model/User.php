<?php

class User{
    private $id ;
    private $username;
    private $full_name;
    private $email;
    private $password;
    private $role_id;

    public static function Signup(){
        $sql="INSERT INTO users (user_name ,full_name , email , password , role_id)
        values (:user_name , :full_name , :email , :password , :role_id) ";
    }
}


?>