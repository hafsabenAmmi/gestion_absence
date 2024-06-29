<?php 
$a=2;
$b=0;
$nb_div=0;

for($a=2;$a<=100;$a++){
    $div="";
    for($i=1;$i<=$a;$i++){
        if($a%$i==0){
            $div=$div . strval($i). ",";
            $nb_div+=1;
             };
        }
    if ( $nb_div==0){
       echo "<div style='color:red'> les diviseurs des<b>$i<b/>sont :" .rtrim($div,",")."</div>";
        
    }else{
         echo"les diviseurs de <b> $a <b> sont :".rtrim($div,",")." <br>";
    }
    
    
}

?>