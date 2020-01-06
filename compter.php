<?php

// script de connexion
require('connexion_db.php');
   
   $data    = array();

   
   // Retrieve the posted data
   $json            =  file_get_contents('php://input');
   $obj             =  json_decode($json);
   $req             =  strip_tags($obj->requete);
   $id_expresso     =  strip_tags($obj->id_expresso);

   // DETERMINE LA CIBLE DE LA REQUETE
switch($req)
{
    
case "partage":
        try {
            $sql 	= "UPDATE tb_expresso SET nombre_partage = nombre_partage + 1 WHERE id_expresso = :id";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute(array('id'=> $id_expresso));
            echo json_encode(array('code'=> 1,'message'=>'succes comptage partage' ));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    break;
    
case "lecture":
        try {
            $sql 	= "UPDATE tb_expresso SET nombre_lecture = nombre_lecture + 1 WHERE id_expresso = :id";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute(array('id'=> $id_expresso));
            echo json_encode(array('code'=> 1,'message'=>'succes comptage lecture' ));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    break;
}

?>