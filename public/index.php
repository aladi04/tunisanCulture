<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=tourism_db';
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Fetch tours from the database
$query = 'SELECT * FROM tours';
$stmt = $pdo->query($query);
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tunisian Tours</title>
        <!-- Link to your template's CSS -->
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="homepage">
        <div id="page-wrapper">
            <!-- Header Section -->
            <section id="header">
                <div class="container">
                    <h1>Welcome to Tunisian Tours</h1>
                    <p>Explore the beauty of Tunisia with our exclusive tours</p>
                </div>
            </section>

            <!-- Tours Section (List of Tours) -->
            <section id="tours">
                <div class="container">
                    <h2>Available Tours</h2>
                    <div class="row">
                        <?php foreach ($tours as $tour): ?>
                            <div class="col-4 col-12-small">
                                <section class="box">
                                    <a href="tour_details.php?id=<?php echo $tour['id']; ?>" class="image featured">
                                        <img src="images/tour-<?php echo $tour['id']; ?>.jpg" alt="<?php echo htmlspecialchars($tour['name']); ?>" />
                                    </a>
                                    <header>
                                        <h3><?php echo htmlspecialchars($tour['name']); ?></h3>
                                    </header>
                                    <p><?php echo htmlspecialchars($tour['description']); ?></p>
                                </section>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Footer Section -->
            <section id="footer">
                <div class="container">
                    <p>&copy; 2024 Tunisian Tourism. All rights reserved.</p>
                </div>
            </section>
        </div>

        <!-- Include Template's JavaScript -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
