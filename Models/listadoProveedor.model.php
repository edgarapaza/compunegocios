<?php
require_once "Conexion.php";

class ListadoProveedor
{

	public function Proveedor()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();
		$sql = "SELECT idproveedor as codigo, nomprove, razonsocial, direccion, telfFijo, celular, email, website FROM proveedor";
		$data = $mysqli->query($sql);
		return $data;

		mysqli_close($mysqli);
	}
}

?>
