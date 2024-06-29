<?php

function decimalToBinary($decimal)
{
    return decbin($decimal);
}

$decimalFile = fopen("decimal.txt", "r");
if ($decimalFile) {
  
    $binaryFile = fopen("binaire.txt", "w");

   
    while (($decimal = fgets($decimalFile)) !== false) {
     
        $binary = decimalToBinary(trim($decimal));

      
        fwrite($binaryFile, $binary . "\n");
    }

 
    fclose($decimalFile);
    fclose($binaryFile);

    echo "Conversion réussie.";
} else {
    echo "Impossible d'ouvrir le fichier decimal.txt.";
}
?>