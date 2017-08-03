<?php
$data = json_decode(stripslashes($_REQUEST['datos']));

require_once "../Models/newproducto.class.php";
$newProducto    = new NewProducto();
//[prove,factu,fecha,produ,partee,famil,subfam,mimarca,descr,model,tipuni,tipart,preuni,marge1,marge2,marge3,preven1,preven2,preven3,cantid,almace,color,inclu,obser,idpers,serie.value]

$producto        = trim(strtoupper($data[3]));
$codproveedor    = $data[0];
$numfactura      = trim($data[1]);
$fechaEmision    = $data[2];
$numserie        = trim(strtoupper($data[25]));
$idfamilia       = $data[5];
$idsubfamilia    = $data[6];
$idmarca         = $data[7];
$modelo          = trim(strtoupper($data[9]));
$tipoUnidad      = $data[10];
$tipoArticulo    = $data[11];
$descripcion     = ucfirst(strtolower($data[8]));
$precioUnitario  = $data[12];
$margenGanancia1 = $data[13];
$margenGanancia2 = $data[14];
$margenGanancia3 = $data[15];
$precioVenta1    = $data[16];
$precioVenta2    = $data[17];
$precioVenta3    = $data[18];
$cantidad        = $data[19];
$idalmacen       = $data[20];
$pro_color       = trim(ucfirst(strtolower($data[21])));
$pro_incluye     = trim(ucfirst(strtolower($data[22])));
$obs             = trim(ucfirst(strtolower($data[23])));
$imagen          = "NULL";
$idpersonal      = $data[24];

$res = $newProducto->AddProducto($codproveedor,$producto,$numfactura,$fechaEmision,$numserie,$idfamilia,$idsubfamilia,$idmarca,$modelo,$tipoUnidad,$tipoArticulo,$descripcion,$precioUnitario,$margenGanancia1,$margenGanancia2,$margenGanancia3,$precioVenta1,$precioVenta2,$precioVenta3,$cantidad,$pro_color,$pro_incluye,$obs,$imagen,$idalmacen,$idpersonal);

if($res == "exito"){
	echo "Datos almacenados";
}else{
	echo "alert('No se pudo ingresar')";
}

#header("Location: ../nuevoProducto.php");
?>
