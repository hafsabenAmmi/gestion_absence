<?php 
include("bdproduit.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  extract($_POST);
  if(isset($ref) && !empty($ref) &&
  isset($lib) && !empty($lib) &&
  isset($prx) && !empty($prx) &&
  isset($da) && !empty($da) &&
  isset($qte) && !empty($qte) &&
  isset($categ) && !empty($categ)){
       #requete de modifcation 
    if(isset($_GET["ID"])){
        extract($_GET);
        if(isset($_FILES) && $_FILES["img"]["error"] ==0){
          #verifier le type de fichier
          $exts =["image/jpg","image/jpeg","image/png","image/gif","image/svg","image/jfif"];
          if(in_array($_FILES["img"]["type"],$exts)){
            #verifier la taille du fichier
            if($_FILES["img"]["size"] < 40000000){
              move_uploaded_file($_FILES['img']["tmp_name"],"./images/".$_FILES["img"]["name"]);
          }
    try{
      $requ = $con->prepare("UPDATE produit SET Libelle=?,Prix_unitaire=?, Date_achat=?,
      Qte=?, IDcateg=?, Image=? WHERE Reference=?");
      $requ->execute([$lib,$prx,$da,$qte,$categ,".\\images\\".$_FILES["img"]["name"],$ID]);
      header("Location: liste_produit.php?msg=produit bien modifié");
      exit;
      }
      catch(PDOException $e){
        echo " Erreur de modification : ".$e->getMessage();
      }
    }
    }}
  }}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="learning php">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Gestion des produits </title>
</head>

<body>
    <?php
if(isset($_GET["ID"])){
     //  <a href='modifier_produit.php?ID=" . $prod['Reference'] . "'>Modifier</a>
    extract($_GET);
    try{
    $req=$con->prepare("SELECT * FROM produit WHERE Reference = ?");
    $req->execute([$ID]);
    $prod = $req->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo " Erreur d'extraction information produit : ",$e->getMessage();
    }
}
?>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Modifier Produit</legend>
            <?php if(isset($err)) echo $err;?>

            Reference : <input type="text" name="ref" value="<?= $prod["Reference"];?> disabled"><br>
            <?php
           //    prod li hna hia li kayna lfo9 w hna kan3ayto n dak tableau m3a kolacle m3ah
           //    hit f dak tableau stockina ma3lomat d dak ID kamlin
            ?>

            Libelle : <input type="text" name="lib" value="<?= $prod["Libelle"];?>"><br>
            Prix Unitaire : <input type="text" name="prx" value="<?= $prod["Prix_unitaire"];?>"><br>
            Date d'achat : <input type="date" name="da" value="<?= $prod["Date_achat"];?>"><br>
            Quantite : <input type="number" name="qte" value="<?= $prod["Qte"];?>"><br>
            Categorie : <select name="categ">
                <?php 
  try{
    $req = $con->query("SELECT Id_categorie,Libelle FROM categorie");
    $req->execute();
    $tab_cat= $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($tab_cat as $cat){ //$cat est tableau associatif ["Id_categorie"=>1,"Libelle"=>"alimentaire],[]
    if($cat['Id_categorie'] == $prod["IDcateg"]) $s ="SELECTED";
    else $s ="";
    echo "<option value='".$cat['Id_categorie']."' $s >".$cat['Libelle']."</option>";
    // ida kan id dl categorie li ghaytbdl howa id dl categorie li tkhtar khalih selected $s
    
}
 }catch(PDOException $e){
     echo "Erreur de selection categorie : ".$e->getMessage();
     }
    ?>
            </select><br>
            <?php
           //    warning :
           // option de l'image on cree src n'a pas value
           
            ?>

            <img src='<?=$prod["Image"]?>' height="100" width="100"><br>

            Image : <input type="file" name="img"><br>
            <input type="submit" name="mod" value="modifier">

        </fieldset>

    </form>

</body>

</html>