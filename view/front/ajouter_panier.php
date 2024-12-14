<?php
session_start();

// Vérification des données envoyées
if (!isset($_POST['id'], $_POST['qty'])) {
    header("location:".$_SERVER['HTTP_REFERER']);
    exit;
}

$id = intval($_POST['id']); // ID du produit
$qty = intval($_POST['qty']); // Quantité

// Initialisation du panier s'il n'existe pas encore
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Gestion des quantités dans le panier
if ($qty == 0) {
    unset($_SESSION['panier'][$id]); // Supprimer l'article si la quantité est 0
} else {
    $_SESSION['panier'][$id] = $qty; // Ajouter ou mettre à jour la quantité
}

// Retourner à la page précédente
header("location:".$_SERVER['HTTP_REFERER']);
exit;
