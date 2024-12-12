<?php
require_once '../models/Reservation.php';

class ReservationController {
    private $reservation;

    public function __construct() {
        $this->reservation = new Reservation();
    }

    public function addReservation($tour_id, $program_id, $user_email, $phone_number, $reservation_date) {
        return $this->reservation->addReservation($tour_id, $program_id, $user_email, $phone_number, $reservation_date);
    }

    public function showReservations() {
        return $this->reservation->getReservations();
    }
}
?>
