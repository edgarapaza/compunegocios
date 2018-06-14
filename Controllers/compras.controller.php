<?php 
require_once "../Models/compras.model.php";

$compra = new Compras();


$idcompra    = $_REQUEST['idcompra'];
$idproveedor = $_REQUEST['idproveedor'];
$idproducto  = $_REQUEST['idproducto'];
$cantidad    = $_REQUEST['stocktotal'];
$pvp         = $_REQUEST['precioventa'];
$mg1         = $_REQUEST['margenGanancia1'];
$mg2         = $_REQUEST['margenGanancia2'];
$mg3         = $_REQUEST['margenGanancia3'];
$pv1         = $_REQUEST['precioVenta1'];
$pv2         = $_REQUEST['precioVenta2'];
$pv3         = $_REQUEST['precioVenta3'];
$numfactura  = $_REQUEST['numfactura'];
$codgen      = $_REQUEST['codigogenerado'];
$idregistro  = $_REQUEST['idregistro'];

$res = $compra->GuardarCompra($idcompra, $cantidad, $pvp, $idproducto, $mg1, $mg2, $mg3, $pv1, $pv2, $pv3, $numfactura, $idproveedor, $codgen);

header("Location: ../Views/stock1.php?codigo=$idproveedor&idregistro=$idregistro");
?>