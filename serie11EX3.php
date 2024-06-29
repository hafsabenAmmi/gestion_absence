<?php 

## DARORI F LOLI BD 9BL COOKIES
include("bdserie11EX3.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    if(isset($env) ){
         # declaration de la cookie langue
        if(isset($lg) && !empty($lg)){
            setcookie('lg',$lg);
              # ista3malha l header li2ano hatta mara li maja 3ad atba9
              header("Location:serie11EX3.php");
              exit;  
        }   
    }
    
    if(isset($ren) ){
        #la supprimer de la cookie
      
            setcookie('lg',$lg,time()-1);
              header("Location:serie11EX3.php");
              exit;
       
        }

        # l'utilisation de la cookie langue
        $text="choisissez une langue";
        if(isset($_cookie["langue"])){
            switch($_cookie["languee"]){
                case "fr" : $text="choisissez une langue";
                $tab_choix  =["fr" => "francais" , "an" => "anglais" ,"es" => "espagnole "];
                $btn1="envoyer" ; $btn2="reanitialisation";break;
                
                case "an" : $text="choise a language";
                $tab_choix  =["fr" => "french" , "an" => "english" ,"es" => "espan "];
                $btn1="send" ; $btn2="reset";break;
                
                ### nfs chay2 en espa
                
            }
              
        }}
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <legend> choisissez une langue :</legend>
        <form action="" method="POST">

            <select name="lg">
                <?php 
                
                foreach($tab_choix as $k=>$v){
                    echo" <option value ='$k' > $v </option>";
                }

                
                
                ?>
                <option name=" sp" value=" Spanish">espagnole</option>
                <option name=" fr" value="French">francais</option>
                <option name="an" value="English">anglais</option>
            </select>
            <input type="submit" name="env" value="envoyer"> <br>
            <input type="submit" name="ren" value="reinistialiser">


        </form>
    </fieldset>



</body>

</html>