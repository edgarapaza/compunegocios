<?php

require_once "../Models/guardarVenta.model.php";

$codigo   = $_POST['codigo'];
$precio   = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$codprodgen  = $_POST['codprodgen'];

$total    = $precio * $cantidad;

//$idpersonal = $_SESSION['personal'];
echo "Cantidad recivida : ".$cantidad;

$guardar = new GuardarVenta();
$guardar->Guardar($codigo,$precio,$cantidad,$total,$codprodgen);

header("Location: ../Views/productos_listado.php");

?>