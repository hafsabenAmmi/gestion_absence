<?php
session_start();
if(!isset($_SESSION) || empty($_SESSION)){
  header("Location:authproduit.php");
  exit;
}
include("bdproduit.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  extract($_POST);
  if (isset($cat) && !empty($cat)) {
    try {
      // cette requete pour les tables jointe (qui ont une relation avec eaux)
      //on ecrit les champs avec leurs table
      // on  adat rabt li bin les tableau:x
      // jib tous les infos de produit
      //jib libelle mn categorie
      //ON Id_categorie=IDcateg : la cle primaire =cle entanger

      $reqs = $con->prepare("SELECT produit.*, categorie.Libelle as Lib FROM produit JOIN categorie  ON Id_categorie=IDcateg WHERE IDcateg=?");
      $reqs->execute([$cat]);
      $tab_prod = $reqs->fetchAll(PDO::FETCH_ASSOC);
      //apres on affiche le resultat en HTML
    } catch (PDOException $e) {
      echo " Erreur de selection des produits : " . $e->getMessage();
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
    <title>Gestion des produits </title>
</head>

<?php echo "bienvenue". $_session["nom_user"]; ?>

<nav>
    <a href="">ajouter produit</a>
    <a href="deconnection.php">deconnection</a>
</nav>
<?php if (isset($_GET["msg"])) echo "<script>alert('" . $_GET["msg"] . "')</script>"; ?>
<h1>Liste des produits</h1>
<form method="POST">
    Choisir une categorie : <select name="cat">
        <?php
      try {
        include("bdproduit.php");
        $req = $con->prepare("SELECT Id_categorie,Libelle FROM categorie");
        $req->execute();
        $tab_cat = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tab_cat as $cat) {
          echo "<option value='" . $cat['Id_categorie'] . "'>" . $cat['Libelle'] . "</option>";
        }
      } catch (PDOException $e) {
        echo "Erreur de selection categorie : " . $e->getMessage();
      }
      ?>
    </select><br>
    <input type="submit" value="filtrer" name="fil">
</form>
<?php
  if (isset($tab_prod) && !empty($tab_prod)) {
    echo "<table border='1px'><th>Reference</th><th>Libelle</th><th>Prix unitaire</th><th>Date achat</th><th>Quantite</th>
  <th>Image</th><th>Categorie<th>Actions</th>";
    foreach ($tab_prod as $prod) {
      // lam nasta3mil 2 foreach 3ala hasab iimage lihada kan affichiw kola wahd bohdo
      echo "<tr>";
      //  fait attention on n'utilse pas foreach a cause de image
      echo "<td>" . $prod['Reference'] . "</td>";
      echo "<td>" . $prod['Libelle'] . "</td>";
      echo "<td>" . $prod['Prix_unitaire'] . "</td>";
      echo "<td>" . $prod['Date_achat'] . "</td>";
      echo "<td>" . $prod['Qte'] . "</td>";
      // pour l'image ajoutez neccecerement width et height 
      echo "<td><img src='" . $prod['Image'] . "' widht='100' height='100'></td>";
      echo "<td>" . $prod['Lib'] . "</td>";
      // pour les actions on a 2 lien
      echo "<td>
    <a href='modifier_produit.php?ID=" . $prod['Reference'] . "'>Modifier</a>
    <a href='supprimer_produit.php?ID=" . $prod['Reference'] . "'>supprimer</a>
    </td></tr>";
    }
  }

  ?>
</body>

</html>