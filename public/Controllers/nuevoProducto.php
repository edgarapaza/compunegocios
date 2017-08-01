<?php
session_start();
if(isset($_SESSION['administrador'])){


$IDPersonal = $_SESSION['administrador'];

require_once "../Models/newproducto.class.php";
$newProducto    = new NewProducto();

$codproveedor   = $_REQUEST['codproveedor'];
$producto       = $_REQUEST['producto'];
$numfactura     = $_REQUEST['numFactura'];
$fechaEmision   = $_REQUEST['fechaEmision'];

$numserie       = strtoupper($_REQUEST['numserie']);
$idfamilia      = $_REQUEST['familia'];
$idsubfamilia   = $_REQUEST['subfamilia'];
$idmarca        = $_REQUEST['marca'];
$modelo         = strtoupper(($_REQUEST['modelo']));
$tipoUnidad     = $_REQUEST['tipoUnidad'];
$tipoArticulo   = $_REQUEST['tipoArticulo'];
$descripcion    = ucfirst(strtolower($_REQUEST['Descripcion']));
$precioUnitario = $_REQUEST['precioUnitario'];
$margenGanancia = $_REQUEST['margenGanancia'];
$precioVenta    = $_REQUEST['precioVenta'];
$cantidad       = $_REQUEST['cantidad'];
$idalmacen      = $_REQUEST['idalmacen'];
$pro_peso       = $_REQUEST['peso'];
$pro_tamaño     = $_REQUEST['size'];
$pro_alto       = $_REQUEST['alto'];
$pro_largo      = $_REQUEST['largo'];
$pro_ancho      = $_REQUEST['ancho'];
$pro_color      = ucfirst(strtolower($_REQUEST['color']));
$pro_incluye    = ucfirst(strtolower($_REQUEST['incluye']));
$obs            = ucfirst(strtolower($_REQUEST['observaciones']));
$imagen         = "NULL";

$newProducto->AddProducto($codproveedor,$producto, $numfactura,$fechaEmision,$numserie,$idfamilia,$idsubfamilia,
	$idmarca,$modelo,$tipoUnidad,$tipoArticulo,$descripcion,$precioUnitario,$margenGanancia,$precioVenta,$cantidad,$pro_peso,$pro_tamaño,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$obs,$imagen,$idalmacen,$IDPersonal);

header("Location: ../nuevoProducto.php");
}
else{
	header("Location: ../index.php");
}
?>