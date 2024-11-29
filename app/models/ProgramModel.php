<?php
class Program {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getProgramsByTour($tour_id) {
        $query = 'SELECT * FROM programs WHERE tour_id = :tour_id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProgram($program_id) {
        $query = 'SELECT * FROM programs WHERE id = :program_id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':program_id', $program_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
