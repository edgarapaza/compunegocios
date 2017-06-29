<?php

class Conexion {

	public function Conectar() {
		require_once ("config.php");

		$conn = new mysqli(HOST, USER, PASS,DB);

		$conn->set_charset("utf8");

		if ($conn->connect_errno) {
			echo "Error al contenctar a MySQL: (".$conn->connect_errno.") ".$conn->connect_error;
			exit();
		}

		#echo $conn->host_info. " Dentro de la clase";
		return $conn;

	}
}

?>