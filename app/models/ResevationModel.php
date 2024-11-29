<?php
class Reservation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addReservation($tour_id, $program_id, $name, $email, $phone, $date) {
        $query = 'INSERT INTO reservations (tour_id, program_id, name, email, phone, reservation_date) 
                  VALUES (:tour_id, :program_id, :name, :email, :phone, :date)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id, PDO::PARAM_INT);
        $stmt->bindParam(':program_id', $program_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
