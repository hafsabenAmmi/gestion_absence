<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie de livre</title>
</head>

<body>
    <h2>Saisie de livre</h2>
    <form action="liste_livre.php" method="post">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre"><br>

        <label for="auteur">Auteur(s):</label><br>
        <input type="text" id="auteur" name="auteur"><br>

        <label for="langue">Langue:</label><br>
        <input type="text" id="langue" name="langue"><br>

        <label for="date_parution">Date de parution:</label><br>
        <input type="date" id="date_parution" name="date_parution"><br>

        <label for="editeur">Éditeur:</label><br>
        <input type="text" id="editeur" name="editeur"><br>

        <label for="date_impression">Date d'impression:</label><br>
        <input type="date" id="date_impression" name="date_impression"><br>

        <label for="pages">Nombre de pages:</label><br>
        <input type="number" id="pages" name="pages"><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
   
    if(isset($titre) $$ !empty($titre) $$
    isset($auteur) $$ !empty($auteur)$$
    isset($langue) $$ !empty($langue)$$
    isset($date_parution) $$ !empty($date_parution)$$
    isset($editeur) $$ !empty($editeur)$$
    isset($date_impression) $$ !empty($date_impression)$$
    isset($pages) $$ !empty($pages));
    
    # enregister dans le $fichier
    file_put_contents("bibliotheque.txt","$titre/_\\$auteur/_\\$langue/_\\$date_parution/_\\$editeur/_\\$date_impression/_\\$pages",FILE_APPEND); #file append likay latamsah li 9abl
    
# l'extraction des donnees du fichier
$tab=file("bibliotheque.txt",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

echo" <table border='1'> <tr>
 <th> titre </th>
 <th> auteur </th>
 <th> langue </th>
 <th> date_parution </th>
 <th> editeur </th>
 <th> date_impression </th>
 <th> pages </th>
 </tr>";
 foreach ($tab as $l){
    $info =explode("/_\\",$l);
    echo "<tr>";
    foreach ($info as $v){
        echo "<td>$v</td>";
    }
    
echo  "</tr>";
    
 }
 echo "</table>";
 

   
?>