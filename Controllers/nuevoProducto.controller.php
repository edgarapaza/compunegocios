<?php
require_once "../Models/newproducto.class.php";
require_once "../Models/nuevoProducto.class.php";

$nuevopro = new NuevoProducto();



$IDproveedor  = $_POST['provedor'];
$numFactura   = trim(strtoupper($_POST['factura']));
$fecEmision   = trim($_POST['fecha']);
$parte        = trim(strtoupper($_POST['partee']));
$producto     = trim(strtoupper($_POST['producto']));
$numserie     = trim(strtoupper($_POST['varserie']));
$IDFamilia    = trim($_POST['famil']);
$IDSubFam     = trim($_POST['subfam']);
$IDmarca      = trim($_POST['mimarca']);
$modelo       = trim(strtoupper($_POST['model']));
$tipoUnidad   = trim($_POST['tipuni']);
$tipArticulo  = trim($_POST['tipart']);
$descripcion  = trim(ucfirst(strtoupper($_POST['descr'])));
$preUnitario  = trim($_POST['preuni']);
$marGanancia1 = trim($_POST['marge1']);
$marGanancia2 = trim($_POST['marge2']);
$marGanancia3 = trim($_POST['marge3']);
$precioVenta1 = trim($_POST['preven1']);
$precioVenta2 = trim($_POST['preven2']);
$precioVenta3 = trim($_POST['preven3']);
$cantidad     = trim($_POST['cantida']);
$IDAlmacen    = trim($_POST['almacen']);
$pro_color    = trim(ucfirst(strtoupper($_POST['color'])));
$pro_incluye  = trim(ucfirst(strtoupper($_POST['inclu'])));
$obs          = trim(ucfirst(strtoupper($_POST['obser'])));
$IDPersonal   = trim($_POST['idpers']);
$codigo       = trim($_POST['cod']);


/*


echo "<br>";
echo "dato 1:-----".$IDproveedor    ."<br>";
echo "dato 2".$numFactura      ."<br>";
echo "dato 3".$fecEmision    ."<br>";
echo "dato 4".$parte        ."<br>";
echo "dato 5".$producto        ."<br>";
echo "dato 7".$IDFamilia       ."<br>";
echo "dato 8".$IDSubFam    ."<br>";
echo "dato 9".$IDmarca         ."<br>";
echo "dato 10".$modelo          ."<br>";
echo "dato 11".$tipoUnidad      ."<br>";
echo "dato 12".$tipArticulo    ."<br>";
echo "dato 13".$descripcion     ."<br>";
echo "dato 14".$preUnitario  ."<br>";
echo "dato 15".$marGanancia1 ."<br>";
echo "dato 16".$marGanancia2 ."<br>";
echo "dato 17".$marGanancia3 ."<br>";
echo "dato 18".$precioVenta1    ."<br>";
echo "dato 19".$precioVenta2    ."<br>";
echo "dato 20".$precioVenta3    ."<br>";
echo "dato 21".$cantidad        ."<br>";
echo "dato 22".$IDAlmacen       ."<br>";
echo "dato 23".$pro_color       ."<br>";
echo "dato 24".$pro_incluye     ."<br>";
echo "dato 25".$obs             ."<br>";
echo "dato 26: ----Codigo : ".$codigo             ."<br>";
echo "dato 26: Personal".$IDPersonal      ."<br>";
echo "dato 6: --- ".$numserie        ."<br>";


*/
$pro_fecRegistro = date('Y-m-d H:m:s');
$estadoActivo = 1;

$nuevopro->AddProducto($codigo,$producto,$IDproveedor,$numFactura,$fecEmision,$numserie,$IDFamilia,$IDSubFam,$IDmarca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$preUnitario,$marGanancia1,$marGanancia2,$marGanancia3,$precioVenta1,$precioVenta2,$precioVenta3,$cantidad,$IDAlmacen,$pro_color,$pro_incluye,$pro_fecRegistro,$IDPersonal,$estadoActivo,$obs,$parte);

?>