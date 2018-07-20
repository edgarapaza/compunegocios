<?php
session_start();

require_once "../Models/newproducto.class.php";

$nuevopro = new NuevoProducto();

$idfamilia    = trim($_POST['famil']);
$idsubfamilia = trim($_POST['subfam']);
$numserie     = trim(strtoupper($_POST['varserie']));
$marca        = trim(strtoupper($_POST['mimarca']));
$modelo       = trim(strtoupper($_POST['model']));
$tipoUnidad   = trim($_POST['tipuni']);
$tipArticulo  = trim($_POST['tipart']);
$descripcion  = trim(strtoupper($_POST['descripcion']));
$PVP          = floatval(trim($_POST['pvp']));
$marGanancia1 = trim($_POST['marge1']);
$marGanancia2 = trim($_POST['marge2']);
$marGanancia3 = trim($_POST['marge3']);
$precventa1   = floatval(trim($_POST['preven1']));
$precventa2   = floatval(trim($_POST['preven2']));
$precventa3   = floatval(trim($_POST['preven3']));
$stocktotal   = trim($_POST['stock']);
$color        = trim(strtoupper($_POST['color']));
$incluye      = trim(strtoupper($_POST['inclu']));
$parte        = trim(strtoupper($_POST['partee']));
$idpersonal   = $_SESSION['administrador'];
$idalmacen    = 1;
$total        = floatval(trim($_POST['total']));
$idregistro   = trim($_POST['idregistro']);
$idproveedor  = trim($_POST['idproveedor']);
$factura      = trim($_POST['factura']);
$feccompra    = trim($_POST['feccompra']);

$fecAlta      = date('Y-m-d H:m:s');

#printf("idalmacen: %s, codigo: %s, total: %s, factura: %s", $idalmacen, $codigo, $total ,$factura);

$nuevopro->AddProducto($idfamilia,$idsubfamilia,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$color,$incluye,$parte,$idpersonal,$fecAlta,$idalmacen,$total,$idregistro,$idproveedor,$factura,$feccompra);
?>
