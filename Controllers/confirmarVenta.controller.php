<?php

require_once "../Models/guardarVenta.model.php";

$codigo   = $_POST['codigo'];
$precio   = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$codprodgen  = $_POST['codprodgen'];

$total    = $precio * $cantidad;

//$idpersonal = $_SESSION['personal'];


$guardar = new GuardarVenta();
$guardar->Guardar($codigo,$precio,$cantidad,$total,$codprodgen);
header("Location: ../tienda/confirma.php");

?>