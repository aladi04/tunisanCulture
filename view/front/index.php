<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Accueil</title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <?php
    include '../../connect.php';
    $pdo = Config::getConnexion();
    $categoryId = $_GET['id'] ?? NULL;
    $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);

    if (!is_null($categoryId)) {
        $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_categorie=?");
        $sqlState->execute([$categoryId]);
        $produits = $sqlState->fetchAll(PDO::FETCH_OBJ);
    } else {
        $produits = $pdo->query("SELECT * FROM produit")->fetchAll(PDO::FETCH_OBJ);
    }

    $activeClasses = 'active bg-success rounded border-success';
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group list-group-flush position-sticky sticky-top">
                    <h4 class="mt-4"><i class="fa fa-light fa-list"></i> Liste des catégories</h4>
                    <li class="list-group-item <?= $categoryId == NULL ? $activeClasses : '' ?>">
                        <a class="btn btn-default w-100" href="./">
                            <i class="fa fa-solid fa-border-all"></i> Voir tous les produits
                        </a>
                    </li>
                    <?php
                    foreach ($categories as $categorie) {
                        $active = $categoryId == $categorie->id ? $activeClasses : '';
                        ?>
                        <li class="list-group-item <?= $active ?>">
                            <a class="btn btn-default w-100" href="index.php?id=<?php echo $categorie->id ?>">
                                <?php echo $categorie->libelle ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

                <!-- Section des fonctionnalités avancées -->
                <div class="mt-4">
                    <h5>Filtrer</h5>
                    <form method="GET" class="mb-3">
                        <label for="price_min" class="form-label">Prix Min :</label>
                        <input type="number" name="price_min" id="price_min" class="form-control mb-2" placeholder="Prix minimum $" value="<?= $_GET['price_min'] ?? '' ?>">

                        <label for="price_max" class="form-label">Prix Max :</label>
                        <input type="number" name="price_max" id="price_max" class="form-control mb-2" placeholder="Prix maximum $" value="<?= $_GET['price_max'] ?? '' ?>">

                        
                       
                        </select>

                       
                        </select>

                       
                        </select>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Filtrer</button>
                        <a href="index.php" class="btn btn-danger w-100 mt-2">Réinitialiser</a>
                    </form>
                </div>
            </div>

            <div class="col mt-4">
                <div class="row">
                    <?php
                    // Gestion des recherches et tri
                    $query = "SELECT * FROM produit";
                    $params = [];

                    if (!is_null($categoryId)) {
                        $query .= " WHERE id_categorie = :id_categorie";
                        $params['id_categorie'] = $categoryId;
                    }

                    if (!empty($_GET['price_min'])) {
                        $query .= (!is_null($categoryId) ? " AND" : " WHERE") . " prix >= :price_min";
                        $params['price_min'] = $_GET['price_min'];
                    }

                    if (!empty($_GET['price_max'])) {
                        $query .= (!is_null($categoryId) || !empty($_GET['price_min']) ? " AND" : " WHERE") . " prix <= :price_max";
                        $params['price_max'] = $_GET['price_max'];
                    }

                   

                    

                    $stmt = $pdo->prepare($query);
                    $stmt->execute($params);
                    $produits = $stmt->fetchAll(PDO::FETCH_OBJ);

                    require_once '../include/front/product/afficher_product.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
