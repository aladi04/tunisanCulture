


<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Interdit au moins de 18 ans</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php

$connecte = false;
if (isset($_SESSION['utilisateur'])) {
    $connecte = true;
}

?>
        <?php
        $currentPage = $_SERVER['PHP_SELF'];
        ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == 'C:/xampp/htdocs/Projet webb/views/BackOffice/dashboard/prod.php') echo 'active' ?>"
                       aria-current="page" href="C:/xampp/htdocs/Projet webb/views/BackOffice/dashboard/prod.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>
              
                <?php
                if ($connecte) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/TunisEn<couleurs/categories.php') echo 'active' ?>"
                           aria-current="page" href="../categories.php"><i
                                    class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/TunisEn<couleurs/produits.php') echo 'active' ?>"
                           aria-current="page" href="../produits.php"><i class="fa-solid fa-tag"></i>
                            Liste des produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/TunisEn<couleurs/commandes.php') echo 'active' ?>"
                           aria-current="page" href="../commandes.php"><i
                                    class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    

                    <?php
                } else {
                    ?>
                   
                    <?php
                }
                ?>
            </ul>
        
</nav>
