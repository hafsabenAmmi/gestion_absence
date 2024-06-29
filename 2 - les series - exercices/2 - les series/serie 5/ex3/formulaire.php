<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de coordonnées personnelles</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            width: 500px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form action="traitement.php" method="POST">
        <fieldset>
            <legend>Inscription: </legend>
            <?php if (isset($_GET["msgerr"]["nom"])) echo "<div> style='color: red'>" . $_GET['msgerr']['nom'] . "</div>;" ?>
            <label>Nom complet:</label>
            <input type="text" name="nom">
            <?php if (isset($_GET["msgerr"]["mail"])) echo "<div> style='color: red'>" . $_GET['msgerr']['mail'] . "</div>;" ?>
            <label>Email:</label>
            <input type="email" name="mail">
            <?php if (isset($_GET["msgerr"]["tel"])) echo "<div> style='color: red'>" . $_GET['msgerr']['tel'] . "</div>;" ?>
            <label>Téléphone:</label>
            <input type="text" name="tel">
            <?php if (isset($_GET["msgerr"]["ad"])) echo "<div> style='color: red'>" . $_GET['msgerr']['ad'] . "</div>;" ?>
            <label>Adresse: </label>
            <input type="text" name="ad">
            <?php if (isset($_GET["msgerr"]["cp"])) echo "<div> style='color: red'>" . $_GET['msgerr']['cp'] . "</div>;" ?>
            <label>Code postal:</label>
            <input type="number" name="cp" min="1000" max="9999"><br>
            <input type="submit" name="env" value="Envoyer">
        </fieldset>
    </form>
</body>

</html>