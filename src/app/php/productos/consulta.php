<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-Width, Content-Type,Accept');

require("../conexion.php");
$con = "select * from producto order by nombre";
$res = mysqli_query($conexion,$con) or die("NO consultó productos");
$vec = [];
while ($reg  = mysqli_fetch_array($res))
{
    $vec[]=$reg;
}
$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');
?>