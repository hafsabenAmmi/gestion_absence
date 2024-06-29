<?php 
include('EFMdb.php');
session_start();

if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: EFMauth.php");
    exit();
}

// Vérifier si la requête est de type GET
try {

    $req = $con->prepare("SELECT stagiaire.* , filiere.intitule FROM stagiaire  Join filiere on stagiaire.idFiliere = filiere.idFiliere ");
    $req->execute();
    $tab = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn'])) {
//     session_unset();
//     session_destroy();
//     header('Location: EFMauth.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des stagiaires</title>
</head>

<body>
    <h1>
        <?php  
    if (date("H")>="1" && date("h")<=12) echo 'Bonjour  ' . $_SESSION['nom_user'] . " " .$_SESSION['prenom_user'];
    else echo 'Bonsoir  ' . $_SESSION['nom_user'] . " " .$_SESSION['prenom_user'];
    
    ?>
    </h1>
    <a href="EFMajouter.php">ajouter stagier</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Photo de profil</th>
                <th>Filière</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        
        if (empty($tab)) {
            echo "<tr><td colspan='7'>Pas de stagiaire trouvé</td></tr>";
        } else {
            foreach ($tab as $stagiaire) {
                echo "<tr>";
                echo "<td>".$stagiaire['nom']."</td>";
                echo "<td>".$stagiaire['prenom']."</td>";
                echo "<td>".$stagiaire['dateNaissance']."</td>";
                echo "<td><img src='".$stagiaire['photoProfil']."' width='100' height='100'></td>";
                echo "<td>".$stagiaire['intitule']."</td>";

              
                echo "<td><a href='EFMmodifier.php?id=" . $stagiaire['idstagiaire'] . "'> <img src='images_V1/edit.png'width='50' height='30'></a></td>";
                echo '<td><a href="EFMsupp.php?id=' . $stagiaire['idstagiaire'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce stagiaire ?\');"><img src="images_V1/trash.png" alt="supprimer" width="50" height="30"></a></td>';
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <!-- <form method="POST" action="">
        <button type="submit" name="btn">Déconnexion</button>
    </form>    -->
    <!-- or -->
    <a href="EFMdeconnexion.php">Déconnexion</a>

</body>

</html>