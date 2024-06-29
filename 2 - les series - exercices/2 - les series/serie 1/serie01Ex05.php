<?php
$a = 5;
$b = 10;
$c = 15;
if ($a < $b && $a < $c) {
  echo "le min est $a";
} elseif ($b < $a && $b < $c) echo "le min est $b";
else echo "le min est $c";

echo "le min est: ".min($a,$b,$c);
echo "le max est: ".max($a,$b,$c);
?>