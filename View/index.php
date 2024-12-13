<?php 

  include '../Model/Utils.php';

  $destinations = GetDestinationFromDB();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['Action'])){
      if($_POST['Action'] == 'add'){
        AddDestination($_POST);
        Header("Location:index.php");
      }else if($_POST['Action'] == 'delete'){
        DeleteDestination($_POST['id']);
        Header("Location:index.php");
      }else if($_POST['Action'] == 'edit'){
        ModifyDestination($_POST);
        Header("Location:index.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Destinations</title>
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

    .form-container input, .form-container textarea {
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
    <h1>Gestion des Destinations</h1>
  </header>
  <main>
    <div class="form-container">
      <form action="index.php" method="POST">
        <h2>Ajouter ou Modifier une Destination</h2>
        <input type="hidden" name="Action" value="add" id="form-Action">
        <input type="hidden" name="form-Id" value="0" id="form-Id">
        <input type="text" id="form-name" name="des_destination" placeholder="Nom de la destination" required>
        <input type="text" id="form-image" name="Image" placeholder="URL de l'image" required>
        <textarea id="form-description" name="description" placeholder="Description de la destination" rows="4" required></textarea>
        <button onclick="addOrUpdateDestination()" type="submit">Enregistrer</button>
      </form>
    </div>
    <section id="destinations" class="destinations">
      <?php foreach($destinations as $destination):?>
        <div class="destination-card">
          <img src="..\Img\<?php echo($destination['Image']);?>" alt="<?php echo($destination['des_destination']); ?>">
          <h3><?php echo($destination['des_destination']); ?></h3>
          <p><?php echo($destination['description']); ?></p>
          <form action="index.php" method="POST">
            <input type="hidden" name="Action" value="delete">
            <input type="hidden" name="id" value="<?php echo($destination['id_destination']); ?>">
            <button type="submit" class="delete-btn" onclick="deleteDestination(<?php echo($destination['id_destination']); ?>)">Supprimer</button>
            <?php $id = $destination['id_destination'];?>
            <?php $designation =$destination['des_destination']; ?>
            <?php $description=$destination['description'];?>
            <?php $image = $destination['Image'];  ?>
          </form>
          <button class="delete-btn" style="top: 40px; background-color: orange;" 
  onclick="editDestination(
    <?php echo $id; ?>,
    '<?php echo addslashes($designation); ?>',
    '<?php echo addslashes($description); ?>',
    '<?php echo addslashes($image); ?>'
  )">Modifier</button>
        </div>
      <?php endforeach?>
    </section>
  </main>
  <script>
    
    function addOrUpdateDestination() {
      const name = document.getElementById('name').value;
      const image = document.getElementById('image').value;
      const description = document.getElementById('description').value;

      if (!name || !image || !description) {
        alert("Veuillez remplir tous les champs !");
        return;
      }

      if (editingId) {
        const index = destinations.findIndex(dest => dest.id === editingId);
        destinations[index] = { id: editingId, name, image, description };
        editingId = null;
      } else {
        const newDestination = {
          id: Date.now(),
          name,
          image,
          description
        };
        destinations.push(newDestination);
      }

      document.getElementById('name').value = "";
      document.getElementById('image').value = "";
      document.getElementById('description').value = "";
    }

    function editDestination(id, name, description, image) {
      console.log("Edit destination" + id);
      document.getElementById('form-Action').value = "edit";
      document.getElementById('form-name').value = name;
      document.getElementById('form-image').value = image;
      document.getElementById('form-description').value = description;
      document.getElementById('form-Id').value = id;  // Corrected this line
    }
  </script>
</body>
</html>