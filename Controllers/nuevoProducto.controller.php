<?php
require_once "../Models/newproducto.class.php";

$nuevopro = new NuevoProducto();

$idproveedor  = trim($_POST['idproveedor']);
$idfamilia    = trim($_POST['famil']);
$idsubfamilia = trim($_POST['subfam']);
$numserie     = trim(strtoupper($_POST['varserie']));
$marca        = trim($_POST['mimarca']);
$modelo       = trim(strtoupper($_POST['model']));
$tipoUnidad   = trim($_POST['tipuni']);
$tipArticulo  = trim($_POST['tipart']);
$descripcion  = trim(ucfirst(strtoupper($_POST['descripcion'])));
$PVP          = trim($_POST['pvp']);
$marGanancia1 = trim($_POST['marge1']);
$marGanancia2 = trim($_POST['marge2']);
$marGanancia3 = trim($_POST['marge3']);
$precventa1   = trim($_POST['preven1']);
$precventa2   = trim($_POST['preven2']);
$precventa3   = trim($_POST['preven3']);
$stocktotal   = trim($_POST['stock']);
$color        = trim(ucfirst(strtoupper($_POST['color'])));
$incluye      = trim(ucfirst(strtoupper($_POST['inclu'])));
$parte        = trim(strtoupper($_POST['partee']));
$idalmacen    = trim($_POST['almacen']);
$codigo       = trim(strtoupper($_POST['cod']));
$total        = trim($_POST['total']);
$factura      = trim($_POST['factura']);
$feccompra    = trim($_POST['feccompra']);

$idpersonal   = trim($_POST['idpers']);
$stockmin     = 10;

$fecAlta      = date('Y-m-d H:m:s');
#$estado       = 1;

$nuevopro->AddProducto($codigo,$descripcion,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$stockmin,$color,$incluye,$fecAlta,$idfamilia,$idalmacen,$parte,$idsubfamilia,$total,$idpersonal,$idproveedor, $factura, $feccompra);

?>
