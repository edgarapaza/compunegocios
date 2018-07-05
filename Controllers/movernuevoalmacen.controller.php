<?php 
session_start();
require_once "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();


$idalmacenanterior = $_POST['idalmacenanterior'];
$idproducto        = $_POST['idproducto'];
$stock             = $_POST['stock'];
$nuevoalmacen      = $_POST['nuevoalmacen'];
$stockMover        = $_POST['stockMover'];

$idpersonal        = $_SESSION['administrador'];

$resta = $stock - $stockMover;

printf("Almacen: %s producto: %s Stock: %s Nuevo almacen: %s Stock Mover: %s.  Resta: %d ",$idalmacenanterior, $idproducto, $stock, $nuevoalmacen, $stockMover, $resta);



if($resta <= 0){
	echo "Error. La cantidad excedel al que se tiene en almacen";
}else{
	$mover->MoveraNuevoAlmacen($idalmacenanterior, $nuevoalmacen,$idproducto, $idpersonal, $stockMover, $resta);
	header("Location: ../Views/moveralmacen.php");
}


 ?>