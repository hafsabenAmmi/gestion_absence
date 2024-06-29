<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
</head>

<body>
    <h2>Liste des livres</h2>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Auteur(s)</th>
            <th>Langue</th>
            <th>Date de parution</th>
            <th>Éditeur</th>
            <th>Date d'impression</th>
            <th>Nombre de pages</th>
        </tr>
        <?php
       
        $fichier = fopen("bibliotheque.txt", "a");
        if ($fichier) {
            while (!feof($fichier)) {
                $ligne =fgets($fichier);
                $infos = explode(' ', $ligne);
                echo "<tr>";
                foreach($ligne as $infos){
                     echo "<td>";
                     echo  $infos;
                     echo "</td>";
                }
               
                echo "</tr>";
            }
            fclose($fichier);
        }
        ?>
    </table>
</body>

</html>