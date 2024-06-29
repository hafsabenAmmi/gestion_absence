<?php 
#Script connexion a la BD 
try{
    $con = new PDO("mysql:host=localhost;dbname=ismontic_db","root","");
}
catch(PDOException $e){
    echo"Erreur de connexion a la BD :". $e->getMessage();
}



?>