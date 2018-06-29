<?php
session_start();
require "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();

$idalmacen_anterior = $_REQUEST['idalmacenanterior'];
$idproducto         = $_REQUEST['idproducto'];
$idalmacen_nuevo    = $_REQUEST['nuevoalmacen'];
$cantidadMover      = $_REQUEST['cantidadMover'];


$idpersonal         = $_SESSION['administrador'];

printf("Cod Almacen Anterio: %d - Cod Nuevo almacen: %d - producto: %d . Cantidad Movida %d.", $idalmacen_anterior, $idalmacen_nuevo, $idproducto, $cantidadMover);

if($idalmacen_anterior == $idalmacen_nuevo){
	printf("Es el mismo almacen");
	//header("Location: ../Views/confirmacion2.php?msg='Es el mismo almacen'");
}else{
	$todo = $mover->MoveraNuevoAlmacen($idalmacen_anterior,$idalmacen_nuevo,$idproducto,$idpersonal);
	//header("Location: ../Views/confirmacion2.php?msg='CAMBIO de Almacen realizado.'");
}