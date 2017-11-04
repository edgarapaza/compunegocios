<?php
require_once "Conexion.php";

class NuevoProducto
{

	public function AddProducto($codigo,$producto,$IDproveedor,$numFactura,$fecEmision,$numserie,$IDFamilia,$IDSubFam,$IDmarca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$preUnitario,$marGanancia1,$marGanancia2,$marGanancia3,$precioVenta1,$precioVenta2,$precioVenta3,$cantidad,$IDAlmacen,$pro_color,$pro_incluye,$pro_fecRegistro,$IDPersonal,$estadoActivo,$obs,$parte){


		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();

		$duplicado = "SELECT IDproducto FROM productos WHERE codigo = '$codigo' AND producto = '$producto' and IDproveedor = '$IDproveedor' AND IDmarca='$IDmarca' AND preUnitario = '$preUnitario'";

		if($res = $mysqli->query($duplicado))
		{
			$num = $res->num_rows;

			if($num == 0){

				$sql ="INSERT INTO productos VALUES (NULL,'$codigo','$producto','$IDproveedor','$numFactura','$fecEmision','$numserie','$IDFamilia','$IDSubFam','$IDmarca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$preUnitario','$marGanancia1','$marGanancia2','$marGanancia3','$precioVenta1','$precioVenta2','$precioVenta3','$cantidad','$IDAlmacen','$pro_color','$pro_incluye','$pro_fecRegistro','$IDPersonal','$estadoActivo','$obs','$parte')";

				if (!$mysqli->query($sql)) {
		 		  echo("Error description: " . mysqli_error($mysqli));
		 		  exit;
				}

				echo "<span class='alert alert-success'>Producto Guardado!!!</span>";
			}else{
				echo "<span class='alert alert-danger'>Alerta!... Dato duplicado.</span>";
			}

			$res->close();

		}else{
			echo("Error description: " . mysqli_error($mysqli));
		}

		$mysqli->close();
	}
}

?>
