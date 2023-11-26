<div class="container">
    <a href="../administracion.php"> <button class="btn_reg_form" id="btn_form_register">Atras</button></a>
    <h1>Pedidos</h1>
    <div class="form_container">
        <?php if (mysqli_num_rows($resultPedidos) == 0) { ?>
            <h3>No tienes ningun pedido</h3>
        <?php   }else{ ?>
        <table border=1>
            <tr>

                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Producto</th>
                <th>Fecha despacho</th>
                <th>Fecha llegada</th>
                <th>Fecha retiro</th>
                <th>Actualizar fecha retiro</th>
                <th>Cancelar pedido</th>
            </tr>
            <?php foreach ($rowPedidos as $pedidos) { ?>
                <tr>


                    <td> <?php echo $pedidos['usuario_nombre'] ?></td>
                    <td> <?php echo $pedidos['usuario_apellido'] ?></td>
                    <td> <?php echo $pedidos['usuario_email'] ?></td>
                    <td> <?php echo $pedidos['usuario_direccion'] ?></td>
                    <td> <?php echo $pedidos['producto'] ?></td>
                    <td> <?php echo $pedidos['fecha_despacho'] ?></td>
                    <td> <?php echo $pedidos['fecha_llegada'] ?></td>
                    <td> <?php echo $pedidos['fecha_retiro'] ?></td>
                    <?php if ($pedidos['fecha_retiro'] == null) { ?>
                        <td> <a href="../../controllers/administracion/actualizarpedido.php?id=<?php echo $pedidos['id'] ?>"><button class="btn-admin">Actualizar</button></a><?php ?></td>
                    <?php } else { ?>
                        <td> Produco retirado </td>
                    <?php   } ?>
                    <td><a href="../../controllers/administracion/actualizarpedido.php?id=<?php echo $pedidos['id'] ?>&type=cancel"><button class="btn-admin">Cancelar</button></a></td>

                <?php } }?>
        </table>
    </div>
</div>