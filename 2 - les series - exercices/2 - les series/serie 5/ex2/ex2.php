<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // verification des champs => gestion des erreurs
    $err = [];
    if (!isset($civilite) || empty($civilite)) {
        $err["civilite"] = "veuillez entrer la civilite";
    }
    if (!ctype_alpha($nom)) {
        $err["nom"] = "le nom doit contenir que les lettres";
    }
    if (!isset($nom) || empty($nom)) {
        $err["nom"] = "veuillez entrer le nom";
    }
    if (!ctype_alpha($prenom)) {
        $err["prenom"] = "le prenom doit contenir que les lettres";
    }
    if (!isset($prenom) || empty($prenom)) {
        $err["prenom"] = "veuillez entrer le prenom";
    }
    if (!filter_var($email . FILTER_VALIDATE_EMAIL)) {
        $err["mail"] = "Email invalide";
    }
    if (!isset($email) || empty($email)) {
        $err["email"] = "veuillez entrer le email";
    }
    if (!isset($password) || empty($password)) {
        $err["mdps"] = "veuillez entrer le mot de passe";
    }
    if ($password != $confirm_password) {
        $err["mdps"] = "les mots de passe ne sont pas identiques";
    }
    if (!isset($confirm_password) || empty($confirm_password)) {
        $err["cmdp"] = "veuillez confirmer le mot de passe";
    }
    if (empty($err)) {
        // 2 - nettoyer les donnees
        htmlspecialchars($nom);
        htmlspecialchars($prenom);
        htmlspecialchars($email);
        htmlspecialchars($password);

        $password = hash("md5", $password); // hash une fonction pour chiffrer une chaine des caracteres

        // 3 - enregistrement dans le fichier 
        $r = file_put_contents("utilisateurs.txt", "$civilite|||$nom|||$prenom|||$email|||$password", FILE_APPEND | LOCK_EX);
        if ($r != false) {
            echo "<script>alert('l'utilisateur bien enregistrer')</script>";
        } else {
            echo "<script>alert('l'utilisateur n'est pas bien enregistrer')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>
                Inscription
            </legend>
            <label for="civilite">Civilité:</label>
            <select name="civilite" id="civilite">
                <option value="Mlle">Mlle</option>
                <option value="Mme">Mme</option>
                <option value="M">M</option>
            </select><br><br>
            <?php if (isset($err["civilite"])) echo "<p style='color:red'>" . $err['civilite'] . "</p>"; ?>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom"><br><br>
            <?php if (isset($err["nom"])) echo "<p style='color:red'>" . $err['nom'] . "</p>"; ?>
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom"><br><br>
            <?php if (isset($err["prenom"])) echo "<p style='color:red'>" . $err['prenom'] . "</p>"; ?>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"><br><br>
            <?php if (isset($err["email"])) echo "<p style='color:red'>" . $err['email'] . "</p>"; ?>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password"><br><br>
            <?php if (isset($err["password"])) echo "<p style='color:red'>" . $err['password'] . "</p>"; ?>
            <label for="confirm_password">Confirmation du mot de passe:</label>
            <input type="password" name="confirm_password" id="confirm_password"><br><br>
            <?php if (isset($err["confirmation_password"])) echo "<p style='color:red'>" . $err['confirmation_password'] . "</p>"; ?>
            <input type="submit" value="Envoyer">
        </fieldset>
    </form>

    <?php echo "le nombre des inscrest est: " . count(file("utilisateurs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)); ?>
</body>

</html>