<?php
$name = $_POST['name'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$clave2 = $_POST['clave2'];

if(empty($email) || empty($clave) || empty($clave2) )
{
    echo 'error_1'; //en caso de que un campo este vacio y este debera ser obligatorio
}else{
    if($clave ==$clave2){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            //COMPROBAR SI EL CORREO ELECTRONICO ESTA ESCRITO CORRECTAMENTE
            //FILTER_VAR() validar y verificar las direcciones del correo 
          require_once('../modelo/usuario.php');
           //require_once verifica si el archivo ya ha sido incluido y si es asi, no se incluye(require) de nuevo
           //incluimos la clase de usuario
            $usuario = new Usuario();
           //llamamos al metodo login para validar los datos en a base de datos
           $usuario -> registroUsuario($name,$email,$clave);

        }else{
            echo'error_4';
        }
    }else{
        echo 'error_2';
    }


        }
    ?>