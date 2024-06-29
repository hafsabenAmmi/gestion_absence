<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $err = [];
    if (!isset($civility) || empty($civility)) $err["civ"] = "veuillez entrer la civilité";
    if (ctype_alpha($name)) $err["nom"] = "le nom doit contenir que les lettres";
    if (!isset($name) || empty($name))  $err["nom"] = "veuillez entrer le nom";
    if (ctype_alpha($firstname)) $err["prenom"] = "le prenom doit contenir que les lettres";
    if (!isset($firstname) || empty($firstname))  $err["prenom"] = "veuillez entrer le prenom";        #ctype_alum(),ctype_alpha(),ctype_cntrl("\\"....),ctype_digit(),ctype_graph()
    #ctype_punct,ctype_space()
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) $err["email"] = "email invalide";
    if (!isset($email) || empty($email))  $err["email"] = "veuillez entrer l'email";
    if (!isset($password) || empty($password)) $err["password"] = "veuillez entrer le mot de pass";
    if ($password != $confirm_password) $err["cofirm_password"] = "les mots de pass ne sont pas odentique";
    if (!isset($confirm_password) || empty($confirm_password))  $err["confirm_password"] = "veuillez confirmer le mot de passe";
    if (empty($err)) {
        #2-nettoyer les donnes
        htmlspecialchars($name);
        htmlspecialchars($firstname);
        htmlspecialchars($email);
        htmlspecialchars($password);
        hash("md5", $mdp); #hash une fonction pour chiffrer une chaine des caracteres
        #3-enregistrer dans dans fichier
        $r = file_put_contents(
            "utilisateurs.txt",
            "$civ|||$nom|||$prenom|||$email|||$password",
            FILE_APPEND | LOCK_EX
        );
        if ($r != false)
            echo "<scripT>alert('utilisateur bien enregistrer</scripT>";
        else echo "<scripT>alert('erreur lors de l'enregistrement</scripT>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <form action="inscription.php" method="post">
        <?php if (isset($err["civ"])) echo "<span style='color:red'>$err[civ]</span>"; ?>
        <label for="civility">Civilité:</label>
        <select name="civility" id="civility">
            <option value="Mlle">M</option>
            <option value="Mlle">Mlle</option>
            <option value="Mme">Mme</option>
        </select>
        <br>
        <?php if (isset($err["nom"])) echo "<span style='color:red'>" . $err['nom'] . "</span>"; ?>
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <?php if (isset($err["prenom"])) echo "<span style='color:red'>" . $err['prenom'] . "</span>"; ?>

        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" id="firstname" required>
        <br>
        <?php if (isset($err["email"])) echo "<span style='color:red'>" . $err['email'] . "</span>"; ?>

        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <?php if (isset($err["password"])) echo "<span style='color:red'>" . $err['password'] . "</span>"; ?>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <?php if (isset($err["confirm_password"])) echo "<span style='color:red'>" . $err['confirm_password'] . "</span>"; ?>
        <label for="confirm_password">Confirmation du mot de passe:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <input type="submit" value="Valider l'inscription">
        <?php echo "le nombre des inscrest est: " . count(file("utilisateurs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)); ?>
    </form>
</body>

</html>