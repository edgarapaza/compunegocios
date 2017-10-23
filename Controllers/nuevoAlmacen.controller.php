<?php
require "../Models/almacen.class.php";

$tienda      = ucfirst(strtolower($_POST['tienda']));
$descripcion = ucfirst(strtolower($_POST['descripcion']));
$direccion   = ucfirst(strtolower($_POST['direccion']));
$telefono    = $_POST['telefono'];
$idpersonal  = $_POST['idpersonal'];

$almacen = new Almacen();
$almacen->AddAlmacen($tienda,$descripcion,$direccion,$telefono,$idpersonal);
header("Location: ../inicio.html");
?>