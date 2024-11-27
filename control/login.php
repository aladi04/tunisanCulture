<?php
ob_start();
include "../connect.php";
include "../view/login.html";

function verifyAcc($pdo, $email, $password) {
    // Query only the email and hashed password
    $sql = "SELECT password FROM `user` WHERE email = :email";
    $stm = $pdo->prepare($sql);
    $stm->execute([":email" => $email]);
    $user = $stm->fetch();

    if ($user) {
        $hashedPassword = $user['password'];

        // Use password_verify to compare the entered password with the hashed one
        if (password_verify($password, $hashedPassword)) {
            return "User found";
        } else {
            return "Incorrect password";
        }
    } else {
        return "User not found";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pdo = Config::getConnexion();

    if (isset($_POST['submitU'])) {
        $email = $_POST["emailU"];
        $password = $_POST["passwordU"];
        $role = 0;

        $res = verifyAcc($pdo, $email, $password);
        
        if ($res === "User found") {
            echo "user found";
            //header("Location: ../view/backOfficePage/dashboard/index.php");
            exit();
        } else {
            echo "User not found";
        }
    }else if (isset($_POST['submitA'])) {
        $email = $_POST["emailA"];
        $password = $_POST["passwordA"];
        $role = 1;

        $res = verifyAcc($pdo, $email, $password);
        
        if ($res === "User found") {
            echo "admin found";
            header("Location: ../view/backOfficePage/dashboard/index.php");
            exit();
        } else {
            echo "admin not found"; 
        }
    }
}
ob_end_flush();
?>
