<?php
session_start();
/*if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}*/
require_once '../../../control/TourController.php';

$tourController = new TourController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add_tour':
                $tourController->addTour($_POST['name'], $_POST['description'], $_POST['price'], $_POST['date'], 'uploads/' . $_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $_FILES['image']['name']);
                break;
            case 'edit_tour':
                $tourController->editTour($_POST['tour_id'], $_POST['new_name'], $_POST['new_description'], $_POST['new_price'], $_POST['new_date']);
                break;
            case 'delete_tour':
                $tourController->deleteTour($_POST['tour_id']);
                break;
        }
        header('Location: admin_manage_tours.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Tours</title>
    <link rel="stylesheet" type="text/css" href="../../../style.css">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
        <nav class="navigation">
            <a href="admin_dashboard.php" class="unicode-text">Back to Dashboard</a>
        </nav>
    </div>
    <div class="container">
        <div class="sidebar">
            <h2 class="unicode-text">Dashboard</h2>
            <a href="admin_manage_tours.php?action=add_tour" class="unicode-text">Add Tour</a>
            <a href="admin_manage_tours.php?action=edit_tour" class="unicode-text">Edit Tour</a>
            <a href="admin_manage_tours.php?action=delete_tour" class="unicode-text">Delete Tour</a>
            <a href="admin_manage_programs.php?action=add_program" class="unicode-text">Add Program</a>
            <a href="admin_manage_programs.php?action=edit_program" class="unicode-text">Edit Program</a>
            <a href="admin_manage_programs.php?action=delete_program" class="unicode-text">Delete Program</a>
            <a href="logout.php" class="logout-button unicode-text">Logout</a>
        </div>
        <div class="main-content">
            <h1 class="unicode-text">Manage Tours</h1>
            <hr>
            <?php if (isset($_GET['action']) && $_GET['action'] === 'add_tour') { ?>
                <form method="POST" action="admin_manage_tours.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_tour">
                    <label for="name" class="unicode-text">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="description" class="unicode-text">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                    <label for="price" class="unicode-text">Price:</label>
                    <input type="text" id="price" name="price" required>
                    <label for="date" class="unicode-text">Reservation Date:</label>
                    <input type="date" id="date" name="date" required>
                    <label for="image" class="unicode-text">Image:</label>
                    <input type="file" id="image" name="image" required>
                    <button type="submit" class="unicode-text">Add Tour</button>
                </form>
            <?php } elseif (isset($_GET['action']) && $_GET['action'] === 'edit_tour') { ?>
                <form method="POST" action="admin_manage_tours.php">
                    <input type="hidden" name="action" value="edit_tour">
                    <label for="tour_id" class="unicode-text">Tour ID:</label>
                    <input type="text" id="tour_id" name="tour_id" required>
                    <label for="new_name" class="unicode-text">New Name:</label>
                    <input type="text" id="new_name" name="new_name" required>
                    <label for="new_description" class="unicode-text">New Description:</label>
                    <textarea id="new_description" name="new_description" required></textarea>
                    <label for="new_price" class="unicode-text">New Price:</label>
                    <input type="text" id="new_price" name="new_price" required>
                    <label for="new_date" class="unicode-text">New Reservation Date:</label>
                    <input type="date" id="new_date" name="new_date" required>
                    <button type="submit" class="unicode-text">Edit Tour</button>
                </form>
            <?php } elseif (isset($_GET['action']) && $_GET['action'] === 'delete_tour') { ?>
                <form method="POST" action="admin_manage_tours.php">
                    <input type="hidden" name="action" value="delete_tour">
                    <label for="tour_id" class="unicode-text">Tour ID:</label>
                    <input type="text" id="tour_id" name="tour_id" required>
                    <button type="submit" class="unicode-text">Delete Tour</button>
                </form>
            <?php } ?>
            <button onclick="history.back()" class="unicode-text">Back</button>
        </div>
    </div>
</body>
</html>
