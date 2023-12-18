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









?>