<?php
require_once 'models/Program.php';

class ProgramController {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function showPrograms() {
        $program = new Program();
        return $program->getAllPrograms();
    }

    public function addProgram() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $date = $_POST['date'];
            $image_path = $this->uploadImage();

            $program = new Program();
            $program->addProgram($name, $description, $price, $date, $image_path);

            header('Location: admin_dashboard.php');
        }
    }

    public function editProgram() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $program_id = $_POST['program_id'];
            $name = $_POST['new_name'];
            $description = $_POST['new_description'];
            $price = $_POST['new_price'];
            $date = $_POST['new_date'];

            $program = new Program();
            $program->editProgram($program_id, $name, $description, $price, $date);

            header('Location: admin_dashboard.php');
        }
    }

    public function deleteProgram() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $program_id = $_POST['program_id'];

            $program = new Program();
            $program->deleteProgram($program_id);

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
