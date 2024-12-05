<?php
require_once 'include/database.php';

// Vérifier si un ID est fourni
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID produit non spécifié.");
}

$idProduit = $_GET['id']; // ID du produit à supprimer

try {
    // Supprimer les lignes associées dans ligne_commande
    $sql = "DELETE FROM ligne_commande WHERE id_produit = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idProduit]);

    // Supprimer le produit dans produit
    $sql = "DELETE FROM produit WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idProduit]);

    // Rediriger vers la liste des produits après suppression
    header("Location: produits.php?message=supprime");
} catch (PDOException $e) {
    // Afficher une erreur en cas de problème
    die("Erreur : " . $e->getMessage());
}
?>
