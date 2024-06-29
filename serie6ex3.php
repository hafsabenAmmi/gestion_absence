<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de coordonnées personnelles</title>
</head>

<body>
    <h2>Formulaire de coordonnées personnelles</h2>
    <form action="traitement.php" method="post">
        <label for="nom_complet">Nom complet:</label>
        <input type="text" name="nom_complet" id="nom_complet" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" id="telephone" pattern="(0[5-6])[0-9]{8}" placeholder="Ex: 0600000000"
            required><br><br>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required><br><br>
        <label for="code_postal">Code postal:</label>
        <input type="text" name="code_postal" id="code_postal" pattern="[0-9]{5}" required><br><br>
        <input type="submit" value="Valider">
    </form>
</body>

</html>

<?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si tous les champs sont renseignés
        if (isset($_POST['nom_complet']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['code_postal'])) {
            // Nettoyer les données
            $nom_complet = filter_var($_POST['nom_complet'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $telephone = $_POST['telephone'];
            $adresse = filter_var($_POST['adresse'], FILTER_SANITIZE_SPECIAL_CHARS);
            $code_postal = $_POST['code_postal'];

            // Vérifier si les contraintes sont respectées
            if ($email === false) {
                echo "L'adresse email est invalide.<br>";
            } elseif (!preg_match("/^(0[5-6])[0-9]{8}$/", $telephone)) {
                echo "Le numéro de téléphone est invalide.<br>";
            } elseif (!preg_match("/^[0-9]{5}$/", $code_postal)) {
                echo "Le code postal est invalide.<br>";
            } else {
                // Afficher les données dans un tableau HTML
                echo "<table border='1'>";
                echo "<tr><td>Nom complet</td><td>$nom_complet</td></tr>";
                echo "<tr><td>Email</td><td>$email</td></tr>";
                echo "<tr><td>Téléphone</td><td>$telephone</td></tr>";
                echo "<tr><td>Adresse</td><td>$adresse</td></tr>";
                echo "<tr><td>Code postal</td><td>$code_postal</td></tr>";
                echo "</table>";
            }
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }
    ?>