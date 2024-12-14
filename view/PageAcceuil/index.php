<?php
session_start();
require_once '../../control/TourController.php';
require_once '../../control/ProgramController.php';

$tourController = new TourController();
$programController = new ProgramController();

$tours = $tourController->showTours();
$programs = $programController->showPrograms();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Tours and Programs</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <div class="header">
        <img src="assets/logo.png" alt="Site Logo">
        <h1>TunisiaTrésor</h1>
        <nav class="navigation">
            <a href="index.php" class="unicode-text">Home</a>
            <a href="reserve_tour.php" class="unicode-text">Reserve a Tour</a>
            <a href="admin_login.php" class="unicode-text">Admin Login</a>
        </nav>
    </div>
    <div class="container">
        <h1 class="unicode-text">Available Tours</h1>
        <div class="gallery">
            <?php if ($tours) {
                foreach ($tours as $tour) { ?>
                    <div class="gallery-item">
                        <img src="../../<?php echo htmlspecialchars($tour['image']); ?>" alt="<?php echo htmlspecialchars($tour['name']); ?>">
                        <h2 class="unicode-text"><?php echo htmlspecialchars($tour['name']); ?></h2>
                        <p><?php echo htmlspecialchars($tour['description']); ?></p>
                        <p>Price: <?php echo htmlspecialchars($tour['price']); ?> €</p>
                        <p>Date: <?php echo htmlspecialchars($tour['date']); ?></p>
                        <p>ID: <?php echo htmlspecialchars($tour['id']); ?></p>
                    </div>
                <?php }
            } else {
                echo "<p>No tours available.</p>";
            } ?>
        </div>

        <h1 class="unicode-text">Available Programs</h1>
        <div class="gallery">
            <?php if ($programs) {
                foreach ($programs as $program) { ?>
                    <div class="gallery-item">
                        <img src="../../<?php echo htmlspecialchars($program['image']); ?>" alt="<?php echo htmlspecialchars($program['name']); ?>">
                        <h2 class="unicode-text"><?php echo htmlspecialchars($program['name']); ?></h2>
                        <p><?php echo htmlspecialchars($program['description']); ?></p>
                        <p>Price: <?php echo htmlspecialchars($program['price']); ?> €</p>
                        <p>Date: <?php echo htmlspecialchars($program['date']); ?></p>
                        <p>ID: <?php echo htmlspecialchars($program['id']); ?></p>
                    </div>
                <?php }
            } else {
                echo "<p>No programs available.</p>";
            } ?>
        </div>

        <h1 class="unicode-text">Reserve a Tour</h1>
        <form method="POST" action="reserve_tour.php">
            <label for="tour_id" class="unicode-text">Select Tour:</label>
            <select id="tour_id" name="tour_id" required>
                <?php foreach ($tours as $tour) { ?>
                    <option value="<?php echo htmlspecialchars($tour['id']); ?>"><?php echo htmlspecialchars($tour['name']); ?></option>
                <?php } ?>
            </select>
            <label for="program_id" class="unicode-text">Select Program:</label>
            <select id="program_id" name="program_id" required>
                <?php foreach ($programs as $program) { ?>
                    <option value="<?php echo htmlspecialchars($program['id']); ?>"><?php echo htmlspecialchars($program['name']); ?></option>
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
