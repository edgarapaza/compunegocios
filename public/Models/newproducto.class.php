<?php
require_once "Conexion.php";

$conn = new Conexion();
#echo $conn->link->host_info. " Dentro de la clase";


$produ           = $_REQUEST['produ'];
$idproveedor     = $_REQUEST['prove'];
$factura         = $_REQUEST['factura'];
$fecha           = $_REQUEST['fecha'];
$serie           = $_REQUEST['varserie'];
$idfamila        = $_REQUEST['famil'];
$idsubfamilia    = $_REQUEST['subfam'];
$idmarca         = $_REQUEST['mimarca'];
$model           = $_REQUEST['model'];
$tipuni          = $_REQUEST['tipuni'];
$tipart          = $_REQUEST['tipart'];
$descr           = $_REQUEST['descr'];
$preuni          = $_REQUEST['preuni'];
$margen1         = $_REQUEST['marge1'];
$margen2         = $_REQUEST['marge2'];
$margen3         = $_REQUEST['marge3'];
$preventa1       = $_REQUEST['preven1'];
$preventa2       = $_REQUEST['preven2'];
$preventa3       = $_REQUEST['preven3'];
$cantidad        = $_REQUEST['cantida'];
$idalmacen       = $_REQUEST['almace'];
$color           = $_REQUEST['color'];
$incluye         = $_REQUEST['inclu'];
$pro_fecRegistro = date('Y-m-d H:m:s');
$idpersonal      = $_REQUEST['idpers'];
$obs             = $_REQUEST['obser'];
$parte           = $_REQUEST['partee'];


$sql = "INSERT INTO productos (IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia1,marGanancia2,marGanancia3,precioVenta1,precioVenta2,precioVenta3,cantidad,IDAlmacen,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,obs, parte) VALUES (NULL,'$produ','$idproveedor','$factura','$fecha','$serie','$idfamila','$idsubfamilia','$idmarca','$model','$tipuni','$tipart','$descr','$preuni','$margen1','$margen2','$margen3','$preventa1','$preventa2','$preventa3','$cantidad','$idalmacen','$color','$incluye','$pro_fecRegistro','$idpersonal','$obs','$parte')";
$conn->link->query($sql);

echo "<strong>Guardado</strong> correctamente ...";
?>