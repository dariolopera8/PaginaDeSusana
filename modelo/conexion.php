<?php

    $db = 'mysql:dbname=bigdata;host=mariadb-service';
    $user = "root";
    $pass = "root1234";

    try {
        $bd = new PDO($db, $user, $pass);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    } catch (PDOException $e) {
        die("Error en la conexion... " . $e->getMessage());
    }

?>
