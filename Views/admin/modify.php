
<?php
include_once "../../App/Connection/connect.php";
include_once "../../App/controller/Book.php";
include_once "../../App/model/books.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Add New Book</title>
</head>
<body>

<div class="container mt-5">
  <h2>Add New Book</h2>
  <form method="post" action="">
  <div class="form-group">
      <label for="title">ID:</label>
      <input type="text" class="form-control" id="title" name ="title" placeholder="Enter title" value="<?php echo $id ;?>" required>
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name ="title" placeholder="Enter title" value="<?php echo $title ;?>" required>
    </div>
    <div class="form-group">
      <label for="title">Author:</label>
      <input type="text" class="form-control" id="author" name="author" placeholder="Enter the name of the Author" value="<?php echo $title ;?>" required>
    </div>
    <div class="form-group">
      <label for="title">Genre:</label>
      <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter the type of the book" value="<?php echo $genre ;?>" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"  required><?php echo $description ;?></textarea>
    </div>
    <div class="form-group">
      <label for="totalCopies">Publication Year:</label>
      <input type="number" class="form-control" id="publicationYear" name="publicationYear" placeholder="Enter the publication year" value="<?php echo $publicationYear ;?>" required>
    </div>
    <div class="form-group">
      <label for="totalCopies">Total Copies:</label>
      <input type="number" class="form-control" id="totalCopies" name="totalCopies" placeholder="Enter total copies" value="<?php echo $totalCopies ;?>" required>
    </div>
    <div class="form-group">
      <label for="totalCopies">Available Copies:</label>
      <input type="number" class="form-control" id="available_copies" name="availableCopies" placeholder="Enter available copies" value="<?php echo $availableCopies ;?>" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submitsave">Save</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
