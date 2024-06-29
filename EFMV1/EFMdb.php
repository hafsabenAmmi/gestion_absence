<?php
try{
    $con=new PDO("mysql:host=localhost:3307;dbname=gestionstagiaire_v1;charset=UTF8","root","");
}catch(PDOException $e){
    echo"errur de conection avec la base de donné".$e->getMessage();
}
?>