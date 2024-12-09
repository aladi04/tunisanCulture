<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placeType = htmlspecialchars($_POST['placeType']); // Sanitize input
    $location = htmlspecialchars($_POST['location']);   // Sanitize input

    if (!empty($placeType) && !empty($location)) {
        $query = urlencode($placeType . " in " . $location);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Map Search</title>
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                }
                iframe {
                    border: none;
                    width: 100%;
                    height: 100%;
                }
            </style>
        </head>
        <body>
            <iframe src="https://maps.google.com/maps?q=<?php echo $query; ?>&output=embed"></iframe>
        </body>
        </html>
        <?php
    } else {
        echo "Please provide both a type of place and a location.";
    }
}
?>
