<?php
require_once __DIR__ . '/../model/Program.php';


class ProgramController {
    private $program;

    public function __construct() {
        $this->program = new Program();
    }

    public function showPrograms() {
        return $this->program->getAllPrograms();
    }

    public function addProgram($name, $description, $price, $date, $imagePath) {
        return $this->program->addProgram($name, $description, $price, $date, $imagePath);
    }

    public function editProgram($id, $name, $description, $price, $date) {
        return $this->program->editProgram($id, $name, $description, $price, $date);
    }

    public function deleteProgram($id) {
        return $this->program->deleteProgram($id);
    }

    public function getProgramById($id) {
        return $this->program->getProgramById($id);
    }
}
?>
