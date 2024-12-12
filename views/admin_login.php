<?php
session_start();
require_once '../models/Admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin = new Admin();
    if ($admin->login($username, $password)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
    </div>
    <div class="container">
        <h1 class="unicode-text">Admin Login</h1>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="unicode-text">Login</button>
        </form>
    </div>
</body>
</html>
