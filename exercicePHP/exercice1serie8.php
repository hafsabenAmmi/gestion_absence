<?php
include("connexionbd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    if(isset($env)){
        #traitement de l'enregistrement des commontaire
        $err=[];
  
    if(!isset($titre) || empty($titre)) $err["titre"]="veuelliez entrer le titre"; //isset ya3ni 3andi
    if(!isset($autheur) || empty($autheur)) $err["autheur"]="veuelliez entrer un autheur";
    if(!isset($date) || empty($date)) $err["date"]="veuelliez entrer un date";
     if(empty($err)){   
        #enregistrement dans la base de donnees avec la requete(Insert)
        #$reqi obj PDOStatment
        htmlspecialchars($titre);  //liziyadat lhimaya d les variables
        htmlspecialchars($auteur);
        htmlspecialchars($date);
        
        try{
        $reqi=$con->prepare("INSERT INTO ex1 (titre , autheur , date ) VALUES (?,?,?)");
        $reqi->execute([$titre,$autheur,$date]);
        echo "<div style='color:green'>avis bien Insere</div>";
        } catch(PDOException $e){
            echo "<div style='color:red'>avis non Insere".$e->getMessage()."</div>";
        }
    }
    if(isset($env)){
    $req= $con-> prepare("SELECT * FROM ex1 ");
    $req->execute();
    $tab=$req->feTchAll(PDO::FETCH_ASSOC);
    echo"<pre>";
    print_r($tab);
    echo"</pre>";
    if(empty($tab)) echo "aucun enregistrement";
    else{ 
               echo"<table border='1px'>
               <tr>><th></th><th>titre</th><th>auteur</th><th>date</th></tr>";
               foreach($tab as $ligne){
                echo "<tr>";
                foreach($ligne as $v){
                    echo "<td>$v</td>";
                }
                echo"</tr>";
               }
            echo"</table>";
    }
}}} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="$_POST">
        <fieldset>
            <legend>ajouter un exercice</legend>
            <?php if(isset($err["titre"])) echo"<p style='color:red'>".$err['titre'] ."</p>" ;?>
            titre exercice:
            <input type="text" name="titre"><br>
            <?php if(isset($err["auteur"])) echo"<p style='color:red'>".$err['auteur'] ."</p>" ;?>
            auteur exercice:
            <input type="text" name="auteur"><br>
            <?php if(isset($err["date"])) echo"<p style='color:red'>".$err['date'] ."</p>" ;?>
            date de creation
            <input type="date" name="date"><br>
            <input type="submit" value="envoyer" name="env">

        </fieldset>




    </form>
</body>

</html>
<?php
if(isset($env)){
    $req= $con-> prepare("SELECT * FROM ex1 ");
    $req->execute();
    $tab=$req->feTchAll(PDO::FETCH_ASSOC);
    echo"<pre>";
    print_r($tab);
    echo"</pre>";
    if(empty($tab)) echo "aucun enregistrement";  //empty : khawi
    else{ 
               echo"<table border='1px'>
               <tr><th>id</th><th>titre</th><th>auteur</th><th>date</th></tr>";
               foreach($tab as $ligne){
                echo "<tr>";
                foreach($ligne as $v){
                    echo "<td>$v</td>";
                }
                $id=$ligne["id"];
                //id li ltaht kikon f tableau GET bach kola star clikina 3lih soit modifier soit supprimer kihoz m3ah id dyalo
                echo "<td>
                <a href='modifier.php?id_ex=$id'>modifier</a> 
                <a href='supprimer.php?id_ex=$id'>suprimerp</a>
                
                
                </td>";
                echo"</tr>";
               }
            echo"</table>";
    }
}
?>