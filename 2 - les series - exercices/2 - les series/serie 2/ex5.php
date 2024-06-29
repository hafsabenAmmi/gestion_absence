<?php
echo "<table border = '1'><tr>";
echo "<th style='background-color:yellow'><b>X</b></th>";
for ($i = 1; $i <= 10; $i++) {
  echo "<td style='background-color:grey'> $i </td>";
}
for ($j = 1; $j <= 10; $j++) {
  echo "<td>" . $i * $j . "</td>";
}
echo "</tr>";
for ($i = 1; $i <= 10; $i++) {
  echo "<tr><th style='background-color:grey'>$i</th>";
  for ($j = 1; $j <= 10; $j++) {
    echo "<td>" . $i * $j . "</td>";
  }
  echo "</tr>";
}
echo "</table>";
