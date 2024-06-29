<?php 
include("bdproduit.php");
###        COOKIES        ###

if(!isset($_COOKIE['nbrvisite'])){
    $nbrv=1;
    setcookie('nbrvisite',$nbrv);
    
}else{$nbrv=$_COOKIE['nbrvisite']+1;
    setcookie('nbrvisite',$nbrv); //modifier la cookie

    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $err=[];
    if(!isset($login) ||empty($login) ) $err['login'] = "login est vide";
    if(!isset($mdp) ||empty($mdp) ) $err['mdp'] = "mot de passe est vide";
    if(empty($err)){
        try{
            $req =$con->prepare("SELECT *FROM authentification WHERE login=? AND motdepasse=? ");
            $req->execute([$login,$mdp]);
            if($req->rowCount()==1){ ## lita2kid anna dak utilisateur kayn f base de donne ya3ni jbro
                #ouverture d'une session
             session_start();
             # enregister les donnes de l'utilisateur(nom_complet et ID)
             $info_user=$req->fetch(PDO::FETCH_ASSOC);
             $_SESSION["ID_USER"]=$info_user["id"];
             $_SESSION["nom_user"]=$info_user["nom_complet"];
             $_SESSION["login"]=$login;
             header("Location:list_produit.php");
             exit;
            }
            else $err["conn"]="login et mot de passe errone ....";
        }
        catch(PDOException $e){
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
    <?php if(isset ($err["conn"])) echo $err["conn"];?>
    <form method="POST">
        <fieldset>
            <legend>SeConnecter</legend>
            <?php if(isset ($err["login"])) echo $err["login"];?>
            Nom: <input type="text" name="ligin"><br>
            <?php if(isset ($err["mdp"])) echo $err["mdp"];?>
            mot de passe :<input type="password" name="mdp"><br>
            <input type="submit" name="connex" value="SeConnecter">
        </fieldset>
    </form>
    <?php 

    
    if(isset($_COOKIE['nbrvisite'])) echo 'nombre des visites:'.$_COOKIE['nbrvisite'];
    
    
    ?>
</body>

</html>