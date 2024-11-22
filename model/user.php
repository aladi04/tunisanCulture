<?php
include '../connect.php';

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

    private function emailExist() {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['email' => $this->email]);
        return $stm->rowCount() > 0;
    }

    public function addUser() {
        if ($this->emailExist()) {
            return "The email already exists";
        } else {
            $sql = "INSERT INTO `user` (email, role, password) VALUES (:email, :role,:password)";
            $stm = $this->pdo->prepare($sql);
            $res = $stm->execute([
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role
            ]);
            return $res ? "User added successfully!" : "Error: Could not insert user!";
        }
    }

    public function verifyAcc() {
        $sql = "SELECT * FROM `user` WHERE email = :email AND role = :role AND password = :password";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([":email" => $this->email, ":role" => $this->role, ":password" => $this->password]);
    
        if ($stm->rowCount() > 0) {
            return "User found";
        } else {
            return "User not found";
        }
    }
    

    public function showUser(){
        $sql = "SELECT * FROM `user`";
        $sql = $this->pdo->prepare($sql);
        $stm->execute();
        $users=$stm->fetchAll();
        return $users;
    }

    public function deleteUser($email){
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stm = $this->pdo->prepare($sql);
        $stm->execute(['email' => $email]);

        if ($stm->rowCount()>0){
            return "User deleted successfully!";
        }else{
            return "NO user found with the provided email";
        }
    }
    
    public function updatePassword($email, $password) {
        $sql = "UPDATE `user` SET password = :password WHERE email = :email";
        $params = [
            ":password" => $password,
            ":email" => $email
        ];
    
        $stm = $this->pdo->prepare($sql);
        $res = $stm->execute($params);
    
        if ($stm->rowCount() > 0) {
            return "Password updated successfully!";
        } else {
            return "No user with the provided email";
        }
    }
    
}
?>
