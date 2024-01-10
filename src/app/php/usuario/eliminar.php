<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');

require("../conexion.php");
$del = "delete from usuarios where id_usuario=".$_GET['id'];

mysqli_query($conexion,$del) or die("NO eliminó usuarios");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Usuario eliminado';


header('Content-Type: application/json');
echo json_encode($response);
?>