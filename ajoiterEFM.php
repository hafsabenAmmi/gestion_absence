<?php
session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: authentifier.php");
    exit;
}
include("cnxbd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    if (isset($Ret)) {
        header("Location: espaceprivee.php");
        exit;
    } else {
        if (isset($nom) && !empty($nom) &&
            isset($prenom) && !empty($prenom) &&
            isset($dateN) && !empty($dateN) &&
            isset($filiere) && !empty($filiere)) {
            if (isset($_FILES['pfp']) && $_FILES["pfp"]['error'] == 0) {
                $exts = ["image/jpg", "image/jpeg", "image/jeg", "image/png", "image/tif"];
                if (in_array($_FILES['pfp']['type'], $exts)) {
                    if ($_FILES['pfp']['size'] <= 4000000) {
                        move_uploaded_file($_FILES["pfp"]["tmp_name"], "./images/" . $_FILES['pfp']['name']);
                        $req = $con->prepare("INSERT INTO stagiaire (nom, prenom, dateNaissance, photoProfil, idFiliere) VALUES (?, ?, ?, ?, ?)");
                        $req->execute([$nom, $prenom, $dateN, "./images/" . $_FILES['pfp']['name'], $filiere]);
                        header("Location: espaceprivee.php?msg=stagiaire insere");
                        exit;
                    }
                }
            }
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
    <form method="POST" enctype="multipart/form-data">
        <button type="submit" name="Ret">Retour</button>
        <fieldset>
            <h2>Ajouter un Stagiaire</h2>
            Nom <br> <input type="text" name="nom"><br>
            Prenom <br> <input type="text" name="prenom"><br>
            Date Naissance <br> <input type="date" name="dateN"><br>
            Photo Profil <br> <input type="file" name="pfp"><br>
            Filiere <br> <select name="filiere">
                <?php
                try {
                    $reqi = $con->prepare("SELECT * FROM filiere");
                    $reqi->execute();
                    $fil = $reqi->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($fil as $f) {
                        $id = $f['idFiliere'];
                        $in = $f['intitule'];
                        echo "<option value='$id'>$in</option>";
                    }
                } catch (PDOException $e) {
                    echo 'Erreur de sélection des filières : ' . $e->getMessage();
                }
                ?>
            </select>
            <br>
            <button type="submit" name="Aj">Ajouter</button>

            </select>
        </fieldset>
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data">

        <fieldset>
            <legend>ajouter un stagiaire</legend>

            nom: <input type="text" name="nom"><br>
            prenom: <input type="text" name="prenom"><br>
            dateNaissance: <input type="date" name="date"><br>
            photo profile: <input type="file" name="photo"><br>
            filiere: <select name="filiere">
                <?php
                try{
                    $req=$con->prepare("SELECT * FROM FILIERE ");
                    $req->execute();
                    $teb=$req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tab as $filiere){
                        $id=$filiere["idfiliere"];
                        $it=$filiere["idfiliere"];
                        echo "<option value=$id>$it</option>";
                    }
                    
                }catch(PDOException $e){
                    echo "error de selection de filiere".$e->getMessage();
                }
                ?><br>
                <input type="submit" name="aj"><br>

            </select>
        </fieldset>
    </form>

</body>

</html>