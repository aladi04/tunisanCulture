<?php
require_once __DIR__ . '/../connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPMailer-master\src\SMTP.php';

class Reservation {
    private $conn;

    public function __construct() {
        $this->conn = Config::getConnexion();
    }

    public function addReservation($tour_id, $program_id, $email, $phone_number, $reservation_date) {
        $query = "INSERT INTO reservations (tour_id, program_id, email, phone_number, reservation_date) VALUES (:tour_id, :program_id, :email, :phone_number, :reservation_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tour_id', $tour_id);
        $stmt->bindParam(':program_id', $program_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':reservation_date', $reservation_date);
        $stmt->execute();

        // Send confirmation email
        $this->sendConfirmationEmail($email, $tour_id, $program_id, $reservation_date);
    }

    private function sendConfirmationEmail($email, $tour_id, $program_id, $reservation_date) {
        $mail = new PHPMailer(true);
    
        try {
            // Server settings
            $mail->SMTPDebug = 0;                                       // Disable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mohamedaminegarraoui6@gmail.com';      // SMTP username
            $mail->Password   = 'evtqwznqkhutewzc';                     // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->CharSet    = 'UTF-8';                                // Set email character encoding to UTF-8
    
            // Recipients
            $mail->setFrom('mohamedaminegarraoui6@gmail.com', 'Service de Réservation');
            $mail->addAddress($email);                                  // Add a recipient
    
            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Confirmation de votre réservation';
            $mail->Body    = "Bonjour,<br><br>Votre réservation a été confirmée.<br><br>Détails de la réservation :<br>Tour ID: $tour_id<br>Program ID: $program_id<br>Date de réservation: $reservation_date<br><br>Merci de nous avoir choisis !";
            $mail->AltBody = "Bonjour,\n\nVotre réservation a été confirmée.\n\nDétails de la réservation :\nTour ID: $tour_id\nProgram ID: $program_id\nDate de réservation: $reservation_date\n\nMerci de nous avoir choisis !";
    
            $mail->send();
            echo "Un email de confirmation a été envoyé à $email.";
        } catch (Exception $e) {
            echo "L'email de confirmation n'a pas pu être envoyé. Erreur du Mailer: {$mail->ErrorInfo}";
        }
    }
    

    public function getReservations() {
        $query = "SELECT * FROM reservations";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
