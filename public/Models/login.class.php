<?php
require_once "Conexion.php";

class Login extends Conexion
{
	function Ingreso($user, $pass)
	{
		try {
			$sql ="SELECT estado, nivel, IDpersonal FROM login WHERE usuario = '$user' AND passwd = '$pass'";

			$rpta = $this->link->query($sql);
			return $rpta;

		} catch (Exception $e) {
			throw $e;
		}

	}
}
?>