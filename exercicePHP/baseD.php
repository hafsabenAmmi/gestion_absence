<?php
#integrer le script de la connexion avec la BD
include("../cours/basedonne.php");
extract($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($dini)) {
    header('Location: list.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($env)) {
    if (!isset($nom) || empty($nom)) {
        $err = "entrez le nom !";
    }
    if (!isset($mail) || empty($mail)) {
        $err = "entrez mail !";
    }
    if (!ctype_alpha($nom)) {
        $err = "invalid nom";
    }
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $err = "invalid email";
    }
    if (empty($err)) {
        $datee = date("Y-m-d");
        #file_put_contents("commentaire.txt","$nom/$mail/$cmt/$datee\n",FILE_APPEND|LOCK_EX);
        try {
            #enregsietrer dans la base donne avec la requete (INSERT)
            $reqi = $con->prepare("INSERT INTO avis (Date,Nom,Email,Commentaire) VALUES (?,?,?,?)"); #reqi -> objet = PDO statement
            $reqi->execute([$datee, $nom, $mail, $cmt]);
            echo "<div style='color:green'>Avis insere</div>";
        } catch (PDOException $e) {
            echo "<div style='color:red'>Avis non insere" . $e->getMessage() . "</div>";
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
    <form method="POST">
        <fieldset>
            <legend>
                Donnez votre avis sur PHP 8 !
            </legend>
            <label for="">Nom : </label>
            <input type="text" name="nom"><br>
            <label for="">Mail : </label>
            <input type="email" name="mail">
            <br><label for="">Vos commentaires sur le site</label><br>
            <textarea name="cmt" id=""></textarea><br>
            <button type="submit" name="env">Envoyer</button>
            <button type="submit" name="dini">Afficher les avis</button>
        </fieldset>
        <span><?php echo $err; ?></span>
    </form>
</body>

</html>