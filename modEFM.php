<?php
session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: authentifier.php");
    exit;
}
include("cnxbd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['idet'])){
        extract($_GET);
        extract($_POST);
        try {
            $req = $con->prepare("UPDATE  stagiaire SET nom=?, prenom=?, dateNaissance=?,  idFiliere=?  WHERE idstagiaire=?");
            $req->execute([$nom, $prenom, $dateN,$filiere , $idet]);
            header("location:espaceprivee.php?msg1=stagiaire modifier");
            exit;
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}
if (isset($_GET['idet'])){
    try{
        $req = $con->prepare("SELECT * FROM stagiaire where idstagiaire=?");
        $req->execute([$_GET['idet']]);
        $stgs = $req->fetch(PDO::FETCH_ASSOC);


    }catch (PDOException $e) {
            echo "Erreur de selection : " . $e->getMessage();
        }}
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
            <h2>Modifier</h2>
            Nom <br> <input type="text" name="nom" value="<?php echo  $stgs['nom']?>"><br>
            Prenom <br> <input type="text" name="prenom" value="<?php echo  $stgs['prenom']?>"><br>
            Date Naissance <br> <input type="date" name="dateN" value="<?php echo  $stgs['dateNaissance']?>"><br>
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
            <button type="submit" name="Mod">Modifier</button>
        </fieldset>
    </form>
</body>

</html>