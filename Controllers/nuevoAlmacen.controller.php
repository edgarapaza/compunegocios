<?php
require "../Models/almacen.class.php";

$tienda      = ucfirst(strtolower($_POST['almacen']));
$descripcion = ucfirst(strtolower($_POST['descripcion']));
$direccion   = ucfirst(strtolower($_POST['direccion']));
$telefono    = $_POST['telefono'];
$idpersonal  = $_SESSION['administrador'];

$almacen = new Almacen();
$almacen->AddAlmacen($tienda,$descripcion,$direccion,$telefono,$idpersonal);
header("Location: ../inicio.html");
?>