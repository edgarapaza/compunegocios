<?php
require_once "Conexion.php";

class ListadoProveedor extends Conexion{

	public function Proveedor()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();
			$sql = "SELECT idproveedor,nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website FROM proveedor";
			$data = $mysqli->query($sql);
			return $data;

	}
}

?>
