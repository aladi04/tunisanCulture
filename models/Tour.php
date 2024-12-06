<?php
require_once 'database.php';

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

    public function addTour($name, $description, $price, $date, $image_path) {
        $query = "INSERT INTO tours (name, description, price, date, image) VALUES (:name, :description, :price, :date, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':image', $image_path);
        $stmt->execute();
    }

    public function editTour($tour_id, $name, $description, $price, $date) {
        $query = "UPDATE tours SET name = :name, description = :description, price = :price, date = :date WHERE id = :tour_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    public function deleteTour($tour_id) {
        $query = "DELETE FROM tours WHERE id = :tour_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->execute();
    }
}
?>
