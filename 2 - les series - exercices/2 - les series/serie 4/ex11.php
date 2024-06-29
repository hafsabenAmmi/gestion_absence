<?php
// la somme des elements premiers
$t1 = [];
for ($i = 0; $i < 10; $i++) {
    $t1[$i] = rand(1, 100);
}
print_r($t1);
$var = function ($nb) {
    for ($i = 2; $i < $nb; $i++) {
        if ($nb / $i == 0) return false;
    }
    return true;
};
echo "la somme des nombres premiers est <br>" . array_sum(array_filter($t1, $var));
