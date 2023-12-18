<?php
require __DIR__.'/../../vendor/autoload.php';

$dotenv  = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

class CONNECT_SERVER{
    public static function connect(){
        return mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
    }
}
$connect = CONNECT_SERVER::connect();

?>

