<?php
session_start();
if (!isset($_SESSION)||empty($_SESSION)){
    header("Location: EFMauth.php");
    exit();
}
if(isset($_GET["id"])){
    extract($_GET);
    include("EFMdb.php");
    try{
        $req = $con ->prepare("DELETE FROM stagiaire WHERE idstagiaire =?");
        $req ->execute([$id]);
        header("location: EFMaccueil.php?msg=$login");
        exit;      
    }
    catch(PDOException $e){
        echo "Erreur de suppression: " . $e->getMessage();
    }
}



?>