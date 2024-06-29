<?php
// 1 - traitement des donnees issu du formulaire + enregistrement dans le fichier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    if (
        isset($titre) && !empty($titre) &&
        isset($auteur) && !empty($auteur) &&
        isset($langue) && !empty($langue) &&
        isset($date) && !empty($date) &&
        isset($editeur) && !empty($editeur) &&
        isset($dateImp) && !empty($dateImp) &&
        isset($nbrPage) && !empty($nbrPage)
    ) {
        // enregistrement dan le fichier (l'ecriture)
        file_put_contents("bibliotheque.txt", "$titre/_\\$auteur/_\\$langue/_\\$date/_\\$editeur/_\\$dateImp/_\\$nbrPage\n", FILE_APPEND);
    }
}

// l'extraction des donnees du fichier
$tab = file("bibliotheque.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

echo "<table border='1'><tr>
<th>Titre</th>
<th>Auteur</th>
<th>Langue</th>
<th>Date de parution</th>
<th>Editeur</th>
<th>Date d'impression</th>
<th>Nombre des pages</th>
";
foreach ($tab as $l) { // $l est chaque ligne dans le fichier (chaine)
    $info = explode("/_\\", $l); // $info = {"titre", "auteur", "langue", "date", "editeur", "dateIpm", "nbrPage"}
    echo "<tr>";
    foreach ($info as $v) {
        echo "<td>$v</td>";
    }
    echo "</tr>";
}
