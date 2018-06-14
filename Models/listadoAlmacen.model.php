<?php
require_once "Conexion.php";

class ListadoAlmacen{

	public function Almacen()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();

			$sql = "SELECT idalmacen, almacen, descripcion, direccion, telefono FROM almacen";
			$data = $mysqli->query($sql);
			return $data;
		mysqli_close($mysqli);
	}
}

?>