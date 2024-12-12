<?php
session_start();
require_once '../controllers/TourController.php';
require_once '../controllers/ProgramController.php';

$tourController = new TourController();
$programController = new ProgramController();

$tours = $tourController->showTours();
$programs = $programController->showPrograms();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Tours and Programs</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="header">
        <img src="../assets/logo.png" alt="Site Logo">
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
                        <img src="<?php echo $tour['image']; ?>" alt="<?php echo $tour['name']; ?>">
                        <h2 class="unicode-text"><?php echo $tour['name']; ?></h2>
                        <p><?php echo $tour['description']; ?></p>
                        <p>Price: <?php echo $tour['price']; ?> €</p>
                        <p>Date: <?php echo $tour['date']; ?></p>
                        <p>ID: <?php echo $tour['id']; ?></p> <!-- Display ID -->
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
                        <img src="<?php echo $program['image']; ?>" alt="<?php echo $program['name']; ?>">
                        <h2 class="unicode-text"><?php echo $program['name']; ?></h2>
                        <p><?php echo $program['description']; ?></p>
                        <p>Price: <?php echo $program['price']; ?> €</p>
                        <p>Date: <?php echo $program['date']; ?></p>
                        <p>ID: <?php echo $program['id']; ?></p> <!-- Display ID -->
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
                    <option value="<?php echo $tour['id']; ?>"><?php echo $tour['name']; ?></option>
                <?php } ?>
            </select>
            <label for="program_id" class="unicode-text">Select Program:</label>
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
