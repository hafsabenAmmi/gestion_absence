<?php 
include('EFMdb.php');
if ($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);//les nom dans name html devien variable    extract($_POST,EXTR_PREFIX_ALL,"var")   varlogin varmode_passe
    $err=[];
    if (empty($login) || !isset($login) || empty($mode_passe) || !isset($mode_passe)) {
        $err['coord'] = "<div style='color:red'>les données d’authentification sont obligatoires. </div>";
    }
  

    if (empty($err)) {
        try {
            $req = $con->prepare("SELECT * FROM compteadministrateur WHERE loginAdmin = ? AND motPasse = ?");
            $req->execute([$login, $mode_passe]);
            $user = $req->fetch(PDO::FETCH_ASSOC);

            if (empty($user)) {
                $err['auth'] = "<div style='color:red'> login ou le mot de passe incoret </div>";
            } else {  // count($user)==1  zed hade condition  mes avec fitch all
                session_start();
                $_SESSION["login_user"] = $login;
                $_SESSION['nom_user']=$user['nom'];
                $_SESSION['prenom_user']=$user['prenom'];
                $_SESSION['id_session']=session_create_id('GESPROD');
               
                header("Location:EFMaccueil.php");
                exit();
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la connexion à la base de données : ' . $e->getMessage();
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
    <form action="" method="POST">
        <fieldset>
            <?php if (isset($err['auth']))  echo $err['auth'] ; 
              if (isset($err['coord'])) echo  $err['coord'] ;
        ?>
            <legend>authentification</legend>

            login: <input type="text" name="login"><br>

            mode de passe <input type="password" name="mode_passe"><br>

            <input type="submit" value="se connecter" name="entr">
        </fieldset>

    </form>
</body>

</html>