<?php
include '../connect.php';
namespace App\Models;

use App\Core\Database;

class Produit
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Config::getConnexion();
    }

    public function getAll()
    {
        $query = $this->pdo->query("SELECT produit.*, categorie.libelle AS categorie_libelle 
                                    FROM produit 
                                    JOIN categorie ON produit.id_categorie = categorie.id");
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM produit WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public function add($libelle, $prix, $categorie, $description, $image)
    {
        $query = $this->pdo->prepare("INSERT INTO produit (libelle, prix, id_categorie, description, image) 
                                      VALUES (?, ?, ?, ?, ?)");
        return $query->execute([$libelle, $prix, $categorie, $description, $image]);
    }

    public function update($id, $libelle, $prix, $categorie, $description, $image = null)
    {
        if ($image) {
            $query = $this->pdo->prepare("UPDATE produit SET libelle = ?, prix = ?, id_categorie = ?, 
                                          description = ?, image = ? WHERE id = ?");
            return $query->execute([$libelle, $prix, $categorie, $description, $image, $id]);
        } else {
            $query = $this->pdo->prepare("UPDATE produit SET libelle = ?, prix = ?, id_categorie = ?, 
                                          description = ? WHERE id = ?");
            return $query->execute([$libelle, $prix, $categorie, $description, $id]);
        }
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE FROM produit WHERE id = ?");
        return $query->execute([$id]);
    }
}