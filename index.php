<?php
use App\controller\AuthBooks;
use App\model\books;
require 'vendor/autoload.php';
include_once "App/Connection/connect.php";
$books =AuthBooks::showbookandmodify(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Book Display</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
  <h2>Book Display</h2>

  <div class="row mb-4">
  <?php foreach ($books as $book): ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $book->getTitle(); ?></h5>
                <p class="card-text"><strong>Genre:</strong> <?php echo $book->getGenre(); ?></p>
                <p class="card-text"><strong>Total Copies:</strong> <?php echo $book->getTotalCopies(); ?></p>
                <p class="card-text"><strong>Available Copies:</strong> <?php echo $book->getAvailableCopies(); ?></p>
                <p class="card-text"><strong>Description:</strong> <?php echo $book->getDescription(); ?></p>

                <!-- Add Reservation Button -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#reservationModal<?php echo $book->getId(); ?>">
                    Reserve Now
                </button>

                <!-- Reservation Modal -->
                <div class="modal fade" id="reservationModal<?php echo $book->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reservationModalLabel">Reservation for <?php echo $book->getTitle(); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- You can add a form or any content related to the reservation here -->
                                <p>Reservation form or details go here...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Submit Reservation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
