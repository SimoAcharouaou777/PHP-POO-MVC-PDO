<?php
include_once "../../App/Connection/connect.php";
include_once "../../App/model/User.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];

    if (User::deleteUserAndRole($username)) {
        echo "success";
    } else {
        echo "error";
    }
}
if (isset($_POST['submitadduser'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    User::creatUser($username, $fullname, $email, $password, $phone);
    header("location:usersection.php");
}
$username = $fullname = $email = $phone = '';

if (isset($_GET['username'])) {
    
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


if (isset($_POST['submitmodifyuser'])) {
    $originalUsername = $_GET['username'];
    $newUsername = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    User::updateUser($originalUsername, $fullname, $email, $phone);

    header("location:usersection.php");
    exit();
}
}

?>