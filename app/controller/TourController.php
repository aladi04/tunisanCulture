<?php
require_once 'models/Tour.php';
require_once 'models/Program.php';

class TourController {
    private $tourModel;
    private $programModel;

    public function __construct($pdo) {
        $this->tourModel = new Tour($pdo);
        $this->programModel = new Program($pdo);
    }

    public function showTourDetails($tour_id) {
        $tour = $this->tourModel->getTour($tour_id);
        $programs = $this->programModel->getProgramsByTour($tour_id);
        include 'views/tour_details.php'; // This will render the View
    }
}
