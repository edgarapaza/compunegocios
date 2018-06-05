<?php

require_once "Conexion.php";

class NuevoProducto
{
	private $conn;

	function __construct()
	{
		$con = new Conexion();
		$this->conn = $con->Conectarse();
		return $this->conn;
	}

	public function AddProducto($codigo,$descripcion,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$stockmin,$color,$incluye,$fecAlta,$idfamilia,$idalmacen,$parte,$idsubfamilia,$total,$idpersonal,$idproveedor, $factura, $feccompra, $idregistro)
	{
		
		$flag = true;
		/*****************************************************************************
		*   REGISTRO DE PRODUCTOS DE MANERA INDIVIDUAL EN LA TABLA
		*******************************************************************************/
				
		$sql = "INSERT INTO productos (idproducto,codigo,idfamilia,idsubfamilia,numserie,marca,modelo,tipoUnidad,tipArticulo,descripcion,PVP,marGanancia1,marGanancia2,marGanancia3,precventa1,precventa2,precventa3,stocktotal,color,incluye,parte,stockmin,idpersonal,fecAlta,idalmacen,total) VALUES (NULL,'$codigo','$idfamilia','$idsubfamilia','$numserie','$marca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$PVP','$marGanancia1','$marGanancia2','$marGanancia3','$precventa1','$precventa2','$precventa3','$stocktotal','$color','$incluye','$parte', '$stockmin', '$idpersonal', '$fecAlta' , '$idalmacen', '$total')";

				if (!$this->conn->query($sql)) {
		 		  echo("Error AddProducto: " . mysqli_error($this->conn));
		 		  $flag = false;
				}

				/************************************************************************
									busca el Ultimo codigo para su ingreso
				*************************************************************************/				

					$ultimo_codigo = "SELECT idproducto FROM productos ORDER BY idproducto DESC LIMIT 1";

					if(!$result2 = $this->conn->query($ultimo_codigo)){
						echo("Error Ultimo Registro: " . mysqli_error($this->conn));
						$flag = false;
					}

				$ultimo_cod = $result2->fetch_array();

				/************************************************************************
									REGISTRO DE PRODUCTOS EN LA TABLA REGISTRO_PRODUCTO
				*************************************************************************/

				$sqlregistro = "INSERT INTO registroproductos (idregistrop,idregistro,idproducto,fecregistro) VALUES (NULL,'$idregistro','$ultimo_cod[0]',now())";

				if(!$this->conn->query($sqlregistro)){
					echo("Error Registro productos: " . mysqli_error($this->conn));
					$flag = false;
				}

			  

				/************************************************************************
									INGRESO DE COMPRA PROVEEDOR
				*************************************************************************/

			
				$sql2 = "INSERT INTO compraprovedor (idcompra, idproducto, codigo, idproveedor, cantidad, pvp, numfactura, feccompra, idpersonal, idregistro) VALUES (NULL,'$ultimo_cod[0]','$codigo','$idproveedor','$stocktotal','$PVP','$factura','$feccompra', '$idpersonal', '$idregistro')";

				if(!$this->conn->query($sql2)){
					echo("Error Insertando compraprovedor: " . mysqli_error($this->conn));
					$flag = false;
				}

				if($flag === true){
					echo "Producto Guardado !!!";
					return 0;
				}else{
					echo "Error";
					return 1;
				}
			
		mysqli_close($this->conn);
	}
}
?>
