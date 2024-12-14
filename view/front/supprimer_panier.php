<?php
session_start();

// Vérification des données envoyées
if (!isset($_POST['id'])) {
    header("location:".$_SERVER['HTTP_REFERER']);
    exit;
}

$id = intval($_POST['id']); // ID du produit à supprimer

// Vérifier si le panier existe
if (isset($_SESSION['panier'][$id])) {
    unset($_SESSION['panier'][$id]); // Supprimer l'article du panier
}

// Retourner à la page précédente
header("location:".$_SERVER['HTTP_REFERER']);
exit;
