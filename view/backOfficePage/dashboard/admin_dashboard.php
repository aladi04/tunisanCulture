<?php
session_start();
/*if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}*/

require_once __DIR__ . '/../../../control/TourController.php';

require_once '../../../control/ProgramController.php';
require_once '../../../control/ReservationController.php';

$tourController = new TourController();
$programController = new ProgramController();
$reservationController = new ReservationController();

$tours = $tourController->showTours();
$programs = $programController->showPrograms();
$reservations = $reservationController->showReservations();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../style.css?v=1.0">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
        <div class="dashboard">
            <a href="admin_manage_tours.php?action=add_tour">Add Tour</a>
            <a href="admin_manage_tours.php?action=edit_tour">Edit Tour</a>
            <a href="admin_manage_tours.php?action=delete_tour">Delete Tour</a>
            <a href="admin_manage_programs.php?action=add_program">Add Program</a>
            <a href="admin_manage_programs.php?action=edit_program">Edit Program</a>
            <a href="admin_manage_programs.php?action=delete_program">Delete Program</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="main-content">
            <h1 class="unicode-text">Welcome to the Admin Dashboard</h1>
            <p class="unicode-text">Use the navigation bar on the left to manage tours and programs.</p>

            <h1 class="unicode-text">Manage Tours</h1>
            <div class="gallery">
                <div class="gallery-item">
                    <h2 class="unicode-text">Add Tour</h2>
                    <a href="admin_manage_tours.php?action=add_tour" class="unicode-text">Add Tour</a>
                </div>
                <div class="gallery-item">
                    <h2 class="unicode-text">Edit Tour</h2>
                    <a href="admin_manage_tours.php?action=edit_tour" class="unicode-text">Edit Tour</a>
                </div>
                <div class="gallery-item">
                    <h2 class="unicode-text">Delete Tour</h2>
                    <a href="admin_manage_tours.php?action=delete_tour" class="unicode-text">Delete Tour</a>
                </div>
            </div>

            <h1 class="unicode-text">Manage Programs</h1>
            <div class="gallery">
                <div class="gallery-item">
                    <h2 class="unicode-text">Add Program</h2>
                    <a href="admin_manage_programs.php?action=add_program" class="unicode-text">Add Program</a>
                </div>
                <div class="gallery-item">
                    <h2 class="unicode-text">Edit Program</h2>
                    <a href="admin_manage_programs.php?action=edit_program" class="unicode-text">Edit Program</a>
                </div>
                <div class="gallery-item">
                    <h2 class="unicode-text">Delete Program</h2>
                    <a href="admin_manage_programs.php?action=delete_program" class="unicode-text">Delete Program</a>
                </div>
            </div>
            
            <h1 class="unicode-text">Manage Reservations</h1>
            <div class="gallery">
                <?php if (!empty($reservations)) { foreach ($reservations as $reservation) { ?>
                    <div class="gallery-item">
                        <h2 class="unicode-text">Reservation ID: <?php echo isset($reservation['id']) ? $reservation['id'] : 'N/A'; ?></h2>
                        <p>Tour ID: <?php echo isset($reservation['tour_id']) ? $reservation['tour_id'] : 'N/A'; ?></p>
                        <p>Program ID: <?php echo isset($reservation['program_id']) ? $reservation['program_id'] : 'N/A'; ?></p>
                        <p>User Email: <?php echo isset($reservation['email']) ? $reservation['email'] : 'N/A'; ?></p>
                        <p>Phone Number: <?php echo isset($reservation['phone_number']) ? $reservation['phone_number'] : 'N/A'; ?></p>
                        <p>Reservation Date: <?php echo isset($reservation['reservation_date']) ? $reservation['reservation_date'] : 'N/A'; ?></p>
                    </div>
                <?php }} else { echo "<p>No reservations available.</p>"; } ?>
            </div>
        </div>
    </div>
</body>
</html>
