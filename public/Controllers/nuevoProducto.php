<?php
require_once "../Models/newproducto.class.php";
$newProducto = new NewProducto();

$idprovedor     = $_REQUEST['provedor'];
$numfactura     = $_REQUEST['numfactura'];
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
$pro_peso       = $_REQUEST[''];
$pro_tamaño     = $_REQUEST[''];
$pro_alto       = $_REQUEST[''];
$pro_largo      = $_REQUEST[''];
$pro_ancho      = $_REQUEST[''];
$pro_color      = $_REQUEST[''];
$pro_incluye    = $_REQUEST[''];
$alertAmbar     = $_REQUEST[''];
$alertRojo      = $_REQUEST[''];
$estadoActivo   = $_REQUEST[''];
$obs            = $_REQUEST[''];
$imagen         = $_REQUEST[''];

$newProducto->AddProducto($IDproveedor,$numFactura,$fecEmision,$numserie,$IDFamilia,$IDSubFam,$IDmarca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$preUnitario,$marGanancia,$precioVenta,$cantidad,$pro_peso,$pro_tamaño,$pro_alto,$pro_largo,$pro_ancho,$pro_color,$pro_incluye,$pro_fecRegistro,$alertAmbar,$alertRojo,$estadoActivo,$obs,$imagen);

header("Location: ../nuevoProducto.php");
?>