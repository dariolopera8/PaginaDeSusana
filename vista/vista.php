<?php include('./controlador/controlador.php'); ?>
<table class="table table-dark">
    <tbody>
        <tr>
            <td class="text-center">ID</td>
            <td class="text-center">Nombre</td>
            <td class="text-center">Apellido</td>
            <td class="text-center">Edad</td>
            <td class="text-center" colspan="2">Acciones</td>
        </tr>
        <?php foreach($tuplas as $indice) { ?>
            <tr>
                <form action="" method="POST">
                    <td class="text-center"><input type="text" name="id" id="id" value="<?php echo $indice->id; ?>" readonly="readonly"></td>
                    <td class="text-center"><input type="text" name="nombre" id="nombre" value="<?php echo $indice->nombre; ?>"></td>
                    <td class="text-center"><input type="text" name="apellido" id="apellido" value="<?php echo $indice->apellido; ?>"></td>
                    <td class="text-center"><input type="text" name="edad" id="edad" value="<?php echo $indice->edad; ?>"></td>
                    <td class="text-center"><input type="submit" value="Eliminar" name="eliminar"></td>
                    <td class="text-center"><input type="submit" value="Actualizar" name="actualizar"></td>
                </form>
            </tr>
        <?php }; ?>
            <tr>
                <form action="" method="POST">
                    <td class="text-center"><input type="hidden" name="" id=""></td>
                    <td class="text-center"><input type="text" name="insertar_nombre" id="insertar_nombre"></td>
                    <td class="text-center"><input type="text" name="insertar_apellido" id="insertar_apellido"></td>
                    <td class="text-center"><input type="text" name="insertar_edad" id="insertar_edad"></td>
                    <td class="text-center" colspan="2"><input type="submit" name="insertar" id="insertar" value="Insertar"></td>
                </form>
            </tr>
    </tbody>
</table>
