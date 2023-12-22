<?php
use App\controller\AuthBooks;
use App\controller\AuthController;
require '../../vendor/autoload.php';
include_once "../../App/Connection/connect.php";
if(isset($_POST['submitsave'])){
  AuthBooks::updatbookandmodify($_POST);
}
if(isset($_POST['submitaddbook'])){
  AuthBooks::Addbook($_POST);
}
if(isset($_GET['iddelete'])){
  AuthBooks::deleteBook($_GET['iddelete']);
}

$books =AuthBooks::showbookandmodify(0);
?>  
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Library System</title>
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
    <h2>Library System</h2>
    <a   href="addbook.php" class="btn btn-primary">Add New Book</a>
    <a href="usersection.php" class="btn btn-primary">Move To User Section</a>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>genre</th>
        <th>description</th>
        <th>publication year</th>
        <th>total copies</th>
        <th>available copies</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book): ?>
      <tr>
        <td><?php echo $book->getId(); ?></td>
        <td><?php echo $book->getTitle(); ?></td>
        <td><?php echo $book->getAuthor(); ?></td>
        <td><?php echo $book->getGenre(); ?></td>
        <td><?php echo $book->getDescription(); ?></td>
        <td><?php echo $book->getPublicationYear(); ?></td>
        <td><?php echo $book->getTotalCopies(); ?></td>
        <td><?php echo $book->getAvailableCopies(); ?></td>
        <td class="table-actions">
          <a href="modify.php?id=<?php echo $book->getId(); ?>" class="btn btn-warning btn-sm" >Modify</a>
          <a href="adminHome.php?iddelete=<?php echo $book->getId(); ?>" class="btn btn-danger btn-sm" >Delete</a>
  
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<script>

   
</script>




<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>




