<?php

// script de connexion
require('connexion_db.php');
   
   $data    = array();

   
   // Retrieve the posted data
   $json            =  file_get_contents('php://input');
   $obj             =  json_decode($json);
   $req             =  strip_tags($obj->requete);
   $idCategorie     =  strip_tags($obj->idCategorie);

   
switch($req) // DETERMINE LA CIBLE DE LA REQUETE
{
    // REQUETE SUR LES EXPRESSO
case "expresso":


   if($idCategorie == -1) // TOUTE LES CATEGORIE EN DESORDRE
   {
        try {
            $sql 	= "SELECT * FROM tb_expresso exp JOIN tb_categorie cat ON exp.id_categorie = cat.id_categorie";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute();
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $keywords = [] ;
                $sql2 	= "SELECT titre_keyword FROM tb_keyword JOIN tb_expresso_keyword expKey ON tb_keyword.id_keyword = expKey.id_keyword WHERE expKey.id_expresso =  :id";
                $stmt2 	=	$pdo->prepare($sql2);
                $stmt2->execute(array('id'=> $row['id_expresso']));
                while($row2  = $stmt2->fetch(PDO::FETCH_ASSOC))
                {
                    $keywords[] = $row2['titre_keyword'];
                }
                
                // Assign each row of data to associative array
                $data[] = array(
                            'id_expresso'=>$row['id_expresso'],
                            'titre_expresso'=>$row['titre_expresso'],
                            'id_categorie'=>$row['id_categorie'],
                            'titre_categorie'=>$row['titre_categorie'],
                            'description_expresso'=>$row['description_expresso'],
                            'fichier_expresso'=>$row['fichier_expresso'],
                            'dateAjout_expresso'=>$row['dateAjout_expresso'],
                            'nombre_partage'=>$row['nombre_partage'],
                            'keywords'=> $keywords
                );
            }
            // Return data as JSON
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    else if($idCategorie == -2) // ORDER BY NBRE PARTAGE DESC
   {
        try {
            $sql 	= "SELECT * FROM tb_expresso exp JOIN tb_categorie cat ON exp.id_categorie = cat.id_categorie ORDER BY nombre_partage DESC";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute();
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $keywords = [] ;
                $sql2 	= "SELECT titre_keyword FROM tb_keyword JOIN tb_expresso_keyword expKey ON tb_keyword.id_keyword = expKey.id_keyword WHERE expKey.id_expresso =  :id";
                $stmt2 	=	$pdo->prepare($sql2);
                $stmt2->execute(array('id'=> $row['id_expresso']));
                while($row2  = $stmt2->fetch(PDO::FETCH_ASSOC))
                {
                    $keywords[] = $row2['titre_keyword'];
                }
                
                // Assign each row of data to associative array
                $data[] = array(
                            'id_expresso'=>$row['id_expresso'],
                            'titre_expresso'=>$row['titre_expresso'],
                            'id_categorie'=>$row['id_categorie'],
                            'titre_categorie'=>$row['titre_categorie'],
                            'description_expresso'=>$row['description_expresso'],
                            'fichier_expresso'=>$row['fichier_expresso'],
                            'dateAjout_expresso'=>$row['dateAjout_expresso'],
                            'nombre_partage'=>$row['nombre_partage'],
                            'keywords'=> $keywords
                );
            }
            // Return data as JSON
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    else if($idCategorie == -3) // ORDER BY DATE AJOUT DESC
   {
        try {
            $sql 	= "SELECT * FROM tb_expresso exp JOIN tb_categorie cat ON exp.id_categorie = cat.id_categorie ORDER BY dateAjout_expresso DESC";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute();
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $keywords = [] ;
                $sql2 	= "SELECT titre_keyword FROM tb_keyword JOIN tb_expresso_keyword expKey ON tb_keyword.id_keyword = expKey.id_keyword WHERE expKey.id_expresso =  :id";
                $stmt2 	=	$pdo->prepare($sql2);
                $stmt2->execute(array('id'=> $row['id_expresso']));
                while($row2  = $stmt2->fetch(PDO::FETCH_ASSOC))
                {
                    $keywords[] = $row2['titre_keyword'];
                }
                
                // Assign each row of data to associative array
                $data[] = array(
                            'id_expresso'=>$row['id_expresso'],
                            'titre_expresso'=>$row['titre_expresso'],
                            'id_categorie'=>$row['id_categorie'],
                            'titre_categorie'=>$row['titre_categorie'],
                            'description_expresso'=>$row['description_expresso'],
                            'fichier_expresso'=>$row['fichier_expresso'],
                            'dateAjout_expresso'=>$row['dateAjout_expresso'],
                            'nombre_partage'=>$row['nombre_partage'],
                            'keywords'=> $keywords
                );
            }
            // Return data as JSON
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    else {
        // Attempt to query database table and retrieve data
        try {
            $sql 	= "SELECT * FROM tb_expresso exp JOIN tb_categorie cat ON exp.id_categorie = cat.id_categorie WHERE cat.id_categorie =  :id";
            $stmt 	=	$pdo->prepare($sql);
            $stmt->execute(array('id'=> $idCategorie));
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $keywords = [] ;
                $sql2 	= "SELECT titre_keyword FROM tb_keyword JOIN tb_expresso_keyword expKey ON tb_keyword.id_keyword = expKey.id_keyword WHERE expKey.id_expresso =  :id";
                $stmt2 	=	$pdo->prepare($sql2);
                $stmt2->execute(array('id'=> $row['id_expresso']));
                while($row2  = $stmt2->fetch(PDO::FETCH_ASSOC))
                {
                    $keywords[] = $row2['titre_keyword'];
                }
                
                // Assign each row of data to associative array
                $data[] = array(
                            'id_expresso'=>$row['id_expresso'],
                            'titre_expresso'=>$row['titre_expresso'],
                            'id_categorie'=>$row['id_categorie'],
                            'titre_categorie'=>$row['titre_categorie'],
                            'description_expresso'=>$row['description_expresso'],
                            'fichier_expresso'=>$row['fichier_expresso'],
                            'dateAjout_expresso'=>$row['dateAjout_expresso'],
                            'nombre_partage'=>$row['nombre_partage'],
                            'keywords'=> $keywords
                );
            }

            // Return data as JSON
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    break;
    
    // REQUETE SUR LES CATEGORIE
case "categorie":
    
    if($idCategorie == -1){
       
        try {
            $sql 	= "SELECT id_categorie, titre_categorie FROM tb_categorie ORDER BY titre_categorie ASC ";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute();
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
            $cat =  $row['id_categorie'];
            
                $sstmt 	= $pdo->prepare("SELECT * FROM tb_expresso WHERE id_categorie = $cat ");
                $sstmt->execute();
                $i = 0;
                while($srow  = $sstmt->fetch(PDO::FETCH_ASSOC))
                { $i++; }
                
                if($i != 0){
                    // Assign each row of data to associative array
                    $data2[] =  array(
                        'id_categorie' => $row['id_categorie'],
                        'titre_categorie' => $row['titre_categorie']
                    );
                }
            }
            // Return data as JSON
            echo json_encode($data2);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
    }
    else{
        
        try {
            $sql 	= "SELECT titre_categorie FROM tb_categorie WHERE id_categorie = :id ";
            $stmt 	= $pdo->prepare($sql);
            $stmt->execute(array('id' =>$idCategorie));
            while($row  = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                // Assign each row of data to associative array
                $data2=  array(
                    'id_categorie'=>$row['id_categorie'],
                    'titre_categorie'=>$row['titre_categorie']
                );
            }
            // Return data as JSON
            echo json_encode($data2);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    break;
}

?>