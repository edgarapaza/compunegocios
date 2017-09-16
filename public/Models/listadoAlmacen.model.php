<?php
require_once "Conexion.php";

class ListadoAlmacen extends Conexion{

	public function Almacen()
	{
		try {
			$sql = "SELECT idtienda, tienda, direccion, telefono FROM tienda;";
			$data = $this->link->query($sql);
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}
}

?>