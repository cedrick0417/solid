<?php
require_once('Database.php');


interface UserInterface {
    public function create();
    public function read();
    public function update();
    public function delete($id);
}

class Users implements UserInterface {

    //Connection
    private $conn;

    private $DB_TABLE = "users";

    //Columns
    public $id;
    public $name;
    public $email;
    public $phone;

    //Db Connection
    public function __construct($db) {
        $this->conn = $db;


    }

    public function create() {
        $sql =  "INSERT INTO ". $this->DB_TABLE ."
        SET
        name = :name, 
        email = :email, 
        phone = :phone";
     
        $stmt = $this->conn->prepare($sql);

        $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
        

            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phone", $this->phone);
        
            if($stmt->execute()){
            return true;
         }
         return false;
        // $sql = "INSERT INTO users (name, email, password) VALUES ('$data[name]', '$data[email]', '$data[password]')";

        // return $this->db->executeQuery($sql);
    }









    // public function create($name, $email, $phone,$data)
    // {
    //   $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
    //   $stmt = $this->conn->prepare($sql);
    //   $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
    //   return true;
    // }

    public function read() {
        // $sql = "SELECT * FROM users WHERE id = $id";

        // return $this->db->executeQuery($sql)->fetch_assoc();
    }

    public function update() {
        // $sql = "UPDATE users SET name='$data[name]', email='$data[email]', password='$data[password]' WHERE id=$id";

        // return $this->db->executeQuery($sql);
    }

    public function delete($id) {

        $sql = "DELETE FROM " . $this->DB_TABLE . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
    
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->execute(['id' => $id]);

        // $stmt->bindParam(1, $this->id);
    
        // if($stmt->execute()){
        //     return true;
        // }
        // return false;
        // $sql = "DELETE FROM users WHERE id=$id";

        // return $this->db->executeQuery($sql);
    }
}
