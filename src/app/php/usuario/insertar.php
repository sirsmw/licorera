<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');
// La acciòn de Input con datos de tipo Json
$json = file_get_contents('php://imput');
//Recibimos datos tipo Jason en $params
$params = json_decode($json);
// Conexion a la BD
require("../conexion.php");
//$ins = "insert into usuarios (nombre,usuario,clave,tipo) values ('NombrePrueba','Pruebausuario',sha1('1234'),'Invitado')";
$ins = "insert into usuarios (nombre,usuario,clave,tipo) values ('$params ->nombre','$params ->usuario',sha1['$params ->clave'],'$params ->tipo')";
mysqli_query($conexion,$ins) or die("NO insertó usuarios");
class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Datos insertados';


header('Content-Type: application/json');
echo json_encode($response);

?>