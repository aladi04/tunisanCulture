<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../connect.php';

    $email = $_POST['email']; 
    $targetDir = "../uploads/"; 
    $targetFile = $targetDir . basename($_FILES["profilePhoto"]["name"]);
    $uploadOk = 1;

    // Check file type
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Move file if valid
    if ($uploadOk && move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFile)) {
        try {
            $pdo = Config::getConnexion();
            $stmt = $pdo->prepare("UPDATE `user` SET profile_image = :profile_image WHERE email = :email");
            $stmt->execute([':profile_image' => $targetFile, ':email' => $email]);
            header("Location: ../view/PageAcceuil/index2.php"); 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "There was an error uploading your file.";
    }
}
?>
