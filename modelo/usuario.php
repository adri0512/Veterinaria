<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');


  class Usuario extends Conexion
  {

    public function login($user, $clave)
    {
      /*lo que estamos haciendo es llamar un metodo de una clase
        heredada es decir al yo colocar parent::conectar, lo que hago es
        llamar al metodo conectar de la clase patiente en este caso conexion
      */


      # Nos conectamos a la base de datos
      parent::conectar();

      // El metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que pueden vulnerar nuestra consulta SQL
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);

      /*$user  = parent::filtrar($user);
      $clave = parent::filtrar($clave);*/

      /*
        Para la validación del usuario podemos hacer dos cosas,
        validar que exista el email solamente y mostrar error en caso
        de que no, o validar ambos campos y mostrar un unico error,
        en este caso validare el usuario con ambos campos
      */

      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
      $consulta = 'select id_medico, nombre from medico where email="'.$user.'" and clave=("'.$clave.'")';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){
        $user = parent::consultaArreglo($consulta);

        session_start(); // para iniciar una nueva sesion o reanudar una exitente
        $_SESSION['fk_idmedico']     = $user['fk_idmedico'];
        $_SESSION['nombre'] = $user['nombre'];
  
        /*
          Recuerda:
          cargo con valor: 2 es: Administrador
          cargo con valor: 1 es: usuario estandar
          puedes agregar cuantos cargos desees, en este ejemplo solo uso 2
        */

        // Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
        if($_SESSION[''] == 1){ //'' por definir
          echo 'vista/administrador/index.php';
        }else if($_SESSION['cargo'] == 2){
          echo 'vista/usuario/index.php';
        }
      }else{
        // El usuario y la clave son incorrectos
        echo 'error_3';
      }
      # Cerramos la conexion
      parent::cerrar();
    }

    public function registroUsuario($name, $email, $clave)
    {
      parent::conectar();

      $name  = parent::filtrar($name);
      $email = parent::filtrar($email);
      $clave = parent::filtrar($clave);


      // validar que el correo no exito
      $verificarCorreo = parent::verificarRegistros('select id from usuarios where email="'.$email.'" ');


      if($verificarCorreo > 0){
        echo 'error_3';
      }else{

        parent::query('insert into usuario(nombre, email, clave) values("'.$name.'", "'.$email.'", ("'.$clave.'"), 2)');

        session_start();

        $_SESSION['nombre'] = $name;
        $_SESSION['cargo']  = 2; //especialidad=cargo

        echo 'view/user/index.php';

      }

      parent::cerrar();
    }

  }


?>
