<?php
require_once "Conexion.php";

class NuevoProducto
{

	public function AddProducto($codigo,$producto,$IDproveedor,$numFactura,$fecEmision,$numserie,$IDFamilia,$IDSubFam,$IDmarca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$preUnitario,$marGanancia1,$marGanancia2,$marGanancia3,$precioVenta1,$precioVenta2,$precioVenta3,$cantidad,$IDAlmacen,$pro_color,$pro_incluye,$pro_fecRegistro,$IDPersonal,$estadoActivo,$obs,$parte){


		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();

		$sql ="INSERT INTO productos VALUES (NULL,'$codigo','$producto','$IDproveedor','$numFactura','$fecEmision','$numserie','$IDFamilia','$IDSubFam','$IDmarca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$preUnitario','$marGanancia1','$marGanancia2','$marGanancia3','$precioVenta1','$precioVenta2','$precioVenta3','$cantidad','$IDAlmacen','$pro_color','$pro_incluye','$pro_fecRegistro','$IDPersonal','$estadoActivo','$obs','$parte');";

		if (!$mysqli->query($sql)) {
 		  echo("Error description: " . mysqli_error($mysqli));
		}

		$mysqli->close();
		echo "Guardado";
	}
}

?>