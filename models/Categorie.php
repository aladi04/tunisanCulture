<?php

namespace App\Models;

use App\Core\Database;

class Categorie
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAll()
    {
        $query = $this->pdo->query("SELECT * FROM categorie");
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM categorie WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public function add($libelle, $description)
    {
        $query = $this->pdo->prepare("INSERT INTO categorie (libelle, description) VALUES (?, ?)");
        return $query->execute([$libelle, $description]);
    }

    public function update($id, $libelle, $description)
    {
        $query = $this->pdo->prepare("UPDATE categorie SET libelle = ?, description = ? WHERE id = ?");
        return $query->execute([$libelle, $description, $id]);
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare("DELETE FROM categorie WHERE id = ?");
        return $query->execute([$id]);
    }
}
