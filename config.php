<?php


    function getConnexion() {
        
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "transport";
            $port = 3306;

            try {
                $connection = new PDO(
                    "mysql:host=$servername;port=$port;dbname=$dbname",
            $username,
            $password,[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                return $connection;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        
    

?>