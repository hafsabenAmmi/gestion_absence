    <?php
    ##la modification c'est le meme code de ajouter
    include("serie9Bd.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        $err = [];
        if (!isset($nom)  || empty($nom)) $err["nom"] = "Veuileez entrer le nom ";
        if (!isset($email)  || empty($email)) $err["email"] = "Veuileez entrer l email";
        if (empty($err)) {
            #la requete de modification
            if (isset($_GET['id'])) {
                try {
                    $reqm =  $con->prepare("UPDATE etudient SET nom=? , email=? WHERE id =?");
                    $reqm->execute([$nom, $email, $_GET['id']]);
                    header("Location: ExS8.php?msg=etudient bien modifié");
                    exit;
                } catch (PDOException $e) {
                    echo "Erreur de modification" . $e->getMessage();
                }
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="learning php">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <title>Conenxion</title>
    </head>

    <body>
        <form method="POST">
            <fieldset>
                <legend>modifiar un etudiant</legend>
                <?php if (isset($err['nom'])) echo "<div style='color:red'>" . $err['nom'] . "</div>"; ?>
                <?php

                try {
                    $req = $con->prepare("SELECT * FROM etudient WHERE id = ?");
                    $req->execute([$_GET["id"]]);
                    $info_ex = $req->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "Erreur de selection info etudient " . $e->getMessage();
                }
                ##try w catch hna bach kanmchiw njibo ma3lomat bach n3mloha f les value bach dkon mktoba deja bach ymodifiha w sfe
                ?>
                nom: <input type="text" name="nom" value="<?= $info_ex['nom'] ?>"><br>
                < <?php if (isset($err['nom'])) echo "<div style='color:red'>" . $err['nom'] . "</div>"; ?> email
                    :<input type="text" name="email" value="<?= $info_ex['email'] ?>"><br>
                    <?php if (isset($err['email'])) echo "<div style='color:red'>" . $err['email'] . "</div>"; ?>

                    <input type="submit" name="env" value="modifier">
            </fieldset>
        </form><br>

    </body>

    </html>