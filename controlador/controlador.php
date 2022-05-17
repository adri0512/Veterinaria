<?php
require_once("modelo/modelo.php");
class modeloController{
	private $model;
	public function __construct(){
        $this->model=new Modelo();
    }
    // MOSTRAR
    static function index(){ /*tambien lo mando a llamar en index.php en la linea 5 */
    	$cliente 	=	new Modelo();
		$dato = $cliente->mostrar("cliente","1"); /*aqui se pondrá el id que se mostrará */
		require_once("vista/index.php");
    }

    // INSERTAR
    function nuevo(){
    	require_once("vista/nuevo.php");	    	    	
    }
    function guardar(){
    	$nombre 	=	$_REQUEST['nombre'];
    	$apellidos 	=	$_REQUEST['apellidos'];
        $data       =   "'".$nombre."','".$apellidos."'";
    	$producto 	=	new Modelo();
		$dato 		=	$producto->insertar("cliente",$data);
		header("location:".urlsite);
    }


    // ACTUALIZAR

    function editar(){
    	$id=$_REQUEST['id'];
    	$cliente 	=	new Modelo();
    	$dato=$cliente->mostrar("cliente","id=".$id);    	
    	require_once("vista/editar.php");
    }
    function update(){
    	$id 		= 	$_REQUEST['id'];
    	$nombre 	=	$_REQUEST['nombre'];
    	$apellidos 	=	$_REQUEST['apellidos'];
        $data       =   "nombre='".$nombre."', apellidos=".$apellidos;
        $condicion  =   "id=".$id;
    	$cliente 	=	new Modelo();
		$dato 		=	$cliente->actualizar("cliente",$data,$condicion);
        header("location:".urlsite);
	}

    // ELIMINAR

	function eliminar(){		
		$id 		= 	$_REQUEST['id'];    	
        $condicion  =   "id=".$id;
    	$cliente 	=	new Modelo();        
		$dato 		=	$cliente->eliminar("cliente",$condicion);
		header("location:".urlsite);
	}
}

?>