<?php 
session_start();
if(!isset($_SESSION) || empty($_SESSION)){
  header("Location:authproduit.php");
  exit;
}


include("bdproduit.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  extract($_POST);
  if(isset($ref) && !empty($ref) &&
  isset($lib) && !empty($lib) &&
  isset($prx) && !empty($prx) &&
  isset($da) && !empty($da) &&
  isset($qte) && !empty($qte) &&
  isset($cat) && !empty($cat)){
    #traitement de l'image 
    #Verifier si le fichier existe et sans erreur 
    # pour l'image toujours verifiez : existe + taille +type
    if(isset($_FILES) && $_FILES["img"]["error"] ==0){
      #verifier le type de fichier
      $exts =["image/jpg","image/jpeg","image/png","image/gif","image/svg","image/jfif"];
      if(in_array($_FILES["img"]["type"],$exts)){
        #verifier la taille du fichier
        if($_FILES["img"]["size"] < 40000000){ // 40000000 c'est-a-dire 40 Mo
          move_uploaded_file($_FILES['img']["tmp_name"],"./images/".$_FILES["img"]["name"]);
      }
    #Verifier si la reference entrée existe deja 
    try{
     $reqs= $con->prepare("SELECT * FROM produit WHERE Reference =?");
     $reqs->execute([$ref]);
     if($reqs->rowCount()==1){

      $err = "<div style='color:red'>Cette reference existe deja .. entrez une autre reference </div>";
     }
     else{
       #requete d'insertion 
    try{
      $reqi=$con->prepare("INSERT INTO produit(Reference,Libelle,Prix_unitaire,Date_achat,Qte,Image,IDcateg) VALUES (?,?,?,?,?,?,?)");
      $reqi->execute([$ref,$lib,$prx,$da,$qte,".\\images\\".$_FILES['img']['name'],$cat]);
      
      header("Location:list_produit.php?msg=produit bien insere");
      //ou bien ecrire le message dans un script alert 
      echo "<script>alert('produit bien inseré')</script>";

      }
      catch(PDOException $e){
        echo " Erreur d'insertion : ".$e->getMessage();
      }
     }
    }
    catch(PDOException $e){
      echo " Erreur selection reference : ".$e->getMessage();
    }
  }}
}

}

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
    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <fieldset>
            <legend>Ajouter Produit</legend>
            <?php if(isset($err)) echo $err;?>
            Reference : <input type="text" name="ref"><br>
            Libelle : <input type="text" name="lib"><br>
            Prix Unitaire : <input type="text" name="prx"><br>
            Date d'achat : <input type="date" name="da"><br>
            Quantite : <input type="number" name="qte"><br>
            Categorie : <select name="cat">
                <?php 
  try{
    $req = $con->prepare("SELECT Id_categorie,Libelle FROM categorie"); // select *
    $req->execute();
    $tab_cat= $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($tab_cat as $cat){ //$cat est tableau associatif ["Id_categorie"=>1,"Libelle"=>"alimentaire],[]
      echo "<option value='".$cat['Id_categorie']."'>".$cat['Libelle']."</option>"; // etudiez aussi checkbox et radiobutton
     }
    }catch(PDOException $e){
    echo "Erreur de selection categorie : ".$e->getMessage();
  }
  ?>
            </select><br>
            Image : <input type="file" name="img"><br>
            <input type="submit" name="aj" value="ajouter">

        </fieldset>

    </form>

</body>

</html>