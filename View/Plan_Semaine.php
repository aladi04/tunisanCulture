<?php 
    include '../Model/Utils.php';

    // Fetch plans with simplified information
    $Plans = GetAllPlanSimplifer(); 

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['destination'])) {
        $selectedDestinations = $_POST['destination'];

        // Update the database for each selected plan
        foreach ($selectedDestinations as $planId) {
            SetPlanOfTheWeek($planId); // Call function to set IS_PLAN_OF_THE_WEEK to 1
        }

        // Optionally, you can redirect to the same page to refresh the state
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Function to update the IS_PLAN_OF_THE_WEEK field in the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Plans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .checkbox-container {
            text-align: center;
        }

        .submit-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; padding: 20px;">Destination Plans</h1>
    
    <!-- Form to submit the selected destinations -->
    <form method="POST">
        <table>
            <thead>
                <tr>
                    <th>Destination</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Plans as $plan): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($plan['des_destination']); ?></td> <!-- Assuming the destination field is 'des_destination' -->
                        <td class="checkbox-container">
                            <input type="checkbox" name="destination[]" value="<?php echo $plan['ID_VOYAGE']; ?>" <?php echo ($plan['IS_PLAN_OF_THE_WEEK'] == 1) ? 'checked' : ''; ?>> <!-- Pre-check if it's already 'Plan of the Week' -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Submit button to update the selected destinations -->
        <div style="text-align: center;">
            <button type="submit" class="submit-btn">Update Plan of the Week</button>
        </div>
    </form>
</body>
</html>
