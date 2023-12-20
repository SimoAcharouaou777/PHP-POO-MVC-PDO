<?php
include_once("../../App/Connection/connect.php");
include_once("../../App/controller/AuthController.php");


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
  <h2>Add New User</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="title">Username:</label>
      <input type="text" class="form-control" id="fullname" name ="username" placeholder="Enter username"  required>
    </div>
    <div class="form-group">
      <label for="title">Fullname:</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full name"  required>
    </div>
    <div class="form-group">
      <label for="title">Email:</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"  required>
    </div>
    <div class="form-group">
      <label for="description">Phone:</label>
      <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone number"  required>
    </div>
    <div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" id="role" name="role" required>
        <option value="user"  name="user">User</option>
        <option value="admin" name="admin">Admin</option>
    </select>
</div>

  
   
    <button type="submit" class="btn btn-primary" name="submitadduser">Save</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
