<?php
require_once "Conexion.php";

class Compras
{
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function ListadoComprasProveedor($codigo,$idregistro)
	{
		# 
		$sql_compras = "SELECT codigo FROM compraprovedor WHERE idregistro = $idregistro group by codigo;";
		
		if (!$data = $this->con->query($sql_compras)) {
 		  	echo("Error buscando Registros: " . mysqli_error($this->con));
		}

		return $data;

		mysqli_close($this->con);
	}

	public function ProductosKardex($registro){
		$sql = "SELECT * FROM productosKardex WHERE codigo = '$registro'";
			if (!$prodKardes = $this->con->query($sql)) {
 		  	echo("Error mostrando productos: " . mysqli_error($this->con));
			}

			return $prodKardes->fetch_array();
			mysqli_close($this->con);
	}

	public function AgregardeListado($idproducto,$codigo,$idproveedor,$cantidad,$pvp,$numfact,$idpersonal,$idregistro)
	{
		
		$sql = "INSERT INTO compraprovedor VALUES (NULL,idproducto,codigo,idproveedor,cantidad,pvp,numfact,now(),idpersonal,idregistro)";

		if (!$data = $this->con->query($sql)) {
 		  	echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;
		
		mysqli_close($this->con);
	}

	

	public function DatosProducto($idproducto)
	{
		$sql = "SELECT descripcion, marca FROM productos WHERE idproducto =  $idproducto ";

		if (!$this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		$data = $this->con->query($sql);
		$dato = $data->fetch_array(MYSQLI_ASSOC);
		return $dato;

		mysqli_close($this->con);
	}

	public function DatosProductoMarca($idproducto)
	{
		$sql_1 = "SELECT marca FROM productos WHERE idproducto =  $idproducto";

		if (!$datomarca = $this->con->query($sql_1)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}
		$resultmarca = $datomarca->fetch_array();

		$sql_2 = "SELECT marca FROM marca WHERE idmarca = $resultmarca[0]";

		if (!$data = $this->con->query($sql_2)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		$dato = $data->fetch_array(MYSQLI_ASSOC);
		return $dato;

		mysqli_close($this->con);
	}

	public function GuardarCompra($idcompra, $cantidad, $pvp, $idproducto, $mg1, $mg2, $mg3, $pv1, $pv2, $pv3,$numfactura, $idproveedor, $codgen)
	{
		// primero resiva la cantidad de stcok en la tabla productos

		$sql1 = "SELECT stocktotal FROM productos WHERE idproducto =  '$idproducto';";
		
		if(!$this->con->query($sql1))
		{
			echo ("Error 1 arriba. " . mysqli_error($this->con));
			$msg = ("Error 1 arriba. " . mysqli_error($this->con));

		}
			
			$res1 = $this->con->query($sql1);	
			$stockactual = $res1->fetch_array();

			if($stockactual[0] == 0)
			{
				echo "el stock para este producto es 0";
				$sql2 = "UPDATE compraprovedor SET cantidad = $cantidad, pvp = $pvp , feccompra = now() WHERE codigo = $codgen";
				$sqlprod = "UPDATE productos SET stocktotal = $cantidad WHERE codigo = $codgen";

				
				if(!$this->con->query($sql2))
					{
						echo ("Error 2 arriba. " . mysqli_error($this->con));
						$msg = ("Error 2 arriba. " . mysqli_error($this->con));
					}

				
				if(!$this->con->query($sqlprod))
					{
						echo ("Error 3 arriba. " . mysqli_error($this->con));
						$msg = ("Error 3 arriba. " . mysqli_error($this->con));
					}

			}else{
				
				echo "Stock Actual: ".$stockactual[0];
				$nuevostock = $stockactual[0] + $cantidad;

				$sql = "UPDATE compraprovedor SET cantidad = '$nuevostock', pvp = '$pvp' , feccompra = now() WHERE codigo = '$codgen';";

				$sqlprod2 = "UPDATE productos SET stocktotal = '$nuevostock', PVP = '$pvp', marGanancia1 = '$mg1', marGanancia2 = $mg2, marGanancia3 = $mg3, precventa1 = $pv1, precventa2= $pv2, precventa3 = $pv3 WHERE codigo = '$codgen';";

				
				if(!$this->con->query($sql))
					{
						echo ("Error 4 arriba. " . mysqli_error($this->con));
						$msg = ("Error 4 arriba. " . mysqli_error($this->con));
					}

				if(!$this->con->query($sqlprod2))
					{
						echo ("Error 5 arriba. " . mysqli_error($this->con));
						$msg =  ("Error 5 arriba. " . mysqli_error($this->con));
					}
				
			}
		
		return $msg;
		mysqli_close($this->con);

	}
		
}

?>