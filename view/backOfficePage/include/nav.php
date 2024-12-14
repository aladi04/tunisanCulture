<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Interdit au moins de 18 ans</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == 'prod.php') echo 'active'; ?>" aria-current="page"
                       href="/integration/view/backOfficePage/dashboard/prod.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == 'categories.php') echo 'active'; ?>" aria-current="page"
                       href="/integration/view/backOfficePage/categories.php"><i class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == 'produits.php') echo 'active'; ?>" aria-current="page"
                       href="/integration/view/backOfficePage/produits.php"><i class="fa-solid fa-tag"></i> Liste des produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == 'commandes.php') echo 'active'; ?>" aria-current="page"
                       href="/integration/view/backOfficePage/commandes.php"><i class="fa-solid fa-barcode"></i> Commandes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
