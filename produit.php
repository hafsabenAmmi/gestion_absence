<?php
extract($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($idProduit) && isset($libellePoduit) && isset($categorie) && isset($dateProuctiond) && isset($dateExpiration) && isset($PrixAchat) && isset($PrixVente)) {
        $file = fopen("produits.txt", "a");
        fwrite($file, "$idProduit||$libellePoduit||$categorie||$dateProuctiond||$dateExpiration||$PrixAchat||$PrixVente\n");
        fclose($ffile);
        $f = file("produits.txt");
        echo "<table border='1'>";
        echo "<tr><th>Id produit</th><th>Libelle Produit</th><th>Categorie</th><th>Date production</th><th>Date d'expiration</th><th>Prix d'achat</th><th>Prix de Vente</th></tr>";
        foreach ($f as $k) {
            echo "<tr>";
            $mot = explode("||", $k);
            echo "<td>$mot[0]</td>";
            echo "<td>$mot[1]</td>";
            echo "<td>$mot[2]</td>";
            echo "<td>$mot[3]</td>";
            echo "<td>$mot[4]</td>";
            echo "<td>$mot[5]</td>";
            echo "<td>$mot[6]</td>";
            echo "</tr>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        Id Produit : <br>
        <input type="text" name="idPoduit"><br>
        Libelle Produit : <br>
        <input type="text" name="libellePoduit"><br>
        Categorie : <br>
        <select name="categorie" id="">
            <option value="alimentaire">alimentaire</option>
            <option value="bureautique">bureautique</option>
            <option value="digital">digital</option>
            <option value="cuisine">cuisine</option>
            <option value="decoration">decoration</option>
        </select><br>
        Date Production : <br>
        <input type="date" name="dateProuctiond"><br>
        Date d'expiration : <br>
        <input type="date" name="dateExpiration"><br>
        Prix d'Achat : <br>
        <input type="text" name="PrixAchat"><br>
        Prix de Vente : <br>
        <input type="text" name="PrixVente"><br>
        <button type="submit" name="Ajouter">Ajouter</button>
    </form>
</body>

</html>