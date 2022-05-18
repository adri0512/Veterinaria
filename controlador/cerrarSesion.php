<?php
//cerramos la sesion 
session_start();
session_destroy();
header("/vista/login/login.php"); /* se manda a llamar igual en la parte de administrador*/
?>

