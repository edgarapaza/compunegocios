<?php
require_once "Conexion.php";

class NuevoProducto
{

	public function AddProducto($codigo,$descripcion,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$stockmin,$color,$incluye,$fecAlta,$idfamilia,$IDPersonal,$idalmacen,$parte,$idsubfamilia,$total)
	{


		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();


				
				$sql = "INSERT INTO compu.productos (idproducto,idfamilia,idsubfamilia,numserie,marca,modelo,tipoUnidad,tipArticulo,descripcion,PVP,marGanancia1,marGanancia2,marGanancia3,precventa1,precventa2,precventa3,stocktotal,color,incluye,parte,stockmin,IDPersonal,fecAlta,idalmacen,total,codigo) VALUES (NULL,'$idfamilia','$idsubfamilia','$numserie','$marca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$PVP', '$marGanancia1','$marGanancia2','$marGanancia3','$precventa1','$precventa2','$precventa3','$stocktotal','$color','$incluye', '$parte','$stockmin','$IDPersonal','$fecAlta','$idalmacen','$total','$codigo')";

				if (!$mysqli->query($sql)) {
		 		  echo("Error description: " . mysqli_error($mysqli));
				}

				//$ultimo_codigo = "SELECT idproducto FROM productos ORDER BY idproducto DESC LIMIT 1;";
				//$result2 = $mysqli->query($ultimo_codigo);

				//$valor = $result2->fetch_array();
				//$sql2 = "INSERT INTO compra VALUES(null, '$valor[0]', '$idproveedor', '$numFactura', '$fecAlta', '$idalmacen','$numparte');";

				

				echo "<span class='alert alert-success'>Producto Guardado!!!</span>";
			
		/*
		}else{
			echo("Error description: " . mysqli_error($mysqli));
		}*/

		mysqli_close($mysqli);
	}
}
?>
