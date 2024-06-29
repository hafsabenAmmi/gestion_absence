<?php
function notification($msg)
{
  echo "<script>alert('$msg')</script>";
}

$var = "I AM RICH";
notification($var);

// lors de l'utilisation(appel) des fonctions JS en PHP
// il faut entourer les parametres passes dans des fonctions js (des variables en php) par des ' '