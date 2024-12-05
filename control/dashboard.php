<?php
include '../connect.php';
include "../model/user.php";

function showUser($pdo){
    $sql = "SELECT * FROM `user`";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $users=$stm->fetchAll();
    return $users;
}

function deleteUser($pdo, $email) {
    $sql = "DELETE FROM `user` WHERE email = :email";
    $stm = $pdo->prepare($sql);
    
    $stm->execute(['email' => $email]);

    if ($stm->rowCount() > 0) {
        return "User deleted successfully!";
    } else {
        return "No user found with the provided email.";
    }
}


function updatePassword($pdo, $email, $name, $role, $birthDate) {
    $sql = "UPDATE `user` SET name = :name, role = :role, birth_date = :birthDate WHERE email = :email";
    $params = [
        ":name" => $name,
        ":role" => $role,
        ":birthDate" => $birthDate,
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
    $user = new User();

    $users = showUser($pdo);
    if (isset($_POST['submitU'])) {
        $user->setEmail($_POST["emailU"]);
        $user->setName($_POST["nameU"]);
        $user->setRole($_POST["roleU"]); 
        $user->setDate($_POST["dateU"]);
        $result = updatePassword($pdo, $user->getEmail(), $user->getName(), $user->getRole(), $user->getDate());
        
    }else if (isset($_POST['submitD'])){
        $user->setEmail($_POST["email"]);
        $res =deleteUser($pdo, $user->getEmail());

    }
//?message=
    header("Location: ../view/backOfficePage/dashboard/index.php" . urlencode($message));
    exit();
}

?>

<!--
1- password dashed (done)
2- control de saisie mouch bel html5 (donc bech nzid js)  (done)
3- functions mouch fel model (done)
4- pushi 5edmti fel git wne3amer board 
-->