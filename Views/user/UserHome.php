<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Book Reservation System</title>

    <!-- Link to Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Public/css/userhome.css">
    
</head>
<body>

    <div class="container book-container">
        <h2 class="text-center mb-4">Book Reservation System</h2>

        <!-- Search Bar -->
        <div class="input-group mb-3 search-bar">
            <input type="text" class="form-control" placeholder="Search for books" id="searchInput">
            <button class="btn btn-outline-secondary" type="button" id="searchButton">Search</button>
        </div>

        <!-- Book List -->
        <ul class="list-group" id="bookList">
            <!-- Books will be dynamically added here -->
        </ul>
    </div>