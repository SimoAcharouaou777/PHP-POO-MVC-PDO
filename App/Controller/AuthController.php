<?php
include_once "../../App/Connection/connect.php";
include_once "../../App/model/User.php";

if (isset($_POST['submitadduser'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    User::creatUser($username, $fullname, $email, $password, $phone);
    header("location:usersection.php");
}












?>