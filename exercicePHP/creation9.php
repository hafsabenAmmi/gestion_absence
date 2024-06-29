<?php
include("serie9BD.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $err = [];
    if (!isset($nom)  || empty($nom)) $err["nom"] = "Veuileez entrer le nom ";
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) $err["email invalid"];### c'est le premier
    if (!isset($email)  || empty($email)) $err["email"] = "Veuileez entrer l'email ";
    ##traitement de l'image
    if(!isset($_FILES["img"]) || $_FILES["img"]["error"]!=0) $err["img"]="entrez une image";
    $ext=["image/png","image/jpg","image/jpeg","image/jfif","image/tiff"];
    if(!in_array($_FILE["TYPE"],$ext)) $err="type invalid";
    if($_FILES["img"]["size"] > 40000000) $err ="la taille est grand";
    if(empty($err)){
        #deplacement des images du dossier tpm au dossier images de l'application
        move_uploaded_file($_FILES["img"]["tmp_name"],'./image/'.$_FILES['img']['name']);
        
    }
    

    if (empty($err)) {
        #la requete d'insertion 
        try {
            $reqi =  $con->prepare("INSERT INTO etudient (nom,email,image) VALUES (?,?,?)");
            $reqi->execute([$nom, $email,'.\\image\\'.$_FILES['img']['name']]);##molahada f execute kan9lbo source n \\
            header("Location:acceuil.php?msg=etudiant bien insere");#ida creina kolchi mzyan kanwjdo had msg bach ndiwah m3aa n page acceuil pour l'affichage

        } catch (PDOException $e) {
            echo " Erreur d'insertion" . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <nav>
        <a href="acceuil.php">acceuil</a>
        <a href="creation.php">cree etudiant</a>
    </nav>

    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>cree un etudiant</legend>
            <?php  if (isset($err['nom'])) echo "<div style='color:red'>" . $err['nom'] . "</div>"; ?>
            nom : <input type="text" name="nom"><br>
            <?php if (isset($err['email'])) echo "<div style='color:red'>" . $err['email'] . "</div>"; ?>
            email :<input type="text" name="email"><br>
            image:<input type="file">

            <input type="submit" name="env" value="cree un etudiant">
        </fieldset>
    </form>

</body>

</html>