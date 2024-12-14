<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Ajouter produit</title>
</head>
<body>
<?php
require_once '../../connect.php';
include 'include/nav.php';
$errors = [];
?>
<div class="container py-2">
    <h4>Ajouter produit</h4>
    <?php
    $pdo = Config::getConnexion();
    if (isset($_POST['ajouter'])) {
        // Récupération des données du formulaire
        $libelle = trim($_POST['libelle']);
        $prix = trim($_POST['prix']);
        $categorie = $_POST['categorie'];
        $description = trim($_POST['description'] ?? '');
        $date = date('Y-m-d');

        // Vérifications de saisie
        if (empty($libelle)) {
            $errors[] = "Le libellé est obligatoire.";
        }

        if (empty($prix) || !is_numeric($prix) || $prix <= 0) {
            $errors[] = "Le prix est obligatoire et doit être un nombre positif.";
        }

        if (empty($categorie)) {
            $errors[] = "La catégorie est obligatoire.";
        }

        // Traitement du fichier image
        $filename = 'produit.png';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . '_' . $image;
            $uploadPath = '../upload/produit/' . $filename;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $errors[] = "Erreur lors du téléchargement de l'image.";
            }
        }

        // Si aucune erreur, insertion dans la base de données
        if (empty($errors)) {
            $sqlState = $pdo->prepare('INSERT INTO produit (libelle, prix, id_categorie, description, image) 
                                       VALUES (?, ?, ?, ?, ?)');
            $inserted = $sqlState->execute([$libelle, $prix, $categorie, $description, $filename]);

            if ($inserted) {
                header('Location: produits.php');
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
    <form method="post" enctype="multipart/form-data">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= htmlspecialchars($_POST['libelle'] ?? '') ?>">

        <label class="form-label">Prix</label>
        <input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?= htmlspecialchars($_POST['prix'] ?? '') ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">

        <?php
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label class="form-label">Catégorie</label>
        <select name="categorie" class="form-control">
            <option value="">Choisissez une catégorie</option>
            <?php
            foreach ($categories as $cat) {
                $selected = ($_POST['categorie'] ?? '') == $cat['id'] ? 'selected' : '';
                echo "<option value='" . $cat['id'] . "' $selected>" . htmlspecialchars($cat['libelle']) . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Ajouter produit" class="btn btn-primary my-2" name="ajouter">
    </form>
</div>
</body>
</html>
