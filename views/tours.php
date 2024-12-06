<!DOCTYPE html>
<html>
<head>
    <title>Tours Disponibles</title>
</head>
<body>
    <h1>Liste des Tours</h1>
    <ul>
        <?php foreach ($tours as $tour) { ?>
            <li>
                <h2><?php echo $tour['id']; ?> - <?php echo $tour['name']; ?></h2>
                <p><?php echo $tour['description']; ?></p>
                <p>Prix: <?php echo $tour['price']; ?> €</p>
                <?php if (!empty($tour['image'])) { ?>
                    <img src="<?php echo $tour['image']; ?>" alt="<?php echo $tour['name']; ?>" width="200">
                <?php } ?>
                
                <!-- Reservation Form -->
                <form method="POST" action="reserve_tour.php">
                    <input type="hidden" name="tour_id" value="<?php echo $tour['id']; ?>">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="phone_number">Numéro de téléphone:</label>
                    <input type="text" id="phone_number" name="phone_number" required>
                    <label for="program_id">Programme:</label>
                    <input type="text" id="program_id" name="program_id" required>
                    <button type="submit">Réserver</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
