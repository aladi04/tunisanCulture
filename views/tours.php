<?php
require_once 'Database.php';

class Tour {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllTours() {
        $query = "SELECT * FROM tours";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTour($name, $description, $price, $date, $imagePath) {
        $query = "INSERT INTO tours (name, description, price, date, image) VALUES (:name, :description, :price, :date, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $imagePath);
        $stmt->execute();
    }

    public function editTour($id, $name, $description, $price, $date) {
        $query = "UPDATE tours SET name = :name, description = :description, price = :price, date = :date WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    public function deleteTour($id) {
        $query = "DELETE FROM tours WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getTourById($id) {
        $query = "SELECT * FROM tours WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
