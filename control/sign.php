<?php
ob_start();
    include "../view/sign.html";
    include "../connect.php";

    function emailExist($pdo, $email) {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stm = $pdo->prepare($sql);
        $stm->execute(['email' => $email]);
        return $stm->rowCount() > 0;
    }

    function addUser($pdo, $email, $password, $role) {
        if (emailExist($pdo, $email)) {
            return "The email already exists";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `user` (email, role, password) VALUES (:email, :role, :password)";
            $stm = $pdo->prepare($sql);
    
            $res = $stm->execute([
                'email' => $email,
                'role' => $role,
                'password' => $hashedPassword
                
            ]);
    
            return $res ? "User added successfully!" : "Error: Could not insert user!";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $pdo = Config::getConnexion();
        if (isset($_POST['submitA'])){
            $email = $_POST["emailA"];
            $password = $_POST["passwordA"];
            $role = 1;

            $result = addUser($pdo, $email, $password, $role);
            if ($result=="User added successfully!"){
                header("location: ../view/backOfficePage/dashboard/index.php");
                exit();
            }
        }else if (isset($_POST['submitU'])){
            $email = $_POST["emailU"];
            $password = $_POST["passwordU"];
            $role = 0;

            $result = addUser($pdo, $email, $password, $role);
        }
    }
    ob_end_flush();
?>