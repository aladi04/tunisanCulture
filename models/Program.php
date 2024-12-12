<?php
require_once 'Database.php';

class Program {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllPrograms() {
        $query = "SELECT * FROM programs";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProgram($name, $description, $price, $date, $imagePath) {
        $query = "INSERT INTO programs (name, description, price, date, image) VALUES (:name, :description, :price, :date, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $imagePath);
        $stmt->execute();
    }

    public function editProgram($id, $name, $description, $price, $date) {
        $query = "UPDATE programs SET name = :name, description = :description, price = :price, date = :date WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    public function deleteProgram($id) {
        $query = "DELETE FROM programs WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getProgramById($id) {
        $query = "SELECT * FROM programs WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
