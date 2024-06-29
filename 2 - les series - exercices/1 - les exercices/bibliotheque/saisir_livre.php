<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Informations de livre</title>
</head>

<body>
    <h2>Informations de livre</h2>
    <form action="liste_livre.php" method="POST">
        <label for="titre">Le titre:</label>
        <input type="text" name="titre" id="titre" required><br><br>
        <label for="auteur">L'auteur:</label>
        <input type="text" name="auteur" id="auteur" required><br><br>
        <label for="langue">La langue:</label>
        <select name="langue" id="langue">
            <option value="FR">Francais</option>
            <option value="EN">Englais</option>
            <option value="AR">Arabe</option>
            <option value="ES">Espagnole</option>
            <option value="D">Allemand</option>
        </select><br><br>
        <label for="date">la date de parution:</label>
        <input type="date" name="date" id="date" required><br><br>
        <label for="editeur">L'editeur:</label>
        <input type="text" name="editeur" id="editeur" required><br><br>
        <label for="dateImp">la date d'impression:</label>
        <input type="date" name="dateImp" id="dateImp" required><br><br>
        <label for="nbrPage">Le nombre des pages:</label>
        <input type="number" name="nbrPage" id="nbrPage" min='0' required><br><br>
        <input type="submit" name="env" value="Envoyer">
    </form>
</body>

</html>