<?php


include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/config_connexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/model/ModelReclamation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/model/ModelReponse.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/vendor/autoload.php';


$action = $_GET['action'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action) {
    switch ($action) {
        case 'insertion':
            insertion();
            break;
        case 'afficherMesReclamation':
            afficherMesReclamation($id_Client);
            break;

        case 'delete':
            $ID_REC = $_POST['ID_REC'];

            delete($ID_REC);
            break;

        case 'Reponse':
            Reponse();
            break;
        case 'update':
            updateReclamationn($reclamation, $id);
            break;
    }
}

function insertion()
{
    // Capture form data
    $pdo = config::getConnexion();
    $titre = $_POST['titre'] ?? null;
    $email = $_POST['email'] ?? null;
    $statut = $_POST['statut'] ?? null;
    $type_reclamation = $_POST['type_reclamation'] ?? null;

    // Check if all fields are set
    if ($titre && $email && $statut && $type_reclamation) {
        $reclamation = new ModelReclamation(
            null,          // ID will be auto-incremented
            $titre,
            $email,
            $statut,
            $type_reclamation
        );

        try {
            // Prepare the insert statement
            $requete = $pdo->prepare("
                INSERT INTO reclamation (titre,email, statut, type_reclamation) 
                VALUES (:titre,:email ,:statut, :type_reclamation)
            ");
            $requete->execute([
                ':titre' => $reclamation->getTitre(),
                ':email' => $reclamation->getEmail(),
                ':statut' => $reclamation->getStatut(),
                ':type_reclamation' => $reclamation->getTypeReclamation(),
            ]);

            // Redirect after successful insertion
            header("Location: ../view/frontoffice/reclamation.php");
            exit;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "All fields are required!";
    }
}

function afficherMesReclamation($id_Client)
{
    // Obtenir la connexion PDO
    $pdo = config::getConnexion();

    try {
        // Préparer la requête SQL
        $sql = "SELECT * FROM reclamation WHERE id_Client = :id";
        $stmt = $pdo->prepare($sql); // Préparation correcte avec une chaîne SQL

        // Lier les paramètres
        $stmt->bindParam(':id', $id_Client, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();

        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

function delete($ID_REC) {
    
        $pdo = config::getConnexion();
        try {

            $sql = "DELETE FROM reponse WHERE id_reclamation = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $ID_REC, PDO::PARAM_INT);
            $stmt->execute();

            $sql = "DELETE FROM reclamation WHERE ID_REC = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $ID_REC, PDO::PARAM_INT);
            $stmt->execute();




            if ($stmt->rowCount() > 0) {
                header("Location: ../view/frontoffice/mesReclamation.php");
                exit;
            } else {
                echo "No reclamation found with ID $ID_REC.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

}



function updateReclamationn($reclamation, $id)
{
    try {
        $id = $_POST['ID_REC'];
        $titre = $_POST['titre'];
        $email = $_POST['email'];
        $statut = $_POST['statut'];
        $type_reclamation = $_POST['type_reclamation'];


        $reclamation = new ModelReclamation(
            '',
            $titre,
            $email,
            $statut,
            $type_reclamation
        );
        $db = config::getConnexion();
        $requete = $db->prepare(
            "UPDATE reclamation 
             SET titre = :titre, 
                 email = :email, 
                 statut = :statut, 
                 type_reclamation = :type_reclamation 
             WHERE ID_REC = :id"
        );
        $requete->execute([
            ':titre' => $reclamation->getTitre(),
            ':email' => $reclamation->getEmail(),
            ':statut' => $reclamation->getStatut(),
            ':type_reclamation' => $reclamation->getTypeReclamation(),
            ':id' => $id
        ]);


        header("Location: ../view/frontoffice/mesReclamation.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
