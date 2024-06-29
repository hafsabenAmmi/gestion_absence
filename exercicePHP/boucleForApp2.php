<?php    
for($a=2;$a<=1000;$a++){
    $s=0;
     for ($i=1;$i<=$a/2;$i++){
          if($a%$i==0){
              $s+=$i;
            
                   }
    
}
if($s==$a){
           echo "le nombre $a est parfait ";
        
    }
    
}


?>