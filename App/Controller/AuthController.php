<?php
namespace App\controller;
include_once "../../App/Connection/connect.php";
use App\model\User;

class AuthController
{
    public static function deleteUser($username){
        User::deleteUserAndRole($username);
    }
    public static function showuser($username)
    {
        if($username==0)
        return $res=User::getByUsername();
        else return $res=User::getByUsername($username);
    }
    
    public static function creatuser($formData){
        extract($formData);
        User::creatUser( $username, $fullname, $email, $password, $phone);
    }

    public static function getUserDetails()
    {
        global $connect;
        $username = $fullname = $email = $phone = '';

        $originalUsername = $_GET['username'];
        $users = User::getByUsername($originalUsername);

        if ($users && count($users) > 0) {
            $user = $users[0];

            $username = $user->getUsername();
            $fullname = $user->getFullname();
            $email = $user->getEmail();
            $phone = $user->getPhone();
        } else {
            echo "User not found";
        }

        return ['username' => $username, 'fullname' => $fullname, 'email' => $email, 'phone' => $phone];
    }

    
    public static function updateusers($formData)
    {
        extract($formData);  
        global $connect;
        $originalUsername = $_GET['username'];
        $newUsername = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        User::updateUser($newUsername, $fullname, $email, $phone, $originalUsername);

        header("location:usersection.php");
        exit();

    }
    public static function signup($username, $fullname, $email, $password, $phone)
    {
        global $connect;
        if (empty($username) || empty($fullname) || empty($email) || empty($password) || empty($phone)) {
            echo "all the fields are required";
        } else {
            $userexist = User::getByUsername($username);
            if ($userexist) {
                echo "choes another user name ";
            } else {
                $newuser = User::createUser($username, $fullname, $email, $password, $phone);
            }
        }
    }
}


?>
