<?php

require_once('DatabaseInterface.php');

class Database implements DatabaseInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
    }

    public function create(array $data) {
      $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($data);
    }

    public function read(int $id) {
      $sql = "SELECT * FROM users WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
    }

    public function update(int $id, array $data) {
      $sql = 'UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id';
      $stmt = $this->pdo->prepare($sql);
      $data['id'] = $id;
      $stmt->execute($data);
    }

    public function delete(int $id) {
      $sql = 'DELETE FROM users WHERE id = :id';
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(['id' => $id]);
    }
}
