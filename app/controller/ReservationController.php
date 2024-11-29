<?php
require_once 'models/Reservation.php';
require_once 'models/Program.php';

class ReservationController {
    private $reservationModel;
    private $programModel;

    public function __construct($pdo) {
        $this->reservationModel = new Reservation($pdo);
        $this->programModel = new Program($pdo);
    }

    public function reserve($program_id) {
        $program = $this->programModel->getProgram($program_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tour_id = $_POST['tour_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];

            $this->reservationModel->addReservation($tour_id, $program_id, $name, $email, $phone, $date);
            echo "Reservation successfully made!";
        }

        include 'views/reservation.php'; // Render the reservation form
    }
}
