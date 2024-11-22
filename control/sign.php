<?php
    include "../model/user.php";
    include "../view/sign.html";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submitU'])){
            $user = new User();

            $user->setEmail($_POST["emailU"]);
            $user->setPw($_POST["passwordU"]);
            $user->setRole(0);

            $result = $user->addUser();
        }else if (isset($_POST['submitA'])){
            $user = new User();

            $user->setEmail($_POST["emailA"]);
            $user->setPw($_POST["passwordA"]);
            $user->setRole(1);

            $result = $user->addUser();
        }
    }

?>