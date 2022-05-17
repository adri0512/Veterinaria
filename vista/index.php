<?php
require_once("layouts/header.php");
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
        if (!empty($dato))  /*para preguntar si es correcto los datos si esta vacio o lleno */
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
            </tr>

            
        <?php endforeach ?>
    </tbody>
</table>
<?php
require_once("layouts/footer.php");
