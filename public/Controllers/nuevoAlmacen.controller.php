<?php
require "../Models/almacen.class.php";

$tienda      = ucfirst(strtolower($_POST['tienda']));
$descripcion = ucfirst(strtolower($_POST['descripcion']));
$direccion   = ucfirst(strtolower($_POST['direccion']));
$telefono    = ucfirst(strtolower($_POST['telefono']));
$idpersonal  = ucfirst(strtolower($_POST['idpersonal']));


$almacen = new Almacen();
$res = $almacen->Duplicado($tienda, $descripcion, $direccion, $telefono, $idpersonal);

if($res > 0){
	header("Location: ../landing.php?msg=Duplicado");
}else{
	header("Location: ../landing.php?msg=Guardado exitosamente");
}
?>