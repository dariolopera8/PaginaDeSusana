<?php
define('USER', 'root');
define('PASSWORD', 'root1234');
define('HOST', 'mariadb-service');
define('DATABASE', 'bigdata');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
