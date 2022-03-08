<?php

    include('./modelo/personas.php');

    if(isset($_POST['insertar'])){

        $insertar=new personas($_POST[''], $_POST['insertar_nombre'], $_POST['insertar_apellido'],$_POST['insertar_edad']);
        $insertar->insertarDatos();
        header('Location: index.php');

    }

    if(isset($_POST['eliminar'])){

        $eliminar=new personas($_POST['id'],'','','');
        $eliminar->eliminarDatos();
        header('Location: index.php');

    }

    if(isset($_POST['actualizar'])){

        $update=new personas($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['edad']);
        $update->actualizarDatos();
        header('Location: index.php');

    }

    $mostrarTuplas=new personas('','','','');
    $tuplas=$mostrarTuplas->mostrarDatos();

?>
