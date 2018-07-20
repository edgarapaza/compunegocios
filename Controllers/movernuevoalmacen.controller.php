<?php 
session_start();
require_once "../Models/moveralmacen.model.php";

$mover = new MoverAlmacen();


$idalmacenanterior = $_REQUEST['idalmacenanterior'];
$idproducto        = $_REQUEST['idproducto'];
$stock             = $_REQUEST['stock'];
$nuevoalmacen      = $_REQUEST['nuevoalmacen'];
$stockMover        = $_REQUEST['stockMover'];

$idpersonal        = $_SESSION['administrador'];

$resta = $stock - $stockMover;

#printf("Almacen: %s producto: %s Stock: %s Nuevo almacen: %s Stock Mover: %s.  Resta: %d ",$idalmacenanterior, $idproducto, $stock, $nuevoalmacen, $stockMover, $resta);



if($resta == 0){
	if($stock == 1){
		$mover->MoveraNuevoAlmacenCero($idalmacenanterior, $nuevoalmacen,$idproducto, $idpersonal, $stockMover, $resta);
		
		
	}else{
		echo "Error. La cantidad excede al que se tiene en almacen";	
	}
	
}else{
	$mover->MoveraNuevoAlmacen($idalmacenanterior, $nuevoalmacen,$idproducto, $idpersonal, $stockMover, $resta);
	
}


?>