<?php 
session_start(); 
session_unset(); 
session_abort(); 
session_destroy();
session_gc();

header("Location:EFMauth.php");

#session_start();
#if(session_unset() && session_destroy()){
    #session_gc();
   # session_register_shutdown();
   # header('Location: identification.php');
    #exit;
#}



?>