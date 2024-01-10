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
$editar = "update usuarios set nombre='$params ->nombre',usuario='$params ->usuario',clave=sha1['$params ->clave'],tipo='$params ->tipo' where id_usuario=$params ->id_usuario ";
mysqli_query($conexion,$editar) or die("NO se modificó usuario");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Datos modificados';


header('Content-Type: application/json');
echo json_encode($response);

?>