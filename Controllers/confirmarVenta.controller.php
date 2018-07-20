<?php
session_start();
require_once "../Models/guardarVenta.model.php";

$codigo   = $_POST['codigo'];
$precio   = $_POST['precio'];
$cantidad = $_POST['txtcantidad'];
$codprodgen  = $_POST['codprodgen'];

$total    = $precio * $cantidad;

$idpersonal = $_SESSION['administrador'];


$guardar = new GuardarVenta();
$guardar->Guardar($codigo,$precio,$cantidad,$total,$codprodgen,$idpersonal);

?>