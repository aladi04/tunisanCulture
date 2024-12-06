<!DOCTYPE html>
<html>
<head>
    <title>Programmes Disponibles</title>
</head>
<body>
    <h1>Liste des Programmes</h1>
    <ul>
        <?php foreach ($programs as $program) { ?>
            <li>
                <h2><?php echo $program['id']; ?> - <?php echo $program['name']; ?></h2>
                <p><?php echo $program['description']; ?></p>
                <p>Prix: <?php echo $program['price']; ?> €</p>
                <?php if (!empty($program['image'])) { ?>
                    <img src="<?php echo $program['image']; ?>" alt="<?php echo $program['name']; ?>" width="200">
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
