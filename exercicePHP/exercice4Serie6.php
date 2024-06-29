<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>page d'authentification</title>
</head>

<body>
    <h2>Page de Connexion</h2>

    <form method="POST" action="">
        <fieldset>
            <legend>Connexion</legend>

            <?php if(isset($err["login"])) echo "<div style='color:red'".$err["con"]."</div>";?>

            nom d'utilisateur: <input type="text" id="login" name="login"><br><br>

            <?php if(isset($err["mdp"])) echo "<div style='color:red'".$err["con"]."</div>";?>
            Mot de passe :
            <input type="password" id="mdp" name="mdp"><br><br>
            <input type="submit" value="Se connecter" name="env">
        </fieldset>
    </form>
</body>

</html>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);
#la geestion d'erreurs
$err=[];
if(!isset($login) && empty($login)) $err["login"]="ntrey un nom d'utilisateure";
if(!isset($mdp) && empty($mdp)) $err["mdp"]="ntrey un mot de passe";
if(empty($err)){
    #lecture du fichier et verification de l'exestance du login et mot de passe
    $Users=file("users.txt",FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
    foreach($users as $user)#user est une ligne du fichier login | mot de passe
    $l=explode("|||",$user);
    if($l[0] ==$login && $l[1]== $mdp){
        header("Location: acceuil.php"); #pour allez a la page acceuil.php 
        exit();
    }else{
        $err["con"]="nom ou mot de passe incorrect";
    }
    
}

}
    
    
    
    
?>