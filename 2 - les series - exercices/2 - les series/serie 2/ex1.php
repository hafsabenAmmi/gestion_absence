<?php
for ($i = 2; $i <= 100; $i++) {
    $div = "";
    $nb_div = 0;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            $div .= strval($j) . ",";
            $nb_div++;
        }
    }
}
if ($nb_div == 2) {
    echo "<div style='color: red' les diviseurs de <b>$i</b> sont: " . rtrim($div, ",") . "<br>";
} else {
    echo "les diviseurs de <b>$i</b> sont: " . rtrim($div, ",") . "<br>";
}
