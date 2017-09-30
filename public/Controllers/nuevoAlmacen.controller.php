<?php
require "../Models/almacen.class.php";
$almacen = new Almacen();

$tienda   = ucfirst(strtolower($_POST['tienda']));
$descripcion = ucfirst(strtolower($_POST['ubicacion']));
$direccion= ucfirst(strtolower($_POST['direccion']));
$telefono = ucfirst(strtolower($_POST['telefono']));
$idpersonal= ucfirst(strtolower($_POST['personal']));

$res = $almacen->AddAlmacen($tienda, $descripcion, $direccion, $telefono, $idpersonal);

?>