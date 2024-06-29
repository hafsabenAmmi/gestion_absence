<?php
try{
 $con = new PDO("mysql:host=localhost;dbname=gestion_produit","root",""); 
}
catch(PDOException $e){
    echo " Erreur de connexion : ".$e->getMessage();
}


?>