<?php
declare(strict_types =1);

#les function
#declaration
function somme($a,$b){
    return $a+$b;
}
echo somme(4,6);
#pour strict types de parametre en ajoute => declare(strict_types=1);
#des parametres (par valeur)
/*function permutation(int $a , float $b){
    $c = $a;
    $a = $b;
    $b=$c;
}
$X = 7; $Y= 245;
permutation($X,$Y);
echo "X=$X , Y = $Y"; # X=7 Y=245*/
#par adress
function permutation(int &$a , float &$b){
    $c = $a;
    $a = $b;
    $b=$c;
}
$X = 7; $Y= 245;
permutation($X,$Y);
echo "X=$X , Y = $Y"; # X=7 Y=245
#on utilise le passage par adresse quand on va faire un modification au parametre 
#function anonyme : fonction sans nom
$s = function($a,$b){
    return $a+$b;
};
echo $s(5,9);
array_reduce([34,3,21,24],$s,2); #natija

#fonction flechée
$s = fn($a,$b) => $a+$b;
array_reduce([453,34,3],fn($x,$y) => $x+$y);
?>