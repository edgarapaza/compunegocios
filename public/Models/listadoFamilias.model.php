<?php
require_once "Conexion.php";

class ListadoFamilias extends Conexion
{

	public function Familias()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();
			$sql = "SELECT IDfamilia, familia FROM familia";
			$data = $mysqli->query($sql);
			return $data;
	}
}

?>