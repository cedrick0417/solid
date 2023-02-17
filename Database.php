<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "crud-api-pdo";

    public $conn;
     public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                echo "Database connected";
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
}

// For Testing
    // $database = new Database();
    // $db = $database->getConnection();