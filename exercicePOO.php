<?php 
include("connexion.php");
include("employeclass.php");
if($_SERVER("request_method")=="post"){
    extract($_post);
    if(isset($mat) && !empty($mat)
    && isset($nom) && !empty($nom)
   && isset($prenom) && !empty($prenom)
    && isset($dn) && !empty($dn)
    && isset($de) && !empty($de)
    && isset($sal) && !empty($sal) ){
        ## creation de l'objet
        $emp=new Employe($mat,$nom,$prenom,$dn,$de,$sal);
        # insertion a la base de donnee
        ## dans la page des classes on cree la fonction de creation ,supprimer,modifier...
        header("Location:liste_emp.php");
        exit;
        
        
    }
}





?>