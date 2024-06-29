<?php
function estVoyelle($lettre)
{
    $voy = ["A", "F", "I", "U", "Y", "O"];
    if (in_array($lettre, $voy)) {
        return "voyelle";
    }
    return "consonne";
}

// 1 - creation et remplisage du tableau des alphabet

$abc = []; # un tableau bidimensionelle: chaque element est un tableau
$num = 1;
for ($i = 65; $i < ord("z"); $i++) {
    array_push($abc, [$num, chr($i), $i, estVoyelle(chr($i))]);
    $num++;
}

// affichage du tableau en html

echo "<table border='1'><tr style='background-color: #63B4D4'><th>Numero</th><th>Alphabet</th><th>Code ASCII</th>
<th>Type</th></tr>";

foreach ($abc as $l) { // $l est un tableau [numero, alphabet, code, type]
    echo "<tr>";
    foreach ($l as $e) {
        if ($l[3] == "voyelle") {
            echo "<td style='background-color: #ccffff'>" . $e . "</td>";
        } else {
            echo "<td style='background-color: #f5f5dc'>" . $e . "</td>";
        }
    }
    echo "</tr>";
}

echo "</table>";
