<?php

try{
    $con= new PDO("mysql:host=localhost;dbname=projet_php;charset=Utf8","root","");
}catch(PDOException $e){
    echo"erreur de connexion a la BD:".$e->getMessage();
}

?>