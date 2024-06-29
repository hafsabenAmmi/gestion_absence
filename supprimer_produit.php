<?php

session_start();
if(!isset($_SESSION) || empty($_SESSION)){
  header("Location:authproduit.php");
  exit;
}


include("bdproduit.php");
#verifier lexistance de ID
if (isset($_GET["ID"])) {
    //hia nafsoha li kanktboha hna ID
    //  <a href='supprimer_produit.php?ID=" . $prod['Reference'] . "'>SUPPRIMER</a>
    extract($_GET);
    try {
        $reqd = $con->prepare("DELETE FROM produit WHERE Reference =?");
        $reqd->execute([$ID]);
        header("Location: list_produit.php?msg=produit bien supprimé");
        exit;
    } catch (PDOException $e){ 
        echo "erreur de suppression : " . $e->getMessage();
    }
}