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

	public function ListadoComprasProveedor($codigo)
	{
		
		$sql = "SELECT * FROM compraprovedor";

		if (!$this->con->query($sql)) {
 		  echo("Error description 1: " . mysqli_error($this->con));
		}
		$data = $this->con->query($sql);

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
		$dato = $data->fetch_array();
		return $dato;

		mysqli_close($this->con);
	}

	public function GuardarCompra($idcompra, $cantidad, $pvp, $idproducto, $mg1, $mg2, $mg3, $pv1, $pv2, $pv3,$numfactura, $idproveedor)
	{
		// primero resiva la cantidad de stcok en la tabla productos
		$sql1 = "SELECT stocktotal FROM productos WHERE idproducto = ".  $idproducto;
		
		if(!$this->con->query($sql1))
		{
			echo ("Error 1 arriba. " . mysqli_error($this->con));
		}
			
			$res1 = $this->con->query($sql1);	
			$stockactual = $res1->fetch_array();

			if($stockactual[0] == 0)
			{
				echo "el stock para este producto es 0";
				$sql2 = "UPDATE compraprovedor SET cantidad = $cantidad, pvp = $pvp , feccompra = now() WHERE idcompra = $idcompra";
				$sqlprod = "UPDATE productos SET stocktotal = $cantidad WHERE idproducto = $idproducto";

				
				if(!$this->con->query($sql2))
					{
						echo ("Error 1 arriba. " . mysqli_error($this->con));
					}

				
				if(!$this->con->query($sqlprod))
					{
						echo ("Error 1 arriba. " . mysqli_error($this->con));
					}

			}else{
				
				echo "Stock Actual: ".$stockactual[0];
				$nuevostock = $stockactual[0] + $cantidad;

				$sql = "UPDATE compraprovedor SET cantidad = $nuevostock, pvp = $pvp , feccompra = now() WHERE idcompra = $idcompra";

				$sqlprod2 = "UPDATE productos SET stocktotal = $nuevostock, PVP = $pvp, marGanancia1 = $mg1, marGanancia2 = $mg2, marGanancia3 = $mg3, precventa1 = $pv1, precventa2= $pv2, precventa3 = $pv3 WHERE idproducto = $idproducto";

				
				if(!$this->con->query($sql))
					{
						echo ("Error 1 arriba. " . mysqli_error($this->con));
					}

				if(!$this->con->query($sqlprod2))
					{
						echo ("Error 1 arriba. " . mysqli_error($this->con));
					}
				
			}
		

		mysqli_close($this->con);

	}
		
}
/*
$compra = new Compras();
$guar = $compra->GuardarCompra(9,2,12.99,50);
echo $guar;
*/
?>