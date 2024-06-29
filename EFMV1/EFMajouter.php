<?php  
include('EFMdb.php');
session_start();

if (!isset($_SESSION)||empty($_SESSION)){
    header("Location: EFMauth.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        move_uploaded_file($_FILES["img"]["tmp_name"], ".\\images_V1\\".$_FILES['img']['name']);
        try {
            $ajout = $con->prepare("INSERT INTO stagiaire (nom, prenom, dateNaissance, photoProfil, idFiliere) VALUES (?, ?, ?, ?, ?)");
            $ajout->execute([$_POST['nome'], $_POST['prénom'], $_POST['date'], ".\\images_V1\\".$_FILES['img']['name'], $_POST['filier']]);
            header("location:EFMaccueil.php?msg1=stagiaire bien inséré?");
            exit;
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    } catch (PDOException $e) {
        echo 'Erreur d\'insertion des données : ' . $e->getMessage();
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
    <a href="EFMaccueil.php"> <img src="images_V1/back.png" width="12px" alt=""> retour</a>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>ajouter un stagiaire</legend>
            nom: <input type="text" name="nome"><br>
            prénom: <input type="text" name="prénom"><br>
            date de naissance: <input type="date" name="date"><br>
            photo: <input type="file" name="img"><br>
            filière :
            <select name="filier" id="">
                <?php 
                try {
                    $req = $con->prepare("SELECT * FROM  filiere ");
                    $req->execute();
                    $filliers = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filliers as $fill) {
                        $institute = $fill['intitule'];
                        $id = $fill['idFiliere'];
                        echo "<option value='$id'>$institute</option>";
                    }
                } catch (PDOException $e) {
                    echo 'Erreur de sélection des filières : ' . $e->getMessage();
                }
                ?>
            </select><br>
            <input type="submit" name="aj" value="Ajouter">
        </fieldset>
    </form>
</body>

</html>