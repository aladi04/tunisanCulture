<?php
  include '../config.php';
  function GetDestinationFromDB(){
    $Destination = array();
    $connection = getConnexion();
    $sql = "SELECT * from destination;";
    $result = $connection->prepare($sql);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $Destination[] = $row;
    }
    return $Destination;
  }

  function AddDestination($Data){
    $connection = getConnexion();
    $sql = "INSERT INTO Destination(des_destination,Image,description)
    Values ('".$Data['des_destination']."','".$Data['Image']."','".$Data['description']."');";
    $result = $connection->prepare($sql);
    $result->execute();
  }

  function DeleteDestination($ID){
    $connection = getConnexion();
    $sql = "Delete from destination where id_destination = ".$ID.";";
    $result = $connection->prepare($sql);
    $result->execute();
  }
  
  function ModifyDestination($Data){
    $connection = getConnexion();
    $sql = 'UPDATE destination SET des_destination = "'.$Data["des_destination"].'", Image = "'.$Data["Image"].'", description = "'.$Data["description"].'" WHERE id_destination = '.$Data["form-Id"].';';
    $result = $connection->prepare($sql);
    $result->execute();
  }

  function GetPlanFromDB($ID){
    $Plan = array();  
    $connection = getConnexion();
    $sql = "SELECT ID_VOYAGE,MONUMENT1,MONUMENT2,DES_MONUMENT1,DES_MONUMENT2,RESTAURANT,DES_RESTAURANT,PRIX,DATE_VOYAGE,IMAGE_MONUMENT1,IMAGE_MONUMENT2, IMAGE_RESTAURANT,PLAT,IMAGE_PLAT,HORAIRE,destination.des_destination,destination.Image,mode_transport.DESIGNATION_VEHICULE from plan_voyage INNER JOIN destination on destination.id_destination = plan_voyage.ID_DESTINATION INNER JOIN mode_transport on mode_transport.ID_VEHICULE = plan_voyage.ID_MODE_TRANSPORT WHERE plan_voyage.ID_VOYAGE =".$ID.";";

    $result = $connection->prepare($sql);
    $result->execute();

    if($result->rowCount() > 0){
      $Plan = $result->fetch(PDO::FETCH_ASSOC);
    }
    return $Plan;
  }

  function GetAllDestinationFromDB(){
    $Plan = array();  
    $connection = getConnexion();
    $sql = "SELECT ID_VOYAGE,MONUMENT1,MONUMENT2,DES_MONUMENT1,DES_MONUMENT2,RESTAURANT,DES_RESTAURANT,PRIX,DATE_VOYAGE,IMAGE_MONUMENT1,IMAGE_MONUMENT2, IMAGE_RESTAURANT,PLAT,IMAGE_PLAT,HORAIRE,plan_voyage.ID_MODE_TRANSPORT,destination.des_destination,destination.Image,mode_transport.DESIGNATION_VEHICULE from plan_voyage INNER JOIN destination on destination.id_destination = plan_voyage.ID_DESTINATION INNER JOIN mode_transport on mode_transport.ID_VEHICULE = plan_voyage.ID_MODE_TRANSPORT;";

    $result = $connection->prepare($sql);
    $result->execute();

    if($result->rowCount() > 0){
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $Plan[] = $row;
      }
    }
    return $Plan;
  }

  function AddPlan($Data){
    $connection = getConnexion();
    $sql = "INSERT INTO plan_voyage(ID_DESTINATION,ID_MODE_TRANSPORT,MONUMENT1,DES_MONUMENT1,IMAGE_MONUMENT1,MONUMENT2,DES_MONUMENT2,IMAGE_MONUMENT2,RESTAURANT,DES_RESTAURANT,IMAGE_RESTAURANT,PLAT,IMAGE_PLAT,HORAIRE,PRIX,DATE_VOYAGE)
    VALUES (".$Data['ID_DESTINATION'].",".$Data['ID_MODE_TRANSPORT'].",'".$Data['MONUMENT1']."','".$Data['DES_MONUMENT1']."','".$Data['IMAGE_MONUMENT1']."','".$Data['MONUMENT2']."','".$Data['DES_MONUMENT2']."','".$Data['IMAGE_MONUMENT2']."','".$Data['RESTAURANT']."','".$Data['DES_RESTAURANT']."','".$Data['IMAGE_RESTAURANT']."','".$Data['PLAT']."','".$Data['IMAGE_PLAT']."','".$Data['HORAIRE']."',".$Data['PRIX'].",'".$Data['DATE_VOYAGE']."');";

    $result = $connection->prepare($sql);
    $result->execute();
  }

  function DeletePlan($ID){
    $connection = getConnexion();
    $sql = "Delete from plan_voyage where ID_VOYAGE = ".$ID.";";
    $result = $connection->prepare($sql);
    $result->execute();
  }

  function ModifyPlan($Data) {
    $connection = getConnexion();
    
    // Ensure we are using the correct key for identifying the record (ID_VOYAGE or ID_PLAN_VOYAGE)
    $sql = "UPDATE plan_voyage SET 
            ID_DESTINATION = ".$Data['ID_DESTINATION'].",
            ID_MODE_TRANSPORT = ".$Data['ID_MODE_TRANSPORT'].",
            MONUMENT1 = '".$Data['MONUMENT1']."',
            DES_MONUMENT1 = '".$Data['DES_MONUMENT1']."',
            IMAGE_MONUMENT1 = '".$Data['IMAGE_MONUMENT1']."',
            MONUMENT2 = '".$Data['MONUMENT2']."',
            DES_MONUMENT2 = '".$Data['DES_MONUMENT2']."',
            IMAGE_MONUMENT2 = '".$Data['IMAGE_MONUMENT2']."',
            RESTAURANT = '".$Data['RESTAURANT']."',
            DES_RESTAURANT = '".$Data['DES_RESTAURANT']."',
            IMAGE_RESTAURANT = '".$Data['IMAGE_RESTAURANT']."',
            PLAT = '".$Data['PLAT']."',
            IMAGE_PLAT = '".$Data['IMAGE_PLAT']."',
            HORAIRE = '".$Data['HORAIRE']."',
            PRIX = ".$Data['PRIX'].",
            DATE_VOYAGE = '".$Data['DATE_VOYAGE']."'
            WHERE ID_VOYAGE = ".$Data['ID_VOYAGE'].";";  // Use ID_VOYAGE as key for the update

    $result = $connection->prepare($sql);
    $result->execute();
}

 function GetAllPlanSimplifer(){
  $connection = getConnexion();
  $sql = "SELECT ID_VOYAGE,IS_PLAN_OF_THE_WEEK,plan_voyage.ID_DESTINATION,destination.des_destination 
  FROM plan_voyage INNER JOIN destination ON plan_voyage.ID_DESTINATION = destination.ID_DESTINATION;";

  $result = $connection->prepare($sql);
  $result->execute();
  if($result->rowCount()>0){
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $Plan[] = $row;
    }
  }
  return $Plan;
 }
  function SetPlanOfTheWeek2($planId) {
    // Assuming you have a function to connect to the database
    $conn = getConnexion();

    // Prepare the SQL query to update the field
    $sql = "UPDATE plan_voyage SET IS_PLAN_OF_THE_WEEK = 1 WHERE ID_VOYAGE = ".$planId.";";
    $stmt = $conn->prepare($sql);

    // Execute the query
    if ($stmt->execute()) {
        // Success
        return true;
    } else {
        // Error handling
        return false;
    }
  }

  function SetPlanOfTheWeek($planId) {
    // Assuming you have a function to connect to the database
    $conn = getConnexion();

    // First, check the current value of IS_PLAN_OF_THE_WEEK for the given planId
    $sql = "SELECT IS_PLAN_OF_THE_WEEK FROM plan_voyage WHERE ID_VOYAGE = $planId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Fetch the current status
    $currentStatus = $stmt->fetchColumn();

    // Toggle the value between 0 and 1
    $newStatus = ($currentStatus == 1) ? 0 : 1;

    // Prepare the SQL query to update the field
    $sql = "UPDATE plan_voyage SET IS_PLAN_OF_THE_WEEK = $newStatus WHERE ID_VOYAGE = $planId";
    $stmt = $conn->prepare($sql);

    // Execute the query
    if ($stmt->execute()) {
        // Success
        return true;
    } else {
        // Error handling
        return false;
    }
}


  function GetPlanOftheWeek(){
    $connection = getConnexion();
    $PlanOfTheWeek = array();  // Initialize the array to store the results
    $sql = "SELECT ID_VOYAGE,plan_voyage.ID_DESTINATION,MONUMENT1,MONUMENT2,DES_MONUMENT1,DES_MONUMENT2,RESTAURANT,DES_RESTAURANT,PRIX,DATE_VOYAGE,IMAGE_MONUMENT1,IMAGE_MONUMENT2, IMAGE_RESTAURANT,PLAT,IMAGE_PLAT,HORAIRE,plan_voyage.ID_MODE_TRANSPORT,destination.des_destination,destination.Image,mode_transport.DESIGNATION_VEHICULE from plan_voyage INNER JOIN destination on destination.id_destination = plan_voyage.ID_DESTINATION INNER JOIN mode_transport on mode_transport.ID_VEHICULE = plan_voyage.ID_MODE_TRANSPORT WHERE IS_PLAN_OF_THE_WEEK = 1;";
    $result = $connection->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0){
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $PlanOfTheWeek[] = $row;
      }
    }
    return $PlanOfTheWeek;
  }
?>