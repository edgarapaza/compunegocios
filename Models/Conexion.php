<?php

class Conexion
{

	public function Conectarse()
	{
		$mysqli = new mysqli('localhost','root','J@smin0215.,$','compu');
		if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_error);
		$mysqli->set_charset("utf8");
		#echo $mysqli->host_info. " Dentro de la clase";

		return $mysqli;

	}
}

#$conexion = new Conexion();
#$mysqli = $conexion->Conectarse();
#933137147  entel

#977913925   entel
?>
