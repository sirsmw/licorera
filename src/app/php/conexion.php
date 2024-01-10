<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "almacen";

    $conexion = mysqli_connect($servidor,$usuario) or die("NO se conetct{o a Mysql");
    mysqli_select_db($conexion,$bd);
    


?>
