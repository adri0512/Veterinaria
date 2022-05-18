<?php
  // 
  session_start(); /*esta funcion sirve para iniciar sesion o reunudar una exitente */

  // Validamos que exista una session y ademas que el usuario que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html
    */
    header('location: ../../index.php'); 
    /*UN DOM es un modelo de documento que se carga en el navegador web */
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  <body>
    <!-- ucfirst convierte la primera letra en mayusculas de una cadena -->
    Hola administrador <?php echo ucfirst($_SESSION['nombre']); ?>
    <a href="../../controller/cerrarSesion.php">
      <button type="button" name="button">Cerrar sesion</button>
    </a>
  </body>
</html>
