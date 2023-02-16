<?php 
require_once('Database.php');


class Api extends Database {


    public function insert($name, $email, $phone)
    {
      $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);
      return true;
    }

  // Fetch all or a single user from database
  public function fetch($id = 0) {
    $sql = 'SELECT * FROM users';
    if ($id != 0) {
      $sql .= ' WHERE id = :id';
    }
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $rows = $stmt->fetchAll();
    return $rows;
  }

    public function update($name, $email, $phone, $id)
    {
        $sql = 'UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $id]);
        return true;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

}