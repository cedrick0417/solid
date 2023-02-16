<?php
require_once('Database.php');
interface DAO {
    public function create($data);
    public function read($id);
    public function update($id, $data);
    public function delete($id);
}

class UsersDAO implements DAO {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$data[name]', '$data[email]', '$data[password]')";

        return $this->db->executeQuery($sql);
    }
    // public function create($name, $email, $phone,$data)
    // {
    //   $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
    //   $stmt = $this->conn->prepare($sql);
    //   $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
    //   return true;
    // }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id = $id";

        return $this->db->executeQuery($sql)->fetch_assoc();
    }

    public function update($id, $data) {
        $sql = "UPDATE users SET name='$data[name]', email='$data[email]', password='$data[password]' WHERE id=$id";

        return $this->db->executeQuery($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id=$id";

        return $this->db->executeQuery($sql);
    }
}
