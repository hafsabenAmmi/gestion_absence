<?php
#creation du tableau:
$stg = array(
    ["Et1", "Ahmadi", "Ahmed", 14, [12, 15, 0]],
    ["Et2", "Rachidi", "rachid", 19, [12, 19, 20]],
    ["Et3", "Fatmi", "Fatima", 21, [17, 1, 5]],
    ["Et4", "karimi", "karim", 18, [13, 1, 5]],
);

// affichage du tableau en html

echo "<table border='1'><tr><th>Matricules</th><th>nom</th><th>prenom</th><th>age</th>";
echo "<th>Notes</th>";

foreach ($stg as $l) {
    echo "<tr>";
    foreach ($l as $value) {
        if (is_array($value)) {
            echo "<td>";
            echo implode(', ', $value);
            echo "</td>";
        } else {
            echo "<td>" . $value . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

// l'etudiant le plus agee:
$max = $stg[0][3];
foreach ($stg as $l) {
    if ($l[3] > $max) {
        $max = $l[3];
        $nom = $l[1];
    }
}
echo "l'etudiant le plus agee est: $nom";

echo "<br>";

$m = max(array_column($stg, 3));
foreach ($stg as $l) {
    if ($l[3] == $m) {
        $nom = $l[1];
    }
}

echo "l'etudiant le plus agee est: $nom";

// tri de tableau selon la moyenne
function compareselonmoyennes($v1, $v2)
{
    $moy1 = array_sum($v1[4]) / count($v1[4]);
    $moy2 = array_sum($v2[4]) / count($v2[4]);
    if ($moy1 < $moy2) return 1;
    elseif ($moy1 == $moy2) {
        return 0;
    }
}

$stg_trie = usort($stg, "compareselonmoyennes");

// affichage du tableau apres le tri

echo "<table border='1'><tr><th>Matricules</th><th>nom</th><th>prenom</th><th>age</th>";
echo "<th>Notes</th>";

foreach ($stg as $l) {
    echo "<tr>";
    foreach ($l as $value) {
        if (is_array($value)) {
            echo "<td>";
            echo implode(', ', $value);
            echo "</td>";
        } else {
            echo "<td>" . $value . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>