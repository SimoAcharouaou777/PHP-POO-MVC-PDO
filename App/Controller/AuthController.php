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
    
    User::creatUser($_POST['username'], $_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['phone']);
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

    User::updateUser($newUsername, $fullname, $email, $phone,$originalUsername);

    header("location:usersection.php");
    exit();
}
}
if(isset($_POST['submit-signup'])){

}

?>