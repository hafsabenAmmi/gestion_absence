<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="learning php">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Conenxion</title>
</head>

<body>
    <nav>
        <a href="acceuil.php">acceuil</a>
        <a href="creation.php">cree etudiant</a>
    </nav>
    <?php if (isset($msgsucces)) echo $msgsucces; #makaynch deja msahnah ,,corr
    elseif (isset($_GET["msg"])) echo "<div style='color:green'>" . $_GET["msg"] . "</div>"; ?>
    <form method="POST">
        <fieldset>
            <legend>cree un etudiant</legend>
            <?php if (isset($err['nom'])) echo "<div style='color:red'>" . $err['nom'] . "</div>"; ?>
            nom : <input type="text" name="nom"><br>
            <?php if (isset($err['email'])) echo "<div style='color:red'>" . $err['email'] . "</div>"; ?>
            email :<input type="text" name="email"><br>

            <input type="submit" name="env" value="cree un etudiant">
        </fieldset>
    </form><br>
    <!--affichage du tableau  -->
    <?php
    include("serie9BD.php");
    #requete de selection 
    try {
        $req = $con->prepare("SELECT * FROM etudient");
        $req->execute(); # execute khawia li2ana prepare mafihachi les attributs 
        $tab = $req->fetchall(PDO::FETCH_ASSOC);
        #affichage dans un tableau HTML
        if (count($tab) > 0) {
            echo "<table border='1'><thead>
        <th>Id</th>
        <th>nom</th>
        <th>email</th>
        <th>Action</th>
        </thead><tbody>";
            foreach ($tab as $etudient) { #etudiant est un tableau ass qui contient les infos de chaque ligne
                echo "<tr>";
                echo "<td>" . $etd['id'] . "</td>";
                foreach ($etudient as $v) {
                    echo "<td>$v</td>";
                }
                $id = $etudient['id']; # latansa ###### pour utiliser ID directement
                echo "<td>
            <a href='modifierex.php?idex=$id'>Modifier</a>
            <a href='supprimerex.php?idex=$id'>Supprimer</a>
             </td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "pas etudiant";
        }
    } catch (PDOException $e) {
        echo "erreur de selection :" . $e->getMessage();
    }
    ?>



    </table>
</body>

</html>