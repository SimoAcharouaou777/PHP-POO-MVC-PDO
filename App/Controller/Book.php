<?php
// namespace App\controller;
include_once("../../App/Connection/connect.php");
include_once("../../App/model/books.php");
// use App\model\books;

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bookid'])){
    $bookid = $_POST['bookid'];
 
    if(books::deleteBook($bookid)){
        echo"success";
    }else{
        echo"error";
    }
}
if(isset($_POST['submitaddbook'])){
     $title = $_POST['title'] ; 
      $author = $_POST['author']; 
     $genre = $_POST['genre'] ; 
    $description =  $_POST['description'] ; 
      $publicationYear = $_POST['publicationYear'] ; 
     $totalCopies =  $_POST['totalCopies']; 
    $availableCopies = $_POST['availableCopies'] ; 
    
    if(books::creatbook($title , $author , $genre , $description , $publicationYear , $totalCopies , $availableCopies)){
        echo"success";
    }
}









?>