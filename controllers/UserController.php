<?php
require_once 'models/User.php';

class UserController {
    public function showUsers() {
        $user = new User();
        $users = $user->getAllUsers();
        include 'views/users.php';
    }

    public function addUser() {
        if ($_POST) {
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $user->createUser($email, $phone_number, $username, $password);

            echo "Utilisateur ajouté avec succès!";
        }
    }
}
?>
