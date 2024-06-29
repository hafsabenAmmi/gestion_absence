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
                if(isset($rbm)){# si utilisateur a cocher la case de remember me ? 
                    
                      #enregistrement de la cookie login
                       setcookie('login',$login);
                       setcookie('mdp',$mdp);
                    
                }
                
              
                header("Location:Acceuil.php");
                
            }
            else{ 
                echo 'login ou mot de passe est incorrect' ;
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

            NOM: <input type="text" name="login"
                value=" <?php if(isset($_cookie["login"])) echo $_COOKIE["login"] ;?>"><br>

            MOT DE PASSE : <input type="password" name="mdp"
                value=" <?php if(isset($_cookie["mdp"])) echo $_COOKIE["mdp"] ;?>"><br>

            <input type="checkbox" name="rbm">Remember me ? <br>

            <input type="submit" name="conn" value="se connecter">

        </fieldset>
    </form>
    <?php 
  ## if li ltaht dans un autre page html et php (sauf)  
if(isset($_COOKIE['login'])) echo 'bienvenue:'.$_COOKIE['login'];

?>
</body>

</html>