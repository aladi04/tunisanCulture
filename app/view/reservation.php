<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserve Program: <?php echo htmlspecialchars($program['name']); ?></title>
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
    <div id="page-wrapper">
        <section id="reservation-form">
            <div class="container">
                <form method="POST" action="">
                    <input type="hidden" name="tour_id" value="<?php echo $program['tour_id']; ?>">
                    <input type="hidden" name="program_id" value="<?php echo $program['id']; ?>">

                    <div class="row">
                        <div class="col-6 col-12-small">
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name" required placeholder="Your full name" />
                        </div>

                        <div class="col-6 col-12-small">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required placeholder="Your email" />
                        </div>

                        <div class="col-6 col-12-small">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" required placeholder="Your phone number" />
                        </div>

                        <div class="col-6 col-12-small">
                            <label for="date">Reservation Date:</label>
                            <input type="date" id="date" name="date" required />
                        </div>
                    </div>

                    <button type="submit" class="button">Reserve</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
