<?php
include '../connect.php';
include "../model/user.php";

$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pdo = Config::getConnexion();

    if (isset($_POST['SubmitP'])) {
        $passwordC = $_POST['passwordC'] ?? '';
        $passwordN1 = $_POST['passwordN1'] ?? '';
        $passwordN2 = $_POST['passwordN2'] ?? '';

        try {
            $stmt = $pdo->prepare("SELECT * FROM user");
            $stmt->execute();
            $user = null;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($passwordC, $row['password'])) {
                    $user = $row; // Match found
                    break;
                }
            }

            $hashedPassword = password_hash($passwordN1, PASSWORD_DEFAULT);

            $updateStmt = $pdo->prepare("UPDATE `user` SET password = :newPassword WHERE password = :currentPassword");
            $updateStmt->bindParam(':newPassword', $hashedPassword, PDO::PARAM_STR);
            $updateStmt->bindParam(':currentPassword', $user['password'], PDO::PARAM_STR);
            $updateStmt->execute();

            echo "Success: Password updated successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    header("Location: ../view/PageAcceuil/index2.php" . urlencode($message));
    exit();
}




?>