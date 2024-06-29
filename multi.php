<?php
echo "<h3 style='text-align:center'>Table de mltiplication<h3>";
echo "<table border='1' style='margin=auto; text-align:center; width:60%;'>";
echo "<tr>";
echo "<th style='background-color:yellow'>X</th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th style='background-color:gray'>$i</th>";
}
echo "</tr>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th style='background-color:gray'>$i</th>";
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>