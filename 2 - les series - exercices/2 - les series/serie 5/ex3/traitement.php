<?php
// to search for: 

// preg_match()
// preg_quote()
// preg_match_all()
// preg_split()
// preg_filter()
// preg_replace() preg_replace_callback() preg_replace_callback_array()

// 1 - verification des donnees / gestion des erreurs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $err = [];
    if (!isset($nom) || empty($nom))  $err['nom'] = "veuillez entrer le nom complet";
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) $err['mail'] = "email invalide";
    if (!isset($mail) || empty($mail))  $err['mail'] = "veuillez entrer un mail";
    // validation du telephone sous cetter forme 06|05 xx xx xx xx
    if (!preg_match("/^(06|05)(\s[0-9]{2}){4}$/", $tel)) $err['tel'] = "numero doit etre conforme a cette forme (06|05) xx xx xx xx";
    if (!isset($tel) || empty($tel)) $err['tel'] = "veuillez entrer un numero de telephone";
    if (!isset($ad) || empty($ad)) $err['ad'] = "veuillez entrer un numero de telephone";
    if (!ctype_digit($cp) || strlen($cp) != 5) $err['cp'] = "le code postale doit contenir exactement 5 chiffres";
    if (!isset($cp) || empty($cp)) $err['cp'] = "veuillez entrer le code postal";
    if (empty($err)) {
        htmlspecialchars($nom);
        htmlspecialchars($mail);
        htmlspecialchars($tel);
        htmlspecialchars($ad);
        htmlspecialchars($cp);
        // filter_var($nom, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
        // pour nettoyer les donnees entres des caracteres speciaux 
        // pour eviter les attaques XSS

        // 2 - afficher dans un tableau
        echo "<table border='1'><tr><th>Nom complet</th><th>Email</th><th>Telephone</th><th>Code postal</th>";
        echo "<tr><td>$nom</td><td>$mail</td><td>$tel</td><td>$ad</td><td>$cp</td></tr></table>";
    } else {
        // $err = implode("<br>", $err); # transformation du tableau $err en une chaine pour le passer dans l'URL
        // header("Location: formulaire.php"); // valable si la variable a transferer a travers le lien est scalaire
        // si la variable a transferer a travers le lien est un tableau 
        $erreur =  http_build_query(['msgerr' => $err]);
        header("Location: formulaire.php?$erreur");
        exit;
    }
}
