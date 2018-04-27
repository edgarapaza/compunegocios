<?php 
include "../Models/registroprovprod.model.php";

$idproveedor = $_REQUEST['codigo'];

$reg = new RegistroProveedorProducto();
$last = $reg->RegistroProveProd($idproveedor);

//$last = $reg->UltimoRegistro();
echo "Ultimo codigo: ".$last[0];

header("Location: ../Views/stock1.php?codigo=". $idproveedor ."&idregistro=".$last[0]);
 ?>