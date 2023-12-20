<?php
include_once(__DIR__.'/../Connection/connect.php');
class User{
    private $id ;
    private $username;
    private $fullname;
    private $email;
    private $password;
    private $phone;

    public function __construct(){
        $this->id =$id;
        $this->username = $username;
        $this->fullname =$fullname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public static function creatUser($username , $fullname , $email, $password , $phone){
        global $connect;
        $sql="INSERT INTO users(user_name , full_name , email , password , phone )
        values (:username , :fullname , :email , :password , :phone)";
        $statement = $connect->prepare($sql);
        $statement->bindParam(':username',$username , PDO::PARAM_STR);
        $statement->bindParam(':fullname',$fullname, PDO::PARAM_STR);
        $statement->bindParam(':email',$email, PDO::PARAM_STR);
        $statement->bindParam(':password',$password, PDO::PARAM_STR);
        $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
        $statement->execute();
        $userid = $connect->lastInsertId();
        $sql="INSERT INTO user_role(user_id) value(:user_id)";
        $statement = $connect->prepare($sql);
        $statement->bindParam(':user_id',$userid,PDO::PARAM_INT);
        $statement->execute();
    }
    public static function getuser(){
       
    }
}


?>