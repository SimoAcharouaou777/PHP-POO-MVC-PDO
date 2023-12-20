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
  ///////////////////////
  public function setId($id){
   $this->id = $id;
  }
  public function setTitle($title){
    $this->title = $title;
   }
  public function setAuthor($author){
    $this->author = $author;
  } 
  public function setGenre($genre){
     $this->genre = $genre ;
  } 
  public function setDescription($description){
     $this->description = $description;
  } 
  public function setPublicationYear($publication_year){
     $this->publication_year = $publication_year;
  } 
  public function setTotalCopies($total_copies){
     $this->total_copies = $total_copies;
  } 
  public function setAvailableCopies($available_copies){
     $this->available_copies =$available_copies;
  } 

  public function __construct($id, $title , $author , $genre , $description ,$publication_year ,$total_copies,$available_copies){
    
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->genre = $genre;
    $this->author = $author;
    $this->total_copies = $total_copies;
    $this->available_copies = $available_copies;
    $this->publication_year = $publication_year;
  }
    
   public static function getbook($bookid = null)
{
    global $connect;
    $sql = "SELECT * FROM Book";
    if($bookid !== null){
      $sql .=" WHERE id = :bookid";
    }
    $statemnt = $connect->prepare($sql);
    if($bookid !== null){
      $statemnt->bindParam(':bookid',$bookid, PDO::PARAM_INT);
    }
    $statemnt->execute();
    $books_from_db = $statemnt->fetchAll(PDO::FETCH_ASSOC);

    $books = [];
    // !important-- we did this code to call the element with the geters instead of an array , that is why we created a new instence in book class : !important

    foreach ($books_from_db as $key => $book) {
      $book_instance = new books( $book['id'] ,$book['title'] , $book['author'] , $book['genre'],
      $book['description'] , $book['publication_year'] , $book['total_copies'] , $book['available_copies']);
      $books [] = $book_instance;
    }
    
    return $books;
    
}

  public static function deleteBook($id) {
     global $connect ;
     $sql ="DELETE FROM Book WHERE id = :id ";
     $statemnt = $connect->prepare($sql);
     $statemnt->bindParam(':id',$id , PDO::PARAM_INT);
     $statemnt->execute();
  }

  public static function creatbook( $title , $author , $genre , $description , $publication_year , $total_copies , $available_copies){
       global $connect;
      $sql="INSERT INTO Book (title , author , genre , description  ,publication_year , total_copies , available_copies)
      VALUES (:title , :author , :genre , :description , :publication_year , :total_copies , :available_copies)";
      $statemnt = $connect->prepare($sql);
      $statemnt->bindParam(':title', $title, PDO::PARAM_STR);
      $statemnt->bindParam(':author', $author,PDO::PARAM_STR);
      $statemnt->bindParam(':genre',$genre,PDO::PARAM_STR);
      $statemnt->bindParam(':description',$description,PDO::PARAM_STR);
      $statemnt->bindParam(':publication_year',$publication_year,PDO::PARAM_INT);
      $statemnt->bindParam(':total_copies',$total_copies,PDO::PARAM_INT);
      $statemnt->bindParam(':available_copies',$available_copies,PDO::PARAM_INT);
      $statemnt->execute();
  }
  public static function updatebook($id,$title , $author , $genre, $description , $publication_year , $total_copies , $available_copies ){
    global $connect;
    $sql = "UPDATE Book SET title = :title, author = :author, genre = :genre, description = :description, 
            publication_year = :publication_year, total_copies = :total_copies, available_copies = :available_copies 
            WHERE id = :id";
    $statemnt = $connect->prepare($sql);
    
    $statemnt->bindParam(':title', $title, PDO::PARAM_STR);
    $statemnt->bindParam(':author', $author,PDO::PARAM_STR);
    $statemnt->bindParam(':genre',$genre,PDO::PARAM_STR);
    $statemnt->bindParam(':description',$description,PDO::PARAM_STR);
    $statemnt->bindParam(':publication_year',$publication_year,PDO::PARAM_INT);
    $statemnt->bindParam(':total_copies',$total_copies,PDO::PARAM_INT);
    $statemnt->bindParam(':available_copies',$available_copies,PDO::PARAM_INT);
    $statemnt->bindParam(':id', $id , PDO::PARAM_INT);
    $statemnt->execute();
  }

}
$books = books::getbook() ;
?>

