<?php
session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: authentifier.php");
    exit;
}
include("cnxbd.php");
if(isset($_GET["idet"])){
    extract($_GET);
    try{
        $req = $con ->prepare("DELETE FROM stagiaire WHERE idstagiaire =?");
        $req ->execute([$idet]);
        header("Location: espaceprivee.php");
        exit;      
    }
    catch(PDOException $e){
        echo "Erreur de suppression: " . $e->getMessage();
    }
}
?>