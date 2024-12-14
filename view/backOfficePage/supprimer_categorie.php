<?php
    require_once '../../connect.php';
    $pdo = Config::getConnexion();
    $id = $_GET['id'];
    $sqlState = $pdo->prepare('DELETE FROM categorie WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location: categories.php');