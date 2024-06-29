<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter'])) { // Corrected form submission check
    extract($_POST);

    if (!empty($idProduit) && !empty($libProduit) && !empty($categorie) && !empty($dateProduction) && !empty($dateExpiration) && !empty($PA) && !empty($PE)) {
        $f = fopen("produits.txt", "a");
        if ($f) {
            fwrite($f, "$idProduit,$libProduit,$categorie,$dateProduction,$dateExpiration,$PA,$PE\n");
            fclose($f);

            $f1 = file("produits.txt");
            echo "<table border='1' style= 'margin-top: 50px'>";
            echo "<tr><th>Id produit</th><th>Libelle Produit</th><th>Categorie</th><th>Date production</th><th>Date d'expiration</th><th>Prix d'achat</th><th>Prix de Vente</th></tr>";
            foreach ($f1 as $k) {
                echo "<tr>";
                $sp = explode(",", $k);
                foreach ($sp as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<span style='color: red;'>can't open file</span>";
        }
    } else {
        echo "<span style='color: red;'>Tout les champs doit etre rempli</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h2 {
            font-weight: 500;
        }

        .container {
            margin-top: 50px;
            width: 500px;
        }

        .input-holder {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        .main-input {
            width: 100%;
            height: 30px;
            border: 1px solid #777;
            border-radius: 5px;
        }

        input[type="submit"] {
            border-radius: 5px;
            background-color: #eee;
            border: 0;
            padding: 10px 15px;
            cursor: pointer;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; flex-wrap: wrap">
    <div class="container">
        <form method="POST">
            <h2>Saisir Produit</h2>
            <div class="input-holder">
                <label>Id Produit :</label>
                <input class="main-input" type="text" name="idProduit">
            </div>
            <div class="input-holder">
                <label>Libelle Produit :</label>
                <input class="main-input" type="text" name="libProduit">
            </div>
            <div class="input-holder">
                <label>Categorie : </label>
                <select class="main-input" name="categorie">
                    <option value="alimentaire">alimentaire</option>
                    <option value="bureautique">bureautique</option>
                    <option value="digital">digital</option>
                    <option value="cuisine">cuisine</option>
                    <option value="decoration">decoration</option>
                </select>
            </div>
            <div class="input-holder">
                <label>Date Production : </label>
                <input class="main-input" type="date" name="dateProduction">
            </div>
            <div class="input-holder">
                <label>Date d'expiration : </label>
                <input class="main-input" type="date" name="dateExpiration">
            </div>
            <div class="input-holder">
                <label> Prix d'Achat : </label>
                <input class="main-input" type="text" name="PA">
            </div>
            <div class="input-holder">
                <label> Prix de Vente : </label>
                <input class="main-input" type="text" name="PE">
            </div>
            <input type="submit" name="ajouter" value="Ajouter">
        </form>
    </div>
</body>

</html>