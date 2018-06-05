<?php 
require_once "../Models/paquete.model.php";
$paq = new Paquete();

date_default_timezone_set('UTC-5');

$idproducto = $_REQUEST['id'];

#echo "Valor recidivo: " . $idproducto;

$cod_temp =  $paq->GenerarPaqueteSuma();
echo " Codigo Temporal: ".$cod_temp;

$data = $paq->Detalleproducto($idproducto);

$fecalta  = date('Y-m-d h:i:s');
$producto = $data['producto'];
$modelo   = $data['modelo'];
$precio   = $data['precio'];
$cantidad = 1;
$subtotal = $precio * $cantidad;

#echo "Sub total" . $subtotal;

$paq->InsertPaqueteTemporal($fecalta,$idproducto,$producto,$modelo, $precio, $cantidad, $subtotal, $cod_temp);
header("Location: ../Views/paquetes.php");
?>