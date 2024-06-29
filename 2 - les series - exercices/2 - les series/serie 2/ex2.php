<?php
$nbp = "";
for ($i = 2; $i <= 1000; $i++) {
    $sum = 0;
    for ($j = 1; $j < $i; $j++) {
        if ($i % $j == 0) {
            $sum += $j;
        }
    }
    if ($sum == $i) {
        echo $nbp .= "$i,";
    }
}
echo "les nombres parfaits qui existent entre 2 et 1000 sont: " . rtrim($nbp, ",");
