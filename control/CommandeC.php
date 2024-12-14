<?php

namespace App\Controllers;

use App\Models\Commande;

class CommandeController
{
    public function liste()
    {
        $commandeModel = new Commande();
        $commandes = $commandeModel->getAll();
        include '../app/views/commandes/liste.php';
    }

    public function valider($id, $etat)
    {
        $commandeModel = new Commande();
        $commandeModel->updateStatus($id, $etat);
        header("Location: /commandes");
    }
}