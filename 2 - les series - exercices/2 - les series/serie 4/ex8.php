<?php
$tab = [];

// remplissage d'un tableau avec les eements genere aleatoirement
for ($i = 0; $i <= 19; $i++) {
    array_push($tab, rand(1, 100));
};

echo "<table border='1'>";
foreach ($tab as $v) {
    echo "<tr><td>" . $v . "</td></tr>";
}
echo "</table>";

// tableau des nombres inferieurs a 50
$tabinf50 = array_filter($tab, fn ($v) => $v < 50);
echo "<table border ='1'";
foreach ($tabinf50 as $v) {
    echo "<td>" . $v . "</td>";
}

echo "</table>";

// tableau des nombres superieurs a 50
$tabsup50 = array_filter($tab, fn ($v) => $v > 50);
echo "<table border ='1'";
foreach ($tabsup50 as $v) {
    echo "<td>" . $v . "</td>";
}

echo "</table>";
