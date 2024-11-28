<?php

require("../controllers/ProduitC.php");

// Vérifier et récupérer l'ID du produit dans l'URL
$produit = null;
if (isset($_GET['pdt']) && is_numeric($_GET['pdt'])) {
    $produit = ProduitC::afficherUnProduit($_GET['pdt']);
}

// Vérifier si le produit existe
if (!$produit) {
    die("Produit non trouvé ou ID invalide.");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Détails du produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<header>
    <!-- Header et navbar -->
    <div class="navbar navbar-dark bg-success shadow-sm">
        <div class="container">
            <a href="index.php" class="navbar-brand">Tunis<span>EnCouleurs</span></a>
        </div>
    </div>
</header>
<main>
    <div class="album py-5 bg-light">
        <div class="container" style="display: flex; justify-content: center">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <h3 align="center"><?= htmlspecialchars($produit->nom) ?></h3>
                        <img src="<?= htmlspecialchars($produit->image) ?>" style="width: 80%" alt="Image du produit">
                        <div class="card-body">
                            <p class="card-text"><?= htmlspecialchars($produit->description) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success">Commander</button>
                                </div>
                                <small class="text" style="font-weight: bold;"><?= htmlspecialchars($produit->prix) ?> TND</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
