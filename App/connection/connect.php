<?php

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

class CONNECT_SERVER {
    public static function connect() {
    
            return new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
            );
       
    }
}

$connect = CONNECT_SERVER::connect();

if ($connect) {
    echo 'Connected successfully!';
} else {
    echo 'Connection failed!';
}
?>
