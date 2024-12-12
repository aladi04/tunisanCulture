<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}
require_once '../controllers/ProgramController.php';

$programController = new ProgramController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add_program':
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $date = $_POST['date'];
                $imagePath = 'uploads/' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../' . $imagePath);
                $programController->addProgram($name, $description, $price, $date, $imagePath);
                break;
            case 'edit_program':
                $id = $_POST['program_id'];
                $name = $_POST['new_name'];
                $description = $_POST['new_description'];
                $price = $_POST['new_price'];
                $date = $_POST['new_date'];
                $programController->editProgram($id, $name, $description, $price, $date);
                break;
            case 'delete_program':
                $id = $_POST['program_id'];
                $programController->deleteProgram($id);
                break;
        }
        header('Location: admin_manage_programs.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Programs</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
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
            <h1 class="unicode-text">Manage Programs</h1>
            <p><a href="admin_dashboard.php" class="logout-button unicode-text">Back to Dashboard</a></p>
            <hr>
            <?php if (isset($_GET['action']) && $_GET['action'] === 'add_program') { ?>
                <form method="POST" action="admin_manage_programs.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_program">
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
                    <button type="submit" class="unicode-text">Add Program</button>
                </form>
            <?php } elseif (isset($_GET['action']) && $_GET['action'] === 'edit_program') { ?>
                <form method="POST" action="admin_manage_programs.php">
                    <input type="hidden" name="action" value="edit_program">
                    <label for="program_id" class="unicode-text">Program ID:</label>
                    <input type="text" id="program_id" name="program_id" required>
                    <label for="new_name" class="unicode-text">New Name:</label>
                    <input type="text" id="new_name" name="new_name" required>
                    <label for="new_description" class="unicode-text">New Description:</label>
                    <textarea id="new_description" name="new_description" required></textarea>
                    <label for="new_price" class="unicode-text">New Price:</label>
                    <input type="text" id="new_price" name="new_price" required>
                    <label for="new_date" class="unicode-text">New Reservation Date:</label>
                    <input type="date" id="new_date" name="new_date" required>
                    <button type="submit" class="unicode-text">Edit Program</button>
                </form>
            <?php } elseif (isset($_GET['action']) && $_GET['action'] === 'delete_program') { ?>
                <form method="POST" action="admin_manage_programs.php">
                    <input type="hidden" name="action" value="delete_program">
                    <label for="program_id" class="unicode-text">Program ID:</label>
                    <input type="text" id="program_id" name="program_id" required>
                    <button type="submit" class="unicode-text">Delete Program</button>
                </form>
            <?php } ?>
            <button onclick="history.back()" class="unicode-text">Back</button>
        </div>
    </div>
</body>
</html>
