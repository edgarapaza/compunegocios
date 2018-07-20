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

	public function AddProducto($idfamilia,$idsubfamilia,$numserie,$marca,$modelo,$tipoUnidad,$tipArticulo,$descripcion,$PVP,$marGanancia1,$marGanancia2,$marGanancia3,$precventa1,$precventa2,$precventa3,$stocktotal,$color,$incluye,$parte,$idpersonal,$fecAlta,$idalmacen,$total,$idregistro,$idproveedor,$factura,$feccompra)

	{

		
		$flag = true;

		/************************************************************************
									busca el Ultimo codigo para su ingreso
		*************************************************************************/				

			$sqlUltimoProducto = "SELECT max(idproducto) FROM productos;";

			if (!$result1 = $this->conn->query($sqlUltimoProducto)){
				printf("Error Ultimo Codigo Producto: %s", mysqli_error($this->conn));
				$flag = false;
			}else{

				$ultimoCodigoProducto = $result1->fetch_array();
				#echo $ultimoCodigoProducto[0];
				$id = $ultimoCodigoProducto[0]+1;
				#printf("Siguiente codigo Productos: %s", $next1);
			}
			#########################################################

			$sqlregistroproductos = "SELECT MAX(idregistrop) FROM registroproductos;";

			if (!$result2 = $this->conn->query($sqlregistroproductos)){
				printf("Error Ultimo Codigo Registro Producto: %s", mysqli_error($this->conn));
				$flag = false;
			}else{

				$lastregistroproductos = $result2->fetch_array();
				#echo $ultimoCodigoProducto[0];
				$next2 = $lastregistroproductos[0]+1;
				#printf("Siguiente codigo registroproductos: %s", $next2);
			}

			#######################################################

			$sqlcompraprovedor = "SELECT MAX(idcompra) FROM compraprovedor;";

			if (!$result3 = $this->conn->query($sqlcompraprovedor)){
				printf("Error Ultimo Codigo compra Producto: %s", mysqli_error($this->conn));
				$flag = false;
			}else{

				$lastcompraprovedor = $result3->fetch_array();
				#echo $ultimoCodigoProducto[0];
				$next3 = $lastcompraprovedor[0]+1;
				#printf("Siguiente codigo Compra Proveedor: %s", $next3);
			}

			$codigo = "CN-".$id;

	
		/*****************************************************************************
		*   REGISTRO DE PRODUCTOS DE MANERA INDIVIDUAL EN LA TABLA
		*******************************************************************************/
		
		$sqlprod = "INSERT INTO productos (idproducto,codigo,idfamilia,idsubfamilia,numserie,marca,modelo,tipoUnidad,tipArticulo,
    descripcion,PVP,marGanancia1,marGanancia2,marGanancia3,precventa1,precventa2,precventa3,
    stocktotal,color,incluye,parte,stockmin,idpersonal,fecAlta,idalmacen,total,vendido) 
    VALUES ('$id','$codigo','$idfamilia','$idsubfamilia','$numserie','$marca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$PVP', '$marGanancia1','$marGanancia2','$marGanancia3','$precventa1','$precventa2','$precventa3','$stocktotal','$color','$incluye','$parte',10,'$idpersonal',now(),'$idalmacen','$total','1');";


		
		if (!$this->conn->query($sqlprod)){
			printf("Error insertando producto: %s", mysqli_error($this->conn));
			$flag = false;
		}


		$sqlprodkardex = "INSERT INTO productosKardex (idproducto,codigo,idfamilia,idsubfamilia,numserie,marca,modelo,tipoUnidad,tipArticulo,
    descripcion,PVP,marGanancia1,marGanancia2,marGanancia3,precventa1,precventa2,precventa3,
    stocktotal,color,incluye,parte,stockmin,idpersonal,fecAlta,idalmacen,total,vendido) 
    VALUES ('$id','$codigo','$idfamilia','$idsubfamilia','$numserie','$marca','$modelo','$tipoUnidad','$tipArticulo','$descripcion','$PVP', '$marGanancia1','$marGanancia2','$marGanancia3','$precventa1','$precventa2','$precventa3','$stocktotal','$color','$incluye','$parte',10,'$idpersonal',now(),'$idalmacen','$total','1');";

		
		if (!$this->conn->query($sqlprodkardex)){
			printf("Error insertando kardex: %s", mysqli_error($this->conn));
			$flag = false;
		}

		$sqlregprod = "INSERT INTO registroproductos (idregistrop,idregistro,idproducto,fecregistro) VALUES ('$next2','$idregistro','$id',now());";

		if (!$this->conn->query($sqlregprod)){
			printf("Error registro producto: %s", mysqli_error($this->conn));
			$flag = false;
		}


		$sqlcompraprovedor ="INSERT INTO compraprovedor (idcompra,idproducto,codigo,idproveedor,cantidad,pvp,numfactura,feccompra,idpersonal,idregistro) VALUES ('$next3','$id','$codigo','$idproveedor','$stocktotal','$PVP','$factura','$feccompra','$idpersonal','$idregistro');";

		if (!$this->conn->query($sqlcompraprovedor)){
			printf("Error insert compra proveedor: %s", mysqli_error($this->conn));
			$flag = false;
		}
		 
		if($flag === true){
			echo "Producto Guardado !!!";
			return 0;   # Retorna 0 si todo sale bien
		}else{
			echo "Error 1504. ";
			return 1504;  # Retorna 1504 si algo sale mal
		}
		
		mysqli_close($this->conn);
	}
}

?>
