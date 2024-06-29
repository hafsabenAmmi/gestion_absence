<?php 
 function facto(int $n){
                if($n==0 ||$n==1){
                    return 1;
                  
                 return $n*facto($n-1);

                
                
            }}
if($_SERVER(["REQUEST_METHOD"]=="POST")){
    extract(($POST));
    if(isset($cal)){
        if(isset($n) ){
       
            $resultat=`facto($nb)`;
            
        }
    }else echo "entrez un nombre";
   
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
    <form method="POST" action="<?php $_SERVER["SCRIPT_NAME"]?>">


        <fieldset>
            <legend>Factoriel</legend>
            Saisir un nombre <input type="number" name="nb" value="<?php if (isset($nb))
             echo $nb;?>"><br>
            Affichage de resultat <input type="number" name="res" value="<?php if (isset($resultat))
             echo $resultat;?>" readonly><br>
            <input type="submit" name="cal" value="calculer la factorielle">
        </fieldset>


        //
    </form>
</body>

</html>