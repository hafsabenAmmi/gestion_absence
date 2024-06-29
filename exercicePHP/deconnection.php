<?php 
session_start(); # awal haja toktab lfo9 m3a supp w mod ay anna hada page laha 3ala9a b session_start li deja tftht
session_unset(); # supprimer les elemsnts du tableau $_session
session_abort(); #supprime //detruit la session =>supprimer le tableau $_session
session_destroy();#supprime //detruit la session =>supprimer le tableau $_session
session_gc();
// les fonctions precedant retourne true or false
// ida khdmo mzyan kirj3o true ia makhdmochi kirj3o false
# redirection vers la page d'authentification
header("Location:authproduit.php");


/*
#######################################################################
session_start()
if(session_unsert() && session_destroy()){
           session_gc();
           header("Location:authproduit.php");


}

*/ 

?>
<?php
session_start();
session_unset();
session_abort();
session_destroy();
session_gc();
header("LOcation:acceuil.php");

 ?>