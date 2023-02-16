<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "crud-api-pdo";

    public function connect() {
        $connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        echo "connected";

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }

    public function executeQuery($sql) {
        $connection = $this->connect();

        $result = $connection->query($sql);

        $connection->close();

        return $result;
    }
}
