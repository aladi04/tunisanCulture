<?php

class Database
{
    private static $pdo = null;

    public static function getInstance()
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO('mysql:host=localhost;dbname=oumar', 'root', '');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mode erreurs
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mode fetch
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
