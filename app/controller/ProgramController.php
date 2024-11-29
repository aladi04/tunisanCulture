<?php
// app/controllers/ProgramController.php

include_once '../models/ProgramModel.php';

class ProgramController {
    private $programModel;

    public function __construct($pdo) {
        $this->programModel = new ProgramModel($pdo);
    }

    // Get programs for a specific tour
    public function index($tour_id) {
        $programs = $this->programModel->getProgramsByTourId($tour_id);
        include '../views/programs.php'; // Pass data to view
    }
}
?>
