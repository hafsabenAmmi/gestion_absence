<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    // gestion des erreurs
    $err = [];
    if (!isset($login) || empty($login)) $err["login"] = "veuillez entrez un nom d'utilisateur";
    if (!isset($mdp) || empty($mdp)) $err["mdp"] = "veuillez entrez un mot de passe";
    if (empty($err)) {
        // lecture du fichier et verification de l'existance du login et mot de passe
        $users = file("users.txt" . FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) { // $user est une ligne du fichier "login||mdp"
            $l = explode("|||", $user); // $l = [login, mdp]
            if ($l[0] == $login && $l[1] == $mdp) {
                header("Location: acceuil.php");
                exit;
            } else {
                $err["con"] = "Nom utilisateur ou mot de passe errones.. essayez a nouveau !";
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
    <title>Login</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>Connexion</legend>
            <?php if (isset($err["con"])) echo "<div style='color: red'>" . $err['con'] . "</div>"; ?>
            <?php if (isset($err["login"])) echo "<div style='color: red'>" . $err['login'] . "</div>"; ?>
            <label for="">Nom d'utilisateur :</label>
            <input type="text" name="login"><br>
            <?php if (isset($err["mdp"])) echo "<div style='color: red'>" . $err['mdp'] . "</div>"; ?>
            <label for="">Mot de passe :</label>
            <input type="password" name="mdp">
            <input type="submit" value="Ouvrir une session"></input>
        </fieldset>
    </form>
</body>

</html>