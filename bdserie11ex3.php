<?php


### la base de donne de la page de cookies serie 11 ex3




#creation d'une connexion  avec la base de donnees => creation d'un objet de la classe pdo
try{
    $con= new PDO("mysql:host=localhost;dbname=dbserie11EX3;charset=Utf8","root","");
}catch(PDOException $e){
    echo"erreur de connexion a la BD:".$e->getMessage();
}

?>