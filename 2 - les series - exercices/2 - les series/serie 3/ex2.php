<?php
# letraitement des donnees 
function Conversion(float $num,string $td,string $tf){
    switch ($td){
        case "Celsius" :
            switch($tf){
                case "Celsius" : return $num;break;
                case "Fahrenheit" : return $num*(9/5)+32;break;
                case  "Kelvin" : return $num+273.15;break;
            }
        case "Fahrenheit": 
            switch($tf) {
                case "Celsius" : return ($num-32)*(5/9); break;
                case "Fahrenheit" : return $num; break;
                case "Kelvin" : return ($num-32 + 459.67)/9; break;}
        case  "Kelvin" :  
            switch($tf) {
                case "Celsius" : return $num - 273.15; break;
                case "Fahrenheit" : return $num * 9/5 - 459.67; break;
                case "Kelvin" : return $num;break;}    
    }   
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    #verification des donnees 
    extract($_POST);
    if(!isset($nb) || $nb=="") $errnb = "Vous devez saisir un nombre<br>";
    if(!isset($tpd) || empty($tpd))  $errtpd = "Vous devez choisir la temperature de depart";
    if(!isset($tpf) || empty($tpf))  $errtpf ="Vous devez choisir la temperature finale";
    if(!isset($errnb) && !isset($errtpd) && !isset($errtpf)){
        $res = Conversion($nb,$tpd,$tpf);
        $message = "<div > $nb $tpd = $res $tpf</div>";
    }
filter_var()

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="learning php">
  <meta name="keywords" content="HTML, CSS, JavaScript">

  
  <title>Conversion</title>
</head>
<body>
<!-- method POST:  envoi des données a travers protocole HTTP ( les sockets)
vers le serveur pour le traitement  -->
<form method="POST" action="<?= $_SERVER["PHP_SELF"]?>">
<fieldset>
    <legend>Tableau de conversion</legend>
    <?php if(isset($errtpd)) echo "<div style='color:red' >$errtpd </div>" ?>
    <input type="radio" name="tpd" value="Fahrenheit"<?php if(isset($tpd) && $tpd =="Fahrenheit")echo "checked";?>> Fahrenheit  
    <input type="radio" name="tpd" value="Celsius"<?php if(isset($tpd) && $tpd =="Celsius") echo "checked";?> > Celcius
    <input type="radio" name="tpd" value="Kelvin" <?php if(isset($tpd) && $tpd =="Kelvin") echo "checked";?>> Kelvin <br>
    <?php if(isset($errnb)) echo "<div style='color:red' >$errnb </div>" ?>
    <input type="number" name ="nb" value="<?php if(isset($nb)) echo $nb;?>"><br> 
    <input type="radio" name="tpf" value="Fahrenheit" <?php if(isset($tpf) && $tpf =="Fahrenheit")echo "checked";?>> Fahrenheit  
    <input type="radio" name="tpf" value="Celsius" <?php if(isset($tpf) && $tpf =="Celsius") echo "checked";?>> Celcius
    <input type="radio" name="tpf" value="Kelvin" <?php if(isset($tpf) && $tpf =="Kelvin") echo "checked";?>> Kelvin <br> 
    <?php if(isset($errtpf)) echo "<div style='color:red' >$errtpf</div>" ?>
    <input type="submit" name="cal" value="Convertir le nombre">
    <?php if(isset($message)) echo "$message"; ?>
</fieldset>
</form>
</body>
</html> 