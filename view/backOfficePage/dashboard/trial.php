<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../view/login.html");
    exit();
}

// If session exists, display user details
echo "<h1>Welcome to the Dashboard</h1>";
echo "<p>User Email: " . $_SESSION['email'] . "</p>";
echo "<p>User Role: " . ($_SESSION['role'] == 1 ? "Admin" : "User") . "</p>";
?>
