<?php
require_once "Conexion.php";

class ListadoPersonal extends Conexion{

	public function Personal()
	{
		try {
			$sql = "SELECT IDPersonal,CONCAT(nombres,' ', paterno,' ', materno) AS nombre,dni,direccion,telefono1,telefono2,obs,fecCreacion FROM Personal";
			$data = $this->link->query($sql);
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}
}

?>