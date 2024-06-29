<?php
#creation d'une connexion  avec la base de donnees => creation d'un objet de la classe pdo
try{
    $con= new PDO("mysql:host=localhost;dbname=gestion_ex;charset=Utf8","root","");
}catch(PDOException $e){
    echo"erreur de connexion a la BD:".$e->getMessage();
}

?>