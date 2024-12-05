<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TunisEnCouleur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       
  <section class="top-area">
    <div class="header-area">
        <nav class="navbar navbar-expand-lg navbar-light bootsnav navbar-sticky navbar-scrollspy">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><span></span></a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="index.php" class="nav-link">Produits</a></li>
                        <li class="nav-item"><a href="#explore" class="nav-link">Explore</a></li>
                        <li class="nav-item"><a href="#reviews" class="nav-link">Review</a></li>
                        <li class="nav-item"><a href="#blog" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []);
        }
        

        ?>
        
        <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            (<?php echo $productCount; ?>)</a>
    </div>
</nav>