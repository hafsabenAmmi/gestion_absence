<?php  
for($a=2;$a<=100;$a++){
    $s=0;
    for($i=2;$i<$a;$i++){
        if($a%$i==0){
            $s+=1;
            
        }
    }
    if($s==0){
        echo"le nombre $a est premier <br> ";
    }
    
}






?>