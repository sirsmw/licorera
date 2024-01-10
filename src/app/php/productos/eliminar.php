<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');

require("../conexion.php");
$del = "delete from producto where id_producto=".$_GET['id'];

mysqli_query($conexion,$del) or die("NO eliminó el producto");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Producto eliminado';


header('Content-Type: application/json');
echo json_encode($response);
?>