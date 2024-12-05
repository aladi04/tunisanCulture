<?php

class User {
    private $id;
    private $email;
    private $password;
    private $role;   
    private $name;
    private $date;

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getRole() {
        return $this->role;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDate() {
        return $this->date;
    }
    
}
?>
