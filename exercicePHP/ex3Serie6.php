<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de coordonnées personnelles</title>
</head>

<body>
    <h2>Formulaire de coordonnées personnelles</h2>
    <form action="traitement.php" method="POST">
        <fieldset>
            <legend>Inscription</legend>
            <?php  ?>
            Nom complet:
            <input type="text" name="nom_complet" id="nom_complet"><br><br>
            <?php ?>
            Email:
            <input type="email" name="email" id="email"><br><br>
            <?php ?>
            Téléphone:
            <input type="text" name="telephone" id="telephone" pattern="(0[5-6])[0-9]{8}"><br><br>
            <?php ?>
            Adresse:
            <input type="text" name="adresse" id="adresse"><br><br>
            <?php ?>
            Code postal:
            <input type="text" name="code_postal" id="code_postal" pattern="[0-9]{5}"><br><br>
            <?php ?>
            <input type="submit" value="Envoyer" name="ven">

        </fieldset>

    </form>
</body>

</html>