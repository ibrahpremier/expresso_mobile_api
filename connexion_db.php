<?php
header("Access-Control-Allow-Origin: *");

   // Define database connection parameters
   $dbUrl   = 'localhost;port=3306'; 
   $un      = 'digital1_ibrahim';
   $pwd     = 'Mysqldatabase1er';
   $db      = 'digital1_expresso';

   // Set up the PDO parameters
   $dsn 	= "mysql:host=" . $dbUrl . ";dbname=" . $db . ";charset=utf8";
   $opt 	= array(
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                       );
   // Create a PDO instance (connect to the database)
   try{
   $pdo 	= new PDO($dsn, $un, $pwd, $opt);
   }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }

?>