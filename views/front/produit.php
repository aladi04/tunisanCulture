<?php
session_start();
require_once '../../database.php';

// Vérifier si un ID est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redirection ou message d'erreur si l'ID est manquant
    header('location: ../index.php?error=missing_id');
    exit;
}

$id = intval($_GET['id']); // Convertir l'ID en entier pour éviter les injections SQL

// Préparer et exécuter la requête
$sqlState = $pdo->prepare("SELECT * FROM produit WHERE id = ?");
$sqlState->execute([$id]);
$produit = $sqlState->fetch(PDO::FETCH_ASSOC);

// Vérifier si le produit existe
if (!$produit) {
    // Redirection ou affichage d'un message d'erreur si le produit est introuvable
    header('location: ../index.php?error=product_not_found');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Produit | <?php echo htmlspecialchars($produit['libelle']) ?></title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <h4><?php echo htmlspecialchars($produit['libelle']) ?></h4>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img img-fluid w-75" src="../upload/produit/<?php echo htmlspecialchars($produit['image']) ?>"
                     alt="<?php echo htmlspecialchars($produit['libelle']) ?>">
            </div>
            <div class="col-md-6">
                <?php
                
                $prix = $produit['prix'];
                ?>
                <div class="d-flex align-items-center">
                    <h1 class="w-100"><?php echo htmlspecialchars($produit['libelle']) ?></h1>
                    
                </div>
                <hr>
                <p class="text-justify">
                    <?php echo nl2br(htmlspecialchars($produit['description'])) ?>
                </p>
                <hr>
                <div class="d-flex">
                    <?php
                    if (!empty($discount)) {
                        $total = $prix - (($prix * $discount) / 100);
                        ?>
                        <h5 class="mx-1">
                            <span class="badge text-bg-danger">
                                <strike><?php echo htmlspecialchars($prix) ?> <i class="fa fa-solid fa-dollar"></i></strike>
                            </span>
                        </h5>
                        <h5 class="mx-1">
                            <span class="badge text-bg-success">
                                <?php echo htmlspecialchars($total) ?> <i class="fa fa-solid fa-dollar"></i>
                            </span>
                        </h5>
                    <?php } else { ?>
                        <h5>
                            <span class="badge text-bg-success">
                                <?php echo htmlspecialchars($prix) ?> <i class="fa fa-solid fa-dollar"></i>
                            </span>
                        </h5>
                    <?php } ?>
                </div>
                <hr>
                <?php
                $idProduit = $produit['id'];
                include '../include/front/counter.php';
                ?>
                <hr>
            </div>
        </div>
    </div>
</div>
</body>
</html>
