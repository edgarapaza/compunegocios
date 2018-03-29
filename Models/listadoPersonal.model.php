<?php
require_once "Conexion.php";

class ListadoPersonal{

	public function Personal()
	{
		$conexion = new Conexion();
		$mysqli = $conexion->Conectarse();
			$sql = "SELECT IDPersonal,CONCAT(nombres,' ', paterno,' ', materno) AS nombre,dni,direccion,telefono1,telefono2,obs,fecCreacion FROM Personal";
			$data = $mysqli->query($sql);
			return $data;
		mysqli_close($mysqli);
	}
}

?>