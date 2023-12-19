<?php
// namespace App\model;

include_once(__DIR__.'/../Connection/connect.php');

class books{
  private $id;
   private $title;
   private $author ;
   private $genre ;
   private $description ;
   private $publication_year ;
   private $total_copies ;
   private $available_copies ;
  
  public function getId(){
    return $this->id;
  }
  public function getTitle(){
    return $this->title;
   }
  public function getAuthor(){
    return $this->author;
  } 
  public function getGenre(){
    return $this->genre;
  } 
  public function getDescription(){
    return $this->description;
  } 
  public function getPublicationYear(){
    return $this->publication_year;
  } 
  public function getTotalCopies(){
    return $this->total_copies;
  } 
  public function getAvailableCopies(){
    return $this->available_copies;
  } 

  public function __construct($title , $author , $genre , $description ,$publication_year ,$total_copies,$available_copies){
     $this->title = $title;
     $this->author =$author;
     $this->genre = $genre;
     $this->description = $description;
     $this->publication_year = $publication_year;
     $this->total_copies = $total_copies;
     $this->available_copies = $available_copies;
  }
    
   public static function getbook()
{
    global $connect;
    $sql = "SELECT * FROM Book";
    $statemnt = $connect->query($sql);

    $books_from_db = $statemnt->fetchAll(PDO::FETCH_ASSOC);

    $books = [];
    // !important-- we did this code to call the element with the geters instead of an array , that is why we created a new instence in book class : !important

    foreach ($books_from_db as $key => $book) {
      $book_instance = new books($book['title'] , $book['author'] , $book['genre'],
      $book['description'] , $book['publication_year'] , $book['total_copies'] , $book['available_copies']);
      $books [] = $book_instance;
    }
    
    return $books;
    
}
  public static function deleteBook($id) {
     global $connect ;
     $sql ="DELETE FROM Book WHERE id = ? ";
     $statemnt = $connect->prepare($sql);
     $statemnt->bindParam('id',$id , PDO::PARAM_INT);
     $statemnt->execute();
  }

  public static function creatbook(){
       global $connect;
      $sql="INSERT INTO Book (title , author , genre , description  ,publication_year , total_copies , available_copies)
      VALUES (?,?,?,?,?,?,?)";
      $statemnt = $connect->prepare($sql);
      $statemnt->bindParam(1,$this->title);
      $statemnt->bindParam(2,$this->author);
      $statemnt->bindParam(3,$this->genre);
      $statemnt->bindParam(4,$this->description);
      $statemnt->bindParam(5,$this->publication_year);
      $statemnt->bindParam(6,$this->total_copies);
      $statemnt->bindParam(7,$this->available_copies);
      $statemnt->execute();
  }

}
$books = books::getbook() ;
?>

