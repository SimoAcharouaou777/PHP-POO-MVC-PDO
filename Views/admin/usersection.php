<?php
use App\controller\AuthBooks;
use App\controller\AuthController;
require '../../vendor/autoload.php';
include_once "../../App/Connection/connect.php";
if(isset($_POST['submitadduser'])){
  AuthController::creatuser($_POST);
}
if(isset($_GET['deleteuser'])){
  AuthController::deleteUser($_GET['deleteuser']);
}
if(isset($_POST['submitmodifyuser'])){
  AuthController::updateusers($_POST);
}
$users =AuthController::showuser(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>User System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .table-actions {
      white-space: nowrap;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
    <h2>User System</h2>
    <a   href="adduser.php" class="btn btn-primary">Add New User</a>
    
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>User name</th>
        <th>Full name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php if(empty($users)):?>
            <tr>
                <td colspan="6">There are no users</td>
            </tr>
            <?php else: ?>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?php echo $user->getId(); ?></td>
        <td><?php echo $user->getUsername(); ?></td>
        <td><?php echo $user->getFullname(); ?></td>
        <td><?php echo $user->getEmail(); ?></td>
        <td><?php echo $user->getPhone(); ?></td>
        <td><?php echo $user->getRoleName();?></td>
        <td class="table-actions">
          <a href="modifyuser.php?username=<?php echo $user->getusername(); ?>" class="btn btn-warning btn-sm" >Modify</a>
          <a href="usersection.php?deleteuser=<?php echo $user->getusername(); ?>" class="btn btn-danger btn-sm" >Delete</a>
       

        </td>
      </tr>
      <?php endforeach;?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>




