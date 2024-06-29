<?php
## le meme code de suppression 
include("serie9BD.php");
#awal haja tester 3la id wach kayn howa loli
if (isset($_GET["id"])) {
    extract($_GET);
    #requete de suppression 
    try {
        $reqs = $con->prepare("DELETE FROM etudient WHERE id=?");
        $reqs->execute([$id]);
        header("Location: ExS8.php?msg=etudient bien supprimé");
    } catch (PDOException $e) {
        echo "Erreur de suppression :" . $e->getMessage();
    }
}