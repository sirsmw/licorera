<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');
// La acciòn de Input con datos de tipo Json
//$json = file_get_contents('php://imput');
//Recibimos datos tipo Jason en $params
//$params = json_decode($json);
// Conexion a la BD
require("../conexion.php");
$ins = "insert into producto (nombre,proveedor,stock,v_compra,v_venta) values ('Medias','1',510,3,4)";

//$ins = "insert into producto (nombre,proveedor,stock,v_compra,v_venta) values ('$params ->nombre','$params ->proveedor',$params ->stock','$params ->v_compra','$params ->v_venta')";
mysqli_query($conexion,$ins) or die("NO insertó producto");


class Result {}
$response = new Result();
$response -> resultado ='Ok';
$response -> mensaje ='Datos productos insertados';


header('Content-Type: application/json');
echo json_encode($response);

?>