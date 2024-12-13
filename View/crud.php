 <?php 
  include '../Model/Utils.php';

  // Fetch destinations from the database
  $destinations = GetAllDestinationFromDB();

  // Handle form submissions
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['Action'])){
        if($_POST['Action'] == 'edit'){
            ModifyPlan($_POST);
            header("Location:crud.php"); 
            exit();
      } else if($_POST['Action'] == 'delete'){
        DeletePlan($_POST['id']);
        header("Location:crud.php"); 
        exit();
      } else if($_POST['Action'] == 'add'){
        AddPlan($_POST);
        header("Location:crud.php"); 
        exit(); // Stop further execution after redirection 
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Voyages</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    header {
      text-align: center;
      padding: 20px;
      background-color: #4CAF50;
      color: white;
    }

    .form-container {
      margin: 20px auto;
      width: 90%;
      max-width: 600px;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-container input, .form-container textarea, .form-container select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .form-container button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .destinations {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .destination-card {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
    }

    .destination-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .destination-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .destination-card h3 {
      margin: 10px 0;
      font-size: 18px;
      color: #333;
    }

    .destination-card p {
      font-size: 14px;
      color: #555;
      padding: 10px;
    }

    .delete-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: red;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .delete-btn:hover {
      background-color: darkred;
    }
  </style>
</head>
<body>
  <header>
    <h1>Gestion des Voyages</h1>
  </header>
  <main>
    <div class="form-container">
      <form action="crud.php" method="POST">
        <h2>Ajouter ou Modifier un Voyage</h2>
        <input type="hidden" name="Action" value="add" id="form-Action">
        <input type="hidden" name="form-Id" value="0" id="form-Id">

        <!-- Voyage Information -->
        <input type="hidden" id="form-id-voyage" name="ID_VOYAGE" placeholder="ID Voyage" required>
        <input type="hidden" id="form-id-destination" name="ID_DESTINATION" placeholder="ID Destination" value="1" required>
        
        <!-- Monuments -->
        <input type="text" id="form-monument1" name="MONUMENT1" placeholder="Monument 1" required>
        <textarea id="form-des-monument1" name="DES_MONUMENT1" placeholder="Description du Monument 1" rows="4" required></textarea>
        <input type="text" id="form-monument2" name="MONUMENT2" placeholder="Monument 2">
        <textarea id="form-des-monument2" name="DES_MONUMENT2" placeholder="Description du Monument 2" rows="4"></textarea>

        <!-- Restaurant -->
        <input type="text" id="form-restaurant" name="RESTAURANT" placeholder="Restaurant" required>
        <textarea id="form-des-restaurant" name="DES_RESTAURANT" placeholder="Description du Restaurant" rows="4" required></textarea>

        <!-- Transport Mode -->
        <input type="text" id="form-id-mode-transport" name="ID_MODE_TRANSPORT" placeholder="ID Mode Transport" required>

        <!-- Price and Date -->
        <input type="number" id="form-prix" name="PRIX" placeholder="Prix" required>
        <input type="date" id="form-date-voyage" name="DATE_VOYAGE" placeholder="Date du Voyage" required>
        <input type="time" id="form-Horaire-voyage" name="HORAIRE" placeholder="Horaire du Voyage" required>
        <!-- Images -->
        <input type="text" id="form-image-monument1" name="IMAGE_MONUMENT1" placeholder="Image Monument 1" required>
        <input type="text" id="form-image-monument2" name="IMAGE_MONUMENT2" placeholder="Image Monument 2">
        <input type="text" id="form-image-restaurant" name="IMAGE_RESTAURANT" placeholder="Image Restaurant">
        <input type="text" id="form-plat" name="PLAT" placeholder="Plat" required>
        <input type="text" id="form-image-plat" name="IMAGE_PLAT" placeholder="Image Plat">
        
        <button type="submit">Enregistrer</button>
      </form>
    </div>

    <!-- Display Existing Destinations -->
    <section id="destinations" class="destinations">
      <?php foreach($destinations as $destination): ?>
        <div class="destination-card">
          <img src="../Img/<?php echo($destination['IMAGE_MONUMENT1']); ?>" alt="<?php echo($destination['MONUMENT1']); ?>">
          <h3><?php echo($destination['MONUMENT1']); ?></h3>
          <p><?php echo($destination['DES_MONUMENT1']); ?></p>
          
          <form action="crud.php" method="POST">
            <input type="hidden" name="Action" value="delete">
            <input type="hidden" name="id" value="<?php echo($destination['ID_VOYAGE']); ?>">
            <button type="submit" class="delete-btn">Supprimer</button>
          </form>

          <button class="delete-btn" style="top: 40px; background-color: orange;" 
            onclick="editDestination(
              <?php echo $destination['ID_VOYAGE']; ?>,
              '<?php echo addslashes($destination['MONUMENT1']); ?>',
              '<?php echo addslashes($destination['DES_MONUMENT1']); ?>',
              '<?php echo addslashes($destination['MONUMENT2']); ?>',
              '<?php echo addslashes($destination['DES_MONUMENT2']); ?>',
              '<?php echo addslashes($destination['RESTAURANT']); ?>',
              '<?php echo addslashes($destination['DES_RESTAURANT']); ?>',
              '<?php echo addslashes($destination['ID_MODE_TRANSPORT']); ?>',
              '<?php echo $destination['PRIX']; ?>',
              '<?php echo $destination['DATE_VOYAGE']; ?>',
              '<?php echo addslashes($destination['IMAGE_MONUMENT1']); ?>',
              '<?php echo addslashes($destination['IMAGE_MONUMENT2']); ?>',
              '<?php echo addslashes($destination['IMAGE_RESTAURANT']); ?>',
              '<?php echo addslashes($destination['PLAT']); ?>',
              '<?php echo addslashes($destination['IMAGE_PLAT']); ?>',
              '<?php echo addslashes($destination['HORAIRE']); ?>'
            )">Modifier</button>
        </div>
      <?php endforeach; ?>
    </section>
  </main>

  <script>
function editDestination(id, monument1, descriptionMonument1, monument2, descriptionMonument2, restaurant, descriptionRestaurant, transportMode, prix, dateVoyage, imageMonument1, imageMonument2, imageRestaurant, plat, imagePlat,HORAIRE) {
  console.log("EditDestination");
    // Setting action to 'edit'
  document.getElementById('form-Action').value = "edit";
  document.getElementById('form-id-voyage').value = id;
  
  // Setting the correct ID_PLAN_VOYAGE
  document.getElementById('form-id-voyage').value = id;  // Make sure this matches the key in ModifyPlan query
  
  // Setting all the fields
  document.getElementById('form-monument1').value = monument1;
  document.getElementById('form-des-monument1').value = descriptionMonument1;
  document.getElementById('form-monument2').value = monument2;
  document.getElementById('form-des-monument2').value = descriptionMonument2;
  document.getElementById('form-restaurant').value = restaurant;
  document.getElementById('form-des-restaurant').value = descriptionRestaurant;
  document.getElementById('form-id-mode-transport').value = transportMode;
  document.getElementById('form-prix').value = prix;
  document.getElementById('form-date-voyage').value = dateVoyage;
  document.getElementById('form-Horaire-voyage').value = HORAIRE;
  document.getElementById('form-image-monument1').value = imageMonument1;
  document.getElementById('form-image-monument2').value = imageMonument2;
  document.getElementById('form-image-restaurant').value = imageRestaurant;
  document.getElementById('form-plat').value = plat;
  document.getElementById('form-image-plat').value = imagePlat;
}

  </script>
</body>
</html>
