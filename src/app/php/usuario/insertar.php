<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');
// La acciòn de Input con datos de tipo Json
$json = file_get_contents('php://input');
//Recibimos datos tipo Jason en $params
$params = json_decode($json);
$nombre = $params->nombre;
$usuario = $params->usuario;
$clave = $params->clave;
$tipo = $params->tipo;


// Conexion a la BD 
require("../conexion.php");
//$ins = "insert into usuarios (nombre,usuario,clave,tipo) values ('NombrePrueba','Pruebausuario',sha1('1234'),'Invitado')";
//$ins = "insert into usuarios (nombre,usuario,clave,tipo) values ('$params ->nombre','$params ->usuario','sha1($params ->clave)','$params ->tipo')";
$ins = "insert into usuarios (nombre,usuario,clave,tipo) values ('$nombre','$usuario','sha1($clave)','$tipo')";

mysqli_query($conexion,$ins) or die("NO insertó usuarios");
class Result {}
$response = new Result();
$response -> resultado ='OK';
$response -> mensaje ='Datos insertados';


header('Content-Type: application/json');
echo json_encode($response);

?>