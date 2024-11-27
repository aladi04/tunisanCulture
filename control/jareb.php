<?php
include "../model/user.php";  // Include the user class

// Initialize $users to an empty array to avoid errors
$users = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Instantiate the User class only once
    $userClass = new User();
    $users = $userClass->showUser();
    if (isset($_POST['submitU'])) {
        $result = $userClass->updatePassword($_POST["emailU"], $_POST["passwordU"]);
        
    } elseif (isset($_POST['submitR'])) {
        // Call the deleteUser method to remove the user by email
        $res =$userClass->deleteUser($_POST["emailR"]);
        echo $res;
    }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard</title>
  <link rel="stylesheet" href="../view/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav>
    
    <label class="logo">User Dashboard</label>
    <ul>
      <li><a class="active" href="#home">Home</a></li>
      <li><a href="#users">Users</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#feedback">Feedback</a></li>
    </ul>
  </nav>

  <!-- Users Section -->
  <section id="users">
    <div class="container">

    <h2>List of Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>           
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td> <!-- Assuming you have a role field -->
                    </tr>
                <?php endforeach; ?>
           
        </tbody>
    </table>


      <!-- Form for Remove -->
      <form action="jareb.php" method="POST" class="hidden" id="remove-form">
        <h3>Remove User</h3>
        <input type="hidden" name="action" value="remove"> <!-- Action Identifier -->
        <input type="email" name="emailR" placeholder="Enter email" required>
        <input type="password" name="passwordR" placeholder="Enter password" required>
        <button type="submit" name="submitR">Submit</button>
      </form>

      <!-- Form for Update -->
      <form action="jareb.php" method="POST" class="hidden" id="update-form">
        <h3>Update User</h3>
        <input type="hidden" name="action" value="update"> <!-- Action Identifier -->
        <input type="email" name="emailU" placeholder="Enter email" required>
        <input type="password" name="passwordU" placeholder="Enter password" required>
        <button type="submit" name="submitU">Submit</button>
      </form>

      <!-- Buttons to Show Forms -->
      <button class="action-btn" onclick="toggleForm('remove-form')">Remove</button>
      <button class="action-btn" onclick="toggleForm('update-form')">Update</button>
    </div>
  </section>

  <!-- JavaScript -->
  <script src="../view/dashboard.js"></script>
</body>
</html>
