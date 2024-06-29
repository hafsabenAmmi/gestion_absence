<?php
        $moyenne = 15;  

        if ($moyenne >= 10) {
            $decision = "Admis";
        } else {
            $decision = "Éliminé";
        }

        switch(true) {
            case $moy >= 17: $mention = "excellent"; break;
            case $moy >= 16: $mention = "tres bien"; break;
            case $moy >= 14: $mention = "bien"; break;
            case $moy >= 12: $mention = "assz bien"; break;
            case $moy >= 17: $mention = "passable"; break;
            default: $mention = "pas de mention";
        }  
        echo "vous avez: $my, vous etes $decision avec mention $mention"
        ?>