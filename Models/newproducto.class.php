<?php
require_once "Conexion.php";

class NuevoProducto
{

	public function AddProducto($codigo,$descripcion,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$stockmin,$color,$incluye,$fecAlta,$idfamilia,$idalmacen,$parte,$idsubfamilia,$total,$idpersonal,$idproveedor, $factura, $feccompra, $idregistro)
	{


		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();

				/******************************************************************************
				*   REGISTRO DE PRODUCTOS DE MANERA INDIVIDUAL EN LA TABLA
				*   ******************************************************************************/
				$sql = "INSERT INTO productos 
				(idproducto,codigo,idfamilia,idsubfamilia,numserie,marca,modelo,tipoUnidad,tipArticulo,descripcion,PVP,marGanancia1,marGanancia2,marGanancia3,precventa1,precventa2,precventa3,stocktotal,color,incluye,parte,stockmin,idpersonal,fecAlta,idalmacen,total) 
				VALUES
				(NULL,'$codigo','$idfamilia','$idsubfamilia','$numserie','$marca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$PVP', '$marGanancia1','$marGanancia2','$marGanancia3','$precventa1','$precventa2','$precventa3','$stocktotal','$color','$incluye', '$parte','$stockmin','$idpersonal',now(),'$idalmacen','$total')";

				if (!$mysqli->query($sql)) {
		 		  echo("Error description: " . mysqli_error($mysqli));
				}

				/************************************************************************
									busca el Ultimo codigo para su ingreso
				*************************************************************************/				

				$ultimo_codigo = "SELECT idproducto FROM productos ORDER BY idproducto DESC LIMIT 1;";
				if(!$result2 = $mysqli->query($ultimo_codigo)){
					echo("Error Ultimo Registro: " . mysqli_error($mysqli));
				}

				$ultimo_cod = $result2->fetch_array();

				/************************************************************************
									REGISTRO DE PRODUCTOS EN LA TABLA REGISTRO_PRODUCTO
				*************************************************************************/

				$sqlregistro = "INSERT INTO registroproductos (idregistrop,idregistro,idproducto,fecregistro) VALUES (NULL,'$idregistro','$ultimo_cod[0]',now())";

				if(!$mysqli->query($sqlregistro)){
					echo("Error Registro productos: " . mysqli_error($mysqli));
				}

			  

				/************************************************************************
									INGRESO DE COMPRA PROVEEDRO
				*************************************************************************/

				$sql2 = "INSERT INTO compraprovedor (idcompra,idproducto,codigo, idproveedor,cantidad,pvp,numfactura,feccompra,idpersonal, idregistro)
					VALUES (NULL,'$ultimo_cod[0]','$codigo','$idproveedor','$stocktotal','$PVP','$factura','$feccompra','$idpersonal','$idregistro')";

				if(!$mysqli->query($sql2)){
					echo("Error Insertando compraVendedor: " . mysqli_error($mysqli));
				}
				

				echo "<span class='alert alert-success'>Producto Guardado!!!</span>";
			
		mysqli_close($mysqli);
	}
}
?>
