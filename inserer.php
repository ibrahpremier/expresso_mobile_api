<?php

 
// script de connexion
require('connexion_db.php');


   // Retrieve the posted data
   $json    =  file_get_contents('php://input');
   $obj     =  json_decode($json);
   $action     =  strip_tags($obj->action);
   $dateHeureToday = date('Y-m-d_H:i:s');


   // Determine which mode is being requested
   switch($action)
   {

      // Add a new record to the technologie table
      case "lire":
         // Attempt to run PDO prepared statement
         try {
            $sql 	= "INSERT INTO tb_lecture (date_lecture, id_expresso, id_user) VALUES(:date, :idExpresso, :id_user)";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute(array('date'=> $dateHeureToday,'idExpresso'=> $obj->idExpresso,'idUser'=> $obj->idUser));

            echo json_encode(array('message' => 'Felicitations the record was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;

      // Update an existing record in the technologie table
      case "partage":
        // Attempt to run PDO prepared statement
        try {
            $sql 	= "INSERT INTO tb_partage (date_partage, id_expresso, id_user) VALUES(:date, :idExpresso, :id_user)";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute(array('date'=> $dateHeureToday,'idExpresso'=> $obj->idExpresso,'idUser'=> $obj->idUser));

            echo json_encode(array('message' => 'Felicitations the record was added to the database'));
        }
        // Catch any errors in running the prepared statement
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
      break;



      // Remove an existing record in the technologie table
      case "delete":

         // Sanitise supplied record ID for matching to table record
         $recordID	=	filter_var($obj->recordID, FILTER_SANITIZE_NUMBER_INT);

         // Attempt to run PDO prepared statement
         try {
            $pdo 	= new PDO($dsn, $un, $pwd);
            $sql 	= "DELETE FROM technologie WHERE id = :recordID";
            $stmt 	= $pdo->prepare($sql);
            $stmt->bindParam(':recordID', $recordID, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode('Felicitations the record ' . $name . ' was removed');
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;
   }

?>