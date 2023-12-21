<?php
// namespace App\controller;
include_once "../../App/Connection/connect.php";
include_once "../../App/model/books.php";
// use App\model\books;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];

    if (books::deleteBook($bookid)) {
        echo "success";
    } else {
        echo "error";
    }
}
if (isset($_POST['submitaddbook'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $publicationYear = $_POST['publicationYear'];
    $totalCopies = $_POST['totalCopies'];
    $availableCopies = $_POST['availableCopies'];

    books::creatbook($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
    header("location:adminHome.php");
}


if(isset($_GET['id'])){
    $bookId = $_GET['id'];
  
    $book =books::getbook($bookId);
    if ($book) {
      $id = $book[0]->getId();
      $title = $book[0]->getTitle();
      $author = $book[0]->getAuthor();
      $genre = $book[0]->getGenre();
      $description = $book[0]->getDescription();
      $publicationYear = $book[0]->getPublicationYear();
      $totalCopies = $book[0]->getTotalCopies();
      $availableCopies = $book[0]->getAvailableCopies();
    } else {
      echo "Book not found";
    }
  
  if(isset($_POST['submitsave'])){
    $bookId = $_GET['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $publicationYear = $_POST['publicationYear'];
    $totalCopies = $_POST['totalCopies'];
    $availableCopies = $_POST['availableCopies'];
    books::updatebook($bookId, $title , $author , $genre , $description , $publicationYear , $totalCopies , $availableCopies );
    header("location:adminHome.php");
}
}
