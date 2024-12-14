<?php
include '../connect.php';
namespace App\Models;

use App\Core\Database;

class Commande
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Config::getConnexion();
    }

    public function getAll()
    {
        $query = $this->pdo->query("SELECT * FROM commande");
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM commande WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public function updateStatus($id, $status)
    {
        $query = $this->pdo->prepare("UPDATE commande SET valide = ? WHERE id = ?");
        return $query->execute([$status, $id]);
    }
}