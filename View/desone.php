<?php 
    include '../Model/Utils.php';
    $ID_DESTINATION = isset($_GET['id']) ? $_GET['id'] : 0;
    $DESTINATION = GetPlanFromDB($ID_DESTINATION); //

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de Voyage - Carthage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #005f73;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        main {
            padding: 20px;
        }
        section {
            margin-bottom: 30px;
        }
        h2 {
            color: #005f73;
        }
        .image-container {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 10px 0;
        }
        .transport, .horaire {
            font-weight: bold;
            color: #0a9396;
        }
    </style>
</head>
<body>

<header>
    <h1>Plan de Voyage à <?php echo($DESTINATION['des_destination']);?></h1>
</header>

<main>
    <section>
        <h2>Les monuments à visiter</h2>
        <article>
            <h3><?php echo($DESTINATION['MONUMENT1']); ?></h3>
            <p><?php echo($DESTINATION['DES_MONUMENT1']) ?></p>
            <div class="image-container">
                <img src="../Img/<?php echo($DESTINATION['IMAGE_MONUMENT1']); ?>" alt="<?php echo($DESTINATION['MONUMENT1']); ?>">
            </div>
        </article>
        <article>
            <h3><?php echo($DESTINATION['MONUMENT2']); ?></h3>
            <p><?php echo($DESTINATION['DES_MONUMENT2']) ?></p>
            <div class="image-container">
                <img src="../Img/<?php echo($DESTINATION['IMAGE_MONUMENT2']); ?>" alt="<?php echo($DESTINATION['MONUMENT2']); ?>">
            </div>
        </article>
    </section>

    <section>
        <h2>Plats traditionnels à goûter</h2>
        <article>
            <h3><?php echo($DESTINATION['RESTAURANT']) ?></h3>
            <p>On va manger : <?php echo($DESTINATION['PLAT']) ?></p>
            <div class="image-container">
                <img src="../Img/<?php echo($DESTINATION['IMAGE_RESTAURANT']) ?>" alt="<?php echo($DESTINATION['RESTAURANT']) ?>">
                <img src="../Img/<?php echo($DESTINATION['IMAGE_PLAT']) ?>" alt="<?php echo($DESTINATION['PLAT']) ?>">
            </div>
        </article>
    </section>

    <section>
        <h2>Transport</h2>
        <p class="transport"><?php echo($DESTINATION['DESIGNATION_VEHICULE']) ?> : <?php echo($DESTINATION['PRIX']) ?> dt</p>
    </section>

    <section>
        <h2>Horaire du voyage</h2>
        <p class="horaire"><?php echo($DESTINATION['DATE_VOYAGE']) ?> à <?php echo($DESTINATION['HORAIRE']) ?></p>
    </section>
</main>

</body>
</html>
