<?php
require_once "Conexion.php";

class ListadoProductos
{

	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function Productos(){

		$sql = "SELECT idproducto, descripcion, numserie, marca, modelo, precventa1, precventa2, precventa3, stocktotal, stockmin, color, incluye FROM productos";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		return $data;

		mysqli_close($this->con);

	}

	public function listaxSerie($serie){

		$sql = "SELECT * FROM productos as p WHERE  p.numserie = '". $serie ."';";

		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
		return $data;
		mysqli_close($this->con);
	}

	public function ProductoSolo($idproducto)
	{
		$sql = "SELECT idproducto, descripcion, stocktotal, precventa3 FROM productos WHERE idproducto = " . $idproducto;
		if (!$this->con->query($sql)) {
 		  echo("Error description: " . mysqli_error($this->con));
		}

 		$data = $this->con->query($sql);
 		$fila = $data->fetch_array(MYSQLI_ASSOC);
		return $fila;

		mysqli_close($this->con);
	}
}

?>