<?php
    // configura la base de datos
    $db_host = "localhost";
    $db_user = "root";
    $db_name = "ibenteu";
    // realizamos conexion a la base de datos
    $cnx = mysqli_connect($db_host, $db_user, "", $db_name);
    // verificamos la conexion
    if(!$cnx){
        die("Error de conexion". mysqli_connect_error());
    }
?>