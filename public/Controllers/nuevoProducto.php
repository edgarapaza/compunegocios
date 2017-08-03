<?php
require_once "../Models/newproducto.class.php";
$newProducto    = new NewProducto();

$codproveedor   = $_REQUEST['codproveedor'];
$producto       = trim(strtoupper($_REQUEST['producto']));
$numfactura     = trim($_REQUEST['numFactura']);
$fechaEmision   = $_REQUEST['fechaEmision'];
$numserie       = trim(strtoupper($_REQUEST['numserie']));
$idfamilia      = $_REQUEST['familia'];
$idsubfamilia   = $_REQUEST['subfamilia'];
$idmarca        = $_REQUEST['marca'];
$modelo         = trim(strtoupper($_REQUEST['modelo']));
$tipoUnidad     = $_REQUEST['tipoUnidad'];
$tipoArticulo   = $_REQUEST['tipoArticulo'];
$descripcion    = ucfirst(strtolower($_REQUEST['Descripcion']));
$precioUnitario = $_REQUEST['precioUnitario'];
$margenGanancia = $_REQUEST['margenGanancia'];
$precioVenta    = $_REQUEST['precioVenta'];
$cantidad       = $_REQUEST['cantidad'];
$idalmacen      = $_REQUEST['idalmacen'];
$pro_peso       = $_REQUEST['peso'];
$pro_tamano     = $_REQUEST['tamano'];
$pro_alto       = $_REQUEST['alto'];
$pro_largo      = $_REQUEST['largo'];
$pro_ancho      = $_REQUEST['ancho'];
$pro_color      = trim(ucfirst(strtolower($_REQUEST['color'])));
$pro_incluye    = trim(ucfirst(strtolower($_REQUEST['incluye'])));
$obs            = trim(ucfirst(strtolower($_REQUEST['observaciones'])));
$imagen         = "NULL";
$idpersonal   = $_REQUEST['idpersonal'];

$newProducto->AddProducto($codproveedor,$producto, $numfactura,$fechaEmision,$numserie,$idfamilia,$idsubfamilia,$idmarca,$modelo,$tipoUnidad,$tipoArticulo,$descripcion,$precioUnitario,$margenGanancia,$precioVenta,$cantidad,$pro_peso,$pro_tamano,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$obs,$imagen,$idalmacen,$idpersonal);
header("Location: ../nuevoProducto.php");
?>
