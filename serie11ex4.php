<?php

## dans l 'exam tester si envoyer ou renitialiser 
### xercice 5 de cookies panier il y a 2 methode nouvelle JSONcode et JSONencode 


// Définir les cookies si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_post);
    if (isset($env)) {
        if(isset($bgcolor) && isset($textcolor)){
            setcookie("bgcolor",$bgcolor);
            setcookie("textcolor",$textcolor);
            header("Location:serie11ex4.php");
            exit;
               
        }
}

if (isset($res)) {
    if(isset($bgcolor) && isset($textcolor)){
        setcookie("bgcolor",$bgcolor,time()-1);
        setcookie("textcolor",$textcolor,time()-1);
        header("Location:serie11ex4.php");
        exit;
        
        
    }
}
   
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préférences utilisateur</title>
    <style>
    body {
        background-color: <?php if(isset($_cookie["bgcolor"])) echo $_cookie["bgcolor"] ?>;
        color: <?php if(isset($_cookie["textcolor"])) echo $_cookie["textcolor"] ?>;
    }
    </style>
</head>

<body>
    <h1>Bienvenue sur notre site</h1>
    <form method="post" action="">
        <input type="color" id="backgroundColor" name="backgroundColor">
        <input type="color" id="textColor" name="textColor">
        <input type="submit" name="env" value="envoyer">
        <input type="submit" name="res" value="renitiasiser">


    </form>

</body>

</html>