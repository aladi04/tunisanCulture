"<?php
  include "../Model/Utils.php";

  $destinations = array();
  $destinations = GetDestinationFromDB();
  $PlanOftheWeek = GetPlanOftheWeek();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destinations</title>
  <link rel="stylesheet" href="index.css">
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

    .form-container {
      text-align: center;
      margin: 20px;
    }

    .form-container form {
      display: none;
      margin-top: 20px;
    }

    .form-container form.active {
      display: block;
    }

    .form-container select, .form-container button {
      padding: 10px;
      font-size: 16px;
      margin: 10px 0;
    }

    h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <h1>Destinations</h1>
  </header>
  <main>
    <div class="form-container">
      <button id="plan-week-btn">Plan de cette semaine</button>
      <form id="weekly-plan-form">
        <label for="destination-select">Choisissez un plan de la semaine :</label><br>
        <select id="destination-select">
          <?php foreach($PlanOftheWeek as $plan): ?>
            <option value="<?php echo $plan['ID_VOYAGE']; ?>">
              <?php echo $plan['DATE_VOYAGE']; ?> - <?php echo $plan['des_destination']; ?>
            </option>
          <?php endforeach; ?>
        </select><br>
        <button type="button" onclick="submitPlan()">Voir les détails</button>
      </form>
    </div>
    <section id="destinations" class="destinations">
      <?php foreach($destinations as $destination) : ?>
          <div class="destination-card">
            <img src="..\Img\<?php echo($destination['Image']) ?>" alt="<?php echo($destination['des_destination']) ?>">
            <h3><?php echo($destination['des_destination']) ?></h3>
            <p><?php echo($destination['description']) ?></p>
          </div>
          <?php endforeach ?>
    </section>
  </main>
  <script>
    // Toggle the form visibility when the button is clicked
    document.getElementById('plan-week-btn').addEventListener('click', function() {
      var form = document.getElementById('weekly-plan-form');
      form.classList.toggle('active');
    });

    // Submit the form to the plan details page with the selected ID in the URL
    function submitPlan() {
      var selectedPlanId = document.getElementById('destination-select').value;
      window.location.href = 'desone.php?id=' + selectedPlanId;  // Redirect to the plan detail page with the selected ID
    }
  </script>
</body>
</html>

