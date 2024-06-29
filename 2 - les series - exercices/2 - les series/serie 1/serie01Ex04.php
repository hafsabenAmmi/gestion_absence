<?php
    $nom = "Mohamed";
    $anneeNaissance = 1992;
    // la fonction date: permet de retourner la date d'aujourdhui
    $age = date("Y") - $anneeNaissance;
    echo "Bonjour Mr $nom vous avez $age ans.";
    $res = match(true) {
        $age > 0 and $age < 12 => "petit",
        $age >=12 and $age < 18 => "adolescent",
        $age >= 18 and $age < 60 => "grand",
        $age >= 60 => "vieux"
    };
    echo "Bonjour Monsieur $nom vous avez $age ans vous etes $res"
?>