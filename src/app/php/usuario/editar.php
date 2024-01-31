<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');
// La acciòn de Input con datos de tipo Json
$json = file_get_contents('php://input');
// Ajustamos los datos recibidos a formato json
$params = json_decode($json);
$id = $_GET['id'];

$nombre = $params->nombre;
$usuario = $params->usuario;
$clave = sha1($params->clave);
$tipo = $params->tipo;
//$id= $params->iduser;
//echo $clave;
//echo $id;

// Conexion a la BD
require("../conexion.php");



$editar = "update usuarios set nombre='$nombre',usuario='$usuario',clave='$clave',tipo='$tipo' where id_usuario='$id' ";
//echo $editar;
mysqli_query($conexion,$editar) or die("NO se modificó usuario");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Datos modificados';


header('Content-Type: application/json');
echo json_encode($response);




?>