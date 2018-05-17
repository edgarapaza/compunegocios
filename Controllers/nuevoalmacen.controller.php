<?php
session_start();
require "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();

$idalmacen_anterior = $_REQUEST['idalmacenanterior'];
$idalmacen_nuevo    = $_REQUEST['nuevoalmacen'];
$idproducto         = $_REQUEST['idproducto'];

$idpersonal         = $_SESSION['administrador'];

printf("Cod Almacen Anterio: %d - Cod Nuevo almacen: %d - producto: %d", $idalmacen_anterior, $idalmacen_nuevo, $idproducto);

if($idalmacen_anterior == $idalmacen_nuevo){
	printf("Es el mismo almacen");
	header("Location: ../Views/confirmacion2.php?msg='Es el mismo almacen'");
}else{
	$todo = $mover->MoveraNuevoAlmacen($idalmacen_anterior,$idalmacen_nuevo,$idproducto,$idpersonal);
	header("Location: ../Views/confirmacion2.php?msg='CAMBIO de Almacen realizado.'");
}