<?php
session_start();
include '../../connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Panier</title>
</head>
<body>
<?php include '../include/nav_front.php' 
//$pdo = Config::getConnexion();
?>

<div class="container py-2">
    <?php
    $pdo = Config::getConnexion();
    // Initialisation du panier
    $panier = $_SESSION['panier'] ?? []; // Suppression de la dépendance à idUtilisateur

    if (isset($_POST['vider'])) {
        $_SESSION['panier'] = []; // Réinitialise le panier entier
        header('location: panier.php');
        exit;
    }

    if (!empty($panier)) {
        $idProduits = array_keys($panier);
        $idProduits = implode(',', array_map('intval', $idProduits));
        $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $produits = [];
    }

    if (isset($_POST['valider']) && !empty($produits)) {
        $sql = 'INSERT INTO ligne_commande(id_produit, id_commande, prix, quantite, total) VALUES';
        $total = 0;
        $prixProduits = [];

        foreach ($produits as $produit) {
            $idProduit = $produit['id'];
            $prix = $produit['prix'];
            $qty = $panier[$idProduit] ?? 1;

            $totalProduit = $qty * $prix;
            $total += $totalProduit;

            $prixProduits[] = [
                'id' => $idProduit,
                'prix' => $prix,
                'qty' => $qty,
                'total' => $totalProduit,
            ];
        }

        // Insertion de la commande et des lignes de commande
        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(total) VALUES(?)');
        $sqlStateCommande->execute([$total]);
        $idCommande = $pdo->lastInsertId();

        $args = [];
        foreach ($prixProduits as $produit) {
            $sql .= "(?, ?, ?, ?, ?),";
            $args[] = $produit['id'];
            $args[] = $idCommande;
            $args[] = $produit['prix'];
            $args[] = $produit['qty'];
            $args[] = $produit['total'];
        }
        $sql = rtrim($sql, ',');
        $sqlState = $pdo->prepare($sql);
        $inserted = $sqlState->execute($args);

        if ($inserted) {
            $_SESSION['panier'] = []; // Vider le panier après validation
            header("location: panier.php?success=true&total=$total");
            exit;
        } else {
            echo '<div class="alert alert-danger">Erreur lors de l’enregistrement de la commande. Veuillez réessayer.</div>';
        }
    }

    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success">Merci ! Votre commande a été validée avec un total de ' . htmlspecialchars($_GET['total']) . ' $.</div>';
    }
    ?>

    <!-- Afficher le bouton "Procéder aux paiements" si la commande a été validée -->
    <?php if (isset($_GET['success'])) { ?>
        <div class="text-center mt-4">
            <a href="paiement.php?total=<?php echo htmlspecialchars($_GET['total']); ?>" class="btn btn-primary">Procéder aux paiements</a>
        </div>
    <?php } ?>

    <h4>Panier</h4>
    <div class="container">
        <div class="row">
            <?php if (empty($produits)) { ?>
                <div class="alert alert-warning">Votre panier est vide. <a href="./index.php" class="btn btn-sm btn-success">Acheter des produits</a></div>
            <?php } else { ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Libelle</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    foreach ($produits as $produit) {
                        $idProduit = $produit['id'];
                        $prix = $produit['prix'];
                        $qty = $panier[$idProduit] ?? 1;

                        $totalProduit = $qty * $prix;
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit['id'] ?></td>
                            <td><img src="../upload/produit/<?php echo htmlspecialchars($produit['image']) ?>" alt="" width="80"></td>
                            <td><?php echo htmlspecialchars($produit['libelle']) ?></td>
                            <td><?php include '../include/front/counter.php'; ?></td>
                            <td><?php echo $prix ?> $</td>
                            <td><?php echo $totalProduit ?> $</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" align="right"><strong>Total</strong></td>
                        <td><?php echo $total ?> $</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">
                            <form method="post">
                                <button type="submit" class="btn btn-success" name="valider">Valider la commande</button>
                                <button type="submit" class="btn btn-danger" name="vider" onclick="return confirm('Voulez-vous vraiment vider le panier ?')">Vider le panier</button>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>