<?php
require_once '../../control/TourController.php';
require_once '../../control/ProgramController.php';
require_once '../../model/Reservation.php';

$tourController = new TourController();
$programController = new ProgramController();
$reservation = new Reservation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tour_id = $_POST['tour_id'];
    $program_id = $_POST['program_id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $reservation_date = date('Y-m-d');

    $reservation->addReservation($tour_id, $program_id, $email, $phone_number, $reservation_date);
}

$tours = $tourController->showTours();
$programs = $programController->showPrograms();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reserve a Tour</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
    </div>
    <div class="container">
        <h1 class="unicode-text">Reserve a Tour</h1>
        <form method="POST" action="">
            <label for="tour_id" class="unicode-text">Select Tour:</label>
            <select id="tour_id" name="tour_id" required>
                <?php foreach ($tours as $tour) { ?>
                    <option value="<?php echo $tour['id']; ?>"><?php echo $tour['name']; ?></option>
                <?php } ?>
            </select>
            <label for="program_id" class="unicode-text">Select Preferred Program:</label>
            <select id="program_id" name="program_id" required>
                <?php foreach ($programs as $program) { ?>
                    <option value="<?php echo $program['id']; ?>"><?php echo $program['name']; ?></option>
                <?php } ?>
            </select>
            <label for="email" class="unicode-text">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="phone_number" class="unicode-text">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <button type="submit" class="unicode-text">Reserve</button>
        </form>
    </div>
</body>
</html>
