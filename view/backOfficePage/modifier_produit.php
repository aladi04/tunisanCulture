<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Modifier produit</title>
</head>
<body>
<?php
require_once '../../connect.php';
$pdo = Config::getConnexion();
include 'include/nav.php';

$errors = [];
$id = $_GET['id'] ?? null;

if ($id) {
    // Récupération des informations du produit
    $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id = ?');
    $sqlState->execute([$id]);
    $produit = $sqlState->fetch(PDO::FETCH_OBJ);

    if (!$produit) {
        die('<div class="alert alert-danger">Produit introuvable.</div>');
    }
} else {
    die('<div class="alert alert-danger">ID de produit manquant.</div>');
}

// Gestion de la soumission du formulaire
if (isset($_POST['modifier'])) {
    $libelle = trim($_POST['libelle']);
    $prix = trim($_POST['prix']);
    $categorie = $_POST['categorie'];
    $description = trim($_POST['description']);
    $filename = $produit->image;

    // Validation des données
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
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $newFilename = uniqid() . '_' . $image;
        $uploadPath = 'upload/produit/' . $newFilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $filename = $newFilename;
        } else {
            $errors[] = "Erreur lors du téléchargement de l'image.";
        }
    }

    // Mise à jour des données si pas d'erreurs
    if (empty($errors)) {
        $query = "UPDATE produit 
                  SET libelle = ?, 
                      prix = ?, 
                      id_categorie = ?, 
                      description = ?, 
                      image = ? 
                  WHERE id = ?";
        $sqlState = $pdo->prepare($query);
        $updated = $sqlState->execute([$libelle, $prix, $categorie, $description, $filename, $id]);

        if ($updated) {
            header('Location: produits.php');
            exit;
        } else {
            $errors[] = "Erreur lors de la mise à jour du produit.";
        }
    }
}

// Affichage des erreurs
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
    }
}
?>

<div class="container py-2">
    <h4>Modifier produit</h4>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($produit->id) ?>">

        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= htmlspecialchars($produit->libelle) ?>">

        <label class="form-label">Prix</label>
        <input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?= htmlspecialchars($produit->prix) ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?= htmlspecialchars($produit->description) ?></textarea>

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
        <img src="../upload/produit/<?= htmlspecialchars($produit->image) ?>" alt="Produit" width="250" class="img-fluid my-2"><br>

        <?php
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label class="form-label">Catégorie</label>
        <select name="categorie" class="form-control">
            <option value="">Choisissez une catégorie</option>
            <?php
            foreach ($categories as $cat) {
                $selected = $produit->id_categorie == $cat['id'] ? 'selected' : '';
                echo "<option value='" . $cat['id'] . "' $selected>" . htmlspecialchars($cat['libelle']) . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="Modifier produit" class="btn btn-primary my-2" name="modifier">
    </form>
</div>

</body>
</html>
