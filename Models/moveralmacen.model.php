<?php
require_once "Conexion.php";

class MoverAlmacen
{
	private $con="";

	function __construct(){
		$conexion = new Conexion();
		$this->con = $conexion->Conectarse();
		return $this->con;
	}

	public function MostrarTodo()
	{
		
		$sql = "SELECT p.idproducto, p.descripcion, a.almacen, p.stocktotal,a.idalmacen FROM productos as p, almacen as a WHERE p.idalmacen = a.idalmacen";

		if (!$data = $this->con->query($sql)) {
 		  	echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;
		
		mysqli_close($this->con);
	}

	public function MostrarxAlmacen($idalmacen)
	{
		$sql = "SELECT p.idproducto, p.descripcion, a.almacen, p.stocktotal FROM productos as p, almacen as a WHERE p.idalmacen = a.idalmacen AND p.idalmacen = " . $idalmacen;

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;

		mysqli_close($this->con);
	}

	public function MoveraNuevoAlmacen()
	{

	}

	public function Almacenes()
	{
		$sql = "SELECT idalmacen, almacen FROM almacen";

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}

		return $data;

		mysqli_close($this->con);
	}

	public function NombreAlmacen($idalmacen)
	{
		$sql = "SELECT almacen FROM almacen WHERE idalmacen = " .$idalmacen;

		if (!$data = $this->con->query($sql)) 
		{
 		  echo("Error description 1: " . mysqli_error($this->con));
		}
		$alma = $data->fetch_array();
		return $alma;

		mysqli_close($this->con);
	}
}

/*$mover = new MoverAlmacen();
//$todo = $mover->MostrarxAlmacen(6);
$todo = $mover->Almacenes();

while ($fila = $todo->fetch_array()) {
	echo $fila[0];
	echo $fila[1];
	echo $fila[2];
	echo $fila[3];
}*/	