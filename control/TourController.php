<?php
//require_once '../model/Tour.php';
require_once __DIR__ . '/../model/Tour.php';


class TourController {
    private $tour;

    public function __construct() {
        $this->tour = new Tour();
    }

    public function showTours() {
        return $this->tour->getAllTours();
    }

    public function addTour($name, $description, $price, $date, $imagePath) {
        return $this->tour->addTour($name, $description, $price, $date, $imagePath);
    }

    public function editTour($id, $name, $description, $price, $date) {
        return $this->tour->editTour($id, $name, $description, $price, $date);
    }

    public function deleteTour($id) {
        return $this->tour->deleteTour($id);
    }

    public function getTourById($id) {
        return $this->tour->getTourById($id);
    }
}
?>

