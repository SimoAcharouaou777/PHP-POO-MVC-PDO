<?php
namespace App\controller;

include_once "../../App/Connection/connect.php";
use App\model\books;

class AuthBooks
{
  
    public static function deleteBook($id){
        books::deleteBook($id);
    }
    public static function submitaddbook()
    {
        global $connect;
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
    public static function updatbookandmodify($formData){
        extract($formData);
        books::updatebook($bookId, $title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
    }
    public static function Addbook($formData){
        extract($formData);
        books::creatbook( $title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
    }
    public static function showbookandmodify($test)
    {
        if($test==0)
        return $res=books::getbook();
        else return $res=books::getbook($test);
    }
}



