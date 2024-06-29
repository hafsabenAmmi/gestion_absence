<?php
    for ($i = 0; $i <= 100; $i++) {
        $P = true;
        if ($i < 2) {
            $P = false;
        } else {
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j == 0) {
                    $P = false;
                    break;
                }
            }
        }
        if ($P) {
            echo "$i<br>";
        }
    }
?>