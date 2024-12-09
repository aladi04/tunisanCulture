<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Ajouter catégorie</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    <h4>Ajouter catégorie</h4>
    <?php
    $errors = []; // Tableau pour stocker les erreurs

    if (isset($_POST['ajouter'])) {
        // Récupération des données du formulaire
        $libelle = trim($_POST['libelle']);
        $description = trim($_POST['description']);

        // Validation des champs
        if (empty($libelle)) {
            $errors[] = "Le libellé est obligatoire.";
        }

        if (empty($description)) {
            $errors[] = "La description est obligatoire.";
        }

        // Si pas d'erreurs, insérer dans la base de données
        if (empty($errors)) {
            require_once 'include/database.php';
            $sqlState = $pdo->prepare('INSERT INTO categorie(libelle, description) VALUES(?, ?)');
            $inserted = $sqlState->execute([$libelle, $description]);

            if ($inserted) {
                header('Location: categories.php');
                exit;
            } else {
                $errors[] = "Erreur lors de l'insertion dans la base de données.";
            }
        }
    }

    // Affichage des erreurs
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($error) . '</div>';
        }
    }
    ?>
    <form method="post">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= htmlspecialchars($_POST['libelle'] ?? '') ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>

        <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter">
    </form>
</div>
</body>
</html>
