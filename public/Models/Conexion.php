<?php

class Conexion
{
	public $link;

	public function __construct()
	{
		try {
			require_once ("config.php");
			$this->link = new mysqli(HOST, USER, PASS, DB);
			$this->link->set_charset("utf8");
			#echo $this->link->host_info. " Dentro de la clase";
			return $this->link;

		} catch (Exception $e) {
			throw $e;
		}

	}
}

#$conexion = new Conexion();

?>