<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation de Voyage</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <header>
    <h1>Confirmation de votre voyage</h1>
  </header>
  <main class="confirmation">
    <p id="confirmation-text"></p>
    <button class="transport-btn" onclick="goBack()">Retour</button>
  </main>
  <script>
    // Retrieve the destination and price from local storage
    const destination = localStorage.getItem('destination');
    const price = localStorage.getItem('price');

    const confirmationText = document.getElementById('confirmation-text');
    confirmationText.textContent = `Vous avez choisi ${destination} pour ${price} DT. Bon voyage !`;

    function goBack() {
      window.location.href = "index.html"; // Go back to the main page
    }
  </script>
</body>
</html>