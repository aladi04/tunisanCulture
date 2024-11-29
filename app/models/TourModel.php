<?php
class Tour {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTour($tour_id) {
        $query = 'SELECT * FROM tours WHERE id = :tour_id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTours() {
        $query = 'SELECT * FROM tours';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
