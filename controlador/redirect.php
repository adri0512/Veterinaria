<?php
  session_start();
  if($_SESSION['usuario'] == 1){
    header('location: <..vista/administrador/index.php');
  }else if($_SESSION['usuario'] == 2){
    header('location: ../vista/usuario/index.php');
  }
 ?>
