<?php
// if (file_exists("decimal.txt")) {
//     $fDecimal = file("decimal.txt", FILE_IGNORE_NEW_LINES);

//     $fBinary = fopen("binaire.txt", "w");

//     foreach ($fDecimal as $decimal) {
//         $binary = decbin($decimal);

//         fwrite($fBinary, $binary . PHP_EOL);
//     }

//     fclose($fBinary);
// } else {
//     echo "Le fichier n'existe pas.";
// }

// method 2

$dec = file("decimal.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
$bin = array_map(function ($v) {
    return decbin($v);
}, $dec);

file_put_contents("binaire.txt", implode("\n", $bin), FILE_APPEND | LOCK_EX);
echo "<script>alert('bien_enregistre')</script>";
