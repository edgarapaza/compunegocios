<?php
require_once "Conexion.php";

class Login
{
	function Ingreso($user, $pass)
	{
		$conexion = new Conexion();
		$mysqli =$conexion->Conectarse();
			$sql ="SELECT estado, nivel, IDpersonal FROM login WHERE usuario = '$user' AND passwd = '$pass'";

			$rpta = $mysqli->query($sql);
			return $rpta;
	}
}
?>