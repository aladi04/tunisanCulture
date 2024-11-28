<?php

require_once("../models/config/commandes.php");

class ProduitC {

    /**
     * Récupérer tous les produits.
     *
     * @return array Liste des produits
     */
    public static function afficherTousLesProduits() {
        return afficher();
    }

    /**
     * Récupérer un produit par son ID.
     *
     * @param int $id ID du produit
     * @return object|null Produit correspondant ou null s'il n'existe pas
     */
    public static function afficherUnProduit($id) {
        if (is_numeric($id)) {
            $produits = afficherUnProduit($id);
            return $produits ? $produits[0] : null;
        }
        return null;
    }
}
