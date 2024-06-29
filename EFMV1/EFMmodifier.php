<?php  
include('EFMdb.php');
session_start();
if (!isset($_SESSION)||empty($_SESSION)){
    header("Location: EFMauth.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id'])){
        extract($_GET);
        try {
            $ajout = $con->prepare("UPDATE  stagiaire SET nom=?, prenom=?, dateNaissance=?,  idFiliere=?  WHERE idstagiaire=?");
            $ajout->execute([$_POST['nome'], $_POST['prénom'], $_POST['date'],$_POST['filier'] , $id]);
            header("location:EFMaccueil.php?msg1=stagiaire bien inséré?");
            exit;
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
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






<?php if (isset($_GET['id'])) {
        try {
            $req=$con->prepare("SELECT * FROM stagiaire where idstagiaire=?");
            $req->execute([$_GET['id']]);
            $stagiaires=$req->fetch(PDO::FETCH_ASSOC);

        }

        catch (PDOException $e) {
            echo "Erreur de selection : ". $e->getMessage();
        }
    }

    ?><form action="" method="post" enctype="multipart/form-data"><a href="EFMaccueil.php"><img
            src="images_V1/back.png" width="12px" alt="">retour</a>
    <fieldset>
        <legend>modifier un stagiaire</legend>nom: <input type="text" name="nome"
            value="<?php echo  $stagiaires['nom']?>"><br>prénom: <input type="text" name="prénom"
            value="<?php echo  $stagiaires['prenom']?>"><br>date de naissance: <input type="date" name="date"
            value="<?php echo  $stagiaires['dateNaissance']?>"><br>filière : <select name="filier">
            <?php try {
        $req=$con->prepare("SELECT * FROM  filiere ");
        $req->execute();
        $filliers=$req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($filliers as $fill) {
            $institute=$fill['intitule'];
            $ids=$fill['idFiliere'];
            if ($id=$stagiaires['idFiliere']) $s="SELECTED";
            else $s="";
            echo "<option value='$ids' $s>$institute</option>";
        }
    }

    catch (PDOException $e) {
        echo 'Erreur de sélection des filières : '. $e->getMessage();
    }

    ?></select><br><input type="submit" value="modifier">
    </fieldset>
</form>
</body>

</html>