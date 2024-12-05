<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/config_connexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/model/ModelReponse.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once $_SERVER['DOCUMENT_ROOT'] . '/prjt1/vendor/autoload.php';


$action = $_GET['action'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action) {
    switch ($action) {
        case 'GetAllClient':
            GetAllClient();
            break;
            case 'Reponse':
                Reponse();
                break;
        }
    
}
function GetAllClient() {
    try {
        $pdo = config::getConnexion();
        $stmt = $pdo->query("SELECT * FROM reclamation");
        $reclamations = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $reclamations; // yrjaali liste des clients
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
}



// function Reponse()
// {
//     // Vérifier que les données nécessaires sont envoyées via POST
//     if (!isset($_POST['email']) || !isset($_POST['reponse'])) {
//         echo "Les champs email et réponse sont requis.";
//         return false;
//     }

//     // Récupérer et valider les entrées
//     $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//     $reponse = htmlspecialchars(trim($_POST['reponse']));

//     if (!$email || empty($reponse)) {
//         echo "Adresse email invalide ou réponse vide.";
//         return false;
//     }

//     try {
//         // Configuration de PHPMailer
//         $mail = new PHPMailer(true);

//         // Configuration du serveur SMTP
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'clash.bouallegue@gmail.com'; // Votre adresse Gmail
//         $mail->Password = 'raddntsmgquwiwew'; // Mot de passe spécifique à l'application Gmail
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = 587;

//         // Destinataire et expéditeur
//         $mail->setFrom('clash.bouallegue@gmail.com', 'TunisianTreasures');
//         $mail->addAddress($email); // Email du destinataire

//         // Contenu de l'email
//         $mail->isHTML(true);
//         $mail->Subject = 'Réponse à votre réclamation';
//         $mail->Body = '
//             <p>Bonjour,</p>
//             <p>' . nl2br($reponse) . '</p>
//             <p>Cordialement,</p>
//             <p>Équipe TunisianTreasures</p>';
//         $mail->AltBody = "Bonjour,\n\n" . $reponse . "\n\nCordialement,\nÉquipe TunisianTreasures";

//         // Envoyer l'email
//         $mail->send();

//         echo "Message envoyé avec succès.";
//         return true;
//     } catch (Exception $e) {
//         echo "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
//         return false;
//     }
// }














function Reponse()
{

    // Vérifier que les données nécessaires sont envoyées via POST
    if (!isset($_POST['email']) || !isset($_POST['reponse'])) {
        echo "Les champs email et réponse sont requis.";
        return false;
    }

    // Récupérer et valider les entrées
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $reponse = htmlspecialchars(trim($_POST['reponse']));

    if (!$email || empty($reponse)) {
        echo "Adresse email invalide ou réponse vide.";
        return false;
    }

    try {
        $email = $_POST['email'];
        $message = $_POST['reponse'];
        $id = $_POST['id_reclamation'];

        $mail = new PHPMailer(true);

        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'clash.bouallegue@gmail.com'; // Votre adresse Gmail
        $mail->Password = 'raddntsmgquwiwew'; // Mot de passe spécifique à l'application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire et expéditeur
        $mail->setFrom('clash.bouallegue@gmail.com', 'TunisianTreasures');
        $mail->addAddress($email); // Email du destinataire

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Réponse à votre réclamation';
        $mail->Body = '
            <p>Bonjour,</p>
            <p>' . nl2br($message) . '</p>
            <p>Cordialement,</p>
            <p>Équipe TunisianTreasures</p>';
        $mail->AltBody = "Bonjour,\n\n" . $message . "\n\nCordialement,\nÉquipe TunisianTreasures";


        // Envoyer l'email
        $mail->send();
        $pdo = config::getConnexion();

        $reponse = new ModelReponse('', $message, date('Y-m-d H:i:s'), $id);

        $requete = $pdo->prepare(" INSERT INTO reponse (message, date_rep, id_reclamation)  VALUES (:message, :date_rep, :id_reclamation)");


        $requete->execute([
            ':message' => $reponse->getMessage(),
            ':date_rep' => $reponse->getDateRep(),
            ':id_reclamation' => $reponse->getIdReclamation(),
        ]);
        header("Location: ../view/backOffice/dashboard/listeReclamation.php");
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        return false;
    }
}
