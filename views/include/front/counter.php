<div>
    <?php
    $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;
    $qty = $_SESSION['panier'][$idUtilisateur][$idProduit] ?? 0;
    if ($qty == 0) {
        $color = 'btn-primary';
        $button = '<i class="fa fa-light fa-cart-plus"></i>';
    } else {
        $button = '<i class="fa-solid fa-pencil"></i>';
    }
    ?>
    <?php if ($idUtilisateur !== 0): ?>
        <form method="post" class="counter d-flex" action="ajouter_panier.php">
            <button type="button" class="btn btn-primary mx-2 counter-moins">-</button>
            <input type="hidden" name="id" value="<?php echo $idProduit; ?>">
            <input class="form-control" value="<?php echo $qty; ?>" type="number" name="qty" id="qty" max="99" min="1">
            <button type="button" class="btn btn-primary mx-2 counter-plus mx-1">+</button>

            <button class="btn btn-success btn-sm" type="submit" name="ajouter">
                <?= $button ?>
            </button>

            <?php if ($qty != 0): ?>
                <button formaction="supprimer_panier.php" class="btn btn-sm btn-danger mx-1" type="submit" name="supprimer">
                    <i class="fa-solid fa-trash"></i>
                </button>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const minusButton = document.querySelector('.counter-moins');
    const plusButton = document.querySelector('.counter-plus');
    const qtyInput = document.querySelector('#qty');

    // Vérifiez si les éléments existent pour éviter les erreurs
    if (minusButton && plusButton && qtyInput) {
        minusButton.addEventListener('click', function() {
            let currentQty = parseInt(qtyInput.value, 10);
            if (currentQty > 1) { // Pour éviter d'avoir une quantité inférieure à 1
                qtyInput.value = currentQty - 1;
            }
        });

        plusButton.addEventListener('click', function() {
            let currentQty = parseInt(qtyInput.value, 10);
            if (currentQty < parseInt(qtyInput.max, 10)) {
                qtyInput.value = currentQty + 1;
            }
        });
    }
});
</script>
