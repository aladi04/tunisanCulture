<?php
 
 require_once '../../connect.php';
 $pdo = Config::getConnexion();
$id = $_GET['id'];
$etat = $_GET['etat'];
$sqlState = $pdo->prepare('UPDATE commande SET valide = ? WHERE id = ?');
$sqlState->execute([$etat, $id]);
header('location: commande.php?id=' . $id);

