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

    // public function connect() {
    //     $connection = new mysqli($this->host, $this->username, $this->password, $this->database);
    //     echo "connected";

    //     if ($connection->connect_error) {
    //         die("Connection failed: " . $connection->connect_error);
    //     }

    //     return $connection;
    // }

    // public function executeQuery($sql) {
    //     $connection = $this->connect();

    //     $result = $connection->query($sql);

    //     $connection->close();

    //     return $result;
    // }
}
// <?php 
//     class Database {
//         private $host = "127.0.0.1";
//         private $database_name = "phpapidb";
//         private $username = "root";
//         private $password = "eP#A2PMsY^a4";

//         public $conn;

//         public function getConnection(){
//             $this->conn = null;
//             try{
//                 $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
//                 $this->conn->exec("set names utf8");
//             }catch(PDOException $exception){
//                 echo "Database could not be connected: " . $exception->getMessage();
//             }
//             return $this->conn;
//         }
//     }  
// 
// For Testing
    // $database = new Database();
    // $db = $database->getConnection();