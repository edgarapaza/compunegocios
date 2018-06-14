<?php 
require_once "Conexion.php";

class Productos
{
	private $con;

	function __construct()
	{
		$link = new Conexion();
		$this->con = $link->Conectarse();

		return $this->con;
	}

	public function ProductoRegistrados(){
		$sql = "SELECT p.idproducto as codigo, p.descripcion, a.almacen, p.stocktotal, p.precventa3, p.total FROM productos as p , almacen as a WHERE p.idalmacen = a.idalmacen";
		
		$data = $this->con->query($sql);

		return $data;
		mysqli_close($this->con);
	}
}

?>