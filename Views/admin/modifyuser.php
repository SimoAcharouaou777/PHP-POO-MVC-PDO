<?php
include_once("../../App/Connection/connect.php");
use App\controller\AuthController;
use App\model\User;

$username = $_GET["username"];
$res = AuthController::showuser($username);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Add New User</title>
</head>
<body>

<div class="container mt-5">
  <h2>Modify User</h2>
  <form method="post" action="usersection.php">
    <div class="form-group">
      <label for="title">Username:</label>
      <input type="text" class="form-control" id="username" name ="username" placeholder="Enter username" value="<?= $res[0]->getUsername(); ?>"  required>
    </div>
    <div class="form-group">
      <label for="title">Fullname:</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name" value="<?= $res[0]->getFullname(); ?>" >
    </div>
    <div class="form-group">
      <label for="title">Email:</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $res[0]->getEmail(); ?>" required>
    </div>
    <div class="form-group">
      <label for="description">Phone:</label>
      <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone number" value="<?= $res[0]->getPhone(); ?>" required>
    </div>
    <div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" id="role" name="role" required>
        <option value="user"  name="user">User</option>
        <option value="admin" name="admin">Admin</option>
    </select>
</div>
    <button type="submit" class="btn btn-primary" name="submitmodifyuser">Save</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
