<?php
include '../connect.php';


function showUser($pdo){
    $sql = "SELECT * FROM `user`";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $users=$stm->fetchAll();
    return $users;
}

function deleteUser($pdo, $email, $id) {
    $sql = "DELETE FROM `user` WHERE email = :email AND id = :id";
    $stm = $pdo->prepare($sql);
    
    $stm->execute(['email' => $email, 'id' =>$id]);

    if ($stm->rowCount() > 0) {
        return "User deleted successfully!";
    } else {
        return "No user found with the provided email.";
    }
}


function updatePassword($pdo, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `user` SET password = :password WHERE email = :email";
    $params = [
        ":password" => $hashedPassword,
        ":email" => $email
    ];

    $stm = $pdo->prepare($sql);
    $res = $stm->execute($params);

    if ($stm->rowCount() > 0) {
        return "Password updated successfully!";
    } else {
        return "No user with the provided email";
    }
}



$message = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pdo = Config::getConnexion();
    
    $users = showUser($pdo);
    if (isset($_POST['submitU'])) {
        $result = updatePassword($pdo, $_POST["emailU"], $_POST["passwordU"]);
        
    } else if (isset($_POST['submitR'])) {
        $res =deleteUser($pdo, $_POST["emailR"], $_POST["idR"]);
    }

    header("Location: ../view/backOfficePage/dashboard/index.php?message=" . urlencode($message));
    exit();
}

?>

<!--
1- password dashed (done)
2- control de saisie mouch bel html5 (donc bech nzid js)  (done)
3- functions mouch fel model (done)
4- pushi 5edmti fel git wne3amer board 
-->