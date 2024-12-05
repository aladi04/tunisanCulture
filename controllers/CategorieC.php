<?php

namespace App\Controllers;

use App\Models\Categorie;

class CategorieController
{
    public function liste()
    {
        $categorieModel = new Categorie();
        $categories = $categorieModel->getAll();
        include '../app/views/categories/liste.php';
    }

    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];

            if (!empty($libelle) && !empty($description)) {
                $categorieModel = new Categorie();
                $categorieModel->add($libelle, $description);
                header("Location: /categories");
            }
        }
        include '../app/views/categories/ajouter.php';
    }

    public function modifier($id)
    {
        $categorieModel = new Categorie();
        $categorie = $categorieModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];

            if (!empty($libelle) && !empty($description)) {
                $categorieModel->update($id, $libelle, $description);
                header("Location: /categories");
            }
        }
        include '../app/views/categories/modifier.php';
    }

    public function supprimer($id)
    {
        $categorieModel = new Categorie();
        $categorieModel->delete($id);
        header("Location: /categories");
    }
}
