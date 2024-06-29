<?php
print_r($_POST);

#1- tester sur les informations
if($_SERVER(["REQUEST_METHOD"]=="POST")){
    if(isset($_POST["nom"])&& !empty($_POST["nom"]) && isset($_POST["annee"]) && !empty($_POST["annee"])){
        $age = date("Y")-$_POST["annee"];
        switch(true){
            case $age<0 && $age<12 : $etat = "petite";break;
            case $age<=20: $etat = "adolescence";break;
            case $age<=60: $etat = "grand";break;
            case $age>60: $etat = "vieux";break;
    }
    echo "Bonjour ".$_POST['nom']." vous avez $age et vous etes $etat";
    }
}
?>
<?php 
extract($_GET); //tosa3idona 3ala 3adam sti3mal $_get[""fkmkwfk] bal chof li koraha ltaht
if(isset($env));
if(isset($_GET["env"]))//ya3ni wach klikina 3la button envoyer



?>