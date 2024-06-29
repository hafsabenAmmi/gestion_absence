<?php 
$moyenne=16;
if($moyenne>=10){
   $decision="admis";
    
}else{
    $decision=  " elemine";
}
switch(True){ //true pour sup et inf et switch($moyenne){} pour l'egalite
    case $moyenne>= 17:$mention="excellent";break;
    case $moyenne>= 16:$mention="tres bien";break;
    case $moyenne>= 14:$mention="bien";break;
    case $moyenne>= 12:$mention="assez bien";break;
    case $moyenne>= 10:$mention="passable";break;
    default :$mention="pas de mention";
echo "vous avez :$moyenne vous etes $decision avec mention $mention";

    
}












/*

if($moyenne>=10){
    echo "vous etes admis";
    
}else{
    echo "vous etes elemine";
}
$moyenne=16;
$mention= match(True){
    $moyenne>=17 =>"excellent",
    $moyenne>=16 =>"tres bien",
    $moyenne>=14 =>"bien",
    $moyenne>=13 =>"assez bien",
    $moyenne>=10 =>"passable"        
};
echo " Moyenne = $moyenne  Alors Mention = $mention "*/
?>