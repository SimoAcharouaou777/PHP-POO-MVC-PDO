<?php
include_once "../../App/Connection/connect.php";
// use App\controller\Book;
// use App\model\books;
include_once "../../App/controller/Book.php";
include_once "../../App/model/books.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .description-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .action-buttons {
            white-space: nowrap;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2>Book Inventory</h2>

    <div class="mb-3">
        <button class="btn btn-success" data-toggle="modal" onclick="changedirect() ">Add Book</button>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>Author</th>
            <th>Total Copies</th>
            <th>Available Copies</th>
            <th>Publication year</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($books)): ?>
        <tr>
            <td colspan="8" class="text-center">No books available</td>
        </tr>
    <?php else: ?>

                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book->getTitle(); ?></td>
                        <td class="description-cell" title="<?php echo $book->getDescription(); ?>">
                            <?php echo substr($book->getDescription(), 0, 100); ?>
                            <?php if (strlen($book->getDescription()) > 100): ?>
                                <span class="read-more" data-toggle="tooltip" data-placement="top" title="Read More" onclick="showFullDescription(this)">
                                    ...Read More
                                </span>
                            <?php endif;?>
                        </td>
                        <td><?php echo $book->getGenre(); ?></td>
                        <td><?php echo $book->getAuthor(); ?></td>
                        <td><?php echo $book->getTotalCopies(); ?></td>
                        <td><?php echo $book->getAvailableCopies(); ?></td>
                        <td><?php echo $book->getPublicationYear(); ?></td>
                        <td class="action-buttons">
                            <button class="btn btn-sm btn-primary" onclick ="changederection()" >Modify</button>
                            <button class="btn btn-sm btn-danger delete-btn" onclick="getbookid(<?php echo $book->getId(); ?>)">Delete</button>
                        </td>
                    </tr>
                    
                <?php endforeach;?>
                <?php endif; ?>


        </tbody>
    </table>
    
</div>

<!-- Bootstrap JS and Popper.js (for Bootstrap) -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function showFullDescription(element) {
        var cell = $(element).closest('td');
        var fullDescription = cell.attr('title');
        cell.text(fullDescription);
    }
</script>
<script>

function getbookid(bookid){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", "../../App/controller/Book.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`bookid=${bookid}`);
    
}
function changederection(){
    window.location.href ="../admin/modify.php";
}
function changedirect(){
    window.location.href ="../admin/addbook.php";
}

</script>
</body>
</html>
