<?php

// use DatabaseConnectionInterface as GlobalDatabaseConnectionInterface;

interface DatabaseConnectionInterface
{
    public function connect();
    public function test_input($data);
    public function message($content, $status);

}

class Database
{
    // DB Params
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'crud-api-pdo';
    //Conn variable
    protected $conn = null;
    // Data Source Network
    private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';



    //DB connect
    public function connect()
    {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "connected";
        } catch (PDOException $e) {
            die('Connectionn Failed : ' . $e->getMessage());
        }
        return $this->conn;
    }
  
}

$user = new Database();
$user-> connect();

