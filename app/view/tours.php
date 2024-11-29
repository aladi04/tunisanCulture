<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($tour['name']); ?> - Tour Details</title>
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
    <div id="page-wrapper">
        <!-- Tour Details -->
        <section id="tour-details">
            <div class="container">
                <h1><?php echo htmlspecialchars($tour['name']); ?></h1>
                <p><?php echo htmlspecialchars($tour['description']); ?></p>
            </div>
        </section>

        <!-- Programs Section -->
        <section id="programs">
            <div class="container">
                <h2>Related Programs</h2>
                <div class="row">
                    <?php foreach ($programs as $program): ?>
                        <div class="col-4 col-12-small">
                            <section class="box">
                                <header>
                                    <h3><?php echo htmlspecialchars($program['name']); ?></h3>
                                </header>
                                <p><?php echo htmlspecialchars($program['description']); ?></p>
                                <a href="reservation.php?program_id=<?php echo $program['id']; ?>" class="button">Reserve Now</a>
                            </section>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
