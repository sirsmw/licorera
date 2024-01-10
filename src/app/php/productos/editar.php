<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');
// La acciòn de Input con datos de tipo Json
$json = file_get_contents('php://imput');
//Recibimos datos tipo Jason en $params
$params = json_decode($json);
// Conexion a la BD
require("../conexion.php");
//$ins = "insert into producto (nombre,proveedor,stock,v_compra,v_venta) values ('Medias','Sox',510,3,4)";
$editar = "update producto set nombre='$params ->nombre',proveedor='$params ->proveedor',stock='$params ->stock',v_compra='$params ->v_compra' ,v_venta='$params ->v_venta' where id_producto=$params ->id_producto ";
mysqli_query($conexion,$editar) or die("NO se modificó producto");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Datos producto modificados';


header('Content-Type: application/json');
echo json_encode($response);

?>