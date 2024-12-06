<?php
require_once 'models/Tour.php';

class TourController {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function showTours() {
        $tour = new Tour();
        return $tour->getAllTours();
    }

    public function addTour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $date = $_POST['date'];
            $image_path = $this->uploadImage();

            $tour = new Tour();
            $tour->addTour($name, $description, $price, $date, $image_path);

            header('Location: admin_dashboard.php');
        }
    }

    public function editTour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tour_id = $_POST['tour_id'];
            $name = $_POST['new_name'];
            $description = $_POST['new_description'];
            $price = $_POST['new_price'];
            $date = $_POST['new_date'];

            $tour = new Tour();
            $tour->editTour($tour_id, $name, $description, $price, $date);

            header('Location: admin_dashboard.php');
        }
    }

    public function deleteTour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tour_id = $_POST['tour_id'];

            $tour = new Tour();
            $tour->deleteTour($tour_id);

            header('Location: admin_dashboard.php');
        }
    }

    private function uploadImage() {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        return $target_file;
    }
}
?>
