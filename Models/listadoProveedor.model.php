<?php
require_once "Conexion.php";

class ListadoProveedor
{

	public function Proveedor()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();
		$sql = "SELECT idproveedor as codigo, nomprove, razonsocial, email, fecalta FROM proveedor";
		$data = $mysqli->query($sql);
		return $data;

		mysqli_close($mysqli);
	}
}

?>