

<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Liste des produits</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    <h2>Liste des produits</h2>
    <a href="ajouter_produit.php" class="btn btn-primary">Ajouter produit</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Catégorie</th>
                
                <th>Image</th>
                
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once '../../connect.php';
        $pdo = Config::getConnexion();
        $categories = $pdo->query("SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id")->fetchAll(PDO::FETCH_OBJ);
        foreach ($categories as $produit){
            $prix = $produit->prix;
          
            ?>
            <tr>
                <td><?= $produit->id ?></td>
                <td><?= $produit->libelle ?></td>
                <td><?= $prix ?> <i class="fa fa-solid fa-dollar"></i></td>
                
                <td><?= $produit->categorie_libelle ?></td>
               
                <td><img class="img-fluid" width="90" src="../upload/produit/<?= $produit->image ?>" alt="<?= $produit->libelle ?>"></td>
                <td>
    <a href="modifier_produit.php?id=<?php echo $produit->id ?>" class="btn btn-primary">
        <i class="fa fa-edit"></i>
    </a>
    <a href="supprimer_produit.php?id=<?php echo $produit->id ?>" class="btn btn-danger" 
       onclick="return confirm('Voulez-vous vraiment supprimer le produit <?php echo $produit->libelle ?> ?')">
        <i class="fa fa-trash"></i>
    </a>
</td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>