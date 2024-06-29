<?php
$nom="mohammed";
$anneNaissance=1992;
//la fonction date() :permet de retourner la date d'aujoud'hui 
$age=date("Y")-$anneNaissance;
//$age=(date('Y')-date('Y',strtotime($anneNaissance)));
echo"bonjour monsieur $nom vous avez $age ans";
$res=match(True){
$age>0 and $age<12=> "petit",
$age>=12 and $age<118=> "adelecen",
$age>=18 and $age<60=> "grand",
$age>=06 => "vieux"   
};
echo"Bonjour monsieur $nom vous avez $age ans vous etes $res";

/*if ($anneNaissance>date('Y')){
    echo "date invalid";
    
}else{
    echo "Bonjour Mr $nom vous avez $age   ans ";
}
if ($age<12){
    echo "vous etes petit";
    
}elseif($age<18){
    echo "vous etes adolesent";
    
}else{
    echo "vous etes grand";
}*/

?>