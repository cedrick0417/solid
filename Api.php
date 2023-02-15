<?php

require_once('DatabaseInterface.php');
require_once('Database.php');

class Api {
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function create(array $data) {
        return $this->db->create($data);
    }

    public function read(int $id) {
        return $this->db->read($id);
    }

    public function update(int $id, array $data) {
        return $this->db->update($id, $data);
    }

    public function delete(int $id) {
        return $this->db->delete($id);
    }
}



