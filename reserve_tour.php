<?php
require_once 'models/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tour_id = $_POST['tour_id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    try {
        $database = new Database();
        $conn = $database->getConnection();

        $query = "INSERT INTO reservations (tour_id, email, phone_number) VALUES (:tour_id, :email, :phone_number)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);

        if ($stmt->execute()) {
            echo "Réservation réussie!";
        } else {
            echo "Échec de la réservation.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
