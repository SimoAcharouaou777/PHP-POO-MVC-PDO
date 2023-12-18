<?php
include_once(__DIR__.'/../Connection/connect.php');
class books{
    
   public static function getbook()
{
    global $connect;
    $sql = "SELECT * FROM Book";
    $statemnt = $connect->query($sql);

    $books = $statemnt->fetchAll(PDO::FETCH_ASSOC);

    if ($books) {
        return $books;
    }
}

}
$books = books::getbook() ;


