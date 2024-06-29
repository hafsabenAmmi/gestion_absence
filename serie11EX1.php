<?php 

## DARORI F LOLI BD 9BL COOKIES
include("bdserie11EX1.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
 
    if(isset($login) && !empty($login)  && isset($mdp) && !empty($mdp)){
        # requete de connection
        try{
            $con->prepare("SELECT * FROM user WHERE Login=? AND Mot_passe=?");
            $req->execute([$Login,$mdp]);
            if($req->rowcount()==1){ # utilisateur est existe
                
                #enregistrement de la cookie login
                setcookie('login',$login,time()+60);
                header("Location:Acceuil.php");
                
            }
            else{ 
                echo 'login et mot de passe sont incorrects' ;
            }
        } catch(PDOException $e){
            echo "erreur de authentification " .$e->getmessage();
            
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
    <form action="" method="post">
        <fieldset>
            <legend>FORMULAIRE</legend>

            NOM: <input type="text" name="login"><br>

            MOT DE PASSE : <input type="password" name="mdp"><br>

            <input type="submit" name="conn" value="se connecter">
        </fieldset>
    </form>
    <?php 
  ## if li ltaht dans un autre page html et php (sauf)  
if(isset($_COOKIE['login'])) echo 'bienvenue:'.$_COOKIE['login'];

?>
</body>

</html>