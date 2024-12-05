<?php
session_start(); // Start the session at the very beginning
ob_start();
include "../connect.php";
include "../model/user.php";
include "../view/login.html";

function verifyAcc($pdo, $email, $password) {
    $sql = "SELECT id, email, password, role FROM `user` WHERE email = :email";
    $stm = $pdo->prepare($sql);
    $stm->execute([":email" => $email]);
    $user = $stm->fetch();

    if ($user) {
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            return $user; // Return user data on successful verification
        } else {
            return false; // Incorrect password
        }
    } else {
        return false; // User not found
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pdo = Config::getConnexion();
    $user = new User();

    if (isset($_POST['submitU'])) {
        $email = $_POST["emailU"];
        $password = $_POST["passwordU"];

        $verifiedUser = verifyAcc($pdo, $email, $password);
        
        if ($verifiedUser) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $verifiedUser['id'];
            $_SESSION['email'] = $verifiedUser['email'];
            $_SESSION['role'] = $verifiedUser['role']; // Assuming 'role' determines user/admin

            // Redirect to user dashboard
            header("Location: ../view/PageAcceuil/index2.php");
            exit();
        } else {
            echo "Invalid email or password for user.";
        }
    } elseif (isset($_POST['submitA'])) {
        $email = $_POST["emailA"];
        $password = $_POST["passwordA"];

        $verifiedAdmin = verifyAcc($pdo, $email, $password);
        
        if ($verifiedAdmin && $verifiedAdmin['role'] == 1) { 
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $verifiedAdmin['id'];
            $_SESSION['email'] = $verifiedAdmin['email'];
            $_SESSION['role'] = $verifiedAdmin['role'];

            echo "Session started for user: " . $_SESSION['user_email'];
            // Redirect to admin dashboard
            header("Location: ../view/backOfficePage/dashboard/index.php");
            exit();
        } else {
            echo "Invalid email or password for admin.";
        }
    }
}
ob_end_flush();
?>
