<?php
    session_start();
    // Correctly retrieve the ID_VOYAGE from the URL
    if (isset($_GET['ID_VOYAGE'])) {
        $ID_VOYAGE =$_GET['ID_VOYAGE'];
    } else {
        exit("ID_VOYAGE invalide.");
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        /* if(!(isset($_POST['address']) && isset($_POST['date']) && isset( $_POST['phone']))){
            exit();
        } */

        $host = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $database = "transport"; 

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $currentDate = date("Y-m-d");
        $sql = "INSERT INTO reservation(ID_VOYAGE, DATE_VOYAGE, NUMERO_TELEPHONE) 
        VALUES('".$ID_VOYAGE."', '$currentDate', '" . $_POST['phone'] . "');";
        echo($sql);
        $result = $conn->query($sql);

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réservation</title>
  <link rel="stylesheet" href="index.css">
  <style>
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .form-container h2 {
      text-align: center;
    }

    .form-container label {
      display: block;
      margin: 10px 0 5px;
    }

    .form-container input,
    .form-container select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-container button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .details {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Réservation pour <span id="destination-name"></span></h1>
  </header>
  <main>
    <section class="form-container">
      <h2>Formulaire de Réservation</h2>
      <form id="reservation-form" action="reservation.php" method="POST">
        <input type="hidden" name="ID_VOYAGE" value="<?php $ID_VOYAGE ?>">

        <label for="address">Votre adresse:</label>
        <input type="text" id="address" name="address" required>

        <label for="date">Date de voyage:</label>
        <input type="date" id="date" name="date" required>

        <label for="phone">Numéro de téléphone:</label>
        <input type="tel" id="phone" name="phone" required>

        <button type="submit">Réserver</button>
      </form>
    </section>
  </main>

  <!-- <script>
    // Récupérer les données de la page précédente
    const destination = localStorage.getItem('destination');
    const price = localStorage.getItem('price');

    // Afficher les informations de réservation
    document.getElementById('destination-name').textContent = destination;
    document.getElementById('destination-name-text').textContent = destination;
    document.getElementById('price-text').textContent = price;

    // Gestion du formulaire de réservation
    document.getElementById('reservation-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const address = document.getElementById('address').value;
      const date = document.getElementById('date').value;
      const phone = document.getElementById('phone').value;

      alert(`Réservation réussie! \nDestination: ${destination} \nPrix: ${price} DT \nAdresse: ${address} \nDate: ${date} \nTéléphone: ${phone}`);
      localStorage.clear();  // Clear data after reservation
    });
  </script> -->
</body>
</html>


