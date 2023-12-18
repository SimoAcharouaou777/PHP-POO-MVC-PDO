<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Book Inventory</h2>
    
    <div class="mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#addBookModal">Add Book</button>
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
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-sm btn-primary">Modify</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <!-- Add more rows as needed -->

        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js (for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
