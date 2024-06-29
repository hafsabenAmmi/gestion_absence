<?php
session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location:EFMauth.php");
    exit;
}
echo "bienvenue" . $_session["nom_user"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="submit" name="ajt" value="ajouter"><br>
    <input type="text" name="nom"><br>
    <input type="text" name="prenom"><br>
    <input type="date" name="dateN"><br>

    feliere : <select name="fel">
        <?php
        try {
            $req = $con->prepare(" SELECT idstagiaire FROM stagiaire ");
            $req->execute([$idstagiaire]);
            $tab_fel = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de selection feliere : " . $e->getMessage();
        }
        ?>
    </select><br>
    Image : <input type="file" name="img"><br>
    <input type="submit" name="aj" value="ajouter">




</body>

</html>