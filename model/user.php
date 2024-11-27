<?php
include __DIR__ . '/../connect.php';


class User {
    private $email;
    private $password;
    private $role;   
    private $pdo;

    public function __construct() {
        $this->pdo = Config::getConnexion();
        if (!$this->pdo) {
            die("Error connecting to the database");
        }
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPw($password) {
        $this->password = $password;
    }

    public function setRole($role){
        $this->role = $role;
    }

    
}
?>
