<?php
require_once '../config/config.php';

class TaskModel {

    private $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function create($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
}
