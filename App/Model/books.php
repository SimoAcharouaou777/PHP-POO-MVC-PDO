<?php
// namespace App\model;

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
  public static function deleteBook($id) {
     global $connect ;
     $sql ="DELETE FROM Book WHERE id = $id ";
     $statemnt = $connect->query($sql);
     $statemnt->bindParam('id',$id , PDO::PARAM_INT);
  }

}
$books = books::getbook() ;
?>

