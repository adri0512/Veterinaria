<?php
//verifica si el datos ya ha sido incluido y si es asi, no se incluye de nuevo
require_once("layouts/Servicio.php"); 
?>
<a href="index.php?m=nuevo" class="btn">Nuevo</a>
<table>
    <tr>
        <td>ID </td>
        <td>NOMBRE</td>
        <td>APELLIDOS</td>
        <td>DIRECCION</td>
        <td>TELEFONO</td>
        <td>EMAIL</td>
    </tr>

    <tbody>
        <?php
        if (!empty($dato)):  /*para preguntar si es correcto los datos si esta vacio o lleno */
            foreach ($dato as $key => $value)
                foreach ($value as $v) : ?>
            <tr>
                <td> <?php echo $v['id_cliente'] ?> </td> <!--el id de mi tabla cliente -->
                <!--echo imprimir -->
                <td><?php echo $v['nombre'] ?> </td>
                <td><?php echo $v['apellidos'] ?> </td>
                <td><?php echo $v['direccion'] ?> </td>
                <td><?php echo $v['telefono'] ?> </td>
                <td><?php echo $v['email'] ?> </td>
                <td><?php echo $v['fk_idanimal'] ?> </td>
                <td>
                    <!-- boton-->
                    <a class="btn" href="/index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                    <a class="btn" href="/index.php?m=eliminar&id=<?php echo $v['id']?>">ELIMINAR</a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
              <td colspan="3"> NO HAY REGISTROS </td>
          </tr>
          <?php endif ?>
    </tbody>
</table>