<?php

namespace App\Controllers;

use App\Models\Produit;
use App\Models\Categorie;

class ProduitController
{
    public function liste()
    {
        $produitModel = new Produit();
        $produits = $produitModel->getAll();
        include '../app/views/produits/liste.php';
    }

    public function ajouter()
    {
        $categorieModel = new Categorie();
        $categories = $categorieModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'] ?? '';

            if (!empty($image)) {
                $filename = uniqid() . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], '../public/upload/produit/' . $filename);
            }

            if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
                $produitModel = new Produit();
                $produitModel->add($libelle, $prix, $categorie, $description, $filename);
                header("Location: /produits");
            }
        }

        include '../app/views/produits/ajouter.php';
    }

    public function modifier($id)
    {
        $produitModel = new Produit();
        $produit = $produitModel->getById($id);

        $categorieModel = new Categorie();
        $categories = $categorieModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'] ?? '';

            if (!empty($image)) {
                $filename = uniqid() . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], '../public/upload/produit/' . $filename);
            }

            $produitModel->update($id, $libelle, $prix, $categorie, $description, $filename);
            header("Location: /produits");
        }

        include '../app/views/produits/modifier.php';
    }

    public function supprimer($id)
    {
        $produitModel = new Produit();
        $produitModel->delete($id);
        header("Location: /produits");
    }
}
