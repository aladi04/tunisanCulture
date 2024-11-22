<?php
    include "../model/user.php";
    include "../view/login.html";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submitU'])){
            $user = new User();
  
            $user->setEmail($_POST["emailU"]);
            $user->setPw($_POST["passwordU"]);
            $user->setRole(0); 
    
            $res = $user->verifyAcc();
            $test = ($res == "User found") ? 1 : 0;
            
            if ($test == 1) {
                echo "user found";
            #$_SESSION['email'] = $_POST["emailU"];
            
            #header("Location: ../control/home.php");
            #exit(); 
            }else{
                echo "user not found";
            }
        }else if (isset($_POST['submitA'])){
            $user = new User();
  
            $user->setEmail($_POST["emailA"]);
            $user->setPw($_POST["passwordA"]);
            $user->setRole(1);
    
            $res = $user->verifyAcc();
            $test = ($res == "User found") ? 1 : 0;
            
            if ($test == 1) {
                echo "admin found";
            #$_SESSION['email'] = $_POST["emailA"];
            
            #header("Location: ../control/dashboard.php");
            #exit(); 
            }else{
                echo "admin not found";
            }
        }
    }

?>