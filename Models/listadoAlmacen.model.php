<?php
require_once "Conexion.php";

class ListadoAlmacen{

	public function Almacen()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();

			$sql = "SELECT idtienda, tienda, direccion, telefono FROM tienda;";
			$data = $mysqli->query($sql);
			return $data;
		mysqli_close($mysqli);
	}
}

?>