<?php
//abcABC123+  bou7mid2@gmail.com
ob_start();
    session_start();
    include "../view/sign.html";
    include "../model/user.php";
    include "../connect.php";

    function emailExist($pdo, $email) {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stm = $pdo->prepare($sql);
        $stm->execute(['email' => $email]);
        return $stm->rowCount() > 0;
    }
    

    function addUser($pdo, $email, $password, $role, $name, $date) {
        if (emailExist($pdo, $email)) {
            return "The email already exists";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `user` (email, role, password, name, birth_date) VALUES (:email, :role, :password, :name, :birth_date)";
            $stm = $pdo->prepare($sql);
    
            $res = $stm->execute([
                'email' => $email,
                'role' => $role,
                'password' => $hashedPassword,
                'name' => $name,
                'birth_date' => $date
                
            ]);
    
            return $res ? "User added successfully!" : "Error: Could not insert user!";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $pdo = Config::getConnexion();
        $user = new User();
        if (isset($_POST['submitA'])){
            $user->setEmail($_POST["emailA"]);
            $user->setPassword($_POST["passwordA"]);
            $user->setName($_POST["nameA"]);
            $user->setDate($_POST["dateA"]);
            $user->setRole(1);

            $result = addUser($pdo, $user->getEmail(), $user->getPassword(), $user->getRole(), $user->getName(), $user->getDate());
            if ($result == "User added successfully!") {
                // Fetch the newly added user to store their data in the session
                $sql = "SELECT * FROM `user` WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['email' => $user->getEmail()]);
                $newAdmin = $stmt->fetch();
    
                if ($newAdmin) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $newAdmin['id']; 
                    $_SESSION['email'] = $newAdmin['email'];
                    $_SESSION['role'] = $newAdmin['role'];
    
                    // Redirect to the dashboard
                    header("Location: ../view/backOfficePage/dashboard/index.php");
                    exit();
                }
            }
        }else if (isset($_POST['submitU'])){
            $user->setEmail($_POST["emailU"]);
            $user->setPassword($_POST["passwordU"]);
            $user->setName($_POST["nameU"]);
            $user->setDate($_POST["dateU"]);
            $user->setRole(0);

            $result = addUser($pdo, $user->getEmail(), $user->getPassword(), $user->getRole(), $user->getName(), $user->getDate());
            if ($result == "User added successfully!"){
                $sql = "SELECT * FROM `user` WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['email' => $user->getEmail()]);
                $newUser = $stmt->fetch();

                if ($newUser) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $newUser['id']; 
                    $_SESSION['email'] = $newUser['email'];
                    $_SESSION['role'] = $newUser['role'];
    
                    // Redirect to the dashboard
                    header("Location: ../view/PageAcceuil/index2.php");
                    exit();
                }
            }
        }
        }

    ob_end_flush();
?>