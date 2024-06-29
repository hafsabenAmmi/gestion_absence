<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription des visiteurs</title>
</head>

<body>
    <h2>Inscription des visiteurs</h2>
    <form action="inscription.php" method="post">
        <label for="civilite">Civilité:</label>
        <select name="civilite" id="civilite">
            <option value="Mlle">Mlle</option>
            <option value="Mme">Mme</option>
            <option value="M">M</option>
        </select><br><br>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required><br><br>
        <label for="confirmation_mot_de_passe">Confirmation du mot de passe:</label>
        <input type="password" name="confirmation_mot_de_passe" id="confirmation_mot_de_passe" required><br><br>
        <input type="submit" value="Valider l'inscription">
    </form>

    <?php
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $confirmation_mot_de_passe = $_POST['confirmation_mot_de_passe'];

        if ($mot_de_passe !== $confirmation_mot_de_passe) {
            echo "Les mots de passe ne correspondent pas.";
        } else {
          
            $fichier = fopen("utilisateurs.txt", "a");

          
            fwrite($fichier, "$civilite $nom $prenom $email $mot_de_passe\n");

            fclose($fichier);

        
            $nombre_utilisateurs = count(file("utilisateurs.txt"));
            echo "Nombre d'utilisateurs inscrits : $nombre_utilisateurs";
        }
    }
    ?>
</body>

</html>