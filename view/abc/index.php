<?php
require_once '../../connect.php'; 

$email = isset($_GET['email']) ? $_GET['email'] : null;
$userData = null;

if ($email) {
    try {
        $pdo = Config::getConnexion(); 
        $stmt = $pdo->prepare("SELECT * FROM `user` WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user data as an associative array
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Strongly Typed by HTML4 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <style>
            .form-container {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px 30px;
    width: 100%;
    max-width: 400px;
}
.form-container h2 {
    margin-bottom: 20px;
    color: #333333;
}
.form-container label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555555;
}
.form-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333333;
}
.form-container button {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}
.form-container button:hover {
    background-color: #0056b3;
}
.form-container .error-message {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}
        </style>
		<link rel="stylesheet" href="design.css" />
	</head>

    <body>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600"><?php echo htmlspecialchars($userData['name'] ?? 'Unknown User'); ?></h6>
                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?php echo htmlspecialchars($userData['email'] ?? 'Unknown Email'); ?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Birth Date</p>
                                                <h6 class="text-muted f-w-400"><?php echo htmlspecialchars($userData['birth_date'] ?? 'Unknown Birth date'); ?></h6>
                                            </div>
                                        </div>
                                        <div class="form-container">
                                            <h2>Update Password</h2>
                                            <form action="../../control/abc.php" method="POST">
                                                <label for="password">Current Password</label>
                                                <input type="password" name="passwordC">
                                                
                                                <label for="password">New Password</label>
                                                <input type="password" name="passwordN1">
                                                
                                                <label for="password">Confirm New Password</label>
                                                <input type="password" name="passwordN2">
                                                
                                                <button name="SubmitP">Submit</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                        </div>
        </div>
        <script src="script.js"></script>
    </body>

